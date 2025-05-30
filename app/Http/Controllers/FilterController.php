<?php

namespace App\Http\Controllers;

use App\Models\Autor;
use App\Models\Informe;
use App\Traits\WithFilteringAndPagination;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class FilterController
{
    use WithFilteringAndPagination;

    public function autores(Request $request)
    {
        $search = $request->get('search', '');
        $starts_with = $request->get('starts_with', '');

        $query = Autor::query();
        if (!empty($search)) {
            $query->where(function($q) use ($search) {
                $q->where('nombre', 'LIKE', "%$search%")
                ->orWhere('apellidos', 'LIKE', "%$search%");
            });
        }
        if (!empty($starts_with)) {
            $query->where('apellidos', 'LIKE', "$starts_with%");
        }

        $query->whereHas('informes', function ($q) {
            $q->where('estado', 'Publicado'); 
        });
        $autores = $this->applyFiltersAutor($request, $query->withCount('informes'));

        $itemsPerPage = $request->input('items_per_page', 20);

        $autores = $query->paginate($itemsPerPage);

        return view('filtros.autores', compact('autores'));
    }



    public function searchLetter(Request $request)
    {
        $search = $request->get('search', '');
        $starts_with = $request->get('starts_with', '');

        $autores = Autor::query()
            ->when(!empty($search), function($query) use ($search) {
                return $query->where(function($q) use ($search) {
                    $q->where('nombre', 'LIKE', "%$search%")
                    ->orWhere('apellidos', 'LIKE', "%$search%");
                });
            })
            ->when(empty($search) && !empty($starts_with), function($query) use ($starts_with) {
                return $query->where(function($q) use ($starts_with) {
                    $q->where('apellidos', 'LIKE', "$starts_with%");
                });
            })
            ->withCount('informes')
            ->orderBy('apellidos', 'ASC')
            ->paginate(20)
            ->appends($request->query());

        return view("filtros.autores", compact("autores", "starts_with"));
    }

    public function searchYear(Request $request, $year = null)
    {
        $year = $request->get('search', $year);

        $query = Informe::soloPublicados()->newQuery();
        if (!empty($year)) {
            $query->where('anio', $year);
        }
        $contador = $query->count();
        $publi_fecha = $this->applyFiltersFecha($request, $query);
        return view('filtros.fechaP', compact('publi_fecha', 'contador'));
    }

    public function searchYearRange(Request $request, $range)
    {
        [$yearA, $yearB] = explode('-', $range);

        $year = $request->get('search', null);

        $publi_fecha = Informe::soloPublicados()->newQuery()
            ->when(!empty($year), function($query) use ($year) {
                return $query->where('anio', $year);
            })
            ->whereBetween('anio', [$yearA, $yearB])
            ->paginate(10)
            ->appends($request->query());
        $contador = $publi_fecha->total();

        return view('filtros.fechaP', compact('publi_fecha', 'contador'));
    }

    public function listTitle(Request $request, $title = null)
    {
        $title = $request->get('search', $title);
        $query = Informe::soloPublicados()->newQuery();
        if (!empty($title)) {
            $query->where('titulo', 'LIKE', "%$title%");
        }
        $informes = $this->applyFiltersTitle($request, $query);
        return view('filtros.listTitulo', compact('informes'));
    }


    public function show($item)
    {
        $informe = Informe::findOrFail($item);
        // $this->actualizarRuta($informe);
        return view('filtros.showFechaP', compact('informe'));
    }

    public function showtitle($item)
    {
        $informe = Informe::findOrFail($item);
        return view('filtros.showTitulos', compact('informe'));
    }
    public function showInformeAutores($item)
    {
        $informe = Informe::soloPublicados()->where('id', $item)->firstOrFail();
        return view('filtros.showInformeAutores', compact('informe'));
    }

    public function showInformes(Autor $autor)
{
    $informes = $autor->informes()
                      ->soloPublicados() 
                      ->paginate(10);
                      
    return view('filtros.informesA', compact('autor', 'informes'));
}


    public function searchTitle(Request $request)
    {
        $starts_with = $request->get('starts_with', '');

        $informes = Informe::query()
            ->when(!empty($starts_with), function($query) use ($starts_with) {
                return $query->where('titulo', 'LIKE', "$starts_with%");
            })
            ->paginate(10)
            ->appends($request->query());
        return view('filtros.listTitulo', compact('informes'));
    }

    public function categories()
    {
        return view('section.index');
    }
    // private function actualizarRutaInforme($informes)
    // {
    //     foreach ($informes as $informe) {
    //         if (!empty($informe->ruta_caratula) && !File::exists(public_path($informe->ruta_caratula))) {
    //             $informe->ruta_caratula = 'img/default2.png';
    //         }
    //     }
    // }

    // private function actualizarRuta(Informe $informe)
    // {
    //     if (!empty($informe->ruta_caratula) && !File::exists(public_path($informe->ruta_caratula))) {
    //         $informe->ruta_caratula = 'img/default2.png';
    //     }
    // }
}

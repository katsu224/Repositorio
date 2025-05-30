<?php

namespace App\Http\Controllers;

use App\Models\Informe;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\File;
class PracticaController extends Controller
{
    public function index(Request $request)
    {
        $sort = $request->input('sort', 'asc');
        $itemsPerPage = $request->input('items_per_page', 10);
        $search = $request->input('search'); 

        $query = Informe::soloPublicados()->where('tipo_informe_id', '0');

        if (!empty($search)) {
            $query->where('titulo', 'like', "%$search%");
        }

        $practicas = $query->orderBy('titulo', $sort)->paginate($itemsPerPage);
        $contador = $practicas->total();
        foreach ($practicas as $informe) {
            if (!empty($informe->ruta_caratula) && !File::exists(public_path($informe->ruta_caratula))) {
                $informe->ruta_caratula = 'img/default2.png';
            }
        }

        return view('practicas.index', compact('practicas', 'contador', 'sort', 'itemsPerPage', 'search'));
    }

    public function show($item)
    {
        $informe =Informe::soloPublicados()->where('id', $item)->firstOrFail();
        // $this->actualizarRuta($informe);
        return view('practicas.show', compact('informe'));
    }
}

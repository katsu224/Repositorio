<?php

namespace App\Http\Controllers;

use App\Models\AutorInfo;
use App\Models\AutorInforme;
use Illuminate\Http\Request;
use App\Models\Informe;
use Illuminate\Support\Facades\Auth;

class PublicacionesController extends Controller
{
   public function indexPublications()
   {
      if (!Auth::check()) {
         return redirect('/login');
      }
      return view('panel.publications');
   }

   public function showPublications(Request $request)
{
    $buscador = $request->input('buscador');

    $publicaciones = Informe::join('tipo_informe', 'informe.tipo_informe_id', '=', 'tipo_informe.id')
        ->select('informe.*', 'tipo_informe.nombre as tipo_nombre')
        ->when($buscador, function ($query) use ($buscador) {
            return $query->where('informe.titulo', 'like', '%' . $buscador . '%')
                ->orWhere('informe.anio', 'like', '%' . $buscador . '%')
                ->orWhere('tipo_informe.nombre', 'like', '%' . $buscador . '%')
                ->orWhereHas('autores', function ($query) use ($buscador) {
                    $query->where('autores.nombre', 'like', '%' . $buscador . '%')
                        ->orWhere('autores.apellidos', 'like', '%' . $buscador . '%');
                });
        })
        ->orderBy('informe.id', 'asc')
        ->paginate(10)
        ->appends(request()->query());

    foreach ($publicaciones as $publicacion) {
        $publicacion->autores = AutorInforme::join('autores', 'autor_informe.autor_dni', '=', 'autores.dni')
            ->where('autor_informe.informe_id', $publicacion->id)
            ->select('autores.*')
            ->get();
    }

    return view('panel.publications', compact('publicaciones'));
}


   public function updatePublicado($id)
   {
      $informe = Informe::find($id);

      if ($informe->estado === "Publicado") {
         session()->flash('info', 'El proyecto ya está publicado.');
      } else {
         $informe->estado = "Publicado";
         $informe->save();
         session()->flash('success', '¡El proyecto ha sido publicado exitosamente!');
      }

      return redirect('/informes/publications');
   }

   public function updateNoPublicado($id)
   {
      $informe = Informe::find($id);

      if ($informe->estado === "No Publicado") {
         session()->flash('info', 'El proyecto no está publicado.');
      } else {
         $informe->estado = "No Publicado";
         $informe->save();
         session()->flash('success', 'El proyecto ya no está publicado.');
      }

      return redirect('/informes/publications');
   }
}

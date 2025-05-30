<?php

namespace App\Http\Controllers;

use App\Models\Autor;
use Illuminate\Http\Request;

class AutorController extends Controller
{

   public function index()
   {
      return view('panel.indexAutor');
   }

   public function store(Request $request)
   {
      $request->validate([
         'dni' => 'required|string|min:8',
         'nombres' => 'required|string',
         'apellidos' => 'required|string'
      ]);

      $new = new Autor();
      $new->dni = $request->dni;
      $new->nombre = $request->nombres;
      $new->apellidos = $request->apellidos;

      $new->save();

      session()->flash('success', '¡Autor añadido exitosamente!');

      return redirect('/autor');
   }

   public function update(Request $request, $dni)
   {
      $informe = Autor::where('dni', $dni)->first();

      $request->validate([
         'dni' => 'required|string|min:8',
         'nombres' => 'required|string',
         'apellidos' => 'required|string'
      ]);

      $informe->dni = $request->dni;
      $informe->nombre = $request->nombres;
      $informe->apellidos = $request->apellidos;

      $informe->save();
      session()->flash('success', '¡Datos actualizados exitosamente!');
      return redirect('/autor');
   }

   public function destroy($dni)
   {
      $drop = Autor::where('dni', $dni)->first();
      $drop->delete();
      session()->flash('success', '¡Autor eliminado exitosamente!');
      return redirect('/autor');
   }


   public function showAutores()
   {
      $autores = Autor::query()
         ->when(request('buscador'), function ($query) {
            return $query->where('dni', 'like', '%' . request('buscador') . '%')
               ->orWhere('nombre', 'like', '%' . request('buscador') . '%')
               ->orWhere('apellidos', 'like', '%' . request('buscador') . '%');
         })
         ->paginate(10);

      $autores->appends(request()->query());

      return view('panel.indexAutor', compact('autores'));
   }


   public function showByIdAutores($dni)
   {
      $dni = Autor::find($dni);
      return view('panel.indexAutor', compact('dni'));
   }

   public function buscarDNI(Request $request)
   {
      $dni = $request->query('dni'); // Obtiene el DNI de la consulta

      $usuario = Autor::where('dni', $dni)->first();

      if ($usuario) {
         // Si se encuentra el usuario, devolver sus nombres y apellidos
         return response()->json([
            'nombres' => $usuario->nombre,
            'apellidos' => $usuario->apellidos,
         ]);
      }
   }
}

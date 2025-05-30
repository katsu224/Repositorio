<?php

namespace App\Http\Controllers;

use App\Models\AutorInfo;
use App\Models\AutorInforme;
use Illuminate\Http\Request;
use App\Models\Informe;
use App\Models\TipoInforme;
use App\Models\Carrera;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage; //Para utilizar STORAGE


class InformeController extends Controller
{
   private function resetIds()
   {
      DB::statement('SET @autoid := 0');
      DB::statement('UPDATE informe SET id = @autoid := (@autoid + 1)');
      DB::statement('ALTER TABLE informe AUTO_INCREMENT = 1');
   }

   public function index()
   {
      return view('panel.indexInformes');
   }

   public function add()
   {
      $tipos = TipoInforme::all();
      $carreras = Carrera::all();
      return view('informes.add', compact('carreras', 'tipos'));
   }

   public function store(Request $request)
   {
      $request->validate([
         'titulo' => 'required|string|max:255',
         'resumen' => 'required|string',
         'anio' => 'required|integer',
         'pdf' => 'required|mimes:pdf',
         'caratula' => 'required|image|mimes:jpeg,png,jpg,gif',
         'acceso' => 'required|string',
         'modulo' => 'nullable|string',
         'tipo_informe' => 'required|string',
         'carrera' => 'nullable|string',
         'autores' => 'required|string',
      ]);

      try {
         DB::beginTransaction();

         $informe = new Informe();
         $informe->titulo = $request->titulo;
         $informe->resumen = $request->resumen;
         $informe->anio = $request->anio;
         $informe->estado = 'No Publicado';
         $informe->acceso = $request->acceso;
         $informe->carrera_id = $request->carrera;
         $informe->modulo = $request->modulo;
         $informe->tipo_informe_id = $request->tipo_informe;

         $pdf = $request->file('pdf');
         $nombrePDF = $pdf->getClientOriginalName();
         $pdf->storeAs('pdfs', $nombrePDF, 'public');
         $informe->ruta_pdf = $nombrePDF;

         $caratula = $request->file('caratula');
         $nombreCaratula = $caratula->getClientOriginalName();
         $caratula->storeAs('caratulas', $nombreCaratula, 'public');
         $informe->ruta_caratula = $nombreCaratula;

         $informe->save();

         $dniArray = array_filter(array_map('trim', explode("\n", $request->input('autores'))));

         $autoresData = [];
         foreach ($dniArray as $dni) {
            if (!empty($dni)) {
               $autoresData[] = [
                  'autor_dni' => $dni,
                  'informe_id' => $informe->id
               ];
            }
         }

         AutorInforme::insert($autoresData);
         DB::commit();

         session()->flash('success', '¡El proyecto ha sido añadido exitosamente!');
      } catch (\Exception $e) {
         DB::rollBack();
         session()->flash('error', 'Ocurrió un error al guardar el proyecto. Inténtelo de nuevo.');
         return redirect()->back()->withInput();
      }

      return redirect('/informes');
   }


   public function update(Request $request, $id)
   {
      $informe = Informe::find($id);

      $request->validate([
         'titulo' => 'required|string|max:255',
         'resumen' => 'required|string',
         'autores' => 'required|string',
         'anio' => 'required|integer',
         'pdf' => 'nullable|mimes:pdf',
         'caratula' => 'nullable|image|mimes:jpeg,png,jpg,gif',
         'acceso' => 'required|string',
         'carrera' => 'nullable|string',
         'modulo' => 'nullable|string',
         'tipo_informe' => 'required|string',
      ]);

      if ($request->hasFile('caratula')) {
         if ($informe->ruta_caratula) {
            Storage::disk('public')->delete('caratulas/' . $informe->ruta_caratula);
         }
         $caratula = $request->file('caratula');
         $nombreCaratula = $caratula->getClientOriginalName();
         $caratula->storeAs('caratulas', $nombreCaratula, 'public');
         $informe->ruta_caratula = $nombreCaratula;
      }

      if ($request->hasFile('pdf')) {
         if ($informe->ruta_pdf) {
            Storage::disk('public')->delete('pdfs/' . $informe->ruta_pdf);
         }
         $pdf = $request->file('pdf');
         $nombrePDF = $pdf->getClientOriginalName();
         $pdf->storeAs('pdfs', $nombrePDF, 'public');
         $informe->ruta_pdf = $nombrePDF;
      }

      $informe->titulo = $request->titulo;
      $informe->resumen = $request->resumen;
      $informe->anio = $request->anio;
      $informe->acceso = $request->acceso;
      $informe->carrera_id = $request->carrera;
      $informe->modulo = $request->modulo;
      $informe->tipo_informe_id = $request->tipo_informe;

      $informe->save();

      // Procesamiento de autores
      $dniArray = array_filter(array_map('trim', explode("\n", $request->input('autores'))));
      $existingDnis = AutorInforme::where('informe_id', $informe->id)->pluck('autor_dni')->toArray();

      // Eliminar DNIs que ya no están en la lista
      $dnisToRemove = array_diff($existingDnis, $dniArray);
      AutorInforme::whereIn('autor_dni', $dnisToRemove)->where('informe_id', $informe->id)->delete();

      // Agregar nuevos DNIs que no están en la base de datos
      $newDnis = array_diff($dniArray, $existingDnis);
      foreach ($newDnis as $dni) {
         if (!empty($dni)) {
            $autorInfo = new AutorInforme();
            $autorInfo->autor_dni = $dni;
            $autorInfo->informe_id = $informe->id;
            $autorInfo->save();
         }
      }

      session()->flash('success', '¡El proyecto ha sido actualizado exitosamente!');
      return redirect('/informes');
   }

   public function destroy($id)
   {
      $drop = Informe::find($id);

      Storage::disk('public')->delete('pdfs/' . $drop->ruta_pdf);
      Storage::disk('public')->delete('caratulas/' . $drop->ruta_caratula);

      $drop->delete();

      $this->resetIds();

      session()->flash('success', '¡El proyecto ha sido eliminado exitosamente!');

      return redirect('/informes');
   }


   public function showInformes()
{
    $buscador = request('buscador');

    $informes = Informe::join('tipo_informe', 'informe.tipo_informe_id', '=', 'tipo_informe.id')
        ->select('informe.*', 'tipo_informe.nombre as tipo_nombre')
        ->when($buscador, function ($query) use ($buscador) {
            return $query->where('informe.id', 'like', '%' . $buscador . '%')
                ->orWhere('informe.titulo', 'like', '%' . $buscador . '%')
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

    return view('panel.indexInformes', compact('informes'));
}


   public function showByIdInformes($id)
   {
      $id = Informe::find($id);

      $autores = AutorInforme::join('informe', 'autor_informe.informe_id', '=', 'informe.id')
         ->join('autores', 'autor_informe.autor_dni', '=', 'autores.dni')
         ->where('autor_informe.informe_id', $id->id)
         ->select('autor_informe.*', 'informe.*', 'autores.*')
         ->get();

      $tipos = TipoInforme::all();
      $carreras = Carrera::all();

      return view('informes.edit', compact('id', 'tipos', 'carreras', 'autores'));
   }
}

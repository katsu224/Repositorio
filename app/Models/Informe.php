<?php

namespace App\Models;

use Illuminate\Http\Request;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Informe extends Model
{
    use HasFactory;
    protected $table = 'informe';
    public function autores()
    {
        return $this->belongsToMany(Autor::class, 'autor_informe', 'informe_id', 'autor_dni')
                ->select(['nombre', 'apellidos']);
    }
    protected $fillable = [
        'titulo',
        'autores',
        'anio',
        'ruta_pdf',
        'ruta_caratula',
        'modulo',
        'estado',
        'acceso',
        'tipo_informe_id',
        'carrera_id',
    ];
    // En el modelo Informe

    public function scopeSoloPublicados(Builder $query)
    {
    return $query->where('estado', 'Publicado');
    }

    public function scopeTodosLosEstados(Builder $query)
    {
    return $query; // No aplica ningún filtro, trae todos los informes
    }

    public function scopeFilter(Builder $query, Request $request)
{
    if ($request->filled('search')) {
        $searchTerm = $request->input('search');
        $query->where(function($q) use ($searchTerm) {
            $q->where('titulo', 'like', "%$searchTerm%")
              ->orWhere('resumen', 'like', "%$searchTerm%")
              ->orWhereHas('autores', function($q) use ($searchTerm) {
                  $q->where('nombre', 'like', "%$searchTerm%")
                    ->orWhere('apellidos', 'like', "%$searchTerm%");
              });
        });
    }

    return $query;
}

}

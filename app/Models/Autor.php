<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;
class Autor extends Model
{
    use HasFactory;
    protected $table = 'autores';
    protected $primaryKey = 'dni';
    public $timestamps = false;
    public $incrementing = false;
    protected $keyType = 'string';
    public function informes()
    {
        return $this->belongsToMany(Informe::class, 'autor_informe', 'autor_dni', 'informe_id');
    }

    public function scopeSoloConInformesPublicados(Builder $query)
{
    return $query->whereHas('informes', function ($query) {
        $query->soloPublicados(); 
    });
}
    // En tu modelo Autor
    public function scopeFilter($query, Request $request)
    {
        $search = $request->get('search', ''); 
        $starts_with = $request->get('starts_with', '');

        // Filtrado por búsqueda    
        if (!empty($search)) {
            $query->where(function($q) use ($search) {
                $q->where('nombre', 'LIKE', "%$search%")
                ->orWhere('apellidos', 'LIKE', "%$search%");
            });
        }

        // Filtrado por coincidencia inicial
        if (!empty($starts_with)) {
            $query->where('apellidos', 'LIKE', "$starts_with%");
        }

        return $query;
    }

}

<?php

namespace App\Http\Controllers;

use App\Models\Informe;
use App\Traits\WithFilteringAndPagination;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\File;
use Illuminate\Contracts\View\View;
use Illuminate\Contracts\View\Factory;

class InstitucionalController extends Controller
{
    use WithFilteringAndPagination;
    public function index(Request $request): Factory|View
    {
        $query = Informe::soloPublicados()->filter($request);
        $informes = $this->applyFilters($request, $query);
        $contador = $informes->total();
        return view('institucional.index', compact('informes', 'contador'));
    }

    public function show($item): Factory|View
    {
        $informe = Informe::soloPublicados()->where('id', $item)->firstOrFail();
        return view('institucional.show', compact('informe'));
    }

}

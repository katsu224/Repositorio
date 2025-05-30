<?php

namespace App\Http\Controllers;

use App\Models\Informe;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\File;

class HomeController extends Controller
{
    public function __invoke()
    {
        $recientes = Informe::soloPublicados()->latest()->take(10)->get();
        // $this->actualizarRutas($recientes);
        return view('home',compact('recientes'));

    }
    private function actualizarRutas($informes)
    {
        foreach ($informes as $informe) {
            $this->actualizarRuta($informe);
        }
    }
    private function actualizarRuta(Informe $informe)
    {
        if (!empty($informe->ruta_caratula) && !File::exists(public_path($informe->ruta_caratula))) {
            $informe->ruta_caratula = 'img/default2.png';
        }
    }
}

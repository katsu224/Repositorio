<?php

namespace App\View\Components;

use Diglactic\Breadcrumbs\Breadcrumbs;
use Illuminate\View\Component;

class Breadcrumb extends Component
{
    public $breadcrumbs;

    // Constructor que recibe el nombre de la ruta y el programa
    public function __construct($name = 'home', $programa = null)
    {
        
        if ($programa) {
            $this->breadcrumbs = Breadcrumbs::generate($name, $programa);
        } else {
            $this->breadcrumbs = Breadcrumbs::generate($name);
        }
    }

    // Método render que solo pasa los breadcrumbs a la vista
    public function render()
    {
        return view('components.breadcrumb', ['breadcrumbs' => $this->breadcrumbs]);
    }
}


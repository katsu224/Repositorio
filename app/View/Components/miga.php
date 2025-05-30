<?php

namespace App\View\Components;

use Closure;
use Diglactic\Breadcrumbs\Breadcrumbs;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class miga extends Component
{
    public $breadcrumbs;

    public function __construct($name = 'home', $programa = null)
    {
        $this->breadcrumbs = Breadcrumbs::generate($name, $programa);
    }

    public function render()
    {
        return view('components.miga');
    }
}

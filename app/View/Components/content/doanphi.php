<?php

namespace App\View\Components\content;

use App\Models\Chidoan;
use Illuminate\View\Component;

class doanphi extends Component
{
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct(public $listcd)
    {
        //
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.content.doanphi');
    }
}

<?php

namespace App\View\Components\content;

use Illuminate\View\Component;

class doanvien extends Component
{
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct(public $listcd,public $listcv, public $search, public $doanvien)
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
        return view('components.content.doanvien');
    }
}

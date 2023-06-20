<?php

namespace App\View\Components\doanvien;

use Illuminate\View\Component;

class sua extends Component
{
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct(public $listcd, public $listcv, public $doanvien)
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
        return view('components.doanvien.sua');
    }
}

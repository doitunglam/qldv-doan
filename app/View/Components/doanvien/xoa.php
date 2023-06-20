<?php

namespace App\View\Components\doanvien;

use Illuminate\View\Component;

class xoa extends Component
{
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct(public $doanvien)
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
        return view('components.doanvien.xoa');
    }
}

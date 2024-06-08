<?php

namespace App\View\Components\content;

use Illuminate\View\Component;

class thongbao extends Component
{
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct(public $listTB)
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
        return view('components.content.thongbao');
    }
}

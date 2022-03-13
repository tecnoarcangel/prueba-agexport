<?php

namespace App\View\Components;

use Illuminate\View\Component;

class AdminLayout extends Component
{
    /**
     * Get the view / contents that represents the component.
     *
     * @return \Illuminate\View\View
     */
    public function __construct($title)
    {
        $this->title = $title;
    }

    public function render()
    {
        return view('layouts.admin');
    }
}
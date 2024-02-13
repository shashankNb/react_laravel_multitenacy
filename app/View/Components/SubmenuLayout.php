<?php

namespace App\View\Components;

use Illuminate\View\Component;
use Illuminate\View\View;

class SubmenuLayout extends Component
{
    public string $icon = '';
    public array $parent = [];
    public array $children = [];

    public function __construct(string $icon = '', $parent = [], array $children = [])
    {
        $this->icon = $icon;
        $this->parent = $parent;
        $this->children = $children;
    }

    /**
     * Get the view / contents that represents the component.
     *
     * @return View
     */
    public function render(): View
    {
        return view('layouts.submenuLayout');
    }
}

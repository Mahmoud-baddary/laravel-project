<?php

namespace App\View\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class NavbarMain extends Component
{
    public $searchWord;
    public $allProducts;
    public $categories;
    public function __construct($searchWord, $allProducts, $categories)
    {
        $this->searchWord = $searchWord;
        $this->allProducts = $allProducts;
        $this->categories = $categories;
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.navbar-main');
    }
}

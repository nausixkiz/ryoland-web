<?php

namespace App\View\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\Support\Collection;
use Illuminate\View\Component;

class GalleryComponent extends Component
{
    public Collection $gallery;

    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct(Collection $gallery)
    {
        $this->gallery = $gallery;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return View|Closure|string
     */
    public function render()
    {
        return view('components.gallery-component');
    }
}

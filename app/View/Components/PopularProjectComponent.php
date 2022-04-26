<?php

namespace App\View\Components;

use App\Models\RealEstate\Project;
use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\View\Component;

class PopularProjectComponent extends Component
{
    public array|Collection $popularProjects;

    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->popularProjects = Project::orderByViews()->take(5)->get();
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return View|Closure|string
     */
    public function render()
    {
        return view('components.popular-project-component');
    }
}

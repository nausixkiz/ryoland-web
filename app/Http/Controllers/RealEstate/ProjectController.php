<?php

namespace App\Http\Controllers\RealEstate;

use App\Http\Controllers\Controller;
use App\Models\RealEstate\Project;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;

class ProjectController extends Controller
{
    private string $indexRoute = 'real-estate.projects.index';

    /**
     * Display a listing of the resource.
     *
     * @return Application|Factory|View
     */
    public function index(): View|Factory|Application
    {
        $breadcrumbs = [
            ['url' => route('home'), 'name' => 'Home', 'icon' => 'fa-solid fa-home'],
            ['name' => 'Projects'],
        ];
        return view('contents.project.index', [
            'projects' => Project::paginate(10),
            'breadcrumbs' => $breadcrumbs,
        ]);
    }

    /**
     * Display the specified resource.
     *
     * @param string $slug
     * @return Application|Factory|View
     */
    public function show(string $slug)
    {
        $project = Project::findBySlugOrFail($slug);

        views($project)->record();

        $breadcrumbs = [
            ['url' => route('home'), 'name' => 'Home', 'icon' => 'fa-solid fa-home'],
            ['url' => route($this->indexRoute), 'name' => __('Projects'), 'icon' => 'fa-solid fa-home'],
            ['name' => $project->name],
        ];

        return view('contents.project.show', [
            'project' => $project,
            'relatedProject' => Project::where('id', '!=', $project->id)->where('status', $project->status)->whereHas('categories', function ($query) use ($project) {
                $query->whereIn('category_id', $project->categories->pluck('id'));
            })->take(2)->get(),
            'gallery' => $project->getGalleryConversionUrl(),
            'breadcrumbs' => $breadcrumbs,
        ]);
    }
}

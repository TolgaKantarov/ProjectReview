<?php

namespace App\Http\Controllers;

use App\Http\Requests\SubmitProjectRequest;
use Illuminate\Http\Request;
use App\Models\Project;

class ProjectsController extends Controller
{
    public function index() {

    }

    public function show(Project $project) {
        return view('projects.view')->with('project', $project);
    }

    public function create() {
        return view('projects.create');
    }

    public function store(SubmitProjectRequest $request) {
        $request->validated();

        $project = new Project;

        $project->user_id = auth()->id();
        $project->title = $request->title;
        $project->description = $request->description;
        $project->link = $request->link;

//        if (isset($request->is_current)) {
//            $project->current = true;
//        }

        $project->save();

        return redirect()->route('view.project', ['project' => $project]);
    }
}

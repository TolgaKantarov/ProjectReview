<?php

namespace App\Http\Controllers;

use App\Http\Requests\SubmitProjectRequest;
use Illuminate\Http\Request;
use App\Models\Project;

class ProjectsController extends Controller
{
    public function index() {
        $projects = Project::orderBy('created_at', 'desc')->paginate(5);
        return view('projects.all')->with('projects', $projects);
    }

    public function mine() {
        $user = request()->user();
        $projects = $user->projects()->orderBy('created_at', 'desc')->paginate(5);
        return view('projects.mine')->with('projects', $projects);
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

        return redirect()->route('view.project', ['project' => $project])
            ->with(['success_msg' => 'Successfully submitted project!']);
    }

    public function edit(Project $project) {
        $this->authorize('update', $project);
        return view('projects.edit')->with(['project' => $project]);
    }

    public function update(SubmitProjectRequest $request, Project $project) {

        $this->authorize('update', $project);

        $request->validated();

        $project->user_id = auth()->id();
        $project->title = $request->title;
        $project->description = $request->description;
        $project->link = $request->link;

//        if (isset($request->is_current)) {
//            $project->current = true;
//        }

        $project->save();

        return redirect()->route('view.project', ['project' => $project])
            ->with(['success_msg' => 'Successfully updated project!']);
    }


    public function destroy(Project $project) {

        $this->authorize('update', $project);

        $project->delete();

        return redirect()->route('my.projects')->with(['success_msg' => 'Successfully deleted project!']);
    }
}

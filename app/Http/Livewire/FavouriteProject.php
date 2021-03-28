<?php

namespace App\Http\Livewire;

use http\Env\Request;
use Livewire\Component;
use App\Models\Project;

class FavouriteProject extends Component
{
    protected $listeners = ['store' => '$refresh'];

    public $project;

    public function mount(Project $project)
    {
        $this->project = $project;
    }

    public function store($value, Project $project) {

        $user = auth()->user();

        if ( $this->project->favouritedBy($user) AND $value == -1) {

            $user->favourites()->where('project_id', $this->project->id)->delete();

            $this->dispatchBrowserEvent('unfavourited');

        } else if (!$this->project->favouritedBy($user) AND $value == 1) {

            if ($this->project->favourites()->withTrashed()->count() > 0) {
                $this->project->favourites()->restore();
            } else {
                $this->project->favourites()->create([
                    'user_id' => $user->id
                ]);
            }

            $this->dispatchBrowserEvent('favourited');

        }

        $this->emit('store');

    }


    public function render()
    {
        return view('livewire.favourite-project');
    }
}

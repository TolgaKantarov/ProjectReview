@if ( !$project->favouritedBy(auth()->user()) )
    <button class="btn btn-outline-secondary" wire:click="store(1)" wire:loading.attr="disabled"><i class="far my-1 fa-star"></i> {{$project->favourites()->count()}}</button>
@else
    <button class="btn btn-outline-warning" wire:click="store(-1)" wire:loading.attr="disabled"><i class="fas my-1 fa-star"></i> {{$project->favourites()->count()}}</button>
@endif



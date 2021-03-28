@extends('layouts.app')

@section('content')

    <div class="container">

        @if (session('success_msg'))
            <div class="alert alert-success">
                {{ session('success_msg') }}
            </div>
        @endif

        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="jumbotron border">
                    <div class="container">
                        <h2 class="display-5">All projects</h2>
                        <p>Projects submitted by everyone: {{ $projects->total() }}</p>

                    </div>
                </div>
            </div>
        </div>

        <div class="py-10">

            @if ($projects->count() > 0)
                <table class="table">
                    <thead>
                    <tr>
                        <th>Name</th>
                        <th>Submitted</th>
                        <th>Status</th>
                        <th class="text-right"></th>
                    </tr>
                    </thead>
                    <tbody>

                    @foreach ($projects as $project)

                    <tr class="bg-white">
                        <td class="align-middle">
                            <i>{{ $project->title }}</i>
                            @if ($project->user == auth()->user())
                                <small class="text-success">(Your project)</small>
                            @endif
                        </td>
                        <td class="align-middle">
                            {{ $project->created_at->diffForHumans() }}
                        </td>
                        <td class="align-middle">
                            @if ($project->active == true)
                                <span class="badge badge-success">Active</span>
                            @else
                                <span class="badge badge-danger">Not active</span>
                            @endif
                        </td>
                        <td class="text-right">
                            <div class="d-inline p-2">
                                <a href="{{ route('view.project', $project) }}" class="btn btn-outline-primary">View</a>
                                @auth
                                    @if ($project->user != auth()->user())
                                        @livewire('favourite-project', ['project' => $project])
                                    @else
                                        <button class="btn btn-outline-warning" disabled><i class="fas my-1 fa-star"></i> {{$project->favourites()->count()}}</button>
                                    @endif
                                @endauth
                            </div>
                        </td>
                    </tr>

                    <tr class="bg-white">
                        <td colspan="5">
                        </td>
                    </tr>

                    @endforeach

                    </tbody>
                </table>

                <div class="float-right">{{ $projects->links() }}</div>

            @else
                <p>No projects found.</p>
            @endif

            </div>
        </div>

        <script>
            toastr.options = {
                "closeButton": true,
                "newestOnTop": false,
                "progressBar": true,
                "positionClass": "toast-top-center",
                "preventDuplicates": false,
                "onclick": null,
                "showDuration": "300",
                "hideDuration": "1000",
                "timeOut": "5000",
                "extendedTimeOut": "1000",
                "showEasing": "swing",
                "hideEasing": "linear",
                "showMethod": "fadeIn",
                "hideMethod": "fadeOut"
            }

            window.addEventListener('favourited', event => {
                toastr.info('Added to favourites');
            })

            window.addEventListener('unfavourited', event => {
                toastr.info('Removed from favourites');
            })
        </script>

@endsection

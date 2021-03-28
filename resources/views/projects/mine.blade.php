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
                        <h2 class="display-5">Your projects</h2>
                        <p>Projects submitted by you: {{ $projects->total() }}</p>

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
                            <a href="{{ route('view.project', $project) }}" class="btn btn-outline-primary">View</a>
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

@endsection

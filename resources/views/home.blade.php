@extends('layouts.app')

@section('content')
<div class="container">

    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="jumbotron">
                <div class="container">
                    <h2 class="display-5">Welcome to ProjectReview!</h2>
                    <p>You can submit your projects for review or you can review other developers projects.</p>
                    <p><a class="btn btn-primary btn-lg" href="{{route('submit.project')}}" role="button">Submit project »</a></p>
                </div>
            </div>
        </div>
    </div>

    <div class="pb-5 pt-3">
        <div class="container">
            <div class="text-center mb-5">
                <h3>Recently submitted projects</h3>
            </div>

            <div class="col-lg-12 mb-3">

                @forelse ($projects as $project)

                        <div class="card mb-2">
                            <ul class="list-group list-group-flush">
                                <li class="list-group-item">
                                    <a href="{{ route('view.project', $project) }}" class="link-unstyled text-primary">{{$project->title}}</a>
                                </li>
                            </ul>
                        </div>
                @empty
                <p>No submitted projects yet!</p>
                @endforelse

                @if ($projects)
                    <div class="d-flex float-right my-3">
                        <a href="#">View all</a>
                    </div>
                    @endif
            </div>

            </div>
        </div>
    </div>

</div>

@endsection

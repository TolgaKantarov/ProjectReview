@extends('layouts.app')

@section('content')

            <div class="container">

                <div class="row mt-4">
                    <div class="col-md-10 mx-auto">

                        @if (session('success_msg'))
                            <div class="alert alert-success">
                                {{ session('success_msg') }}
                            </div>
                        @endif

                        <article class="mb-6">
                            <h1 class="h2">{{$project->title}}</h1>

                            <small>Submitted by: <a href="#">{{$project->user->name}}</a></small><br>
                            <small>Published: {{$project->created_at->diffForHumans()}}, Last updated: {{$project->updated_at->diffForHumans()}}</small>

                            @can('update', $project)
                                <div class="mt-2">

                                    <a class="btn btn-sm btn-primary" href="{{ route('edit.project', $project) }}">Edit</a>
                                    <a class="btn btn-sm btn-danger" onclick="deleteProject()">Delete</a>

                                    <form action="{{ route('delete.project', $project) }}" method="POST" id="delete-form">
                                        @csrf
                                        @method('DELETE')
                                    </form>

                                </div>
                            @endcan

                            <hr>

                            @if ($project->description)
                                {!! $project->description !!}
                            @else
                                <p><em>No description yet</em></p>
                            @endif

                            <button onclick="viewGithubLink()" class="btn mt-4 btn-outline-github btn-block"><i class="mr-1 fab fa-github"></i>Open in Github</button>

                            <hr class="my-5">

                            <h3>Responses</h3>

                            <div class="card mb-3">
                                <div class="card-body">
                                    <div class="media">
                                        <div class="media-body">
                                            <a href="#"><b>Tolga Kantarov</b></a>
                                            <p class="mt-3 mb-2">Vestibulum volutpat pretium libero. Cras id dui. Aenean ut eros et nisl sagittis vestibulum. Phasellus nec sem in justo pellentesque facilisis.</p>
                                            <time class="timeago text-muted" datetime="2017-11-20 20:00" data-tid="3">3 years ago</time>
                                            <a class="float-right" href="#"><span class="far fa-comment"></span> Reply</a>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            @auth
                                <div class="card mb-3 mt-5">
                                    <div class="card-body">
                                        <h5 class="card-title">Write a response</h5>

                                        <textarea class="form-control mt-3" rows="3" placeholder="Write a response.."></textarea>

                                        <a href="#" class="btn btn-success mt-3">Publish</a>

                                    </div>
                                </div>
                            @endauth

                        </article>

                    </div>

                </div>
            </div>

    <style>
        body.swal2-shown > [aria-hidden="true"] {
            filter: blur(10px);
        }

        body > * {
            transition: 0.1s filter linear;
        }
    </style>

    <script>

        function viewGithubLink() {
            Swal.fire({
                title: 'Warning!',
                html: '<b>Do you want to open the following link:</b> <em>{{$project->link}}</em>' ,
                icon: 'warning',
                confirmButtonText: 'Open link',
                showCancelButton: true,
            }).then((result) => {
                if (result.isConfirmed) {
                    window.open("{{$project->link}}");
                }
            })
        }

        function deleteProject() {
            Swal.fire({
                title: 'Warning!',
                html: 'Are you sure you want to delete this project?' ,
                icon: 'error',
                confirmButtonText: 'Delete project',
                showCancelButton: true,
            }).then((result) => {
                if (result.isConfirmed) {
                    $("#delete-form").submit();
                }
            })
        }

    </script>

@endsection

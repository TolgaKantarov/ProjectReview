@extends('layouts.app')

@section('content')

            <div class="container">
                <div class="row">

                    <div class="col-md-12 mx-auto">

                            @auth
                                <div class="card mb-3">
                                    <div class="card-body">
                                        <h5 class="card-title">Submit a project for review</h5>

                                        <hr>

                                        <form action="{{ route('store.project') }}" method="POST">
                                            @csrf

                                            <div class="form-group">
                                                <label for="title">Project title:</label>

                                                <input id="title" type="text" class="form-control @error('title') is-invalid @enderror" name="title" value="{{ old('title') }}"  autofocus>

                                                @error('title')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                                @enderror
                                            </div>

                                            <div class="form-group">
                                                <label for="description">Project description:</label>

                                                <textarea id="editor" rows="6" placeholder="Write a description of the project or any
                                                specific areas/topics/questions you want to be reviewed.."
                                                          class="form-control @error('description') is-invalid @enderror"
                                                          name="description" value="{{ old('description') }}"  autofocus>
                                                </textarea>

                                                @error('description')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                                @enderror
                                            </div>

                                            <div class="form-group">
                                                <label for="link">Github repository URL:</label>

                                                <input type="url" class="form-control @error('link') is-invalid @enderror" name="link" value="{{ old('link') }}"  autofocus>

                                                @error('link')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                                @enderror
                                            </div>

                                            <button type="submit" class="btn btn-success mt-3">Publish</button>
                                        </form>


                                    </div>
                                </div>
                            @endauth

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


    </script>

@endsection

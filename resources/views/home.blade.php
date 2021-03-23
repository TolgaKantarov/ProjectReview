@extends('layouts.app')

@section('content')
<div class="container">

    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="jumbotron">
                <div class="container">
                    <h2 class="display-5">Welcome to ProjectReview!</h2>
                    <p>You can submit your projects for review or you can review other developers projects.</p>
                    <p><a class="btn btn-primary btn-lg" href="#" role="button">Submit project »</a></p>
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
                    <div class="card">
                        <ul class="list-group list-group-flush">
                            <li class="list-group-item">
                                <a href="#" class="link-unstyled text-primary">How many projects can I have?</a>
                            </li>
                            <li class="list-group-item">
                                <a href="#" class="link-unstyled text-primary">Are there technical requirements for this?</a>
                            </li>
                            <li class="list-group-item">
                                <a href="#" class="link-unstyled text-primary">Where do I update a project info?</a>
                            </li>
                            <li class="list-group-item">
                                <a href="#" class="link-unstyled text-primary">How do I cancel a project?</a>
                            </li>
                        </ul>
                    </div><!-- /.card -->

                    <div class="d-flex float-right my-3">
                        <a href="#">View all</a>
                    </div>
                </div>

            </div><!-- /.row -->
        </div><!-- /.container -->
    </div>

</div>

@endsection

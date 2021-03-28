@extends('layouts.app')

@section('content')

    <div class="intro py-5 py-lg-9 position-relative text-white">
        <div class="bg-overlay-primary">
            <img src="https://images.unsplash.com/photo-1454165804606-c3d57bc86b40?ixid=MXwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHw%3D&ixlib=rb-1.2.1&auto=format&fit=crop&w=1050&q=80" class="img-fluid img-cover">
        </div>
        <div class="intro-content py-6 text-center">
            <div class="container">
                <div class="row align-items-center">
                    <div class="col-12 col-sm-10 col-md-8 col-lg-6 mx-auto text-center">
                        <h1 class="my-3 display-4 d-none d-lg-inline-block">{{config('app.name', 'Laravel')}}</h1>
                        <span class="h1 my-3 d-inline-block d-lg-none">Robust UI Kit</span>
                        <p class="lead mb-3">Robust is a premium theme built with Bootstrap. The theme is fully customizable &amp; can be used for any type of application.</p>
                        <a class="btn btn-success btn-lg mr-lg-2 my-1" href="" role="button">Get started</a>
                        <a class="btn btn-outline-white btn-lg my-1" href="" role="button">Components</a>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection

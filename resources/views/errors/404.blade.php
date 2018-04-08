@extends('layouts.base_html', ['bodyClass' => 'app flex-row align-items-center'])

@section('body')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-6">
                <div class="clearfix">
                    <h1 class="float-left display-3 mr-4">404</h1>
                    <h4 class="pt-3">Oops! You're lost.</h4>
                    <p class="text-muted">The page you are looking for was not found.</p>
                    <p>
                        <a href="/" class="btn btn-info">
                            <i class="fas fa-arrow-left fa-fw"></i> Back to site
                        </a>
                    </p>
                </div>
            </div>
        </div>
    </div>
@endsection
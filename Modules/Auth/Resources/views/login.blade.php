@extends('layouts.base_html', ['bodyClass' => 'app flex-row align-items-center'])

@section('title', 'Login')

@section('body')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-6">
                <div class="card-group">
                    <div class="card p-4">
                        <form method="post" class="card-body" action="{{ route('auth.post.login') }}">
                            @csrf
                            <h1>{{ __('Login') }}</h1>
                            <p class="text-muted">{{ __('Sign in to your account') }}</p>
                            {{--Username--}}
                            <div class="input-group mb-3">
                                <div class="input-group-prepend">
                                    <span class="input-group-text"><i class="fas fa-user"></i></span>
                                </div>
                                <input type="text"
                                       class="form-control {{ $errors->has('username') ? 'is-invalid' : '' }}"
                                       name="username" value="{{ old('username') }}"
                                       placeholder="Username" autofocus required>
                                @if($errors->has('username'))
                                    <div class="invalid-feedback">
                                        {{ $errors->first('username') }}
                                    </div>
                                @endif
                            </div>
                            {{--Password--}}
                            <div class="input-group mb-4">
                                <div class="input-group-prepend">
                                    <span class="input-group-text"><i class="fas fa-key"></i></span>
                                </div>
                                <input type="password" name="password" class="form-control" placeholder="Password"
                                       required>
                            </div>
                            <div class="row">
                                <div class="col-6">
                                    <button type="submit" class="btn btn-primary px-4">Login</button>
                                </div>
                                <div class="col-6 text-right">
                                    <a href="#" class="btn btn-link px-0">Forgot password?</a>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

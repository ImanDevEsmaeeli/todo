@extends('layouts.master')

@section('title', 'Login')

@section('content')
    <div class="row justify-content-center">
        <div class="col-md-6">

            @include('layouts.error')
            @include('layouts.success')

            <div class="card">
                <div class="card-header">Login</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('login') }}">
                        @csrf

                        <div class="form-group">
                            <label for="email">Email</label>
                            <input id="email" type="email" class="form-control" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>
                        </div>

                        <div class="form-group">
                            <label for="password">Password</label>
                            <input id="password" type="password" class="form-control" name="password" required autocomplete="current-password">
                        </div>

                        <div class="form-group">
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>
                                <label class="form-check-label" for="remember">
                                    Remember Me
                                </label>
                            </div>
                        </div>

                        <button type="submit" class="btn btn-primary">Login</button>

                        <a class="btn btn-link" href="">
                            Forgot Your Password?
                        </a>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection

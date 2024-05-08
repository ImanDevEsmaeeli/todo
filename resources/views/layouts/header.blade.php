<!DOCTYPE html>
<html lang="en">
<header>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title')</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css"
          integrity="sha384-ConqyFbsCDBEHXdymx￥MxqU7eSxh1NJzcq8vYQhDkjdwEYd+z2+gXqpIhJgkxn5Q@" crossorigin="anonymous">

    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <div class="container">
            <a class="navbar-brand" href="{{route('task.index')}}">{{ config('app.name') }}</a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav"
                    aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ml-auto">
                    @guest
                        <li class="nav-item">
                            <a class="nav-link" href="{{route('login.view')}}">Login</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{route('signup.view')}}">Signup</a>
                        </li>
                    @endguest
                    @auth
                        <form class="nav-link" action="{{ route('logout') }}" method="POST">
                            @csrf
                            <button class="nav-link"  href="{{route('logout')}}">Logout</button>
                        </form>
                    @endauth
                </ul>
            </div>
        </div>
    </nav>

    @yield('style')
</header>

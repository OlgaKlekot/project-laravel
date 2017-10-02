<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link rel="stylesheet" href="/css/style.css">
</head>
<body>
<header>
    <nav>
        <a href="{{ route('main_page') }}"><input type="button" class="button" value="Main Page"></a>
        @auth
            <a href="{{ route('user_cabinet') }}"><input type="button" class="button" value="User Cabinet"></a>
            <a href="{{ route('add_post') }}"><input type="button" class="button" value="Add new Post"></a>
        @else
            <a href="{{ route('registration') }}"><input type="button" class="button" value="Registration"></a>
        @endauth
    </nav>

    <div class="in_out">
        @auth
            <form class="log_out" method="post" action="{{ route('logout') }}">
                <button class="button">Log out</button>
                {{ csrf_field() }}
            </form>
        @else
            <form class="log_in" method="post" action="{{ route('login') }}">
                {{ csrf_field() }}
                <input placeholder="E-Mail Address" id="email" type="email" name="email" required class="field topfield form-control">
                <input type="password" name="password" required placeholder="Password" class="field topfield">
                <button class="button">Log in</button>
            </form>
        @endauth
    </div>
</header>

@if ($errors->has('email'))
    <span class="help-block">
            <div class="alert" role="alert">
                {{ $errors->first('email') }}
            </div>
        </span>
@endif
@if ($errors->has('password'))
    <span class="help-block">
            <div class="alert" role="alert">
                {{ $errors->first('password') }}
            </div>
        </span>
@endif

@if($flash = session('message'))
    <div class="alert alert-success" role="alert">
        {{$flash}}
    </div>
@endif

<div class="page">
    @yield('content')
</div>

</body>
</html>
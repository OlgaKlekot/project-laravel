@extends('template')

@section('content')
<form action="{{route('register')}}" id="usToAdd" class="registration" name="register" method="post">
        {{ csrf_field() }}

    @if ($errors->has('name'))
        <span class="help-block">
            <div class="alert" role="alert">
                {{ $errors->first('name') }}
            </div>
        </span>
    @endif

        <h1>Registration</h1>

        <label for="login">Login </label>
        <input name="name" class="field form-control" id="login" required/>

        <label for="email">E-Mail Address </label>
        <input id="email" type="email" class="field form-control" name="email" required/>

        <label for="passWord">Enter your Password</label>
        <input class="field form-control" id="password" name="password" type="password"/>

        <label for="password-confirm">Confirm the Password</label>
        <input class="field form-control" id="password-confirm" name="password_confirmation" type="password" required/>

        <div class="buttons">
            <input class="button" type="reset" name="reset" value="Reset"/>
            <input class="button" type="submit" name="register" value="Register" form="usToAdd"/>
        </div>
</form>
@endsection
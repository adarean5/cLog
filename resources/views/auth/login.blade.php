<!DOCTYPE html>

<meta charset="UTF-8" />
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Sign in</title>
<link rel="icon" href="/images/logo.svg">
<link rel="stylesheet" type="text/css" href="/css/login.css">

<div class="container">
    <img src="/images/logo.svg" alt="">
    <h1 class="pageTitle">ContactLog</h1>

    <div>
        <form class="loginform" action="{{ route('login') }}" method="post">
            {{csrf_field()}}
            <p>
                <input type="email" name="email" placeholder="Email" autocomplete="off"
                       required autofocus /><br/>
                <input type="password" name="password" required placeholder="Password" />
            </p> <br>

            <p><button type="submit">SIGN IN</button></p>

            @include('layouts.errors')

        </form>

        <form class="signup" action="{{ route('register') }}">
            <div>
                <p>Don't have an account yet?</p>
                <input type="submit" id="subid" value="Sign up">
            </div>
        </form>
    </div>
</div>


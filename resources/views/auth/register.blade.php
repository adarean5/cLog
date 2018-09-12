<!DOCTYPE html>

<meta charset="UTF-8" />
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Register</title>
<link rel="icon" href="/images/logo.svg">
<link rel="stylesheet" type="text/css" href="/css/login.css">

<div class="container">
    <img src="/images/logo.svg" alt="">
    <h1 class="pageTitle">Create account</h1>

    <div>
        <form class="loginform" action="{{ route('register') }}" method="post">
            {{csrf_field()}}

            <p>
            <input type="text" name="name" id="name" placeholder="Username" autocomplete="off" required autofocus />
            <br/>
            <input type="password" name="password" id="password" required placeholder="Password"
                   pattern=".{6,}" title="The password must be at least 6 characters. "/>
            <br>
            <input
                type="password" name="password_confirmation" id="password-confirmation"
                required placeholder="Confirm Password" pattern=".{6,}" title="The password must be at least 6 characters." />
            <br>
            <input type="email" name="email" id="email" required placeholder="Email" />
            </p>
            <br>
            <p><button type="submit">CREATE ACCOUNT</button></p>
            @include('layouts.errors')
        </form>

        <form class="signup" action="{{ route('login') }}">
            <div>
                <Label>Have an account?<input type="submit" id="subid" value="Sign in" ></Label>
            </div>
        </form>
    </div>
</div>

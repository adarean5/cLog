<!DOCTYPE html>
<html lang="en">

<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<meta http-equiv="X-UA-Compatible" content="ie=edge">
<meta name="csrf-token" content="{{ csrf_token() }}" />
<title>cLog</title>
<link rel="icon" href="/images/logo.svg">
<link rel="stylesheet" type="text/css" href="/css/app.css">
<script src="https://code.jquery.com/jquery-3.3.1.min.js"
        integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8="
        crossorigin="anonymous">
</script>
<script src="/js/script.js"></script>

@include('layouts.nav')

<div id="main">

    @include('layouts.add-card')

    @include('layouts.header')

    @yield('content')

    @include('layouts.footer')

</div>

</html>

<form action = "/logout" method = "post">
    {{ csrf_field() }}
    <button class="userButton" type="submit">Log out</button>
</form>


<p>
    {{ Auth::user()->name }}
</p>

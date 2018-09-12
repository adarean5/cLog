<?php //xdebug_break(); ?>

<div class="card" id="card{{ $content['id'] }}" style="display: none">
    <div id="contactProfile" style="background: {{ $color }}">
        <div class="dropdown">
            <input type="image" name="Drop Button" id="dropDownButton" src="/images/dot-menu.svg" alt ="Menu" class="cardMenuButton">
            <div id="myDropdown" class="dropdown-content">
                <button class = editButton>Edit</button>
                <button class = deleteButton>Delete</button>
            </div>
        </div>
        <img src="/images/contactIcon.svg" alt="Avatar" >
        <p class="pFullName"><b>{{ $content['name']." ".$content['lastname'] }}</b></p>
    </div>

    <div id="contactContent">
        <div class="container">
            <img src="/images/work.svg" alt="Org::">
            <p class="pOrg">{{ $content['organization'] }}</p>
            <br>
            <img src="/images/mail.svg" alt="Email:">
            <p class="pEmail">{{ $content['email'] }}</p>
            <br>
            <img src="/images/phone.svg" alt="Phone:">
            <p class="pPhone">{{ $content['phone'] }}</p>
            <br>
            <img src="/images/info.svg" alt="Desc:">
            <p class="pDesc">{{ $content['description'] }}</p>
            <br>
        </div>
    </div>
</div>

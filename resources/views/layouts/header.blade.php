<header>
    <input type="image" name="Side Menu" id="sideMenuButton" src="/images/line-menu.svg" alt="Side Menu">
    Contacts
    <div id="userCorner">
        <input id='profileButton' type="image" src="images/contactIcon.svg"/>
        <div class="profileDropdown">
            <div id="dropdownPicture">
                <img src="images/contactIcon.svg">
            </div>
            <div id="dropdownContent">
                <p id="dropdownName">
                    {{ Auth::user()->name }}
                </p>
                <p id="dropdownMail">
                    {{ Auth::user()->email }}
                </p>
                <form action = "/logout" method = "post">
                    {{ csrf_field() }}
                    <button class="userButton" type="submit">Log out</button>
                </form>
            </div>

        </div>
    </div>
</header>

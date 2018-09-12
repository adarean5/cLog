<!-- The Modal -->
<!-- The Modal -->
<div id="myModal" class="contactDialogueBackground">
    <!-- Modal content -->
    <div class="contactDialogue">
        <span class="close">&times;</span>
        <div id="left">
            <img id="selectPhoto" src="images/contactIcon.svg">
            <div>
                <select id="selectFolder">
                    @foreach($folders as $folder)
                        <option>
                            {{ $folder->name }}
                        </option>
                    @endforeach
                </select>
            </div>
            <div class="mandatory">
                <img src="images/person.svg">
                <input id="first" type="text" autofocus placeholder="First name" class="contactInput" required="required"/>
                <p>●</p>
            </div>
            <div class="mandatory">
                <img src="images/person.svg">
                <input id="last" type="text" placeholder="Last Name" class="contactInput" required="required"/>
                <p>●</p>
            </div>
        </div>

        <div id="right">
            <div>
                <img src="images/work.svg">
                <input id="org"  placeholder="Organization" class="contactInput">
                <p>●</p>
            </div>
            <div>
                <img src="images/mail.svg">
                <input id="email"  type="email" placeholder="Email" class="contactInput">
                <p>●</p>
            </div>
            <div>
                <img src="images/phone.svg">
                <input id="phone"  placeholder="Phone" type="tel" class="contactInput">
                <p>●</p>
            </div>
            <br>
            <div id="descDiv">
                <img src="images/info.svg">
                <textarea id="desc"  placeholder="Description" class="contactInput"></textarea>
            </div>
            <div id="confirmContact">
                <button id="newContactButton" class="smallerButton">
                    Add Contact
                </button>
            </div>
        </div>
    </div>
    <p> &nbsp; </p>

</div>

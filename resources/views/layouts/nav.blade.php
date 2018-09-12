<nav id="mainNav">
    <img class="logo" src="/images/logo.svg" alt="Logo">
    <div id="pageTitle">
        <p>ContactLog</p>
        <hr class="divLine">
    </div>

    <button id="newContact">
        New Contact
    </button>

    <br>

    <div class="folder-section">
        <div class="folder-header">
            <h5> Folders </h5>
            <button> EDIT </button>
        </div>
        <ul>
            @foreach($folders as $folder)
                <li>
                    {{ $folder->name }} <p style="color: {{ $folder->color }}">●</p>
                </li>
            @endforeach

            <hr>

            <li id="add-folder">
                <div id="add-folder-text">Add folder</div>
                <div id="add-folder-input">
                    <input type="text" autofocus placeholder="Folder name"  required="required"/>
                    <p>&#10004</p>
                </div>
            </li>
        </ul>
    </div>
</nav>

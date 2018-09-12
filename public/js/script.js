"use strict";

const contactGrid = ".contactGrid";
const colors = ['#5c007a', '#c158dc', '#ffab00', '#ffdd4b', '#c67c00'];

$(document).ready(function(){
    let navDisplayed = false;
    const addContactButton = $('#newContactButton');
    const folderNameInput = $('#add-folder-input>input');

    addListeners();
    $('.card').show();

    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });

    $('.profileDropdown').hide();
    $('.contactDialogue').hide();

    //profileButton
    $('#profileButton').click(function() {
        $("#profileButton").click = null;
        let clickedMenu = $(this).parent().find(".profileDropdown");
        $(clickedMenu).slideToggle(200);
    });

    $("#newContact").click(function() {
        //toggleAddDialogue($(this));
        $(addContactButton).html('Add Contact');
        $(addContactButton).unbind();
        $(addContactButton).click(function(){
            addContact($(contactGrid));
        });
        $('.contactDialogueBackground').show(0 ,function () {
            $('.contactDialogue').slideDown('200');
        });
    });

    $('.close').click(function () {
        $(this).parent().slideUp('100', function () {
            $(this).parent().hide();
        });
    });

    $("#sideMenuButton").click(function(){
        if(!navDisplayed){
            $("#mainNav").show(500);
        }
        else{
            $("#mainNav").hide(500);
        }
        navDisplayed = !navDisplayed;
    });

    $('#add-folder-text').click(function () {
        $('#add-folder-text').hide(200, function () {
            $('#add-folder-input').show(200);
        });
    });
    
    $('#add-folder-input>p').click(function () {
        if ($(folderNameInput).val() !== ''){
            $('#add-folder-input').hide(200, function () {
                $.ajax({

                    url: '/tag/store',
                    type: 'POST',
                    data: {
                        name: $(folderNameInput).val()
                    },
                    dataType: 'JSON',

                    success: function (data) {
                        console.log('ok');
                        $('.folder-section>ul').prepend(`<li>${$(folderNameInput).val()}</li>`);
                        $(folderNameInput).val('');
                        $('#add-folder-text').show(200);
                    }
                });
            });
        }
    });

    function toggleCardMenu(cardId) {
        let cardMenuButton = $(cardId).find(".cardMenuButton");

        $(cardMenuButton).click(function() {
            $(".cardMenuButton").click = null;
            let clickedMenu = $(this).parent().find(".dropdown-content");
            $(clickedMenu).toggle(300);
        });
    }

    function addListeners(){
        $('.card').each(function() {
            toggleCardMenu('#'+this.id);
            deleteCard(this.id.replace('card', ''));
            editCard(this.id.replace('card', ''));
        });
    }

    function editCard(cardId) {
        let cardEditButton = $("#card" + cardId).find(".editButton");

        $(cardEditButton).click(function(){
            console.log('update');

            let card = $(this).parent().parent().parent().parent();
            let fullName = $(card).find(".pFullName").text().split(" ");
            let org = $(card).find(".pOrg").text();
            let email = $(card).find(".pEmail").text();
            let phone = $(card).find(".pPhone").text();
            let desc = $(card).find(".pDesc").text();

            $('#first').val(fullName[0]);
            $('#last').val(fullName[1]);
            $('#org').val(org);
            $('#email').val(email);
            $('#phone').val(phone);
            $('#desc').val(desc);

            $(addContactButton).html('Edit Contact');

            $('.contactDialogueBackground').show(0 ,function () {
                $('.contactDialogue').slideDown('200');
            });

            $(addContactButton).unbind();
            $(addContactButton).click(function(){
                let folder = $('#selectFolder').val();
                let name = $('#first').val();
                let lastname = $('#last').val();
                let org = $('#org').val();
                let email = $('#email').val();
                let phone = $('#phone').val();
                let desc = $('#desc').val();

                $.ajax({

                    url: '/content/update',
                    type: 'PUT',
                    data: {
                        id: cardId,
                        folder: folder,
                        name: name,
                        lastname: lastname,
                        organization: org,
                        email: email,
                        phone: phone,
                        description: desc,
                    },
                    dataType: 'JSON',

                    success: function (data) {
                        console.log('ok');
                        $(card).find('.pFullName').text(name + ' ' + lastname);
                        $(card).find(".pOrg").text(org);
                        $(card).find(".pEmail").text(email);
                        $(card).find(".pPhone").text(phone);
                        $(card).find(".pDesc").text(desc);

                        $('.contactDialogue').slideUp('100', function () {
                            $(this).parent().hide();
                        });
                    }
                });
            });
        });
    }
    
    function deleteCard(cardId) {
        let cardDeleteButton = $("#card" + cardId).find(".deleteButton");

        $(cardDeleteButton).click(function(){
            console.log('delete');
            $.ajax({
                /* the route pointing to the post function */
                url: '/content/destroy',
                type: 'DELETE',
                data: {
                    id: cardId
                },
                dataType: 'JSON',
                /* remind that 'data' is the response of the AjaxController */
                success: function (data) {
                    $("#card" + cardId).hide('slow');
                    //$(cardId).remove();
                }
            });
        });
    }

    function addContact (contactGrid){
        let isValidForm = true;
        if ( isValidForm ){
            let folder = $('#selectFolder').val();
            let name = $("#first").val();
            let last = $("#last").val();
            let org = $("#org").val();
            let email = $("#email").val();
            let phone = $("#phone").val();
            let desc = $("#desc").val();

            $.ajax({
                url: '/content/store',
                type: 'POST',
                data: {
                    folder: folder,
                    name: name,
                    lastname:last,
                    organization: org,
                    email: email,
                    phone: phone,
                    description: desc
                },
                dataType: 'JSON',

                success: function (data) {
                    $('.contactDialogue').slideUp('100', function () {
                        $(this).parent().hide();
                    });

                    let cardId = "card" + data.id;
                    console.log('card id = ' + cardId);

                    let html = `
                        <div class="card" id="${cardId}" style="display: none">
                            <div id="contactProfile" style="background: ${data.color}">
                                <div class="dropdown">
                                    <input type="image" name="Drop Button" id="dropDownButton" src="/images/dot-menu.svg" alt ="Menu" class="cardMenuButton">
                                    <div id="myDropdown" class="dropdown-content">
                                        <button class = editButton>Edit</button>
                                        <button class = deleteButton>Delete</button>
                                    </div>
                                </div>
                                <img src="/images/contactIcon.svg" alt="Avatar" >
                                <p class="pFullName"><b>${name + ' ' + last}</b></p>
                            </div>
                            
                            <div id="contactContent">
                                <div class="container">
                                    <img src="/images/work.svg" alt="Org::">
                                    <p class="pOrg">${org}</p>
                                    <br>
                                    <img src="/images/mail.svg" alt="Email:">
                                    <p class="pEmail">${email}</p>
                                    <br>
                                    <img src="/images/phone.svg" alt="Phone:">
                                    <p class="pPhone">${phone}</p>
                                    <br>
                                    <img src="/images/info.svg" alt="Desc:">
                                    <p class="pDesc">${desc}</p>
                                    <br>
                                </div>
                            </div>
                        </div>
                    `;
                    $(contactGrid).prepend(html);

                    toggleCardMenu('#'+cardId);
                    deleteCard(data.id);
                    editCard(data.id);

                    $('#'+ cardId).show('slow');
                    //$(contactGrid).prepend(data.email);
                }
            });
        }
    }
});

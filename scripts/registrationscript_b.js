var btn = document.getElementById("register_btn");

var regForm = document.getElementById("registration_form");

var errmsg = "";

function regValidation() {
    errmsg = "";

    var email = $('#user_email_txt').val();
    var company_name = $('#person_company_txt').val();
    var phone = $('#user_phone_txt').val();
    var password = $('#register_password_txt').val();
    var passowrd1 = $('#co_register_password_txt').val();

    var dataString = 'email=' + email + '&company_name=' + company_name + '&phone=' + phone + '&password=' + password;

    $('#regModal').remove('.invalid-feedback');
    $("#register_btn").text("Verifying...");


    emailValidation();
    nameValidation();
    phoneValidation();
    passwordValidation();


    if (errmsg.length > 5) {
        $('#failure_alert').show();
        $('#success_alert').hide();
        $('#regModal').animate({
            scrollTop: 0
        }, 'slow');

    } else {

        $.ajax({
            type: "POST",
            url: "registrationpost.php",
            data: dataString,
            cache: false,
            success: function (response) {


                console.log(response[0]);

                if (response[0]) {
                    $('#failure_alert').hide();
                    $('#success_alert').show();
                    $("#register_btn").removeClass("btn-primary").addClass("btn-success");
                    $("#register_btn").text("");
                    $("#register_btn").append('<i class="fas fa-check" style="color:white"></i>');
                    resetForm();
                } else {
                    $("#register_btn").text("Register");
                    $("#user_email_txt").addClass('is-invalid');
                    errmsg += "Enter a valid email \n";
                    $('#failure_alert').text(errmsg);
                    $('#failure_alert').show();

                }


            }

        });

    }
}

function emailValidation() {
    var email = $('#user_email_txt').val();
    if (email == "" || email == null) {


        $("#user_email_txt").addClass('is-invalid');
        errmsg += "Enter your email address \n";


    } else {

        $("#user_email_txt").removeClass('is-invalid');
    }
}

function nameValidation() {
    var company_name = $('#person_company_txt').val();

    if (company_name == "" || company_name == null) {


        $("#person_company_txt").addClass("is-invalid");
        errmsg += "Enter your name or company name \n";


    } else {

        $("#person_company_txt").removeClass("is-invalid");
    }

}

function phoneValidation() {

    var phone = $('#user_phone_txt').val();
    if (phone == "" || phone == null) {
        $("#user_phone_txt").addClass("is-invalid");
        errmsg += "Enter your name or company name \n";


    } else {
        $("#user_phone_txt").removeClass("is-invalid");

    }
}

function passwordValidation() {

    var password = $('#register_password_txt').val();
    var passowrd1 = $('#co_register_password_txt').val();

    if ($('#register_password_txt').val() == "" || $('#register_password_txt').val() == null) {
        $("#register_password_txt").addClass("is-invalid");

        errmsg += "Enter password \n";

    } else if (password.length <= 7) {

        $("#register_password_txt").addClass("is-invalid");

        errmsg += "Password should have a minimum of 8 characters \n";

    } else {

        $("#register_password_txt").removeClass('.invalid-feedback');

    }

    if (password.length <= 7 && password != passowrd1) {

        $("#register_password_txt").addClass("is-invalid");
        $("#co_register_password_txt").addClass("is-invalid");

        errmsg += "Passwords don't match \n";

    } else {

        $("#register_password_txt").removeClass("is-invalid");
        $("#co_register_password_txt").removeClass("is-invalid");


    }
}
/*$(document).click(function (event) {
    event.preventDefault();
    //if you click on anything except the modal itself or the "open modal" link, close the modal
    if (!$(event.target).closest(".modal,.js-open-modal").length) {
        $('#registration_form').find("input[type=text],input[type=email],input[type=tel],input[type=number],input[type=password], textarea").val("");
    }
});*/

function resetForm() {
    $('#registration_form').find("input[type=text],input[type=email],input[type=tel],input[type=number],input[type=password], textarea").val("");
}
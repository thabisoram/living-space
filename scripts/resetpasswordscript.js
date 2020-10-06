var emailAddress = "";
var emailExists;
var randomCode;
$(document).on("click", "#email_recovery_btn", function (event) {
    event.preventDefault();
    errmsg = "";
    emailAddress = $("#email_recovery_txt").val();

    var dataString = 'email=' + emailAddress;

    emailValidate();
    emailVerify();



});

$(document).on("click", "#code_recovery_btn", function (event) {
    event.preventDefault();
    $("#emailCodeHelp").hide();
    var codeinput = $("#code_recovery_txt").val();

    if (codeinput == randomCode) {
        $("#code_recovery_txt").removeClass("is-invalid");
        $("#code_recovery_txt").addClass("is-valid");
        $("#code_recovery_txt_invalid").hide();
        $("#code_recovery_txt_valid").show();
        $("#code_recovery_btn").removeClass("btn-dark").addClass("btn-success");
        $("#code_recovery_btn").text("")
        $("#code_recovery_btn").append('<i class="fas fa-check" style="color:white"></i>');
        $("a#password_code_recovery").hide(500);
        $("a#new_password_recovery").show(1500);

    } else if (codeinput.length == 0) {
        $("#code_recovery_txt_invalid").show();
        $("#code_recovery_txt").addClass("is-valid");
        $("div#code_recovery_txt_invalid").text("Enter code");
    } else {
        $("#code_recovery_txt_invalid").show();
        $("#code_recovery_txt").addClass("is-valid");
        $("div#code_recovery_txt_invalid").text("Invalid code");
    }

});

$(document).on("click", "#new_password_btn", function (event) {
    event.preventDefault();
    errmsg = "";
    var password = $("#new_password_txt").val();
    var c_password = $("#confirm_password_txt").val();
    console.log("New password " + password);
    console.log("Confirmation password " + c_password);

    $("#passwordHelp").hide();

    var dataString = 'email=' + emailAddress + "&password=" + password;

    if (password == "") {
        $("#new_password_txt").addClass("is-invalid");
        $("div#password_txt_invalid").text("Enter password");
        $("div#password_txt_invalid").show();
        return false;
    } else
    if (password.length < 7) {
        $("#new_password_txt").addClass("is-invalid");
        $("div#password_txt_invalid").text("Password must be 8 characters or more");
        $("div#password_txt_invalid").show();

        return false;
    } else
    if (password != c_password) {
        $("#new_password_txt").addClass("is-invalid");
        $("#confirm_password_txt").addClass("is-invalid");
        $("div#password_txt_invalid").text("Password don't match");
        $("div#password_txt_invalid").show();
        return false;
    } else {
        $.ajax({
            type: 'POST',
            url: 'recoverypassword.php',
            data: dataString,
            success: function (response) {
                if (response == "success") {

                    $("#new_password_txt").removeClass("is-invalid");
                    $("#confirm_password_txt").removeClass("is-invalid");
                    $("div#password_txt_invalid").hide();
                    $("div#password_txt_valid").show();

                    $("#new_password_txt").addClass("is-valid");
                    $("#confirm_password_txt").addClass("is-valid");
                    $("#new_password_btn").removeClass("btn-dark").addClass("btn-success");
                    $("#new_password_btn").text("")
                    $("#new_password_btn").append('<i class="fas fa-check" style="color:white"></i>');
                    DelayRedirect();
                } else {

                }


            }
        });

    }
});


function emailVerify() {
    emailAddress = $("#email_recovery_txt").val();

    var dataString = 'email=' + emailAddress;

    var min = 1000;
    var max = 9999;
    $.ajax({
        type: 'POST',
        url: 'emailcheckpost.php',
        data: dataString,
        success: function (response) {
            if (response == "success") {
                emailExists = 1;
                randomCode = Math.floor(Math.random() * (max - min) + min);
                emailCode();

                $("#email_recovery_txt").removeClass("is-invalid");
                $("#email_recovery_txt").addClass("is-valid");
                $("#email_recovery_txt_invalid").hide();
                $("#email_recovery_txt_valid").show();
                $("#email_recovery_btn").text("")
                $("#email_recovery_btn").append('<i class="fas fa-check" style="color:white"></i>');

                $("#emailHelp").hide();
                $("#email_recovery_btn").removeClass("btn-dark").addClass("btn-success");


                $("a#password_email_recovery").hide(1500);

                $("a#password_code_recovery").show(500);


            } else if (response == "fail") {
                emailExists = 0;
                $("#email_recovery_txt").addClass("is-invalid");
                $("#emailHelp").hide();
                $("div#email_recovery_txt_invalid").text("Oops we can't find this email");
                $("#email_recovery_txt_invalid").show();


            }
        }
    });

}

function emailValidate() {
    emailAddress = $("#email_recovery_txt").val();
    if (emailAddress.length == 0) {
        $("#email_recovery_txt").addClass("is-invalid");
        $("#emailHelp small").text("Enter e-mail");
        $("#emailHelp").hide();
        $("div#email_recovery_txt_invalid").text("Enter email");
        $("#email_recovery_txt_invalid").show();

        return false;
    }
}

function emailCode() {
    emailAddress = $("#email_recovery_txt").val();

    var subject = "Password Recovery"
    var message = "Here's your recovery code <b>" + randomCode + "</b> ";

    var dataString = 'email=' + emailAddress + '&subject=' + subject + "&code=" + randomCode;

    $.ajax({
        type: 'POST',
        url: 'recoverymailer.php',
        data: dataString,
        cache: false,
        success: function (response) {


            console.log(response[0]);

            if (res == "success") {



            } else {

            }


        }
    });

}

function DelayRedirect() {
    var seconds = 5;
    var dvCountDown = document.getElementById("dvCountDown");
    var lblCount = document.getElementById("lblCount");
    dvCountDown.style.display = "block";
    lblCount.innerHTML = seconds;
    setInterval(function () {
        seconds--;
        lblCount.innerHTML = seconds;
        if (seconds == 0) {
            dvCountDown.style.display = "none";
            window.location = "http://localhost:80/LivingSpace/LandingPage.php";
        }
    }, 1000);
}
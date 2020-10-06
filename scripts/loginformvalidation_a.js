var loginForm = document.getElementById("login_form");
var loginModal = document.getElementById("loginModal");

var login_failure_alert = document.getElementById("login_failure_alert");
var errmsg = "";


function loginValidation() {
    errmsg = "";
    var email = $("#login_email_txt").val();
    var password = $("#login_password_txt").val();

    $("#login_password_txt").removeClass("is-invalid");
    $("#login_email_txt").removeClass("is-invalid");

    var dataString = 'email=' + email + '&password=' + password;

    loginEmailValidation(email);
    loginPasswordValidation(password);

    if (errmsg.length > 5) {
        // login_failure_alert.style.display = "block";
        $('#login_failure_alert').show();
    } else {

        $.ajax({
            type: 'POST',
            url: 'loginpost.php',
            data: dataString,
            success: function (response) {
                if (response == "success") {

                    $("#loginModal").hide();
                    $('#login_failure_alert').hide();
                    location.reload(true);

                } else if (response == "fail") {
                    $("#login_email_txt").addClass("is-invalid");
                    $("#login_password_txt").addClass("is-invalid");
                    $("div#error_message").text("Wrong email or password");
                    $("div#error_message").show();
                } else {
                    alert(response);
                }
            }
        });
    }
}



function loginEmailValidation(email) {
    if (email == "" || email == null) {

        $("#login_email_txt").addClass("is-invalid");

        errmsg += "Enter email /n";
        return false;
    } else {
        $("#login_email_txt").removeClass("is-invalid");

    }
}

function loginPasswordValidation(password) {
    if (password == "" || password == null) {

        $("#login_password_txt").addClass("is-invalid");
        errmsg += "Enter password /n";
        return false;
    } else {
        $("#login_password_txt").removeClass("is-invalid");

    }
}
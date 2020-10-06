var error_msg;
$(document).on('click', '#send_email_btn', function (event) {
    event.preventDefault();

    error_msg = "";

    var name = $("#name_contact_form_txt").val();
    var email = $("#email_contact_form_txt").val();
    var subject = $("#subject_contact_form_txt").val();
    var message = $("#msg_contact_form_txt").val();

    contactFormValidation();

    var dataString = "name=" + name + "&email=" + email + "&subject=" + subject + "&message=" + message;

    $.ajax({
        type: "POST",
        url: "contactform.php",
        data: dataString,
        cache: false,
        success: function (response) {
            if (response == "success") {
                $('#contact_form').find("input[type=text],input[type=file],input[type=email],input[type=tel],input[type=number], textarea").val("");
                $('.toast').toast('show');
                $("#alert_success").show();
                $('html, body').animate({
                    scrollTop: $("#alert_success").offset().top
                }, 2000);
            } else {

                $("#alert_danger").text("Message not sent");
                $("#alert_danger").text(response);
                $("#alert_danger").show();
            }
        }
    });

});

function contactFormValidation() {

    //name text field validation
    if ($("#name_contact_form_txt").val() == "" || $("#name_contact_form_txt").val() == null) {
        $("#name_contact_form_txt").addClass('is-invalid');
        error_msg += "Enter your name, \n";
    } else {
        $("#name_contact_form_txt").removeClass('is-invalid');
    }

    //email text field validation
    if ($("#email_contact_form_txt").val() == "" || $("#email_contact_form_txt").val() == null) {
        $("#email_contact_form_txt").addClass('is-invalid');
        error_msg += "enter your email, \n";
    } else {
        $("#email_contact_form_txt").removeClass('is-invalid');
    }

    //subject text field validation
    if ($("#subject_contact_form_txt").val() == "" || $("#subject_contact_form_txt").val() == null) {
        $("#subject_contact_form_txt").addClass('is-invalid');
        error_msg += "enter subject, \n";
    } else {
        $("#subject_contact_form_txt").removeClass('is-invalid');
    }

    //message text field validation
    if ($("#msg_contact_form_txt").val() == "" || $("#msg_contact_form_txt").val() == null) {
        $("#msg_contact_form_txt").addClass('is-invalid');
        error_msg += "enter message \n";
    } else {
        $("#msg_contact_form_txt").removeClass('is-invalid');
    }

    if (error_msg != "") {
        $("#alert_danger").text("");
        $("#alert_danger").text(error_msg);
        $("#alert_danger").show();

        $('html, body').animate({
            scrollTop: $("#alert_danger").offset().top
        }, 2000);

    } else {
        $("#alert_danger").hide();
    }

}
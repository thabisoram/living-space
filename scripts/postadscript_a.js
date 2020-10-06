//Address
var citytown_txt;
var areazone_txt;
var streetname_txt;
var buildingno_txt;

//Description
var description_txt;

//Contact
var contactperson_txt;
var tel_txt;
var email_txt;
var user_id;

//Status tags
var ad_errmsg;
var adtype;
var imagetable;
var featuretable;
var trackNo;

$(document).on("click", "#ad_post_btn", function (event) {

    event.preventDefault();

    ad_errmsg = "";
    user_id = $('.user_id').val();

    //Address
    citytown_txt = $('#address_city_txt').val();
    areazone_txt = $('#address_area_txt').val();
    streetname_txt = $('#address_street_txt').val();
    buildingno_txt = $('#address_house_no_txt').val();

    //Description
    description_txt = $('#description').val();

    //Contact
    contactperson_txt = $('#contact_person_txt').val();
    tel_txt = $('#contact_person_tel_txt').val();
    email_txt = $('#contact_person_email_txt').val();

    imageList = myImageList();
    console.log(user_id);
    console.log(citytown_txt);
    console.log(streetname_txt);
    console.log(buildingno_txt);
    console.log(tel_txt);
    console.log(email_txt);

    console.log(imageList);

    checkTrackNo();
    console.log(trackNo);

    addressValidation();
    tenantValidation();
    descriptionValidtion();
    contactFormValidation();

    if (ad_errmsg.length > 1) {
        $('#ad_failure_alert').text("")
        $('#ad_failure_alert').append(ad_errmsg);
        $('#ad_failure_alert').show();
        $('#ad_success_alert').hide();
        $('#postAdModal').animate({
            scrollTop: 0
        }, 'slow');

        return false;
    } else {

        tenantPost(trackNo, user_id);

    }
});

function uploadImages() {

    imageList = myImageList();
    var data = new FormData();

    for (var i = 0; i < imageList.length; i++) {
        data.append('images[]', imageList[i]);

    }

    data.append('track_no', trackNo);
    data.append('user_id', user_id);
    data.append('adtype', adtype);
    data.append('imagetable', imagetable);

    //Add images to an array
    $.ajax({
        url: 'uploadimage.php',
        type: 'post',
        data: data,
        contentType: false,
        processData: false,
        success: function (data) {

            console.log(data);
            imageList = [];

        }

    });
}

function tenantPost(trackNo, user_id) {

    $("#tenant_type_cb").removeClass("is-invalid");

    if ($("#tenant_type_cb").val() == "student") {

        studentAccomodationPost(trackNo, user_id);

    } else if ($("#tenant_type_cb").val() == "professionals") {

        professionalAccomodationPost(trackNo, user_id);

    } else if ($("#tenant_type_cb").val() == "family") {

        familyHousingPost(trackNo, user_id);

    } else if ($("#tenant_type_cb").val() == "guest") {

        guestHousePost(trackNo, user_id);


    } else if ($("#tenant_type_cb").val() == "hmo") {

        houseMultipleOccupancy(trackNo, user_id);

    } else {
        $("#tenant_type_cb").addClass("is-invalid");
        ad_errmsg += "Choose your prefered tenant, \n";
        return false;
    }
}

//upload to php
function studentAccomodationPost(trackNo, user_id) {
    var singlestudentrooms_txt = $('#no_single_student_room').val();
    var singlestudentrent_txt = $('#no_single_student_room_rent').val();
    var sharestudentrooms_txt = $('#no_sharing_student_room').val();
    var sharestudentrent_txt = $('#no_sharing_student_room_rent').val();

    var address = "";
    address = citytown_txt + ", " + areazone_txt + ", " + streetname_txt + ", " + buildingno_txt;
    var dataString = 'address=' + address + '&user_id=' + user_id + '&single_unit=' + singlestudentrooms_txt +
        '&single_rent=' + singlestudentrent_txt + '&sharing_unit=' + sharestudentrooms_txt +
        '&sharing_rent=' + sharestudentrent_txt + '&description=' + description_txt +
        '&contact_person=' + contactperson_txt + '&tel=' + tel_txt + '&email=' + email_txt +
        '&trackno=' + trackNo;

    adtype = 'student_acc';
    imagetable = 'student_img';
    featuretable = 'student_acc';

    $.ajax({
        type: "POST",
        url: "adpost/studentpost.php",
        data: dataString,
        cache: false,
        success: function (response) {
            if (response == "success") {

                studentFeaturePost(trackNo, user_id, adtype);
                uploadImages();
                $('#ad_failure_alert').hide();
                $('#ad_success_alert').show();
                $('#advertisment_form').find("input[type=text],input[type=email], input[type=file],input[type=number],input[type=tel], textarea").val("");
                $('#preview').children(".image-dailog").remove();

                var path = window.location.pathname;
                var page = path.split("/").pop();
                if (page === "studentpage.php") {
                    $("#ad_post_btn").text("");
                    $("#ad_post_btn").append('<span class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span> uploading...');
                    $("#ad_post_btn").attr("disabled", true);
                    setTimeout(location.reload.bind(location), 3000);
                } else {
                    $("#ad_post_btn").removeClass("btn-primary").addClass("btn-success");
                    $("#ad_post_btn").text("");
                    $("#ad_post_btn").append('<i class="fas fa-check" style="color:white"></i>');
                }


            } else {
                alert(response);
            }

        }
    });


}

function studentFeaturePost(trackNo, user_id, adtype) {
    //  student accomodation 
    var wifi_feat = 0;
    var transport_feat = 0;
    var laundry_feat = 0;
    var car_feat = 0;
    var pool_feat = 0;

    if ($('#wifi_check').is(":checked")) {
        // it is checked
        wifi_feat = 1;
    }
    if ($('#transport_check').is(":checked")) {
        // it is checked
        transport_feat = 1;
    }
    if ($('#laundry_check').is(":checked")) {
        // it is checked
        laundry_feat = 1;
    }
    if ($('#car_check').is(":checked")) {
        // it is checked
        car_feat = 1;
    }
    if ($('#pool_check').is(":checked")) {
        // it is checked
        pool_feat = 1;
    }

    var dataString = "trackno=" + trackNo + "&user_id=" + user_id + "&adtype=" + adtype + "&wifi=" + wifi_feat + "&transport=" +
        transport_feat + "&laundry=" + laundry_feat + "&car=" + car_feat + "&pool=" + pool_feat;

    //Insert feature list to database
    $.ajax({
        url: 'adpost/studentfeaturepost.php',
        type: 'post',
        data: dataString,
        success: function (response) {
            console.log(response);
        }

    });

}

function professionalAccomodationPost(trackNo, user_id) {
    //Professional
    var prounit_txt = $('#no_professional_room').val();
    var prorent_txt = $('#no_professional_room_price').val();

    var address = citytown_txt + ", " + areazone_txt + ", " + streetname_txt + ", " + buildingno_txt;
    var dataString = 'address=' + address + '&user_id=' + user_id + '&prof_units=' + prounit_txt +
        '&prof_rent=' + prorent_txt + '&description=' + description_txt +
        '&contact_person=' + contactperson_txt + '&tel=' + tel_txt + '&email=' + email_txt +
        '&trackno=' + trackNo;

    adtype = 'professional_acc';
    imagetable = 'professional_img';
    featuretable = 'professional_acc_feat';

    $.ajax({
        type: "POST",
        url: "adpost/professionalpost.php",
        data: dataString,
        cache: false,
        success: function (response) {
            if (response == "success") {
                professionalFeaturePost(trackNo, user_id, adtype);
                uploadImages();
                $('#ad_failure_alert').hide();
                $('#ad_success_alert').show();
                $('#advertisment_form').find("input[type=text],input[type=email], input[type=file],input[type=number],input[type=tel], textarea").val("");
                $('#preview').children(".image-dailog").remove();

                var path = window.location.pathname;
                var page = path.split("/").pop();
                if (page === "professionalspage.php") {
                    $("#ad_post_btn").text("");
                    $("#ad_post_btn").append('<span class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span> uploading...');
                    $("#ad_post_btn").attr("disabled", true);
                    setTimeout(location.reload.bind(location), 3000);
                } else {
                    $("#ad_post_btn").removeClass("btn-primary").addClass("btn-success");
                    $("#ad_post_btn").text("");
                    $("#ad_post_btn").append('<i class="fas fa-check" style="color:white"></i>');
                }
            } else {
                alert(response);
            }
        }
    });

}

function professionalFeaturePost(trackNo, user_id, adtype) {
    var num_bedroom = $("#bedroom_num_select").val();
    var num_garage = $("#garage_num_select").val();
    var num_bathrooms = $("#edit_bathrooms_num_select").val();
    var pet_yn = $("#pet_select").val();

    if (num_bedroom == "") {
        num_bedroom = 1;
    }
    if (num_garage == "") {
        num_garage = 0;
    }
    if (pet_yn == "") {
        pet_yn = 0;
    }

    var dataString = "trackno=" + trackNo + "&user_id=" + user_id + "&adtype=" + adtype + "&bedrooms=" + num_bedroom + "&bathrooms=" + num_bathrooms + "&cars=" + num_garage + "&pet=" + pet_yn;

    $.ajax({
        url: 'adpost/professionalfeaturepost.php',
        type: 'post',
        data: dataString,
        success: function (response) {
            console.log(response);
        }

    });


}

function familyHousingPost(trackNo, user_id) {
    //Family
    var familybedroom_txt = $('#family_bed_room').val();
    var familyrent_txt = $('#family_bed_room_rent').val();

    var address = citytown_txt + ", " + areazone_txt + ", " + streetname_txt + ", " + buildingno_txt;
    var dataString = 'address=' + address + '&user_id=' + user_id + '&family_bedroom=' + familybedroom_txt +
        '&family_rent=' + familyrent_txt + '&description=' + description_txt +
        '&contact_person=' + contactperson_txt + '&tel=' + tel_txt + '&email=' + email_txt +
        '&trackno=' + trackNo;

    adtype = 'family_acc';
    imagetable = 'family_img';

    $.ajax({
        type: "POST",
        url: "familypost.php",
        data: dataString,
        cache: false,
        success: function (response) {
            if (response == "success") {

                $('#ad_failure_alert').hide();
                $('#ad_success_alert').show();

                $('#advertisment_form').find("input[type=text],input[type=email], input[type=file],input[type=number],input[type=tel], textarea").val("");
                $('#preview').children(".image-dailog").remove();
            } else {
                alert(response);
            }
        }
    });

}

function guestHousePost(trackNo, user_id) {
    //GuestHouse
    var guesthousename_txt = $('#guesthouse_name_txt').val();
    var guestday_txt = $('#no_guest_day_room').val();
    var guestdayprice_txt = $('#no_guest_day_room_price').val();
    var guestnight_txt = $('#no_guest_over_room').val();
    var guestnightprice_txt = $('#no_guest_over_room_price').val();

    var address = citytown_txt + ", " + areazone_txt + ", " + streetname_txt + ", " + buildingno_txt;

    var dataString = 'address=' + address + '&user_id=' + user_id + '&housename=' + guesthousename_txt + '&dayrestroom=' + guestday_txt +
        '&dayrestprice=' + guestdayprice_txt + '&overnightroom=' + guestnight_txt +
        '&overnightprice=' + guestnightprice_txt + '&description=' + description_txt +
        '&contact_person=' + contactperson_txt + '&tel=' + tel_txt + '&email=' + email_txt +
        '&trackno=' + trackNo;

    adtype = 'guest_acc';
    imagetable = 'guest_img';
    featuretable = 'guest_acc_feat';

    $.ajax({
        type: "POST",
        url: "adpost/guesthousepost.php",
        data: dataString,
        cache: false,
        success: function (response) {
            if (response == "success") {

                guestFeaturePost(trackNo, user_id, adtype);
                uploadImages();

                $('#ad_failure_alert').hide();
                $('#ad_success_alert').show();

                $('#advertisment_form').find("input[type=text],input[type=email], input[type=file],input[type=number],input[type=tel], textarea").val("");
                $('#preview').children(".image-dailog").remove();

                var path = window.location.pathname;
                var page = path.split("/").pop();
                if (page === "guestpage.php") {
                    $("#ad_post_btn").text("");
                    $("#ad_post_btn").append('<span class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span> uploading...');
                    $("#ad_post_btn").attr("disabled", true);
                    setTimeout(location.reload.bind(location), 3000);
                } else {
                    $("#ad_post_btn").removeClass("btn-primary").addClass("btn-success");
                    $("#ad_post_btn").text("");
                    $("#ad_post_btn").append('<i class="fas fa-check" style="color:white"></i>');
                }

            } else {
                alert(response);
                return false;
            }
        }
    });
}

function guestFeaturePost(trackNo, user_id, adtype) {

    var wifi_feat = 0;
    var dstv_feat = 0;
    var netflix_feat = 0;
    var lounge_feat = 0;
    var breakfast_feat = 0;
    var parking_feat = 0;
    var pool_feat = 0;

    if ($('#guest_wifi_check').is(":checked")) {
        // it is checked
        wifi_feat = 1;
    }
    if ($('#guest_tv_check').is(":checked")) {
        // it is checked
        dstv_feat = 1;
    }
    if ($('#netflix_check').is(":checked")) {
        // it is checked
        netflix_feat = 1;
    }
    if ($('#lounge_check').is(":checked")) {
        // it is checked
        lounge_feat = 1;
    }
    if ($('#breakfast_check').is(":checked")) {
        // it is checked
        breakfast_feat = 1;
    }
    if ($('#parking_check').is(":checked")) {
        // it is checked
        parking_feat = 1;
    }
    if ($('#pool_check').is(":checked")) {
        // it is checked
        pool_feat = 1;
    }

    var dataString = "trackno=" + trackNo + "&user_id=" + user_id + "&adtype=" + adtype +
        "&wifi=" + wifi_feat + "&dstv=" + dstv_feat + "&netflix=" + netflix_feat + "&lounge=" + lounge_feat +
        "&breakfast=" + breakfast_feat + "&parking=" + parking_feat + "&pool=" + pool_feat;

    $.ajax({
        url: 'adpost/guesthousefeaturepost.php',
        type: 'post',
        data: dataString,
        success: function (response) {
            console.log(response);
        }

    });

}

function houseMultipleOccupancy(trackNo, user_id) {
    //Professional
    //Anyone
    var anyroom_txt = $('#any_room').val();
    var anyrent_txt = $('#any_room_rent').val();

    var address = citytown_txt + ", " + areazone_txt + ", " + streetname_txt + ", " + buildingno_txt;
    var dataString = 'address=' + address + '&user_id=' + user_id + '&avail_unit=' + anyroom_txt +
        '&unit_price=' + anyrent_txt + '&description=' + description_txt +
        '&contact_person=' + contactperson_txt + '&tel=' + tel_txt + '&email=' + email_txt +
        '&trackno=' + trackNo;

    adtype = 'hmo_acc';
    magetable = 'hmo_img';

    $.ajax({
        type: "POST",
        url: "hmopost.php",
        data: dataString,
        cache: false,
        success: function (response) {
            if (response == "success") {

                $('#ad_failure_alert').hide();
                $('#ad_success_alert').show();

                $('#advertisment_form').find("input[type=text],input[type=email], input[type=file],input[type=number],input[type=tel], textarea").val("");
                $('#preview').children(".image-dailog").remove();
            } else {
                alert(response);
            }
        }
    });
}

function addressValidation() {

    //City Town
    if ($('#address_city_txt').val().length < 1) {

        $('#address_city_txt').addClass('is-invalid');

        ad_errmsg += "Enter city or town name, \n";

    } else {

        $('#address_city_txt').removeClass('is-invalid');

    }
    //Area
    if ($('#address_area_txt').val() == "" || $('#address_area_txt').val() == null) {

        $('#address_area_txt').addClass('is-invalid');

        ad_errmsg += "Enter address, \n";

    } else {

        $('#address_area_txt').removeClass('is-invalid');
    }

    //Street Zone
    if ($('#address_street_txt').val() == "" || $('#address_street_txt').val() == null) {

        $('#address_street_txt').addClass('is-invalid');

        ad_errmsg += "Enter Street name, \n";

    } else {
        $('#address_street_txt').removeClass('is-invalid');
    }

    //Building No
    if ($('#address_house_no_txt').val() == "" || $('#address_house_no_txt').val() == null) {

        $('#address_house_no_txt').addClass('is-invalid');

        ad_errmsg += "Enter building no, \n";

    } else {
        $('#address_house_no_txt').removeClass('is-invalid');
    }

}

function tenantValidation() {

    $("#tenant_error").hide();
    if ($("#tenant_type_cb").val() == "student") {
        studentTenantValidation();
    } else if ($("#tenant_type_cb").val() == "professionals") {
        professionalTenantValidation();
    } else if ($("#tenant_type_cb").val() == "family") {
        familyTenantValidation();
    } else if ($("#tenant_type_cb").val() == "guest") {
        guestTenantValidation();
    } else if ($("#tenant_type_cb").val() == "hmo") {
        hmoTenantValidation();
    } else {
        $("#tenant_error").show();
        ad_errmsg += "Choose your prefered tenant, \n";
        return false;
    }
}

function studentTenantValidation() {
    //Student
    event.preventDefault();
    //check if at le
    if ($('#no_single_student_room').val() == 0 && $('#no_sharing_student_room').val() == 0 || $('#no_single_student_room').val() == "" && $('#no_sharing_student_room').val() == "") {

        $('#no_single_student_room').addClass('is-invalid');
        $('#no_sharing_student_room').addClass('is-invalid');

        ad_errmsg += "Enter number of units for single and/or sharing, \n";

        return false;


    } else {
        $('#no_single_student_room').removeClass('is-invalid');

        $('#no_sharing_student_room').removeClass('is-invalid');
    }
    //single student rent valid
    if ($('#no_single_student_room').val() != "" && $('#no_single_student_room_rent').val() == "") {

        $('#no_single_student_room_rent').addClass('is-invalid');

        ad_errmsg += "Enter monthly single room rental amount, \n";

    } else {
        $('#no_single_student_room_rent').removeClass('is-invalid');
    }

    //single student rent valid
    if ($('#no_single_student_room').val() == "" && $('#no_single_student_room_rent').val() != "") {

        $('#no_single_student_room_rent').addClass('is-invalid');

        ad_errmsg += "Enter no rooms, \n";

    } else {
        $('#no_single_student_room_rent').removeClass('is-invalid');
    }
    //sharing student rent valid
    if ($('#no_sharing_student_room').val() != "" && $('#no_sharing_student_room_rent').val() == "") {

        $('#no_sharing_student_room_rent').addClass('is-invalid');

        ad_errmsg += "Enter monthly rental amount, \n";

    } else {

        $('#no_sharing_student_room_rent').removeClass('is-invalid');
    }

}

function professionalTenantValidation() {

    //Professional Units
    if ($('#no_professional_room').val() == "" || $('#no_professional_room').val() == null || $('#no_professional_room').val() == 0) {

        $('#no_professional_room').addClass('is-invalid');

        ad_errmsg += "Enter the amount of units available, \n";
    } else {
        $('#no_professional_room').removeClass('is-invalid');
    }

    //Professionals Rent
    if ($('#no_professional_room_price').val() == "" || $('#no_professional_room_price').val() == null || $('#no_professional_room_price').val() == 0) {

        $('#no_professional_room_price').addClass('is-invalid');

        ad_errmsg += "Enter rent amount, \n";

    } else {
        $('#no_professional_room_price').removeClass('is-invalid');
    }

}

function familyTenantValidation() {

    //Amount of bedrooms Units
    if ($('#family_bed_room').val() == "" || $('#family_bed_room').val() == null || $('#family_bed_room').val() == 0) {

        $('#family_bed_room').addClass('is-invalid');
        ad_errmsg += "Enter number of bedrooms, \n";


    } else {
        $('#family_bed_room').removeClass('is-invalid');

    }

    if ($('#family_bed_room_rent').val() == "" || $('#family_bed_room_rent').val() == null || $('#family_bed_room_rent').val() == 0) {
        $('#family_bed_room_rent').addClass('is-invalid');
        ad_errmsg += "Enter rent amount, \n";


    } else {
        $('#family_bed_room_rent').removeClass('is-invalid');
    }

}

function guestTenantValidation() {
    guesthouse_name_txt

    //Amount guest house day rest Units
    if ($('#guesthouse_name_txt').val() == "" || $('#guesthouse_name_txt').val() == null) {

        $('#guesthouse_name_txt').addClass('is-invalid');
        ad_errmsg += "Enter guest house name, \n";


    } else {
        $('#guesthouse_name_txt').removeClass('is-invalid');
    }

    //Amount guest house day rest Units
    if ($('#no_guest_day_room').val() == "" || $('#no_guest_day_room').val() == null || $('#no_guest_day_room').val() == 0) {

        $('#no_guest_day_room').addClass('is-invalid');
        ad_errmsg += "Enter available rooms, \n";


    } else {
        $('#no_guest_day_room').removeClass('is-invalid');
    }

    //Price guest house day rest Units
    if ($('#no_guest_day_room_price').val() == "" || $('#no_guest_day_room_price').val() == null || $('#no_guest_day_room_price').val() == 0) {

        $('#no_guest_day_room_price').addClass('is-invalid');
        ad_errmsg += "Enter price for day rest, \n";


    } else {
        $('#no_guest_day_room_price').removeClass('is-invalid');

    }

    //Amount guest house over-night Units
    if ($('#no_guest_over_room').val() == "" || $('#no_guest_over_room').val() == null || $('#no_guest_over_room').val() == 0) {
        $('#no_professional_room').addClass('is-invalid');
        ad_errmsg += "Enter available rooms for over-night stay, \n";


    } else {
        $('#no_professional_room').removeClass('is-invalid');
    }

    //Price guest house over-night Units
    if ($('#no_guest_over_room_price').val() == "" || $('#no_guest_over_room_price').val() == null || $('#no_guest_over_room_price').val() == 0) {
        $('#no_professional_room').addClass('is-invalid');
        ad_errmsg += "Enter price for over-night stay \n";


    } else {
        $('#no_professional_room').removeClass('is-invalid');

    }

}

function hmoTenantValidation() {

    //ROOM Units for any one
    if ($('#any_room').val() == "" || $('#any_room').val() == null || $('#any_room').val() == 0) {
        $('#any_room').addClass('is-invalid');
        ad_errmsg += "Enter the amount of units available \n";


    } else {
        $('#any_room').removeClass('is-invalid');
    }

    //ROOM Units for any one Rent
    if ($('#any_room_rent').val() == "" || $('#any_room_rent').val() == null || $('#any_room_rent').val() == 0) {

        $('#any_room_rent').addClass('is-invalid');

        ad_errmsg += "Enter rent amount \n";

    } else {
        $('#any_room_rent').removeClass('is-invalid');
    }

}

function descriptionValidtion() {
    //Description
    if ($('#description').val() == "" || $('#description').val() == null) {

        $('#description').addClass('is-invalid');

        ad_errmsg += "Enter Description, \n";


    } else {
        $('#description').removeClass('is-invalid');

    }


}

function contactFormValidation() {
    //Contact
    event.preventDefault();
    //Contact Person
    if ($('#contact_person_txt').val() == "" || $('#contact_person_txt').val() == null) {
        $('#contact_person_txt').addClass('is-invalid');

        ad_errmsg += "Enter contact person, \n";


    } else {
        $('#contact_person_txt').removeClass('is-invalid');

    }

    //Telephone/Cellphone
    if ($('#contact_person_tel_txt').val() == "" || $('#contact_person_tel_txt').val() == null) {
        $('#contact_person_tel_txt').addClass('is-invalid');
        ad_errmsg += "Enter contact numbers, \n";

    } else {
        $('#contact_person_tel_txt').removeClass('is-invalid');
    }

    //Email
    if ($('#contact_person_email_txt').val() == "" || $('#contact_person_email_txt').val() == null) {
        $('#contact_person_email_txt').addClass('is-invalid');
        ad_errmsg += "Enter email \n";

    } else {
        $('#contact_person_email_txt').removeClass('is-invalid');
    }

}

function checkTrackNo() {

    do {
        var valid;
        trackNo = Math.round(Math.random() * (1000000 - 1) + 1);

        data = 'trackno=' + trackNo;
        $.ajax({
            url: 'checktrackno.php',
            type: 'post',
            data: data,
            success: function (response) {

                valid = response[0];
                console.log(valid);
            }

        });
    }
    while (valid = false);
}
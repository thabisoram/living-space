//Address
var citytown_txt = "";
var areazone_txt = "";
var streetname_txt = "";
var buildingno_txt = "";

//Description
var description_txt = "";

//Contact
var contactperson_txt = "";
var tel_txt = "";
var email_txt = "";
var user_id = "";
//Status tags
var ad_errmsg;
var adtype;
var imagetable;
var ad_id;


$(document).on("click", "#update_post_btn", function (event) {

    event.preventDefault();

    ad_errmsg = "";
    user_id = $('.user_id').val();

    //Address
    citytown_txt = $('#edit_address_city_txt').val();
    areazone_txt = $('#edit_address_area_txt').val();
    streetname_txt = $('#edit_address_street_txt').val();
    buildingno_txt = $('#edit_address_house_no_txt').val();

    //Description
    description_txt = $('#edit_description').val();

    //Contact
    contactperson_txt = $('#edit_contact_person_txt').val();
    tel_txt = $('#edit_contact_person_tel_txt').val();
    email_txt = $('#edit_contact_person_email_txt').val();

    ad_id = getAdID();
    imageList = myImageList();
    imageRemoveList = myRemoveImageList();

    console.log(ad_id);
    console.log(imageList);
    console.log(imageRemoveList);

    trackno = getTrackNo();

    console.log(trackno);



    addressValidationUpdate();
    tenantValidationUpdate();
    descriptionValidtionUpdate();
    contactFormValidationUpdate();



    if (ad_errmsg.length > 1) {
        $('#edit_ad_failure_alert').show();
        $('#edit_ad_success_alert').hide();
        alert(ad_errmsg);
        $('#editAdModal').animate({
            scrollTop: 0
        }, 'slow');

        return false;
    } else {

        tenantUpdate(trackno, user_id, ad_id);

    }
});

function adImageUpdate() {

    ad_id = getAdID();
    imageList = myImageList();
    imageRemoveList = myRemoveImageList();

    var data = new FormData();
    var removeData = new FormData();

    for (var i = 0; i < imageList.length; i++) {
        data.append('images[]', imageList[i]);
    }

    for (var i = 0; i < imageRemoveList.length; i++) {
        removeData.append('images[]', imageRemoveList[i]);
    }
    data.append('ad_id', ad_id);
    data.append('trackno', trackno);
    data.append('user_id', user_id);
    data.append('adtype', adtype);
    data.append('imagetable', imagetable);

    removeData.append('imagetable', imagetable);

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

    //Remove the images in array from the database
    $.ajax({
        url: 'delete/deleteimage.php',
        type: 'post',
        data: removeData,
        contentType: false,
        processData: false,
        success: function (data) {

            console.log(data);
            imageRemoveList = [];

        }

    });
}

function tenantUpdate(trackno, user_id, ad_id) {
    $("#edit_tenant_error").hide();

    if ($("#edit_tenant_type_cb").val() == "student") {

        studentAccomodationUpdate(trackno, user_id, ad_id);

    } else if ($("#edit_tenant_type_cb").val() == "professionals") {

        professionalAccomodationUpdate(trackno, user_id, ad_id);

    } else if ($("#edit_tenant_type_cb").val() == "family") {

        familyHousingUpdate(trackno, user_id, ad_id);

    } else if ($("#edit_tenant_type_cb").val() == "guest") {

        guestHouseUpdate(trackno, user_id, ad_id);


    } else if ($("#edit_tenant_type_cb").val() == "hmo") {

        houseMultipleOccupancyUpdate(trackNo, user_id, ad_id);

    } else {
        $("#edit_tenant_error").show();
        ad_errmsg += "Choose your prefered tenant \n";
        return false;
    }
}

function studentFeatureUpdate(ad_id) {
    //  student accomodation 
    var wifi_feat = 0;
    var transport_feat = 0;
    var laundry_feat = 0;
    var car_feat = 0;
    var pool_feat = 0;

    if ($('#edit_wifi_check').is(":checked")) {
        // it is checked
        wifi_feat = 1;
    }
    if ($('#edit_transport_check').is(":checked")) {
        // it is checked
        transport_feat = 1;
    }
    if ($('#edit_laundry_check').is(":checked")) {
        // it is checked
        laundry_feat = 1;
    }
    if ($('#edit_car_check').is(":checked")) {
        // it is checked
        car_feat = 1;
    }
    if ($('#edit_pool_check').is(":checked")) {
        // it is checked
        pool_feat = 1;
    }

    var dataString = "ad_id=" + ad_id + "&user_id=" + user_id + "&wifi=" + wifi_feat + "&transport=" +
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

function studentAccomodationUpdate(trackno, user_id, ad_id) {
    var singlestudentrooms_txt = $('#edit_no_single_student_room').val();
    var singlestudentrent_txt = $('#edit_no_single_student_room_rent').val();
    var sharestudentrooms_txt = $('#edit_no_sharing_student_room').val();
    var sharestudentrent_txt = $('#edit_no_sharing_student_room_rent').val();

    var address = "";
    address = citytown_txt + ", " + areazone_txt + ", " + streetname_txt + ", " + buildingno_txt;
    var dataString = 'ad_id=' + ad_id + '&address=' + address + '&user_id=' + user_id + '&single_unit=' + singlestudentrooms_txt +
        '&single_rent=' + singlestudentrent_txt + '&sharing_unit=' + sharestudentrooms_txt +
        '&sharing_rent=' + sharestudentrent_txt + '&description=' + description_txt +
        '&contact_person=' + contactperson_txt + '&tel=' + tel_txt + '&email=' + email_txt +
        '&trackno=' + trackno;

    adtype = 'student_acc';
    imagetable = 'student_img';

    console.log('updating...');
    $.ajax({
        type: "POST",
        url: "adpost/studentpost.php",
        data: dataString,
        cache: false,
        success: function (response) {
            if (response == "success") {
                studentFeatureUpdate(ad_id);
                adImageUpdate();

                $('#edit_ad_failure_alert').hide();
                $('#edit_ad_success_alert').show();
                $('#edit_advertisment_form').find("input[type=text],input[type=email], input[type=file],input[type=number],input[type=tel], textarea").val("");
                $('#edit_preview').children(".image-dailog").remove();

                var path = window.location.pathname;
                var page = path.split("/").pop();
                if (page === "studentpage.php") {
                    $("#update_post_btn").text("");
                    $("#update_post_btn").append('<span class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span> Updating...');
                    $("#update_post_btn").attr("disabled", true);
                    $("#delete_post_btn").attr("disabled", true);
                    setTimeout(location.reload.bind(location), 2000);
                }

            } else {
                alert(response);
                return false;
            }

        }
    });


}

function professionalAccomodationUpdate(trackno, user_id, ad_id) {
    //Professional
    var prounit_txt = $('#edit_no_professional_room').val();
    var prorent_txt = $('#edit_no_professional_room_price').val();

    var address = citytown_txt + ", " + areazone_txt + ", " + streetname_txt + ", " + buildingno_txt;
    var dataString = 'ad_id=' + ad_id + '&address=' + address + '&user_id=' + user_id + '&prof_units=' + prounit_txt +
        '&prof_rent=' + prorent_txt + '&description=' + description_txt +
        '&contact_person=' + contactperson_txt + '&tel=' + tel_txt + '&email=' + email_txt +
        '&trackno=' + trackno;

    adtype = 'professional_acc';
    imagetable = 'professional_img';

    $.ajax({
        type: "POST",
        url: "adpost/professionalpost.php",
        data: dataString,
        cache: false,
        success: function (response) {
            if (response == "success") {
                professionalFeatureUpdate(ad_id);
                adImageUpdate();

                $('#edit_ad_failure_alert').hide();
                $('#edit_ad_success_alert').show();
                $('#edit_advertisment_form').find("input[type=text],input[type=email], input[type=file],input[type=number],input[type=tel], textarea").val("");
                $('#edit_preview').children(".image-dailog").remove();

                var path = window.location.pathname;
                var page = path.split("/").pop();
                if (page === "professionalspage.php") {
                    $("#update_post_btn").text("");
                    $("#update_post_btn").append('<span class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span> Updating...');
                    $("#update_post_btn").attr("disabled", true);
                    $("#delete_post_btn").attr("disabled", true);
                    setTimeout(location.reload.bind(location), 2000);
                }

            } else {
                alert(response);
                return false;
            }
        }
    });

}

function professionalFeatureUpdate(ad_id) {
    var num_bedroom = $("#edit_bedroom_num_select").val();
    var num_bathroom = $("#edit_bathrooms_num_select").val();
    var num_garage = $("#edit_garage_num_select").val();
    var pet_yn = $("#edit_pet_select").val();

    if (num_bedroom == "") {
        num_bedroom = 1;
    }
    if (num_garage == "") {
        num_garage = 0;
    }
    if (num_bathroom == "") {
        num_bathroom = 0;
    }
    if (pet_yn == "") {
        pet_yn = 0;
    }

    var dataString = "ad_id=" + ad_id + "&user_id=" + user_id + "&bedrooms=" + num_bedroom + "&bathrooms=" + num_bathroom + "&cars=" + num_garage + "&pet=" + pet_yn;

    $.ajax({
        url: 'adpost/professionalfeaturepost.php',
        type: 'post',
        data: dataString,
        success: function (response) {
            console.log(response);
        }

    });


}

function familyHousingUpdate(trackno, user_id, ad_id) {
    //Family
    var familybedroom_txt = $('#edit_family_bed_room').val();
    var familyrent_txt = $('#edit_family_bed_room_rent').val();

    var address = citytown_txt + ", " + areazone_txt + ", " + streetname_txt + ", " + buildingno_txt;
    var dataString = 'ad_id=' + ad_id + '&address=' + address + '&user_id=' + user_id + '&family_bedroom=' + familybedroom_txt +
        '&family_rent=' + familyrent_txt + '&description=' + description_txt +
        '&contact_person=' + contactperson_txt + '&tel=' + tel_txt + '&email=' + email_txt +
        '&trackno=' + trackno;

    adtype = 'family_acc';
    imagetable = 'family_img';

    $.ajax({
        type: "POST",
        url: "familypost.php",
        data: dataString,
        cache: false,
        success: function (response) {
            if (response == "success") {

                $('#edit_ad_failure_alert').hide();
                $('#edit_ad_success_alert').show();

                $('#edit_advertisment_form').find("input[type=text],input[type=email], input[type=file],input[type=number],input[type=tel], textarea").val("");
                $('#edit_preview').children(".image-dailog").remove();
            } else {
                alert(response);
                return false;
            }
        }
    });

}

function guestFeatureUpdate(ad_id) {

    var wifi_feat = 0;
    var dstv_feat = 0;
    var netflix_feat = 0;
    var lounge_feat = 0;
    var breakfast_feat = 0;
    var parking_feat = 0;
    var pool_feat = 0;

    if ($('#edit_guest_wifi_check').is(":checked")) {
        // it is checked
        wifi_feat = 1;
    }
    if ($('#edit_guest_tv_check').is(":checked")) {
        // it is checked
        dstv_feat = 1;
    }
    if ($('#edit_netflix_check').is(":checked")) {
        // it is checked
        netflix_feat = 1;
    }
    if ($('#edit_lounge_check').is(":checked")) {
        // it is checked
        lounge_feat = 1;
    }
    if ($('#edit_breakfast_check').is(":checked")) {
        // it is checked
        breakfast_feat = 1;
    }
    if ($('#edit_parking_check').is(":checked")) {
        // it is checked
        parking_feat = 1;
    }
    if ($('#edit_pool_check').is(":checked")) {
        // it is checked
        pool_feat = 1;
    }

    var dataString = "ad_id=" + ad_id + "&user_id=" + user_id + "&wifi=" + wifi_feat + "&dstv=" + dstv_feat +
        "&netflix=" + netflix_feat + "&lounge=" + lounge_feat +
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

function guestHouseUpdate(trackno, user_id, ad_id) {
    //GuestHouse
    var guesthousename_txt = $('#edit_guesthouse_name_txt').val();
    var guestday_txt = $('#edit_no_guest_day_room').val();
    var guestdayprice_txt = $('#edit_no_guest_day_room_price').val();
    var guestnight_txt = $('#edit_no_guest_over_room').val();
    var guestnightprice_txt = $('#edit_no_guest_over_room_price').val();

    var address = citytown_txt + ", " + areazone_txt + ", " + streetname_txt + ", " + buildingno_txt;
    var dataString = 'ad_id=' + ad_id + '&address=' + address + '&housename=' + guesthousename_txt + '&user_id=' + user_id + '&dayrestroom=' + guestday_txt +
        '&dayrestprice=' + guestdayprice_txt + '&overnightroom=' + guestnight_txt +
        '&overnightprice=' + guestnightprice_txt + '&description=' + description_txt +
        '&contact_person=' + contactperson_txt + '&tel=' + tel_txt + '&email=' + email_txt +
        '&trackno=' + trackno;

    adtype = 'guest_acc';
    imagetable = 'guest_img';

    $.ajax({
        type: "POST",
        url: "adpost/guesthousepost.php",
        data: dataString,
        cache: false,
        success: function (response) {
            if (response == "success") {

                guestFeatureUpdate(ad_id);
                adImageUpdate();

                $('#edit_ad_failure_alert').hide();
                $('#edit_ad_success_alert').show();

                $('#edit_advertisment_form').find("input[type=text],input[type=email], input[type=file],input[type=number],input[type=tel], textarea").val("");
                $('#edit_preview').children(".image-dailog").remove();

                var path = window.location.pathname;
                var page = path.split("/").pop();
                if (page === "guestpage.php") {
                    $("#update_post_btn").text("");
                    $("#update_post_btn").append('<span class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span> Updating...');
                    $("#update_post_btn").attr("disabled", true);
                    $("#delete_post_btn").attr("disabled", true);
                    setTimeout(location.reload.bind(location), 2000);
                }

            } else {
                alert(response);
                return false;
            }
        }
    });


}

function houseMultipleOccupancyUpdate(trackno, user_id, ad_id) {
    //Professional
    //Anyone
    var anyroom_txt = $('#edit_any_room').val();
    var anyrent_txt = $('#edit_any_room_rent').val();

    var address = citytown_txt + ", " + areazone_txt + ", " + streetname_txt + ", " + buildingno_txt;
    var dataString = 'ad_id=' + ad_id + '&address=' + address + '&user_id=' + user_id + '&avail_unit=' + anyroom_txt +
        '&unit_price=' + anyrent_txt + '&description=' + description_txt +
        '&contact_person=' + contactperson_txt + '&tel=' + tel_txt + '&email=' + email_txt +
        '&trackno=' + trackno;

    adtype = 'hmo_acc';
    magetable = 'hmo_img';

    $.ajax({
        type: "POST",
        url: "hmopost.php",
        data: dataString,
        cache: false,
        success: function (response) {
            if (response == "success") {

                $('#edit_ad_failure_alert').hide();
                $('#edit_ad_success_alert').show();

                $('#edit_advertisment_form').find("input[type=text],input[type=email], input[type=file],input[type=number],input[type=tel], textarea").val("");
                $('#edit_preview').children(".image-dailog").remove();
            } else {
                alert(response);
                return false;
            }
        }
    });
}

function addressValidationUpdate() {

    //City Town
    if ($('#edit_address_city_txt').val() == "" || $('#edit_address_city_txt').val() == null) {
        $('#edit_address_city_txt').addClass('is-invalid');
        ad_errmsg += "Enter city or town name \n";


    } else {

        $('#edit_address_city_txt').removeClass('is-invalid');

    }

    //Area
    if ($('#edit_address_area_txt').val() == "" || $('#edit_address_area_txt').val() == null) {

        $('#edit_address_area_txt').addClass('is-invalid');

        ad_errmsg += "Enter address \n";

    } else {
        $('#edit_address_area_txt').removeClass('is-invalid');
    }

    //Street Zone
    if ($('#edit_address_street_txt').val() == "" || $('#edit_address_street_txt').val() == null) {

        $('#edit_address_street_txt').addClass('is-invalid');
        ad_errmsg += "Enter Street name \n";

    } else {
        $('#edit_address_street_txt').removeClass('is-invalid');
    }

    //Building No
    if ($('#edit_address_house_no_txt').val() == "" || $('#edit_address_house_no_txt').val() == null) {
        $('#edit_address_house_no_txt').addClass('is-invalid');
        ad_errmsg += "Enter building no \n";

    } else {
        $('#edit_address_house_no_txt').removeClass('is-invalid');
    }

}

function tenantValidationUpdate() {
    if ($("#edit_tenant_type_cb").val() == "student") {
        studentTenantValidationUpdate();
    } else if ($("#edit_tenant_type_cb").val() == "professionals") {
        professionalTenantValidationUpdate();
    } else if ($("#edit_tenant_type_cb").val() == "family") {
        familyTenantValidationUpdate();
    } else if ($("#edit_tenant_type_cb").val() == "guest") {
        guestTenantValidationUpdate();
    } else if ($("#edit_tenant_type_cb").val() == "hmo") {
        hmoTenantValidationUpdate();
    } else {
        $("#edit_tenant_error").show();
        ad_errmsg += "Choose your prefered tenant \n";
        return false;
    }
}

function studentTenantValidationUpdate() {
    //Student

    //check if at le
    if ($('#edit_no_single_student_room').val() == 0 && $('#edit_no_sharing_student_room').val() == 0 || $('#edit_no_single_student_room').val() == "" && $('#edit_no_sharing_student_room').val() == "") {
        $('#edit_no_single_student_room').addClass('is-invalid');
        $('#edit_no_sharing_student_room').addClass('is-invalid');

        ad_errmsg += "Enter number of units for single and/or sharing \n";

    } else {
        $('#edit_no_single_student_room').removeClass('is-invalid');
        $('#edit_no_sharing_student_room').removeClass('is-invalid');
    }
    //single student rent valid
    if ($('#edit_no_single_student_room').val() != "" && $('#edit_no_single_student_room_rent').val() == "") {
        $('#edit_no_single_student_room_rent').addClass('is-invalid');
        ad_errmsg += "Enter monthly single room rental amount \n";


    } else {
        $('#edit_no_single_student_room_rent').removeClass('is-invalid');
    }

    //sharing student rent valid
    if ($('#edit_no_sharing_student_room').val() != "" && $('#edit_no_sharing_student_room_rent').val() == "") {
        $('#edit_no_sharing_student_room_rent').addClass('is-invalid');

        ad_errmsg += "Enter monthly rental amount \n";

    } else {
        $('#edit_no_sharing_student_room_rent').removeClass('is-invalid');
    }

}

function professionalTenantValidationUpdate() {

    //Professional Units
    if ($('#edit_no_professional_room').val() == "" || $('#edit_no_professional_room').val() == null || $('#edit_no_professional_room').val() == 0) {
        $('#edit_no_professional_room').addClass('is-invalid');

        ad_errmsg += "Enter the amount of units available \n";


    } else {
        $('#edit_no_professional_room').removeClass('is-invalid');

    }

    //Professionals Rent
    if ($('#edit_no_professional_room_price').val() == "" || $('#edit_no_professional_room_price').val() == null || $('#edit_no_professional_room_price').val() == 0) {
        $('#edit_no_professional_room_price').addClass('is-invalid');
        ad_errmsg += "Enter rent amount \n";

    } else {
        $('#edit_no_professional_room_price').removeClass('is-invalid');

    }

}

function familyTenantValidationUpdate() {
    //Amount of bedrooms Units
    if ($('#edit_family_bed_room').val() == "" || $('#edit_family_bed_room').val() == null || $('#edit_family_bed_room').val() == 0) {
        $('#edit_family_bed_room').addClass('is-invalid');
        ad_errmsg += "Enter number of bedrooms \n";


    } else {

        $('#edit_family_bed_room').removeClass('is-invalid');
    }

    if ($('#edit_family_bed_room_rent').val() == "" || $('#edit_family_bed_room_rent').val() == null || $('#edit_family_bed_room_rent').val() == 0) {

        $('#edit_family_bed_room_rent').addClass('is-invalid');
        ad_errmsg += "Enter rent amount \n";


    } else {
        $('#edit_family_bed_room_rent').removeClass('is-invalid');

    }

}

function guestTenantValidationUpdate() {
    //Guest house Name
    if ($('#edit_guesthouse_name_txt').val() == "" || $('#edit_guesthouse_name_txt').val() == null) {

        $('#edit_guesthouse_name_txt').addClass('is-invalid');
        ad_errmsg += "Enter guest house name, \n";


    } else {
        $('#edit_guesthouse_name_txt').removeClass('is-invalid');
    }

    //Amount guest house day rest Units
    if ($('#edit_no_guest_day_room').val() == "" || $('#edit_no_guest_day_room').val() == null || $('#edit_no_guest_day_room').val() == 0) {
        $('#edit_no_guest_day_room').addClass('is-invalid');
        ad_errmsg += "Enter available rooms \n";


    } else {
        $('#edit_no_guest_day_room').removeClass('is-invalid');
    }

    //Price guest house day rest Units
    if ($('#edit_no_guest_day_room_price').val() == "" || $('#edit_no_guest_day_room_price').val() == null || $('#edit_no_guest_day_room_price').val() == 0) {
        $('#edit_no_guest_day_room').addClass('is-invalid');
        ad_errmsg += "Enter price for day rest \n";


    } else {

        $('#edit_no_guest_day_room').removeClass('is-invalid');

    }

    //Amount guest house over-night Units
    if ($('#edit_no_guest_over_room').val() == "" || $('#edit_no_guest_over_room').val() == null || $('#edit_no_guest_over_room').val() == 0) {
        $('#edit_no_guest_over_room').addClass('is-invalid');
        ad_errmsg += "Enter available rooms for over-night stay \n";


    } else {
        $('#edit_no_guest_over_room').removeClass('is-invalid');
    }

    //Price guest house over-night Units
    if ($('#edit_no_guest_over_room_price').val() == "" || $('#edit_no_guest_over_room_price').val() == null || $('#edit_no_guest_over_room_price').val() == 0) {
        $('#edit_no_guest_over_room_price').addClass('is-invalid');
        ad_errmsg += "Enter price for over-night stay \n";


    } else {

        $('#edit_no_guest_over_room_price').removeClass('is-invalid');

    }

}

function hmoTenantValidationUpdate() {

    //ROOM Units for any one
    if ($('#edit_any_room').val() == "" || $('#edit_any_room').val() == null || $('#edit_any_room').val() == 0) {

        $('#edit_any_room').addClass('is-invalid');
        ad_errmsg += "Enter the amount of units available \n";


    } else {

        $('#edit_any_room').removeClass('is-invalid');

    }

    //ROOM Units for any one Rent
    if ($('#edit_any_room_rent').val() == "" || $('#edit_any_room_rent').val() == null || $('#edit_any_room_rent').val() == 0) {

        $('#edit_any_room_rent').addClass('is-invalid');
        ad_errmsg += "Enter rent amount \n";

    } else {
        $('#edit_any_room_rent').removeClass('is-invalid');

    }

}

function descriptionValidtionUpdate() {

    //Description
    if ($('#edit_description').val() == "" || $('#edit_description').val() == null) {
        $('#edit_description').addClass('is-invalid');
        ad_errmsg += "Enter Description \n";
    } else {

        $('#edit_description').removeClass('is-invalid');

    }
}

function contactFormValidationUpdate() {
    //Contact

    //Contact Person
    if ($('#edit_contact_person_txt').val() == "" || $('#edit_contact_person_txt').val() == null) {
        $('#edit_contact_person_txt').addClass('is-invalid');
        ad_errmsg += "Enter contact person \n";


    } else {
        $('#edit_contact_person_txt').removeClass('is-invalid');
    }

    //Telephone/Cellphone
    if ($('#edit_contact_person_tel_txt').val() == "" || $('#edit_contact_person_tel_txt').val() == null) {
        $('#edit_contact_person_tel_txt').addClass('is-invalid');
        ad_errmsg += "Enter contact numbers \n";


    } else {

        $('#edit_contact_person_tel_txt').removeClass('is-invalid');

    }

    //Email
    if ($('#edit_contact_person_email_txt').val() == "" || $('#edit_contact_person_email_txt').val() == null) {
        $('#edit_contact_person_email_txt').addClass('is-invalid');
        ad_errmsg += "Enter email \n";


    } else {

        $('#edit_contact_person_email_txt').removeClass('is-invalid');

    }

}
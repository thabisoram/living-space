$(document).on('click', '.view', function (event) {
    event.preventDefault();
    console.log("..working");

    var preview = document.querySelector('#preview_view');
    var imagetable = 'student_img';

    var ad_id = $(this).attr("id");

    $.ajax({
        url: "fetch/student_ad_fetch.php",
        method: "POST",
        data: {
            ad_id: ad_id
        },
        dataType: "json",
        success: function (data) {
            console.log(data);
            var address = data.address;

            $("#view_datetime").find("p").html(data.date);
            //Address
            $("#view_address").find("p").html("<i class='fa fa-map-marker-alt' style='color:#FE3939'></i><b> " + data.address + "</b>");

            //Single and double unit and rent values
            $("#single_details").append("<li class='list-inline-item'>Single Available:</li>");
            $("#single_details").append("<li class='list-inline-item'><b> " + data.single_unit + " </b></li>");
            $("#single_details").append("<li class='list-inline-item'>Single Rent P/M:</li>");
            $("#single_details").append("<li class='list-inline-item'><b>R " + data.single_rent + " </b></li>");

            $("#sharing_details").append("<li class='list-inline-item'>Sharing Available:</li>");
            $("#sharing_details").append("<li class='list-inline-item'><b> " + data.sharing_unit + " </b></li>");
            $("#sharing_details").append("<li class='list-inline-item'>Sharing Rent P/M:</li>");
            $("#sharing_details").append("<li class='list-inline-item'><b>R " + data.sharing_rent + " </b></li>");

            $("#featurelist").append("<li class='list-group-item'>Cras justo odio</li>")
            // Fill description
            $("#view_description").find("p").html(data.description);

            //Contact field values

            $("#view_contact_person").val(data.contact_person);
            $("#view_contact_no").val(data.tel);
            $("#view_contact_email").val(data.email);


        }
    });

    $.ajax({
        url: "fetch/student_ad_fetch_feat.php",
        method: "POST",
        data: {
            ad_id: ad_id
        },
        dataType: "json",
        success: function (data) {

            if (data == null) {

            } else {
                if (data.wifi == 1) {
                    $("#view_feature_list").append('<li class="list-group-item"><i class="fas fa-wifi"></i> Wi-Fi Available</li> ');
                }
                if (data.transport == 1) {
                    $("#view_feature_list").append('<li class="list-group-item"><i class="fas fa-shuttle-van"></i> School Transport</li> ');
                }
                if (data.laundry == 1) {
                    $("#view_feature_list").append('<li class="list-group-item"><img src="img/washing-machine.svg" height="15px"> Laundry Utilities </li>');
                }
                if (data.parking == 1) {
                    $("#view_feature_list").append('<li class="list-group-item"><i class="fas fa-car"></i> Student Car Parking</li> ');
                }
                if (data.pool == 1) {
                    $("#view_feature_list").append('<li class="list-group-item"><i class="fas fa-swimming-pool"></i> Swimming Pool</li> ');
                }
            }

        }
    });

    $.ajax({
        url: "fetch/fetch_picture.php",
        method: "POST",

        data: {
            ad_id: ad_id,
            imagetable: imagetable
        },
        dataType: "json",
        success: function (data) {

            $(data).each(function (key, value) {
                console.log(value.image);
                var div = document.createElement('div');
                div.setAttribute('class', 'col-6 item');

                var a = document.createElement('a');
                a.setAttribute('class', 'lightbox');
                a.setAttribute('href', value.image);


                var img = document.createElement('img');
                img.setAttribute('class', 'img-fluid image scale-on-hover');
                img.setAttribute('src', value.image);

                a.appendChild(img);
                div.appendChild(a);
                preview.appendChild(div);
            });
            //console.log(data.image);
            /** */
            baguetteBox.run('.gallery', {
                buttons: true
            });

        } // End of success function
    });

    $('#viewAdModal').modal('show');
});
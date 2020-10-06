$(document).on('click', '.view', function (event) {
    event.preventDefault();
    console.log("..working");

    var preview = document.querySelector('#preview_view');
    var imagetable = 'guest_img';

    var ad_id = $(this).attr("id");

    $.ajax({
        url: "fetch/guest_ad_fetch.php",
        method: "POST",
        data: {
            ad_id: ad_id
        },
        dataType: "json",
        success: function (data) {
            console.log(data);
            var address = data.address;

            $("#datetime_view").find("p").html(data.date);
            //Address
            $("#view_housename").text(data.housename);

            $("#view_address").find("p").html("<i class='fa fa-map-marker-alt' style='color:#FE3939' aria-hidden='true'></i><b> " + data.address + "</b>");;

            //Single and double unit and rent values
            $("#dayrest_details").append("<li class='list-inline-item'>Day-rest Available:</li>");
            $("#dayrest_details").append("<li class='list-inline-item'><b> " + data.dayrestroom + " </b></li>");
            $("#dayrest_details").append("<li class='list-inline-item'>Day-rest Price:</li>");
            $("#dayrest_details").append("<li class='list-inline-item'><b> R " + data.dayrestprice + " </b></li>");

            $("#overnight_details").append("<li class='list-inline-item'>Over-night Available:</li>");
            $("#overnight_details").append("<li class='list-inline-item'><b> " + data.overnightroom + " </b></li>");
            $("#overnight_details").append("<li class='list-inline-item'>Over-night Price:</li>");
            $("#overnight_details").append("<li class='list-inline-item'><b>R " + data.overnightprice + " </b></li>");

            // Fill description
            $("#view_description").find("p").html(data.description);

            //Contact field values

            $("#view_contact_person").val(data.contact_person);
            $("#view_contact_no").val(data.tel);
            $("#view_contact_email").val(data.email);

        }
    });

    $.ajax({
        url: "fetch/guest_ad_fetch_feat.php",
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
                if (data.dstv == 1) {
                    $("#view_feature_list").append('<li class="list-group-item"><i class="fas fa-tv"></i> Dstv Available</li> ');
                }
                if (data.netflix == 1) {
                    $("#view_feature_list").append('<li class="list-group-item"><img src="img/netflix.svg" height="15px" > Netflix </li>');
                }
                if (data.parking == 1) {
                    $("#view_feature_list").append('<li class="list-group-item"><i class="fas fa-car"></i> Safe Parking</li> ');
                }
                if (data.lounge == 1) {
                    $("#view_feature_list").append('<li class="list-group-item"><i class="fas fa-couch"></i> Lounge</li> ');
                }
                if (data.breakfast == 1) {
                    $("#view_feature_list").append('<li class="list-group-item"><i class="fas fa-utensils"></i> Breakfast</li>');
                }
                if (data.pool == 1) {
                    $("#view_feature_list").append('<li class="list-group-item"><i class="fas fa-swimming-pool"></i> Swimming Pool</li>');
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
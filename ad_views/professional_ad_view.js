$(document).on('click', '.view', function (event) {
    event.preventDefault();
    console.log("..working");

    var preview = document.querySelector('#preview_view');
    var imagetable = 'professional_img';

    var ad_id = $(this).attr("id");

    $.ajax({
        url: "fetch/professional_ad_fetch.php",
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
            $("#view_address").find("p").html("<i class='fa fa-map-marker-alt' style='color:#FE3939' aria-hidden='true'></i><b> " + data.address + "</b>");

            //Single and double unit and rent values
            $("#acc_details").append("<li class='list-inline-item'>Units Available:</li>");
            $("#acc_details").append("<li class='list-inline-item'><b> " + data.units + " </b></li>");
            $("#acc_details").append("<li class='list-inline-item'>Rent P/M:</li>");
            $("#acc_details").append("<li class='list-inline-item'><b> R" + data.rent + " </b></li>");

            $("#view_unit").val(data.units);
            $("#view_rent").val(data.rent);


            // Fill description
            $("#view_description").find("p").html(data.description);

            //Contact field values

            $("#view_contact_person").val(data.contact_person);
            $("#view_contact_no").val(data.tel);
            $("#view_contact_email").val(data.email);
            $('#viewAdModal').modal('show');

        }
    });

    $.ajax({
        url: "fetch/professional_ad_fetch_feat.php",
        method: "POST",
        data: {
            ad_id: ad_id
        },
        dataType: "json",
        success: function (data) {
            if (data == null) {

            } else {
                if (data.bedrooms == 1) {
                    $("#view_feature_list").append('<li class="list-group-item"><i class="fas fa-bed"></i> Bedroom: ' + data.bedrooms + '</li>');
                }
                if (data.bathrooms == 1) {
                    $("#view_feature_list").append('<li class="list-group-item"><i class="fas fa-bath"></i> Bathroom: ' + data.bathrooms + '</li>');
                }
                if (data.cars == 1) {
                    $("#view_feature_list").append('<li class="list-group-item"><i class="fas fa-car"></i> Parking Space: ' + data.cars + '</li>');
                }
                if (data.pet == 1) {
                    $("#view_feature_list").append('<li class="list-group-item"><i class="fas fa-car"></i> Pets Allowed</li> ');
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
});
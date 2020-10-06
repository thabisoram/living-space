$(document).on('click', '.delete', function (event) {
    event.preventDefault();
    console.log("..working");



    ad_id = $(this).attr("id");

    if (confirm("Do you want to delete this Ad?")) {

        console.log("Deleting...");
        var table = 'professional_img';

        $.ajax({
            url: "delete/deleteimage.php",
            method: "POST",
            data: {
                ad_id: ad_id,
                table: table
            },
            dataType: "json",
            cache: false,
            success: function (response) {
                console.log(response);

            }
        });

        var table = 'professional_acc';
        var feat_table = 'professional_acc_feat';

        $.ajax({
            url: "delete/delete_ad.php",
            method: "POST",
            data: {
                ad_id: ad_id,
                table: table,
                feat_table: feat_table
            },
            cache: false,
            success: function (response) {
                console.log(response);
                location.reload(true);

            }
        });


    } else {
        console.log("Action cancelled...");
    }

});

$(document).on('click', '#delete_post_btn', function (event) {
    event.preventDefault();

    ad_id = getAdID();

    if (confirm("Do you want to delete this Ad?")) {

        console.log("Deleting...");
        var table = 'professional_img';

        $.ajax({
            url: "delete/deleteimage.php",
            method: "POST",
            data: {
                ad_id: ad_id,
                table: table
            },
            dataType: "json",
            cache: false,
            success: function (response) {
                console.log(response);

            }
        });

        var table = 'professional_acc';
        var feat_table = 'professional_acc_feat';

        $.ajax({
            url: "delete/delete_ad.php",
            method: "POST",
            data: {
                ad_id: ad_id,
                table: table,
                feat_table: feat_table
            },
            cache: false,
            success: function (response) {
                console.log(response);
                location.reload(true);

            }
        });


    } else {
        console.log("Action cancelled...");
    }

});
$(document).on("click", "#mySearchButton", function (event) {
    event.preventDefault();
    var radio = "";
    var searchtxt = $("#mySearchText").val();

    var dataString = "";

    if ($('#studentrb').is(':checked')) {
        var dataString = "searchtxt=" + searchtxt;

        /** 
                });*/
        $.ajax({
            type: "POST",
            url: 'search.php',
            data: dataString,
            success: function (response) {

                console.log(response);
                window.location.replace("studentpage.php");

            }
        });
    } else if ($('#employeerb').is(':checked')) {
        var dataString = "searchtxt=" + searchtxt;
        console.log(dataString);
        $.ajax({
            type: "POST",
            url: 'search.php',
            data: dataString,
            cache: false,
            success: function (response) {

                console.log(response);
                window.location.replace("professionalspage.php");

            }
        });
    } else if ($('#visitrb').is(':checked')) {
        var dataString = "searchtxt=" + searchtxt;
        console.log(dataString);

        $.ajax({
            type: "POST",
            url: 'search.php',
            data: dataString,
            cache: false,
            success: function (response) {

                console.log(response);
                window.location.replace("guestpage.php");

            }
        });
    } else {
        $("#mySearchText").addClass('is-invalid');
    }
});
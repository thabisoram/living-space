var regForm = document.getElementById("registration_form");

var adModal = document.getElementById("postAdModal");

var adForm = document.getElementById("advertisment_form");

var regModal = document.getElementById("regModal");

var editAdModal = document.getElementById("editAdModal");

$(document).on("click", "#clear_ad_btn", function (event) {
    event.preventDefault();
    imageList = myImageList();
    imageList = [];
    $('.form-control').removeClass('is-invalid');
    $('#preview').children(".image-dailog").remove();
    $('#advertisment_form').find("input[type=text],input[type=file],input[type=email],input[type=tel],input[type=number], textarea").val("");
});

$(window).click(function (event) {

})

window.onclick = function (event) {
    if (event.target == regModal) {
        resetForm();

    }
}





function resetForm() {
    // clearing inputs
    $('.form-control').removeClass('is-invalid');
    form - control
    $('#registration_form').find("input[type=text],input[type=email],input[type=tel],input[type=number], textarea").val("");

}
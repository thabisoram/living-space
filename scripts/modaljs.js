// Get the modal
var modal = document.getElementById("regModal");

// Get the button that opens the modal
var btn = document.getElementById("RegBtn");

var regbtn = document.getElementById("reg_btn");

var postbtn = document.getElementById("post_ad_btn");



// Get the <span> element that closes the modal
var span = document.getElementsByClassName("close")[0];

// When the user clicks on the button, open the modal 
regbtn.onclick = function () {
    modal.style.display = "block";
}

// When the user clicks on <span> (x), close the modal
span.onclick = function () {
    modal.style.display = "none";
}

// When the user clicks anywhere outside of the modal, close it
window.onclick = function (event) {
    if (event.target == modal) {
        modal.style.display = "none";
    }
}
/* AD */

// Get the advertise modal
var adModal = document.getElementById("postAdModal");

// Get the button that opens the advertise modal
var postadbtn = document.getElementById("ad_btn");

// When the user clicks on the button, open the modal 
postbtn.onclick = function () {
    adModal.style.display = "block";
}

// When the user clicks on <span> (x), close the modal
span.onclick = function () {
    adModal.style.display = "none";
}

// When the user clicks anywhere outside of the modal, close it
window.onclick = function (event) {
    if (event.target == adModal) {
        adModal.style.display = "none";
    }
}
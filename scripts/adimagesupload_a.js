var imageList = [];
var imageRemoveList = [];


function previewImages(event) {
    event.preventDefault();

    var preview = document.querySelector('#preview');

    if (this.files) {
        [].forEach.call(this.files, readAndPreview);
    }

    function readAndPreview(file) {

        // Make sure `file.name` matches our extensions criteria
        if (!/\.(jpe?g|png|gif)$/i.test(file.name)) {
            return alert(file.name + " is not an image");
        } // else...

        var div = document.createElement('div');
        div.setAttribute('class', 'image-dailog');
        var a = document.createElement('a');
        a.setAttribute('class', 'close-thik');
        //a.setAttribute('onclick', 'return this.parentNode.remove();');

        preview.appendChild(div);
        div.appendChild(a);

        var reader = new FileReader();

        reader.addEventListener("load", function () {
            var image = new Image();
            image.height = 150;
            image.title = file.name;
            image.className = "uploaded-image";
            image.src = this.result;
            div.appendChild(image);

        });

        reader.readAsDataURL(file);
    }

    showImg();
}

function editPreviewImages(event) {

    if (this.files) {
        [].forEach.call(this.files, readAndPreview);
    }

    function readAndPreview(file) {

        // Make sure `file.name` matches our extensions criteria
        if (!/\.(jpe?g|png|gif)$/i.test(file.name)) {
            return alert(file.name + " is not an image");
        } // else...

        var div = document.createElement('div');
        //div.setAttribute('class', 'image-dailog');
        div.classList.add('image-dailog', 'item');
        var a = document.createElement('a');
        a.setAttribute('class', 'close-thik');
        //a.setAttribute('onclick', 'return this.parentNode.remove();');

        $('#edit_preview').append(div);
        div.append(a);

        var reader = new FileReader();

        reader.addEventListener("load", function () {
            var image = new Image();
            image.height = 150;
            image.title = file.name;
            image.className = "uploaded-image";
            image.src = this.result;
            div.appendChild(image);

        });

        reader.readAsDataURL(file);
    }

    var files = document.getElementById("edit_ad_img_select").files;

    for (var i = 0; i < files.length; i++) {
        imageList.push(files[i]);
        console.log(imageList);

    }
}

function showImg() {
    var files = document.getElementById("ad_img_select").files;

    for (var i = 0; i < files.length; i++) {
        imageList.push(files[i]);
        console.log(imageList);

    }
}

function myImageList() {
    return imageList;
}

function myRemoveImageList() {
    return imageRemoveList;
}

$(document).on("change", '#ad_img_select', previewImages);
$(document).on("change", '#edit_ad_img_select', editPreviewImages);


$(document).on("click", ".close-thik", function (event) {
    event.preventDefault();
    // get the index of .image-dialog
    let index = $(this).parent().index();
    // do something with imageArray[index]
    alert(imageList[index].name);
    var image = imageList.splice(index, 1);
    imageRemoveList.push(image);
    console.log(imageList);
    console.log(imageRemoveList);

    console.log(imageList);
    $(this).parent().remove();
});
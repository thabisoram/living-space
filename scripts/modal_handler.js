$('#regModal').on('hidden.bs.modal', function () {
  // do something…
  $("#register_btn").removeClass("btn-success").addClass("btn-primary");
  $("#register_btn").text("Register");
  $('#registration_form').find("input[type=text],input[type=file],input[type=email],input[type=tel],input[type=number], textarea, select").removeClass("is-invalid");
  $('#registration_form').find(".alert").hide();
  $('#postAdModal').data('bs.modal', null);
});

$('#loginModal').on('hidden.bs.modal', function () {
  // do something…
  $('#login_form').find("input[type=text],input[type=file],input[type=email],input[type=tel],input[type=number], textarea, select").removeClass("is-invalid");
  $('#login_form').find(".alert").hide();
});

$('#postAdModal').on('hidden.bs.modal', function () {
  // do something…
  $("#ad_post_btn").removeClass("btn-success").addClass("btn-primary");
  $("#ad_post_btn").text("Post ad");
  $('#advertisment_form').find("input[type=text],input[type=file],input[type=email],input[type=tel],input[type=number], textarea").removeClass("is-invalid");
  $('#advertisment_form').find(".alert").hide();
  imageList = myImageList();
  imageList = [];
});

$('#editAdModal').on('hidden.bs.modal', function () {
  // do something…
  $('#edit_preview').children().remove();
  $('#edit_advertisment_form').find(".alert").hide();
  imageList = myImageList();
  imageList = [];
  $('#edit_advertisment_form').find("input[type=text],input[type=file],input[type=email],input[type=tel],input[type=number], textarea").removeClass("is-invalid");;
});

$('#viewAdModal').on('hidden.bs.modal', function () {
  // do something…
  $('#preview_view').children().remove();
  $('#single_details').html("");
  $('#sharing_details').html("");
  $('#dayrest_details').html("");
  $('#view_feature_list').html("");
  $('#overnight_details').html("");
  $('#acc_details').html("");
});
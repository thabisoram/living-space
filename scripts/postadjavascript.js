 /*student option*/
 var sinlgestudent = document.getElementById("single_student_option_room");
 var sharingstudent = document.getElementById("sharing_student_option_room");
 /*family option*/
 var familyunits = document.getElementById("family_option_room");
 /*profession option*/
 var professionalunit = document.getElementById("professionals_option_rent");
 /*guest option*/
 var guestdayrest = document.getElementById("guest_dayrest_option_room");
 var guestovernight = document.getElementById("guest_over_option_room");
 /*any unit option*/
 var anyunit = document.getElementById("anyone_option_room");

 $(document).on("change", "#tenant_type_cb", function (event) {
     event.preventDefault();
     getComboA();
 });

 function getComboA() {
     var value = $('#tenant_type_cb').find('option:selected').val();
     if (value == "student") {
         $('#single_student_option_room').show();
         $('#sharing_student_option_room').show();

         /*Hide other options*/
         $('#family_option_room').hide();
         $('#professionals_option_rent').hide();
         $('#guest_dayrest_option_room').hide();
         $('#guest_over_option_room').hide();
         $('#anyone_option_room').hide();




     }
     if (value == "professionals") {
         $('#professionals_option_rent').show();

         /*Hide other options*/
         $('#single_student_option_room').hide();
         $('#sharing_student_option_room').hide();
         $('#family_option_room').hide();
         $('#guest_dayrest_option_room').hide();
         $('#guest_over_option_room').hide();
         $('#anyone_option_room').hide();

     }
     if (value == "family") {
         $('#family_option_room').show();

         /*Hide other options*/
         $('#single_student_option_room').hide();
         $('#sharing_student_option_room').hide();
         $('#guest_dayrest_option_room').hide();
         $('#guest_over_option_room').hide();
         $('#anyone_option_room').hide();
         $('#professionals_option_rent').hide();

     }

     if (value == "guest") {

         $('#guest_dayrest_option_room').show();
         $('#guest_over_option_room').show();

         /*Hide other options*/
         $('#single_student_option_room').hide();
         $('#sharing_student_option_room').hide();
         $('#anyone_option_room').hide();
         $('#professionals_option_rent').hide();
         $('#family_option_room').hide();
     }

     if (value == "hmo") {
         $('#anyone_option_room').show();

         /*Hide other options*/
         $('#single_student_option_room').hide();
         $('#sharing_student_option_room').hide();
         $('#anyone_option_room').hide();
         $('#professionals_option_rent').hide();
         $('#family_option_room').hide();
         $('#guest_dayrest_option_room').hide();
         $('#guest_over_option_room').hide();
     }


 }


 var adModal = document.getElementById("postAdModal");
 var adform = document.getElementById("advertisment_form");

 $(document).click(function (event) {
     event.preventDefault();
     //if you click on anything except the modal itself or the "open modal" link, close the modal
     if (!$(event.target).closest(".modal,.js-open-modal").length) {
         $('.combo-box-result').hide();
     }
 });
 // When the user clicks anywhere outside of the modal, close it
 window.onclick = function (event) {
     if (event.target == adModal) {

         $('#anyone_option_room').hide();
         $('#single_student_option_room').hide();
         $('#sharing_student_option_room').hide();
         $('#anyone_option_room').hide();
         $('#professionals_option_rent').hide();
         $('#family_option_room').hide();
         $('#guest_dayrest_option_room').hide();
         $('#guest_over_option_room').hide();

     }
 }
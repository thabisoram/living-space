 $(document).on("change", "#tenant_type_cb", function (event) {
     event.preventDefault();
     getComboA();
 });

 function getComboA() {
     var value = $('#tenant_type_cb').find('option:selected').val();
     if (value == "student") {
         $('#student_option').show();

         /*Hide other options*/
         $('#family_option').hide();
         $('#professionals_option').hide();
         $('#guest_option').hide();
         $('#anyone_option').hide();
     }

     if (value == "professionals") {
         $('#professionals_option').show();

         /*Hide other options*/
         $('#student_option').hide();
         $('#family_option').hide();
         $('#guest_option').hide();
         $('#anyone_option').hide();

     }
     if (value == "family") {
         $('#family_option').show();

         /*Hide other options*/
         $('#student_option').hide();
         $('#guest_option').hide();
         $('#anyone_option').hide();
         $('#professionals_option').hide();

     }

     if (value == "guest") {

         $('#guest_option').show();

         /*Hide other options*/
         $('#student_option').hide();
         $('#anyone_option').hide();
         $('#professionals_option').hide();
         $('#family_option').hide();
     }

     if (value == "hmo") {
         $('#anyone_option').show();

         /*Hide other options*/
         $('#student_option').hide();
         $('#anyone_option').hide();
         $('#professionals_option').hide();
         $('#family_option').hide();
         $('#guest_option').hide();
     }


 }
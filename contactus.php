<!DOCTYPE html>
<?php include 'connect.php';
session_start();

//;
?>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>Give Us Feedback, Suggestions Or Any Issues You Come Across | Living Space</title>
    <meta name="description" content="You can contact Living Space from this page.">
    <meta name="keywords" content="Contact, Contact Us, Living Space">
    <meta name="revised" content="Living Space, 15/2/2020">
    <meta name="author" content="Thabiso Ramokopu">
    <meta name="viewport" content="width=device-width, initial-scale=1">


    <link rel="sitemap" type="application/xml" title="Sitemap" href="sitemap.xml" />
<link rel="stylesheet" href="css-a.css"/>
<link rel="shortcut icon" href="favicon/favicon.ico">
<script src="https://code.jquery.com/jquery-3.2.1.min.js"></script>
<link rel="stylesheet" href="main.css"/>
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.0/css/all.css" integrity="sha384-lZN37f5QGtY3VHgisS14W3ExzMWZxybE1SJSEsQp9S+oqd12jhcu+A56Ebc1zFSJ" crossorigin="anonymous">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>

<link rel="stylesheet" href="floating-labels.css">
<link rel="stylesheet" href="mcss.css">
<script>
    </script>
    
    
    <!--
      <link rel="stylesheet" href="modalcss.css"> 
   -->
   <style>
.modal { -webkit-overflow-scrolling: touch; }
.card-text{
  white-space: nowrap; 
  overflow: hidden;
  text-overflow: ellipsis;
}

body.modal-open {
    position: inherit;
}

.form-container{
  padding: 15px;
}

</style>

</head>

<body>
 
<div id="header">

</div>

<div class ="view-list">
<br>
<button onclick="topFunction()" id="myBtn" title="Go to top"><i class='fas fa-angle-double-up' style='font-size:24px;color:white'></i></button>

<h2><b>Contact </b> Us</h2> 
<p> For Feedback, Suggestions, Enquiries Or Any Issues You Come Across </p>


<div class="container" style="padding-top:25px; max-width: 400px">
<div class="card container form-container">
<h5 class="card-title">Contact Form</h5>
<form  id="contact_form">

<div id="alert_danger" class="alert alert-danger" style="display: none">
  
</div>

<div id="alert_success" class="alert alert-success" style="display: none">
  <strong>Message sent!</strong>.
</div>

  <div class="form-group">
    <label for="nameContactFormTxt">Name</label>
    <input type="text" class="form-control" name="name" id="name_contact_form_txt" placeholder="Enter name" required>
    
  </div>

  <div class="form-group">
    <label for="emailContactFormTxt">Email address</label>
    <input type="email" class="form-control" name="email" id="email_contact_form_txt" placeholder="Enter email" required>
  </div>

  <div class="form-group">
    <label for="subjectContactFormTxt">Subject</label>
    <input type="text" class="form-control" name="subject" id="subject_contact_form_txt" placeholder="Enter subject" required>
  </div>

  <div class="form-group">
    <label for="msgContactFormTxt">Message</label>
    <textarea class="form-control" id="msg_contact_form_txt" name="message" rows="7"  placeholder="Message"></textarea>
  </div>

  <button type="button" name="send" id="send_email_btn" class="btn btn-info btn-block">Send</button>
</form>
</div>
</div>

</div>


 <div class="modal fade" id="loginModal" role="dialog">
<!--Registrion modal content-->
</div> 

<div class="modal fade" id="regModal" role="dialog">
<!--Registrion modal content-->
</div>

<div class="modal fade" id="postAdModal" role="dialog" >
<!--Post Advertisement modal content-->
</div>



    
    <input type="hidden" value="<?php echo $_SESSION['user_id'] ?>" class="user_id">
</div>
</body>
    <footer>
    <p>Copyright &copy;2020</p>
    </footer>
    <script src="loadelements.js"></script>
    <script src="scripts/scrollTopScript.js"></script>
    <script>
  $(function () {
  $('[data-toggle="tooltip"]').tooltip()
});
   </script>
    <!--<script src="loadelements.js"></script>-->
    <script src="modal_handler.js"></script>
    <script src="loginformvalidation_a.js"></script> 
    <script src="postadtenantcbscript_a.js"></script>
    <script src="adimagesupload_a.js"></script>
    <script src="postadscript_a.js"></script>
    <script src="clearform.js"></script>
    <script src="registrationscript_b.js"></script>
    <script src="contactformscript_a.js"></script>


    <!---->
   



</html>
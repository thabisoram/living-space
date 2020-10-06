<!DOCTYPE html>
<?php include 'connect.php';
session_start();
//;
?>
<html lang="en">

<head>
<meta charset="utf-8">
<title>Search And Find Accommodation | Living Space</title>
    <meta name="description" content="The #1 online accommodation listing website. Designed for students and professionals to find accommodation way easier than before.">
    <meta name="keywords" content="Living Space Home, Student, Accommodation, Student Accommodation, Student Res, Room For Rent ,Professional Accommodation, Workers Accommodation, Guest, House,Guest House, Guest Accommodation">
    <meta name="revised" content="Living Space, 15/2/2020">
    <meta name="author" content="Thabiso Ramokopu">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="sitemap" type="application/xml" title="Sitemap" href="sitemap.xml" />
    <link rel="stylesheet" href="css-a.css">
    <link rel="shortcut icon" href="favicon/favicon.ico">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <link rel="stylesheet" href="main.css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.0/css/all.css" integrity="sha384-lZN37f5QGtY3VHgisS14W3ExzMWZxybE1SJSEsQp9S+oqd12jhcu+A56Ebc1zFSJ" crossorigin="anonymous">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>
      
 <link rel="stylesheet" href="floating-labels.css">
 <link rel="stylesheet" href="mcss.css">
<style>
.modal { -webkit-overflow-scrolling: touch; }
    .category-panel {
        height: 200px;
        background-color: #F5F5F5;
     

    }

    img {
    pointer-events: none;
}

.category-panel:hover {
    background-color: #ffc757;

}   

.card-img{
width: 100%;
height: 40vh;
object-fit: cover;
}

body.modal-open {
    overflow: visible;
    position: absolute;
    width: 100%;
    height:100%;
}
.jumbotron {
    margin-bottom: 0px;
 }
</style>

    
    
    <!--
      <link rel="stylesheet" href="modalcss.css"> 
   -->

</head>

<body>

 <div id="header">

</div>
<div class="jumbotron jumbotron-fluid">
  <div class="container">
    <h1 class="display-4">Living Space</h1>
    <p class="lead">Makes finding <b>accommodation </b>easier :) </p>
  </div>
</div>

    <div class="view-list">

    <br>

    <button onclick="topFunction()" id="myBtn" title="Go to top"><i class='fas fa-angle-double-up' style='font-size:24px;color:white'></i></button>
        <form id="search_location">
        <p>The first-ever online <b>accommodation</b> listing website. Designed for students and professionals to find accommodation <b>way easier</b> than before.</p>
            <h4>Find your <b>Space</b>...</h4>
            
            <div class="custom-control custom-radio custom-control-inline">
              <input type="radio" id="studentrb" name="rboption" value="student" class="custom-control-input" required>
              <label class="custom-control-label" for="studentrb">I'm a student</label>
            </div>
            <div class="custom-control custom-radio custom-control-inline">
              <input type="radio" id="employeerb" value="employee" name="rboption" class="custom-control-input" required>
              <label class="custom-control-label" for="employeerb">I'm working</label>
            </div>
            <div class="custom-control custom-radio custom-control-inline">
              <input type="radio" id="visitrb" value="visit" name="rboption" class="custom-control-input" required>
              <label class="custom-control-label" for="visitrb">Just visiting</label>
            </div>               

                <div class="container visible-lg-*" style="padding-top:25px;">

        </div>

            <div class="container search-container">
 
            
                <div class="input-group ">
                <input type="text" id="mySearchText" name="mySearchText" class="form-control" placeholder="Search City/Town" required>
                    <div class="input-group-append" id="button-addon4">
                        <button id="mySearchButton" class="btn btn-search btn-primary" type="button">
                        <i class="fas fa-search"></i>
                        </button>
                    </div>
                </div>  
            </form>          
        </div>
   


        </form>

        <div class="container visible-lg-*" style="padding-top:25px;">

        </div>

        <div class="card-deck">
  <div class="card">
    <img class="card-img-top" src="img/livingspace_student_acc.jpg" alt="Card image cap">
    <div class="card-body">
      <h5 class="card-title">Student Accomodation</h5>
      <p class="card-text">Find your ideal place of residence for your time studying at tertiary</p>
      <a href="studentpage.php" class="btn btn-outline-primary btn-block">Browse</a>
    </div>
  </div>
  <div class="card">
    <img class="card-img-top" src="img/livingspace_prof_acc.jpg" alt="Card image cap">
    <div class="card-body">
      <h5 class="card-title">Professionals' Accomodation</h5>
      <p class="card-text">Search and find a convenient place to settle in and work from.</p>
      <a href="professionalspage.php" class="btn btn-outline-danger btn-block">Browse</a>
    </div>
  </div>
  <div class="card">
    <img class="card-img-top" src="img/livingspace_guest_acc.jpg" alt="Card image cap">
    <div class="card-body">
      <h5 class="card-title">Guest Houses</h5>
      <p class="card-text">Whether it's a weekend get-away or a quick stop to rest, there'll surely be guest houses nearby</p>
      <a href="guestpage.php" class="btn btn-outline-success btn-block">Browse</a>
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

<div class="modal fade" id="editAdModal" role="dialog" >
<!--Edit Advertisement modal content-->
</div>

<input type="hidden" value="<?php echo $_SESSION['user_id'] ?>" class="user_id">
</div>
    <footer>
    <p>Copyright &copy;2020</p>
    </footer>
    <script src="scripts/loadelements.js"></script>
<script src="scripts/scrollTopScript.js"></script>
  <script src="scripts/postadtenantcbscript_a.js"></script>
 <script src="scripts/adimagesupload_a.js"></script>
    <script src="scripts/clearform.js"></script>
    <script src="scripts/registrationscript_b.js"></script>
    <script src="scripts/modal_handler.js"></script>
<script src="scripts/loginformvalidation_a.js"></script>
<script src="scripts/postadscript_a.js"></script>
<script src="scripts/fetch/guest_ad_fetch_a.js"></script>
    <script src="scripts/ad_views/guest_ad_view.js"></script>
    <script src="scripts/updateadscript_a.js"></script>
    <script src="scripts/delete_guest_ad.js"></script>
    <script src="scripts/search_a.js"></script>
    <!---->
   
</body>

</html>
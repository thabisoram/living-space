<!DOCTYPE html>
<?php include 'connect.php';
session_start();
//;
?>
<html lang="en">

<head>
<meta charset="utf-8">   
<meta name="keywords" content="Help, About us, Instructions, Living Space help">
<meta name="description" content="This page has helpful information on how to navigate and use this website">
<meta name="revised" content="Living Space, 15/2/2020">
<meta name="viewport" content="width=device-width, initial-scale=1">

<link rel="sitemap" type="application/xml" title="Sitemap" href="sitemap.xml" />
<link rel="shortcut icon" href="favicon/favicon.ico">
    <link rel="stylesheet" href="css-a.css">

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <link rel="stylesheet" href="main.css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.0/css/all.css" integrity="sha384-lZN37f5QGtY3VHgisS14W3ExzMWZxybE1SJSEsQp9S+oqd12jhcu+A56Ebc1zFSJ" crossorigin="anonymous">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>
      
 <link rel="stylesheet" href="floating-labels.css">
 <link rel="stylesheet" href="mcss.css">
 <link rel="stylesheet" href="hr-styles.css">
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
    position: inherit;
}

.jumbotron {
    margin-bottom: 0px;
 }
</style>

    <title>Help & Instructions | Living Space</title>


</head>

<body>

 <div id="header">

</div>

<div class="jumbotron jumbotron-fluid">
  <div class="container">
    <h1 class="display-4">Need <b>Help</b>?</h1>
    <p class="lead">Getting started... </p>
    <hr class="my-4">
  </div>
</div>

    <div class="view-list">

    <br>
    <button onclick="topFunction()" id="myBtn" title="Go to top"><i class='fas fa-angle-double-up' style='font-size:24px;color:white'></i></button>
        <br>
<div style="border-radius:10px; overflow: hidden">
<div class="container-fluid" style="background-color: #ffffff;">
<br>
<h3>Contents</h3>
<ul style="list-style-type:none">
<li><a href="#overview">Overview</a> </li>
<li><a href="#navigation">Navigation</a></li>
<li><a href="#ad_types">Types Of advertisement</a></li>
<li><a href="#ad_instructions">How to advertise</a></li>
</ul>
<h3 id="overview">Overview</h3>
<p style="text-align: left">
What is <b>Living Space?</b> In short it's an online accommodation listing website.
</p>
<p style="text-align: left">
This website was created to help <b>students</b> and <b>professionals</b> find accommodation much easier than before. 
This will give accommodation seekers a wide array of options. Along with the accommodation listings, we added a simple <b>guesthouse</b> listing to simplify searching and finding local guest houses
by making marketing more simple for guesthouse owners. Instead of printing out business cards, which can be easily lost or discarded, you can simply put up an advertisement on our site 
and potential guests can search for guesthouses in your area and find yours, it's that <b>simple</b>. 
</p>
<br>
<hr class="my-4">

<h4 id="navigation">Navigation</h4>
<p style="text-align: left">
To start off, the site has three functional pages with each listing a different type of accommodation, namely
student accommodation, professional accommodation and guesthouses. You can visist these pages
by clicking on the 
<div class="btn-group" role="group">
    <button id="btnGroupDrop1" type="button" class="btn btn-secondary dropdown-toggle btn-sm" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
     Accommodation Lists
    </button>
    <div class="dropdown-menu" aria-labelledby="btnGroupDrop1">
      <a class="dropdown-item" href="#">Student Accomodation</a>
      <a class="dropdown-item" href="#">Professional Accomodation</a>
      <a class="dropdown-item" href="#">Guest Houses</a>
    </div>
  </div> button on the top menu bar.
 Here's how each advertisement is 
displayed:
</p>

<div class="card mb-3" style="max-width: 540px;">
  <div class="row no-gutters">
    <div class="col-md-4">
      <img src="img/Lead-Gray-600x600.jpg" class="card-img" alt="...">
      <div class="card-img-overlay">
      <button type="button" class="btn btn-outline-light btn-block">View Details</button>
    </div>
    </div>
    <div class="col-md-8">
      <div class="card-body">
        <h6 class="card-title"><i class="fa fa-map-marker-alt" aria-hidden="true" style="color:#0052cc" data-placement="top" data-toggle="tooltip" title="Location"></i>  Address</h6>
        <p class="card-subtitle">Pricing Information</p>
        <p class="card-text text-muted">Feature icons</p>
        <p class="card-text">Description (Glimpse)</p>
        <p class="card-text"><small class="text-muted">Last updated date and time</small></p>
      </div>
    </div>
  </div>
</div>

<p style="text-align: left"> You can view the advertisement in detail by clicking on the <button type="button" class="btn btn-outline-secondary btn-sm">View Details</button> Button</p>
<br>
<hr class="my-4">
<h4 id="ad_types">Types of advertisements</h4>
<p style="text-align: left">
Advertisements will differ slightly according to their category, here's what we mean:
</p>
<h5 style="text-align: left">Student accommodation</h5>
<br>

<div class="card mb-3" style="max-width: 540px;">
  <div class="row no-gutters">
    <div class="col-md-4">
      <img src="img/Lead-Gray-600x600.jpg" class="card-img" alt="...">
      <div class="card-img-overlay">
      <button type="button" class="btn btn-outline-light btn-block">View Details</button>
    </div>
    </div>
    <div class="col-md-8">
      <div class="card-body">
        <h6 class="card-title"><i class="fa fa-map-marker-alt" aria-hidden="true" style="color:#0052cc" data-placement="top" data-toggle="tooltip" title="Location"></i>  Address</h6>
        <h6 class="card-subtitle mb-2"><i class="fas fa-user" style="color:#6CA0F9"  data-placement="top" data-toggle="tooltip" title="single available"></i> Available Single Units | R Rent P/M</h6>
        <h6 class="card-subtitle mb-2"><i class="fas fa-user-friends" style="color:#6CA0F9" data-toggle="tooltip" data-placement="top" title="sharing available"></i> Available Sharing Units | R Rent P/M </h6>
        <ul class="list-inline">
        <li class="list-inline-item"><i class="fas fa-wifi" data-placement="top" data-toggle="tooltip" title="Wi-Fi available"></i></li>
        <li class="list-inline-item"><i class="fas fa-shuttle-van" data-placement="top" data-toggle="tooltip" title="School Transport Available"></i></li>
        <li class="list-inline-item"><img src="img/washing-machine.svg" height="15px" data-placement="top" data-toggle="tooltip" title="Laundry Utilities"></li>
        <li class="list-inline-item"><i class="fas fa-car" data-placement="top" data-toggle="tooltip" title="Car Parking"></i></li>
        <li class="list-inline-item"><i class="fas fa-swimming-pool" data-placement="top" data-toggle="tooltip" title="Swimming Pool"></i></li>
                        
      </ul>
        <p class="card-text">Description (Glimpse)</p>
        <p class="card-text"><small class="text-muted">Last updated 2 minutes ago</small></p>
      </div>
    </div>
  </div>
</div>
<p tyle="text-align: left"><b>Features Icon explaination:</b> </p>
<p style="text-align: left">
    <ul style="text-align: left">
    <p tyle="text-align: left"> <small>These will differ from ad to ad</small> </p>
    <li><i class="fas fa-user" style="color:#6CA0F9"  data-placement="top" data-toggle="tooltip" title="single available"></i> - Single Room: The number next to this Icon shows the number of single rooms available.</li>
    <li><i class="fas fa-user-friends" style="color:#6CA0F9" data-toggle="tooltip" data-placement="top" title="sharing available"></i> - Sharing Room: The number next to this Icon shows the number of sharing rooms available.</li>
    <li><i class="fas fa-wifi" data-placement="top" data-toggle="tooltip" title="Wi-Fi available"></i> - Wi-Fi Available</li>
    <li><i class="fas fa-shuttle-van" data-placement="top" data-toggle="tooltip" title="School Transport Available"></i> - School Transport Available.</li>
    <li><img src="img/washing-machine.svg" height="15px" data-placement="top" data-toggle="tooltip" title="Laundry Utilities"> - Availability of Laundry Appliances. </li>
    <li><i class="fas fa-car" data-placement="top" data-toggle="tooltip" title="Car Parking"></i> - Student Car Parking</li>
    <li><i class="fas fa-swimming-pool" data-placement="top" data-toggle="tooltip" title="Swimming Pool"></i> - Swimming Pool.</li>
    </ul>
</p>
<br>

<h5 style="text-align: left">Professionals accommodation</h5>
<br>
<div class="card mb-3" style="max-width: 540px;">
  <div class="row no-gutters">
    <div class="col-md-4">
      <img src="img/Lead-Gray-600x600.jpg" class="card-img" alt="...">
      <div class="card-img-overlay">
      <button type="button" class="btn btn-outline-light btn-block">View Details</button>
    </div>
    </div>
    <div class="col-md-8">
      <div class="card-body">
        <h6 class="card-title"><i class="fa fa-map-marker-alt" aria-hidden="true" style="color:#0052cc" data-placement="top" data-toggle="tooltip" title="Location"></i>  Address</h6>
        <h6 class="card-subtitle mb-2"><i class="fas fa-home" style="color:#3981FE" data-toggle="tooltip" data-placement="top" title="Unit(s) available"></i> Available Units | R Rent P/M  </h6>
        <ul class="list-inline">
        <li class="list-inline-item"><i class="fas fa-bed" data-toggle="tooltip" data-placement="top" title="Bedrooms"></i> 1</li>
        <li class="list-inline-item"><i class="fas fa-bath" data-toggle="tooltip" data-placement="top" title="Bathrooms"></i> 1</li>
        <li class="list-inline-item"><i class="fas fa-car" data-toggle="tooltip" data-placement="top" title="Parking Spaces"></i> 1</li>
        <li class="list-inline-item"><i class="fas fa-paw" data-toggle="tooltip" data-placement="top" title="Pets allowed"></i></li>
                       
        </ul>
        <p class="card-text">Description (Glimpse)</p>
        <p class="card-text"><small class="text-muted">Last updated date and time</small></p>
      </div>
    </div>
  </div>
</div>

<p tyle="text-align: left"><b>Features Icon explaination:</b> </p>
<ul style="text-align: left">
<p tyle="text-align: left"> <small>These will differ from ad to ad</small> </p>
    <li><i class="fas fa-home" style="color:#3981FE" data-toggle="tooltip" data-placement="top" title="Unit(s) available"></i> - Unit: The number next to this Icon shows the number of units available.</li>
    <li><i class="fas fa-bed" data-toggle="tooltip" data-placement="top" title="Bedrooms"></i> - Bedrooms: The number next to this Icon shows the number of bedrooms per unit advertised.</li>
    <li><i class="fas fa-bath" data-toggle="tooltip" data-placement="top" title="Bathrooms"></i> - Bathrooms: The number next to this Icon shows the number of bathrooms per unit advertised.</li>
    <li><i class="fas fa-car" data-toggle="tooltip" data-placement="top" title="Parking Spaces"></i> - Parking Spaces: The number next to this Icon shows the number of car parking spaces available per unit advertised.</li>
    <li><i class="fas fa-paw" data-toggle="tooltip" data-placement="top" title="Pets allowed"></i> - Pets allowed</li>
    </ul>

    <br>

<h5 style="text-align: left">Guest House</h5>
<br>

<div class="card mb-3" style="max-width: 540px;">
  <div class="row no-gutters">
    <div class="col-md-4">
      <img src="img/Lead-Gray-600x600.jpg" class="card-img" alt="...">
      <div class="card-img-overlay">
      <button type="button" class="btn btn-outline-light btn-block">View Details</button>
    </div>
    </div>
    <div class="col-md-8">
      <div class="card-body">
      <h5 class="card-title">Guest House Name</h5>
        <h6 class="card-title"><i class="fa fa-map-marker-alt" aria-hidden="true" style="color:#0052cc" data-placement="top" data-toggle="tooltip" title="Location"></i>  Address</h6>
        <h6 class="card-subtitle mb-2"><i class="fas fa-sun" style="color:#FEDD39" data-toggle="tooltip" data-placement="top" title="day-rest rooms available"></i> Day-rest: Rooms Available | R Price </h6>
      <h6 class="card-subtitle mb-2"><i class="fa fa-bed" style="color:#2196F3" data-toggle="tooltip" data-placement="top" title="over-night rooms available"></i> Overnight: Rooms Available ' | R Price</h6>
      <ul class="list-inline">
      <li class="list-inline-item"><i class="fas fa-wifi" data-placement="top" data-toggle="tooltip" title="Wi-Fi available"></i></li>
      <li class="list-inline-item"><i class="fas fa-tv" data-placement="top" data-toggle="tooltip" title="Dstv"></i></li>
      <li class="list-inline-item"><img src="img/netflix.svg" data-placement="top" data-toggle="tooltip" title="Netflix" height="15px"></li>
      <li class="list-inline-item"><i class="fas fa-car" data-placement="top" data-toggle="tooltip" title="Car Parking"></i></li>
      <li class="list-inline-item"><i class="fas fa-couch" data-placement="top" data-toggle="tooltip" title="Lounge"></i></li>
      <li class="list-inline-item"><i class="fas fa-utensils" data-placement="top" data-toggle="tooltip" title="Breakfast"></i></li>
      <li class="list-inline-item"><i class="fas fa-swimming-pool" data-placement="top" data-toggle="tooltip" title="Swimming Pool"></i></li>                          
      </ul>
        <p class="card-text"><small class="text-muted">Last updated date and time</small></p>
      </div>
    </div>
  </div>
</div>
<p tyle="text-align: left"><b>Features Icon explaination:</b> </p>
<ul style="text-align: left">
<p tyle="text-align: left"> <small>These will differ from ad to ad</small> </p>
<li><i class="fas fa-sun" style="color:#FEDD39" data-toggle="tooltip" data-placement="top" title="day-rest rooms available"></i> Day-Rest: The number next to this Icon shows the number of day-rest rooms available.</li>
<li><i class="fa fa-bed" style="color:#2196F3" data-toggle="tooltip" data-placement="top" title="over-night rooms available"></i> Overnight-Stay: The number next to this Icon shows the number of overnight rooms available.</li>
<li><i class="fas fa-wifi" data-placement="top" data-toggle="tooltip" title="Wi-Fi available"></i> - Wi-Fi Availability</li>
<li><i class="fas fa-tv" data-placement="top" data-toggle="tooltip" title="Dstv"></i> - Dstv Available</li>
<li><img src="img/netflix.svg" data-placement="top" data-toggle="tooltip" title="Netflix" height="15px"> - Netflix Available</li>
<li><i class="fas fa-car" data-placement="top" data-toggle="tooltip" title="Car Parking"></i> - Car Parking Available</li>
<li><i class="fas fa-couch" data-placement="top" data-toggle="tooltip" title="Lounge"></i> - Lounge</li>
<li><i class="fas fa-utensils" data-placement="top" data-toggle="tooltip" title="Breakfast"></i> - Breakfast Available</li>
<li><i class="fas fa-swimming-pool" data-placement="top" data-toggle="tooltip" title="Swimming Pool"></i> - Swimming Pool</li>  
</ul>

<br>
<hr class="my-4">
<h4 id="ad_instructions">Advertising <small><span class="badge badge-primary">It's Free</span></small></h4>

<p>If you want to advertise, sign-up by clicking the 
<button class="btn btn-secondary btn-sm" type="button">
<i class="fas fa-user"></i> Sign Up</a>
 </button> button on the menu bar. A <b>registration form</b> will appear. Fill it out as instructed. 
</p>

<p>After you've registered click the 
<button class="btn btn-secondary btn-sm" type="button">
<i class="fas fa-sign-in-alt"></i> Login
 </button> button on the menu bar. A <b>login form</b> will pop-up. Fill it out as instructed then click the login button.
</p>

<p>When you're logged in you can post an advertisement by clicking the 
<button class="btn btn-secondary btn-sm" type="button">
<i class="fas fa-edit"></i>  Post Ad</a>
 </button> button on the menu bar. An <b>advertisement form</b> will appear. On this form
 you will be able to insert your property's address, choose  your <b>preferred tenant</b> (students/professionals/guest), set prices, give a detailed description,
 choose <b>features</b> (e.g Wi-Fi), attach pictures and your contact information. Once you have fill out the form as instructed click the 
 <button type="button"class="btn btn-primary btn-sm">Post</button> button.
</p>

<p>After posting your advertisement you will be able to see it in the relevant accommodation page ,i.e
 if your <b>preferred tenant</b>  was <b>students</b>, then you'll see your advertisement on the <b>student accommodation listing</b> page.
 This is how your advertisement will look like, assuming you are still logged in:
 </p>
 <div class="card mb-3" style="max-width: 540px;">
  <div class="row no-gutters">
    <div class="col-md-4">
      <img src="img/Lead-Gray-600x600.jpg" class="card-img" alt="...">
      <div class="card-img-overlay">
      <button type="button" class="btn btn-outline-light btn-block">View Details</button>
      <button type="button" class="btn btn-outline-info btn-block">Edit</button>
      <button type="button" class="btn btn-outline-danger btn-block">Delete</button>
    </div>
    </div>
    <div class="col-md-8">
      <div class="card-body">
        <h6 class="card-title"><i class="fa fa-map-marker-alt" aria-hidden="true" style="color:#0052cc" data-placement="top" data-toggle="tooltip" title="Location"></i>  Address</h6>
        <p class="card-subtitle">Pricing Information</p>
        <p class="card-text text-muted">Helpful icons</p>
        <p class="card-text">Description (Glimpse)</p>
        <p class="card-text"><small class="text-muted">Last updated date and time</small></p>
      </div>
    </div>
  </div>
</div>
<p class="card-text text-muted">Note: Your Ads will have two more buttons on them one for editing
and the other for deleting the Ad</p>
<hr class="my-4">
<h4 style="text-align: left">Editing, Updating and Deleting advertisements</h4>
<h5 style="text-align: left">Editing and Updating</h5>

<p style="text-align: left">To edit and update your advertisement click on the
 <button type="button" class="btn btn-outline-info btn-sm">Edit</button> button and you will be presented
 a similar form as the <b>advertisement form</b> filled in with your advertisement details. You can edit this information
 and save changes by clicking the <button type="button"class="btn btn-primary btn-sm">Save Changes</button> Button and
 your advertisement will be updated.
</p>

<h5 style="text-align: left">Deleting your Ad</h5>
<p style="text-align: left">To delete your advertisement, you can simply click the 
<button type="button" class="btn btn-outline-danger btn-sm">Delete</button> Button and your Ad will be deleted.
</p>
<p class="card-text text-muted">Note: Deleting your advert is irreversable</p>

<p>If there's anything unclear you can <a href="contactus.php">contact us</a></p>

 <div class="modal fade" id="loginModal" role="dialog">
<!--Registrion modal content-->
</div> 

<div class="modal fade" id="regModal" role="dialog">
<!--Registrion modal content-->
</div>

<div class="modal fade" id="postAdModal" role="dialog" >
<!--Post advertisement modal content-->
</div>

<div class="modal fade" id="editAdModal" role="dialog" >
<!--Edit advertisement modal content-->
</div>

<input type="hidden" value="<?php echo $_SESSION['user_id'] ?>" class="user_id">
</div>
</div>
</div>
    <footer>
    <p>Copyright &copy;2020</p>
    </footer>
    <script src="loadelements.js"></script>
<script src="scripts/scrollTopScript.js"></script>
  <script src="postadtenantcbscript_a.js"></script>
 <script src="adimagesupload_a.js"></script>
    <script src="clearform.js"></script>
    <script src="registrationscript_b.js"></script>
    <script src="modal_handler.js"></script>
<script src="loginformvalidation_a.js"></script>
<script src="postadscript_a.js"></script>
<script src="fetch/guest_ad_fetch_a.js"></script>
    <script src="ad_views/guest_ad_view.js"></script>
    <script src="updateadscript_a.js"></script>
    <script src="delete_guest_ad.js"></script>
   
</body>


</html>
<!DOCTYPE html>
<?php include 'connect.php';
session_start();

$user_id = 0;
if (isset($_SESSION['user_id']))
  {
    $user_id = $_SESSION['user_id'];
      //Do stuff
  }

if (isset($_GET['page_no']) && $_GET['page_no']!="") {
  $page_no = $_GET['page_no'];
  } else {
      $page_no = 1;
      }


$total_records_per_page = 10;        

$offset = ($page_no-1) * $total_records_per_page;
$previous_page = $page_no - 1;
$next_page = $page_no + 1;
$adjacents = "2";

$result_count=0;
$sql="";
$search_res="";
$is_demo ="";
$clearbtn="";
$searchtxt="";

if(isset($_SESSION['location'])){
  $searchtxt = $_SESSION['location'];
}


if(strlen($searchtxt) > 1){
  $searchhq = $_SESSION['location'];
  $searchhq = preg_replace("#[^0-9a-z]#i","",$searchhq);

  if(strlen($searchhq) > 1){
    $clearbtn='<a id="clearSearchButton" class="btn btn-search btn-danger" type="button" href="clear_refresh.php">Clear Search </a>';
    $search_res ='<div class="search-result-text" style="padding-top:15px;">
 <p>Showing results for <b>'.$searchhq.'</b>...</p>
 </div>';
}

  $result_count = mysqli_query(
    $connect,
    "SELECT COUNT(*) As total_records FROM `student_acc` WHERE address LIKE'%$searchhq%'"
    );
    $sql = "SELECT * FROM student_acc WHERE address LIKE'%$searchhq%' ORDER BY date DESC LIMIT $offset, $total_records_per_page";
}
else{
$result_count = mysqli_query($connect,"SELECT COUNT(*) As total_records FROM `student_acc`");
$sql = "SELECT * FROM student_acc  ORDER BY date DESC LIMIT $offset, $total_records_per_page";
}

if(isset($_POST['search'])){
  $searchhq = $_POST['search'];
  $searchhq = preg_replace("#[^0-9a-z]#i","",$searchhq);

  if(strlen($searchhq) > 1){
    $clearbtn='<a id="clearSearchButton" class="btn btn-search btn-danger" type="button" href="clear_refresh.php"><b>Clear</b></a>';
    $search_res ='<div class="search-result-text" style="padding-top:15px;">
 <p>Showing results for <b>'.$searchhq.'</b>...</p>
 </div>';
}

  $result_count = mysqli_query(
    $connect,
    "SELECT COUNT(*) As total_records FROM `guest_acc` WHERE address LIKE'%$searchhq%'"
    );
    $sql = "SELECT * FROM guest_acc WHERE address LIKE'%$searchhq%' ORDER BY date DESC LIMIT $offset, $total_records_per_page";
}
else{
$result_count = mysqli_query(
$connect,
"SELECT COUNT(*) As total_records FROM `guest_acc`"
);
$sql = "SELECT * FROM guest_acc ORDER BY date DESC LIMIT $offset, $total_records_per_page";
}

$total_records = mysqli_fetch_array($result_count);
$total_records = $total_records['total_records'];
$total_no_of_pages = ceil($total_records / $total_records_per_page);
$second_last = $total_no_of_pages - 1; // total pages minus 1

$feat_wifi = '<li class="list-inline-item"><i class="fas fa-wifi" data-placement="top" data-toggle="tooltip" title="Wi-Fi available"></i></li> ';
$feat_dstv = '<li class="list-inline-item"><i class="fas fa-tv" data-placement="top" data-toggle="tooltip" title="Dstv"></i></li> ';
$feat_neflix = '<li class="list-inline-item"><img src="img/netflix.svg" data-placement="top" data-toggle="tooltip" title="Netflix" height="15px"></li> ';
$feat_parking = '<li class="list-inline-item"><i class="fas fa-car" data-placement="top" data-toggle="tooltip" title="Car Parking"></i></li> ';
$feat_lounge= '<li class="list-inline-item"><i class="fas fa-couch" data-placement="top" data-toggle="tooltip" title="Lounge"></i></li> ';
$feat_breakfast = '<li class="list-inline-item"><i class="fas fa-utensils" data-placement="top" data-toggle="tooltip" title="Breakfast"></i></li> ';
$feat_pool = '<li class="list-inline-item"><i class="fas fa-swimming-pool" data-placement="top" data-toggle="tooltip" title="Swimming Pool"></i></li> ';

$feat_list= "";
$count =0;
$output = "";
$no_output = "<h2><b>No Results Found... </b></h2>";

$res_data = mysqli_query($connect,$sql);
while($row = mysqli_fetch_array($res_data)){

if($row['user_id'] ==  $user_id) {
      $actionButton = '
      <button type="button" id="'.$row['ad_id'].'" class="btn btn-outline-light btn-block view">View Details</button>
      <button type="button" id="'.$row['ad_id'].'" class="btn btn-outline-info btn-block edit">Edit</button>
      <button type="button" id="'.$row['ad_id'].'" class="btn btn-outline-danger btn-block delete">Delete</button>';
    }

    else {
      $actionButton = '<button type="button" id="'.$row['ad_id'].'" class="btn btn-outline-light btn-block view">View Details</button>';
    }

    if($row['user_id'] ==1) {
      $is_demo .='<div class="card-badge">Demo</div>';
    } 

  $q = "SELECT * FROM guest_img WHERE ad_id = ".$row['ad_id'];
  $f = "SELECT * FROM guest_acc_feat WHERE ad_id = ".$row['ad_id'];

  $res = mysqli_query($connect, $q);
  $image = mysqli_fetch_array($res);

  
  $res_f = mysqli_query($connect, $f);
  $feats = mysqli_fetch_array($res_f);

  if($feats['wifi']==1){
    $feat_list .= $feat_wifi;
  }
  if($feats['parking']==1){
    $feat_list .= $feat_parking;
  }
  if($feats['dstv']==1){
    $feat_list .= $feat_dstv;
  }
  if($feats['netflix']==1){
    $feat_list .= $feat_neflix;
  }
  if($feats['lounge']==1){
    $feat_list .= $feat_lounge;
  }
  if($feats['pool']==1){
    $feat_list .= $feat_pool;
  }
  if($feats['breakfast']==1){
    $feat_list .= $feat_breakfast;
  }

  //here goes the data
  $output .= '<div class="col">

  <div id="'.$row['ad_id'].'" class="card mb-3" style="max-width: 540px;">
<div class="row no-gutters">
  <div class="col-md-4">
    <img src="'.$image['image'].'" class="card-img" alt="img/Lead-Gray-600x600.jpg">
    <div class="card-img-overlay ">
    '.$actionButton.'
    </div>
  </div>
  <div class="col-md-8">
    <div class="card-body">
    <h5 class="card-title">'.$row['housename'].'</h5>
      <h6 class="card-subtitle mb-2"><i class="fa fa-map-marker-alt" aria-hidden="true" style="color:#FE3939"></i> '.$row['address'].'</h6>
      <h6 class="card-subtitle mb-2"><i class="fas fa-sun" style="color:#FEDD39" data-toggle="tooltip" data-placement="top" title="day-rest rooms available"></i> Day-rest: '.$row['dayrestroom'].' | R '.$row['dayrestprice'].' </h6>
      <h6 class="card-subtitle mb-2"><i class="fa fa-bed" style="color:#2196F3" data-toggle="tooltip" data-placement="top" title="over-night rooms available"></i> Overnight: '.$row['overnightroom'].' | R '.$row['overnightprice'].'</h6>
      <ul class="list-inline">
      '.$feat_list.'                           
      </ul>
      <small class="text-muted"> Last Update: '.$row['date'].'</small>
    </div>
  </div>
  '.$is_demo.'
</div>
</div>
</div>';

$feat_list= "";
$count++;
if($count % 2 == 0)
{
  $output.='
  <div class="w-100"></div>';
//its divisible by 2

}
}
mysqli_close($connect);

//;
?>
<html lang="en">

<head>
<meta charset="utf-8">
<title>Search & Find Guest Houses Nearby | Living Space</title>
<meta name="description" content="Online guest house listing where people can browse or search for local guest houses.">
<meta name="keywords" content="Guest, House,Guest House, Guest Accommodation, Nearby,Living Space">
<meta name="revised" content="Living Space, 15/2/2020">
<meta name="author" content="Thabiso Ramokopu">
<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

<link rel="sitemap" type="application/xml" title="Sitemap" href="sitemap.xml" />
<link rel="shortcut icon" href="favicon/favicon.ico">
<link href="https://fonts.googleapis.com/css?family=Roboto" rel="stylesheet"/>
    <script src="https://code.jquery.com/jquery-3.2.1.min.js"></script>
    <link rel="stylesheet" href="css-a.css">
    <link rel="stylesheet" href="ad-page.css">
    <link rel="stylesheet" href="main.css">
    <link rel="stylesheet" href="floating-labels.css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.0/css/all.css" integrity="sha384-lZN37f5QGtY3VHgisS14W3ExzMWZxybE1SJSEsQp9S+oqd12jhcu+A56Ebc1zFSJ" crossorigin="anonymous">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="node_modules/baguettebox.js/dist/baguetteBox.css">
    <script src="node_modules/baguettebox.js/dist/baguetteBox.js" async></script>
<link rel="stylesheet" href="grid-gallery-a.css">
<link rel="stylesheet" href="mcss.css">

<style>
body.modal-open {
    position: inherit;
}

.card .card-badge {
  position:absolute;
  top:-10px;
  left:-30px;
  padding:5px;
  background:blue;
  color:white;
  transform:rotate(-20deg);
}

</style>

    

</head>

<body>
    <header>
        <div id="header">

        </div>
    </header>


<div class="view-list">
<button onclick="topFunction()" id="myBtn" title="Go to top"><i class='fas fa-angle-double-up' style='font-size:24px;color:white'></i></button>

<div class="container" style="padding-top:25px;">

</div>
<!---Student table---> 
   <h2><b>Guest </b> Houses</h2>
                <p> Find Guest Houses nearby</p>
                <div class="nav nav-justified navbar-nav">
 
 <form class="navbar-form navbar-search" action="guestpage.php" method="post" role="search">
     <div class="input-group">
     <input type="text" id="mySearchText" name="search" class="form-control" placeholder="Search City/Town">
                    <div class="input-group-append" id="button-addon4">
                        <?php echo $clearbtn ?>
                        <button id="mySearchButton" class="btn btn-search btn-primary" type="submit">
                        <i class="fas fa-search"></i>
                        </button>
                    </div>
     </div>  
 </form>   

</div> 

<?php print($search_res)?>       

<div class="container" style="padding-top:25px;">

</div>

<div class="container">
<div id="display_info" class="row">

<?php
if(strlen($output) > 1){
print("$output");
}
else {
  print("$no_output");
}
?>


</div>

<div style='padding: 10px 20px 0px; border-top: dotted 1px #CCC;'>
<strong>Page <?php echo $page_no." of ".$total_no_of_pages; ?></strong>
</div>

<ul class="pagination justify-content-left">

<li <?php if($page_no <= 1){ echo "class='page-item disabled'"; } ?>>
<a class="page-link" <?php if($page_no > 1){
echo "href='?page_no=$previous_page'";
} ?>>Previous</a>
</li>

<?php
if ($total_no_of_pages <= 10){   
  for ($counter = 1; $counter <= $total_no_of_pages; $counter++){
  if ($counter == $page_no) {
  echo "<li class='page-item active'><a class='page-link'>$counter</a></li>"; 
          }else{
         echo "<li ><a class='page-link' href='?page_no=$counter'>$counter</a></li>";
                 }
         }
 }
elseif ($total_no_of_pages > 10){
// Here we will add further conditions
if($page_no <= 4) { 
  for ($counter = 1; $counter < 8; $counter++){ 
  if ($counter == $page_no) {
     echo "<li class='page-item active'><a class='page-link'>$counter</a></li>"; 
  }else{
            echo "<li class='page-item'><a class='page-link' href='?page_no=$counter'>$counter</a></li>";
                 }
 }
 echo "<li class='page-item'><a>...</a></li>";
 echo "<li class='page-item'><a class='page-link' href='?page_no=$second_last'>$second_last</a></li>";
 echo "<li class='page-item'><a class='page-link' href='?page_no=$total_no_of_pages'>$total_no_of_pages</a></li>";
 }

 elseif($page_no > 4 && $page_no < $total_no_of_pages - 4) { 
  echo "<li class='page-item'><a class='page-link' href='?page_no=1'>1</a></li>";
  echo "<li class='page-item'><a class='page-link' href='?page_no=2'>2</a></li>";
  echo "<li class='page-item'><a class='page-link'>...</a></li>";
  for (
       $counter = $page_no - $adjacents;
       $counter <= $page_no + $adjacents;
       $counter++
       ) { 
       if ($counter == $page_no) {
   echo "<li class='page-item active'><a class='page-link'>$counter</a></li>"; 
   }else{
          echo "<li class='page-item'><a class='page-link' href='?page_no=$counter'>$counter</a></li>";
            }                  
         }
  echo "<li class='page-item'><a class='page-link'>...</a></li>";
  echo "<li class='page-item'><a class='page-link' href='?page_no=$second_last'>$second_last</a></li>";
  echo "<li class='page-item'><a class='page-link' href='?page_no=$total_no_of_pages'>$total_no_of_pages</a></li>";
  }

else {
echo "<li class='page-item'><a class='page-link' href='?page_no=1'>1</a></li>";
echo "<li class='page-item'><a class='page-link' href='?page_no=2'>2</a></li>";
echo "<li class='page-item'><a class='page-link'>...</a></li>";
for (
     $counter = $total_no_of_pages - 6;
     $counter <= $total_no_of_pages;
     $counter++
     ) {
     if ($counter == $page_no) {
 echo "<li class='page-item active'><a class='page-link'>$counter</a></li>"; 
 }else{
        echo "<li class='page-item'><a class='page-link' href='?page_no=$counter'>$counter</a></li>";
 }                   
     }
}

}
 ?>
<li <?php if($page_no >= $total_no_of_pages){
echo "class='page-item disabled'";
} ?>>
<a class="page-link" <?php if($page_no < $total_no_of_pages) {
echo "href='?page_no=$next_page'";
} ?>>Next</a>
</li>
 
<?php if($page_no < $total_no_of_pages){
echo "<li class='page-item'><a class='page-link' href='?page_no=$total_no_of_pages'>Last &rsaquo;&rsaquo;</a></li>";
} ?>
</ul>
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


 <!--View Advertisment Modal -->
 <div class="modal fade" id="viewAdModal" role="dialog">
    <div class="modal-dialog">

        <!-- Modal content-->
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <h5 class="modal-title">Guest House Details</h5>
                   
                </div>

                <div class="modal-body">
                    <form id="advertisment_view" enctype="multipart/form-data">
                    <div id="datetime_view"> 
                                <p> </p>
                             </div>
                             <p id="view_housename" class="h5"></p>     
                                <div id="view_address">
                                    <p></p>
                                </div>
                                <hr class="my-4">
                          <p class="h5">Gallery</p>
                          <small>Click image to enlarge it</small>
                           <section class="gallery gallery-block grid-gallery ">
                           <div class="scrolling-wrapper" id="preview_view">

                            </div>                     
                            </section>
                            <hr class="my-4">
                            
                        
                        <p class="h5">Accomodation</p> 
                                 <!-- Day-Rest Rooms  -->
                            <ul id="dayrest_details" class="list-inline">
                              
                              </ul>                 
                                  
                                  <!-- Over-night Rooms Available -->
                              <ul id="overnight_details" class="list-inline">
                                    
                              </ul>

                              <p><b>Features & Facilities</b></p> 
                              <ul id="view_feature_list" class="list-group list-group-flush">

                              </ul>
                              <p></p> 
                            <p class="h5">Description</p> 
                            <div id="view_description" class="form-group" style="text-align: left">
                                <p></p>
                            </div>
                            <hr class="my-4">
                            <p class="h5">Contact</p>
                            <div class="form-group row">
                                    <label for="view_contact_person" class="col-sm-4 col-form-label"><b>Contact Person:</b></label>
                                    <div class="col-sm-6">
                                    <input type="text" readonly class="form-control-plaintext" id="view_contact_person" value="" style="text-align:center;">
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label for="view_contact_no" class="col-sm-4 col-form-label"><b>Contact Number:</b></label>
                                    <div class="col-sm-6">
                                    <input type="text" readonly class="form-control-plaintext" id="view_contact_no" value="" style="text-align:center;">
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label for="view_contact_email" class="col-sm-4 col-form-label"><b>Email:</b></label>
                                    <div class="col-sm-6">
                                    <input type="text" readonly class="form-control-plaintext" id="view_contact_email" value="" style="text-align:center;">
                                    </div>
                                </div>                            
                        </form>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

</body>
<footer>
<p>Copyright &copy; 2020</p>
<input type="hidden" value="<?php echo $_SESSION['user_id'] ?>" class="user_id"/>
</footer>
<script type="text/javascript">
$(document).ready(function(){
	$('[data-toggle="tooltip"]').tooltip();
});

$(document).ready(function() {
 // executes when HTML-Document is loaded and DOM is ready
  $( ".card" ).hover(
  function() {
    $(this).addClass('shadow-lg').css('cursor', 'pointer'); 
  }, function() {
    $(this).removeClass('shadow-lg');
  }
);
  
// document ready  
});
</script>
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

    
</html>

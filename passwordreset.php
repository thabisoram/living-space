<!DOCTYPE html>
<?php include 'connect.php';
session_start();
//;
?>
<html lang="en">

<head>
<meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link rel="stylesheet" href="css-a.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.3/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.0/css/all.css" integrity="sha384-lZN37f5QGtY3VHgisS14W3ExzMWZxybE1SJSEsQp9S+oqd12jhcu+A56Ebc1zFSJ" crossorigin="anonymous">
    <script src="https://jacoblett.github.io/bootstrap4-latest/bootstrap-4-latest.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.2.1.min.js"></script>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>

<link rel="stylesheet" href="mobile.css">
<style>
    .view-list {
        /* The image used */
        background-color: orange;
        /* Full height */
        min-height: 100%;
        padding: 25px;
        text-align: center;
    }

    .category-panel {
        height: 200px;

    }

.category-panel:hover {
    background-color: #ffc757;

}   

.img-left {
    height: 150px;
    margin-right: 10px;
    float: left;
}


</style>

    <title>Password Reset</title>
    
    <!--
      <link rel="stylesheet" href="modalcss.css"> 
   -->

</head>

<body>
 <div id="header">

</div>
    
  <!--<div class="jumbotron text-center" >
    <img src="livingspacelogo.png" height="105px" width="642px">
    </div>--->  

    <div class="view-list">
        <form id="password_recover">
            <h2>Password Reset</h2>

            <div class="list-group">
            <a id="password_email_recovery" class="list-group-item list-group-item-action flex-column align-items-start">
            
                <div class="form-group">
                    <label for="email_recovery_txt">Email address</label>
                    <input type="email" class="form-control" id="email_recovery_txt" placeholder="Enter email" >
                    <small id="emailHelp" class="form-text text-muted">Enter the email address you used to login</small>
                    <div id="email_recovery_txt_valid"class="valid-feedback" style="display:none">
                        Looks good! Check your email
                    </div>
                    <div id="email_recovery_txt_invalid"class="invalid-feedback" style="display:none">
                        
                    </div>

                </div>
                <button type="button" id="email_recovery_btn" class="btn btn-dark btn-block" >Submit</button>
               
            </a>
            <a id="password_code_recovery" class="list-group-item list-group-item-action flex-column align-items-start" style="display:none;">
                <div class="form-group">
                    <label for="code_recovery_txt">Code</label>
                    <input type="email" class="form-control disable" id="code_recovery_txt" placeholder="Enter code">
                    <small id="emailCodeHelp" class="form-text text-muted">Enter the code that's been sent to your email</small>
                    <div id="code_recovery_txt_valid"class="valid-feedback" style="display:none">
                        Great! Set a new password
                    </div>
                    <div id="code_recovery_txt_invalid"class="invalid-feedback" style="display:none">
                        
                    </div>
                </div>
                <button type="button" id="code_recovery_btn" class="btn btn-dark btn-block">Submit</button>
            </a>
            <a id="new_password_recovery" class="list-group-item list-group-item-action flex-column align-items-start" style="display:none;">
            <div class="form-group">
                    <label for="new_password_txt">Create a new Passsword</label>
                    <input type="email" class="form-control" id="new_password_txt" placeholder="Enter password" >
                </div>

                <div class="form-group">
                <input type="email" class="form-control" id="confirm_password_txt" placeholder="Confirm password" >
                <small id="passwordHelp" class="form-text text-muted"> Tip: Save password for this site</small>
                   
                </div>
                <div id="password _txt_valid"class="valid-feedback" style="display:none">
                        New password set
                    </div>
                <div id="password_txt_invalid"class="invalid-feedback" style="display:none">
                        
                    </div> 
                    <div id="dvCountDown" style = "display:none">
                    You will be redirected after <span id = "lblCount"></span>&nbsp;seconds.
                    </div>
                <button type="button" id="new_password_btn" class="btn btn-dark btn-block disable" >Submit</button>
            </a>
            </div>
        </form>


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
    <p>Copyright &copy;2019</p>
    </footer>
    <script src="resetpasswordscript.js"></script>
    <script src="modal_handler.js"></script>
   <script src="loadelements.js"></script>
    <script src="loginformvalidation_a.js"></script>
    <script src="postadtenantcbscript.js"></script>
    <script src="adimagesupload_a.js"></script>
   <script src="adformvalidation_a.js"></script>  
    <script src="clearform.js"></script>
    <script src="registrationscript.js"></script>
    <!---->
   
</body>


</html>
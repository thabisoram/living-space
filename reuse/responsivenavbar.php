<nav class="navbar navbar-expand-lg navbar-dark bg-dark">

<!--  Show this only on mobile to medium screens  -->
  <a class="navbar-brand d-lg-none" href="index.php">
  <img src="img/logo.svg" alt="" height="40px" style="color: grey">
  </a>

  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarToggle" aria-controls="navbarToggle" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>

<!--  Use flexbox utility classes to change how the child elements are justified  -->
  <div class="collapse navbar-collapse justify-content-between" id="navbarToggle">

    <ul class="navbar-nav">
      <li class="nav-item">
        <a class="nav-link active" href="index.php">Home <span class="sr-only">(current)</span></a>
      </li>
      <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
        Accommodation Lists
        </a>
        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
          <a class="dropdown-item" href="studentpage.php">Student Accomodation</a>
          <a class="dropdown-item" href="professionalspage.php">Professionals' Accomodation</a>
          <a class="dropdown-item" href="guestpage.php">Guest House  <span class="badge badge-primary"> Beta</span></a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="contactus.php">Contact Us</a>
      </li>
    </ul>
    
    
<!--   Show this only lg screens and up   -->
		    
  <a class="navbar-brand d-none d-lg-block text-center">
      <img src="img/logo.svg" alt="" height="30px" style="color: grey">
    </a>

    <ul class="navbar-nav">
    <li class="nav-item">
        <a class="nav-link" href="help.php"><i class="fas fa-question-circle"></i>  Help</a>
      </li>
    <?php
    session_start();

            if(isset($_SESSION['user_id']))
            {
              echo '<li class="nav-item" id="post_ad_btn" data-toggle="modal" data-target="#postAdModal">
                <a class="nav-link" href="#"><i class="fas fa-edit"></i>  Post Ad</a>
              </li>
              <li class="nav-item" id="sign_out_btn"><a href="logout.php">
                <a class="nav-link" href="logout.php"><i class="fas fa-sign-out-alt"></i> Log Out</a>
              </li>';
             
            }
            else
            {
              
               echo '<li class="nav-item" id="reg_btn" data-toggle="modal" data-target="#regModal">
                <a class="nav-link" href="#"><i class="fas fa-user"></i> Sign Up</a>
              </li>
              <li class="nav-item" id="login_btn" data-toggle="modal" data-target="#loginModal">
                <a class="nav-link" href="#"><i class="fas fa-sign-in-alt"></i> Login</a>
              </li>';
            }
            ?>
      
      <!--  <li class="nav-item" id="reg_btn" data-toggle="modal" data-target="#regModal">
        <a class="nav-link" href="#"><i class="fas fa-user"></i> Sign Up</a>
      </li>
      <li class="nav-item" id="login_btn" data-toggle="modal" data-target="#loginModal">
        <a class="nav-link" href="#"><i class="	fas fa-sign-in-alt"></i> Login</a>
      </li>
       Show this only lg screens and up 
       <li class="nav-item" id="post_ad_btn" data-toggle="modal" data-target="#postAdModal">
        <a class="nav-link" href="#"><i class="fas fa-edit"> Post Ad</a>
      </li>
      <li class="nav-item" id="sign_out_btn"><a href="logout.php">
        <a class="nav-link" href="#"><i class="fas fa-sign-out-alt"> Log Out</a>
      </li>
     -->
         
      
    </ul>
  </div>
</nav>
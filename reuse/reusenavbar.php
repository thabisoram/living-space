<nav class="navbar navbar-inverse" id="myTopnav">
        <div class="container-fluid">
            <div class="navbar-header">
                <a class="navbar-brand" href="#"></a>
            </div>
            <ul class="nav navbar-nav">
                <li ><a href="LandingPage.php">Home</a></li>
                <li><a href="#">About Us</a></li>
                <li><a href="contactus.php">Contact Us</a></li>
                <li class="dropdown">
                    <a class="dropdown-toggle" data-toggle="dropdown" href="#">Find Your Space
                        <span class="caret"></span></a>
                    <ul class="dropdown-menu">
                        <li ><a href="studentpage.php">Student Accomodation</a></li>
                        <li><a href="professionalspage.php">General Accomodation</a></li>
                        <li><a href="#">Family Housing</a></li>
                        <li><a href="guestpage.php">Guest House</a></li>
                    </ul>
                </li>

            </ul>
            <ul class="nav navbar-nav navbar-right">
            <?php
            session_start();

            if(empty($_SESSION['user_id']))
            {
                echo '<li id="reg_btn" data-toggle="modal" data-target="#regModal"><a href="#"><span
                class="glyphicon glyphicon-user"></span> Sign
            Up</a></li>
             <li id="login_btn" data-toggle="modal" data-target="#loginModal"><a href="#"><span class="glyphicon glyphicon-log-in"></span>
            Login</a></li>';
            }else
            {
                echo '<li id="sign_out_btn"><a href="logout.php"><span class="glyphicon glyphicon-log-in"></span>
                Sign Out</a></li>
        <li id="post_ad_btn" data-toggle="modal" data-target="#postAdModal"><a
                href="#"><span class="glyphicon-glyphicon-edit"></span>
                Post Ad</a></li>';
            }
            ?>
              <!--<li id="reg_btn" data-toggle="modal" data-target="#regModal"><a href="#"><span
                            class="glyphicon glyphicon-user"></span> Sign
                        Up</a></li>
                <li id="login_btn" data-toggle="modal" data-target="#loginModal"><a href="#"><span class="glyphicon glyphicon-log-in"></span>
                        Login</a></li>
                <li id="sign_out_btn" style="display:none"><a href="logout.php"><span class="glyphicon glyphicon-log-in"></span>
                        Sign Out</a></li>
                <li id="post_ad_btn" style="display:none" data-toggle="modal" data-target="#postAdModal"><a
                        href="#"><span class="glyphicon-glyphicon-edit"></span>
                        Post Ad</a></li>--->  
            </ul>
        </div>
    </nav>
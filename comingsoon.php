<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
<link rel="stylesheet" href="css-a.css">
<link rel="stylesheet" href="main.css">
<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.0/css/all.css" integrity="sha384-lZN37f5QGtY3VHgisS14W3ExzMWZxybE1SJSEsQp9S+oqd12jhcu+A56Ebc1zFSJ" crossorigin="anonymous">
<script src="https://jacoblett.github.io/bootstrap4-latest/bootstrap-4-latest.min.js"></script>
<link href="https://fonts.googleapis.com/css?family=Anton|Bebas+Neue|Fjalla+One|Patua+One&display=swap" rel="stylesheet">
<title>Coming Soon</title>

<style>

body{
text-align:center;
color: white;
background: rgb(79,255,235);
background: linear-gradient(101deg, rgba(79,255,235,1) 0%, rgba(31,177,239,1) 28%, rgba(0,127,242,1) 97%);
}

h1{
    font-family: 'Bebas Neue', cursive;
    font-size: 60px;
}

h2 ,h3 {
    font-family: 'Heebo', sans-serif;
}

p{
    font-family: 'Heebo', sans-serif;
}
.count-down-timer{
    font-family: 'Bebas Neue', cursive;
  font-size: 50px;
}

.middle {
  position: absolute;
  top: 50%;
  left: 50%;
  transform: translate(-50%, -50%);
  text-align: center;
  max-width:500px;
}
.topleft {
  position: absolute;
  top: 16px;
  left: 16px;
}

</style>
</head>
<body>

<div class="topleft">
    <img src="img\logo.svg" height="65px">
  </div>

    <div class="container middle" >

    <h1>Coming soon</h1>
    <p class="count-down-timer" id="demo"></p>
    <h3> What is <b>Living Space</b> ? </h3>
    <h5> Living Space is an all-accomdation listing platform designed for students and workers.</h5>
    <div class="row"> 
    
    <div class="input-group mb-4 center-block">
  <input type="text" class="form-control" placeholder="Enter your email" aria-label="Enter your email" aria-describedby="button-addon2">
  <div class="input-group-append">
    <button class="btn btn-outline-light" type="button" id="button-addon2">Keep in touch</button>
  </div>
  <div>
  </div>
</div>

</div>
</body>
<script>
// Set the date we're counting down to
var countDownDate = new Date("Feb 5, 2020 23:37:25").getTime();

// Update the count down every 1 second
var x = setInterval(function() {

  // Get today's date and time
  var now = new Date().getTime();

  // Find the distance between now and the count down date
  var distance = countDownDate - now;

  // Time calculations for days, hours, minutes and seconds
  var days = Math.floor(distance / (1000 * 60 * 60 * 24));
  var hours = Math.floor((distance % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
  var minutes = Math.floor((distance % (1000 * 60 * 60)) / (1000 * 60));
  var seconds = Math.floor((distance % (1000 * 60)) / 1000);

  // Display the result in the element with id="demo"
  document.getElementById("demo").innerHTML = days + "d " + hours + "h "
  + minutes + "m " + seconds + "s ";

  // If the count down is finished, write some text
  if (distance < 0) {
    clearInterval(x);
    document.getElementById("demo").innerHTML = "EXPIRED";
  }
}, 1000);
</script>
</html>
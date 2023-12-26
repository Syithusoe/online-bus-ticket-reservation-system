<?php session_start(); ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
    <script src="https://use.fontawesome.com/releases/v5.0.8/js/all.js"></script>
    <link rel="stylesheet" href="css/Responsive.css">
    <title>ACE Express</title>

</head>
<body>

<!------ Navigation bar ----->
<nav class="navbar navbar-expand-md navbar-light bg-light sticky-top">
    <div class="container-fluid">
        <a class="navbar-brand" href="#"><img src="img/brandlogo1.png"></a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarResponsive">
            <ul class="navbar-nav ml-auto">
                <li class="nav-item"><a class="nav-link" href="index.php">HOME</a></li>
                <li class="nav-item"><a class="nav-link" href="#contact">CONTACT</a></li>
                <?php

                    if(isset($_SESSION['username'])){
                        echo '<li class="nav-item">
                            <a href="#" class="dropdown-toggle nav-link" data-toggle="dropdown">'.$_SESSION['username'].'</a>
                            <div style="right: 1%;left:auto" class="dropdown-menu">
                                <a class="dropdown-item" href="myticket.php">My ticket</a>
                                <a class="dropdown-item" href="logout.php">Log out</a>
                            </div>
                        </li>';
                    }else {
                        echo '<li class="nav-item"><a class="nav-link" href="register.php">REGISTER</a></li>';
                        echo '<li class="nav-item"><a class="nav-link" href="login.php">LOGIN</a></li>';
                    }
                ?>
            </ul>
        </div>
    </div>
</nav>

<!-----img Slider ----->

<div id="slides" class="carousel slide" data-ride="carousel">
    <ul class="carousel-indicators">
        <li data-target="#slides" data-slide-to="0" class="active"></li>
        <li data-target="#slides" data-slide-to="1"></li>
        <li data-target="#slides" data-slide-to="2"></li>
    </ul>
    <div class="carousel-inner">
        <div class="carousel-item active">
            <img src="img/slide1.jpg">
            <div class="carousel-caption">
                <h1 class="display-2">ACE Express</h1>
                <!-----<h3>Anywhere / Anytime </h3>---->
                <br>
                <br>
                <a href="#getStart"><button type="button" class="btn btn-outline-light btn-lg"> GET STARTED</button></a>
                <a href="bus-search.php"><button type="button" class="btn btn-primary btn-lg">BOOK BUS TICKET</button></a>
            </div>
        </div>
        <div class="carousel-item">
            <img src="img/slide2.jpg">
            <div class="carousel-caption">
                <h1 class="display-2">ACE  Express</h1>

                <a href="#getStart"><button type="button" class="btn btn-outline-light btn-lg"> GET STARTED</button></a>
                <a href="bus-search.php"><button type="button" class="btn btn-primary btn-lg">BOOK BUS TICKET</button></a>
            </div>
        </div>
        <div class="carousel-item">
            <img src="img/slide3.jpg">
            <div class="carousel-caption">
                <h1 class="display-2">ACE Express</h1>
                <button type="button" class="btn btn-outline-light btn-lg"> GET STARTED</button>
                <a href="bus-search.php"><button type="button" class="btn btn-primary btn-lg">BOOK BUS TICKET</button></a>
            </div>
        </div>
    </div>

</div>

<!-------- Jumbotron--------->
<div class="container-fluid">
    <div class="row jumbotron">
            <p class="lead">Book Online Express Bus Tickets in Myanmar. Instant booking confirmation.Pay securely with Credit Card.
            </p>
    </div>
</div>

<!------ Welcome Section 22:15----->
<div id="getStart" class="container-fluid padding">
    <div class="row welcome text-center">
        <div class="col-12">
            <h1 class="display-4">Your Trusted Service</h1>
        </div>
        <hr>
        <div class = "col-12">
            <p class="lead"> Welcome to our website!
                You can easily make a reservation for your bus ticket.It is very easy and simple to use it.
            </p>
        </div>
    </div>
</div>

<!---------- Three Column Section---------->

<div class="container-fluid padding">
    <div class="row text-center padding">
        <div class="col-xs-12 col-sm-6 col-md-4">
            <i class="fas fa-clock fa-7x"></i>
            <div><br></div>
            <h4>Save Time</h4>
        </div>
        <div class="col-xs-12 col-sm-6 col-md-4">
            <i class="fab fa-cc-visa fa-7x"></i>
            <div><br></div>
            <h4>Pay with Credit Card                                                                                                                                                                         </h4>
        </div>
        <div class="col-sm-12 col-md-4">
            <i class="fas fa-clipboard-list fa-7x"></i>
            <div><br></div>
            <h4>Reservation History Available</h4>
        </div>
    </div>
    <hr class="my-4">
</div>


<!-------------Two column section ---------->

<div class="container-fluid padding">
    <div class="row padding">
        <div class="col-md-12 col-lg-6">
            <h2>For your convenience . . .</h2>
            <p>Our bus ticket reservation service is the best service that make the best routes and services for the customers.
            </p>
            <br>
        </div>
        <div class="col-lg-6">
            <img src="img/bus1.jpg" class="img-fluid">
        </div>
    </div>
</div>
<hr class="my-4">
<!-----------contact------->
<div class="container-fluid padding" id="contact">
    <div class="row text-center padding">
        <div class="col-12">
            <h2>Contact</h2>
        </div>
        <div class="col-12 social padding">
            <a href="#"><i class="fab fa-facebook"></i></a>
            <a href="mailto: syithusoe@gmail.com"><i class="fas fa-envelope"></i></a>
            <a href="tel:+959796533012"><i class="fas fa-phone"></i></a>
        </div>
    </div>
</div>

<!--------footer------>
<footer>
    <div class="container-fluid padding">
        <div class="row text-center">
            <div class="col-md-4">
                <hr class="light">
                <p>+959691786123</p>
                <p>aceexpress@gmail.com</p>
                <p>Mandalay,Myanmar</p>
            </div>
            <div class="col-md-4">
                <hr class="light">
                <h5>Our Hours</h5>
                <p>24-hours Daily</p>
            </div>
            <div class="col-md-4">
                <hr class="light">
                <h5> Service Areas </h5>
                <p>Yangon</p>
                <p>Mandalay</p>
                <p>Meikhtila</p>
            </div>
            <div class="col-12">
                <hr class="light-100">
                <h5> &copy; ACE Express,2019</h5>
            </div>
        </div>
    </div>
</footer>
</body>
</html>
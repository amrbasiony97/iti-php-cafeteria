<?php
if (false) {
    // Title and Extra CSS

    $title = "ITI Cafeteria";
    ob_start();
?>


    <?php
    $extra_css = ob_get_clean();
    ?>

    <!-- Main Content -->
    <?php
    ob_start();
    ?>

    <div class="right_col" role="main">
        <div class="">
            <div class="page-title">
                <div class="title_left">
                    <h3>Contacts Design</h3>
                </div>

                <div class="title_right">
                    <div class="col-md-5 col-sm-5  form-group pull-right top_search">
                        <div class="input-group">
                            <input type="text" class="form-control" placeholder="Search for...">
                            <span class="input-group-btn">
                                <button class="btn btn-default" type="button">Go!</button>
                            </span>
                        </div>
                    </div>
                </div>
            </div>

            <div class="clearfix"></div>

            <div class="row">
                <div class="x_panel">
                    <div class="x_content">
                        <div class="col-md-12 col-sm-12  text-center">
                            <ul class="pagination pagination-split">
                                <li><a href="#">A</a></li>
                                <li><a href="#">B</a></li>
                                <li><a href="#">C</a></li>
                                <li><a href="#">D</a></li>
                                <li><a href="#">E</a></li>
                                <li>...</li>
                                <li><a href="#">W</a></li>
                                <li><a href="#">X</a></li>
                                <li><a href="#">Y</a></li>
                                <li><a href="#">Z</a></li>
                            </ul>
                        </div>

                        <div class="clearfix"></div>

                        <div class="col-md-4 col-sm-4  profile_details">
                            <div class="well profile_view">
                                <div class="col-sm-12">
                                    <h4 class="brief"><i>Digital Strategist</i></h4>
                                    <div class="left col-md-7 col-sm-7">
                                        <h2>Nicole Pearson</h2>
                                        <p><strong>About: </strong> Web Designer / UX / Graphic Artist / Coffee Lover </p>
                                        <ul class="list-unstyled">
                                            <li><i class="fa fa-building"></i> Address: </li>
                                            <li><i class="fa fa-phone"></i> Phone #: </li>
                                        </ul>
                                    </div>
                                    <div class="right col-md-5 col-sm-5 text-center">
                                        <img src="<?php asset('images/user.png') ?>" alt="" class="img-circle img-fluid">
                                    </div>
                                </div>
                                <div class=" profile-bottom text-center">
                                    <div class=" col-sm-6 emphasis">
                                        <p class="ratings">
                                            <a>4.0</a>
                                            <a href="#"><span class="fa fa-star"></span></a>
                                            <a href="#"><span class="fa fa-star"></span></a>
                                            <a href="#"><span class="fa fa-star"></span></a>
                                            <a href="#"><span class="fa fa-star"></span></a>
                                            <a href="#"><span class="fa fa-star-o"></span></a>
                                        </p>
                                    </div>
                                    <div class=" col-sm-6 emphasis">
                                        <button type="button" class="btn btn-success btn-sm"> <i class="fa fa-user">
                                            </i> <i class="fa fa-comments-o"></i> </button>
                                        <button type="button" class="btn btn-primary btn-sm">
                                            <i class="fa fa-user"> </i> View Profile
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="col-md-4 col-sm-4  profile_details">
                            <div class="well profile_view">
                                <div class="col-sm-12">
                                    <h4 class="brief"><i>Digital Strategist</i></h4>
                                    <div class="left col-sm-7">
                                        <h2>Nicole Pearson</h2>
                                        <p><strong>About: </strong> Web Designer / UI. </p>
                                        <ul class="list-unstyled">
                                            <li><i class="fa fa-building"></i> Address: </li>
                                            <li><i class="fa fa-phone"></i> Phone #: </li>
                                        </ul>
                                    </div>
                                    <div class="right col-sm-5 text-center">
                                        <img src="<?php asset('images/user.png') ?>" alt="" class="img-circle img-fluid">
                                    </div>
                                </div>
                                <div class=" bottom text-center">
                                    <div class=" col-sm-6 emphasis">
                                        <p class="ratings">
                                            <a>4.0</a>
                                            <a href="#"><span class="fa fa-star"></span></a>
                                            <a href="#"><span class="fa fa-star"></span></a>
                                            <a href="#"><span class="fa fa-star"></span></a>
                                            <a href="#"><span class="fa fa-star"></span></a>
                                            <a href="#"><span class="fa fa-star-o"></span></a>
                                        </p>
                                    </div>
                                    <div class=" col-sm-6 emphasis">
                                        <button type="button" class="btn btn-success btn-sm"> <i class="fa fa-user">
                                            </i> <i class="fa fa-comments-o"></i> </button>
                                        <button type="button" class="btn btn-primary btn-sm">
                                            <i class="fa fa-user"> </i> View Profile
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="col-md-4 col-sm-4  profile_details">
                            <div class="well profile_view">
                                <div class="col-sm-12">
                                    <h4 class="brief"><i>Digital Strategist</i></h4>
                                    <div class="left col-sm-7">
                                        <h2>Nicole Pearson</h2>
                                        <p><strong>About: </strong> Web Designer / UI. </p>
                                        <ul class="list-unstyled">
                                            <li><i class="fa fa-building"></i> Address: </li>
                                            <li><i class="fa fa-phone"></i> Phone #: </li>
                                        </ul>
                                    </div>
                                    <div class="right col-sm-5 text-center">
                                        <img src="<?php asset('images/user.png') ?>" alt="" class="img-circle img-fluid">
                                    </div>
                                </div>
                                <div class=" bottom text-center">
                                    <div class=" col-sm-6 emphasis">
                                        <p class="ratings">
                                            <a>4.0</a>
                                            <a href="#"><span class="fa fa-star"></span></a>
                                            <a href="#"><span class="fa fa-star"></span></a>
                                            <a href="#"><span class="fa fa-star"></span></a>
                                            <a href="#"><span class="fa fa-star"></span></a>
                                            <a href="#"><span class="fa fa-star-o"></span></a>
                                        </p>
                                    </div>
                                    <div class=" col-sm-6 emphasis">
                                        <button type="button" class="btn btn-success btn-sm"> <i class="fa fa-user">
                                            </i> <i class="fa fa-comments-o"></i> </button>
                                        <button type="button" class="btn btn-primary btn-sm">
                                            <i class="fa fa-user"> </i> View Profile
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="col-md-4 col-sm-4  profile_details">
                            <div class="well profile_view">
                                <div class="col-sm-12">
                                    <h4 class="brief"><i>Digital Strategist</i></h4>
                                    <div class="left col-sm-7">
                                        <h2>Nicole Pearson</h2>
                                        <p><strong>About: </strong> Web Designer / UI. </p>
                                        <ul class="list-unstyled">
                                            <li><i class="fa fa-building"></i> Address: </li>
                                            <li><i class="fa fa-phone"></i> Phone #: </li>
                                        </ul>
                                    </div>
                                    <div class="right col-sm-5 text-center">
                                        <img src="<?php asset('images/user.png') ?>" alt="" class="img-circle img-fluid">
                                    </div>
                                </div>
                                <div class=" bottom text-center">
                                    <div class=" col-sm-6 emphasis">
                                        <p class="ratings">
                                            <a>4.0</a>
                                            <a href="#"><span class="fa fa-star"></span></a>
                                            <a href="#"><span class="fa fa-star"></span></a>
                                            <a href="#"><span class="fa fa-star"></span></a>
                                            <a href="#"><span class="fa fa-star"></span></a>
                                            <a href="#"><span class="fa fa-star-o"></span></a>
                                        </p>
                                    </div>
                                    <div class=" col-sm-6 emphasis">
                                        <button type="button" class="btn btn-success btn-sm"> <i class="fa fa-user">
                                            </i> <i class="fa fa-comments-o"></i> </button>
                                        <button type="button" class="btn btn-primary btn-sm">
                                            <i class="fa fa-user"> </i> View Profile
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="col-md-4 col-sm-4  profile_details">
                            <div class="well profile_view">
                                <div class="col-sm-12">
                                    <h4 class="brief"><i>Digital Strategist</i></h4>
                                    <div class="left col-sm-7">
                                        <h2>Nicole Pearson</h2>
                                        <p><strong>About: </strong> Web Designer / UX / Graphic Artist / Coffee Lover </p>
                                        <ul class="list-unstyled">
                                            <li><i class="fa fa-building"></i> Address: </li>
                                            <li><i class="fa fa-phone"></i> Phone #: </li>
                                        </ul>
                                    </div>
                                    <div class="right col-sm-5 text-center">
                                        <img src="<?php asset('images/user.png') ?>" alt="" class="img-circle img-fluid">
                                    </div>
                                </div>
                                <div class=" bottom text-center">
                                    <div class=" col-sm-6 emphasis">
                                        <p class="ratings">
                                            <a>4.0</a>
                                            <a href="#"><span class="fa fa-star"></span></a>
                                            <a href="#"><span class="fa fa-star"></span></a>
                                            <a href="#"><span class="fa fa-star"></span></a>
                                            <a href="#"><span class="fa fa-star"></span></a>
                                            <a href="#"><span class="fa fa-star-o"></span></a>
                                        </p>
                                    </div>
                                    <div class=" col-sm-6 emphasis">
                                        <button type="button" class="btn btn-success btn-sm"> <i class="fa fa-user">
                                            </i> <i class="fa fa-comments-o"></i> </button>
                                        <button type="button" class="btn btn-primary btn-sm">
                                            <i class="fa fa-user"> </i> View Profile
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="col-md-4 col-sm-4  profile_details">
                            <div class="well profile_view">
                                <div class="col-sm-12">
                                    <h4 class="brief"><i>Digital Strategist</i></h4>
                                    <div class="left col-sm-7">
                                        <h2>Nicole Pearson</h2>
                                        <p><strong>About: </strong> Web Designer / UI. </p>
                                        <ul class="list-unstyled">
                                            <li><i class="fa fa-building"></i> Address: </li>
                                            <li><i class="fa fa-phone"></i> Phone #: </li>
                                        </ul>
                                    </div>
                                    <div class="right col-sm-5 text-center">
                                        <img src="<?php asset('images/user.png') ?>" alt="" class="img-circle img-fluid">
                                    </div>
                                </div>
                                <div class=" bottom text-center">
                                    <div class=" col-sm-6 emphasis">
                                        <p class="ratings">
                                            <a>4.0</a>
                                            <a href="#"><span class="fa fa-star"></span></a>
                                            <a href="#"><span class="fa fa-star"></span></a>
                                            <a href="#"><span class="fa fa-star"></span></a>
                                            <a href="#"><span class="fa fa-star"></span></a>
                                            <a href="#"><span class="fa fa-star-o"></span></a>
                                        </p>
                                    </div>
                                    <div class=" col-sm-6 emphasis">
                                        <button type="button" class="btn btn-success btn-sm"> <i class="fa fa-user">
                                            </i> <i class="fa fa-comments-o"></i> </button>
                                        <button type="button" class="btn btn-primary btn-sm">
                                            <i class="fa fa-user"> </i> View Profile
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="col-md-4 col-sm-4  profile_details">
                            <div class="well profile_view">
                                <div class="col-sm-12">
                                    <h4 class="brief"><i>Digital Strategist</i></h4>
                                    <div class="left col-sm-7">
                                        <h2>Nicole Pearson</h2>
                                        <p><strong>About: </strong> Web Designer / UI. </p>
                                        <ul class="list-unstyled">
                                            <li><i class="fa fa-building"></i> Address: </li>
                                            <li><i class="fa fa-phone"></i> Phone #: </li>
                                        </ul>
                                    </div>
                                    <div class="right col-sm-5 text-center">
                                        <img src="<?php asset('images/user.png') ?>" alt="" class="img-circle img-fluid">
                                    </div>
                                </div>
                                <div class=" bottom text-center">
                                    <div class=" col-sm-6 emphasis">
                                        <p class="ratings">
                                            <a>4.0</a>
                                            <a href="#"><span class="fa fa-star"></span></a>
                                            <a href="#"><span class="fa fa-star"></span></a>
                                            <a href="#"><span class="fa fa-star"></span></a>
                                            <a href="#"><span class="fa fa-star"></span></a>
                                            <a href="#"><span class="fa fa-star-o"></span></a>
                                        </p>
                                    </div>
                                    <div class=" col-sm-6 emphasis">
                                        <button type="button" class="btn btn-success btn-sm"> <i class="fa fa-user">
                                            </i> <i class="fa fa-comments-o"></i> </button>
                                        <button type="button" class="btn btn-primary btn-sm">
                                            <i class="fa fa-user"> </i> View Profile
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="col-md-4 col-sm-4  profile_details">
                            <div class="well profile_view">
                                <div class="col-sm-12">
                                    <h4 class="brief"><i>Digital Strategist</i></h4>
                                    <div class="left col-sm-7">
                                        <h2>Nicole Pearson</h2>
                                        <p><strong>About: </strong> Web Designer / UI. </p>
                                        <ul class="list-unstyled">
                                            <li><i class="fa fa-building"></i> Address: </li>
                                            <li><i class="fa fa-phone"></i> Phone #: </li>
                                        </ul>
                                    </div>
                                    <div class="right col-sm-5 text-center">
                                        <img src="<?php asset('images/user.png') ?>" alt="" class="img-circle img-fluid">
                                    </div>
                                </div>
                                <div class=" bottom text-center">
                                    <div class=" col-sm-6 emphasis">
                                        <p class="ratings">
                                            <a>4.0</a>
                                            <a href="#"><span class="fa fa-star"></span></a>
                                            <a href="#"><span class="fa fa-star"></span></a>
                                            <a href="#"><span class="fa fa-star"></span></a>
                                            <a href="#"><span class="fa fa-star"></span></a>
                                            <a href="#"><span class="fa fa-star-o"></span></a>
                                        </p>
                                    </div>
                                    <div class=" col-sm-6 emphasis">
                                        <button type="button" class="btn btn-success btn-sm"> <i class="fa fa-user">
                                            </i> <i class="fa fa-comments-o"></i> </button>
                                        <button type="button" class="btn btn-primary btn-sm">
                                            <i class="fa fa-user"> </i> View Profile
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="col-md-4 col-sm-4  profile_details">
                            <div class="well profile_view">
                                <div class="col-sm-12">
                                    <h4 class="brief"><i>Digital Strategist</i></h4>
                                    <div class="left col-sm-7">
                                        <h2>Nicole Pearson</h2>
                                        <p><strong>About: </strong> Web Designer / UI. </p>
                                        <ul class="list-unstyled">
                                            <li><i class="fa fa-building"></i> Address: </li>
                                            <li><i class="fa fa-phone"></i> Phone #: </li>
                                        </ul>
                                    </div>
                                    <div class="right col-sm-5 text-center">
                                        <img src="<?php asset('images/user.png') ?>" alt="" class="img-circle img-fluid">
                                    </div>
                                </div>
                                <div class=" bottom text-center">
                                    <div class=" col-sm-6 emphasis">
                                        <p class="ratings">
                                            <a>4.0</a>
                                            <a href="#"><span class="fa fa-star"></span></a>
                                            <a href="#"><span class="fa fa-star"></span></a>
                                            <a href="#"><span class="fa fa-star"></span></a>
                                            <a href="#"><span class="fa fa-star"></span></a>
                                            <a href="#"><span class="fa fa-star-o"></span></a>
                                        </p>
                                    </div>
                                    <div class=" col-sm-6 emphasis">
                                        <button type="button" class="btn btn-success btn-sm"> <i class="fa fa-user">
                                            </i> <i class="fa fa-comments-o"></i> </button>
                                        <button type="button" class="btn btn-primary btn-sm">
                                            <i class="fa fa-user"> </i> View Profile
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <?php
    $content = ob_get_clean();
    ?>

    <!-- Extra JS -->
    <?php
    ob_start();
    ?>

    <?php
    $extra_js = ob_get_clean();
    ?>


    <?php include('app/Views/Layouts/app.php') ?>

<?php } ?>


<!-- ///////////////////////////////////////////////////////////////////////// -->

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>ITI Cafeteria</title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <meta content="Free Website Template" name="keywords">
    <meta content="Free Website Template" name="description">

    <!-- Favicon -->
    <!-- <link href="img/favicon.ico" rel="icon"> -->

    <!-- Google Font -->
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@200;400&family=Roboto:wght@400;500;700&display=swap" rel="stylesheet">

    <!-- Font Awesome -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0/css/all.min.css" rel="stylesheet">

    <!-- Libraries Stylesheet -->
    <link href="<?php asset('homepage/lib/owlcarousel/assets/owl.carousel.min.css') ?>" rel="stylesheet">
    <link href="<?php asset('homepage/lib/tempusdominus/css/tempusdominus-bootstrap-4.min.css') ?>" rel="stylesheet" />

    <!-- Customized Bootstrap Stylesheet -->
    <link href="<?php asset('homepage/css/style.min.css') ?>" rel="stylesheet">
</head>

<body>
    <!-- Navbar Start -->
    <div class="container-fluid p-0 nav-bar">
        <nav class="navbar navbar-expand-lg bg-none navbar-dark py-3">
            <a href="<?php route('Home/index') ?>" class="navbar-brand px-lg-4 m-0">
                <h1 class="m-0 display-4 text-uppercase text-white">iti cafeteria</h1>
            </a>
            <button type="button" class="navbar-toggler" data-toggle="collapse" data-target="#navbarCollapse">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse justify-content-between" id="navbarCollapse">
                <div class="navbar-nav ml-auto p-4">
                    <a href="<?php route('Home/index') ?>" class="nav-item nav-link active">Home</a>
                    <a href="<?php route('Home/about') ?>" class="nav-item nav-link">About</a>
                    <a href="<?php route('Home/service') ?>" class="nav-item nav-link">Service</a>
                    <a href="<?php route('Home/menu') ?>" class="nav-item nav-link">Menu</a>
                    <a href="<?php route('Home/contact') ?>" class="nav-item nav-link">Contact</a>
                    <?php if(isset($_SESSION['user'])) {
                        if ($_SESSION['user']['role'] == 'admin') {
                            echo "<a href='";
                            route('User/index');
                            echo "' class='nav-item nav-link'>Dashboard</a>";
                        }
                        else if ($_SESSION['user']['role'] == 'customer') {
                            echo "<a href='";
                            route('Order/index');
                            echo "' class='nav-item nav-link'>Dashboard</a>";
                        }
                    } 
                    else {
                        echo '<a href="' . route('Auth/login') . '" class="nav-item nav-link">Login</a>';
                    }?>
                </div>
            </div>
        </nav>
    </div>
    <!-- Navbar End -->

    <!-- Carousel Start -->
    <div class="container-fluid p-0 mb-5">
        <div id="blog-carousel" class="carousel slide overlay-bottom" data-ride="carousel">
            <div class="carousel-inner">
                <div class="carousel-item active">
                    <img class="w-100" src="<?php asset('homepage/img/carousel-1.jpg') ?>" alt="Image">
                    <div class="carousel-caption d-flex flex-column align-items-center justify-content-center">
                        <h2 class="text-primary font-weight-medium m-0">We Have Been Serving</h2>
                        <h1 class="display-1 text-white m-0">COFFEE</h1>
                        <h2 class="text-white m-0">* SINCE 1970 *</h2>
                    </div>
                </div>
                <div class="carousel-item">
                    <img class="w-100" src="<?php asset('homepage/img/carousel-2.jpg') ?>" alt="Image">
                    <div class="carousel-caption d-flex flex-column align-items-center justify-content-center">
                        <h2 class="text-primary font-weight-medium m-0">Discover Our</h2>
                        <h1 class="display-1 text-white m-0">Coffee Blends</h1>
                        <h2 class="text-white m-0">* FOR EVERY TASTE *</h2>
                    </div>
                </div>
            </div>
            <a class="carousel-control-prev" href="#blog-carousel" data-slide="prev">
                <span class="carousel-control-prev-icon"></span>
            </a>
            <a class="carousel-control-next" href="#blog-carousel" data-slide="next">
                <span class="carousel-control-next-icon"></span>
            </a>
        </div>
    </div>
    <!-- Carousel End -->


    <!-- About Start -->
    <div class="container-fluid py-5">
        <div class="container">
            <div class="section-title">
                <h4 class="text-primary text-uppercase" style="letter-spacing: 5px;">About Us</h4>
                <h1 class="display-4">Serving Since 1950</h1>
            </div>
            <div class="row">
                <div class="col-lg-4 py-0 py-lg-5">
                    <h1 class="mb-3">Our Story</h1>
                    <h5 class="mb-3">Discover the Journey of ITI Cafeteria</h5>
                    <p>Experience the rich history and passion that defines ITI Cafeteria. Our journey began with a vision to provide the finest coffee blends and create a warm and inviting atmosphere for coffee lovers.</p>
                    <a href="#" class="btn btn-secondary font-weight-bold py-2 px-4 mt-2">Learn More</a>
                </div>
                <div class="col-lg-4 py-5 py-lg-0" style="min-height: 500px;">
                    <div class="position-relative h-100">
                        <img class="position-absolute w-100 h-100" src="<?php asset('homepage/img/about.png') ?>" style="object-fit: cover;">
                    </div>
                </div>
                <div class="col-lg-4 py-0 py-lg-5">
                    <h1 class="mb-3">Our Vision</h1>
                    <p>At ITI Cafeteria, our vision is to redefine the coffee experience and inspire moments of connection. We strive to create a welcoming environment where people can enjoy exceptional coffee, indulge in delicious food, and find solace in our cozy atmosphere.</p>
                    <h5 class="mb-3"><i class="fa fa-check text-primary mr-3"></i>Exceptional Quality and Taste</h5>
                    <h5 class="mb-3"><i class="fa fa-check text-primary mr-3"></i>Unparalleled Customer Service</h5>
                    <h5 class="mb-3"><i class="fa fa-check text-primary mr-3"></i>Commitment to Sustainability</h5>
                    <a href="#" class="btn btn-primary font-weight-bold py-2 px-4 mt-2">Learn More</a>
                </div>
            </div>
        </div>
    </div>
    <!-- About End -->


    <!-- Service Start -->
    <div class="container-fluid pt-5">
        <div class="container">
            <div class="section-title">
                <h4 class="text-primary text-uppercase" style="letter-spacing: 5px;">Our Services</h4>
                <h1 class="display-4">Fresh & Organic Beans</h1>
            </div>
            <div class="row">
                <div class="col-lg-6 mb-5">
                    <div class="row align-items-center">
                        <div class="col-sm-5">
                            <img class="img-fluid mb-3 mb-sm-0" src="<?php asset('homepage/img/service-1.jpg') ?>" alt="">
                        </div>
                        <div class="col-sm-7">
                            <h4><i class="fa fa-truck service-icon"></i>Fastest Door Delivery</h4>
                            <p class="m-0">Experience our lightning-fast door delivery service. We are dedicated to ensuring your orders reach your doorstep in the shortest possible time.</p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6 mb-5">
                    <div class="row align-items-center">
                        <div class="col-sm-5">
                            <img class="img-fluid mb-3 mb-sm-0" src="<?php asset('homepage/img/service-2.jpg') ?>" alt="">
                        </div>
                        <div class="col-sm-7">
                            <h4><i class="fa fa-coffee service-icon"></i>Fresh Coffee Beans</h4>
                            <p class="m-0">Indulge in the exquisite taste of our freshly sourced coffee beans. We take pride in offering a wide selection of premium coffee beans from around the world.</p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6 mb-5">
                    <div class="row align-items-center">
                        <div class="col-sm-5">
                            <img class="img-fluid mb-3 mb-sm-0" src="<?php asset('homepage/img/service-3.jpg') ?>" alt="">
                        </div>
                        <div class="col-sm-7">
                            <h4><i class="fa fa-award service-icon"></i>Exquisite Coffee Blends</h4>
                            <p class="m-0">Indulge in the finest selection of coffee blends that are meticulously crafted to perfection.</p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6 mb-5">
                    <div class="row align-items-center">
                        <div class="col-sm-5">
                            <img class="img-fluid mb-3 mb-sm-0" src="<?php asset('homepage/img/service-4.jpg') ?>" alt="">
                        </div>
                        <div class="col-sm-7">
                            <h4><i class="fa fa-table service-icon"></i>Convenient Online Table Booking</h4>
                            <p class="m-0">Experience hassle-free table reservations with our convenient online booking system.</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Service End -->


    <!-- Offer Start -->
    <div class="offer container-fluid my-5 py-5 text-center position-relative overlay-top overlay-bottom">
        <div class="container py-5">
            <h1 class="display-3 text-primary mt-3">50% OFF</h1>
            <h1 class="text-white mb-3">Sunday Special Offer</h1>
            <h4 class="text-white font-weight-normal mb-4 pb-3">Only for Sunday from 1st Jun to 30th Jun 2023</h4>
        </div>
    </div>
    <!-- Offer End -->


    <!-- Menu Start -->
    <div class="container-fluid pt-5">
        <div class="container">
            <div class="section-title">
                <h4 class="text-primary text-uppercase" style="letter-spacing: 5px;">Menu & Pricing</h4>
                <h1 class="display-4">Competitive Pricing</h1>
            </div>
            <div class="row">
                <div class="col-lg-6">
                    <h1 class="mb-5">Hot Coffee</h1>
                    <div class="row align-items-center mb-5">
                        <div class="col-4 col-sm-3">
                            <img class="w-100 rounded-circle mb-3 mb-sm-0" src="<?php asset('homepage/img/menu-1.jpg') ?>" alt="">
                            <h5 class="menu-price">$5</h5>
                        </div>
                        <div class="col-8 col-sm-9">
                            <h4>Espresso</h4>
                            <p class="m-0">A rich and intense black coffee with a bold flavor. Perfect for those who enjoy a strong and aromatic cup of coffee.</p>
                        </div>
                    </div>
                    <div class="row align-items-center mb-5">
                        <div class="col-4 col-sm-3">
                            <img class="w-100 rounded-circle mb-3 mb-sm-0" src="<?php asset('homepage/img/menu-2.jpg') ?>" alt="">
                            <h5 class="menu-price">$7</h5>
                        </div>
                        <div class="col-8 col-sm-9">
                            <h4>Mocha</h4>
                            <p class="m-0">Indulge in the delightful combination of rich chocolate and smooth espresso. Our mocha is a treat for chocolate and coffee lovers alike.</p>
                        </div>
                    </div>
                    <div class="row align-items-center mb-5">
                        <div class="col-4 col-sm-3">
                            <img class="w-100 rounded-circle mb-3 mb-sm-0" src="<?php asset('homepage/img/menu-3.jpg') ?>" alt="">
                            <h5 class="menu-price">$9</h5>
                        </div>
                        <div class="col-8 col-sm-9">
                            <h4>Cappuccino</h4>
                            <p class="m-0">Experience the perfect balance of espresso, steamed milk, and velvety foam. Our cappuccino is a classic choice for coffee enthusiasts.</p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6">
                    <h1 class="mb-5">Cold Coffee</h1>
                    <div class="row align-items-center mb-5">
                        <div class="col-4 col-sm-3">
                            <img class="w-100 rounded-circle mb-3 mb-sm-0" src="<?php asset('homepage/img/menu-1.jpg') ?>" alt="">
                            <h5 class="menu-price">$5</h5>
                        </div>
                        <div class="col-8 col-sm-9">
                            <h4>Iced Coffee</h4>
                            <p class="m-0">Cool down with our refreshing iced coffee. Made with premium coffee beans and served over ice, it's the perfect beverage for hot summer days.</p>
                        </div>
                    </div>
                    <div class="row align-items-center mb-5">
                        <div class="col-4 col-sm-3">
                            <img class="w-100 rounded-circle mb-3 mb-sm-0" src="<?php asset('homepage/img/menu-2.jpg') ?>" alt="">
                            <h5 class="menu-price">$7</h5>
                        </div>
                        <div class="col-8 col-sm-9">
                            <h4>Frappuccino</h4>
                            <p class="m-0">Indulge in the perfect blend of coffee, ice, and creamy goodness with our irresistible frappuccino.</p>
                        </div>
                    </div>
                    <div class="row align-items-center mb-5">
                        <div class="col-4 col-sm-3">
                            <img class="w-100 rounded-circle mb-3 mb-sm-0" src="<?php asset('homepage/img/menu-3.jpg') ?>" alt="">
                            <h5 class="menu-price">$9</h5>
                        </div>
                        <div class="col-8 col-sm-9">
                            <h4>Nitro Cold Brew</h4>
                            <p class="m-0">Experience the smooth and velvety texture of our nitro cold brew. Infused with nitrogen for a creamy and refreshing taste.</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Menu End -->

    <!-- Testimonial Start -->
    <div class="container-fluid py-5">
        <div class="container">
            <div class="section-title">
                <h4 class="text-primary text-uppercase" style="letter-spacing: 5px;">Testimonial</h4>
                <h1 class="display-4">Our Clients Say</h1>
            </div>
            <div class="owl-carousel testimonial-carousel">
                <div class="testimonial-item">
                    <div class="d-flex align-items-center mb-3">
                        <img class="img-fluid" src="<?php asset('homepage/img/testimonial-1.jpg') ?>" alt="">
                        <div class="ml-3">
                            <h4>John Smith</h4>
                            <i>Marketing Manager</i>
                        </div>
                    </div>
                    <p class="m-0">I am extremely satisfied with the services provided by this company. They exceeded my expectations in every aspect.</p>
                </div>
                <div class="testimonial-item">
                    <div class="d-flex align-items-center mb-3">
                        <img class="img-fluid" src="<?php asset('homepage/img/testimonial-2.jpg') ?>" alt="">
                        <div class="ml-3">
                            <h4>Michael Johnson</h4>
                            <i>Software Engineer</i>
                        </div>
                    </div>
                    <p class="m-0">I have had the pleasure of working with this company on multiple projects, and they consistently deliver outstanding results.</p>
                </div>
                <div class="testimonial-item">
                    <div class="d-flex align-items-center mb-3">
                        <img class="img-fluid" src="<?php asset('homepage/img/testimonial-3.jpg') ?>" alt="">
                        <div class="ml-3">
                            <h4>David Williams</h4>
                            <i>Architect</i>
                        </div>
                    </div>
                    <p class="m-0">Working with this company has been a fantastic experience. Their team is highly skilled and knowledgeable.</p>
                </div>
                <div class="testimonial-item">
                    <div class="d-flex align-items-center mb-3">
                        <img class="img-fluid" src="<?php asset('homepage/img/testimonial-4.jpg') ?>" alt="">
                        <div class="ml-3">
                            <h4>Robert Davis</h4>
                            <i>Financial Advisor</i>
                        </div>
                    </div>
                    <p class="m-0">I would like to express my gratitude to this company for their exceptional services and attention to detail are truly commendable.</p>
                </div>
            </div>
        </div>
    </div>
    <!-- Testimonial End -->


    <!-- Footer Start -->
    <div class="container-fluid footer text-white mt-5 pt-5 px-0 position-relative overlay-top">
        <div class="row mx-0 pt-5 px-sm-3 px-lg-5 mt-4">
            <div class="col-lg-3 col-md-6 mb-5">
                <h4 class="text-white text-uppercase mb-4" style="letter-spacing: 3px;">Get In Touch</h4>
                <p><i class="fa fa-map-marker-alt mr-2"></i>123 Street, Mansoura, Egypt</p>
                <p><i class="fa fa-phone-alt mr-2"></i>+20 101 1234567</p>
                <p class="m-0"><i class="fa fa-envelope mr-2"></i>info@example.com</p>
            </div>
            <div class="col-lg-3 col-md-6 mb-5">
                <h4 class="text-white text-uppercase mb-4" style="letter-spacing: 3px;">Follow Us</h4>
                <p>Follow us on the following platforms</p>
                <div class="d-flex justify-content-start">
                    <a class="btn btn-lg btn-outline-light btn-lg-square mr-2" href="#"><i class="fab fa-twitter"></i></a>
                    <a class="btn btn-lg btn-outline-light btn-lg-square mr-2" href="#"><i class="fab fa-facebook-f"></i></a>
                    <a class="btn btn-lg btn-outline-light btn-lg-square mr-2" href="#"><i class="fab fa-linkedin-in"></i></a>
                    <a class="btn btn-lg btn-outline-light btn-lg-square" href="#"><i class="fab fa-instagram"></i></a>
                </div>
            </div>
            <div class="col-lg-3 col-md-6 mb-5">
                <h4 class="text-white text-uppercase mb-4" style="letter-spacing: 3px;">Open Hours</h4>
                <div>
                    <h6 class="text-white text-uppercase">Monday - Friday</h6>
                    <p>8.00 AM - 8.00 PM</p>
                    <h6 class="text-white text-uppercase">Saturday - Sunday</h6>
                    <p>2.00 PM - 8.00 PM</p>
                </div>
            </div>
            <div class="col-lg-3 col-md-6 mb-5">
                <h4 class="text-white text-uppercase mb-4" style="letter-spacing: 3px;">Newsletter</h4>
                <p>Sign up for weekly newsletter</p>
                <div class="w-100">
                    <div class="input-group">
                        <input type="text" class="form-control border-light" style="padding: 25px;" placeholder="Your Email">
                        <div class="input-group-append">
                            <button class="btn btn-primary font-weight-bold px-3">Sign Up</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="container-fluid text-center text-white border-top mt-4 py-4 px-sm-3 px-md-5" style="border-color: rgba(256, 256, 256, .1) !important;">
            <p class="mb-2 text-white">Copyright &copy; <a class="font-weight-bold" href="#">ITI Cafeteria</a>. All Rights Reserved.</a></p>
        </div>
    </div>
    <!-- Footer End -->


    <!-- Back to Top -->
    <a href="#" class="btn btn-lg btn-primary btn-lg-square back-to-top"><i class="fa fa-angle-double-up"></i></a>


    <!-- JavaScript Libraries -->
    <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.bundle.min.js"></script>
    <script src="<?php asset('homepage/lib/easing/easing.min.js') ?>"></script>
    <script src="<?php asset('homepage/lib/waypoints/waypoints.min.js') ?>"></script>
    <script src="<?php asset('homepage/lib/owlcarousel/owl.carousel.min.js') ?>"></script>
    <script src="<?php asset('homepage/lib/tempusdominus/js/moment.min.js') ?>"></script>
    <script src="<?php asset('homepage/lib/tempusdominus/js/moment-timezone.min.js') ?>"></script>
    <script src="<?php asset('homepage/lib/tempusdominus/js/tempusdominus-bootstrap-4.min.js') ?>"></script>

    <!-- Contact Javascript File -->
    <script src="<?php asset('homepage/mail/jqBootstrapValidation.min.js') ?>"></script>
    <script src="<?php asset('homepage/mail/contact.js') ?>"></script>

    <!-- Template Javascript -->
    <script src="<?php asset('homepage/js/main.js') ?>"></script>
</body>

</html>
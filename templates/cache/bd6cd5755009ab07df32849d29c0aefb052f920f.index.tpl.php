<?php
/* Smarty version 4.1.0, created on 2022-12-11 13:29:28
  from '/var/www/html/talif-blog/templates/biznews/index.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '4.1.0',
  'unifunc' => 'content_639578c8470c02_21861855',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '27bafcd7a7988292239ccc3fb98a358985c34c42' => 
    array (
      0 => '/var/www/html/talif-blog/templates/biznews/index.tpl',
      1 => 1670591660,
      2 => 'file',
    ),
    '623f77521dea9e72717cc98b9855790555c910f5' => 
    array (
      0 => '/var/www/html/talif-blog/templates/biznews/header.tpl',
      1 => 1670580207,
      2 => 'file',
    ),
    'c4c51786c7b1b2f17e53f576a28ff8e2a283434b' => 
    array (
      0 => '/var/www/html/talif-blog/templates/biznews/footer.tpl',
      1 => 1670581649,
      2 => 'file',
    ),
  ),
  'cache_lifetime' => 120,
),true)) {
function content_639578c8470c02_21861855 (Smarty_Internal_Template $_smarty_tpl) {
?>    <!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <title>AdminLTE - AdminLTE Talif</title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <meta content="Free HTML Templates" name="keywords">
    <meta content="Free HTML Templates" name="description">
    <!-- Favicon -->
    <link href="./templates/biznews/img/favicon.ico" rel="icon">
    <!-- Google Web Fonts -->
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@400;500;600;700&display=swap" rel="stylesheet">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="./plugins/fontawesome-free/css/all.css">
    <!-- Libraries Stylesheet -->
    <link href="./templates/biznews/lib/owlcarousel/assets/owl.carousel.min.css" rel="stylesheet">
    <!-- Customized Bootstrap Stylesheet -->
    <link href="./templates/biznews/css/style.css" rel="stylesheet">
</head>

<body>
    <!-- Topbar Start -->
    <div class="container-fluid d-none d-lg-block">
        <div class="row align-items-center bg-dark px-lg-5">
            <div class="col-lg-9">
                <nav class="navbar navbar-expand-sm bg-dark p-0">
                    <ul class="navbar-nav ml-n2">
                        <li class="nav-item border-right border-secondary">
                            <a class="nav-link text-body small" href="#">Monday, January 1, 2045</a>
                        </li>
                        <li class="nav-item border-right border-secondary">
                            <a class="nav-link text-body small" href="#">Advertise</a>
                        </li>
                        <li class="nav-item border-right border-secondary">
                            <a class="nav-link text-body small" href="#">Contact</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link text-body small" href="./login.php">Login</a>
                        </li>
                    </ul>
                </nav>
            </div>
            <div class="col-lg-3 text-right d-none d-md-block">
                <nav class="navbar navbar-expand-sm bg-dark p-0">
                    <ul class="navbar-nav ml-auto mr-n2">
                        <li class="nav-item">
                            <a class="nav-link text-body" href="#"><small class="fab fa-twitter"></small></a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link text-body" href="#"><small class="fab fa-facebook-f"></small></a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link text-body" href="#"><small class="fab fa-linkedin-in"></small></a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link text-body" href="#"><small class="fab fa-instagram"></small></a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link text-body" href="#"><small class="fab fa-google-plus-g"></small></a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link text-body" href="#"><small class="fab fa-youtube"></small></a>
                        </li>
                    </ul>
                </nav>
            </div>
        </div>
        <div class="row align-items-center bg-white py-3 px-lg-5">
            <div class="col-lg-4">
                <a href="index.html" class="navbar-brand p-0 d-none d-lg-block">
                    <h1 class="m-0 display-4 text-uppercase text-primary">Biz<span class="text-secondary font-weight-normal">News</span></h1>
                </a>
            </div>
            <div class="col-lg-8 text-center text-lg-right">
                <a href="https://htmlcodex.com"><img class="img-fluid" src="img/ads-728x90.png" alt=""></a>
            </div>
        </div>
    </div>
    <!-- Topbar End -->
    <!-- Navbar Start -->
    <div class="container-fluid p-0">
        <nav class="navbar navbar-expand-lg bg-dark navbar-dark py-2 py-lg-0 px-lg-5">
            <a href="index.html" class="navbar-brand d-block d-lg-none">
                <h1 class="m-0 display-4 text-uppercase text-primary">Biz<span class="text-white font-weight-normal">News</span></h1>
            </a>
            <button type="button" class="navbar-toggler" data-toggle="collapse" data-target="#navbarCollapse">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse justify-content-between px-0 px-lg-3" id="navbarCollapse">
                <div class="navbar-nav mr-auto py-0">
                    <a href="index.php" class="nav-item nav-link active">Home</a>
                    <a href="category.php" class="nav-item nav-link">Category</a>
                    <a href="blog-single.php" class="nav-item nav-link">Single News</a>
                    <div class="nav-item dropdown">
                        <a href="#" class="nav-link dropdown-toggle" data-toggle="dropdown">Dropdown</a>
                        <div class="dropdown-menu rounded-0 m-0">
                            <a href="#" class="dropdown-item">Menu item 1</a>
                            <a href="#" class="dropdown-item">Menu item 2</a>
                            <a href="#" class="dropdown-item">Menu item 3</a>
                        </div>
                    </div>
                    <a href="contact.php" class="nav-item nav-link">Contact</a>
                </div>
                <div class="input-group ml-auto d-none d-lg-flex" style="width: 100%; max-width: 300px;">
                    <input type="text" class="form-control border-0" placeholder="Keyword">
                    <div class="input-group-append">
                        <button class="input-group-text bg-primary text-dark border-0 px-3"><i class="fa fa-search"></i></button>
                    </div>
                </div>
            </div>
        </nav>
    </div>
    <!-- Navbar End -->
    <!-- Main News Slider Start -->
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-7 px-0">
                <div class="owl-carousel main-carousel position-relative">
                                        <div class="position-relative overflow-hidden" style="height: 500px;">
                        <img class="img-fluid h-100" src="./images/img_5.jpg" style="object-fit: cover;">
                        <div class="overlay">
                            <div class="mb-2">
                                <a class="badge badge-primary text-uppercase font-weight-semi-bold p-2 mr-2" href="./blog-single.php?pid=1">HTML5</a>
                                <a class="text-white" href="">12 09, 2022</a>
                            </div>
                            <a class="h2 m-0 text-white text-uppercase font-weight-bold" href="./blog-single.php?pid=5">There’s a Cool New Way for Men to Wear Socks and Sandals</a>
                        </div>
                    </div>
                                        <div class="position-relative overflow-hidden" style="height: 500px;">
                        <img class="img-fluid h-100" src="./images/img_3.jpg" style="object-fit: cover;">
                        <div class="overlay">
                            <div class="mb-2">
                                <a class="badge badge-primary text-uppercase font-weight-semi-bold p-2 mr-2" href="./blog-single.php?pid=2">CSS3</a>
                                <a class="text-white" href="">12 09, 2022</a>
                            </div>
                            <a class="h2 m-0 text-white text-uppercase font-weight-bold" href="./blog-single.php?pid=3">There’s a Cool New Way for Men to Wear Socks and Sandals</a>
                        </div>
                    </div>
                                        <div class="position-relative overflow-hidden" style="height: 500px;">
                        <img class="img-fluid h-100" src="./images/img_2.jpg" style="object-fit: cover;">
                        <div class="overlay">
                            <div class="mb-2">
                                <a class="badge badge-primary text-uppercase font-weight-semi-bold p-2 mr-2" href="./blog-single.php?pid=1">HTML5</a>
                                <a class="text-white" href="">12 09, 2022</a>
                            </div>
                            <a class="h2 m-0 text-white text-uppercase font-weight-bold" href="./blog-single.php?pid=2">There’s a Cool New Way for Men to Wear Socks and Sandals</a>
                        </div>
                    </div>
                                        <div class="position-relative overflow-hidden" style="height: 500px;">
                        <img class="img-fluid h-100" src="./images/img_1.jpg" style="object-fit: cover;">
                        <div class="overlay">
                            <div class="mb-2">
                                <a class="badge badge-primary text-uppercase font-weight-semi-bold p-2 mr-2" href="./blog-single.php?pid=0">Uncategorized</a>
                                <a class="text-white" href="">12 09, 2022</a>
                            </div>
                            <a class="h2 m-0 text-white text-uppercase font-weight-bold" href="./blog-single.php?pid=1">There’s a Cool New Way for Men to Wear Socks and Sandals</a>
                        </div>
                    </div>
                                    </div>
            </div>
            <div class="col-lg-5 px-0">
                <div class="row mx-0">
                                        <div class="col-md-6 px-0">
                        <div class="position-relative overflow-hidden" style="height: 250px;">
                            <img class="img-fluid w-100 h-100" src="./images/img_5.jpg" style="object-fit: cover;">
                            <div class="overlay">
                                <div class="mb-2">
                                    <a class="badge badge-primary text-uppercase font-weight-semi-bold p-2 mr-2" href="./blog-single.php?pid=1">HTML5</a>
                                    <a class="text-white" href=""><small>12 09, 2022</small></a>
                                </div>
                                <a class="h6 m-0 text-white text-uppercase font-weight-semi-bold" href="./blog-single.php?pid=5">There’s a Cool New Way for Men to Wear Socks and Sandals</a>
                            </div>
                        </div>
                    </div>
                                        <div class="col-md-6 px-0">
                        <div class="position-relative overflow-hidden" style="height: 250px;">
                            <img class="img-fluid w-100 h-100" src="./images/img_3.jpg" style="object-fit: cover;">
                            <div class="overlay">
                                <div class="mb-2">
                                    <a class="badge badge-primary text-uppercase font-weight-semi-bold p-2 mr-2" href="./blog-single.php?pid=2">CSS3</a>
                                    <a class="text-white" href=""><small>12 09, 2022</small></a>
                                </div>
                                <a class="h6 m-0 text-white text-uppercase font-weight-semi-bold" href="./blog-single.php?pid=3">There’s a Cool New Way for Men to Wear Socks and Sandals</a>
                            </div>
                        </div>
                    </div>
                                        <div class="col-md-6 px-0">
                        <div class="position-relative overflow-hidden" style="height: 250px;">
                            <img class="img-fluid w-100 h-100" src="./images/img_2.jpg" style="object-fit: cover;">
                            <div class="overlay">
                                <div class="mb-2">
                                    <a class="badge badge-primary text-uppercase font-weight-semi-bold p-2 mr-2" href="./blog-single.php?pid=1">HTML5</a>
                                    <a class="text-white" href=""><small>12 09, 2022</small></a>
                                </div>
                                <a class="h6 m-0 text-white text-uppercase font-weight-semi-bold" href="./blog-single.php?pid=2">There’s a Cool New Way for Men to Wear Socks and Sandals</a>
                            </div>
                        </div>
                    </div>
                                        <div class="col-md-6 px-0">
                        <div class="position-relative overflow-hidden" style="height: 250px;">
                            <img class="img-fluid w-100 h-100" src="./images/img_1.jpg" style="object-fit: cover;">
                            <div class="overlay">
                                <div class="mb-2">
                                    <a class="badge badge-primary text-uppercase font-weight-semi-bold p-2 mr-2" href="./blog-single.php?pid=0">Uncategorized</a>
                                    <a class="text-white" href=""><small>12 09, 2022</small></a>
                                </div>
                                <a class="h6 m-0 text-white text-uppercase font-weight-semi-bold" href="./blog-single.php?pid=1">There’s a Cool New Way for Men to Wear Socks and Sandals</a>
                            </div>
                        </div>
                    </div>
                                    </div>
            </div>
        </div>
    </div>
    <!-- Main News Slider End -->
    <!-- Breaking News Start -->
    <div class="container-fluid bg-dark py-3 mb-3">
        <div class="container">
            <div class="row align-items-center bg-dark">
                <div class="col-12">
                    <div class="d-flex justify-content-between">
                        <div class="bg-primary text-dark text-center font-weight-medium py-2" style="width: 170px;">Breaking News</div>
                        <div class="owl-carousel tranding-carousel position-relative d-inline-flex align-items-center ml-3" style="width: calc(100% - 170px); padding-right: 90px;">
                                                        <div class="text-truncate"><a class="text-white text-uppercase font-weight-semi-bold" href="./blog-single.php?pid=5">There’s a Cool New Way for Men to Wear Socks and Sandals</a></div>
                                                        <div class="text-truncate"><a class="text-white text-uppercase font-weight-semi-bold" href="./blog-single.php?pid=3">There’s a Cool New Way for Men to Wear Socks and Sandals</a></div>
                                                        <div class="text-truncate"><a class="text-white text-uppercase font-weight-semi-bold" href="./blog-single.php?pid=2">There’s a Cool New Way for Men to Wear Socks and Sandals</a></div>
                                                        <div class="text-truncate"><a class="text-white text-uppercase font-weight-semi-bold" href="./blog-single.php?pid=1">There’s a Cool New Way for Men to Wear Socks and Sandals</a></div>
                                                    </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Breaking News End -->
    <!-- Featured News Slider Start -->
    <div class="container-fluid pt-5 mb-3">
        <div class="container">
            <div class="section-title">
                <h4 class="m-0 text-uppercase font-weight-bold">Featured News</h4>
            </div>
            <div class="owl-carousel news-carousel carousel-item-4 position-relative">
                                <div class="position-relative overflow-hidden" style="height: 300px;">
                    <img class="img-fluid h-100" src="./images/img_5.jpg" style="object-fit: cover;">
                    <div class="overlay">
                        <div class="mb-2">
                            <a class="badge badge-primary text-uppercase font-weight-semi-bold p-2 mr-2" href="./blog-single.php?pid=1">HTML5</a>
                            <a class="text-white" href="#"><small>12 09, 2022</small></a>
                        </div>
                        <a class="h6 m-0 text-white text-uppercase font-weight-semi-bold" href="./blog-single.php?pid=5">There’s a Cool New Way for Men to Wear Socks and Sandals</a>
                    </div>
                </div>
                                <div class="position-relative overflow-hidden" style="height: 300px;">
                    <img class="img-fluid h-100" src="./images/img_3.jpg" style="object-fit: cover;">
                    <div class="overlay">
                        <div class="mb-2">
                            <a class="badge badge-primary text-uppercase font-weight-semi-bold p-2 mr-2" href="./blog-single.php?pid=2">CSS3</a>
                            <a class="text-white" href="#"><small>12 09, 2022</small></a>
                        </div>
                        <a class="h6 m-0 text-white text-uppercase font-weight-semi-bold" href="./blog-single.php?pid=3">There’s a Cool New Way for Men to Wear Socks and Sandals</a>
                    </div>
                </div>
                                <div class="position-relative overflow-hidden" style="height: 300px;">
                    <img class="img-fluid h-100" src="./images/img_2.jpg" style="object-fit: cover;">
                    <div class="overlay">
                        <div class="mb-2">
                            <a class="badge badge-primary text-uppercase font-weight-semi-bold p-2 mr-2" href="./blog-single.php?pid=1">HTML5</a>
                            <a class="text-white" href="#"><small>12 09, 2022</small></a>
                        </div>
                        <a class="h6 m-0 text-white text-uppercase font-weight-semi-bold" href="./blog-single.php?pid=2">There’s a Cool New Way for Men to Wear Socks and Sandals</a>
                    </div>
                </div>
                                <div class="position-relative overflow-hidden" style="height: 300px;">
                    <img class="img-fluid h-100" src="./images/img_1.jpg" style="object-fit: cover;">
                    <div class="overlay">
                        <div class="mb-2">
                            <a class="badge badge-primary text-uppercase font-weight-semi-bold p-2 mr-2" href="./blog-single.php?pid=0">Uncategorized</a>
                            <a class="text-white" href="#"><small>12 09, 2022</small></a>
                        </div>
                        <a class="h6 m-0 text-white text-uppercase font-weight-semi-bold" href="./blog-single.php?pid=1">There’s a Cool New Way for Men to Wear Socks and Sandals</a>
                    </div>
                </div>
                                <div class="position-relative overflow-hidden" style="height: 300px;">
                    <img class="img-fluid h-100" src="./images/img_4.jpg" style="object-fit: cover;">
                    <div class="overlay">
                        <div class="mb-2">
                            <a class="badge badge-primary text-uppercase font-weight-semi-bold p-2 mr-2" href="./blog-single.php?pid=3">Bootstrap</a>
                            <a class="text-white" href="#"><small>10 21, 2022</small></a>
                        </div>
                        <a class="h6 m-0 text-white text-uppercase font-weight-semi-bold" href="./blog-single.php?pid=4">There’s a Cool New Way for Men to Wear Socks and Sandals</a>
                    </div>
                </div>
                            </div>
        </div>
    </div>
    <!-- Featured News Slider End -->

    <!-- News With Sidebar Start -->
    <div class="container-fluid">
        <div class="container">
            <div class="row">
                <div class="col-lg-8">
                    <div class="row">
                        <div class="col-12">
                            <div class="section-title">
                                <h4 class="m-0 text-uppercase font-weight-bold">Latest News</h4>
                                <a class="text-secondary font-weight-medium text-decoration-none" href="">View All</a>
                            </div>
                        </div>
                                                <div class="col-lg-6">
                            <div class="position-relative mb-3">
                                <img class="img-fluid w-100" src="./images/img_5.jpg" style="object-fit: cover;">
                                <div class="bg-white border border-top-0 p-4">
                                    <div class="mb-2">
                                        <a class="badge badge-primary text-uppercase font-weight-semi-bold p-2 mr-2"
                                            href="">HTML5</a>
                                        <a class="text-body" href=""><small>12 09, 2022</small></a>
                                    </div>
                                    <a class="h4 d-block mb-3 text-secondary text-uppercase font-weight-bold" href="./blog-single.php?pid=5">There’s a Cool New Way for Men to Wear Socks and Sandals</a>
                                    <p class="m-0">Lorem Ipsum&nbsp;is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been&nbsp;..</p>
                                </div>
                                <div class="d-flex justify-content-between bg-white border border-top-0 p-4">
                                    <div class="d-flex align-items-center">
                                        <img class="rounded-circle mr-2" src="./images/user2-160x160.jpg" width="25" height="25" alt="">
                                        <small>Alexander Pierce</small>
                                    </div>
                                    <div class="d-flex align-items-center">
                                        <small class="ml-3"><i class="far fa-eye mr-2"></i>6</small>
                                        <small class="ml-3"><i class="far fa-comment mr-2"></i>2</small>
                                    </div>
                                </div>
                            </div>
                        </div>
                                                <div class="col-lg-6">
                            <div class="position-relative mb-3">
                                <img class="img-fluid w-100" src="./images/img_3.jpg" style="object-fit: cover;">
                                <div class="bg-white border border-top-0 p-4">
                                    <div class="mb-2">
                                        <a class="badge badge-primary text-uppercase font-weight-semi-bold p-2 mr-2"
                                            href="">CSS3</a>
                                        <a class="text-body" href=""><small>12 09, 2022</small></a>
                                    </div>
                                    <a class="h4 d-block mb-3 text-secondary text-uppercase font-weight-bold" href="./blog-single.php?pid=3">There’s a Cool New Way for Men to Wear Socks and Sandals</a>
                                    <p class="m-0">Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore&nbsp;..</p>
                                </div>
                                <div class="d-flex justify-content-between bg-white border border-top-0 p-4">
                                    <div class="d-flex align-items-center">
                                        <img class="rounded-circle mr-2" src="./images/user2-160x160.jpg" width="25" height="25" alt="">
                                        <small>Alexander Pierce</small>
                                    </div>
                                    <div class="d-flex align-items-center">
                                        <small class="ml-3"><i class="far fa-eye mr-2"></i>4</small>
                                        <small class="ml-3"><i class="far fa-comment mr-2"></i>2</small>
                                    </div>
                                </div>
                            </div>
                        </div>
                                                <div class="col-lg-6">
                            <div class="position-relative mb-3">
                                <img class="img-fluid w-100" src="./images/img_2.jpg" style="object-fit: cover;">
                                <div class="bg-white border border-top-0 p-4">
                                    <div class="mb-2">
                                        <a class="badge badge-primary text-uppercase font-weight-semi-bold p-2 mr-2"
                                            href="">HTML5</a>
                                        <a class="text-body" href=""><small>12 09, 2022</small></a>
                                    </div>
                                    <a class="h4 d-block mb-3 text-secondary text-uppercase font-weight-bold" href="./blog-single.php?pid=2">There’s a Cool New Way for Men to Wear Socks and Sandals</a>
                                    <p class="m-0">Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore&nbsp;..</p>
                                </div>
                                <div class="d-flex justify-content-between bg-white border border-top-0 p-4">
                                    <div class="d-flex align-items-center">
                                        <img class="rounded-circle mr-2" src="./images/user1-128x128.jpg" width="25" height="25" alt="">
                                        <small>Agah Nata</small>
                                    </div>
                                    <div class="d-flex align-items-center">
                                        <small class="ml-3"><i class="far fa-eye mr-2"></i>3</small>
                                        <small class="ml-3"><i class="far fa-comment mr-2"></i>2</small>
                                    </div>
                                </div>
                            </div>
                        </div>
                                                <div class="col-lg-6">
                            <div class="position-relative mb-3">
                                <img class="img-fluid w-100" src="./images/img_1.jpg" style="object-fit: cover;">
                                <div class="bg-white border border-top-0 p-4">
                                    <div class="mb-2">
                                        <a class="badge badge-primary text-uppercase font-weight-semi-bold p-2 mr-2"
                                            href="">Uncategorized</a>
                                        <a class="text-body" href=""><small>12 09, 2022</small></a>
                                    </div>
                                    <a class="h4 d-block mb-3 text-secondary text-uppercase font-weight-bold" href="./blog-single.php?pid=1">There’s a Cool New Way for Men to Wear Socks and Sandals</a>
                                    <p class="m-0">Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the&nbsp;..</p>
                                </div>
                                <div class="d-flex justify-content-between bg-white border border-top-0 p-4">
                                    <div class="d-flex align-items-center">
                                        <img class="rounded-circle mr-2" src="./images/user1-128x128.jpg" width="25" height="25" alt="">
                                        <small>Agah Nata</small>
                                    </div>
                                    <div class="d-flex align-items-center">
                                        <small class="ml-3"><i class="far fa-eye mr-2"></i>2</small>
                                        <small class="ml-3"><i class="far fa-comment mr-2"></i>2</small>
                                    </div>
                                </div>
                            </div>
                        </div>
                                                <div class="col-lg-6">
                            <div class="position-relative mb-3">
                                <img class="img-fluid w-100" src="./images/img_4.jpg" style="object-fit: cover;">
                                <div class="bg-white border border-top-0 p-4">
                                    <div class="mb-2">
                                        <a class="badge badge-primary text-uppercase font-weight-semi-bold p-2 mr-2"
                                            href="">Bootstrap</a>
                                        <a class="text-body" href=""><small>10 21, 2022</small></a>
                                    </div>
                                    <a class="h4 d-block mb-3 text-secondary text-uppercase font-weight-bold" href="./blog-single.php?pid=4">There’s a Cool New Way for Men to Wear Socks and Sandals</a>
                                    <p class="m-0">Lorem Ipsum&nbsp;is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been&nbsp;..</p>
                                </div>
                                <div class="d-flex justify-content-between bg-white border border-top-0 p-4">
                                    <div class="d-flex align-items-center">
                                        <img class="rounded-circle mr-2" src="./images/user2-160x160.jpg" width="25" height="25" alt="">
                                        <small>Alexander Pierce</small>
                                    </div>
                                    <div class="d-flex align-items-center">
                                        <small class="ml-3"><i class="far fa-eye mr-2"></i>5</small>
                                        <small class="ml-3"><i class="far fa-comment mr-2"></i>2</small>
                                    </div>
                                </div>
                            </div>
                        </div>
                                            </div>
                </div>

                <div class="col-lg-4">
                    <!-- Social Follow Start -->
                    <div class="mb-3">
                        <div class="section-title mb-0">
                            <h4 class="m-0 text-uppercase font-weight-bold">Follow Us</h4>
                        </div>
                        <div class="bg-white border border-top-0 p-3">
                            <a href="" class="d-block w-100 text-white text-decoration-none mb-3" style="background: #39569E;">
                                <i class="fab fa-facebook-f text-center py-4 mr-3" style="width: 65px; background: rgba(0, 0, 0, .2);"></i>
                                <span class="font-weight-medium">12,345 Fans</span>
                            </a>
                            <a href="" class="d-block w-100 text-white text-decoration-none mb-3" style="background: #52AAF4;">
                                <i class="fab fa-twitter text-center py-4 mr-3" style="width: 65px; background: rgba(0, 0, 0, .2);"></i>
                                <span class="font-weight-medium">12,345 Followers</span>
                            </a>
                            <a href="" class="d-block w-100 text-white text-decoration-none mb-3" style="background: #0185AE;">
                                <i class="fab fa-linkedin-in text-center py-4 mr-3" style="width: 65px; background: rgba(0, 0, 0, .2);"></i>
                                <span class="font-weight-medium">12,345 Connects</span>
                            </a>
                            <a href="" class="d-block w-100 text-white text-decoration-none mb-3" style="background: #C8359D;">
                                <i class="fab fa-instagram text-center py-4 mr-3" style="width: 65px; background: rgba(0, 0, 0, .2);"></i>
                                <span class="font-weight-medium">12,345 Followers</span>
                            </a>
                            <a href="" class="d-block w-100 text-white text-decoration-none mb-3" style="background: #DC472E;">
                                <i class="fab fa-youtube text-center py-4 mr-3" style="width: 65px; background: rgba(0, 0, 0, .2);"></i>
                                <span class="font-weight-medium">12,345 Subscribers</span>
                            </a>
                            <a href="" class="d-block w-100 text-white text-decoration-none" style="background: #055570;">
                                <i class="fab fa-vimeo-v text-center py-4 mr-3" style="width: 65px; background: rgba(0, 0, 0, .2);"></i>
                                <span class="font-weight-medium">12,345 Followers</span>
                            </a>
                        </div>
                    </div>
                    <!-- Social Follow End -->

                    <!-- Ads Start -->
                    <div class="mb-3">
                        <div class="section-title mb-0">
                            <h4 class="m-0 text-uppercase font-weight-bold">Advertisement</h4>
                        </div>
                        <div class="bg-white text-center border border-top-0 p-3">
                            <a href="https://adminlte.io" target="_blank"><img class="img-fluid rounded" alt="Sponsor Logo" src="./images/envato_logo.jpg" alt=""></a>
                        </div>
                    </div>
                    <!-- Ads End -->

                    <!-- Popular News Start -->
                    <div class="mb-3">
                        <div class="section-title mb-0">
                            <h4 class="m-0 text-uppercase font-weight-bold">Tranding News</h4>
                        </div>
                        <div class="bg-white border border-top-0 p-3">
                                                        <div class="d-flex align-items-center bg-white mb-3" style="height: 110px;">
                                <img class="img-fluid w-80 h-80" src="./images/img_5.jpg" style="object-fit: cover;" height="110" width="110">
                                <div class="w-100 h-100 px-3 d-flex flex-column justify-content-center border border-left-0">
                                    <div class="mb-2">
                                        <a class="badge badge-primary text-uppercase font-weight-semi-bold p-1 mr-2" href="./category.php?cid=1">HTML5</a>
                                        <a class="text-body" href="#"><small>Dec 9, 2022</small></a>
                                    </div>
                                    <a class="h6 m-0 text-secondary text-uppercase font-weight-bold" href="./blog-single.php?pid=5">There’s a Cool New Way for Men to Wear Socks and Sandals</a>
                                </div>
                            </div>
                                                        <div class="d-flex align-items-center bg-white mb-3" style="height: 110px;">
                                <img class="img-fluid w-80 h-80" src="./images/img_4.jpg" style="object-fit: cover;" height="110" width="110">
                                <div class="w-100 h-100 px-3 d-flex flex-column justify-content-center border border-left-0">
                                    <div class="mb-2">
                                        <a class="badge badge-primary text-uppercase font-weight-semi-bold p-1 mr-2" href="./category.php?cid=3">Bootstrap</a>
                                        <a class="text-body" href="#"><small>Oct 21, 2022</small></a>
                                    </div>
                                    <a class="h6 m-0 text-secondary text-uppercase font-weight-bold" href="./blog-single.php?pid=4">There’s a Cool New Way for Men to Wear Socks and Sandals</a>
                                </div>
                            </div>
                                                        <div class="d-flex align-items-center bg-white mb-3" style="height: 110px;">
                                <img class="img-fluid w-80 h-80" src="./images/img_3.jpg" style="object-fit: cover;" height="110" width="110">
                                <div class="w-100 h-100 px-3 d-flex flex-column justify-content-center border border-left-0">
                                    <div class="mb-2">
                                        <a class="badge badge-primary text-uppercase font-weight-semi-bold p-1 mr-2" href="./category.php?cid=2">CSS3</a>
                                        <a class="text-body" href="#"><small>Dec 9, 2022</small></a>
                                    </div>
                                    <a class="h6 m-0 text-secondary text-uppercase font-weight-bold" href="./blog-single.php?pid=3">There’s a Cool New Way for Men to Wear Socks and Sandals</a>
                                </div>
                            </div>
                                                    </div>
                    </div>
                    <!-- Popular News End -->

                    <!-- Newsletter Start -->
                    <div class="mb-3">
                        <div class="section-title mb-0">
                            <h4 class="m-0 text-uppercase font-weight-bold">Newsletter</h4>
                        </div>
                        <div class="bg-white text-center border border-top-0 p-3">
                            <p>Aliqu justo et labore at eirmod justo sea erat diam dolor diam vero kasd</p>
                            <div class="input-group mb-2" style="width: 100%;">
                                <input type="text" class="form-control form-control-lg" placeholder="Your Email">
                                <div class="input-group-append">
                                    <button class="btn btn-primary font-weight-bold px-3">Sign Up</button>
                                </div>
                            </div>
                            <small>Lorem ipsum dolor sit amet elit</small>
                        </div>
                    </div>
                    <!-- Newsletter End -->

                    <!-- Tags Start -->
                    <div class="mb-3">
                        <div class="section-title mb-0">
                            <h4 class="m-0 text-uppercase font-weight-bold">Tags</h4>
                        </div>
                        <div class="bg-white border border-top-0 p-3">
                            <div class="d-flex flex-wrap m-n1">
                                <a href="" class="btn btn-sm btn-outline-secondary m-1">Politics</a>
                                <a href="" class="btn btn-sm btn-outline-secondary m-1">Business</a>
                                <a href="" class="btn btn-sm btn-outline-secondary m-1">Corporate</a>
                                <a href="" class="btn btn-sm btn-outline-secondary m-1">Business</a>
                                <a href="" class="btn btn-sm btn-outline-secondary m-1">Health</a>
                                <a href="" class="btn btn-sm btn-outline-secondary m-1">Education</a>
                                <a href="" class="btn btn-sm btn-outline-secondary m-1">Science</a>
                                <a href="" class="btn btn-sm btn-outline-secondary m-1">Business</a>
                                <a href="" class="btn btn-sm btn-outline-secondary m-1">Foods</a>
                                <a href="" class="btn btn-sm btn-outline-secondary m-1">Travel</a>
                            </div>
                        </div>
                    </div>
                    <!-- Tags End -->
                </div>
            </div>
        </div>
    </div>
    <!-- News With Sidebar End -->
    <!-- Footer Start -->
    <!-- Footer Start -->
<div class="container-fluid bg-dark pt-5 px-sm-3 px-md-5 mt-5">
    <div class="row py-4">
        <div class="col-lg-3 col-md-6 mb-5">
            <h5 class="mb-4 text-white text-uppercase font-weight-bold">Get In Touch</h5>
            <p class="font-weight-medium"><i class="fa fa-map-marker-alt mr-2"></i>123 Street, New York, USA</p>
            <p class="font-weight-medium"><i class="fa fa-phone-alt mr-2"></i>+012 345 67890</p>
            <p class="font-weight-medium"><i class="fa fa-envelope mr-2"></i>info@example.com</p>
            <h6 class="mt-4 mb-3 text-white text-uppercase font-weight-bold">Follow Us</h6>
            <div class="d-flex justify-content-start">
                <a class="btn btn-lg btn-secondary btn-lg-square mr-2" href="#"><i class="fab fa-twitter"></i></a>
                <a class="btn btn-lg btn-secondary btn-lg-square mr-2" href="#"><i class="fab fa-facebook-f"></i></a>
                <a class="btn btn-lg btn-secondary btn-lg-square mr-2" href="#"><i class="fab fa-linkedin-in"></i></a>
                <a class="btn btn-lg btn-secondary btn-lg-square mr-2" href="#"><i class="fab fa-instagram"></i></a>
                <a class="btn btn-lg btn-secondary btn-lg-square" href="#"><i class="fab fa-youtube"></i></a>
            </div>
        </div>
        <div class="col-lg-3 col-md-6 mb-5">
            <h5 class="mb-4 text-white text-uppercase font-weight-bold">Popular News</h5>
                        <div class="mb-3">
                <div class="mb-2">
                    <a class="badge badge-primary text-uppercase font-weight-semi-bold p-1 mr-2" href="./category.php?cid=1">HTML5</a>
                    <a class="text-body" href="#"><small>Dec 9, 2022</small></a>
                </div>
                <a class="small text-body text-uppercase font-weight-medium" href="">There’s a Cool New Way for Men to Wear Socks and Sandals</a>
            </div>
                        <div class="mb-3">
                <div class="mb-2">
                    <a class="badge badge-primary text-uppercase font-weight-semi-bold p-1 mr-2" href="./category.php?cid=3">Bootstrap</a>
                    <a class="text-body" href="#"><small>Oct 21, 2022</small></a>
                </div>
                <a class="small text-body text-uppercase font-weight-medium" href="">There’s a Cool New Way for Men to Wear Socks and Sandals</a>
            </div>
                        <div class="mb-3">
                <div class="mb-2">
                    <a class="badge badge-primary text-uppercase font-weight-semi-bold p-1 mr-2" href="./category.php?cid=2">CSS3</a>
                    <a class="text-body" href="#"><small>Dec 9, 2022</small></a>
                </div>
                <a class="small text-body text-uppercase font-weight-medium" href="">There’s a Cool New Way for Men to Wear Socks and Sandals</a>
            </div>
                    </div>
        <div class="col-lg-3 col-md-6 mb-5">
            <h5 class="mb-4 text-white text-uppercase font-weight-bold">Categories</h5>
            <div class="m-n1">
                            <a href="./category.php?cid=0" class="btn btn-sm btn-secondary m-1">Uncategorized</a>
                            <a href="./category.php?cid=1" class="btn btn-sm btn-secondary m-1">HTML5</a>
                            <a href="./category.php?cid=2" class="btn btn-sm btn-secondary m-1">CSS3</a>
                            <a href="./category.php?cid=3" class="btn btn-sm btn-secondary m-1">Bootstrap</a>
                          </div>
        </div>
        <div class="col-lg-3 col-md-6 mb-5">
            <h5 class="mb-4 text-white text-uppercase font-weight-bold">Flickr Photos</h5>
            <div class="row">
                <div class="col-4 mb-3">
                    <a href=""><img class="w-100" src="./templates/biznews/img/news-110x110-1.jpg" alt=""></a>
                </div>
                <div class="col-4 mb-3">
                    <a href=""><img class="w-100" src="./templates/biznews/img/news-110x110-2.jpg" alt=""></a>
                </div>
                <div class="col-4 mb-3">
                    <a href=""><img class="w-100" src="./templates/biznews/img/news-110x110-3.jpg" alt=""></a>
                </div>
                <div class="col-4 mb-3">
                    <a href=""><img class="w-100" src="./templates/biznews/img/news-110x110-4.jpg" alt=""></a>
                </div>
                <div class="col-4 mb-3">
                    <a href=""><img class="w-100" src="./templates/biznews/img/news-110x110-5.jpg" alt=""></a>
                </div>
                <div class="col-4 mb-3">
                    <a href=""><img class="w-100" src="./templates/biznews/img/news-110x110-1.jpg" alt=""></a>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="container-fluid py-4 px-sm-3 px-md-5" style="background: #111111;">
    <p class="m-0 text-center">&copy; <a href="#">AdminLTE</a>. All Rights Reserved.

<!--/*** This template is free as long as you keep the footer author’s credit link/attribution link/backlink. If you'd like to use the template without the footer author’s credit link/attribution link/backlink, you can purchase the Credit Removal License from "https://htmlcodex.com/credit-removal". Thank you for your support. ***/-->
Design by <a href="https://htmlcodex.com">HTML Codex</a><br>
    Distributed by <a href="https://themewagon.com">ThemeWagon</a>
</p>
</div>
<!-- Footer End -->
    <!-- Footer End -->
    <!-- Back to Top -->
    <a href="#" class="btn btn-primary btn-square back-to-top"><i class="fa fa-arrow-up"></i></a>
    <!-- JavaScript Libraries -->
    <script src="./templates/biznews/js/jquery-3.2.1.min.js"></script>
    <script src="./plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="./templates/biznews/lib/easing/easing.min.js"></script>
    <script src="./templates/biznews/lib/owlcarousel/owl.carousel.min.js"></script>
    <!-- Template Javascript -->
    <script src="./templates/biznews/js/main.js"></script>
    </body>
</html>
<?php }
}

<?php
/* Smarty version 4.1.0, created on 2022-10-15 13:29:06
  from '/var/www/html/talif-blog/templates/wordify/header.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '4.1.0',
  'unifunc' => 'content_634a53327c6525_44418573',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '3ac2d77c0691a4c36eef0822abe4d2e316887e43' => 
    array (
      0 => '/var/www/html/talif-blog/templates/wordify/header.tpl',
      1 => 1665815338,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_634a53327c6525_44418573 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_checkPlugins(array(0=>array('file'=>'/var/www/html/talif-blog/smarty/plugins/modifier.capitalize.php','function'=>'smarty_modifier_capitalize',),));
$_smarty_tpl->compiled->nocache_hash = '1757784875634a5332781d15_64583825';
?>
<!doctype html>
<html lang="en">
  <head>
    <title><?php echo smarty_modifier_capitalize($_smarty_tpl->tpl_vars['title']->value);?>
 - AdminLTE Talif</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <link href="https://fonts.googleapis.com/css?family=Josefin+Sans:300, 400,700|Inconsolata:400,700" rel="stylesheet">

    <link rel="stylesheet" href="./templates/wordify/css/bootstrap.css">
    <link rel="stylesheet" href="./templates/wordify/css/animate.css">
    <link rel="stylesheet" href="./templates/wordify/css/owl.carousel.min.css">

    <link rel="stylesheet" href="./templates/wordify/fonts/ionicons/css/ionicons.min.css">
    <link rel="stylesheet" href="./templates/wordify/fonts/fontawesome/css/font-awesome.min.css">
    <link rel="stylesheet" href="./templates/wordify/fonts/flaticon/font/flaticon.css">

    <!-- Theme Style -->
    <link rel="stylesheet" href="./templates/wordify/css/style.css">
  </head>
  <body>
    <div class="wrap">
      <header role="banner">
        <div class="top-bar">
          <div class="container">
            <div class="row">
              <div class="col-9 social">
                <a href="#"><span class="fa fa-twitter"></span></a>
                <a href="#"><span class="fa fa-facebook"></span></a>
                <a href="#"><span class="fa fa-instagram"></span></a>
                <a href="#"><span class="fa fa-youtube-play"></span></a>
              </div>
              <div class="col-3 search-top">
                <!-- <a href="#"><span class="fa fa-search"></span></a> -->
                <form action="#" class="search-top-form">
                  <span class="icon fa fa-search"></span>
                  <input type="text" id="s" placeholder="Type keyword to search...">
                </form>
              </div>
            </div>
          </div>
        </div>

        <div class="container logo-wrap">
          <div class="row pt-5">
            <div class="col-12 text-center">
              <a class="absolute-toggle d-block d-md-none" data-toggle="collapse" href="#navbarMenu" role="button" aria-expanded="false" aria-controls="navbarMenu"><span class="burger-lines"></span></a>
              <h1 class="site-logo"><a href="index.php">Wordify</a></h1>
            </div>
          </div>
        </div>

        <nav class="navbar navbar-expand-md  navbar-light bg-light">
          <div class="container">


            <div class="collapse navbar-collapse" id="navbarMenu">
              <ul class="navbar-nav mx-auto">
                <li class="nav-item">
                  <a class="nav-link active" href="index.php">Home</a>
                </li>
                <li class="nav-item dropdown">
                  <a class="nav-link dropdown-toggle" href="./category.php" id="dropdown05" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Categories</a>
                  <div class="dropdown-menu" aria-labelledby="dropdown05">
                    <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['categories']->value, 'category');
$_smarty_tpl->tpl_vars['category']->do_else = true;
if ($_from !== null) foreach ($_from as $_smarty_tpl->tpl_vars['category']->value) {
$_smarty_tpl->tpl_vars['category']->do_else = false;
?>
                    <a class="dropdown-item" href="./category.php?cid=<?php echo $_smarty_tpl->tpl_vars['category']->value['cat_id'];?>
"><?php echo $_smarty_tpl->tpl_vars['category']->value['name'];?>
</a>
                    <?php
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
                  </div>

                </li>
                <li class="nav-item">
                  <a class="nav-link" href="about.php">About</a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" href="contact.php">Contact</a>
                </li>
              </ul>

            </div>
          </div>
        </nav>
      </header>
      <!-- END header -->
<?php }
}

<?php
/* Smarty version 4.1.0, created on 2022-08-20 13:54:12
  from '/var/www/html/smarty/templates/clean-blog/page.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '4.1.0',
  'unifunc' => 'content_630085140e2799_77936648',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '007c3e776d62dcedbade94e65c09430d418f08e7' => 
    array (
      0 => '/var/www/html/smarty/templates/clean-blog/page.tpl',
      1 => 1660978447,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_630085140e2799_77936648 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_checkPlugins(array(0=>array('file'=>'/var/www/html/smarty/libs/plugins/modifier.capitalize.php','function'=>'smarty_modifier_capitalize',),));
$_smarty_tpl->compiled->nocache_hash = '1048374376630085140c6364_20217134';
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <title><?php echo smarty_modifier_capitalize($_smarty_tpl->tpl_vars['title']->value);?>
 - Start Bootstrap Theme</title>
        <link rel="icon" type="image/x-icon" href="assets/favicon.ico" />
        <!-- Font Awesome icons (free version)-->
        <?php echo '<script'; ?>
 src="https://use.fontawesome.com/releases/v6.1.0/js/all.js" crossorigin="anonymous"><?php echo '</script'; ?>
>
        <!-- Google fonts-->
        <link href="https://fonts.googleapis.com/css?family=Lora:400,700,400italic,700italic" rel="stylesheet" type="text/css" />
        <link href="https://fonts.googleapis.com/css?family=Open+Sans:300italic,400italic,600italic,700italic,800italic,400,300,600,700,800" rel="stylesheet" type="text/css" />
        <!-- Core theme CSS (includes Bootstrap)-->
        <link href="./clean-blog/css/styles.css" rel="stylesheet" />
    </head>
    <body>
        <!-- Navigation-->
        <nav class="navbar navbar-expand-lg navbar-light" id="mainNav">
            <div class="container px-4 px-lg-5">
                <a class="navbar-brand" href="index.html">Start Bootstrap</a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
                    Menu
                    <i class="fas fa-bars"></i>
                </button>
                <div class="collapse navbar-collapse" id="navbarResponsive">
                    <ul class="navbar-nav ms-auto py-4 py-lg-0">
                      <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['pages']->value, 'page');
$_smarty_tpl->tpl_vars['page']->do_else = true;
if ($_from !== null) foreach ($_from as $_smarty_tpl->tpl_vars['page']->value) {
$_smarty_tpl->tpl_vars['page']->do_else = false;
?>
                      <li class="nav-item"><a class="nav-link px-lg-3 py-3 py-lg-4" href="./clean-blog/media.php?page=<?php echo $_smarty_tpl->tpl_vars['page']->value['ID'];?>
"><?php echo $_smarty_tpl->tpl_vars['page']->value['title'];?>
</a></li>
                      <?php
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
                    </ul>
                </div>
            </div>
        </nav>
        <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['page_line']->value, 'page');
$_smarty_tpl->tpl_vars['page']->do_else = true;
if ($_from !== null) foreach ($_from as $_smarty_tpl->tpl_vars['page']->value) {
$_smarty_tpl->tpl_vars['page']->do_else = false;
?>
        <!-- Page Header-->
        <header class="masthead" style="background-image: url('assets/img/about-bg.jpg')">
            <div class="container position-relative px-4 px-lg-5">
                <div class="row gx-4 gx-lg-5 justify-content-center">
                    <div class="col-md-10 col-lg-8 col-xl-7">
                        <div class="page-heading">
                            <h1><?php echo $_smarty_tpl->tpl_vars['page']->value['title'];?>
</h1>
                            <span class="subheading"><?php echo $_smarty_tpl->tpl_vars['page']->value['description'];?>
</span>
                        </div>
                    </div>
                </div>
            </div>
        </header>
        <!-- Main Content-->
        <main class="mb-4">
            <div class="container px-4 px-lg-5">
                <div class="row gx-4 gx-lg-5 justify-content-center">
                    <div class="col-md-10 col-lg-8 col-xl-7">
                        <p><?php echo $_smarty_tpl->tpl_vars['page']->value['body'];?>
</p>
                    </div>
                </div>
            </div>
        </main>
        <?php
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
        <!-- Footer-->
        <footer class="border-top">
            <div class="container px-4 px-lg-5">
                <div class="row gx-4 gx-lg-5 justify-content-center">
                    <div class="col-md-10 col-lg-8 col-xl-7">
                        <ul class="list-inline text-center">
                            <li class="list-inline-item">
                                <a href="#!">
                                    <span class="fa-stack fa-lg">
                                        <i class="fas fa-circle fa-stack-2x"></i>
                                        <i class="fab fa-twitter fa-stack-1x fa-inverse"></i>
                                    </span>
                                </a>
                            </li>
                            <li class="list-inline-item">
                                <a href="#!">
                                    <span class="fa-stack fa-lg">
                                        <i class="fas fa-circle fa-stack-2x"></i>
                                        <i class="fab fa-facebook-f fa-stack-1x fa-inverse"></i>
                                    </span>
                                </a>
                            </li>
                            <li class="list-inline-item">
                                <a href="#!">
                                    <span class="fa-stack fa-lg">
                                        <i class="fas fa-circle fa-stack-2x"></i>
                                        <i class="fab fa-github fa-stack-1x fa-inverse"></i>
                                    </span>
                                </a>
                            </li>
                        </ul>
                        <div class="small text-center text-muted fst-italic">Copyright &copy; Your Website 2022</div>
                    </div>
                </div>
            </div>
        </footer>
        <!-- Bootstrap core JS-->
        <?php echo '<script'; ?>
 src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"><?php echo '</script'; ?>
>
        <!-- Core theme JS-->
        <?php echo '<script'; ?>
 src="./clean-blog/js/scripts.js"><?php echo '</script'; ?>
>
    </body>
</html>
<?php }
}

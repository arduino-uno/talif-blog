<?php
/* Smarty version 4.1.0, created on 2022-08-21 13:49:46
  from '/var/www/html/blogs/templates/clean-blog/index.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '4.1.0',
  'unifunc' => 'content_6301d58ad59dd8_93643600',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'd86e8b8d447502c6c26250843138e662ce81398f' => 
    array (
      0 => '/var/www/html/blogs/templates/clean-blog/index.tpl',
      1 => 1661049263,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_6301d58ad59dd8_93643600 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_checkPlugins(array(0=>array('file'=>'/var/www/html/blogs/smarty/plugins/modifier.capitalize.php','function'=>'smarty_modifier_capitalize',),1=>array('file'=>'/var/www/html/blogs/smarty/plugins/modifier.date_format.php','function'=>'smarty_modifier_date_format',),));
$_smarty_tpl->compiled->nocache_hash = '5780771216301d58abdb4a4_81431423';
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <title><?php echo smarty_modifier_capitalize($_smarty_tpl->tpl_vars['title']->value);?>
 - Bootstrap Blog Theme</title>
        <link rel="icon" type="image/x-icon" href="assets/favicon.ico" />
        <!-- Font Awesome icons (free version)-->
        <?php echo '<script'; ?>
 src="https://use.fontawesome.com/releases/v6.1.0/js/all.js" crossorigin="anonymous"><?php echo '</script'; ?>
>
        <!-- Google fonts-->
        <link href="https://fonts.googleapis.com/css?family=Lora:400,700,400italic,700italic" rel="stylesheet" type="text/css" />
        <link href="https://fonts.googleapis.com/css?family=Open+Sans:300italic,400italic,600italic,700italic,800italic,400,300,600,700,800" rel="stylesheet" type="text/css" />
        <!-- Core theme CSS (includes Bootstrap)-->
        <link href="./templates/clean-blog/css/styles.css" rel="stylesheet" />
    </head>
    <body>
        <!-- Navigation-->
        <nav class="navbar navbar-expand-lg navbar-light" id="mainNav">
            <div class="container px-4 px-lg-5">
                <a class="navbar-brand" href="./index.php">Start Bootstrap</a>
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
                        <li class="nav-item"><a class="nav-link px-lg-3 py-3 py-lg-4" href="./index.php?page_id=<?php echo $_smarty_tpl->tpl_vars['page']->value['ID'];?>
"><?php echo $_smarty_tpl->tpl_vars['page']->value['title'];?>
</a></li>
                        <?php
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
                    </ul>
                </div>
            </div>
        </nav>
        <!-- Page Header-->
        <header class="masthead" style="background-image: url('./templates/clean-blog/assets/img/home-bg.jpg')">
            <div class="container position-relative px-4 px-lg-5">
                <div class="row gx-4 gx-lg-5 justify-content-center">
                    <div class="col-md-10 col-lg-8 col-xl-7">
                        <div class="site-heading">
                            <h1><?php echo $_smarty_tpl->tpl_vars['title']->value;?>
</h1>
                            <span class="subheading"><?php echo $_smarty_tpl->tpl_vars['description']->value;?>
</span>
                        </div>
                    </div>
                </div>
            </div>
        </header>
        <!-- Main Content-->
        <div class="container px-4 px-lg-5">
            <div class="row gx-4 gx-lg-5 justify-content-center">
                <div class="col-md-10 col-lg-8 col-xl-7">
                    <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['posts']->value, 'post');
$_smarty_tpl->tpl_vars['post']->index = -1;
$_smarty_tpl->tpl_vars['post']->do_else = true;
if ($_from !== null) foreach ($_from as $_smarty_tpl->tpl_vars['post']->value) {
$_smarty_tpl->tpl_vars['post']->do_else = false;
$_smarty_tpl->tpl_vars['post']->index++;
$__foreach_post_1_saved = $_smarty_tpl->tpl_vars['post'];
?>
                    <?php if ($_smarty_tpl->tpl_vars['post']->index == 3) {?>
                        <?php break 1;?>
                    <?php }?>
                    <!-- Post preview-->
                    <div class="post-preview">
                        <a href="./index.php?post_id=<?php echo $_smarty_tpl->tpl_vars['post']->value['ID'];?>
">
                            <h2 class="post-title"><?php echo $_smarty_tpl->tpl_vars['post']->value['title'];?>
</h2>
                            <h3 class="post-subtitle"><?php echo $_smarty_tpl->tpl_vars['post']->value['description'];?>
</h3>
                        </a>
                        <p class="post-meta">
                            Posted by
                            <a href="#!">Admin</a>
                            on <?php echo smarty_modifier_date_format($_smarty_tpl->tpl_vars['post']->value['published'],"%m %d, %Y");?>

                        </p>
                    </div>
                    <!-- Divider-->
                    <hr class="my-4" />
                    <?php
$_smarty_tpl->tpl_vars['post'] = $__foreach_post_1_saved;
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
                    <!-- Pager-->
                    <div class="d-flex justify-content-end mb-4"><a class="btn btn-primary text-uppercase" href="#!">Older Posts →</a></div>
                </div>
            </div>
        </div>
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
 src="./templates/clean-blog/js/scripts.js"><?php echo '</script'; ?>
>
    </body>
</html>
<?php }
}

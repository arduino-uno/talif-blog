<?php
/* Smarty version 4.1.0, created on 2022-09-13 08:24:51
  from '/var/www/html/blogz/templates/wordify/category.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '4.1.0',
  'unifunc' => 'content_631fdbe3384888_09499908',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'ec6e53a855ae0e1db354585a7dc0080d4dbec49c' => 
    array (
      0 => '/var/www/html/blogz/templates/wordify/category.tpl',
      1 => 1663032288,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
    'file:header.tpl' => 1,
    'file:footer.tpl' => 1,
  ),
),false)) {
function content_631fdbe3384888_09499908 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_checkPlugins(array(0=>array('file'=>'/var/www/html/blogz/smarty/plugins/modifier.capitalize.php','function'=>'smarty_modifier_capitalize',),));
$_smarty_tpl->compiled->nocache_hash = '1130710459631fdbe3368f76_20601583';
?>
<!doctype html>
<html lang="en">
  <head>
    <title><?php echo smarty_modifier_capitalize($_smarty_tpl->tpl_vars['title']->value);?>
 - AdminLTE BlogZ</title>
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
      <?php $_smarty_tpl->_subTemplateRender("file:header.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 9999, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>
      <section class="site-section pt-5">
        <div class="container">
          <div class="row mb-4">
            <div class="col-md-6">
              <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['category_line']->value, 'category');
$_smarty_tpl->tpl_vars['category']->do_else = true;
if ($_from !== null) foreach ($_from as $_smarty_tpl->tpl_vars['category']->value) {
$_smarty_tpl->tpl_vars['category']->do_else = false;
?>
              <h2 class="mb-4">Category: <?php echo $_smarty_tpl->tpl_vars['category']->value['name'];?>
</h2>
              <?php
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
            </div>
          </div>
          <div class="row blog-entries">
            <div class="col-md-12 col-lg-8 main-content">
              <div class="row">
                <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['post_line']->value, 'post');
$_smarty_tpl->tpl_vars['post']->do_else = true;
if ($_from !== null) foreach ($_from as $_smarty_tpl->tpl_vars['post']->value) {
$_smarty_tpl->tpl_vars['post']->do_else = false;
?>
                <div class="col-md-6">
                  <a href="blog-single.php?pid=<?php echo $_smarty_tpl->tpl_vars['post']->value['post_id'];?>
" class="blog-entry element-animate" data-animate-effect="fadeIn">
                    <img src="./images/<?php echo $_smarty_tpl->tpl_vars['post']->value['image'];?>
" style="width:510px;height:35vh;object-fit: cover;" alt="Image placeholder">
                    <div class="blog-content-body">
                      <div class="post-meta">
                        <span class="author mr-2"><img src="./images/<?php echo $_smarty_tpl->tpl_vars['post']->value['author_image'];?>
" alt="<?php echo $_smarty_tpl->tpl_vars['post']->value['author_name'];?>
"> <?php echo $_smarty_tpl->tpl_vars['post']->value['author_name'];?>
</span>&bullet;
                        <span class="mr-2"><?php echo $_smarty_tpl->tpl_vars['post']->value['published'];?>
 </span> &bullet;
                        <span class="ml-2"><span class="fa fa-comments"></span> 3</span>
                      </div>
                      <h2><?php echo $_smarty_tpl->tpl_vars['post']->value['title'];?>
</h2>
                    </div>
                  </a>
                </div>
                <?php
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
              </div>

              <div class="row mt-5">
                <div class="col-md-12 text-center">
                  <nav aria-label="Page navigation" class="text-center">
                    <ul class="pagination">
                      <li class="page-item  active"><a class="page-link" href="#">&lt;</a></li>
                      <li class="page-item"><a class="page-link" href="#">1</a></li>
                      <li class="page-item"><a class="page-link" href="#">2</a></li>
                      <li class="page-item"><a class="page-link" href="#">3</a></li>
                      <li class="page-item"><a class="page-link" href="#">4</a></li>
                      <li class="page-item"><a class="page-link" href="#">5</a></li>
                      <li class="page-item"><a class="page-link" href="#">&gt;</a></li>
                    </ul>
                  </nav>
                </div>
              </div>
            </div>

            <!-- END main-content -->

            <div class="col-md-12 col-lg-4 sidebar">
              <div class="sidebar-box search-form-wrap">
                <form action="#" class="search-form">
                  <div class="form-group">
                    <span class="icon fa fa-search"></span>
                    <input type="text" class="form-control" id="s" placeholder="Type a keyword and hit enter">
                  </div>
                </form>
              </div>
              <!-- END sidebar-box -->
              <div class="sidebar-box">
                <div class="bio text-center">
                  <img src="./templates/wordify/images/person_1.jpg" alt="Image Placeholder" class="img-fluid">
                  <div class="bio-body">
                    <h2>David Craig</h2>
                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Exercitationem facilis sunt repellendus excepturi beatae porro debitis voluptate nulla quo veniam fuga sit molestias minus.</p>
                    <p><a href="#" class="btn btn-primary btn-sm rounded">Read my bio</a></p>
                    <p class="social">
                      <a href="#" class="p-2"><span class="fa fa-facebook"></span></a>
                      <a href="#" class="p-2"><span class="fa fa-twitter"></span></a>
                      <a href="#" class="p-2"><span class="fa fa-instagram"></span></a>
                      <a href="#" class="p-2"><span class="fa fa-youtube-play"></span></a>
                    </p>
                  </div>
                </div>
              </div>
              <!-- END sidebar-box -->
              <div class="sidebar-box">
                <h3 class="heading">Popular Posts</h3>
                <div class="post-entry-sidebar">
                  <ul>
                    <li>
                      <a href="">
                        <img src="./templates/wordify/images/img_2.jpg" alt="Image placeholder" class="mr-4">
                        <div class="text">
                          <h4>How to Find the Video Games of Your Youth</h4>
                          <div class="post-meta">
                            <span class="mr-2">March 15, 2018 </span>
                          </div>
                        </div>
                      </a>
                    </li>
                    <li>
                      <a href="">
                        <img src="./templates/wordify/images/img_4.jpg" alt="Image placeholder" class="mr-4">
                        <div class="text">
                          <h4>How to Find the Video Games of Your Youth</h4>
                          <div class="post-meta">
                            <span class="mr-2">March 15, 2018 </span>
                          </div>
                        </div>
                      </a>
                    </li>
                    <li>
                      <a href="">
                        <img src="./templates/wordify/images/img_12.jpg" alt="Image placeholder" class="mr-4">
                        <div class="text">
                          <h4>How to Find the Video Games of Your Youth</h4>
                          <div class="post-meta">
                            <span class="mr-2">March 15, 2018 </span>
                          </div>
                        </div>
                      </a>
                    </li>
                  </ul>
                </div>
              </div>
              <!-- END sidebar-box -->

              <div class="sidebar-box">
                <h3 class="heading">Categories</h3>
                <ul class="categories">
                  <li><a href="#">Food <span>(12)</span></a></li>
                  <li><a href="#">Travel <span>(22)</span></a></li>
                  <li><a href="#">Lifestyle <span>(37)</span></a></li>
                  <li><a href="#">Business <span>(42)</span></a></li>
                  <li><a href="#">Adventure <span>(14)</span></a></li>
                </ul>
              </div>
              <!-- END sidebar-box -->

              <div class="sidebar-box">
                <h3 class="heading">Tags</h3>
                <ul class="tags">
                  <li><a href="#">Travel</a></li>
                  <li><a href="#">Adventure</a></li>
                  <li><a href="#">Food</a></li>
                  <li><a href="#">Lifestyle</a></li>
                  <li><a href="#">Business</a></li>
                  <li><a href="#">Freelancing</a></li>
                  <li><a href="#">Travel</a></li>
                  <li><a href="#">Adventure</a></li>
                  <li><a href="#">Food</a></li>
                  <li><a href="#">Lifestyle</a></li>
                  <li><a href="#">Business</a></li>
                  <li><a href="#">Freelancing</a></li>
                </ul>
              </div>
            </div>
            <!-- END sidebar -->
          </div>
        </div>
        </section>
        <?php $_smarty_tpl->_subTemplateRender("file:footer.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 9999, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>
        </div>
        <!-- loader -->
        <div id="loader" class="show fullscreen"><svg class="circular" width="48px" height="48px"><circle class="path-bg" cx="24" cy="24" r="22" fill="none" stroke-width="4" stroke="#eeeeee"/><circle class="path" cx="24" cy="24" r="22" fill="none" stroke-width="4" stroke-miterlimit="10" stroke="#f4b214"/></svg></div>
        <?php echo '<script'; ?>
 src="./templates/wordify/js/jquery-3.2.1.min.js"><?php echo '</script'; ?>
>
        <?php echo '<script'; ?>
 src="./templates/wordify/js/jquery-migrate-3.0.0.js"><?php echo '</script'; ?>
>
        <?php echo '<script'; ?>
 src="./templates/wordify/js/popper.min.js"><?php echo '</script'; ?>
>
        <?php echo '<script'; ?>
 src="./templates/wordify/js/bootstrap.min.js"><?php echo '</script'; ?>
>
        <?php echo '<script'; ?>
 src="./templates/wordify/js/owl.carousel.min.js"><?php echo '</script'; ?>
>
        <?php echo '<script'; ?>
 src="./templates/wordify/js/jquery.waypoints.min.js"><?php echo '</script'; ?>
>
        <?php echo '<script'; ?>
 src="./templates/wordify/js/jquery.stellar.min.js"><?php echo '</script'; ?>
>
        <?php echo '<script'; ?>
 src="./templates/wordify/js/main.js"><?php echo '</script'; ?>
>
  </body>
</html>
<?php }
}

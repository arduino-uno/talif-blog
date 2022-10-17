<?php
/* Smarty version 4.1.0, created on 2022-10-15 15:33:08
  from '/var/www/html/talif-blog/templates/wordify/category.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '4.1.0',
  'unifunc' => 'content_634a7044bc4bd8_60216121',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '48ca4a620ea33797dd294514ed8104a7e29cbd88' => 
    array (
      0 => '/var/www/html/talif-blog/templates/wordify/category.tpl',
      1 => 1665822761,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
    'file:header.tpl' => 1,
    'file:footer.tpl' => 1,
  ),
),false)) {
function content_634a7044bc4bd8_60216121 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->compiled->nocache_hash = '1441163301634a7044bb0789_45074483';
?>
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
                  <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['categories']->value, 'category');
$_smarty_tpl->tpl_vars['category']->do_else = true;
if ($_from !== null) foreach ($_from as $_smarty_tpl->tpl_vars['category']->value) {
$_smarty_tpl->tpl_vars['category']->do_else = false;
?>
                  <li><a href="./category.php?cid=<?php echo $_smarty_tpl->tpl_vars['category']->value['cat_id'];?>
"><?php echo $_smarty_tpl->tpl_vars['category']->value['name'];?>
&nbsp;<span>(<?php echo $_smarty_tpl->tpl_vars['category']->value['count'];?>
)</span></a></li>
                  <?php
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
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
      </body>
    </html>
<?php }
}

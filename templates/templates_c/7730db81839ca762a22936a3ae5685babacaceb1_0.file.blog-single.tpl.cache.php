<?php
/* Smarty version 4.1.0, created on 2022-10-23 10:07:09
  from '/var/www/html/talif-blog/templates/wordify/blog-single.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '4.1.0',
  'unifunc' => 'content_6354afdda8aff3_13155475',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '7730db81839ca762a22936a3ae5685babacaceb1' => 
    array (
      0 => '/var/www/html/talif-blog/templates/wordify/blog-single.tpl',
      1 => 1666493757,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
    'file:header.tpl' => 1,
    'file:footer.tpl' => 1,
  ),
),false)) {
function content_6354afdda8aff3_13155475 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_checkPlugins(array(0=>array('file'=>'/var/www/html/talif-blog/smarty/plugins/modifier.date_format.php','function'=>'smarty_modifier_date_format',),));
$_smarty_tpl->compiled->nocache_hash = '139335926354afdda3f6c9_79853785';
?>
   <?php $_smarty_tpl->_subTemplateRender("file:header.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 9999, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>
    <section class="site-section py-lg">
      <div class="container">
        <div class="row blog-entries element-animate">
          <div class="col-md-12 col-lg-8 main-content">
            <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['post_line']->value, 'post');
$_smarty_tpl->tpl_vars['post']->do_else = true;
if ($_from !== null) foreach ($_from as $_smarty_tpl->tpl_vars['post']->value) {
$_smarty_tpl->tpl_vars['post']->do_else = false;
?>
            <img src="./images/<?php echo $_smarty_tpl->tpl_vars['post']->value['image'];?>
" style="width:800px;height:55vh;object-fit: cover;" alt="Image" class="img-fluid mb-5">
             <div class="post-meta">
                <span class="author mr-2"><img src="./images/<?php echo $_smarty_tpl->tpl_vars['post']->value['image'];?>
" alt="Colorlib" class="mr-2">&nbsp;<?php echo $_smarty_tpl->tpl_vars['post']->value['author_name'];?>
</span>&bullet;
                <span class="mr-2"><?php echo smarty_modifier_date_format($_smarty_tpl->tpl_vars['post']->value['published'],"%m %d, %Y");?>
&nbsp;</span> &bullet;
                <span class="ml-2"><span class="fa fa-comments"></span> 3</span>
             </div>
            <h1 class="mb-4"><?php echo $_smarty_tpl->tpl_vars['post']->value['title'];?>
</h1>
            <a class="category mb-5" href="#"><?php echo $_smarty_tpl->tpl_vars['post']->value['category'];?>
</a>
            <div class="post-content-body"><?php echo $_smarty_tpl->tpl_vars['post']->value['body'];?>
</div>
            <div class="pt-5">
              <p>Categories:  <a href="./category.php?cid=<?php echo $_smarty_tpl->tpl_vars['post']->value['cat_id'];?>
"><?php echo $_smarty_tpl->tpl_vars['post']->value['category'];?>
</a>
              Tags: <?php ob_start();
echo $_smarty_tpl->tpl_vars['post']->value['tags'];
$_prefixVariable1 = ob_get_clean();
$_smarty_tpl->_assignInScope('tags', explode(", ",$_prefixVariable1));?>
              <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['tags']->value, 'tag');
$_smarty_tpl->tpl_vars['tag']->do_else = true;
if ($_from !== null) foreach ($_from as $_smarty_tpl->tpl_vars['tag']->value) {
$_smarty_tpl->tpl_vars['tag']->do_else = false;
?>
                  <a href="#">#<?php echo $_smarty_tpl->tpl_vars['tag']->value;?>
</a>,
              <?php
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
              </p>
            </div>
            <?php
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
            <div class="pt-5">
              <h3 id="comments_count" class="mb-5">6 Comments</h3>
              <ul class="comment-list">&nbsp;</ul>
              <div class="comment-form-wrap pt-5">
                <h3 class="mb-5">Leave a comment</h3>
                <form id="comment_form" action="#" method="POST" class="p-5 bg-light">
                  <div class="form-group">
                    <label for="name">Name *</label>
                    <input type="hidden" id="post_id" name="post_id" value="<?php echo $_smarty_tpl->tpl_vars['post_id']->value;?>
">
                    <input type="text" name="fullname" id="fullname" pattern="^[A-Za-z \s*]+$" class="form-control" placeholder="Your fullname" required>
                  </div>
                  <div class="form-group">
                    <label for="email">Email *</label>
                    <input type="email" name="email" id="email" class="form-control" placeholder="Your e-mail address" required>
                  </div>
                  <div class="form-group">
                    <label for="website">Website</label>
                    <input type="website" name="website" id="website" class="form-control" placeholder="E.g: www.example.com">
                  </div>

                  <div class="form-group">
                    <label for="message">Message</label>
                    <textarea name="message" id="message" cols="30" rows="10" class="form-control" placeholder="Your message .." required></textarea>
                  </div>
                  <div class="form-group">
                    <input type="hidden" name="parent_id" id="parent_id" value="0" />
                    <input type="submit" value="Post Comment" class="btn btn-primary">
                  </div>
                </form>
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
                <img src="./templates/wordify/images/person_2.jpg" alt="Image Placeholder" class="img-fluid">
                <div class="bio-body">
                  <h2>Craig David</h2>
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
                      <img src="./templates/wordify/images/img_1.jpg" alt="Image placeholder" class="mr-4">
                      <div class="text">
                        <h4>There’s a Cool New Way for Men to Wear Socks and Sandals</h4>
                        <div class="post-meta">
                          <span class="mr-2">March 15, 2018 </span>
                        </div>
                      </div>
                    </a>
                  </li>
                  <li>
                    <a href="">
                      <img src="./templates/wordify/images/img_1.jpg" alt="Image placeholder" class="mr-4">
                      <div class="text">
                        <h4>There’s a Cool New Way for Men to Wear Socks and Sandals</h4>
                        <div class="post-meta">
                          <span class="mr-2">March 15, 2018 </span>
                        </div>
                      </div>
                    </a>
                  </li>
                  <li>
                    <a href="">
                      <img src="./templates/wordify/images/img_1.jpg" alt="Image placeholder" class="mr-4">
                      <div class="text">
                        <h4>There’s a Cool New Way for Men to Wear Socks and Sandals</h4>
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

    <section class="py-5">
      <div class="container">
        <div class="row">
          <div class="col-md-12">
            <h2 class="mb-3 ">Related Post</h2>
          </div>
        </div>
        <div class="row">
          <div class="col-md-6 col-lg-4">
            <a href="#" class="a-block sm d-flex align-items-center height-md" style="background-image: url('./templates/wordify/images/img_2.jpg'); ">
              <div class="text">
                <div class="post-meta">
                  <span class="category">Lifestyle</span>
                  <span class="mr-2">March 15, 2018 </span> &bullet;
                  <span class="ml-2"><span class="fa fa-comments"></span> 3</span>
                </div>
                <h3>There’s a Cool New Way for Men to Wear Socks and Sandals</h3>
              </div>
            </a>
          </div>
          <div class="col-md-6 col-lg-4">
            <a href="#" class="a-block sm d-flex align-items-center height-md" style="background-image: url('./templates/wordify/images/img_3.jpg'); ">
              <div class="text">
                <div class="post-meta">
                  <span class="category">Travel</span>
                  <span class="mr-2">March 15, 2018 </span> &bullet;
                  <span class="ml-2"><span class="fa fa-comments"></span> 3</span>
                </div>
                <h3>There’s a Cool New Way for Men to Wear Socks and Sandals</h3>
              </div>
            </a>
          </div>
          <div class="col-md-6 col-lg-4">
            <a href="#" class="a-block sm d-flex align-items-center height-md" style="background-image: url('./templates/wordify/images/img_4.jpg'); ">
              <div class="text">
                <div class="post-meta">
                  <span class="category">Food</span>
                  <span class="mr-2">March 15, 2018 </span> &bullet;
                  <span class="ml-2"><span class="fa fa-comments"></span> 3</span>
                </div>
                <h3>There’s a Cool New Way for Men to Wear Socks and Sandals</h3>
              </div>
            </a>
          </div>
        </div>
      </div>
    </section>
    <!-- END section -->
    <?php $_smarty_tpl->_subTemplateRender("file:footer.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 9999, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>
    <?php echo '<script'; ?>
 type="text/javascript" language="javascript">
    // jQuery document ready
    $(function () {

        load_comment();
        // load all post comments
        function load_comment() {

            var post_id = $('input#post_id').val();

            $.post( "./scripts/get_commcount.php", { "post_id": post_id, "parent_id": 0 }, function( data ) {
               $( "h3#comments_count" ).html( data + "&nbsp;Comments" );
            });

            $.ajax({
                url:"./scripts/get_comments.php",
                method:"POST",
                data: { 'post_id': post_id },
                datatype: 'JSON',
                success:function(myData) {

                     $.each( JSON.parse( myData ), function( index, value ) {

                         const getInitials = (string) => {
                           const [firstname, lastname] = string.toUpperCase().split(' ');
                           const initials = firstname.substring(0, 1);
                           return lastname
                             ? initials.concat(lastname.substring(0, 1))
                             : initials.concat(firstname.substring(1, 2));
                         };

                         const getNewDate = (string) => {
                           const event = new Date(string);
                           const options = { dateStyle: "long" };
                           const date = event.toLocaleString("id-ID", options);
                           return date;
                         };

                          if ( value.parent_id == '0' ) {

                               $('ul.comment-list').append('<li class="comment">' +
                                 '<div class="vcard">' +
                                 '<button type="button" class="btn btn-default rounded-circle btn-lg">' + getInitials( value.fullname ) + '</button>' +
                                 '</div>' +
                                 '<div class="comment-body">' +
                                   '<h3>' + value.fullname + '</h3>' +
                                   '<div class="meta">' + getNewDate( value.created ) + '</div>' +
                                   '<p>' + value.message + '</p>' +
                                   '<p><a href="#" class="reply rounded">Reply</a></p>' +
                                 '</div>' +
                               '</li>');

                          } else {

                                $('ul.comment-list').append('<ul class="children">' +
                                  '<li class="comment">' +
                                  '<div class="vcard">' +
                                  '<button type="button" class="btn btn-default rounded-circle btn-lg">' + getInitials( value.fullname ) + '</button>' +
                                  '</div>' +
                                  '<div class="comment-body">' +
                                    '<h3>' + value.fullname + '</h3>' +
                                    '<div class="meta">' + getNewDate( value.created ) + '</div>' +
                                    '<p>' + value.message + '</p>' +
                                    '<p><a href="#" class="reply rounded">Reply</a></p>' +
                                  '</div>' +
                                '</li></ul>');

                          }

                     });

                }

            });

        };

        $('form#comment_form').on('submit', function(event) {
            var form = $("form#comment_form");
            var formData = new FormData(this);
            event.preventDefault();

             $.ajax({
                   type: form.attr('method'),
                   enctype: form.attr('enctype'),
                   url: "./scripts/insert_comment.php",
                   data: formData,
                   processData: false,  // Important!
                   contentType: false,
                   cache: false,
                   timeout: 600000,
                   success: function ( response ) {

                      if ( response.indexOf("Inserted") !== -1 ) {
                          alert('The data was added successfully.');
                      } else {
                          alert('Something went wrong.');
                      }

                  }
             });

             window.setTimeout(function(){
                 load_comment();
             }, 3000);
       });

       $(document).on('click', 'a.reply', function() {
           // var comment_id = $(this).attr("id");
           $('input#parent_id').val(1);
           $('input#fullname').focus();
       });

    });
    <?php echo '</script'; ?>
>
  </body>
</html>
<?php }
}

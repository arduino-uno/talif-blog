<?php
/* Smarty version 4.1.0, created on 2022-12-08 17:39:47
  from '/var/www/html/talif-blog/templates/biznews/contact.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '4.1.0',
  'unifunc' => 'content_6391bef350fa40_71881781',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'f8f578bcea289b04859287af1ec5e19126930ac6' => 
    array (
      0 => '/var/www/html/talif-blog/templates/biznews/contact.tpl',
      1 => 1670495976,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
    'file:header_1.tpl' => 1,
    'file:footer.tpl' => 1,
  ),
),false)) {
function content_6391bef350fa40_71881781 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->compiled->nocache_hash = '4166475596391bef3509774_67226305';
$_smarty_tpl->_subTemplateRender("file:header_1.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 9999, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>
<!-- Contact Start -->
<div class="container-fluid mt-5 pt-3">
    <div class="container">
        <div class="row">
            <div class="col-lg-8">
                <div class="section-title mb-0">
                    <h4 class="m-0 text-uppercase font-weight-bold">Contact Us For Any Queries</h4>
                </div>
                <div class="bg-white border border-top-0 p-4 mb-3">
                    <div class="mb-4">
                        <h6 class="text-uppercase font-weight-bold">Contact Info</h6>
                        <p class="mb-4">The contact form is currently inactive. Get a functional and working contact form with Ajax & PHP in a few minutes. Just copy and paste the files, add a little code and you're done. <a href="https://htmlcodex.com/contact-form">Download Now</a>.</p>
					              <div class="mb-3">
                            <div class="d-flex align-items-center mb-2">
                                <i class="fa fa-map-marker-alt text-primary mr-2"></i>
                                <h6 class="font-weight-bold mb-0">Our Office</h6>
                            </div>
                            <p class="m-0">123 Street, New York, USA</p>
                        </div>
                        <div class="mb-3">
                            <div class="d-flex align-items-center mb-2">
                                <i class="fa fa-envelope-open text-primary mr-2"></i>
                                <h6 class="font-weight-bold mb-0">Email Us</h6>
                            </div>
                            <p class="m-0">info@example.com</p>
                        </div>
                        <div class="mb-3">
                            <div class="d-flex align-items-center mb-2">
                                <i class="fa fa-phone-alt text-primary mr-2"></i>
                                <h6 class="font-weight-bold mb-0">Call Us</h6>
                            </div>
                            <p class="m-0">+012 345 6789</p>
                        </div>
                    </div>
                    <h6 class="text-uppercase font-weight-bold mb-3">Contact Us</h6>
                    <form id="form_contactus" method="POST" action="./scripts/insert_contactus.php">
                        <div class="form-row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <input type="text" class="form-control p-4" name="fullname" id="fullname" placeholder="Type Fullname" required="required"/>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <input type="email" class="form-control p-4" name="email" id="email" placeholder="Your Email Address" required="required"/>
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <input type="text" class="form-control p-4" name="subject" id="subject" placeholder="Your Message Subject" required="required"/>
                        </div>
                        <div class="form-group">
                            <textarea class="form-control" rows="4" name="message" id="message" placeholder="Type Your Message Text" required="required"></textarea>
                        </div>
                        <div>
                            <input type="submit" class="btn btn-primary font-weight-semi-bold px-4" style="height: 50px;" value="Send message">
                        </div>
                    </form>
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
            </div>
        </div>
    </div>
</div>
<!-- Contact End -->
<?php $_smarty_tpl->_subTemplateRender("file:footer.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 9999, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>
<!-- JavaScript Libraries -->
<?php echo '<script'; ?>
 src="./templates/biznews/js/jquery-3.2.1.min.js"><?php echo '</script'; ?>
>
<?php echo '<script'; ?>
 src="./plugins/bootstrap/js/bootstrap.bundle.min.js"><?php echo '</script'; ?>
>
<?php echo '<script'; ?>
 src="./templates/biznews/lib/easing/easing.min.js"><?php echo '</script'; ?>
>
<?php echo '<script'; ?>
 src="./templates/biznews/lib/owlcarousel/owl.carousel.min.js"><?php echo '</script'; ?>
>
<!-- Template Javascript -->
<?php echo '<script'; ?>
 src="./templates/biznews/js/main.js"><?php echo '</script'; ?>
>
<?php echo '<script'; ?>
 type="text/javascript" language="javascript">
// jQuery document ready
$(function () {

    $("form#form_contactus").submit( function(e) {
        var form = $("form#form_contactus");
        e.preventDefault();
        $.ajax({
            type: form.attr('method'),
            url: form.attr('action'),
            data: new FormData( this ),
            processData: false,  // Important!
            contentType: false,
            cache: false,
            timeout: 600000,
            success: function ( response ) {

                if ( response.indexOf("Inserted") !== -1 ) {
                    alert('The data was inserted successfully.');
                } else {
                    alert('Something went wrong.');
                }

            };

            window.location.reload();

        });
    });

});
<?php echo '</script'; ?>
>
</body>
</html>
<?php }
}

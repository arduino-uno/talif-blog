<?php
/* Smarty version 4.1.0, created on 2022-08-19 07:08:05
  from '/var/www/html/smarty/demo/freebees/index.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '4.1.0',
  'unifunc' => 'content_62fed465d93248_18595543',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'fd0f0c072194419a1423f019a76333eb24847c89' => 
    array (
      0 => '/var/www/html/smarty/demo/freebees/index.tpl',
      1 => 1660867684,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_62fed465d93248_18595543 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_checkPlugins(array(0=>array('file'=>'/var/www/html/smarty/libs/plugins/modifier.capitalize.php','function'=>'smarty_modifier_capitalize',),));
$_smarty_tpl->compiled->nocache_hash = '85653762662fed465d8d5b7_72122399';
?>
<!DOCTYPE html>
<html lang="pl">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="author" content="Firmbee.com - Free Project Management Platform for remote teams">
    <title><?php echo smarty_modifier_capitalize($_smarty_tpl->tpl_vars['title']->value);?>
</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KyZXEAg3QhqLMpG8r+8fhAXLRk2vvoC2f3B09zVXn8CA5QIVfZOJ3BCsw2P0p/We" crossorigin="anonymous">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;600;800&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="css/main.css">
    <?php echo '<script'; ?>
 src="https://kit.fontawesome.com/0e035b9984.js" crossorigin="anonymous"><?php echo '</script'; ?>
>
</head>
<body data-bs-spy="scroll" data-bs-target="#navbar-example" data-bs-offset="82">
      <header id="home">
        <nav id="#navbar" class="navbar navbar-expand-lg position-fixed top-0 w-100 py-3">
          <div class="container">
            <a class="navbar-brand" href="index.html"><img src="img/logo-blog.png" alt=""></a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
              <i class="fas fa-bars"></i>
            </button>
            <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
              <div class="navbar-nav ms-auto">

                <a class="nav-link active" href="index.html"></a>
                <a class="nav-link" href="about.html"></a>
                <a class="nav-link" href="contact.html"></a>
                <a class="nav-link" href="blog.html"></a>

              </div>
            </div>
          </div>
        </nav>
      </header>
      <main>
        <section class="main-slider">
          <div class="hero-img">
            <div class="hero-bg"></div>
            <div class="container">
              <div class="hero-text">
                <div class="welcome-text"><span class ="big-text">WELCOME</span><span class="small-text">TO OUR BLOG</span></div>
                <p>Lorem, ipsum dolor sit amet consectetur adipisicing elit.</p>
            </div>
            </div>
            <a href="#about"><i class="fas fa-chevron-down"></i></a>
          </div>
        </section>
        <section id="about" class="aboutus">
            <div class="container">
              <div class="row">
                  <div class="right col-md-6">
                    <div class="text-right">
                      <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Deserunt perspiciatis ex ipsam</p>
                    </div>
                  </div>
                    <div class="left col-md-6">
                      <div class="text-left">
                        <h2 class="underscore">about us</h2>
                        <p class="sup-header">Lorem ipsum dolor sit amet consectetur adipisicing elit. Deserunt perspiciatis ex ipsam similique blanditiis. Culpa hic quia, repellendus corrupti </p>
                        <p class="">Lorem ipsum dolor sit amet consectetur adipisicing elit. Deserunt perspiciatis ex ipsam similique blanditiis. Culpa hic quia, repellendus corrupti perspiciatis praesentium necessitatibus alias illo quidem. Repudiandae expedita illum aspernatur magni?
                          Lorem ipsum dolor sit amet consectetur adipisicing elit. Deserunt perspiciatis ex ipsam similique blanditiis. Culpa hic quia, repellendus corrupti perspiciatis praesentium necessitatibus alias illo quidem. Repudiandae expedita illum aspernatur magni?</p>
                      </div>
                      <a href="contact.html" class="main-button">Let’s work together</a>
                    </div>
                </div>
            </div>
            <div class="black-div"></div>
        </section>
        <section id="contact" class="social-media">
            <div class="container">
              <h2>WANT TO KNOW MORE ABOUT US?</h2>
              <a href=""><img src="img/facebook_icon.svg" alt=""></a>
              <a href=""><img src="img/instagram logo_icon.svg" alt=""></a>
              <a href=""><img src="img/pinterest_icon.svg" alt=""></a>
            </div>
        </section>
        <section class="new-articles">
          <div class="card-group">
            <div class="card bg-dark text-white">
              <img src="img/architecture-1857175_1920.jpg" class="card-img" alt="...">
              <div class="card-img-overlay p-3">
                <div class="text-overlay">
                <p class="card-text text-uppercase">Most Popular</p>
                <h5 class="card-title text-uppercase">Lorem, ipsum dolor sit amet consectetur </h5>
                <div class="line"></div>
                <div class="card-text autor-data d-flex pb-3">
                  <p class="post-autor text-uppercase">Posted by someone&nbsp;</p><p class="post-data text-uppercase">| 30 07 2021</p>
                </div>
                <a href="" class="card-button">Read article</a>
                </div>
              </div>
            </div>
            <div class="card bg-dark text-white">
              <img src="img/castle-1998435_1920.jpg" class="card-img" alt="...">
              <div class="card-img-overlay p-3">
                <div class="text-overlay">
                  <p class="card-text text-uppercase">Most Popular</p>
                  <h5 class="card-title text-uppercase">Lorem, ipsum dolor sit amet consectetur </h5>
                  <div class="line"></div>
                  <div class="card-text autor-data d-flex pb-3">
                    <p class="post-autor text-uppercase">Posted by someone&nbsp;</p><p class="post-data text-uppercase">| 30 07 2021</p>
                  </div>
                  <a href="" class="card-button">Read article</a>
                  </div>
              </div>
            </div>
            <div class="card bg-dark text-white">
              <img src="img/staircase-274614_1920.jpg" class="card-img" alt="...">
              <div class="card-img-overlay p-3">
                <div class="text-overlay">
                  <p class="card-text text-uppercase">Most Popular</p>
                  <h5 class="card-title text-uppercase">Lorem, ipsum dolor sit amet consectetur </h5>
                  <div class="line"></div>
                  <div class="card-text autor-data d-flex pb-3">
                    <p class="post-autor text-uppercase">Posted by someone&nbsp;</p><p class="post-data text-uppercase">| 30 07 2021</p>
                  </div>
                  <a href="" class="card-button">Read article</a>
                  </div>
              </div>
            </div>
          </div>
        </section>
        <section id="posts" class="recent-posts">
          <div class="container">
            <h2 class="underscore">RECENT POSTS</h2>
            <p class="sup-header">Lorem ipsum dolor sit amet consectetur adipisicing elit. Deserunt perspiciatis ex ipsam similique blanditiis. Culpa hic quia, repellendus corrupti </p>
            <div class="posts-wrapper">
                <div class="post-item">
                  <div class="post-meta">
                    <span><i class="far fa-user"></i> Posted by someone</span><span><i class="far fa-calendar"></i> 30 07 2021</span>
                  </div>
                  <a href="single-post.html"  class="post-title">Lorem ipsum dolor sit amet consectetur adipisicing elit.</a>
                  <p class="post-content">Lorem ipsum dolor sit amet consectetur adipisicing elit. Deserunt perspiciatis ex ipsam similique blanditiis. Culpa hic quia, repellendus corrupti perspiciatis praesentium necessitatibus alias illo quidem. Repudiandae expedita illum aspernatur magni?</p>
                  <div class="post-meta">
                    <span><i class="far fa-comment-alt"></i> 20 comments</span>
                  </div>
                </div>
                <div class="post-item">
                  <div class="post-meta">
                    <span><i class="far fa-user"></i> Posted by someone</span><span><i class="far fa-calendar"></i> 30 07 2021</span>
                  </div>
                  <a href="single-post.html"  class="post-title">Lorem ipsum dolor sit amet consectetur adipisicing elit.</a>
                  <p class="post-content">Lorem ipsum dolor sit amet consectetur adipisicing elit. Deserunt perspiciatis ex ipsam similique blanditiis. Culpa hic quia, repellendus corrupti perspiciatis praesentium necessitatibus alias illo quidem. Repudiandae expedita illum aspernatur magni?</p>
                  <div class="post-meta">
                    <span><i class="far fa-comment-alt"></i> 20 comments</span>
                  </div>
                </div>
                <div class="post-item">
                  <div class="post-meta">
                    <span><i class="far fa-user"></i> Posted by someone</span><span><i class="far fa-calendar"></i> 30 07 2021</span>
                  </div>
                  <a href="single-post.html"  class="post-title">Lorem ipsum dolor sit amet consectetur adipisicing elit.</a>
                  <p class="post-content">Lorem ipsum dolor sit amet consectetur adipisicing elit. Deserunt perspiciatis ex ipsam similique blanditiis. Culpa hic quia, repellendus corrupti perspiciatis praesentium necessitatibus alias illo quidem. Repudiandae expedita illum aspernatur magni?</p>
                  <div class="post-meta">
                    <span><i class="far fa-comment-alt"></i> 20 comments</span>
                  </div>
                </div>
                <a href="blog.html" class="main-button">View all posts</a>
            </div>
          </div>
      </section>
        <section id="subscribe" class="subscribe">
          <div class="container">
            <h2>Subscribe & Don’t Miss Out</h2>
            <p class="">Lorem ipsum dolor sit amet consectetur adipisicing elit. Deserunt perspiciatis ex ipsam similique blanditiis. Culpa hic quia, repellendus corrupti perspiciatis praesentium
            </p>
            <form>
              <input type="email" class="email text-uppercase" id="exampleInputEmail1 aria-describedby="emailHelp" placeholder="Enter your email"><button type="submit" class="button-subscribe text-uppercase">subscribe</button>
            </form>
          </div>
      </section>
      </main>
      <footer class="text-center  text-uppercase py-5">
        <div class="footer-icons ">
          <a href=""><img src="img/facebook-footer.svg" alt=""></a>
          <a href=""><img src="img/instagramm-footer.svg" alt=""></a>
          <a href=""><img src="img/pinterest-footer.svg" alt=""></a>
        </div>
        <div class="copyright pt-4 text-muted text-center">
          <p>&copy; 2022 YOUR-DOMAIN | Created by <a href="https://firmbee.com/solutions/free-invoicing-app-billing-software/" title="Firmbee - Free Invoicing App" target="_blank">Firmbee.com</a> </p>
          <!--
          This template is licenced under Attribution 3.0 (CC BY 3.0 PL),
          You are free to: Share and Adapt. You must give appropriate credit, you may do so in any reasonable manner, but not in any way that suggests the licensor endorses you or your use.
          -->
      </div>
      </footer>
      <div class="fb2022-copy">Fbee 2022 copyright</div>
      <?php echo '<script'; ?>
 src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-U1DAWAznBHeqEIlVSCgzq+c9gqGAJn5c/t99JyeKa9xxaYpSvHU5awsuZVVFIhvj" crossorigin="anonymous"><?php echo '</script'; ?>
>
    <?php echo '<script'; ?>
 src="js/script.js"><?php echo '</script'; ?>
>
</body>
</html>
<?php }
}

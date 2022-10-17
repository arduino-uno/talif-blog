      {include file="header.tpl"}
      <section class="site-section pt-5">
        <div class="container">
          <div class="row mb-4">
            <div class="col-md-6">
              {foreach $category_line as $category}
              <h2 class="mb-4">Category: {$category.name}</h2>
              {/foreach}
            </div>
          </div>
          <div class="row blog-entries">
            <div class="col-md-12 col-lg-8 main-content">
              <div class="row">
                {foreach $post_line as $post}
                <div class="col-md-6">
                  <a href="blog-single.php?pid={$post.post_id}" class="blog-entry element-animate" data-animate-effect="fadeIn">
                    <img src="./images/{$post.image}" style="width:510px;height:35vh;object-fit: cover;" alt="Image placeholder">
                    <div class="blog-content-body">
                      <div class="post-meta">
                        <span class="author mr-2"><img src="./images/{$post.author_image}" alt="{$post.author_name}"> {$post.author_name}</span>&bullet;
                        <span class="mr-2">{$post.published} </span> &bullet;
                        <span class="ml-2"><span class="fa fa-comments"></span> 3</span>
                      </div>
                      <h2>{$post.title}</h2>
                    </div>
                  </a>
                </div>
                {/foreach}
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
                  {foreach $categories as $category}
                  <li><a href="./category.php?cid={$category.cat_id}">{$category.name}&nbsp;<span>({$category.count})</span></a></li>
                  {/foreach}
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
        {include file="footer.tpl"}
      </body>
    </html>

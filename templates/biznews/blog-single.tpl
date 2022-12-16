    {include file="header_1.tpl"}
    <!-- Breaking News Start -->
    <div class="container-fluid mt-5 mb-3 pt-3">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-12">
                    <div class="d-flex justify-content-between">
                        <div class="section-title border-right-0 mb-0" style="width: 180px;">
                            <h4 class="m-0 text-uppercase font-weight-bold">Tranding</h4>
                        </div>
                        <div class="owl-carousel tranding-carousel position-relative d-inline-flex align-items-center bg-white border border-left-0" style="width: calc(100% - 180px); padding-right: 100px;">
                            {foreach $popular_posts as $post}
                            <div class="text-truncate"><a class="text-secondary text-uppercase font-weight-semi-bold" href="./blog-single.php?pid={$post.post_id}">{$post.title}</a></div>
                            {/foreach}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Breaking News End -->
    <!-- News With Sidebar Start -->
    <div class="container-fluid">
        <div class="container">
            <div class="row">
                <div class="col-lg-8">
                    <!-- News Detail Start -->
                    {foreach $post_line as $post}
                    <div class="position-relative mb-3">
                        <img class="img-fluid w-100" src="./images/{$post.image}" style="object-fit: cover;">
                        <div class="bg-white border border-top-0 p-4">
                            <div class="mb-3">
                                <a class="badge badge-primary text-uppercase font-weight-semi-bold p-2 mr-2" href="./category.php?cid={$post.cat_id}">{$post.category}</a>
                                <a class="text-body" href="">{$post.published|date_format:"%m %d, %Y"}</a>
                            </div>
                            <h1 class="mb-3 text-secondary text-uppercase font-weight-bold">{$post.title}</h1>
                            <p>{$post.body}</p>
                        </div>
                        <div class="d-flex justify-content-between bg-white border border-top-0 p-4">
                            <div class="d-flex align-items-center">
                                <img class="rounded-circle mr-2" src="./images/{$post.author_image}" width="25" height="25" alt="">
                                <span>{$post.author_name}</span>
                            </div>
                            <div class="d-flex align-items-center">
                                <span class="ml-3"><i class="far fa-eye mr-2"></i>{$post.views}</span>
                                <span class="ml-3"><i class="far fa-comment mr-2"></i>{$post.count}</span>
                            </div>
                        </div>
                    </div>
                    {/foreach}
                    <!-- News Detail End -->

                    <!-- Comment List Start -->
                    <div class="mb-3">
                        <div class="section-title mb-0">
                            <h4 id="comments_count" class="m-0 text-uppercase font-weight-bold">3 Comments</h4>
                        </div>

                        <div class="comment-list bg-white border border-top-0 p-2">&nbsp;</div>
                    </div>
                    <!-- Comment List End -->

                    <!-- Comment Form Start -->
                    <div class="mb-3">
                        <div class="section-title mb-0">
                            <h4 class="m-0 text-uppercase font-weight-bold">Leave a comment</h4>
                        </div>
                        <div class="bg-white border border-top-0 p-4">
                            <form id="comment_form" action="#" method="POST">
                                <div class="form-row">
                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <label for="name">Name *</label>
                                            <input type="hidden" id="post_id" name="post_id" value="{$post_id}">
                                            <input type="text" name="fullname" id="fullname" pattern="^[A-Za-z \s*]+$" class="form-control" placeholder="Your fullname" required>
                                        </div>
                                    </div>
                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <label for="email">Email *</label>
                                            <input type="email" name="email" id="email" class="form-control" placeholder="Your e-mail address" required>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="website">Website</label>
                                    <input type="website" name="website" id="website" class="form-control" placeholder="E.g: www.example.com">
                                </div>

                                <div class="form-group">
                                    <label for="message">Message *</label>
                                    <textarea name="message" id="message" cols="30" rows="10" class="form-control" placeholder="Your message .." required></textarea>
                                </div>
                                <div class="form-group mb-0">
                                    <input type="hidden" name="parent_id" id="parent_id" value="0" />
                                    <input type="submit" value="Post Comment" class="btn btn-primary">
                                </div>
                            </form>
                        </div>
                    </div>
                    <!-- Comment Form End -->
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
                            <a href="https://www.envato.com" target="_blank"><img class="img-fluid rounded" alt="Sponsor Logo" src="./images/no_image.png" alt=""></a>
                        </div>
                    </div>
                    <!-- Ads End -->

                    <!-- Popular News Start -->
                    <div class="mb-3">
                        <div class="section-title mb-0">
                            <h4 class="m-0 text-uppercase font-weight-bold">Tranding News</h4>
                        </div>
                        <div class="bg-white border border-top-0 p-3">
                          {foreach $popular_posts as $post}
                          <div class="d-flex align-items-center bg-white mb-3" style="height: 110px;">
                              <img class="img-fluid w-80 h-80" src="./images/{$post.image}" style="object-fit: cover;" height="110" width="110">
                              <div class="w-100 h-100 px-3 d-flex flex-column justify-content-center border border-left-0">
                                  <div class="mb-2">
                                      <a class="badge badge-primary text-uppercase font-weight-semi-bold p-1 mr-2" href="./category.php?cid={$post.cat_id}">{$post.category}</a>
                                      <a class="text-body" href="#"><small>{$post.published}</small></a>
                                  </div>
                                  <a class="h6 m-0 text-secondary text-uppercase font-weight-bold" href="./blog-single.php?pid={$post.post_id}">{$post.title}</a>
                              </div>
                          </div>
                          {/foreach}
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
    {include file="footer.tpl"}
    <!-- JavaScript Libraries -->
    <script src="./templates/biznews/js/jquery-3.2.1.min.js"></script>
    <script src="./plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="./templates/biznews/lib/easing/easing.min.js"></script>
    <script src="./templates/biznews/lib/owlcarousel/owl.carousel.min.js"></script>
    <!-- Template Javascript -->
    <script src="./templates/biznews/js/main.js"></script>
    <script type="text/javascript" language="javascript">
    // jQuery document ready
    $(function () {

        load_comment();
        // load all post comments
        function load_comment() {

            var post_id = $('input#post_id').val();

            $.post( "./scripts/get_commcount.php", { "post_id": post_id, "parent_id": 0 }, function( data ) {
               $( "h4#comments_count" ).html( data + "&nbsp;Comments" );
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

                             $('div.comment-list.bg-white').append('<div class="media mb-4">' +
                                 '<button type="button" class="btn btn-default border rounded-circle btn-lg p-3 m-3">' + getInitials( value.fullname ) + '</button>' +
                                 '<div class="media-body">' +
                                     '<h6><a class="text-secondary font-weight-bold" href="mailto:' + value.email + '">' + value.fullname + '</a> <small><i>' + getNewDate(value.created) + '</i></small></h6>' +
                                     '<p>' + value.message + '</p>' +
                                     '<button class="reply btn btn-sm btn-outline-secondary">Reply</button>' +
                                 '</div>' +
                             '</div>');

                        } else {

                              $('div.comment-list').append('<div class="media mb-4 ml-5">' +
                                  '<button type="button" class="btn btn-default border rounded-circle btn-lg p-3 m-3 ml-4">' + getInitials( value.fullname ) + '</button>' +
                                  '<div class="media-body">' +
                                      '<h6><a class="text-secondary font-weight-bold" href="mailto:' + value.email + '">' + value.fullname + '</a> <small><i>' + getNewDate(value.created) + '</i></small></h6>' +
                                      '<p>' + value.message + '</p>' +
                                      '<button class="reply btn btn-sm btn-outline-secondary">Reply</button>' +
                                  '</div>' +
                              '</div>');

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

       $(document).on('click', 'button.reply', function() {
           // var comment_id = $(this).attr("id");
           $('input#parent_id').val(1);
           $('input#fullname').focus();
       });

    });
    </script>
</body>
</html>

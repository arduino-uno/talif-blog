
<?php
// get user detail
$user = json_decode( current_user(), true );
$user_id = $user['user_id'];
?>
<!-- Content Wrapper. Contains post content -->
<div class="content-wrapper">
  <!-- Content Header (Post header) -->
  <section class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1>Profile</h1>
        </div>
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="/media.php?module=dashboard">Home</a></li>
            <li class="breadcrumb-item active">Profile</li>
          </ol>
        </div>
      </div>
    </div><!-- /.container-fluid -->
  </section>
  <!-- Main content -->
  <section class="content">
    <!-- Default box -->
    <div class="card">
      <div class="card-body">
          <div class="container-xl px-4 mt-4">
              <!-- Account page navigation-->
              <ul class="nav nav-pills">
                  <li class="nav-item"><a class="nav-link" href="#activity" data-toggle="tab">Comments</a></li>
                  <li class="nav-item"><a class="nav-link active" href="#account" data-toggle="tab">Account</a></li>
                  <li class="nav-item"><a class="nav-link" href="#security" data-toggle="tab">Security</a></li>
              </ul>
              <hr class="mt-0 mb-4">
              <div class="row">
                  <div class="col-xl-4">
                      <!-- Profile picture card-->
                      <div class="card mb-4 mb-xl-0">
                          <div class="card-header">Profile Picture</div>
                          <div class="card-body text-center">
                            <form id="form_edituser" method="POST" action="./scripts/update_user.php" enctype="multipart/form-data">
                              <!-- Profile picture image-->
                              <img class="img-account-profile rounded-circle mb-2" src="./images/AdminLTELogo.png" name="aboutme" id="aboutme" width="270" height="270" border="0" alt="">
                              <!-- Profile picture help block-->
                              <div class="small font-italic text-muted mb-4">JPG or PNG no larger than 5 MB</div>
                              <!-- Profile picture upload button-->
                              <input type="file" id="upt_image_file" name="upt_image_file" accept="image/x-png,image/gif,image/jpeg" />
                            </form>
                          </div>
                      </div>
                  </div>
                  <div class="col-xl-8">
                      <!-- Account details card-->
                      <div class="card mb-4">
                          <div class="card-header">Account Details</div>
                          <div class="card-body">
                            <div class="tab-content">
                                <div class="tab-pane" id="activity">
                                    <div class="row" id="comments_list">&nbsp;</div>
                                    <table id="comments_data" class="table table-active table-striped table-hover" style="display: none; visibility: hidden;">&nbsp;</table>
                                </div>
                                <div class="active tab-pane" id="account">
                                  <form id="form_edituser" method="POST" action="./scripts/update_user.php">
                                    <!-- Form Group (username)-->
                                    <div class="mb-3">
                                        <label class="small mb-1" for="username">Username (how your name will appear to other users on the site)</label>
                                        <input type="hidden" name="hid_user_id" id="hid_user_id" value="<?php echo $user_id; ?>">
                                        <input type="text" class="form-control" name="upt_username" id="upt_username" placeholder="Type Username" required>
                                    </div>
                                    <!-- Form Row-->
                                    <div class="row gx-3 mb-3">
                                        <!-- Form Group (first name)-->
                                        <div class="col-md-6">
                                            <label class="small mb-1" for="firstname">First name</label>
                                            <input type="text" class="form-control" name="upt_firstname" id="upt_firstname" placeholder="Type Username" required>
                                        </div>
                                        <!-- Form Group (last name)-->
                                        <div class="col-md-6">
                                            <label class="small mb-1" for="firstname">Last name</label>
                                            <input type="text" class="form-control" name="upt_lastname" id="upt_lastname" placeholder="Enter your first name" required>
                                        </div>
                                        <!-- Form Group (organization name)-->
                                        <div class="col-md-6">
                                            <label class="small mb-1" for="organization">Organization name</label>
                                            <input type="text" class="form-control" name="upt_orgname" id="upt_orgname" placeholder="Enter your organization name">
                                        </div>
                                        <!-- Form Group (location)-->
                                        <div class="col-md-6">
                                            <label class="small mb-1" for="location">Location</label>
                                            <input type="text" class="form-control" name="upt_location" id="upt_location" placeholder="Enter your location">
                                        </div>
                                        <!-- Form Group (email address)-->
                                        <div class="col-mb-6">
                                            <label class="small mb-1" for="email">Email address</label>
                                            <input type="email" class="form-control" name="upt_email" id="upt_email" placeholder="Your Email Address" required>
                                        </div>
                                        <!-- Form Group (phone number)-->
                                        <div class="col-md-6">
                                            <label class="small mb-1" for="phone">Phone number</label>
                                            <input type="phone" class="form-control" name="upt_phone" id="upt_phone" title="Please enter valid phone number" placeholder="+62-9999999999" required>
                                        </div>
                                        <!-- Form Group (birthday)-->
                                        <div class="col-md-6">
                                            <label class="small mb-1" for="birthday">Birthday</label>
                                            <input type="date" class="form-control" name="upt_birthday" id="upt_birthday" placeholder="MM/DD/YYYY" value="<?php echo date("Y-m-d H:i:s"); ?>" min="1997-01-01" max="2030-12-31">
                                        </div>
                                    </div>
                                   </form>
                                  </div>
                                  <div class="tab-pane" id="security">
                                    <form id="form_edituser" method="POST" action="./scripts/update_user.php">
                                      <!-- Form Row-->
                                      <div class="row gx-3 mb-3">
                                          <div class="col-md-6">
                                             <label>Password</label>
                                             <input type="password" class="form-control" name="upt_password" id="upt_password" placeholder="Your Password">
                                          </div>
                                          <div class="col-md-6">
                                             <label>Confirm Password</label>
                                             <input type="password" class="form-control" name="upt_confirm_password" id="upt_confirm_password" placeholder="Confirm Password">
                                          </div>
                                      </div>
                                      <div class="row gx-3 d-flex justify-content-end mr-1">
                                          <input type="submit" name="submit" id="submit" class="btn btn-primary" value="Submit"/>
                                			</div>
                                    </form>
                                  </div>
                              </div>
                              <!-- div class="modal-footer justify-content-end">
                                  <input type="hidden" name="upt_status" id="upt_status" value="1">
                                  <input type="submit" class="btn btn-primary" name="submit" id="submit" value="Save changes"/>
                            	</div -->
                          </div>
                      </div>
                  </div>
                </div>
              </div>
          </div>
        </div>
      </div>
    </div>
  </section>
  <!-- /.content -->
</div>
<!-- /.content-wrapper -->
<!-- View Post Detail Modal -->
<div class="modal fade" id="modal_viewpost" tabindex="-1" role="dialog" aria-labelledby="modal_viewpost">
  <div class="modal-dialog modal-lg">
		<div class="modal-content bg-dark">
  	  	<div class="modal-header">
    				<h4 class="modal-title">Post Detail</h4>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
  						<span aria-hidden="true">&times;</span>
  					</button>
  			</div>
  			<div class="modal-body">
          <div class="well">
            <div class="media">
            	<a class="pull-left" href="#">
            		<img id="post_image" class="post_image d-flex m-2 rounded border border-light" src="./images/AdminLTELogo.png" height="150">
            	</a>
            	<div class="m-2 media-body">
            		<h4 id="post_title" class="media-heading">Receta 1</h4>
                  <p id="post_ibody">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Duis pharetra varius quam sit amet vulputate.
          Quisque mauris augue, molestie tincidunt condimentum vitae, gravida a libero. Aenean sit amet felis
          dolor, in sagittis nisi. Sed ac orci quis tortor imperdiet venenatis. Duis elementum auctor accumsan.
          Aliquam in felis sit amet augue.</p>
                  <p>
                    <i class="fas fa-user"></i>&nbsp;by&nbsp;<a href="#" id="post_link">&nbsp;</a>&nbsp;
                    |&nbsp;<i class="fas fa-calendar-alt"></i>&nbsp;<span id="post_published">&nbsp;</span>&nbsp;
                    |&nbsp;<i class="fas fa-heart"></i>&nbsp;<span id="post_likes">&nbsp;</span>&nbsp;Likes&nbsp;
                    |&nbsp;<i class="fas fa-tags"></i>&nbsp;Tags&nbsp;:&nbsp;<span id="post_tags">&nbsp;</span>
                  </p>
              </div>
            </div>
          </div>
  			</div>
  			<div class="modal-footer justify-content-end">
    				<input type="button" name="close" id="close" class="btn btn-default" data-dismiss="modal" value="Close"/>
  			</div>
  		</div>
    </div>
  </div>
</div>

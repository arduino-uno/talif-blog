<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1>Manage Site Users</h1>
        </div>
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="./media.php?module=dashboard">Home</a></li>
            <li class="breadcrumb-item active">Users</li>
          </ol>
        </div>
      </div>
    </div><!-- /.container-fluid -->
  </section>

  <!-- Main content -->
  <section class="content">
    <div class="container-fluid">
      <div class="row">
        <div class="col-12">
          <div class="card">
            <div class="card-header">
              <h3 class="card-title">Users - DataTables</h3>
            </div>
            <!-- /.card-header -->
            <div class="card-body">
              <table id="users_data" class="table table-active table-striped table-hover">
                <thead>
      						<tr>
      							<th width="10" style="text-align: center;">#</th>
                    <th width="100 px">Image</th>
                    <th width="100 px">Login</th>
      							<th width="200 px">Fullname</th>
      							<th>Email</th>
                    <th>Role</th>
                	  <th>Joined</th>
                    <th>Status</th>
      							<th width="250 px">Action</th>
      						</tr>
                </thead>
                <tfoot>
                  <tr>
      							<th width="10" style="text-align: center;">#</th>
                    <th width="100 px">Image</th>
                    <th width="100 px">Login</th>
      							<th width="200 px">Fullname</th>
      							<th>Email</th>
                    <th>Role</th>
                    <th width="250 px">Joined</th>
                    <th>Status</th>
      							<th width="250 px">Action</th>
      						</tr>
                </tfoot>
              </table>
            </div>
            <!-- /.card-body -->
          </div>
          <!-- /.card -->
        </div>
        <!-- /.col -->
      </div>
      <!-- /.row -->
    </div>
    <!-- /.container-fluid -->
  </section>
  <!-- /.content -->
</div>
<!-- /.content-wrapper -->
<!-- Add User Modal -->
<div class="modal fade" id="modal_newuser" tabindex="-1" role="dialog" aria-labelledby="modal_newuser">
  <div class="modal-dialog" role="document">
  	<div class="modal-content bg-dark">
  	  <form id="form_newuser" method="POST" action="./scripts/insert_user.php" enctype="multipart/form-data">
        <div class="modal-header">
    				<h4 class="modal-title">Add New User</h4>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
  						<span aria-hidden="true">&times;</span>
  					</button>
  			</div>
      	 <div class="modal-body">
            <div class="row">
                <div class="col-12">
                    <fieldset class="form-group">
                      <center><img src="./images/AdminLTELogo.png" class="img-circle elevation-3" name="user_image" id="user_image" width="140" height="140" border="0"></a></center>
                    </fieldset>
                    <fieldset class="form-group" border="1">
                      <label>Update Image:</label>
                      <input type="file" id="image_file" name="image_file" accept="image/x-png,image/gif,image/jpeg" />
                    </fieldset>
                    <div class="row">
                        <div class="col-6">
                          	<fieldset class="form-group">
                          		 <label>Username</label>
                          		 <input type="text" class="form-control" name="username" id="username" placeholder="Type Username" required>
                          	</fieldset>
                            <fieldset class="form-group">
                                <label>firstname</label>
                                <input type="text" class="form-control" name="firstname" id="firstname" placeholder="Enter your first name" required>
                            </fieldset>
                            <!-- Form Group (organization name)-->
                            <fieldset class="form-group">
                                <label>Organization name</label>
                                <input type="text" class="form-control" name="organization" id="organization" placeholder="Enter your organization name">
                            </fieldset>
                        </div>
                        <div class="col-6">
                            <fieldset class="form-group">
                               <label>Email</label>
                               <input type="email" class="form-control" name="email" id="email" placeholder="Your Email Address" required>
                            </fieldset>
                            <fieldset class="form-group">
                                <label>Lastname</label>
                                <input type="text" class="form-control" name="lastname" id="lastname" placeholder="Enter your last name" required>
                            </fieldset>
                            <!-- Form Group (location)-->
                            <fieldset class="form-group">
                                <label>Location</label>
                                <input type="text" class="form-control" name="location" id="location" placeholder="Enter your location">
                            </fieldset>
                            <fieldset class="form-group">
                                <label>Birthday</label>
                                <input type="date" class="form-control" name="birthday" id="birthday" placeholder="MM/DD/YYYY" required>
                            </fieldset>
                        </div>
                    </div>
                </div>
            </div>
        		<fieldset class="form-group">
        			 <label>Password</label>
        			 <input type="password" class="form-control" name="password" id="password" placeholder="Your Password" required>
        		</fieldset>
        		<fieldset class="form-group">
        			 <label>Confirm Password</label>
        			 <input type="password" class="form-control" name="confirm_password" id="confirm_password" placeholder="Confirm Password" required>
        		</fieldset>
      	</div>
      	<div class="modal-footer">
            <input type="button" name="close" id="close" class="btn btn-default" data-dismiss="modal" value="Close"/>
      		  <input type="submit" class="btn btn-primary" name="submit" id="submit" value="Submit"/>
    	  </div>
    	</form>
  	</div>
  </div>
</div>
<!-- Update User Modal -->
<div class="modal fade" id="modal_edituser" tabindex="-1" role="dialog" aria-labelledby="modal_edituser">
  <div class="modal-dialog" role="document">
  	<div class="modal-content bg-dark">
  	  <form id="form_edituser" method="POST" action="./scripts/update_user.php" enctype="multipart/form-data">
        <div class="modal-header">
    				<h4 class="modal-title">Update User</h4>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
  						<span aria-hidden="true">&times;</span>
  					</button>
  			</div>
      	 <div class="modal-body">
           <div class="row">
               <div class="col-12">
                  <fieldset class="form-group">
                      <center><img src="./images/AdminLTELogo.png" class="img-circle elevation-3" name="upt_user_image" id="upt_user_image" width="140" height="140" border="0"></a></center>
                  </fieldset>
                  <fieldset class="form-group" border="1">
                    <label>Update Image:</label>
                    <input type="file" id="upt_image_file" name="upt_image_file" accept="image/x-png,image/gif,image/jpeg" />
                  </fieldset>
                  <div class="row">
                      <div class="col-6">
                          <fieldset class="form-group">
                              <label>Username</label>
                              <input type="hidden" name="hid_user_id" id="hid_user_id">
                              <input type="text" class="form-control" name="upt_username" id="upt_username" placeholder="Type Username" required>
                          </fieldset>
                          <fieldset class="form-group">
                             <label>firstname</label>
                             <input type="text" class="form-control" name="upt_firstname" id="upt_firstname" placeholder="Enter your first name" required>
                          </fieldset>
                          <!-- Form Group (organization name)-->
                          <fieldset class="form-group">
                             <label>Organization name</label>
                             <input type="text" class="form-control" name="upt_organization" id="upt_organization" placeholder="Enter your organization name">
                          </fieldset>
                      </div>
                      <div class="col-6">
                          <fieldset class="form-group">
                             <label>Email</label>
                             <input type="email" class="form-control" name="upt_email" id="upt_email" placeholder="Your Email Address" required>
                          </fieldset>
                          <fieldset class="form-group">
                             <label>Lastname</label>
                             <input type="text" class="form-control" name="upt_lastname" id="upt_lastname" placeholder="Enter your last name" required>
                          </fieldset>
                          <!-- Form Group (location)-->
                          <fieldset class="form-group">
                             <label>Location</label>
                             <input type="text" class="form-control" name="upt_location" id="upt_location" placeholder="Enter your location">
                          </fieldset>
                          <fieldset class="form-group">
                              <label>Birthday</label>
                              <input type="date" class="form-control" name="upt_birthday" id="upt_birthday" placeholder="MM/DD/YYYY" required>
                          </fieldset>
                      </div>
                  </div>
                </div>
            </div>
        		<fieldset class="form-group">
        			 <label>Password</label>
        			 <input type="password" class="form-control" name="upt_password" id="upt_password" placeholder="Your Password">
        		</fieldset>
        		<fieldset class="form-group">
        			 <label>Confirm Password</label>
               <input type="password" class="form-control" name="upt_confirm_password" id="upt_confirm_password" placeholder="Confirm Password">
        		</fieldset>
            <fieldset class="form-group">
        			 <label>Role</label>
               <select class="form-control" name="upt_role" id="upt_role">
                  <option value="administrator">Administrator</option>
                  <option value="member">Member</option>
               </select>
        		</fieldset>
        		<fieldset class="form-group">
          		 <label>
          		     <input type="checkbox" name="upt_status" id="upt_status">&nbsp;<label>Active/Inactive</label>
               </label>
            </fieldset>
      	</div>
      	<div class="modal-footer">
            <input type="button" name="close" id="close" class="btn btn-default" data-dismiss="modal" value="Close"/>
      		  <input type="submit" class="btn btn-primary" name="submit" id="submit" value="Submit"/>
    	  </div>
    	</form>
  	</div>
  </div>
</div>
<!-- Confirm Delete User -->
<div class="modal fade" id="modal_deluser" tabindex="-1" role="dialog">
	<div class="modal-dialog">
		<div class="modal-content bg-dark">
			<div class="modal-header">
				<h4 class="modal-title" id="label_deluser">Delete Confirmation</h4>
				<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
			</div>
			<div class="modal-body">
				<p class="error-text">Are you sure want to delete this user?</p>
			</div>
			<div class="modal-footer">
        <input type="button" name="btn_close" id="btn_close" class="btn btn-success" data-dismiss="modal" value="Close"/>
        <input type="button" name="btn_delete" id="btn_delete" class="btn btn-primary" value="Delete"/>
				<input type="hidden" id="hid_user_id">
			</div>
		</div>
	</div>
</div>

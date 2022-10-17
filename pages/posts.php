<!-- Content Wrapper. Contains post content -->
<div class="content-wrapper">
  <!-- Content Header (Post header) -->
  <section class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1>Manage Site Posts</h1>
        </div>
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="./media.php?module=dashboard">Home</a></li>
            <li class="breadcrumb-item active">Posts</li>
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
              <h3 class="card-title">Posts - DataTables</h3>
            </div>
            <!-- /.card-header -->
            <div class="card-body">
              <table id="posts_data" class="table table-active table-striped table-hover">
                <thead>
      						<tr>
      							<th width="10%" style="text-align: center;">ID</th>
      							<th width="70%">Post Details</th>
      							<th width="20%">Action</th>
      						</tr>
                </thead>
                <tfoot>
                  <tr>
      							<th width="10%" style="text-align: center;">ID</th>
                    <th width="70%">Post Details</th>
      							<th width="20%">Action</th>
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
<!-- Add New Post Modal -->
<div class="modal fade" id="modal_newpost" tabindex="-1" role="dialog" aria-labelledby="modal_newpost">
  <div class="modal-dialog modal-lg">
		<div class="modal-content bg-dark">
  		<form enctype="multipart/form-data" method="POST" id="form_newpost" action="./scripts/insert_post.php">
  			<div class="modal-header">
    				<h4 class="modal-title">Add New Post</h4>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
  						<span aria-hidden="true">&times;</span>
  					</button>
  			</div>
  			<div class="modal-body">
          <div class="row">
            <div class="col-8">
              <div class="form-group">
      				  <label>Post Title</label>
      				  <input type="text" name="post_title" id="post_title" class="form-control" placeholder="Post Title" required>
      				</div>
      				<div class="form-group">
      				  <label>Post Body</label>
      				  <textarea name="post_body" id="post_body" class="form-control" placeholder="Post Body" required></textarea>
      				</div>
            </div>
            <div class="col-4">
              <div class="form-group">
                <label>Image Preview</label>
                <img src="./images/AdminLTELogo.png" id="post_image" class="img-rounded border border-light" style="width: 100%; height: 20vw; object-fit: cover;" alt="">
              </div>
              <div class="form-group">
                <label>Post Image</label>
                <input type="file" id="img_file" name="img_file" accept="image/x-png,image/gif,image/jpeg" />
              </div>
              <div class="form-group">
                <label>Category</label>
                <select class="form-control" name="post_category" id="post_category">
                    <option value='0'>Uncategory</option>
                </select>
              </div>
              <div class="form-group">
                <label>Meta Tags</label>
                <input type="text" name="post_tags" id="post_tags" class="form-control" placeholder="write some tags .." value="">
              </div>
            </div>
          </div>
  			</div>
  			<div class="modal-footer justify-content-end">
    				<input type="button" name="close" id="close" class="btn btn-default" data-dismiss="modal" value="Close"/>
    				<input type="submit" name="submit" class="btn btn-primary" value="Submit"/>
  			</div>
  		</form>
		</div>
  </div>
</div>
<!-- Update Post Modal -->
<div class="modal fade" id="modal_editpost" tabindex="-1" role="dialog" aria-labelledby="modal_editpost">
  <div class="modal-dialog modal-lg">
		<div class="modal-content bg-dark">
  		<form enctype="multipart/form-data" method="POST" id="form_editpost" action="./scripts/update_post.php">
  			<div class="modal-header">
    				<h4 class="modal-title">Update Post</h4>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
  						<span aria-hidden="true">&times;</span>
  					</button>
  			</div>
  			<div class="modal-body">
          <div class="row">
            <div class="col-8">
              <div class="form-group">
      				  <label>Post Title</label>
                <input type="hidden" name="hid_post_id" id="hid_post_id">
      				  <input type="text" name="upt_post_title" id="upt_post_title" class="form-control" placeholder="Post Title" required>
      				</div>
              <div class="form-group">
      				  <label>Post Body</label>
      				  <textarea name="upt_post_body" id="upt_post_body" class="form-control" placeholder="Post Body" required></textarea>
      				</div>
              <div class="checkbox">
        			  <label>
        				      <input type="checkbox" name="upt_post_status" id="upt_post_status">&nbsp;Published
        			  </label>
        			</div>
            </div>
            <div class="col-4">
              <div class="form-group">
                <label>Image Preview</label>
                <img src="./images/AdminLTELogo.png" id="upt_post_image" class="img-rounded border border-light" style="width: 100%; height: 20vw; object-fit: cover;" alt="">
              </div>
              <div class="form-group">
                <label>Upload Image</label>
                <input type="file" id="upt_img_file" name="upt_img_file" accept="image/x-png,image/gif,image/jpeg" />
              </div>
              <div class="form-group">
                <label>Category</label>
                <select class="form-control" name="upt_post_category" id="upt_post_category">
                    <option value='0'>Uncategory</option>
                </select>
              </div>
              <div class="form-group">
      				  <label>Meta Tags</label>
                <input type="text" name="upt_post_tags" id="upt_post_tags" class="form-control" placeholder="write some tags .." value="">
      				</div>
            </div>
  			</div>
  			<div class="modal-footer justify-content-end">
    				<input type="button" name="close" id="close" class="btn btn-default" data-dismiss="modal" value="Close"/>
    				<input type="submit" name="submit" id="submit" class="btn btn-primary" value="Submit"/>
  			</div>
  		</form>
		</div>
  </div>
</div>
<!-- Confirm Delete Post -->
<div class="modal fade" id="modal_delpost" tabindex="-1" role="dialog">
	<div class="modal-dialog">
		<div class="modal-content bg-dark">
			<div class="modal-header">
				<h4 class="modal-title" id="label_delpost">Delete Confirmation</h4>
				<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
			</div>
			<div class="modal-body">
				<p class="error-text">Are you sure want to delete this post?</p>
			</div>
			<div class="modal-footer">
        <input type="button" name="btn_close" id="btn_close" class="btn btn-success" data-dismiss="modal" value="Close"/>
        <input type="button" name="btn_delete" id="btn_delete" class="btn btn-primary" value="Delete"/>
				<input type="hidden" id="hid_post_id">
			</div>
		</div>
	</div>
</div>

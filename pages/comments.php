<!-- Content Wrapper. Contains post content -->
<div class="content-wrapper">
  <!-- Content Header (Post header) -->
  <section class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1>Manage Comments</h1>
        </div>
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="./media.php?module=dashboard">Home</a></li>
            <li class="breadcrumb-item active">Comments</li>
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
              <h3 class="card-title">Comments - DataTables</h3>
            </div>
            <!-- /.card-header -->
            <div class="card-body">
              <table id="comments_data" class="table table-active table-striped table-hover">
                <thead>
      						<tr>
      							<th width="10%" style="text-align: center;">ID</th>
      							<th width="70%">Comment Details</th>
                    <th width="20%">Action</th>
      						</tr>
                </thead>
                <tfoot>
                  <tr>
                    <th width="10%" style="text-align: center;">ID</th>
      							<th width="70%">Comment Details</th>
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
<!-- View Comment Replies Modal -->
<div class="modal fade" id="modal_viewreply" tabindex="-1" role="dialog" aria-labelledby="modal_viewreply">
  <div class="modal-dialog modal-lg">
		<div class="modal-content bg-dark">
  	  	<div class="modal-header">
    				<h4 class="modal-title">Comments - DataTables</h4>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
  						<span aria-hidden="true">&times;</span>
  					</button>
  			</div>
  			<div class="modal-body">
          <div class="row">
            <div class="col-12">
              <div class="card">
                <div class="card-header">
                  <h3 class="card-title">Replies - DataTables</h3>
                </div>
                <!-- /.card-header -->
                <div class="card-body">
                  <table id="replies_data" class="table table-active table-striped table-hover" width="100%">
                    <thead>
          						<tr>
          							<th width="10%" style="text-align: center;">ID</th>
          							<th width="70%">Comment Details</th>
                        <th width="20%">Action</th>
          						</tr>
                    </thead>
                    <tfoot>
                      <tr>
                        <th width="10%" style="text-align: center;">ID</th>
          							<th width="70%">Comment Details</th>
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
  			<div class="modal-footer justify-content-end">
    				<input type="button" name="close" id="close" class="btn btn-default" data-dismiss="modal" value="Close"/>
  			</div>
  		</div>
    </div>
  </div>
</div>
<!-- Confirm Delete Contact -->
<div class="modal fade" id="modal_delcomment" tabindex="-1" role="dialog">
	<div class="modal-dialog">
		<div class="modal-content bg-dark">
			<div class="modal-header">
				<h4 class="modal-title" id="label_delcomment">Delete Confirmation</h4>
				<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
			</div>
			<div class="modal-body">
				<p class="error-text">Are you sure want to delete this comment?</p>
			</div>
			<div class="modal-footer">
        <input type="button" name="btn_close" id="btn_close" class="btn btn-success" data-dismiss="modal" value="Close"/>
        <input type="button" name="btn_delete" id="btn_delete" class="btn btn-primary" value="Delete"/>
				<input type="hidden" id="hid_comm_id">
			</div>
		</div>
	</div>
</div>

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1>Messaging</h1>
        </div>
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="./media.php?module=dashboard">Home</a></li>
            <li class="breadcrumb-item active">Messaging</li>
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
          <div class="card direct-chat direct-chat-warning" style="height:450px;">
            <div class="card-header">
              <h3 class="card-title">Messaging</h3>
              <div class="card-tools mr-2">
                <span title="null&nbsp;New Messages" class="badge badge-warning"><?php echo rows_count( "chats" );?></span>
                <button type="button" class="btn btn-tool" title="Contacts" data-widget="chat-pane-toggle">
                  <i class="fas fa-comments"></i>
                </button>
              </div>
            </div>
            <!-- /.card-header -->
            <div class="card-body">
              <!-- Conversations are loaded here -->
              <div class="direct-chat-messages" style="height:450px;">
                <!-- All chat messages here! -->
              </div>
              <!--/.direct-chat-messages-->

              <!-- Contacts are loaded here -->
              <div class="direct-chat-contacts" style="height:450px;">
                <ul class="contacts-list">
                  <!-- All contact items here! -->
                </ul>
                <!-- /.contacts-list -->
              </div>
              <!-- /.direct-chat-pane -->
            </div>
            <!-- /.card-body -->
            <div class="card-footer">
              <!-- form name="form_postchats" id="form_postchats" action="./scripts/post_chats.php" method="post" -->
                <div class="input-group">
                  <input type="text" name="message" id="message" placeholder="Type Message ..." class="form-control">
                  <span class="input-group-append">
                    <button type="button" name="btn_submitmsg" id="btn_submitmsg" class="btn btn-warning">Send</button>
                  </span>
                </div>
              <!-- /form -->
            </div>
            <!-- /.card-footer-->
          </div>
          <!--/.direct-chat -->
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
<!-- Add Page Modal -->
<div class="modal fade" id="modal_newpage" tabindex="-1" role="dialog" aria-labelledby="modal_newpage">
  <div class="modal-dialog modal-lg">
		<div class="modal-content bg-dark">
  		<form enctype="multipart/form-data" method="POST" name="form_newpage" id="form_newpage" action="./scripts/insert_page.php">
  			<div class="modal-header">
    				<h4 class="modal-title">Add New Page</h4>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
  						<span aria-hidden="true">&times;</span>
  					</button>
  			</div>
  			<div class="modal-body">
            <div class="row">
              <div class="col-8">
        				<div class="form-group">
        				  <label>Page Title</label>
        				  <input type="text" name="page_title" id="page_title" class="form-control" placeholder="Page Title" required>
        				</div>
        				<div class="form-group">
        				  <label>Page Body</label>
        				  <textarea name="page_body" id="page_body" class="form-control" placeholder="Page Body" required></textarea>
        				</div>
              </div>
              <div class="col-4">
                <div class="form-group">
                  <label>Image Preview</label>
                  <img src="./images/AdminLTELogo.png" id="page_image" class="img-rounded border border-light" style="width: 100%; height: 20vw; object-fit: cover;" alt="">
                </div>
                <div class="form-group">
        				  <label>Page Image</label>
                  <input type="file" id="upload_image" name="upload_image" accept="image/x-png,image/gif,image/jpeg" />
                </div>
                <div class="form-group">
        				  <label>Meta Tags</label>
        				  <input type="text" name="page_tags" rows="3" id="page_tags" class="page_tags form-control form-control-solid input-lg" placeholder="write Some Tags .." value="">
        				</div>
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
<!-- Update Post Modal -->
<div class="modal fade" id="modal_editpage" tabindex="-1" role="dialog" aria-labelledby="modal_editpage">
  <div class="modal-dialog modal-lg">
		<div class="modal-content bg-dark">
  		<form enctype="multipart/form-data" method="POST" id="form_editpage" action="./scripts/update_page.php">
  			<div class="modal-header">
    				<h4 class="modal-title">Update Page</h4>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
  						<span aria-hidden="true">&times;</span>
  					</button>
  			</div>
  			<div class="modal-body">
          <div class="row">
            <div class="col-8">
      				<div class="form-group">
      				  <label>Page Title</label>
                <input type="hidden" name="hid_page_id" id="hid_page_id">
      				  <input type="text" name="upt_page_title" id="upt_page_title" class="form-control" placeholder="Page Title" required>
      				</div>
      				<div class="form-group">
      				  <label>Page Body</label>
      				  <textarea name="upt_page_body" id="upt_page_body" class="form-control" placeholder="Page Body" required></textarea>
      				</div>
              <div class="checkbox">
        			  <label>
        				      <input type="checkbox" name="upt_page_status" id="upt_page_status">&nbsp;Published
        			  </label>
        			</div>
            </div>
            <div class="col-4">
              <div class="form-group">
                <label>Image Preview</label>
                <img src="./images/AdminLTELogo.png" id="upt_page_image" class="img-rounded border border-light" style="width: 100%; height: 20vw; object-fit: cover;" alt="">
              </div>
              <div class="form-group">
                <label>Page Image</label>
                <input type="file" id="image_file" name="image_file" accept="image/x-png,image/gif,image/jpeg" />
              </div>
      				<div class="form-group">
      				  <label>Meta Tags</label>
      				  <input type="text" name="upt_page_tags" id="upt_page_tags" class="upt_page_tags form-control form-control-solid" placeholder="write Some Tags .." value="">
      				</div>
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
<!-- Confirm Delete Page -->
<div class="modal fade" id="modal_delpage" tabindex="-1" role="dialog">
	<div class="modal-dialog">
		<div class="modal-content bg-dark">
			<div class="modal-header">
				<h4 class="modal-title" id="label_delpage">Delete Confirmation</h4>
				<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
			</div>
			<div class="modal-body">
				<p class="error-text">Are you sure want to delete this page?</p>
			</div>
			<div class="modal-footer">
        <input type="button" name="btn_close" id="btn_close" class="btn btn-success" data-dismiss="modal" value="Close"/>
        <input type="button" name="btn_delete" id="btn_delete" class="btn btn-primary" value="Delete"/>
				<input type="hidden" id="hid_page_id">
			</div>
		</div>
	</div>
</div>

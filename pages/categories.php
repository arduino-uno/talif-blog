<!-- Content Wrapper. Contains post content -->
<div class="content-wrapper">
  <!-- Content Header (Post header) -->
  <section class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1>Manage Site Categories</h1>
        </div>
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="./media.php?module=dashboard">Home</a></li>
            <li class="breadcrumb-item active">Categories</li>
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
              <h3 class="card-title">Categories - DataTables</h3>
            </div>
            <!-- /.card-header -->
            <div class="card-body">
              <table id="categories_data" class="table table-active table-striped table-hover">
                <thead>
      						<tr>
      							<th width="10%" style="text-align: center;">ID</th>
      							<th width="10%">Category</th>
                    <th>Description</th>
      							<th width="20%">Action</th>
      						</tr>
                </thead>
                <tfoot>
                  <tr>
                    <th width="10%" style="text-align: center;">ID</th>
      							<th width="10%">Category</th>
                    <th>Description</th>
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
<!-- Add New Category Modal -->
<div class="modal fade" id="modal_newcat" tabindex="-1" role="dialog" aria-labelledby="modal_newcat">
  <div class="modal-dialog">
		<div class="modal-content bg-dark">
  		<form id="form_newcat" method="POST" action="./scripts/insert_category.php">
  			<div class="modal-header">
    				<h4 class="modal-title">Add New Category</h4>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
  						<span aria-hidden="true">&times;</span>
  					</button>
  			</div>
  			<div class="modal-body">
          <div class="row">
            <div class="col-12">
              <div class="form-group">
      				  <label>Name</label>
      				  <input type="text" name="cat_name" id="cat_name" class="form-control" placeholder="Name .." required>
      				</div>
      				<div class="form-group">
      				  <label>Description</label>
      				  <textarea name="cat_desc" id="cat_desc" class="form-control" rows="5" placeholder="Description .."></textarea>
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
<div class="modal fade" id="modal_editcat" tabindex="-1" role="dialog" aria-labelledby="modal_editcat">
  <div class="modal-dialog">
		<div class="modal-content bg-dark">
  		<form id="form_editcat" method="POST" action="./scripts/update_category.php">
  			<div class="modal-header">
    				<h4 class="modal-title">Update Category</h4>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
  						<span aria-hidden="true">&times;</span>
  					</button>
  			</div>
  			<div class="modal-body">
            <div class="row">
              <div class="col-12">
                <div class="form-group">
        				  <label>Name</label>
                  <input type="hidden" name="hid_cat_id" id="hid_cat_id">
        				  <input type="text" name="upt_cat_name" id="upt_cat_name" class="form-control" placeholder="Name .." required>
        				</div>
                <div class="form-group">
        				  <label>Description</label>
        				  <textarea name="upt_cat_desc" id="upt_cat_desc" rows="5" class="form-control" placeholder="Description .."></textarea>
        				</div>
              </div>
    			</div>
    			<div class="modal-footer justify-content-end">
      				<input type="button" name="close" id="close" class="btn btn-default" data-dismiss="modal" value="Close"/>
      				<input type="submit" name="submit" id="submit" class="btn btn-primary" value="Submit"/>
    			</div>
		    </div>
      </form>
    </div>
  </div>
</div>
<!-- Confirm Delete Category -->
<div class="modal fade" id="modal_delcategory" tabindex="-1" role="dialog">
	<div class="modal-dialog">
		<div class="modal-content bg-dark">
			<div class="modal-header">
				<h4 class="modal-title" id="label_delcategory">Delete Confirmation</h4>
				<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
			</div>
			<div class="modal-body">
				<p class="error-text">Are you sure want to delete this category?</p>
			</div>
			<div class="modal-footer">
        <input type="button" name="btn_close" id="btn_close" class="btn btn-success" data-dismiss="modal" value="Close"/>
        <input type="button" name="btn_delete" id="btn_delete" class="btn btn-primary" value="Delete"/>
				<input type="hidden" id="hid_cat_id">
			</div>
		</div>
	</div>
</div>

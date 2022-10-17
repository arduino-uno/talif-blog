<!-- Content Wrapper. Contains post content -->
<div class="content-wrapper">
  <!-- Content Header (Post header) -->
  <section class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1>Manage Site Contacts</h1>
        </div>
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="./media.php?module=dashboard">Home</a></li>
            <li class="breadcrumb-item active">Contacts</li>
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
              <h3 class="card-title">Contacts - DataTables</h3>
            </div>
            <!-- /.card-header -->
            <div class="card-body">
              <table id="contacts_data" class="table table-active table-striped table-hover">
                <thead>
      						<tr>
      							<th width="10" style="text-align: center;">ID</th>
                    <th width="100 px">Fullname</th>
      							<th width="100 px">Email</th>
                    <th>Subject</th>
      							<th>Created</th>
      							<th>Action</th>
      						</tr>
                </thead>
                <tfoot>
                  <tr>
                    <th width="10" style="text-align: center;">ID</th>
                    <th width="100 px">Fullname</th>
      							<th width="100 px">Email</th>
                    <th>Subject</th>
      							<th>Created</th>
      							<th>Action</th>
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
<!-- Confirm Delete Contact -->
<div class="modal fade" id="modal_delcontact" tabindex="-1" role="dialog">
	<div class="modal-dialog">
		<div class="modal-content bg-dark">
			<div class="modal-header">
				<h4 class="modal-title" id="label_delcontact">Delete Confirmation</h4>
				<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
			</div>
			<div class="modal-body">
				<p class="error-text">Are you sure want to delete this contact?</p>
			</div>
			<div class="modal-footer">
        <input type="button" name="btn_close" id="btn_close" class="btn btn-success" data-dismiss="modal" value="Close"/>
        <input type="button" name="btn_delete" id="btn_delete" class="btn btn-primary" value="Delete"/>
				<input type="hidden" id="hid_contact_id">
			</div>
		</div>
	</div>
</div>

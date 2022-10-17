<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1>Manage Site Templates</h1>
        </div>
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="./media.php?module=dashboard">Home</a></li>
            <li class="breadcrumb-item active">Template Options</li>
          </ol>
        </div>
      </div>
    </div><!-- /.container-fluid -->
  </section>
  <!-- Main content -->
  <section class="content">
    <div class="container-fluid">
      <!-- SELECT2 EXAMPLE -->
      <div class="card card-default">
        <div class="card-header">
          <h3 class="card-title">Template Option</h3>
          <div class="card-tools">
            <button type="button" class="btn btn-tool" data-card-widget="collapse">
              <i class="fas fa-minus"></i>
            </button>
            <button type="button" class="btn btn-tool" data-card-widget="remove">
              <i class="fas fa-times"></i>
            </button>
          </div>
        </div>
        <!-- /.card-header -->
        <!-- card body -->
        <div class="card-body">
          <div class="row">
            <div class="col-12">
              <!-- left column -->
              <div class="row" id="template_list">
                <table id="templates_data" class="table table-active table-striped table-hover" style="display: none; visibility: hidden;">&nbsp;</table>
              </div>
            </div>
         </div>
      </div>
      <!-- /.row -->
    </div>
    <!-- /.container-fluid -->
  </section>
  <!-- /.content -->
</div>
<!-- /.content-wrapper -->
<!-- View Post Detail Modal -->
<div class="modal fade" id="modal_viewtemplate" tabindex="-1" role="dialog" aria-labelledby="modal_viewpost">
  <div class="modal-dialog modal-lg">
		<div class="modal-content bg-dark">
  	  	<div class="modal-header">
    				<h4 class="modal-title">Template Detail</h4>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
  						<span aria-hidden="true">&times;</span>
  					</button>
  			</div>
  			<div class="modal-body">
          <div class="well">
            <div class="media">
            	<a class="pull-left" href="#">
            		<img id="temp_image" class="temp_image d-flex m-2 rounded border border-light" src="./images/AdminLTELogo.png" height="150">
            	</a>
            	<div class="m-2 media-body">
            		<h4 id="temp_title" class="media-heading">Receta 1</h4>
                  <p id="temp_description">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Duis pharetra varius quam sit amet vulputate.
          Quisque mauris augue, molestie tincidunt condimentum vitae, gravida a libero. Aenean sit amet felis
          dolor, in sagittis nisi. Sed ac orci quis tortor imperdiet venenatis. Duis elementum auctor accumsan.
          Aliquam in felis sit amet augue.</p>
                  <p>
                    <i class="fas fa-user"></i>&nbsp;by&nbsp;<a href="#" target="_blank" id="temp_link">&nbsp;</a>&nbsp;
                    |&nbsp;<i class="fas fa-calendar-alt"></i>&nbsp;<span id="temp_created">&nbsp;</span>&nbsp;
                    |&nbsp;<i class="fas fa-heart"></i>&nbsp;39 Likes&nbsp;
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

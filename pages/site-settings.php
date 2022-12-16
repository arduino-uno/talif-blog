<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1>Edit Profile</h1>
        </div>
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="./media.php?module=dashboard">Home</a></li>
            <li class="breadcrumb-item active">Edit Profile</li>
          </ol>
        </div>
      </div>
    </div><!-- /.container-fluid -->
  </section>

  <form class="form-horizontal" id="form_settings" name="form_settings" method="POST" action="./scripts/update_settings.php">
    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <!-- SELECT2 EXAMPLE -->
        <div class="card card-default">
          <div class="card-header">
            <h3 class="card-title">Site Settings</h3>
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
                    <div class="row">
                      <div class="col-6">
                        <fieldset class="form-group">
                  			<label>Company Logo</label><br>
                  				<img style="background:transparent;border: 2px solid #C0C0C0;border-radius: 5px;" src="./images/no_image.png" width="300px" name="compLogo" id="compLogo" class="centered">
                  			</fieldset>
                  			<fieldset class="form-group">
                  				<label for="basicInputFile">Change Logo</label>
                  				<input type="file" class="form-control-file" id="file" name="file" accept="image/x-png,image/gif,image/jpeg">
                  			</fieldset>
                      </div>
                      <div class="col-6">
                  			<fieldset class="form-group">
                  				<label>Site Title</label>
                  				<input type="text" class="form-control" name="title" id="title" placeholder="Nama Perusahaan">
                  			</fieldset>
                  			<fieldset class="form-group">
                  				<label>Description</label>
                  				<textarea type="text" rows="5" class="form-control" name="description" id="description" placeholder="Deskripsi Aplikasi"></textarea>
                  			</fieldset>
                  			<fieldset class="form-group">
                  				<label>Address</label>
                  				<textarea type="text" class="form-control" name="address" id="address" placeholder="Alamat Lengkap Perusahaan"></textarea>
                  			</fieldset>
                  			<fieldset class="form-group">
                  				<label>Phone</label>
                  				<input type="text" class="form-control" name="phone" id="phone" pattern="[0-9]{5}[-][0-9]{7}[-][0-9]{1}" placeholder="No Telephone">
                  			</fieldset>
                  			<fieldset class="form-group">
                  				<label>Fax</label>
                  				<input type="text" class="form-control" name="fax" id="fax" placeholder="No Fax">
                  			</fieldset>
                  			<fieldset class="form-group">
                  				<label>Email</label>
                  				<input type="text" class="form-control" name="email" id="email" pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,}$" placeholder="Alamat Email Perusahaan">
                  			</fieldset>
                      </div>
                    </div>
                </div>
              </div>
              <!-- // row profile -->
            </div>
            <!-- ./card body -->
          </div>

          <!-- SELECT2 EXAMPLE -->
          <div class="card card-default">
            <div class="card-header">
              <h3 class="card-title">Social Info</h3>
              <div class="card-tools">
                <button type="button" class="btn btn-tool" data-card-widget="collapse">
                  <i class="fas fa-minus"></i>
                </button>
                <button type="button" class="btn btn-tool" data-card-widget="remove">
                  <i class="fas fa-times"></i>
                </button>
              </div>
            </div>
            <div class="card-body">
              <div class="row">
                <div class="col-6">
                  <fieldset class="form-group">
                    <label><span class="fab fa-facebook"></span>&nbsp;Facebook</label>
                  </fieldset>
                  <fieldset class="form-group col-xs-9">
                    <input type="text" class="form-control" name="facebook" id="facebook" placeholder="Facebook URL">
                  </fieldset>

                  <fieldset class="form-group col-xs-3">
                    <label><span class="fab fa-twitter"></span>&nbsp;Twitter</label>
                  </fieldset>
                  <fieldset class="form-group col-xs-9">
                    <input type="text" class="form-control" name="twitter" id="twitter" placeholder="Twitter URL">
                  </fieldset>

                  <fieldset class="form-group col-xs-3">
                    <label><span class="fab fa-google-plus"></span>&nbsp;Google Plus</label>
                  </fieldset>
                  <fieldset class="form-group col-xs-9">
                    <input type="text" class="form-control" name="google" id="google" placeholder="Google Plus URL">
                  </fieldset>
                </div>
                <div class="col-6">
                  <fieldset class="form-group col-xs-3">
                    <label><span class="fas fa-linkedin"></span>&nbsp;Linkedin</label>
                  </fieldset>
                  <fieldset class="form-group col-xs-9">
                    <input type="text" class="form-control" name="linkedin" id="linkedin" placeholder="Linkedin URL">
                  </fieldset>

                  <fieldset class="form-group col-xs-3">
                    <label><span class="fab fa-youtube"></span>&nbsp;Youtube</label>
                  </fieldset>
                  <fieldset class="form-group col-xs-9">
                    <input type="text" class="form-control" name="youtube" id="youtube" placeholder="Youtube URL">
                  </fieldset>
                </div>
              </div>
            </div>
          </div>
          <!-- SUBMIT EXAMPLE -->
          <div class="card card-default">
            <div class="card-header">
              <h3 class="card-title">Action Buttons</h3>
              <div class="card-tools">
                <button type="button" class="btn btn-tool" data-card-widget="collapse">
                  <i class="fas fa-minus"></i>
                </button>
                <button type="button" class="btn btn-tool" data-card-widget="remove">
                  <i class="fas fa-times"></i>
                </button>
              </div>
            </div>
            <div class="card-body">
              <div class="row">
                <div class="col-6">&nbsp;</div>
                <div class="col-6 text-right">
                    <input class="btn btn-primary" name="submit" id="btn_submit" type="submit" value="Save Changes"/>
                </div>
              </div>
              <!-- /.row -->
            </div>
            <!-- /.card-body -->
          </div>
        <!-- /.card -->
        </div>
    </section>
    <!-- ./Main content -->
  </form>
</div>
<!-- /.content-wrapper -->

<!-- Content Wrapper. Contains post content -->
<div class="content-wrapper">
  <!-- Content Header (Post header) -->
  <section class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1>Contact us</h1>
        </div>
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="/media.php?module=dashboard">Home</a></li>
            <li class="breadcrumb-item active">Contacts</li>
          </ol>
        </div>
      </div>
    </div><!-- /.container-fluid -->
  </section>
  <!-- Main content -->
  <section class="content">
    <!-- Default box -->
    <div class="card">
      <div class="card-body row">
        <div class="col-5 text-center d-flex align-items-center justify-content-center">
          <div class="">
            <img style="background:transparent;" src="./images/tokopedia.png" width="300px" id="logo" class="centered">
            <h2 id="title">Admin<strong>LTE</strong></h2>
            <p id="email" class="lead mb-5">123 Testing Ave, Testtown, 9876 NA<br>
              Phone: +1 234 56789012
            </p>
          </div>
        </div>
        <div class="col-7">
          <form id="form_contactus" method="POST" action="./scripts/insert_contactus.php">
              <div class="form-group">
                <label for="inputName">Name</label>
                <input type="text" name="fullname" id="fullname" placeholder="Type Fullname" class="form-control" required/>
              </div>
              <div class="form-group">
                <label for="inputEmail">E-Mail</label>
                <input type="email" name="email" id="email" placeholder="Your Email Address" class="form-control" required/>
              </div>
              <div class="form-group">
                <label for="inputSubject">Subject</label>
                <input type="text" name="subject" id="subject" placeholder="Your Message Subject" class="form-control" required/>
              </div>
              <div class="form-group">
                <label for="inputMessage">Message</label>
                <textarea name="message" id="message" placeholder="Type Your Message Text" class="form-control" rows="4" required></textarea>
              </div>
              <div class="form-group">
                <input type="submit" class="btn btn-primary" value="Send message">
              </div>
          </form>
        </div>
      </div>
    </div>
  </section>
  <!-- /.content -->
</div>
<!-- /.content-wrapper -->

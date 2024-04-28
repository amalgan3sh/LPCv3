  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>KYC Registration</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">KYC Registration</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <!-- left column -->
          <div class="col-md-6">
            <!-- general form elements -->
            <div class="card card-primary">
              <div class="card-header">
                <h3 class="card-title">Upload the documents</h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              <form method="post" action="<?php echo base_url('index.php/Usercontroller/userUploadDocuments') ?>"  enctype="multipart/form-data">
                <div class="card-body">
                  <div class="form-group">
                  <label for="exampleInputFile">Drug Licence</label>
                    <div class="input-group">
                      <div class="custom-file">
                        <input type="file" class="custom-file-input"  id="drugLicence" name="drug_license">
                        <label class="custom-file-label" for="exampleInputFile">Choose file</label>
                      </div>
                      <div class="input-group-append">
                        <span class="input-group-text">Upload</span>
                      </div>
                    </div>
                  </div>
                  <div class="form-group">
                  <label for="exampleInputFile">National ID Proof</label>
                    <div class="input-group">
                      <div class="custom-file">
                        <input type="file" class="custom-file-input"  id="nationalIDProof" name="national_id_proof">
                        <label class="custom-file-label" for="exampleInputFile">Choose file</label>
                      </div>
                      <div class="input-group-append">
                        <span class="input-group-text">Upload</span>
                      </div>
                    </div>
                  </div>
                  <div class="form-group">
                    <label for="exampleInputFile">Company Incorporation Certificate</label>
                    <div class="input-group">
                      <div class="custom-file">
                        <input type="file" class="custom-file-input" id="companyIncorporation" name="company_incorporation">
                        <label class="custom-file-label" for="exampleInputFile">Choose file</label>
                      </div>
                      <div class="input-group-append">
                        <span class="input-group-text">Upload</span>
                      </div>
                    </div>
                  </div>
                  <div class="form-check">
                    <input type="checkbox" class="form-check-input" id="exampleCheck1">
                    <label class="form-check-label" for="exampleCheck1">Terms and conditions</label>
                  </div>
                </div>
                <!-- /.card-body -->
                
                <?php if ($document_exist == 1): ?>
                    <button type="button" class="btn btn-danger toastsDefaultDanger">
                        Upload Document
                    </button>
                <?php else: ?>
                    <div class="card-footer">
                        <button type="submit" class="btn btn-primary">Upload Document</button>
                    </div>
                <?php endif; ?>
              </form>
            </div>
            <!-- /.card -->
            

            </div>
            <div class="col-md-4">
                    <p class="text-center">
                      <strong>Goal Completion</strong>
                    </p>

                    <?php
                    // Assuming $kyc_registration is your array containing KYC registration data

                    $drug_license_progress = isset($kyc_registration['drug_license']) ? ($kyc_registration['drug_license'] == 1 ? 100 : 20) : 0;
                    $company_incorporation_certificate_progress = isset($kyc_registration['company_incorporation_certificate']) ? ($kyc_registration['company_incorporation_certificate'] == 1 ? 100 : 20) : 0;
                    $national_id_proof_progress = isset($kyc_registration['national_id_proof']) ? ($kyc_registration['national_id_proof'] == 1 ? 100 : 20) : 0;
                    ?>

                    <div class="progress-group">
                      Upload Drug Licence
                      <span class="float-right"><b><?= $drug_license_progress ?></b>/100</span>
                      <div class="progress progress-sm">
                        <div class="progress-bar bg-primary" style="width: <?= $drug_license_progress ?>%"></div>
                      </div>
                    </div>
                    <!-- /.progress-group -->

                    <div class="progress-group">
                      Upload National ID Proof
                      <span class="float-right"><b><?= $national_id_proof_progress ?></b>/100</span>
                      <div class="progress progress-sm">
                        <div class="progress-bar bg-danger" style="width: <?= $national_id_proof_progress ?>%"></div>
                      </div>
                    </div>

                    <!-- /.progress-group -->
                    <div class="progress-group">
                      <span class="progress-text">Upload Company Incorporation Certificate</span>
                      <span class="float-right"><b><?= $company_incorporation_certificate_progress ?></b>/100</span>
                      <div class="progress progress-sm">
                        <div class="progress-bar bg-success" style="width: <?= $company_incorporation_certificate_progress ?>%"></div>
                      </div>
                    </div>

                    <!-- /.progress-group -->
                    <div class="progress-group">
                     KYC Verification completed
                      <span class="float-right"><b>0</b>/100</span>
                      <div class="progress progress-sm">
                        <div class="progress-bar bg-warning" style="width: 0%"></div>
                      </div>
                    </div>

                    <!-- /.progress-group -->
                  </div>
                  <!-- /.col -->
                </div>
                <!-- /.row -->
              </div>
            <!-- /.card -->
          </div>
          <!--/.col (right) -->
        </div>
        <!-- /.row -->
      </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  </div>



  <!-- /.content-wrapper -->
  <footer class="main-footer">
    <div class="float-right d-none d-sm-block">
      <b>Version</b> 3.2.0
    </div>
    <strong>Copyright &copy; 2014-2021 <a href="https://adminlte.io">AdminLTE.io</a>.</strong> All rights reserved.
  </footer>

  <!-- Control Sidebar -->
  <aside class="control-sidebar control-sidebar-dark">
    <!-- Control sidebar content goes here -->
  </aside>
  <!-- /.control-sidebar -->
</div>
<!-- ./wrapper -->

<!-- jQuery -->
<script src="<?php echo base_url('assets/')?>plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap 4 -->
<script src="<?php echo base_url('assets/')?>plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- bs-custom-file-input -->
<script src="<?php echo base_url('assets/')?>plugins/bs-custom-file-input/bs-custom-file-input.min.js"></script>
<!-- AdminLTE App -->
<script src="<?php echo base_url('assets/')?>dist/js/adminlte.min.js"></script>
<!-- AdminLTE for demo purposes -->
<script src=".<?php echo base_url('assets/')?>dist/js/demo.js"></script>
<!-- Page specific script -->
<script>
$(function () {
  bsCustomFileInput.init();
});
</script>
<script>
$('.toastsDefaultDanger').click(function() {
    $(document).Toasts('create', {
        class: 'bg-danger',
        title: 'Document Verification',
        subtitle: 'Attention',
        body: 'Document already under verification. Please wait for the process to complete.'
    });
});
</script>
</body>
</html>

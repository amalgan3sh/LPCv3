
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Widgets</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Widgets</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <h5 class="mb-2">Info Box</h5>
        <div class="row">
          <div class="col-md-3 col-sm-6 col-12">
            <div class="info-box">
              <span class="info-box-icon bg-info"><i class="far fa-envelope"></i></span>

              <div class="info-box-content">
                <span class="info-box-text">Messages</span>
                <span class="info-box-number">1,410</span>
              </div>
              <!-- /.info-box-content -->
            </div>
            <!-- /.info-box -->
          </div>
          <!-- /.col -->
          <div class="col-md-3 col-sm-6 col-12">
            <div class="info-box">
              <span class="info-box-icon bg-success"><i class="far fa-flag"></i></span>

              <div class="info-box-content">
                <span class="info-box-text">Bookmarks</span>
                <span class="info-box-number">410</span>
              </div>
              <!-- /.info-box-content -->
            </div>
            <!-- /.info-box -->
          </div>
          <!-- /.col -->
          <div class="col-md-3 col-sm-6 col-12">
            <div class="info-box">
              <span class="info-box-icon bg-warning"><i class="far fa-copy"></i></span>

              <div class="info-box-content">
                <span class="info-box-text">Uploads</span>
                <span class="info-box-number">13,648</span>
              </div>
              <!-- /.info-box-content -->
            </div>
            <!-- /.info-box -->
          </div>
          <!-- /.col -->
          <div class="col-md-3 col-sm-6 col-12">
            <div class="info-box">
              <span class="info-box-icon bg-danger"><i class="far fa-star"></i></span>

              <div class="info-box-content">
                <span class="info-box-text">Likes</span>
                <span class="info-box-number">93,139</span>
              </div>
              <!-- /.info-box-content -->
            </div>
            <!-- /.info-box -->
          </div>
          <!-- /.col -->
        </div>
        <!-- /.row -->

   

        <h5 class="mb-2">Documents</h5>
        <div class="card card-success">
          <div class="card-body">
          <div class="row">
            <div class="col-md-12 col-lg-6 col-xl-4">
            <a href="<?php echo ($user_documents[0]['company_incorporation_certificate'] !== null) ? base_url('assets/KYC_Documents/'.$user_documents[0]['company_incorporation_certificate']) : '#' ?>">
                <div class="card mb-2 bg-gradient-dark">
                    <img class="card-img-top" src="<?php echo base_url('assets/')?>dist/img/company_incorporation_certificate.png" alt="Dist Photo 1">
                    <?php if (isset($user_documents[0]['company_incorporation_certificate'])): ?>
                    <?php if ($user_documents[0]['company_incorporation_certificate'] === null): ?>
                        <div class="ribbon-wrapper ribbon-xl">
                            <div class="ribbon bg-danger text-xl">
                                Not Uploaded
                            </div>
                        </div>
                    <?php else: ?>
                        <div class="ribbon-wrapper ribbon-xl">
                            <div class="ribbon bg-warning text-xl">
                                Pending
                            </div>
                        </div>
                    <?php endif; ?>
                    <?php else: ?>
                        <div class="ribbon-wrapper ribbon-xl">
                            <div class="ribbon bg-danger text-xl">
                                Not Uploaded
                            </div>
                        </div>
                    <?php endif; ?>

                    <div class="card-img-overlay d-flex flex-column justify-content-end">
                    <h5 class="card-title text-primary text-white"></h5>
                    </div>
                </div>
                </a>
            </div>
            <div class="col-md-12 col-lg-6 col-xl-4">
            <a href="<?php echo ($user_documents[0]['drug_license'] !== null) ? base_url('assets/KYC_Documents/'.$user_documents[0]['drug_license']) : '#' ?>">
                <div class="card mb-2 bg-gradient-dark">
                    <img class="card-img-top" src="<?php echo base_url('assets/')?>dist/img/drug_license.png" alt="Dist Photo 1">
                    <?php if (isset($user_documents[0]['drug_license'])): ?>
                    <?php if ($user_documents[0]['drug_license'] === null): ?>
                        <div class="ribbon-wrapper ribbon-xl">
                            <div class="ribbon bg-danger text-xl">
                                Not Uploaded
                            </div>
                        </div>
                    <?php else: ?>
                        <div class="ribbon-wrapper ribbon-xl">
                            <div class="ribbon bg-warning text-xl">
                                Pending
                            </div>
                        </div>
                    <?php endif; ?>
                    <?php else: ?>
                        <div class="ribbon-wrapper ribbon-xl">
                            <div class="ribbon bg-danger text-xl">
                                Not Uploaded
                            </div>
                        </div>
                    <?php endif; ?>
                    <div class="card-img-overlay d-flex flex-column justify-content-end">
                    <h5 class="card-title text-primary text-white"></h5>
                    </div>
                </div>
                </a>
            </div>

            <div class="col-md-12 col-lg-6 col-xl-4">
            <a href="<?php echo ($user_documents[0]['national_id_proof'] !== null) ? base_url('assets/KYC_Documents/'.$user_documents[0]['national_id_proof']) : '#' ?>">
                <div class="card mb-2 bg-gradient-dark">
                <img class="card-img-top" src="<?php echo base_url('assets/')?>dist/img/national_id_proof.jpg" alt="Dist Photo 1">
                <?php if (isset($user_documents[0]['national_id_proof'])): ?>
                    <?php if ($user_documents[0]['national_id_proof'] === null): ?>
                        <div class="ribbon-wrapper ribbon-xl">
                            <div class="ribbon bg-danger text-xl">
                                Not Uploaded
                            </div>
                        </div>
                    <?php else: ?>
                        <div class="ribbon-wrapper ribbon-xl">
                            <div class="ribbon bg-warning text-xl">
                                Pending
                            </div>
                        </div>
                    <?php endif; ?>
                    <?php else: ?>
                        <div class="ribbon-wrapper ribbon-xl">
                            <div class="ribbon bg-danger text-xl">
                                Not Uploaded
                            </div>
                        </div>
                    <?php endif; ?>
                <div class="card-img-overlay d-flex flex-column justify-content-end">
                    <h5 class="card-title text-primary text-white"></h5>
                </div>
                </div>
            </a>
            </div>

</div>

              
              </div>
            </div>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->

    <a id="back-to-top" href="#" class="btn btn-primary back-to-top" role="button" aria-label="Scroll to top">
      <i class="fas fa-chevron-up"></i>
    </a>
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
<!-- AdminLTE App -->
<script src="<?php echo base_url('assets/')?>dist/js/adminlte.min.js"></script>
<!-- AdminLTE for demo purposes -->
</body>
</html>



  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Projects</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Inquiry</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">

      <!-- Default box -->
      <div class="card">
        <div class="card-header">
          <h3 class="card-title">Product Inquiry</h3>

          <div class="card-tools">
            <button type="button" class="btn btn-tool" data-card-widget="collapse" title="Collapse">
              <i class="fas fa-minus"></i>
            </button>
            <button type="button" class="btn btn-tool" data-card-widget="remove" title="Remove">
              <i class="fas fa-times"></i>
            </button>
          </div>
        </div>
        <div class="card-body p-0">
          <table class="table table-striped projects">
              <thead>
                  <tr>
                      <th style="width: 1%">
                          #
                      </th>
                      <th style="width: 20%">
                          User
                      </th>
                      <th style="width: 20%">
                          Product Name
                      </th>
                      <th style="width: 30%">
                          Photo
                      </th>
                      <th>
                          Comments
                      </th>
                      <th style="width: 8%" class="text-center">
                          Status
                      </th>
                      <th style="width: 20%">
                      </th>
                  </tr>
              </thead>
              <tbody>
                  
              <?php foreach ($inquiry as $row): ?>

                  <tr>
                      <td>
                          #
                      </td>
                      <td>
                          <a>
                          <?php echo $row['firstname'].' '.$row['lastname']; ?>
                          </a>
                          <br/>
                          <small>
                          <?php echo $row['cname']; ?>
                          </small>
                      </td>
                      <td>
                          <a>
                          <?php echo $row['product_name']; ?>
                          </a>
                          <br/>
                          <small>
                          <?php echo $row['quantity']; ?>
                          </small>
                      </td>
                      <td>
                          <ul class="list-inline">
                              <li class="list-inline-item">
                                  <img alt="Sample Photo" class="table-avatar" src="<?php echo base_url('assets/product_inquiry_images/').$row['sample_photo']; ?>">
                              </li>

                          </ul>
                      </td>
                      <td class="project_progress">

                          </div>
                          <small>
                          <?php echo $row['comments']; ?>
                          </small>
                      </td>
                      <td class="project-state">
                          <span class="badge badge-warning"><?php echo $row['status']; ?></span>
                      </td>
                      <td class="project-actions text-right">
                          <div class="btn-group">
                                            <button type="button" class="btn btn-primary btn-sm dropdown-toggle" data-toggle="dropdown">
                                                Action
                                            </button>
                                            <div class="dropdown-menu">
                                                
                                                <a class="dropdown-item" href="<?php echo base_url('index.php/Admincontroller/updateStatus?inquiry_id='.$row['inquiry_id']).'&status=updateKyc' ?>"> UPDATE YOUR KYC VERIFICATION</a>
                                                <a class="dropdown-item" href="<?php echo base_url('index.php/Admincontroller/updateStatus?inquiry_id='.$row['inquiry_id']).'&status=productNotAvailable' ?>"> WE DON'T HAVE THIS PRODUCT RIGHT NOW. THANK YOU FOR CHOOSING LAKSHMI</a>
                                                <a class="dropdown-item" href="<?php echo base_url('index.php/Admincontroller/updateStatus?inquiry_id='.$row['inquiry_id']).'&status=thankYou' ?>"> THANK YOU CHOOSING LAKSHMIPHARMACEUTICALS</a>
                                                <a class="dropdown-item" href="<?php echo base_url('index.php/Admincontroller/updateStatus?inquiry_id='.$row['inquiry_id']).'&status=contactYouSoon' ?>"> OUR TEAM CONTACT SOON</a>
                                                <a class="dropdown-item" href="<?php echo base_url('index.php/Admincontroller/updateStatus?inquiry_id='.$row['inquiry_id']).'&status=queryCreatedSuccesfully' ?>"> YOUR QUERY SUCCESSFULLY CREATED</a>
                                                <a class="dropdown-item" href="<?php echo base_url('index.php/Admincontroller/updateStatus?inquiry_id='.$row['inquiry_id']).'&status=onProcessOfDocumentation' ?>"> ON THE PROCESS OF DOCUMENTATION</a>
                                                <a class="dropdown-item" href="<?php echo base_url('index.php/Admincontroller/updateStatus?inquiry_id='.$row['inquiry_id']).'&status=processOfVerification' ?>"> ON THE PROCESS OF VERIFICATION</a>
                                                <a class="dropdown-item" href="<?php echo base_url('index.php/Admincontroller/updateStatus?inquiry_id='.$row['inquiry_id']).'&status=queryOnTheProcess' ?>"> YOUR QUREY ON THE PROCESS</a>
                                            </div>
                                        </div>
                        </td>
                      <td class="project-actions text-right">
                          <a class="btn btn-primary btn-sm" href="<?php echo base_url('index.php/Admincontroller/productInquiryDetails?inquiry_id='.$row['inquiry_id']) ?>">
                              <i class="fas fa-folder">
                              </i>
                              View
                          </a>
                          <a class="btn btn-success btn-sm" href="<?php echo base_url('index.php/Admincontroller/approveProduct?inquiry_id='.$row['inquiry_id']) ?>">
                              <i class="fas fa-pencil-alt">
                              </i>
                              Approve
                          </a>
                          <a class="btn btn-danger btn-sm" href="<?php echo base_url('index.php/Admincontroller/rejectProduct?inquiry_id='.$row['inquiry_id']) ?>">
                              <i class="fas fa-trash">
                              </i>
                              Reject
                          </a>
                      </td>
                  </tr>
                  <?php endforeach; ?>
              </tbody>
          </table>
        </div>
        <!-- /.card-body -->
      </div>
      <!-- /.card -->

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
<!-- AdminLTE App -->
<script src="<?php echo base_url('assets/')?>dist/js/adminlte.min.js"></script>
<!-- AdminLTE for demo purposes -->
</body>
</html>

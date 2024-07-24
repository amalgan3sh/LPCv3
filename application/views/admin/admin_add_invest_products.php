

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Advanced Form</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Add Product</li>
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
            <h3 class="card-title">Enter the details</h3>

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
          <div class="card-body">
            
          <div class="row">
    <div class="col-md-12">
        <div class="card card-default">
            <div class="card-body p-0">
                <form method="post" action="<?php echo site_url('index.php/Admincontroller/AdminInsertInvestProduct'); ?>" enctype="multipart/form-data">
                   
                        
                        <div class="">
                            <!-- your steps content here -->
                            <div  class="content" role="tabpanel" aria-labelledby="logins-part-trigger">
                                <div class="form-group ml-2 mt-2 mr-2">
                                    <label for="product_name">Product Name</label>
                                    <input type="text" class="form-control" id="product_name" name="product_name" placeholder="Enter Product Name" required>
                                </div>
                                <div class="form-group ml-2 mt-2 mr-2">
                                    <label for="content">Content</label>
                                    <input type="text" class="form-control" id="content" name="lastname" placeholder="Enter Product content" required>
                                </div>
                                <div class="form-group">
                                    <label for="dosage_form">Dosage Form</label>
                                    <select class="form-control" id="dosage_form" name="dosage_form" required>
                                      <option value="" disabled selected>Select Dosage Form</option>
                                      <?php foreach ($dosage_form as $row): ?>
                                        <option value="<?php echo $row['dosage_name']; ?>"><?php echo $row['dosage_name']; ?></option>
                                      <?php endforeach; ?>
                                    </select>
                                </div>
                                <div class="form-group ml-2 mt-2 mr-2">
                                    <label for="strength">Strength</label>
                                    <input type="text" class="form-control" id="strength" name="strength" placeholder="Enter Strength" required>
                                </div>
                                <div class="form-group ml-2 mt-2 mr-2">
                                    <label for="therapeutic_use">Therapeutic Use</label>
                                    <input type="text" class="form-control" id="therapeutic_use" name="therapeutic_use" placeholder="Enter Therapeutic Use" required>
                                </div>
                                <div class="form-group ml-2 mt-2 mr-2">
                                    <label for="tab_shape_and_color">Tab Shape and Color</label>
                                    <input type="text" class="form-control" id="tab_shape_and_color" name="tab_shape_and_color" placeholder="Enter Tab Shape and Color" required>
                                </div>
                                <div class="form-group ml-2 mt-2 mr-2">
                                    <label for="packaging">Packaging</label>
                                    <input type="text" class="form-control" id="packaging" name="packaging" placeholder="Enter Packaging" required>
                                </div>
                                <div class="form-group ml-2 mt-2 mr-2">
                                    <label for="batch_number">Batch Number</label>
                                    <input type="text" class="form-control" id="batch_number" name="batch_number" placeholder="Enter Batch Number" required>
                                </div>
                                <div class="form-group ml-2 mt-2 mr-2">
                                    <label for="manufacturing_date">Manufacturing Date</label>
                                    <input type="date" class="form-control" id="manufacturing_date" name="manufacturing_date" placeholder="Enter Manufacturing Date" required>
                                </div>
                                <div class="form-group ml-2 mt-2 mr-2">
                                    <label for="expiry_date">Expiriy Date</label>
                                    <input type="date" class="form-control" id="expiry_date" name="expiry_date" placeholder="Enter Expiry Date" required>
                                </div>
                                
                                <div class="form-group ml-2 mt-2 mr-2">
                                    <label for="unit_size">Unit Size</label>
                                    <input type="text" class="form-control" id="unit_size" name="unit_size" placeholder="Enter Unit Size" required>
                                </div>
                                <div class="form-group">
                                <label for="exampleInputFile">Product Image</label>
                                <div class="custom-file">
                                    <input type="file" class="custom-file-input" id="product_image" name="product_image"  >
                                    <label class="custom-file-label" for="exampleInputFile">Choose file</label>
                                  </div>
                              </div>
                                
                                <button type="submit" class="btn btn-primary">Add</button>
                                                          </div>
                            

                        </div>
                   
                </form>
            </div>
            <!-- /.card-body -->

        </div>
        <!-- /.card -->
    </div>
</div>


      </div>
      <!-- /.container-fluid -->
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
<!-- Select2 -->
<script src="<?php echo base_url('assets/')?>plugins/select2/js/select2.full.min.js"></script>
<!-- Bootstrap4 Duallistbox -->
<script src="<?php echo base_url('assets/')?>plugins/bootstrap4-duallistbox/jquery.bootstrap-duallistbox.min.js"></script>
<!-- InputMask -->
<script src="<?php echo base_url('assets/')?>plugins/moment/moment.min.js"></script>
<script src="<?php echo base_url('assets/')?>plugins/inputmask/jquery.inputmask.min.js"></script>
<!-- date-range-picker -->
<script src="<?php echo base_url('assets/')?>plugins/daterangepicker/daterangepicker.js"></script>
<!-- bootstrap color picker -->
<script src="<?php echo base_url('assets/')?>plugins/bootstrap-colorpicker/js/bootstrap-colorpicker.min.js"></script>
<!-- Tempusdominus Bootstrap 4 -->
<script src="<?php echo base_url('assets/')?>plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js"></script>
<!-- Bootstrap Switch -->
<script src="<?php echo base_url('assets/')?>plugins/bootstrap-switch/js/bootstrap-switch.min.js"></script>
<!-- BS-Stepper -->
<script src="<?php echo base_url('assets/')?>plugins/bs-stepper/js/bs-stepper.min.js"></script>
<!-- dropzonejs -->
<script src="<?php echo base_url('assets/')?>plugins/dropzone/min/dropzone.min.js"></script>
<!-- AdminLTE App -->
<script src="<?php echo base_url('assets/')?>dist/js/adminlte.min.js"></script>
<script src="<?php echo base_url('assets/')?>plugins/sweetalert2/sweetalert2.min.js"></script>
<!-- Toastr -->
<script src="<?php echo base_url('assets/')?>plugins/toastr/toastr.min.js"></script>
  <script src="<?php echo base_url('assets/')?>plugins/bs-custom-file-input/bs-custom-file-input.min.js"></script>
  <script>
$(function () {
  bsCustomFileInput.init();
});
</script>   
<?php if ($this->session->flashdata('success')): ?>
    toastr.success('<?php echo $this->session->flashdata("success"); ?>');
<?php endif; ?>
</script>
<!-- AdminLTE for demo purposes -->
<!-- Page specific script -->
<script>
</script>
</body>
</html>

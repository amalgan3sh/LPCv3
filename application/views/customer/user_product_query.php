
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Product Inquiry</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Product Inquiry</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="row">
        <div class="col-md-6">
          <div class="card card-primary">
            <div class="card-header">
              <h3 class="card-title">General</h3>

              <div class="card-tools">
                <button type="button" class="btn btn-tool" data-card-widget="collapse" title="Collapse">
                  <i class="fas fa-minus"></i>
                </button>
              </div>
            </div>
            <form method="post" action="<?php echo base_url('index.php/Usercontroller/userAddProductQuery') ?>"  enctype="multipart/form-data">

            <div class="card-body">
                  <div class="form-group">
                    <label for="exampleInputEmail1">Product Name</label>
                    <input type="name" required name="product_name" class="form-control" id="product_name" placeholder="Enter Product Name">
                  </div>
                  <div class="form-group">
                    <label for="category">Category</label>
                    <select id="drug_category" name="drug_category" class="custom-select" required>
                        <option value="" disabled selected>Select a drug category</option>
                        <?php foreach ($categories as $category) : ?>
                            <option value="<?php echo $category['id']; ?>"><?php echo $category['name']; ?></option>
                        <?php endforeach; ?>
                    </select>
                </div>
                <div class="form-group">
                    <label for="dosage_from">Dosage from</label>
                    <select id="dosage_from" name="dosage_from" class="custom-select" required>
                        <option value="" disabled selected>Select dosage from</option>
                        <?php foreach ($dosage_from as $dosage) : ?>
                            <option value="<?php echo $dosage['dosage_id']; ?>"><?php echo $dosage['dosage_name']; ?></option>
                        <?php endforeach; ?>
                    </select>
                </div>
                <div class="form-group">
                    <label for="exampleInputEmail1">Packing Size</label>
                    <input type="name" name="packing_size" class="form-control" id="packing_size" placeholder="Enter packing size" required>
                  </div>
                  <div class="form-group">
                    <label for="exampleInputEmail1">Pharmacopeia</label>
                    <input type="name" name="pharmacopeia" class="form-control" id="pharmacopeia" placeholder="Enter pharmacopeia" required>
                  </div>
            </div>
            <!-- /.card-body -->
          </div>
          <!-- /.card -->
        </div>
        <div class="col-md-6">
          <div class="card card-secondary">
            <div class="card-header">
              <h3 class="card-title">More info</h3>

              <div class="card-tools">
                <button type="button" class="btn btn-tool" data-card-widget="collapse" title="Collapse">
                  <i class="fas fa-minus"></i>
                </button>
              </div>
            </div>
            <div class="card-body">
              <div class="form-group">
                <label for="inputEstimatedBudget">Sample photo</label>
                <input type="file" name = "sample_photo" id="sample_photo" class="form-control">
              </div>
              <div class="form-group">
                <label for="inputSpentBudget">Quantity</label>
                <input type="number" name ="quantity" placeholder = "Enter quantity" id="inputSpentBudget" class="form-control">
              </div>
              <div class="form-group">
                <label>Comments</label>
                <textarea class="form-control" name="comments" rows="3" placeholder="Enter comments"></textarea>
              </div>
              <div class="form-group">
                <label for="inputEstimatedDuration">Estimated Date you need this product</label>
                <div class="input-group date" id="reservationdate" data-target-input="nearest">
                        <input type="date" name = "estimate_date" class="form-control datetimepicker-input" data-target="#reservationdate"/>
                        <div class="input-group-append" data-target="#reservationdate" data-toggle="datetimepicker">
                            <div class="input-group-text"><i class="fa fa-calendar"></i></div>
                        </div>
                    </div>
              </div>
            </div>
            <!-- /.card-body -->
          </div>
          <!-- /.card -->
        </div>
      </div>
      <div class="row">
        <div class="col-12">
          <a href="#" class="btn btn-secondary">Cancel</a>
          <input type="submit" value="Submit the details" class="btn btn-success float-right">
        </div>
      </div>
</form>
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



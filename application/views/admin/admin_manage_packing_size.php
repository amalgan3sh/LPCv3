

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Packing Size</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Packing Size</li>
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
            </div>
          </div>
          <!-- /.card-header -->
          <div class="card-body">
            
          <div class="row">
    <div class="col-md-12">
        <div class="card card-default">
            <div class="card-body p-0">
                <form method="post" action="<?php echo site_url('index.php/Admincontroller/addPackingSize'); ?>" enctype="multipart/form-data">
                    <div class="bs-stepper">
                        <div class="bs-stepper-header" role="tablist">
                            <!-- your steps here -->
                            <div class="step" data-target="#logins-part">
                                <button type="button" class="step-trigger" role="tab" aria-controls="logins-part" id="logins-part-trigger">
                                    <span class="bs-stepper-circle">1</span>
                                    <span class="bs-stepper-label">Basic information</span>
                                </button>
                            </div>
                            
                        </div>
                        <div class="bs-stepper-content">
                            <!-- your steps content here -->
                            <div id="logins-part" class="content" role="tabpanel" aria-labelledby="logins-part-trigger">
                                <div class="form-group">
                                    <label for="category_name">Packing Size</label>
                                    <input type="text" class="form-control" id="packing_size" name="packing_size" placeholder="Enter Packing Size" required>
                                </div>

                                <button type="submit" class="btn btn-primary">Submit</button>

                            </div>
                        </div>
                    </div>
                </form>
            </div>
            <!-- /.card-body -->

        </div>
        <!-- /.card -->

        <div class="card">
              <div class="card-header">
                <h3 class="card-title">Packing Size</h3>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <table id="example1" class="table table-bordered table-striped">
                  <thead>
                  <tr>
                    <th>ID</th>
                    <th>Packing Size</th>
                    <th></th>
                  </tr>
                  </thead>
                  <tbody>
                  <?php foreach ($packing_size as $row): ?>
                  <tr>
                    <td><?php echo $row->packing_id; ?></td>
                    <td><?php echo $row->packing_size; ?></td>
                    <td><a href="<?php echo base_url('index.php/Admincontroller/deletePackingSize?packing_id='.$row->packing_id); ?>" class="btn btn-block btn-danger btn-sm">Delete</a></td>
                  </tr>
                  <?php endforeach; ?>
                  
                  </tfoot>
                </table>
              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->
          </div>
          <!-- /.col -->
        </div>
    </div>
</div>


      </div>
      <!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->

 
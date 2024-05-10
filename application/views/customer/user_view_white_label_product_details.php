

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>E-commerce</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Product View</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">

      <!-- Default box -->
      <div class="card card-solid">
        <div class="card-body">
          <div class="row">
            <div class="col-12 col-sm-6">
              <h3 class="d-inline-block d-sm-none">LOWA Men’s Renegade GTX Mid Hiking Boots Review</h3>
              <div class="col-12">
                <img src="<?php echo base_url('assets/white_label_products/images/brocef_image.png')?>" class="product-image" alt="Product Image">
              </div>
              <div class="col-12 product-image-thumbs">
                <div class="product-image-thumb active"><img src="<?php echo base_url('assets/white_label_products/images/brocef_image.png')?>" alt="Product Image"></div>
                <div class="product-image-thumb" ><img src="<?php echo base_url('assets/white_label_products/images/brocef_image_2.png')?>" alt="Product Image"></div>
                <div class="product-image-thumb" ><img src="<?php echo base_url('assets/white_label_products/images/brocef_image_3.png')?>" alt="Product Image"></div>
                <div class="product-image-thumb" ><img src="<?php echo base_url('assets/white_label_products/images/brocef_image_4.png')?>" alt="Product Image"></div>
                <div class="product-image-thumb" ><img src="<?php echo base_url('assets/white_label_products/images/brocef_image_5.png')?>" alt="Product Image"></div>
              </div>
            </div>
            <div class="col-12 col-sm-6">
              <h3 class="my-3"><?php echo $product_details->product_name; ?></h3>
              <p><?php echo $product_details->therapeutic_use; ?></p>

              <hr>
              <h3>DETAILS:</h3>
              <div class="btn-group btn-group-toggle" data-toggle="buttons">
                <h4><?php echo $product_details->product_description; ?></h4>
              </div>
              

              <h4 class="mt-3">Content: <small></small></h4>
              <div class="btn-group btn-group-toggle" data-toggle="buttons">
                <h4><?php echo $product_details->content; ?></h4>

              </div>
              <h4 class="mt-3">Dosage Form: <small></small></h4>
              <div class="btn-group btn-group-toggle" data-toggle="buttons">
                <h4><?php echo $product_details->dosage_form; ?></h4>

              </div>
              <h4 class="mt-3">Strength: <small></small></h4>
              <div class="btn-group btn-group-toggle" data-toggle="buttons">
                <h4><?php echo $product_details->strength; ?></h4>

              </div>

              <div class="bg-gray py-2 px-3 mt-4">
                <h2 class="mb-0">
                  $80.00
                </h2>
                <h4 class="mt-0">
                  <small>Ex Tax: $80.00 </small>
                </h4>
              </div>

              <div class="mt-4">
                <div class="btn btn-primary btn-lg btn-flat">
                  <i class="fas fa-cart-plus fa-lg mr-2"></i>
                  Add to Cart
                </div>

                <div class="btn btn-default btn-lg btn-flat">
                  <i class="fas fa-heart fa-lg mr-2"></i>
                  Add to Wishlist
                </div>
              </div>

              <div class="mt-4 product-share">
                <a href="#" class="text-gray">
                  <i class="fab fa-facebook-square fa-2x"></i>
                </a>
                <a href="#" class="text-gray">
                  <i class="fab fa-twitter-square fa-2x"></i>
                </a>
                <a href="#" class="text-gray">
                  <i class="fas fa-envelope-square fa-2x"></i>
                </a>
                <a href="#" class="text-gray">
                  <i class="fas fa-rss-square fa-2x"></i>
                </a>
              </div>

            </div>
          </div>
          
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
<script>
  $(document).ready(function() {
    $('.product-image-thumb').on('click', function () {
      var $image_element = $(this).find('img')
      $('.product-image').prop('src', $image_element.attr('src'))
      $('.product-image-thumb.active').removeClass('active')
      $(this).addClass('active')
    })
  })
</script>
</body>
</html>

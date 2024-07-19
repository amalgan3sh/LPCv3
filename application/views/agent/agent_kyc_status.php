<style>
    .info-banner {
      background-color: #cce5ff; /* Light red background */
      color: #004085; /* Dark red text */
      padding: 15px;
      text-align: center;
      font-weight: bold;
      border: 1px solid #b8daff; /* Dark red border */
    }
  </style>
  
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>KYC Status</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">KYC Status</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <!-- <h5 class="mb-2">Info Box</h5> -->
        <!-- <div class="row">
          <div class="col-md-3 col-sm-6 col-12">
            <div class="info-box">
              <span class="info-box-icon bg-info"><i class="far fa-envelope"></i></span>

              <div class="info-box-content">
                <span class="info-box-text">Messages</span>
                <span class="info-box-number">1,410</span>
              </div> -->
              <!-- /.info-box-content -->
            <!-- </div> -->
            <!-- /.info-box -->
          <!-- </div> -->
          <!-- /.col -->
          <!-- <div class="col-md-3 col-sm-6 col-12">
            <div class="info-box">
              <span class="info-box-icon bg-success"><i class="far fa-flag"></i></span>

              <div class="info-box-content">
                <span class="info-box-text">Bookmarks</span>
                <span class="info-box-number">410</span>
              </div> -->
              <!-- /.info-box-content -->
            <!-- </div> -->
            <!-- /.info-box -->
          <!-- </div> -->
          <!-- /.col -->
          <!-- <div class="col-md-3 col-sm-6 col-12">
            <div class="info-box">
              <span class="info-box-icon bg-warning"><i class="far fa-copy"></i></span>

              <div class="info-box-content">
                <span class="info-box-text">Uploads</span>
                <span class="info-box-number">13,648</span>
              </div> -->
              <!-- /.info-box-content -->
            <!-- </div> -->
            <!-- /.info-box -->
          <!-- </div> -->
          <!-- /.col -->
          <!-- <div class="col-md-3 col-sm-6 col-12">
            <div class="info-box">
              <span class="info-box-icon bg-danger"><i class="far fa-star"></i></span>

              <div class="info-box-content">
                <span class="info-box-text">Likes</span>
                <span class="info-box-number">93,139</span>
              </div> -->
              <!-- /.info-box-content -->
            <!-- </div> -->
            <!-- /.info-box -->
          <!-- </div> -->
          <!-- /.col -->
        <!-- </div> -->
        <!-- /.row -->

   

        <h5 class="mb-2">Documents</h5>
        <div class="card card-success">
          <div class="card-body">
          <?php  if( isset($user_documents) && count($user_documents) > 0){ ?>
              <div class="row">
               
               
                        <?php 
                         $doc_details = explode('.', $user_documents[0]['national_id_proof']);
                         $id_extension = end($doc_details);  
                         if($id_extension == 'pdf') { 
                          $pdf_doc_name = explode('_',$user_documents[0]['national_id_proof'],3);
                          ?>
                           <div class="col-sm-2">
                  
                          <div class=" mb-2 ">
                         <p class="mt-3"><a href="<?php echo base_url('assets/KYC_Documents/'.$user_documents[0]['national_id_proof']) ?>" target="_blank">  <i class="fas fa-file-pdf mt-3" style="font-size: 100px;"></i><br></a><?php  echo $pdf_doc_name[2]; ?></p>

                         <?php } else { ?>
                          <div class="col-sm-3">
                  
                  <div class=" mb-2 ">
                          <img class="img-fluid" src="<?php echo base_url('assets/KYC_Documents/'.$user_documents[0]['national_id_proof']) ?>" alt="Dist Photo 1">

                        <?php }
                        ?>
                      </div>
                </div>
                <?php if( isset($user_documents[0]['other_documents']) && $user_documents[0]['other_documents'] != ''){ ?>
                  <?php $other_documents = explode('|',$user_documents[0]['other_documents']); ?>
                  <?php 
                  foreach($other_documents as $doc_info) {
                    $parts = explode('.', $doc_info);
                    $extension = end($parts); ?>
                    
                    <?php if($extension == 'pdf'){ 
                      $doc_name = explode('_',$doc_info,3);?>
                      <div class="col-sm-2">
                      <p><a href="<?php echo base_url('assets/KYC_Documents/'.$doc_info) ?>" target="_blank">  <i class="fas fa-file-pdf mt-4" style="font-size: 100px;"></i><br></a><?php  echo $doc_name[2]; ?></p>
                    </div>
                    <?php  }else {
                      
                       ?>
                       <div class="col-sm-3">
                      <img class="img-fluid mb-3" src="<?php echo base_url('assets/KYC_Documents/'.$doc_info) ?>" alt="Photo">
                      </div>
                     
                   <?php } ?>
                  
                 <?php }
                  ?>
                <?php } 
                ?>
              
              </div>
                <?php  } else  {?>
                  <div class="info info-banner">Kindly upload  the documents required for KYC Registration first</div>
                <?php } ?>
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

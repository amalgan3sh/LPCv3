<?php
$daysAgo = '';
if($kyc_details['added_date'] != null && $kyc_details['added_date'] != '') {
  $givenDate = new DateTime($kyc_details['added_date'].' '.$kyc_details['added_time']);

  $currentDate = new DateTime();

  // Calculate the difference
  $interval = $currentDate->diff($givenDate);

  // Get the number of days
  // $daysAgo = $interval->days;
  if ($interval->days === 0) {
    // If the difference is in days, calculate the difference in minutes
    $minutesAgo = ($currentDate->getTimestamp() - $givenDate->getTimestamp()) / 60;
    $minutesAgo = floor($minutesAgo);
    $daysAgo =  "Uploaded documents  (".$minutesAgo.") minutes ago" ;
  } else {
    // If the difference is not in days (i.e., not today), just show days
    $daysAgo =  "Uploaded documents  (".$interval->days.") days ago";
  }
}

?>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Profile</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">User Profile</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-md-3">

            <!-- Profile Image -->
            <div class="card card-primary card-outline">
              <div class="card-body box-profile">
                <div class="text-center">
                  <!-- Form for profile picture upload -->
                  <?php $image_avatar = "user4-128x128.jpg"; ?>
      <form id="upload-form" action="<?php echo site_url('index.php/UserController/uploadProfilePicture'); ?>" method="post" enctype="multipart/form-data">
    <input type="file" name="profile_picture" id="profile-picture-upload" style="display: none;" onchange="submitForm()">
    <label for="profile-picture-upload">
        <img id="profile-picture" class="profile-user-img img-fluid img-circle"
             src="<?php echo base_url('assets/')?>/dist/img/<?php  if($user_data['profile_photo'] != '' && $user_data['profile_photo'] != null) {  echo $user_data['profile_photo']; }else {echo $image_avatar;} ?>"
             alt="User profile picture">
    </label>
</form>
                </div>


                <h3 class="profile-username text-center"><?php echo ($user_data['firstname'].' '.$user_data['lastname']) ?></h3>

                <p class="text-muted text-center"><?php echo $user_data['designation'] ?></p>

                <ul class="list-group list-group-unbordered mb-3">
                  <li class="list-group-item">
                    <b>Mobile</b> <a class="float-right"><?php echo $user_data['mobile'] ?></a>
                  </li>
                  <li class="list-group-item">
                    <b>Email</b> <a class="float-right"><?php echo $user_data['email'] ?></a>
                  </li>
                  <li class="list-group-item">
                    <b>Friends</b> <a class="float-right">13,287</a>
                  </li>
                </ul>

                <!-- <a href="#" class="btn btn-primary btn-block"><b>Follow</b></a> -->
              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->

            <!-- About Me Box -->
            <div class="card card-primary">
              <div class="card-header">
                <h3 class="card-title">About Me</h3>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <strong><i class="fas fa-book mr-1"></i> Company Name</strong>

                <p class="text-muted">
                  <?php echo $user_data['cname'] ?>
                </p>

                <hr>

                <strong><i class="fas fa-briefcase mr-1"></i> Designation</strong>

                <p class="text-muted"><?php echo $user_data['designation'] ?></p>

                <hr>

                <strong><i class="fas fa-map-marker-alt mr-1"></i> Address</strong>

                <p class="text-muted">
                  <span class="tag tag-danger"><?php echo $user_data['address'] ?></span>
                </p>

                <hr>

                <strong><i class="fas fa-globe mr-1"></i> Import Country</strong>

                <p class="text-muted"><?php echo $user_data['import'] ?></p>
              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->
          </div>
          <!-- /.col -->
          <div class="col-md-9">
            <div class="card">
              <div class="card-header p-2">
                <ul class="nav nav-pills">
                <li class="nav-item"><a class="nav-link active" href="#activity" data-toggle="tab">Activity</a></li>

                  <li class="nav-item"><a class="nav-link" href="#timeline" data-toggle="tab">Timeline</a></li>
                  <li class="nav-item"><a class="nav-link" href="#settings" data-toggle="tab">Settings</a></li>
                  <li class="nav-item"><a class="nav-link" href="#bank_details" data-toggle="tab">Bank Details</a></li>
                </ul>
              </div><!-- /.card-header -->
              <div class="card-body">
                <div class="tab-content">

                <div class="active tab-pane" id="activity">
                   

                    <!-- Post -->
                    <div class="post">
                      <div class="user-block">
                        <img class="img-circle img-bordered-sm" src="<?php echo base_url('assets/')?>dist/img/user6-128x128.jpg" alt="User Image">
                        <span class="username">
                          <a href="#"><?php echo ($user_data['firstname'].' '.$user_data['lastname']) ?></a>
                          <a href="#" class="float-right btn-tool"><i class="fas fa-times"></i></a>
                        </span>
                        <span class="description"><?php echo $daysAgo; ?></span>
                      </div>
                      <!-- /.user-block -->
                      <?php if (!empty($user_documents) && isset($user_documents[0])): ?>
                          <div class="row mb-3">
                          <?php 
                              $doc_details = explode('.', $user_documents[0]['national_id_proof']);
                              $id_extension = end($doc_details); 
                              if($id_extension == 'pdf') { 
                                  $pdf_doc_name = explode('_',$user_documents[0]['national_id_proof'],3);  ?>
                                <div class="col-sm-3">
                                  <p class="mt-3">
                                      <a href="<?php echo base_url('assets/KYC_Documents/'.$user_documents[0]['national_id_proof']) ?>" target="_blank">  <i class="fas fa-file-pdf mt-3" style="font-size: 100px;"></i><br></a>
                                      <?php  echo $pdf_doc_name[2]; ?>
                                  </p>
                                </div>
                          <?php } else { ?> 
                                <div class="col-sm-4">
                                    <img class="img-fluid mb-3" src="<?php echo base_url('assets/KYC_Documents/'.$user_documents[0]['national_id_proof']) ?>" alt="Photo">
                                </div>
                          <?php } ?>
                          
                          
                          <?php if(isset($user_documents[0]['other_documents']) && $user_documents[0]['other_documents'] != ''){ ?>
                            <?php $other_documents = explode('|',$user_documents[0]['other_documents']);
                            foreach($other_documents as $doc_info) {
                              $parts = explode('.', $doc_info);
                              $extension = end($parts); ?>
                              
                                <?php if($extension != 'pdf'){ ?>
                                  <div class="col-sm-4">
                                  <img class="img-fluid mb-3" src="<?php echo base_url('assets/KYC_Documents/'.$doc_info) ?>" alt="Photo">
                                </div>
                              <?php  } else { 
                                 $doc_name = explode('_',$doc_info,3); ?>
                                <div class="col-sm-2 mt-3">
                                <p><a href="<?php echo base_url('assets/KYC_Documents/'.$doc_info) ?>" target="_blank">  <i class="fas fa-file-pdf mt-3" style="font-size: 100px;"></i><br></a><?php  echo $doc_name[2]; ?></p>
                              </div>
                                <?php } ?> 
                            
                          <?php  }
                          }
                            ?>
                        </div>
                      <?php else: ?>
                        <div class="alert alert-warning" role="alert">
                          <a href="<?php echo site_url('Usercontroller/AgentKYCRegistration'); ?>" class="alert-link">
                            Complete KYC registration first.
                          </a>
                        </div>
                      <?php endif; ?>

                      <!-- /.row -->

                      <p>
                        <a href="#" class="link-black text-sm mr-2"><i class="fas fa-share mr-1"></i> Share</a>
                        <a href="#" class="link-black text-sm"><i class="far fa-thumbs-up mr-1"></i> Like</a>
                        <span class="float-right">
                          <a href="#" class="link-black text-sm">
                            <i class="far fa-comments mr-1"></i> Comments (5)
                          </a>
                        </span>
                      </p>

                      <input class="form-control form-control-sm" type="text" placeholder="Type a comment">
                    </div>
                    <!-- /.post -->
                  </div>
                  <!-- /.tab-pane -->
                  
                <div class="tab-pane" id="timeline">
                  <!-- The timeline -->
                  <div class="timeline timeline-inverse">
                    <!-- Insert your timeline structure here -->
                    <!-- Start of timeline loop -->
                    <?php foreach ($timeline as $event): ?>
                      <?php if (!empty($event['event_date'])): ?>
                        <div class="time-label">
                          <span class="bg-red"><?php echo date('d M. Y', strtotime($event['event_date'])); ?></span>
                        </div>
                      <?php endif; ?>
                      <div>
                        <i class="<?php echo $event['icon']; ?>"></i>
                        <div class="timeline-item">
                          <span class="time"><i class="fas fa-clock"></i> <?php echo date('H:i', strtotime($event['event_time'])); ?></span>
                          <h3 class="timeline-header"><a href="#"><?php echo $event['header']; ?></a></h3>
                          <div class="timeline-body">
                            <?php echo $event['body']; ?>
                          </div>
                        </div>
                      </div>
                    <?php endforeach; ?>
                    <!-- End of timeline loop -->
                    <div>
                      <i class="fas fa-clock bg-gray"></i>
                    </div>
                  </div>
                  <!-- /.timeline -->
                </div>
          <!-- /.tab-pane -->

                    <div class="tab-pane" id="settings">
                      <form class="form-horizontal" action="<?php echo base_url('index.php/Usercontroller/userUpdateProfile') ?>" method="post">
                        <div class="form-group row">
                          <label for="inputName" class="col-sm-2 col-form-label">First Name</label>
                          <div class="col-sm-10">
                            <input type="text" name="firstname" class="form-control" value="<?php echo $user_data['firstname'] ?>" id="inputName" placeholder="Name">
                          </div>
                        </div>
                        <div class="form-group row">
                          <label for="inputName" class="col-sm-2 col-form-label">Last Name</label>
                          <div class="col-sm-10">
                            <input type="text" name="lastname" class="form-control" value="<?php echo $user_data['lastname'] ?>" id="inputName" placeholder="Name">
                          </div>
                        </div>
                        <div class="form-group row">
                          <label for="inputEmail" class="col-sm-2 col-form-label">Email</label>
                          <div class="col-sm-10">
                            <input type="email" name="email" class="form-control" value="<?php echo $user_data['email'] ?>" id="inputEmail" placeholder="Email">
                          </div>
                        </div>
                        <div class="form-group row">
                          <label for="inputName2" class="col-sm-2 col-form-label">Mobile</label>
                          <div class="col-sm-10">
                            <input type="text" name="mobile" class="form-control" value="<?php echo $user_data['mobile'] ?>" id="inputName2" placeholder="Name">
                          </div>
                        </div>
                        <div class="form-group row">
                          <label for="inputExperience" class="col-sm-2 col-form-label">Company Name</label>
                          <div class="col-sm-10">
                            <input type="text" name="cname" class="form-control" value="<?php echo $user_data['cname'] ?>" id="inputName2" placeholder="Name">
                          </div>
                        </div>
                        <div class="form-group row">
                          <label for="inputSkills" class="col-sm-2 col-form-label">Designatiom</label>
                          <div class="col-sm-10">
                            <input type="text" name="designation" class="form-control"  value="<?php echo $user_data['designation'] ?>" id="inputSkills" placeholder="Skills">
                          </div>
                        </div>
                        <div class="form-group row">
                          <div class="offset-sm-2 col-sm-10">
                            <div class="checkbox">
                              <label>
                                <input type="checkbox"> I agree to the <a href="#">terms and conditions</a>
                              </label>
                            </div>
                          </div>
                        </div>
                        <div class="form-group row">
                          <div class="offset-sm-2 col-sm-10">
                            <button type="submit" class="btn btn-danger">Save</button>
                          </div>
                        </div>
                      </form>
                    </div>

                    <div class="tab-pane" id="bank_details">
                        <form class="form-horizontal" action="<?php echo base_url('index.php/Usercontroller/userUpdateBankDetails') ?>" method="post">
                          <div class="form-group row">
                            <label for="inputAccountNo" class="col-sm-2 col-form-label">Account Number</label>
                            <div class="col-sm-10">
                              <input type="text" name="account_no" class="form-control" value="<?php if(is_array($agent_bank_data) && $agent_bank_data['account_no']) { echo $agent_bank_data['account_no']; } ?>" id="inputAccountNo" placeholder="Account Number">
                            </div>
                          </div>
                          <div class="form-group row">
                            <label for="inputSwiftCode" class="col-sm-2 col-form-label">Swift Code</label>
                            <div class="col-sm-10">
                              <input type="text" name="swift_code" class="form-control" value="<?php if(is_array($agent_bank_data) && $agent_bank_data['swift_code']) { echo $agent_bank_data['swift_code']; } ?>" id="inputSwiftCode" placeholder="Swift Code">
                            </div>
                          </div>
                          <div class="form-group row">
                            <label for="inputAccountHolderName" class="col-sm-2 col-form-label">Account Holder Name</label>
                            <div class="col-sm-10">
                              <input type="text" name="acc_holder_name" class="form-control" value="<?php if(is_array($agent_bank_data) && $agent_bank_data['acc_holder_name']) { echo $agent_bank_data['acc_holder_name']; } ?>" id="inputAccountHolderName" placeholder="Account Holder Name">
                            </div>
                          </div>
                          <div class="form-group row">
                            <label for="inputBankName" class="col-sm-2 col-form-label">Bank Name</label>
                            <div class="col-sm-10">
                              <input type="text" name="bank_name" class="form-control" value="<?php if(is_array($agent_bank_data) && $agent_bank_data['bank_name']) { echo $agent_bank_data['bank_name']; } ?>" id="inputBankName" placeholder="Bank Name">
                            </div>
                          </div>
                          <div class="form-group row">
                            <label for="inputIbanNo" class="col-sm-2 col-form-label">IBAN Number</label>
                            <div class="col-sm-10">
                              <input type="text" name="iban_no" class="form-control" value="<?php if(is_array($agent_bank_data) && $agent_bank_data['iban_no']) { echo $agent_bank_data['iban_no']; } ?>" id="inputIbanNo" placeholder="IBAN Number">
                            </div>
                          </div>
                          <div class="form-group row">
                            <label for="inputaddress" class="col-sm-2 col-form-label">Bank Address</label>
                            <div class="col-sm-10">
                              <textarea name="bank_address" class="form-control" placeholder="Bank Address"><?php if(is_array($agent_bank_data) && $agent_bank_data['bank_address']) { echo $agent_bank_data['bank_address']; } ?></textarea>
                            </div>
                          </div>
                          <div class="form-group row">
                          <div class="offset-sm-2 col-sm-10">
                            <button type="submit" class="btn btn-danger">Save</button>
                          </div>
                        </div>
                        </form>
                      </div>

                  <!-- /.tab-pane -->
                </div>
                <!-- /.tab-content -->
              </div><!-- /.card-body -->
            </div>
            <!-- /.card -->
          </div>
          <!-- /.col -->
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
    <strong>Copyright &copy; 2024 <a href="https://adminlte.io">Lakshmi Pharmaceuticals</a>.</strong> All rights reserved.
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
  function submitForm() {
    document.getElementById('upload-form').submit();
}
</script>
</body>
</html>

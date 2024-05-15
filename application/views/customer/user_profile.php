

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
      <?php echo form_open_multipart('index.php/UserController/uploadProfilePicture'); ?>
        <label for="profile-picture-upload">
          <img id="profile-picture" class="profile-user-img img-fluid img-circle"
               src="<?php echo base_url('assets/')?>/dist/img/user4-128x128.jpg"
               alt="User profile picture">
        </label>
        <!-- Input for profile picture upload -->
        <input type="file" id="profile-picture-upload" name="profile_picture" style="display: none;">
        <!-- Submit button -->
        <button type="submit" style="display: none;"></button>
      <?php echo form_close(); ?>
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

                <a href="#" class="btn btn-primary btn-block"><b>Follow</b></a>
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
                  <li class="nav-item"><a class="nav-link active" href="#timeline" data-toggle="tab">Timeline</a></li>
                  <li class="nav-item"><a class="nav-link" href="#settings" data-toggle="tab">Settings</a></li>
                </ul>
              </div><!-- /.card-header -->
              <div class="card-body">
                <div class="tab-content">
                  
                  <!-- /.tab-pane -->
                  <div class="active tab-pane" id="timeline">
                    <!-- The timeline -->
                    <div class="timeline timeline-inverse">
                      <!-- timeline time label -->
                      <div class="time-label">
                        <span class="bg-danger">
                          10 Feb. 2014
                        </span>
                      </div>
                      <!-- /.timeline-label -->
                      <!-- timeline item -->
                      <div>
                        <i class="fas fa-envelope bg-primary"></i>

                        <div class="timeline-item">
                          <span class="time"><i class="far fa-clock"></i> 12:05</span>

                          <h3 class="timeline-header"><a href="#"> Lakshmi Pharmaceuticals</a> sent you an email</h3>

                          <div class="timeline-body">
                          Welcome to the Laksmi Pharmaceuticals family!
                           We are delighted to have you on board and are truly excited about the journey ahead..
                          </div>
                          <div class="timeline-footer">
                            <a href="#" class="btn btn-primary btn-sm">Read more</a>
                            <a href="#" class="btn btn-danger btn-sm">Delete</a>
                          </div>
                        </div>
                      </div>
                      <!-- END timeline item -->
                      <!-- timeline item -->
                      <div>
                        <i class="fas fa-user bg-info"></i>

                        <div class="timeline-item">
                          <span class="time"><i class="far fa-clock"></i> 5 mins ago</span>

                          <h3 class="timeline-header border-0"><a href="#">Dear customer</a> your profile is created
                          </h3>
                        </div>
                      </div>
                      <!-- END timeline item -->
                      <!-- timeline item -->
                      <div>
                        <i class="fas fa-comments bg-warning"></i>

                        <div class="timeline-item">
                          <span class="time"><i class="far fa-clock"></i> 27 mins ago</span>

                          <h3 class="timeline-header"><a href="#">Hey <?php echo $user_data['firstname'] ?> </a> Make your first order</h3>

                          <div class="timeline-body">
                          In our order section, you'll discover a treasure trove of pharmaceutical solutions tailored to your needs.
                           Feel empowered to explore and select what resonates with you. Should you need any assistance or guidance
                            along the way, our dedicated team is here to offer support and ensure your journey is seamless.
                          </div>
                          <div class="timeline-footer">
                            <a href="#" class="btn btn-warning btn-flat btn-sm">View comment</a>
                          </div>
                        </div>
                      </div>
                      <!-- END timeline item -->
                      <!-- timeline time label -->
                      <div class="time-label">
                        <span class="bg-success">
                          3 Jan. 2014
                        </span>
                      </div>
                      <!-- /.timeline-label -->
                      <!-- timeline item -->
                      <div>
                        <i class="fas fa-camera bg-purple"></i>

                        <div class="timeline-item">
                          <span class="time"><i class="far fa-clock"></i> 2 days ago</span>

                          <h3 class="timeline-header"><a href="#">Your</a> First order is completed</h3>

                          <!-- <div class="timeline-body">
                            <img src="https://placehold.it/150x100" alt="...">
                            <img src="https://placehold.it/150x100" alt="...">
                            <img src="https://placehold.it/150x100" alt="...">
                            <img src="https://placehold.it/150x100" alt="...">
                          </div> -->
                        </div>
                      </div>
                      <!-- END timeline item -->
                      <div>
                        <i class="far fa-clock bg-gray"></i>
                      </div>
                    </div>
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
</body>
</html>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>AdminLTE 3 | Registration Page</title>

  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">

  <!-- Font Awesome -->
  <link rel="stylesheet" href="<?php echo base_url('assets/')?>plugins/fontawesome-free/css/all.min.css">
  <!-- icheck bootstrap -->
  <link rel="stylesheet" href="<?php echo base_url('assets/')?>plugins/icheck-bootstrap/icheck-bootstrap.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="<?php echo base_url('assets/')?>dist/css/adminlte.min.css">
  <style>
        .error { color: red; }
        .toggle-password {
            position: absolute;
            right: 10px;
            top: 50%;
            transform: translateY(-50%);
            cursor: pointer;
        }
    </style>

    <script>
        function redirectToTerms() {
            window.open('<?php echo base_url('index.php/Usercontroller/terms_view') ?>', '_blank');
        }
    </script>

</head>
<body class="hold-transition register-page">
<div class="register-box">
  <div class="register-logo">
    <a href="<?php echo base_url('assets/')?>index2.html"><b>Admin</b>LTE</a>
  </div>

  <div class="card" >
    <div class="card-body register-card-body">
      <p class="login-box-msg">Register a new membership</p>

      <form id="registrationForm" action="<?php echo base_url('index.php/Usercontroller/registerUser')?>" method="post">
        <div class="row">
          <div class="col-md-6">
            <div class="input-group mb-3">
              <input type="text" class="form-control" placeholder="First name" name="first_name" required>
              <div class="input-group-append">
                <div class="input-group-text">
                  <span class="fas fa-user"></span>
                </div>
              </div>
            </div>
            <div class="input-group mb-3">
              <input type="text" class="form-control" placeholder="Company Name / Organization Name" name="company_name" required>
              <div class="input-group-append">
                <div class="input-group-text">
                  <span class="fas fa-building"></span>
                </div>
              </div>
            </div>
            <div class="input-group mb-3">
              <input type="text" class="form-control" placeholder="Email" name="email" required>
              <div class="input-group-append">
                <div class="input-group-text">
                  <span class="fas fa-envelope"></span>
                </div>
              </div>
            </div>
            <div class="input-group mb-3">
              <input type="text" class="form-control" placeholder="Phone" name="phone" required>
              <div class="input-group-append">
                <div class="input-group-text">
                  <span class="fas fa-phone"></span>
                </div>
              </div>
            </div>
            
            
            <!-- Add more fields here for the left column -->
          </div>
          <!-- /.col -->
          <div class="col-md-6">
            <div class="input-group mb-3">
              <input type="text" class="form-control" placeholder="Last name" name="last_name" required>
              <div class="input-group-append">
                <div class="input-group-text">
                  <span class="fas fa-user"></span>
                </div>
              </div>
            </div>
            <div class="input-group mb-3">
              <input type="text" class="form-control" placeholder="Designation" name="designation" required>
              <div class="input-group-append">
                <div class="input-group-text">
                  <span class="fas fa-user-tag"></span>
                </div>
              </div>
            </div>
            
            <div class="input-group mb-3">
              <input type="text" class="form-control" placeholder="Import Country" name="import_country" required>
              <div class="input-group-append">
                <div class="input-group-text">
                  <span class="fas fa-globe"></span>
                </div>
              </div>
            </div>
            <div class="input-group mb-3">
              <input type="text" class="form-control" placeholder="Delivery Address" name="delivery_address" required>
              <div class="input-group-append">
                <div class="input-group-text">
                  <span class="fas fa-map-marker-alt"></span>
                </div>
              </div>
            </div>
            


            
            <!-- Add more fields here for the right column -->
          </div>
          <div class="input-group mb-3 pl-1 pr-1">
              <input type="text" class="form-control" placeholder="Sign in Address" name="signin_address" required>
              <div class="input-group-append">
                <div class="input-group-text">
                  <span class="fas fa-map-marker-alt"></span>
                </div>
              </div>
            </div>

          <div class="col-md-12 mb-3 p-0">
              <input type="password" class="form-control" placeholder="Password" id="password" name="password" required>
              <span class="toggle-password fas fa-eye" onclick="togglePasswordVisibility('password')"></span>

              <!-- <div class="input-group-append">
                <div class="input-group-text">
                  <span class="fas fa-eye"></span>
                </div>
              </div> -->
              
            </div>
            <span class="error" id="passwordError"></span>
            <div class="col-md-12 mb-3 p-0">
              <input type="password" class="form-control" placeholder="Confirm Password" id="confirm_password" name="confirm_password" required>
              <span class="toggle-password fas fa-eye" onclick="togglePasswordVisibility('confirm_password')"></span>

              <!-- <div class="input-group-append">
                <div class="input-group-text">
                  <span class=" fa-eye"></span>
                </div>
              </div> -->
            </div>
            
            <span class="error" id="confirmPasswordError"></span>

          <div class="input-group mb-3">
              <textarea class="form-control" placeholder="Message" name="message"></textarea>
              <div class="input-group-append">
                <div class="input-group-text">
                  <span class="fas fa-comment"></span>
                </div>
              </div>
            </div>

            

            <div class="input-group mb-3">
                  <select class="form-control pr-3" name="role" id="role_selection" required>
                      <option value="" disabled selected>You want to register as?</option>
                      <option value="distributor">Distributor</option>
                      <option value="supplier">Supplier</option>
                      <option value="agent">Agent</option>
                      <option value="franchise">Franchise</option>
                  </select>
                  <div class="input-group-append">
                      <div class="input-group-text">
                          <span class="fas fa-user"></span>
                      </div>
                  </div>
              </div>
              


        </div>

          
          <!-- /.col -->
        </div>
        <!-- /.row -->
        <div class="row">
          <div class="col-md-6">
            <!-- Add more fields here for the left column -->
          </div>
          <!-- /.col -->
          <div class="col-md-6">
            <!-- Add more fields here for the right column -->
          </div>
          <!-- /.col -->
        </div>
        <!-- /.row -->
        <div class="row">
          <!-- <div class="col-8">
            <div class="icheck-primary">
              <input type="checkbox" id="agreeTerms" name="terms" value="agree" required>
              <label for="agreeTerms">
               I agree to the <a href="#">terms</a>
              </label>
            </div>
          </div> -->
          
          <label class="pl-3">
            <input type="checkbox" id="agreeTerms" name="terms" value="agree" required checked="checked">
            I agree to the <a href="javascript:void(0);" onclick="redirectToTerms()">Terms and Conditions</a>
          </label>
          <!-- /.col -->
          <div class="col-4 pl-3">
            <button type="submit" class="btn btn-primary btn-block">Register</button>
          </div>
          <!-- /.col -->
        </div>
        <!-- /.row -->
      </form>
      

      <div class="social-auth-links text-center">
        <p>- OR -</p>
        <a href="#" class="btn btn-block btn-primary">
          <i class="fab fa-facebook-f mr-2"></i>
          Sign up using Facebook
        </a>
        <a href="#" class="btn btn-block btn-danger">
          <i class="fab fa-google-plus-g mr-2"></i>
          Sign up using Google+
        </a>
      </div>

      <a href="https://user.lakshmipharmaceuticals.com/" class="text-center">I already have a membership</a>
    </div>
    <!-- /.form-box -->
  </div><!-- /.card -->
</div>
<!-- /.register-box -->

<!-- jQuery -->
<script src="<?php echo base_url('assets/')?>plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap 4 -->
<script src="<?php echo base_url('assets/')?>plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- AdminLTE App -->
</body>
</html>
<?php
// Check for error message
if ($this->session->flashdata('error_message')) {
    echo "<script>alert('" . $this->session->flashdata('error_message') . "');</script>";
}
// Check for success message
if ($this->session->flashdata('success_message')) {
    echo "<script>alert('" . $this->session->flashdata('success_message') . "');</script>";
}

?>

<script>

function togglePasswordVisibility(id) {
            const passwordField = document.getElementById(id);
            const eyeIcon = document.querySelector(`#${id} + .toggle-password`);
            if (passwordField.type === 'password') {
                passwordField.type = 'text';
                eyeIcon.classList.remove('fa-eye');
                eyeIcon.classList.add('fa-eye-slash');
            } else {
                passwordField.type = 'password';
                eyeIcon.classList.remove('fa-eye-slash');
                eyeIcon.classList.add('fa-eye');
            }
        }
            document.getElementById('registrationForm').addEventListener('submit', function(event) {
                let isValid = true;
                // event.preventDefault();

                // Clear previous errors
                document.getElementById('passwordError').textContent = '';
                document.getElementById('confirmPasswordError').textContent = '';
                
                  
                $("#password").removeClass('error');
                $("#confirm_password").removeClass('error');

                // Get form values
                const password = document.getElementById('user_password').value;
                const confirmPassword = document.getElementById('user_confirm_password').value;

                // Validate password
                if (password.length < 8) {
                    document.getElementById('passwordError').textContent = 'Password must be at least 8 characters long.';
                    $("#user_password").addClass('error');
                    isValid = false;
                } else if (!/[A-Z]/.test(password) || !/[a-z]/.test(password) || !/[0-9]/.test(password) || !/[\W_]/.test(password)) {
                    document.getElementById('passwordError').textContent = 'Password must contain at least one uppercase letter, one lowercase letter, one number, and one special character.';
                    $("#user_confirm_password").addClass('error');
                    isValid = false;
                }

                // Validate confirm password
                if (password !== confirmPassword) {
                  $("#user_confirm_password").addClass('error');
                    document.getElementById('confirmPasswordError').textContent = 'Passwords do not match.';
                    isValid = false;
                }

                // Prevent form submission if invalid
                if (!isValid) {
                    event.preventDefault(); // Stop form from submitting
                }
            });
        
    </script>

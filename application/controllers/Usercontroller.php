<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Usercontroller extends CI_Controller {

	public function index()
	{
		// $this->session->set_userdata('id', 83);
		// $id = $this->session->userdata('id');

		// $data['user_data'] = $this->Usermodel->getUserData($id);
		// $data['order_count'] = $this->Usermodel->getUserOrderCount($id);

		// $this->load->view('user_header',$data);
		// $this->load->view('user_home');
		$this->load->view('login');
	}
	public function userLogin(){
		$email = $this->input->post('email');
		$password = $this->input->post('password');
		$response = $this->Usermodel->userLogin($email,$password);
		if($response ==true){
			redirect('index.php/Usercontroller/userHome');

		}else{
			echo json_encode($response);
		}

	}
	public function userLogout(){
		// Destroy user session
		$this->session->unset_userdata('id');
    
		// Optionally, you can destroy all session data
		// $this->session->sess_destroy();
		
		// Redirect to the login page or any other page after logout
		redirect('index.php/Usercontroller/index');
	}

	public function userHome() {
		// Check if user is logged in
		if (!$this->session->userdata('id')) {
			// User is not logged in, redirect to login page
			redirect('index.php/Usercontroller/index');
		}
		
		// User is logged in, proceed with user home functionality
		$id = $this->session->userdata('id');
		
		// Retrieve user data and other necessary information
		$id = $this->session->userdata('id');

		$data['user_data'] = $this->Usermodel->getUserData($id);
		$data['order_count'] = $this->Usermodel->getUserOrderCount($id);
		$data['enquiry_count'] = $this->Usermodel->getUserEnquiryCount($id);
		$data['white_label_count'] = $this->Usermodel->getWhiteLabelCount();

		$this->load->view('customer/user_header',$data);
		$this->load->view('customer/user_home');
	}
	public function userProfile(){
		if (!$this->session->userdata('id')) {
			// User is not logged in, redirect to login page
			redirect('index.php/Usercontroller/index');
		}
		$id = $this->session->userdata('id');
		$data['user_data'] = $this->Usermodel->getUserData($id);
		$this->load->view('customer/user_header',$data);
		$this->load->view('customer/user_profile');
	}
	public function userUpdateProfile(){
		try {
			if (!$this->session->userdata('id')) {
				// User is not logged in, redirect to login page
				redirect('index.php/Usercontroller/index');
			}

			$id = $this->session->userdata('id');
			$data['firstname'] = $this->input->get_post('firstname');
			$data['lastname'] = $this->input->get_post('lastname');
			$data['email'] = $this->input->get_post('email');
			$data['mobile'] = $this->input->get_post('mobile');
			$data['cname'] = $this->input->get_post('cname');
			$data['designation'] = $this->input->get_post('designation');
			$response = $this->Usermodel->userUpdateProfile($data, $id);
			if($response ==true){
				echo "<script>alert('Profile updated successfully');</script>";
				$this->userProfile();
			}
		} catch (Exception $e) {
			// Log error to the database
			$this->ErrorLogModel->logError($e->getMessage(), $e->getFile(), $e->getLine());
			redirect('index.php/Admincontroller/ServerError');
		}		
	}
	public function userViewComposition(){
		if (!$this->session->userdata('id')) {
			// User is not logged in, redirect to login page
			redirect('index.php/Usercontroller/index');
		}
		$id = $this->session->userdata('id');
		$data['user_data'] = $this->Usermodel->getUserData($id);
		$data['composition'] = $this->Usermodel->getComposition();
		$this->load->view('customer/user_header',$data);
		$this->load->view('customer/user_view_composition');
	}
	public function userViewProducts(){
		if (!$this->session->userdata('id')) {
			// User is not logged in, redirect to login page
			redirect('index.php/Usercontroller/index');
		}
		$id = $this->session->userdata('id');
		$data['user_data'] = $this->Usermodel->getUserData($id);
		$composition_name = $this->input->get('composition_name');
		$data['products'] = $this->Usermodel->getProductsByComposition($composition_name);
		$this->load->view('customer/user_header',$data);
		$this->load->view('customer/user_view_products');
	}
	public function userViewCart(){
		if (!$this->session->userdata('id')) {
			// User is not logged in, redirect to login page
			redirect('index.php/Usercontroller/index');
		}
		$id = $this->session->userdata('id');
		$data['user_data'] = $this->Usermodel->getUserData($id);
		$product_id = $this->input->get('product_id');
		$data['product_details'] = $this->Usermodel->getProductDetails($product_id);
		$this->load->view('customer/user_header',$data);
		$this->load->view('customer/user_view_cart');
	}

	public function userAddToCart(){
		echo "<script>alert('Added to cart');</script>";
		$this->userViewCart();
	}
	public function userProductQuery(){
		if (!$this->session->userdata('id')) {
			// User is not logged in, redirect to login page
			redirect('index.php/Usercontroller/index');
		}
		$id = $this->session->userdata('id');
		$data['user_data'] = $this->Usermodel->getUserData($id);
		$data['categories'] = $this->Usermodel->getDrugCategory();
		$data['dosage_from'] = $this->Usermodel->getDosageFrom();
		$data['packing_size'] = $this->Usermodel->getPackingSize();
		$data['pharmacopeia'] = $this->Usermodel->getPharmacopeia();
		$this->load->view('customer/user_header',$data);
		$this->load->view('customer/user_product_query');
	}
	public function userAddProductQuery(){
		if (!$this->session->userdata('id')) {
			// User is not logged in, redirect to login page
			redirect('index.php/Usercontroller/index');
		}
		
		// Define the base URL
		// Define the server file system path to the directory where files will be uploaded
		$upload_path = FCPATH . 'assets/product_inquiry_images/';

		// Set the upload path in the configuration
		$config['upload_path'] = $upload_path;
		$config['allowed_types'] = 'gif|jpg|png'; // Allowed file types
		$config['max_size'] = 2048; // Maximum file size in kilobytes (2MB)
		
		$this->load->library('upload', $config);
		
		if (!$this->upload->do_upload('sample_photo')) {
			// If file upload fails, show error
			$error = $this->upload->display_errors();
			echo json_encode($error);
			echo json_encode($config['upload_path']);
		} else {
			// File uploaded successfully
			$upload_data = $this->upload->data();
			
			// Prepare data to be inserted into database
			$data['user_id'] = $this->session->userdata('id');
			$data['product_name'] = $this->input->post('product_name');
			$data['drug_category'] = $this->input->post('drug_category');
			$data['dosage_from'] = $this->input->post('dosage_from');
			$data['packing_size'] = $this->input->post('packing_size');
			$data['pharmacopeia'] = $this->input->post('pharmacopeia');
			$data['sample_photo'] = $upload_data['file_name']; // Store file name in database
			$data['quantity'] = $this->input->post('quantity');
			$data['comments'] = $this->input->post('comments');
			$data['date_time'] = $this->input->post('estimate_date');
			$data['budget_range'] = $this->input->post('budget_range');
			
			// Call model function to insert data into database
			$response = $this->Usermodel->userAddProductQuery($data);
			if ($response) {
				echo "<script>alert('Added to cart');</script>";
				redirect('index.php/Usercontroller/userProductQuery');
			} else {
				echo "false";
			}
		}
	}
	

	public function InquiryDetails(){
		if (!$this->session->userdata('id')) {
			// User is not logged in, redirect to login page
			redirect('index.php/Usercontroller/index');
		}
		$id = $this->session->userdata('id');
		$data['user_data'] = $this->Usermodel->getUserData($id);
		$this->load->view('customer/user_header',$data);
		$this->load->view('customer/user_product_query_details');
	}

	public function userSignup(){
		$this->load->view('register');
	}

	public function registerUser() {

		// Check if the form is submitted
		if ($this->input->post()) {
			// Get form data
			$data = array(
				'firstname' => $this->input->post('first_name'),
				'lastname' => $this->input->post('last_name'),
				'cname' => $this->input->post('company_name'),
				'email' => $this->input->post('email'),
				'mobile' => $this->input->post('phone'),
				'address' => $this->input->post('signin_address'),
				'designation' => $this->input->post('designation'),
				'password' => password_hash($this->input->post('password'), PASSWORD_DEFAULT),
				'import' => $this->input->post('import_country'),
				'order_address' => $this->input->post('delivery_address'),
				'message' => $this->input->post('message'),
				'role' => 'customer',
				// Add other form fields here
			);

			 // Check selected role from form
			 $selectedRole = $this->input->post('role');
			 if ($selectedRole == 'distributor') {
				 $data['role'] = 'customer';
			 } elseif ($selectedRole == 'seller') {
				 $data['role'] = 'seller';
			 } elseif ($selectedRole == 'agent') {
				 $data['role'] = 'agent';
			 }
	
			// Check if email already exists
			$existingUser = $this->Usermodel->getUserByEmail($data['email']);
			// echo json_encode($existingUser);
			// die();
			if ($existingUser==true) {
				// Email already exists, show alert
				
				$this->session->set_flashdata('error_message', 'Email already exists');
				redirect('index.php/Usercontroller/userSignup');
			} else {
				// Email does not exist, proceed with registration
				$response = $this->Usermodel->registerUser($data);
				if ($response == true) {
					$this->EmailModel->send_registration_email($data);
					redirect('index.php/Usercontroller/index');
				}
			}
		} else {
			// Form not submitted
			echo "<script>alert('Error');</script>";
			redirect('index.php/Usercontroller/userSignup');
		}
	}


	public function userViewProductInquiry(){
		if (!$this->session->userdata('id')) {
			// User is not logged in, redirect to login page
			redirect('index.php/Usercontroller/index');
		}
		$id = $this->session->userdata('id');
		$data['user_data'] = $this->Usermodel->getUserData($id);
		$data['product_inquiry'] = $this->Usermodel->userViewProductInquiry($id);
		$this->load->view('customer/user_header',$data);
		$this->load->view('customer/user_view_product_inquiry');

	}
	public function KYCRegistration(){
		if (!$this->session->userdata('id')) {
			// User is not logged in, redirect to login page
			redirect('index.php/Usercontroller/index');
		}
		$id = $this->session->userdata('id');
		$data['user_data'] = $this->Usermodel->getUserData($id);
		$data['document_exist'] = $this->Usermodel->getUserDocuments($id );
		$data['kyc_registration'] = $this->Usermodel->getKycRegistration($id );

		$this->load->view('customer/user_header',$data);
		$this->load->view('customer/user_kyc_registration');

	}
	public function userUploadDocuments(){
		// Check if the user is logged in
		if (!$this->session->userdata('id')) {
			// User is not logged in, redirect to login page
			redirect('index.php/Usercontroller/index');
		}
	
		// Check if the user has already uploaded documents
		$userId = $this->session->userdata('id');
		$existingDocuments = $this->Usermodel->getUserDocuments($userId);
	
		if ($existingDocuments) {
			redirect('index.php/Usercontroller/userHome');
		}
		
		// Load the upload library
		$this->load->library('upload');
		
		$upload_path = FCPATH . 'assets/KYC_Documents/';
		
		// Set the upload path in the configuration
		$config['upload_path'] = $upload_path;
		$config['allowed_types'] = 'gif|jpg|png|pdf'; // Specify the allowed file types
		$config['max_size'] = 2048; // Specify the maximum file size in kilobytes
		$config['encrypt_name'] = FALSE; // Do not encrypt the file name
		$this->upload->initialize($config);
		
		// Check if files are being uploaded
		if ($this->upload->do_upload('drug_license') && $this->upload->do_upload('national_id_proof') && $this->upload->do_upload('company_incorporation')) {
			// Files uploaded successfully
			// Get uploaded file data
			$upload_data1 = $this->upload->data('drug_license');
			$upload_data2 = $this->upload->data('national_id_proof');
			$upload_data3 = $this->upload->data('company_incorporation');
			
			// Generate unique names for each file
			$userId = $this->session->userdata('id');
			$timestamp = date('YmdHis');
			$drugLicenseName = $userId . '_' . $timestamp . '_' . $_FILES["drug_license"]['name'];
			$nationalIdProofName = $userId . '_' . $timestamp . '_' . $_FILES["national_id_proof"]['name'];
			$companyIncorporationName = $userId . '_' . $timestamp . '_' . $_FILES["company_incorporation"]['name'];
			
			// Move the uploaded files to the destination folder with the custom names
			$uploadSuccess1 = move_uploaded_file($_FILES['drug_license']['tmp_name'], $upload_path . $drugLicenseName);
			$uploadSuccess2 = move_uploaded_file($_FILES['national_id_proof']['tmp_name'], $upload_path . $nationalIdProofName);
			$uploadSuccess3 = move_uploaded_file($_FILES['company_incorporation']['tmp_name'], $upload_path . $companyIncorporationName);
			
			if ($uploadSuccess1 && $uploadSuccess2 && $uploadSuccess3) {
				// Files moved successfully, insert their details into the database
				$data['company_incorporation_certificate'] = $companyIncorporationName;
				$data['drug_license'] = $drugLicenseName;
				$data['national_id_proof'] = $nationalIdProofName;
				$data['user_id'] = $userId;
				$data['status'] = 'pending';
				
				// Insert document details into the database
				$response = $this->Usermodel->userUploadDocuments($data);
				
				if ($response) {
					redirect('index.php/Usercontroller/KYCRegistration');
				} else {
					// Error inserting data into the database
					// Handle the error as needed
				}
			} else {
				// Error moving files to the destination folder
				// Handle the error as needed
			}
		} else {
			// Error uploading files
			$error1 = $this->upload->display_errors();
			$error2 = $this->upload->display_errors();
			$error3 = $this->upload->display_errors();
			redirect('index.php/Usercontroller/userHome');
			// Handle the errors as needed
		}
	}
	

	public function userKycStatus(){
		// Check if the user is logged in
		if (!$this->session->userdata('id')) {
			// User is not logged in, redirect to login page
			redirect('index.php/Usercontroller/index');
		}
		$id = $this->session->userdata('id');
		$data['user_data'] = $this->Usermodel->getUserData($id);
		$data['user_documents'] = $this->Usermodel->getUserDocumentsSubmitted($id);

		$this->load->view('customer/user_header',$data);
		$this->load->view('customer/user_kyc_status');
	}

	public function userViewWhiteLabelProducts(){
		if (!$this->session->userdata('id')) {
			// User is not logged in, redirect to login page
			redirect('index.php/Usercontroller/index');
		}
	
		$id = $this->session->userdata('id');
	
		// Pagination configuration
		$config['base_url'] = base_url('index.php/Usercontroller/userViewWhiteLabelProducts');
		$config['total_rows'] = $this->Usermodel->countAllWhiteLabelProductsData(); // Method to count total products
		$config['per_page'] = 9; // Number of products per page
		$config['uri_segment'] = 3; // URI segment containing the page number
	
		// Initialize pagination
		$this->pagination->initialize($config);
	
		// Fetch user data for the current page
		$page = ($this->uri->segment(3)) ? $this->uri->segment(3) : 0;
		$data['white_label_products'] = $this->Usermodel->getWhiteLabelProductsPerPage($config['per_page'], $page);
	
		// Load view with pagination links
		$data['pagination_links'] = $this->pagination->create_links();
		$data['user_data'] = $this->Usermodel->getUserData($id);
		$this->load->view('customer/user_header',$data);
		$this->load->view('customer/user_view_white_label_products',$data);
	}
	
	public function userViewWhiteLabelProductDetails(){
		// Check if the user is logged in
		if (!$this->session->userdata('id')) {
			// User is not logged in, redirect to login page
			redirect('index.php/Usercontroller/index');
		}
		$id = $this->session->userdata('id');
		$data['user_data'] = $this->Usermodel->getUserData($id);
		$product_id = $this->input->get('product_id');
		$data['product_details'] = $this->Usermodel->userViewWhiteLabelProductDetails($product_id);

		$this->load->view('customer/user_header',$data);
		$this->load->view('customer/user_view_white_label_product_details');
	}

	public function uploadProfilePicture() {
        // Check if the form is submitted
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            // Configuration for file upload
            $config['upload_path'] = './uploads/';
            $config['allowed_types'] = 'gif|jpg|png';
            $config['max_size'] = 1024; // 1 MB max size (adjust as needed)
            $config['overwrite'] = TRUE; // Overwrite existing file if exists

            $this->load->library('upload', $config);

            // Perform the file upload
            if ($this->upload->do_upload('profile_picture')) {
                // File uploaded successfully
                $data = $this->upload->data();
                $file_name = $data['file_name'];

                // Update user's profile picture in the database
                // Example: $this->user_model->updateProfilePicture($file_name);

                // Redirect back to the profile page or display a success message
                redirect('userProfile');
            } else {
                // File upload failed
                $error = array('error' => $this->upload->display_errors());
                // Handle the error (e.g., display error message)
            }
        } else {
            // If the form is not submitted via POST method, redirect to the profile page
            redirect('userProfile');
        }
    }
	public function userViewThirdPartyManufacturedProducts(){
		// Check if the user is logged in
		if (!$this->session->userdata('id')) {
			// User is not logged in, redirect to login page
			redirect('index.php/Usercontroller/index');
		}
		$id = $this->session->userdata('id');
		$data['user_data'] = $this->Usermodel->getUserData($id);
		$product_id = $this->input->get('product_id');
		$data['third_party_products'] = $this->Usermodel->userGetThirdPartyProducts($product_id);
		$data['categories'] = $this->Usermodel->getDrugCategory();
		$data['dosage_from'] = $this->Usermodel->getDosageFrom();
		$data['packing_size'] = $this->Usermodel->getPackingSize();
		$data['pharmacopeia'] = $this->Usermodel->getPharmacopeia();

		$this->load->view('customer/user_header',$data);
		$this->load->view('customer/user_inquire_third_party_products');
	}
	public function userAddInquiryThirdPartyProducts(){
		if (!$this->session->userdata('id')) {
			// User is not logged in, redirect to login page
			redirect('index.php/Usercontroller/index');
		}
		    // Load the upload library
			$this->load->library('upload');
			$upload_path = FCPATH . 'assets/third_party_products/';

			// Configure upload preferences
			$config['upload_path'] = $upload_path; // Directory where files should be uploaded
			$config['allowed_types'] = 'gif|jpg|png|pdf'; // Allowed file types
			$config['max_size'] = 2048; // Maximum file size (in KB)
			$config['encrypt_name'] = TRUE; // Encrypt the file name for security
		
			// Initialize the upload library with the config
			$this->upload->initialize($config);
		
			// Check if the file upload is successful
			if (!$this->upload->do_upload('image')) {
				// Upload failed, handle the error
				$error = $this->upload->display_errors();
				// You can pass the error to your view or handle it as needed
				echo $error;
				return;
			} else {
				// Upload was successful, get the uploaded file data
				$upload_data = $this->upload->data();
				$data['sample_photo'] = $upload_data['file_name']; // Get the file name
			}
		
		// Fetch values from the form
		$data['product_name'] = $this->input->post('product_name');
		$data['category'] = $this->input->post('category');
		$data['dosage_form'] = $this->input->post('dosage_form');
		$data['packing_size'] = $this->input->post('packing_size');
		$data['pharmacopeia'] = $this->input->post('pharmacopeia');
		$data['comments'] = $this->input->post('comments');
		$data['quantity'] = $this->input->post('quantity');
		$data['created_date'] = date("Y-m-d H:i:s");
		$data['user_id'] = $this->session->userdata('id');
	
		$response = $this->Usermodel->userAddInquiryThirdPartyProducts($data);
		if($response==1){
			redirect('index.php/Usercontroller/userViewThirdPartyManufacturedProducts');
		}
	}

	public function inquireWhiteLabelProduct(){
		try{
			$data['wl_product_id'] = $this->input->post('product_id');
			$data['user_id'] = $this->session->userdata('id');
			$data['ask_rate'] = 100;
			$data['status'] = 'pending';
			$response = $this->Usermodel->inquireWhiteLabelProduct($data);
			if($response==true){
				redirect('index.php/Usercontroller/userViewWhiteLabelProductDetails?product_id='.$this->input->post('product_id'));
			}
		}
		catch (Exception $e) {
			// Log error to the database
			$this->ErrorLogModel->logError($e->getMessage(), $e->getFile(), $e->getLine());
			redirect('index.php/Admincontroller/ServerError');
		}	
	}

	
}

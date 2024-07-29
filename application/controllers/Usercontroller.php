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
	public function supplierHome(){
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
		$data['timeline'] = $this->Usermodel->get_supplier_timeline($id);

		$this->load->view('supplier/supplier_header',$data);
		$this->load->view('supplier/supplier_timeline');
	}

	public function agentHome(){
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
		$data['timeline'] = $this->Usermodel->get_timeline($id);
		$kycStatus = $this->Usermodel->check_kyc_status($id);
        $data['kyc_pending'] = !$kycStatus;

		$this->load->view('agent/agent_header',$data);
		$this->load->view('agent/agent_timeline');
	}


	public function franchiseHome(){
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
		$data['timeline'] = $this->Usermodel->get_franchise_timeline($id);
		$kycStatus = $this->Usermodel->check_kyc_status($id);
        $data['kyc_pending'] = !$kycStatus;

		$this->load->view('franchise/franchise_header',$data);
		$this->load->view('franchise/franchise_timeline');
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

	public function agentProfile(){
		if (!$this->session->userdata('id')) {
			// User is not logged in, redirect to login page
			redirect('index.php/Usercontroller/index');
		}
		$id = $this->session->userdata('id');
		$data['user_documents'] = $this->Usermodel->getUserDocumentsSubmitted($id);
		$data['timeline'] = $this->Usermodel->get_timeline($id);

		$kycStatus = $this->Usermodel->check_kyc_status($id);
        $data['kyc_pending'] = !$kycStatus;
		$data['user_data'] = $this->Usermodel->getUserData($id);
		$data['agent_bank_data'] = $this->Usermodel->getAgentBankData($id);
		$this->load->view('agent/agent_header',$data);
		$this->load->view('agent/agent_profile');
	}


	public function supplierProfile(){
		if (!$this->session->userdata('id')) {
			// User is not logged in, redirect to login page
			redirect('index.php/Usercontroller/index');
		}
		$id = $this->session->userdata('id');
		$data['user_documents'] = $this->Usermodel->getUserDocumentsSubmitted($id);
		$data['timeline'] = $this->Usermodel->get_supplier_timeline($id);

		$kycStatus = $this->Usermodel->check_kyc_status($id);
        $data['kyc_pending'] = !$kycStatus;
		$data['user_data'] = $this->Usermodel->getUserData($id);
		// $data['agent_bank_data'] = $this->Usermodel->getAgentBankData($id);
		$this->load->view('supplier/supplier_header',$data);
		$this->load->view('supplier/supplier_profile');
	}


	public function franchiseProfile() {
		if (!$this->session->userdata('id')) {
			// User is not logged in, redirect to login page
			redirect('index.php/Usercontroller/index');
		}
		$id = $this->session->userdata('id');
		$data['user_documents'] = $this->Usermodel->getUserDocumentsSubmitted($id);
		$data['timeline'] = $this->Usermodel->get_franchise_timeline($id);

		$kycStatus = $this->Usermodel->check_kyc_status($id);
		$data['kyc_pending'] = !$kycStatus;
		$data['user_data'] = $this->Usermodel->getUserData($id);
		$data['franchise_bank_data'] = $this->Usermodel->getFranchiseBankData($id);
		$this->load->view('franchise/franchise_header',$data);
		$this->load->view('franchise/franchise_profile');
	}

	public function userUpdateProfile(){
		try {
			if (!$this->session->userdata('id')) {
				// User is not logged in, redirect to login page
				redirect('index.php/Usercontroller/index');
			}

			$id = $this->session->userdata('id');
			
			$query = $this->db->get_where('users', array('id' => $id));
			if ($query->num_rows() > 0) {
				$user = $query->row();
			}
			$data['firstname'] = $this->input->get_post('firstname');
			$data['lastname'] = $this->input->get_post('lastname');
			$data['email'] = $this->input->get_post('email');
			$data['mobile'] = $this->input->get_post('mobile');
			$data['cname'] = $this->input->get_post('cname');
			$data['designation'] = $this->input->get_post('designation');
			$response = $this->Usermodel->userUpdateProfile($data, $id);
			if($response ==true){
				echo "<script>alert('Profile updated successfully');</script>";
				if($user->role == 'agent') {
					$this->agentProfile();
				}
				else if($user->role == 'franchise') {
					$this->franchiseProfile();
				}
				else if($user->role == 'supplier') {
					$this->supplierProfile();
				}
				else {
					$this->userProfile();
				}
				
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
			 } elseif ($selectedRole == 'supplier') {
				 $data['role'] = 'supplier';
			 } elseif ($selectedRole == 'agent') {
				 $data['role'] = 'agent';
			 } elseif ($selectedRole == 'franchise') {
				$data['role'] = 'franchise';
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

					// Get the newly registered user's ID
					$newUserId = $this->db->insert_id(); // Assuming you are using CodeIgniter's Active Record
                
					// If the registered user is an agent, insert into agent_timeline
					if ($data['role'] == 'agent') {
						$timelineData = array(
							'agent_id' => $newUserId,
							'event_date' => date('Y-m-d'), // Current date
							'event_time' => date('H:i:s'), // Current time
							'icon' => 'fas fa-envelope bg-blue',
							'header' => 'Registration to Lakshmi Pharmaceuticals',
							'body' => 'Agent registered to Lakshmi Pharmaceuticals'
						);
						$this->Usermodel->insert_event($timelineData);
						
					}
					// If the registered user is an franchise, insert into franchise_timeline
					else if($data['role'] == 'franchise') {
						$timelineData = array(
							'franchise_id' => $newUserId,
							'event_date' => date('Y-m-d'), // Current date
							'event_time' => date('H:i:s'), // Current time
							'icon' => 'fas fa-envelope bg-blue',
							'header' => 'Registration to Lakshmi Pharmaceuticals',
							'body' => 'Franchise registered to Lakshmi Pharmaceuticals'
						);
						$this->Usermodel->insert_franchise_event($timelineData);
					}
					else if($data['role'] == 'supplier') {
						$timelineData = array(
							'franchise_id' => $newUserId,
							'event_date' => date('Y-m-d'), // Current date
							'event_time' => date('H:i:s'), // Current time
							'icon' => 'fas fa-envelope bg-blue',
							'header' => 'Registration to Lakshmi Pharmaceuticals',
							'body' => 'Supplier registered to Lakshmi Pharmaceuticals'
						);
						$this->Usermodel->insert_supplier_event($timelineData);
					}

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
	public function AgentKYCRegistration(){
		if (!$this->session->userdata('id')) {
			// User is not logged in, redirect to login page
			redirect('index.php/Usercontroller/index');
		}
		$id = $this->session->userdata('id');
		$data['timeline'] = $this->Usermodel->get_timeline($id);

		$kycStatus = $this->Usermodel->check_kyc_status($id);
        $data['kyc_pending'] = !$kycStatus;
		$data['user_data'] = $this->Usermodel->getUserData($id);
		$data['document_exist'] = $this->Usermodel->getUserDocuments($id );
		$data['kyc_registration'] = $this->Usermodel->getKycRegistration($id );

		$this->load->view('agent/agent_header',$data);
		$this->load->view('agent/agent_kyc_registration');

	}

	public function supplierKYCRegistration(){
		if (!$this->session->userdata('id')) {
			// User is not logged in, redirect to login page
			redirect('index.php/Usercontroller/index');
		}
		$id = $this->session->userdata('id');
		$data['timeline'] = $this->Usermodel->get_timeline($id);

		$kycStatus = $this->Usermodel->check_kyc_status($id);
        $data['kyc_pending'] = !$kycStatus;
		$data['user_data'] = $this->Usermodel->getUserData($id);
		$data['document_exist'] = $this->Usermodel->getUserDocuments($id );
		$data['kyc_registration'] = $this->Usermodel->getKycRegistration($id );

		$this->load->view('supplier/supplier_header',$data);
		$this->load->view('supplier/supplier_kyc_registration');
	}

	public function FranchiseKYCRegistration() {
		if (!$this->session->userdata('id')) {
			// User is not logged in, redirect to login page
			redirect('index.php/Usercontroller/index');
		}
		$id = $this->session->userdata('id');
		$data['timeline'] = $this->Usermodel->get_franchise_timeline($id);

		$kycStatus = $this->Usermodel->check_kyc_status($id);
        $data['kyc_pending'] = !$kycStatus;
		$data['user_data'] = $this->Usermodel->getUserData($id);
		$data['document_exist'] = $this->Usermodel->getUserDocuments($id );
		$data['kyc_registration'] = $this->Usermodel->getKycRegistration($id );

		$this->load->view('franchise/franchise_header',$data);
		$this->load->view('franchise/franchise_kyc_registration');
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
			// Pass file names to view or process as needed

			$uploadData = array();
			$errors = array();
			$uploaded_other_doc_names = '';
			// $delimiter = '';
			
			
			// Generate unique names for each file
			$userId = $this->session->userdata('id');
			$timestamp = date('YmdHis');
			$drugLicenseName = $userId . '_' . $timestamp . '_' . $_FILES["drug_license"]['name'];
			$nationalIdProofName = $userId . '_' . $timestamp . '_' . $_FILES["national_id_proof"]['name'];
			$companyIncorporationName = $userId . '_' . $timestamp . '_' . $_FILES["company_incorporation"]['name'];

			// foreach ($_FILES['other_documents']['name'] as $key => $file) {
			// 	$_FILES['userfile']['name'] = $_FILES['other_documents']['name'][$key];
			// 	$_FILES['userfile']['type'] = $_FILES['other_documents']['type'][$key];
			// 	$_FILES['userfile']['tmp_name'] = $_FILES['other_documents']['tmp_name'][$key];
			// 	$_FILES['userfile']['error'] = $_FILES['other_documents']['error'][$key];
			// 	$_FILES['userfile']['size'] = $_FILES['other_documents']['size'][$key];
	
			// 	if ($this->upload->do_upload('userfile')) {
			// 		$uploadData[$key] = $this->upload->data();
			// 		$doc_name = $userId . '_' . $timestamp . '_' . $_FILES['other_documents']['name'][$key];
			// 		$uploaded_other_doc_names .= $delimiter.$doc_name;
			// 		$delimiter = '|';
			// 		$uploadotherfile = move_uploaded_file($_FILES['other_documents']['tmp_name'][$key], $upload_path . $doc_name);
			// 	} else {
			// 		$errors[$key] = array('error' => $this->upload->display_errors());
			// 	}
			// }
			
			// Move the uploaded files to the destination folder with the custom names
			$uploadSuccess1 = move_uploaded_file($_FILES['drug_license']['tmp_name'], $upload_path . $drugLicenseName);
			$uploadSuccess2 = move_uploaded_file($_FILES['national_id_proof']['tmp_name'], $upload_path . $nationalIdProofName);
			$uploadSuccess3 = move_uploaded_file($_FILES['company_incorporation']['tmp_name'], $upload_path . $companyIncorporationName);

			
			
			if ($uploadSuccess2 && empty($errors)) {
				// Files moved successfully, insert their details into the database
				$data['company_incorporation_certificate'] = $companyIncorporationName;
				$data['drug_license'] = $drugLicenseName;
				$data['national_id_proof'] = $nationalIdProofName;
				$data['user_id'] = $userId;
				$data['status'] = 'pending';
				$data['other_documents'] = $uploaded_other_doc_names;
				
				// Insert document details into the database
				$response = $this->Usermodel->userUploadDocuments($data);
				
				if ($response) {

					$timelineData = array(
						'agent_id' => $userId,
						'event_date' => date('Y-m-d'), // Current date
						'event_time' => date('H:i:s'), // Current time
						'icon' => 'fas fa-user bg-green',
						'header' => 'KYC Verification',
						'body' => 'Agent KYC verification started'
					);
					$this->Usermodel->insert_event($timelineData);

					redirect('index.php/Usercontroller/agentHome');
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


	public function userKYCUploadDocuments(){
		
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
		$config['allowed_types'] = 'gif|jpg|png|pdf|jpeg'; // Specify the allowed file types
		$config['max_size'] = 2048; // Specify the maximum file size in kilobytes
		$config['encrypt_name'] = FALSE; // Do not encrypt the file name
		$this->upload->initialize($config);

		
		
		// Check if files are being uploaded
		if ($this->upload->do_upload('drug_license')) {

			// Files uploaded successfully
			// Get uploaded file data
			$upload_data1 = $this->upload->data('drug_license');
			// Pass file names to view or process as needed

			$uploadData = array();
			$errors = array();
			$uploaded_other_doc_names = '';
			$delimiter = '';
			
			
			// Generate unique names for each file
			$userId = $this->session->userdata('id');
			$timestamp = date('YmdHis');
			$drugLicenseName = $userId . '_' . $timestamp . '_' . $_FILES["drug_license"]['name'];

			foreach ($_FILES['other_documents']['name'] as $key => $file) {
				$_FILES['userfile']['name'] = $_FILES['other_documents']['name'][$key];
				$_FILES['userfile']['type'] = $_FILES['other_documents']['type'][$key];
				$_FILES['userfile']['tmp_name'] = $_FILES['other_documents']['tmp_name'][$key];
				$_FILES['userfile']['error'] = $_FILES['other_documents']['error'][$key];
				$_FILES['userfile']['size'] = $_FILES['other_documents']['size'][$key];
	
				if ($this->upload->do_upload('userfile')) {
					$uploadData[$key] = $this->upload->data();
					$doc_name = $userId . '_' . $timestamp . '_' . $_FILES['other_documents']['name'][$key];
					$uploaded_other_doc_names .= $delimiter.$doc_name;
					$delimiter = '|';
					$uploadotherfile = move_uploaded_file($_FILES['other_documents']['tmp_name'][$key], $upload_path . $doc_name);
				} else {
					$errors[$key] = array('error' => $this->upload->display_errors());
				}
			}
			
			// Move the uploaded files to the destination folder with the custom names
			$uploadSuccess1 = move_uploaded_file($_FILES['drug_license']['tmp_name'], $upload_path . $drugLicenseName);

			
			
			if ($uploadSuccess1 && empty($errors)) {
				// Files moved successfully, insert their details into the database
				$data['company_incorporation_certificate'] = '';
				$data['drug_license'] = $drugLicenseName;
				$data['national_id_proof'] = '';
				$data['user_id'] = $userId;
				$data['status'] = 'pending';
				$data['other_documents'] = $uploaded_other_doc_names;
				$data['tax_details'] = $this->input->get_post('tax_details');
				$data['iec_code'] = $this->input->get_post('iec_code');
				
				// Insert document details into the database
				$response = $this->Usermodel->userUploadDocuments($data);
				
				if ($response) {

					$timelineData = array(
						'agent_id' => $userId,
						'event_date' => date('Y-m-d'), // Current date
						'event_time' => date('H:i:s'), // Current time
						'icon' => 'fas fa-user bg-green',
						'header' => 'KYC Verification',
						'body' => 'Agent KYC verification started'
					);
					$this->Usermodel->insert_event($timelineData);

					redirect('index.php/Usercontroller/userHome');

				} else {
					print_r($response);
					return;
					// Error inserting data into the database
					// Handle the error as needed
				}
			} else {
				// Error moving files to the destination folder
				// Handle the error as needed
				print_r($errors);
				return;
			}
		} else {
			// Error uploading files
			$error1 = $this->upload->display_errors();
			$error2 = $this->upload->display_errors();
			$error3 = $this->upload->display_errors();
			echo $error1;
			return;
			// $this->agentProfile();
			// Handle the errors as needed
		}
		
	}

	public function franchiseKYCUploadDocuments() {
		
		// Check if the user is logged in
		if (!$this->session->userdata('id')) {
			// User is not logged in, redirect to login page
			redirect('index.php/Usercontroller/index');
		}
	
		// Check if the user has already uploaded documents
		$userId = $this->session->userdata('id');
		$existingDocuments = $this->Usermodel->getUserDocuments($userId);
	
		if ($existingDocuments) {
			
			$this->franchiseProfile();
		}
		
		// Load the upload library
		$this->load->library('upload');
		
		$upload_path = FCPATH . 'assets/KYC_Documents/';
		
		// Set the upload path in the configuration
		$config['upload_path'] = $upload_path;
		$config['allowed_types'] = 'gif|jpg|png|pdf|jpeg'; // Specify the allowed file types
		$config['max_size'] = 2048; // Specify the maximum file size in kilobytes
		$config['encrypt_name'] = FALSE; // Do not encrypt the file name
		$this->upload->initialize($config);

		
		
		// Check if files are being uploaded
		if ($this->upload->do_upload('drug_license')) {

			// Files uploaded successfully
			// Get uploaded file data
			$upload_data1 = $this->upload->data('drug_license');
			// Pass file names to view or process as needed

			$uploadData = array();
			$errors = array();
			$uploaded_other_doc_names = '';
			$delimiter = '';
			
			
			// Generate unique names for each file
			$userId = $this->session->userdata('id');
			$timestamp = date('YmdHis');
			$drugLicenseName = $userId . '_' . $timestamp . '_' . $_FILES["drug_license"]['name'];

			foreach ($_FILES['other_documents']['name'] as $key => $file) {
				$_FILES['userfile']['name'] = $_FILES['other_documents']['name'][$key];
				$_FILES['userfile']['type'] = $_FILES['other_documents']['type'][$key];
				$_FILES['userfile']['tmp_name'] = $_FILES['other_documents']['tmp_name'][$key];
				$_FILES['userfile']['error'] = $_FILES['other_documents']['error'][$key];
				$_FILES['userfile']['size'] = $_FILES['other_documents']['size'][$key];
	
				if ($this->upload->do_upload('userfile')) {
					$uploadData[$key] = $this->upload->data();
					$doc_name = $userId . '_' . $timestamp . '_' . $_FILES['other_documents']['name'][$key];
					$uploaded_other_doc_names .= $delimiter.$doc_name;
					$delimiter = '|';
					$uploadotherfile = move_uploaded_file($_FILES['other_documents']['tmp_name'][$key], $upload_path . $doc_name);
				} else {
					$errors[$key] = array('error' => $this->upload->display_errors());
				}
			}
			
			// Move the uploaded files to the destination folder with the custom names
			$uploadSuccess1 = move_uploaded_file($_FILES['drug_license']['tmp_name'], $upload_path . $drugLicenseName);

			
			
			if ($uploadSuccess1 && empty($errors)) {
				// Files moved successfully, insert their details into the database
				$data['company_incorporation_certificate'] = '';
				$data['drug_license'] = $drugLicenseName;
				$data['national_id_proof'] = '';
				$data['user_id'] = $userId;
				$data['status'] = 'pending';
				$data['other_documents'] = $uploaded_other_doc_names;
				$data['tax_details'] = $this->input->get_post('tax_details');
				$data['iec_code'] = $this->input->get_post('iec_code');
				
				// Insert document details into the database
				$response = $this->Usermodel->userUploadDocuments($data);
				
				if ($response) {

					$timelineData = array(
						'franchise_id' => $userId,
						'event_date' => date('Y-m-d'), // Current date
						'event_time' => date('H:i:s'), // Current time
						'icon' => 'fas fa-user bg-green',
						'header' => 'KYC Verification',
						'body' => 'Franchise KYC verification started'
					);
					$this->Usermodel->insert_franchise_event($timelineData);

					$this->franchiseProfile();

				} else {
					print_r($response);
					return;
					// Error inserting data into the database
					// Handle the error as needed
				}
			} else {
				// Error moving files to the destination folder
				// Handle the error as needed
				print_r($errors);
				return;
			}
		} else {
			// Error uploading files
			$error1 = $this->upload->display_errors();
			$error2 = $this->upload->display_errors();
			$error3 = $this->upload->display_errors();
			echo $error1;
			return;
			// $this->agentProfile();
			// Handle the errors as needed
		}
		

	}

	public function supplierKYCUploadDocuments() {
		// Check if the user is logged in
		if (!$this->session->userdata('id')) {
			// User is not logged in, redirect to login page
			redirect('index.php/Usercontroller/index');
		}
	
		// Check if the user has already uploaded documents
		$userId = $this->session->userdata('id');
		$existingDocuments = $this->Usermodel->getUserDocuments($userId);
	
		if ($existingDocuments) {
			
			$this->supplierProfile();
		}
		
		// Load the upload library
		$this->load->library('upload');
		
		$upload_path = FCPATH . 'assets/KYC_Documents/';
		
		// Set the upload path in the configuration
		$config['upload_path'] = $upload_path;
		$config['allowed_types'] = 'gif|jpg|png|pdf|jpeg'; // Specify the allowed file types
		$config['max_size'] = 2048; // Specify the maximum file size in kilobytes
		$config['encrypt_name'] = FALSE; // Do not encrypt the file name
		$this->upload->initialize($config);

		
		
		// Check if files are being uploaded
		if ($this->upload->do_upload('national_id_proof') && $this->upload->do_upload('drug_license') && $this->upload->do_upload('gmp_certificate')) {

		// if ($this->upload->do_upload('drug_license') && $this->upload->do_upload('national_id_proof') && $this->upload->do_upload('company_incorporation')) {
			// Files uploaded successfully
			// Get uploaded file data
			$upload_data1 = $this->upload->data('drug_license');
			$upload_data2 = $this->upload->data('national_id_proof');
			$upload_data3 = $this->upload->data('gmp_certificate');
			// Pass file names to view or process as needed

			$uploadData = array();
			$errors = array();
			$uploaded_other_doc_names = '';
			$delimiter = '';
			
			
			// Generate unique names for each file
			$userId = $this->session->userdata('id');
			$timestamp = date('YmdHis');
			$drugLicenseName = $userId . '_' . $timestamp . '_' . $_FILES["drug_license"]['name'];
			$nationalIdProofName = $userId . '_' . $timestamp . '_' . $_FILES["national_id_proof"]['name'];
			$gmpcertificateName = $userId . '_' . $timestamp . '_' . $_FILES["gmp_certificate"]['name'];

			foreach ($_FILES['other_documents']['name'] as $key => $file) {
				$_FILES['userfile']['name'] = $_FILES['other_documents']['name'][$key];
				$_FILES['userfile']['type'] = $_FILES['other_documents']['type'][$key];
				$_FILES['userfile']['tmp_name'] = $_FILES['other_documents']['tmp_name'][$key];
				$_FILES['userfile']['error'] = $_FILES['other_documents']['error'][$key];
				$_FILES['userfile']['size'] = $_FILES['other_documents']['size'][$key];
	
				if ($this->upload->do_upload('userfile')) {
					$uploadData[$key] = $this->upload->data();
					$doc_name = $userId . '_' . $timestamp . '_' . $_FILES['other_documents']['name'][$key];
					$uploaded_other_doc_names .= $delimiter.$doc_name;
					$delimiter = '|';
					$uploadotherfile = move_uploaded_file($_FILES['other_documents']['tmp_name'][$key], $upload_path . $doc_name);
				} else {
					$errors[$key] = array('error' => $this->upload->display_errors());
				}
			}
			
			// Move the uploaded files to the destination folder with the custom names
			$uploadSuccess1 = move_uploaded_file($_FILES['drug_license']['tmp_name'], $upload_path . $drugLicenseName);
			$uploadSuccess2 = move_uploaded_file($_FILES['national_id_proof']['tmp_name'], $upload_path . $nationalIdProofName);
			$uploadSuccess3 = move_uploaded_file($_FILES['gmp_certificate']['tmp_name'], $upload_path . $gmpcertificateName);

			
			
			if ($uploadSuccess2 && empty($errors)) {
				// Files moved successfully, insert their details into the database
				$data['company_incorporation_certificate'] = '';
				$data['drug_license'] = $drugLicenseName;
				$data['gmp_certificate'] = $gmpcertificateName;
				$data['national_id_proof'] = $nationalIdProofName;
				$data['user_id'] = $userId;
				$data['tax_details'] = $this->input->get_post('tax_details');;
				$data['status'] = 'pending';
				$data['other_documents'] = $uploaded_other_doc_names;
				
				// Insert document details into the database
				$response = $this->Usermodel->userUploadDocuments($data);
				
				if ($response) {

					$timelineData = array(
						'supplier_id' => $userId,
						'event_date' => date('Y-m-d'), // Current date
						'event_time' => date('H:i:s'), // Current time
						'icon' => 'fas fa-user bg-green',
						'header' => 'KYC Verification',
						'body' => 'Supplier KYC verification started'
					);
					$this->Usermodel->insert_supplier_event($timelineData);

					$this->supplierProfile();

				} else {
					print_r($response);
					return;
					// Error inserting data into the database
					// Handle the error as needed
				}
			} else {
				// Error moving files to the destination folder
				// Handle the error as needed
				print_r($errors);
				return;
			}
		} else {
			// Error uploading files
			$error1 = $this->upload->display_errors();
			$error2 = $this->upload->display_errors();
			$error3 = $this->upload->display_errors();
			echo $error1;
			return;
			// $this->agentProfile();
			// Handle the errors as needed
		}
		
	}


	public function agentKYCUploadDocuments(){
		
		// Check if the user is logged in
		if (!$this->session->userdata('id')) {
			// User is not logged in, redirect to login page
			redirect('index.php/Usercontroller/index');
		}
	
		// Check if the user has already uploaded documents
		$userId = $this->session->userdata('id');
		$existingDocuments = $this->Usermodel->getUserDocuments($userId);
	
		if ($existingDocuments) {
			
			$this->agentProfile();
		}
		
		// Load the upload library
		$this->load->library('upload');
		
		$upload_path = FCPATH . 'assets/KYC_Documents/';
		
		// Set the upload path in the configuration
		$config['upload_path'] = $upload_path;
		$config['allowed_types'] = 'gif|jpg|png|pdf|jpeg'; // Specify the allowed file types
		$config['max_size'] = 2048; // Specify the maximum file size in kilobytes
		$config['encrypt_name'] = FALSE; // Do not encrypt the file name
		$this->upload->initialize($config);

		
		
		// Check if files are being uploaded
		if ($this->upload->do_upload('national_id_proof')) {

		// if ($this->upload->do_upload('drug_license') && $this->upload->do_upload('national_id_proof') && $this->upload->do_upload('company_incorporation')) {
			// Files uploaded successfully
			// Get uploaded file data
			// $upload_data1 = $this->upload->data('drug_license');
			$upload_data2 = $this->upload->data('national_id_proof');
			// $upload_data3 = $this->upload->data('company_incorporation');
			// Pass file names to view or process as needed

			$uploadData = array();
			$errors = array();
			$uploaded_other_doc_names = '';
			$delimiter = '';
			
			
			// Generate unique names for each file
			$userId = $this->session->userdata('id');
			$timestamp = date('YmdHis');
			// $drugLicenseName = $userId . '_' . $timestamp . '_' . $_FILES["drug_license"]['name'];
			$nationalIdProofName = $userId . '_' . $timestamp . '_' . $_FILES["national_id_proof"]['name'];
			// $companyIncorporationName = $userId . '_' . $timestamp . '_' . $_FILES["company_incorporation"]['name'];

			foreach ($_FILES['other_documents']['name'] as $key => $file) {
				$_FILES['userfile']['name'] = $_FILES['other_documents']['name'][$key];
				$_FILES['userfile']['type'] = $_FILES['other_documents']['type'][$key];
				$_FILES['userfile']['tmp_name'] = $_FILES['other_documents']['tmp_name'][$key];
				$_FILES['userfile']['error'] = $_FILES['other_documents']['error'][$key];
				$_FILES['userfile']['size'] = $_FILES['other_documents']['size'][$key];
	
				if ($this->upload->do_upload('userfile')) {
					$uploadData[$key] = $this->upload->data();
					$doc_name = $userId . '_' . $timestamp . '_' . $_FILES['other_documents']['name'][$key];
					$uploaded_other_doc_names .= $delimiter.$doc_name;
					$delimiter = '|';
					$uploadotherfile = move_uploaded_file($_FILES['other_documents']['tmp_name'][$key], $upload_path . $doc_name);
				} else {
					$errors[$key] = array('error' => $this->upload->display_errors());
				}
			}
			
			// Move the uploaded files to the destination folder with the custom names
			// $uploadSuccess1 = move_uploaded_file($_FILES['drug_license']['tmp_name'], $upload_path . $drugLicenseName);
			$uploadSuccess2 = move_uploaded_file($_FILES['national_id_proof']['tmp_name'], $upload_path . $nationalIdProofName);
			// $uploadSuccess3 = move_uploaded_file($_FILES['company_incorporation']['tmp_name'], $upload_path . $companyIncorporationName);

			
			
			if ($uploadSuccess2 && empty($errors)) {
				// Files moved successfully, insert their details into the database
				$data['company_incorporation_certificate'] = '';
				$data['drug_license'] = '';
				$data['national_id_proof'] = $nationalIdProofName;
				$data['user_id'] = $userId;
				$data['status'] = 'pending';
				$data['other_documents'] = $uploaded_other_doc_names;
				
				// Insert document details into the database
				$response = $this->Usermodel->userUploadDocuments($data);
				
				if ($response) {

					$timelineData = array(
						'agent_id' => $userId,
						'event_date' => date('Y-m-d'), // Current date
						'event_time' => date('H:i:s'), // Current time
						'icon' => 'fas fa-user bg-green',
						'header' => 'KYC Verification',
						'body' => 'Agent KYC verification started'
					);
					$this->Usermodel->insert_event($timelineData);

					$this->agentProfile();

				} else {
					print_r($response);
					return;
					// Error inserting data into the database
					// Handle the error as needed
				}
			} else {
				// Error moving files to the destination folder
				// Handle the error as needed
				print_r($errors);
				return;
			}
		} else {
			// Error uploading files
			$error1 = $this->upload->display_errors();
			$error2 = $this->upload->display_errors();
			$error3 = $this->upload->display_errors();
			echo $error1;
			return;
			// $this->agentProfile();
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
		// echo json_encode($id);
		// die();

		$this->load->view('customer/user_header',$data);
		$this->load->view('customer/user_kyc_status');
	}

	public function franchiseKycStatus(){
		// Check if the user is logged in
		if (!$this->session->userdata('id')) {
			// User is not logged in, redirect to login page
			redirect('index.php/Usercontroller/index');
		}
		
		$id = $this->session->userdata('id');
		$data['user_data'] = $this->Usermodel->getUserData($id);
		$data['user_documents'] = $this->Usermodel->getUserDocumentsSubmitted($id);
		$kycStatus = $this->Usermodel->check_kyc_status($id);
		
		$data['timeline'] = $this->Usermodel->get_franchise_timeline($id);
        $data['kyc_pending'] = !$kycStatus;
		// echo json_encode($id);
		// die();

		$this->load->view('franchise/franchise_header',$data);
		$this->load->view('franchise/franchise_kyc_status');
	}

	public function agentKycStatus(){
		// Check if the user is logged in
		if (!$this->session->userdata('id')) {
			// User is not logged in, redirect to login page
			redirect('index.php/Usercontroller/index');
		}
		$id = $this->session->userdata('id');
		$data['user_data'] = $this->Usermodel->getUserData($id);
		$data['user_documents'] = $this->Usermodel->getUserDocumentsSubmitted($id);
		$kycStatus = $this->Usermodel->check_kyc_status($id);
        $data['kyc_pending'] = !$kycStatus;
		// echo json_encode($id);
		// die();

		$this->load->view('agent/agent_header',$data);
		$this->load->view('agent/agent_kyc_status');
	}

	public function supplierKycStatus(){
		// Check if the user is logged in
		if (!$this->session->userdata('id')) {
			// User is not logged in, redirect to login page
			redirect('index.php/Usercontroller/index');
		}
		$id = $this->session->userdata('id');
		$data['user_data'] = $this->Usermodel->getUserData($id);
		$data['user_documents'] = $this->Usermodel->getUserDocumentsSubmitted($id);
		$kycStatus = $this->Usermodel->check_kyc_status($id);
        $data['kyc_pending'] = !$kycStatus;
		// echo json_encode($id);
		// die();

		$this->load->view('supplier/supplier_header',$data);
		$this->load->view('supplier/supplier_kyc_status');
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

	//Update agent bank details
	public function userUpdateBankDetails(){ 
		try {
			if (!$this->session->userdata('id')) {
				// User is not logged in, redirect to login page
				redirect('index.php/Usercontroller/index');
			}

			$id = $this->session->userdata('id');
			$data['user_id'] = $id;
			$data['account_no'] = $this->input->get_post('account_no');
			$data['swift_code'] = $this->input->get_post('swift_code');
			$data['acc_holder_name'] = $this->input->get_post('acc_holder_name');
			$data['bank_name'] = $this->input->get_post('bank_name');
			$data['iban_no'] = $this->input->get_post('iban_no');
			$data['bank_address'] = $this->input->get_post('bank_address');
			$response = $this->Usermodel->userUpdateBankDetails($data,$id);
			if($response ==true){
				echo "<script>alert('Bank Details updated successfully');</script>";
				$this->agentProfile();
			}
		} catch (Exception $e) {
			// Log error to the database
			$this->ErrorLogModel->logError($e->getMessage(), $e->getFile(), $e->getLine());
			redirect('index.php/Admincontroller/ServerError');
		}		
	}


	public function franchiseUpdateBankDetails() {
		try {
			if (!$this->session->userdata('id')) {
				// User is not logged in, redirect to login page
				redirect('index.php/Usercontroller/index');
			}

			$id = $this->session->userdata('id');
			$data['user_id'] = $id;
			$data['account_no'] = $this->input->get_post('account_no');
			$data['swift_code'] = $this->input->get_post('swift_code');
			$data['acc_holder_name'] = $this->input->get_post('acc_holder_name');
			$data['bank_name'] = $this->input->get_post('bank_name');
			$data['iban_no'] = $this->input->get_post('iban_no');
			$data['bank_address'] = $this->input->get_post('bank_address');
			$response = $this->Usermodel->franchiseUpdateBankDetails($data,$id);
			if($response ==true){
				echo "<script>alert('Bank Details updated successfully');</script>";
				$this->franchiseProfile();
			}
		} catch (Exception $e) {
			// Log error to the database
			$this->ErrorLogModel->logError($e->getMessage(), $e->getFile(), $e->getLine());
			redirect('index.php/Admincontroller/ServerError');
		}		
	}

	
}

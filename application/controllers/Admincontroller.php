<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admincontroller extends CI_Controller {

	public function adminDashboard(){
        if (!$this->session->userdata('id')) {
			// User is not logged in, redirect to login page
			redirect('index.php/Usercontroller/index');
		}

        $id = $this->session->userdata('id');

		$data['user_data'] = $this->Usermodel->getUserData($id);
		$data['inquiry_count'] = $this->Usermodel->getInquiryCount();
		$data['kyc_count'] = $this->Usermodel->getKYCCount();
		$data['white_label_count'] = $this->Usermodel->getWhiteLabelCount();
		$data['user_count'] = $this->Usermodel->getUserCount();
        $this->load->view('admin/admin_header',$data);
        $this->load->view('admin/admin_home',$data);
    }
    public function adminProfile(){
        if (!$this->session->userdata('id')) {
			// User is not logged in, redirect to login page
			redirect('index.php/Usercontroller/index');
		}

        $id = $this->session->userdata('id');

		$data['user_data'] = $this->Usermodel->getUserData($id);
        $this->load->view('admin/admin_header',$data);
        $this->load->view('admin/admin_profile',$data);
    }
    public function adminUpdateProfile(){
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
				$this->session->set_flashdata('success', 'Profile updated successfully');

				// redirect('index.php/Admincontroller/adminProfile');
			}
			$this->adminProfile();
		} catch (Exception $e) {
			// Log error to the database
			$this->ErrorLogModel->logError($e->getMessage(), $e->getFile(), $e->getLine());
			redirect('index.php/Admincontroller/ServerError');
		}
		
	}
	public function ServerError(){
		if (!$this->session->userdata('id')) {
			// User is not logged in, redirect to login page
			redirect('index.php/Usercontroller/index');
		}

        $id = $this->session->userdata('id');

		$data['user_data'] = $this->Usermodel->getUserData($id);
        $this->load->view('admin/admin_header',$data);
        $this->load->view('redirect/500',$data);
	}
	public function adminViewUsers(){
		if (!$this->session->userdata('id')) {
			// User is not logged in, redirect to login page
			redirect('index.php/Usercontroller/index');
		}
	
		$id = $this->session->userdata('id');
	
		// Pagination configuration
		$config['base_url'] = base_url('index.php/Admincontroller/adminViewUsers');
		$config['total_rows'] = $this->Usermodel->countAllUserData(); // Method to count total users
		$config['per_page'] = 9; // Number of users per page
		$config['uri_segment'] = 3; // URI segment containing the page number
	
		// Initialize pagination
		$this->pagination->initialize($config);
	
		// Fetch user data for the current page
		$page = ($this->uri->segment(3)) ? $this->uri->segment(3) : 0;
		$data['users'] = $this->Usermodel->getUsersPerPage($config['per_page'], $page);
	
		// Load view with pagination links
		$data['pagination_links'] = $this->pagination->create_links();
		$data['user_data'] = $this->Usermodel->getUserData($id);
		$this->load->view('admin/admin_header',$data);
		$this->load->view('admin/admin_view_users',$data);
	}

	public function adminUserRegistration(){
		if (!$this->session->userdata('id')) {
			// User is not logged in, redirect to login page
			redirect('index.php/Usercontroller/index');
		}

        $id = $this->session->userdata('id');

		$data['user_data'] = $this->Usermodel->getUserData($id);
        $this->load->view('admin/admin_header',$data);
        $this->load->view('admin/admin_add_users',$data);
	}

	public function AdminInsertUser() {
        // Retrieve form data
        $data = array(
            'firstname' => $this->input->post('firstname'),
            'lastname' => $this->input->post('lastname'),
            'mobile' => $this->input->post('mobile'),
            'email' => $this->input->post('email'),
            'password' => password_hash($this->input->post('password'), PASSWORD_DEFAULT), // Hash the password
            'admin' => $this->input->post('admin') ? 1 : 0,
            'cname' => $this->input->post('cname'),
            'designation' => $this->input->post('designation'),
            'message' => $this->input->post('message'),
            'import' => $this->input->post('import'),
            'address' => $this->input->post('address'),
            'order_address' => $this->input->post('order_address'),
            'role' => $this->input->post('role')
        );

        // Insert into database
        $response = $this->Usermodel->AdminInsertUser($data);
    	// Check if insertion was successful
		if ($response) {
			$this->session->set_flashdata('success', 'User added');

		} else {
			$this->session->set_flashdata('error', 'Failed to add user');
		}
		$this->adminUserRegistration();
    }

	public function adminViewUserProfile(){
        if (!$this->session->userdata('id')) {
			// User is not logged in, redirect to login page
			redirect('index.php/Usercontroller/index');
		}

        $id = $this->session->userdata('id');
		$user_id = $this->input->get('user_id');

		$data['user_data'] = $this->Usermodel->getUserData($id);
		$data['user_profile'] = $this->Usermodel->getUserProfile($user_id);
        $this->load->view('admin/admin_header',$data);
        $this->load->view('admin/admin_view_user_profile',$data);
    }
	public function adminViewInquiry(){
        if (!$this->session->userdata('id')) {
			// User is not logged in, redirect to login page
			redirect('index.php/Usercontroller/index');
		}

        $id = $this->session->userdata('id');

		$data['user_data'] = $this->Usermodel->getUserData($id);
		$data['inquiry'] = $this->Usermodel->getProductInquiries();
        $this->load->view('admin/admin_header',$data);
        $this->load->view('admin/admin_view_inquiry',$data);
    }
	public function productInquiryDetails(){
		if (!$this->session->userdata('id')) {
			// User is not logged in, redirect to login page
			redirect('index.php/Usercontroller/index');
		}

        $id = $this->session->userdata('id');

		$inquiry_id = $this->input->get('inquiry_id');

		$data['user_data'] = $this->Usermodel->getUserData($id);
		$data['inquiry_details'] = $this->Usermodel->getProductInquiryDetails($inquiry_id);
        $this->load->view('admin/admin_header',$data);
        $this->load->view('admin/admin_view_product_inquiry_details',$data);
	}

	public function adminUpdateUserProfile(){
		if (!$this->session->userdata('id')) {
			// User is not logged in, redirect to login page
			redirect('index.php/Usercontroller/index');
		}
		
		$id = $this->session->userdata('id');
		$user_id = $this->input->get_post('user_id');
		$data['firstname'] = $this->input->get_post('firstname');
		$data['lastname'] = $this->input->get_post('lastname');
		$data['email'] = $this->input->get_post('email');
		$data['mobile'] = $this->input->get_post('mobile');
		$data['cname'] = $this->input->get_post('cname');
		$data['designation'] = $this->input->get_post('designation');
		$response = $this->Usermodel->userUpdateProfile($data, $user_id);
		if($response ==true){
            $this->session->set_flashdata('success', 'Profile updated successfully');

			 redirect('index.php/Admincontroller/adminViewUserProfile?user_id='.$user_id);
		}
		
	}
	public function approveProduct(){
		if (!$this->session->userdata('id')) {
			// User is not logged in, redirect to login page
			redirect('index.php/Usercontroller/index');
		}
		$inquiry_id = $this->input->get('inquiry_id');
		$response = $this->Usermodel->approveProduct($inquiry_id);
		if($response ==true){
            $this->session->set_flashdata('success', 'Profile updated successfully');

			 redirect('index.php/Admincontroller/adminViewInquiry');
		}
	}
	public function rejectProduct(){
		if (!$this->session->userdata('id')) {
			// User is not logged in, redirect to login page
			redirect('index.php/Usercontroller/index');
		}
		$inquiry_id = $this->input->get('inquiry_id');
		$response = $this->Usermodel->rejectProduct($inquiry_id);
		if($response ==true){
            $this->session->set_flashdata('success', 'Profile updated successfully');

			 redirect('index.php/Admincontroller/adminViewInquiry');
		}
	}
	public function adminViewKyc(){
        if (!$this->session->userdata('id')) {
			// User is not logged in, redirect to login page
			redirect('index.php/Usercontroller/index');
		}

        $id = $this->session->userdata('id');
		$data['user_data'] = $this->Usermodel->getUserData($id);
		$data['kyc_data'] = $this->Usermodel->getKYCData();

        $this->load->view('admin/admin_header',$data);
        $this->load->view('admin/admin_view_kyc',$data);
    }
	public function whiteLabelProducts(){
        if (!$this->session->userdata('id')) {
			// User is not logged in, redirect to login page
			redirect('index.php/Usercontroller/index');
		}

        $id = $this->session->userdata('id');
		$data['user_data'] = $this->Usermodel->getUserData($id);
		$data['white_label_products'] = $this->Usermodel->getWhiteLabelProducts($id);
		$data['dosage_form'] = $this->Usermodel->getDosageFrom();

        $this->load->view('admin/admin_header',$data);
        $this->load->view('admin/admin_add_white_label_products');
    }

	public function AddWhiteLabelProducts() {
		if (!$this->session->userdata('id')) {
			// User is not logged in, redirect to login page
			redirect('index.php/Usercontroller/index');
		}
		// Fetch values from the form
		$product_name = $this->input->post('product_name');
		$product_description = $this->input->post('product_description');
		$content = $this->input->post('content');
		$dosage_form = $this->input->post('dosage_form');
		$strength = $this->input->post('strength');
		$therapeutic_use = $this->input->post('therapeutic_use');
	
		$upload_path = FCPATH . 'assets/white_label_products/';

		// Set the upload path in the configuration
		$config['upload_path'] = $upload_path;
		$config['allowed_types'] = 'gif|jpg|jpeg|png|pdf'; // Define allowed file types
		$config['max_size'] = 1024 * 5; // Define max file size (in KB)
	
		// Load the upload library
		$this->load->library('upload', $config);
		
	
		// Perform file upload
		if ($this->upload->do_upload('image')) {
			// File uploaded successfully, get file data
			$file_data = $this->upload->data();
			
	
			// Prepare data array with image file name
			$data = array(
				'product_name' => $product_name,
				'product_description' => $product_description,
				'content' => $content,
				'dosage_form' => $dosage_form,
				'strength' => $strength,
				'therapeutic_use' => $therapeutic_use,
				'image' => $file_data['file_name'] // Save file name to database
			);
	
			// Insert data into white_label_products table using the model
			$response = $this->Usermodel->AddWhiteLabelProducts($data);
			if($response ==true){
				$this->session->set_flashdata('success', 'Product added successfully');
				redirect('index.php/Admincontroller/whiteLabelProducts');			
			}
		} else {
			// File upload failed, handle errors
			$upload_error = $this->upload->display_errors();
			echo $upload_error;
	
			// Handle the case where file upload failed
			// For example, show an error message or redirect to an error page
		}
		
	}
	public function deleteWhiteLabelProduct(){
		if (!$this->session->userdata('id')) {
			// User is not logged in, redirect to login page
			redirect('index.php/Usercontroller/index');
		}
		$product_id = $this->input->get('product_id');
		$response = $this->Usermodel->deleteWhiteLabelProduct($product_id);
		if($response ==true){
			$this->session->set_flashdata('success', 'Product deleted');
			redirect('index.php/Admincontroller/whiteLabelProducts');			
		}

	}
	public function brandedProducts(){
		if (!$this->session->userdata('id')) {
			// User is not logged in, redirect to login page
			redirect('index.php/Usercontroller/index');
		}

        $id = $this->session->userdata('id');
		$data['user_data'] = $this->Usermodel->getUserData($id);
		$data['branded_products'] = $this->Usermodel->getBrandedProducts($id);

        $this->load->view('admin/admin_header',$data);
        $this->load->view('admin/admin_add_branded_products',$data);
	}
	public function AddBrandedProducts() {
		if (!$this->session->userdata('id')) {
			// User is not logged in, redirect to login page
			redirect('index.php/Usercontroller/index');
		}
		// Fetch values from the form
		$product_name = $this->input->post('product_name');
		$product_description = $this->input->post('product_description');
		$product_features = $this->input->post('features');

		$date_time = date("Y-m-d H:i:s");
	
		$upload_path = FCPATH . 'assets/Branded_products/';

		// Set the upload path in the configuration
		$config['upload_path'] = $upload_path;
		$config['allowed_types'] = 'gif|jpg|jpeg|png'; // Define allowed file types
		$config['max_size'] = 1024 * 5; // Define max file size (in KB)
	
		// Load the upload library
		$this->load->library('upload', $config);
	
		// Perform file upload
		if ($this->upload->do_upload('image')) {
			// File uploaded successfully, get file data
			$file_data = $this->upload->data();
	
			// Prepare data array with image file name
			$data = array(
				'product_name' => $product_name,
				'product_description' => $product_description,
				'product_features' => $product_features,
				'date_time' => $date_time,
				'image' => $file_data['file_name'] // Save file name to database
			);
	
			// Insert data into white_label_products table using the model
			$response = $this->Usermodel->AddBrandedProducts($data);
			if($response ==true){
				$this->session->set_flashdata('success', 'Product added successfully');
				redirect('index.php/Admincontroller/brandedProducts');			
			}
		} else {
			// File upload failed, handle errors
			$upload_error = $this->upload->display_errors();
	
			// Handle the case where file upload failed
			// For example, show an error message or redirect to an error page
		}		
	}
	public function deleteBrandedProduct(){
		if (!$this->session->userdata('id')) {
			// User is not logged in, redirect to login page
			redirect('index.php/Usercontroller/index');
		}
		$product_id = $this->input->get('product_id');
		$response = $this->Usermodel->deleteBrandedProduct($product_id);
		if($response ==true){
			$this->session->set_flashdata('success', 'Product deleted');
			redirect('index.php/Admincontroller/brandedProducts');			
		}
	}

	public function ImageuploadPage(){
        if (!$this->session->userdata('id')) {
			// User is not logged in, redirect to login page
			redirect('index.php/Usercontroller/index');
		}

        $id = $this->session->userdata('id');
		$data['user_data'] = $this->Usermodel->getUserData($id);

        $this->load->view('admin/admin_header',$data);
        $this->load->view('admin/admin_upload_white_label_product_images',$data);
    }

	public function do_upload() {
        $config['upload_path'] = './uploads/';
        $config['allowed_types'] = 'gif|jpg|png';
        $config['max_size'] = 1024 * 5; // 5MB

        $this->load->library('upload', $config);

        if (!$this->upload->do_upload('userfile')) {
            // If upload fails, display error message
            $error = array('error' => $this->upload->display_errors());
            $this->load->view('upload_form', $error);
        } else {
            // If upload succeeds, process uploaded file
            $data = array('upload_data' => $this->upload->data());
            $this->load->view('upload_success', $data);
        }
    }
	public function adminThirdPartyManufacture(){
		if (!$this->session->userdata('id')) {
			// User is not logged in, redirect to login page
			redirect('index.php/Usercontroller/index');
		}

        $id = $this->session->userdata('id');

		$data['user_data'] = $this->Usermodel->getUserData($id);
		$data['third_party_products'] = $this->Usermodel->getThirdPartyManufacture();
        $this->load->view('admin/admin_header',$data);
        $this->load->view('admin/admin_add_third_party_products',$data);
	}

	public function AddThirdPartyProducts() {
		if (!$this->session->userdata('id')) {
			// User is not logged in, redirect to login page
			redirect('index.php/Usercontroller/index');
		}
		// Fetch values from the form
		$product_name = $this->input->post('product_name');
		$category = $this->input->post('category');
		$dosage_form = $this->input->post('dosage_form');
		$packing_size = $this->input->post('packing_size');
		$pharmacopeia = $this->input->post('pharmacopeia');
		$sample_photo = $this->input->post('image');
		$comments = $this->input->post('comments');
		$comments = $this->input->post('comments');
		$date_time = date("Y-m-d H:i:s");
	
		$upload_path = FCPATH . 'assets/Branded_products/';

		// Set the upload path in the configuration
		$config['upload_path'] = $upload_path;
		$config['allowed_types'] = 'gif|jpg|jpeg|png'; // Define allowed file types
		$config['max_size'] = 1024 * 5; // Define max file size (in KB)
	
		// Load the upload library
		$this->load->library('upload', $config);
	
		// Perform file upload
		if ($this->upload->do_upload('image')) {
			// File uploaded successfully, get file data
			$file_data = $this->upload->data();
	
			// Prepare data array with image file name
			$data = array(
				'product_name' => $product_name,
				'product_description' => $product_description,
				'product_features' => $product_features,
				'date_time' => $date_time,
				'image' => $file_data['file_name'] // Save file name to database
			);
	
			// Insert data into white_label_products table using the model
			$response = $this->Usermodel->AddThirdPartyProducts($data);
			if($response ==true){
				$this->session->set_flashdata('success', 'Product added successfully');
				redirect('index.php/Admincontroller/adminThirdPartyManufacture');			
			}
		} else {
			// File upload failed, handle errors
			$upload_error = $this->upload->display_errors();
	
			// Handle the case where file upload failed
			// For example, show an error message or redirect to an error page
		}		
	}

	public function adminManageDrugCategory(){
		try{
			if (!$this->session->userdata('id')) {
				// User is not logged in, redirect to login page
				redirect('index.php/Usercontroller/index');
			}
	
			$id = $this->session->userdata('id');
	
	
			$data['user_data'] = $this->Usermodel->getUserData($id);
			$data['drug_category'] = $this->Usermodel->getDrugCategory();
			$this->load->view('admin/admin_header',$data);
			$this->load->view('admin/admin_manage_drug_category',$data);

		} catch (Exception $e) {
			// Log error to the database
			$this->ErrorLogModel->logError($e->getMessage(), $e->getFile(), $e->getLine());
			redirect('index.php/Admincontroller/ServerError');
		}
	}
	public function addDrugCategory(){
		try{
			if (!$this->session->userdata('id')) {
				// User is not logged in, redirect to login page
				redirect('index.php/Usercontroller/index');
			}
			
			$data['category_name'] = $this->input->post('category_name');
			$data['description'] = $this->input->post('description');

			$response = $this->Usermodel->addDrugCategory($data);
			if($response ==true){
				$this->session->set_flashdata('success', 'Drug Category Added');				
			}
			redirect('index.php/Admincontroller/adminManageDrugCategory');
			

		} catch (Exception $e) {
			// Log error to the database
			$this->ErrorLogModel->logError($e->getMessage(), $e->getFile(), $e->getLine());
			redirect('index.php/Admincontroller/ServerError');
		}
	}
	public function deleteDrugCategory(){
		try
		{
			if (!$this->session->userdata('id')) {
				// User is not logged in, redirect to login page
				redirect('index.php/Usercontroller/index');
			}
			
			$drug_category_id = $this->input->get('drug_category_id');

			$response = $this->Usermodel->deleteDrugCategory($drug_category_id);
			if($response ==true){
				$this->session->set_flashdata('warning', 'Drug Category Deleted');				
			}
			redirect('index.php/Admincontroller/adminManageDrugCategory');
			

		} 
		catch (Exception $e) {
			// Log error to the database
			$this->ErrorLogModel->logError($e->getMessage(), $e->getFile(), $e->getLine());
			redirect('index.php/Admincontroller/ServerError');
		}
	}

	public function adminManageDosageForm(){
		try{
			if (!$this->session->userdata('id')) {
				// User is not logged in, redirect to login page
				redirect('index.php/Usercontroller/index');
			}
	
			$id = $this->session->userdata('id');
	
	
			$data['user_data'] = $this->Usermodel->getUserData($id);
			$data['dosage_form'] = $this->Usermodel->getDosageForm();
			$this->load->view('admin/admin_header',$data);
			$this->load->view('admin/admin_manage_dosage_form');
			$this->load->view('admin/admin_footer');

		} catch (Exception $e) {
			// Log error to the database
			$this->ErrorLogModel->logError($e->getMessage(), $e->getFile(), $e->getLine());
			redirect('index.php/Admincontroller/ServerError');
		}
	}

	public function addDosageForm(){
		try{
			if (!$this->session->userdata('id')) {
				// User is not logged in, redirect to login page
				redirect('index.php/Usercontroller/index');
			}
	
			$data['dosage_name'] = $this->input->post('dosage_name');

			$response = $this->Usermodel->addDosageForm($data);
			if($response ==true){
				$this->session->set_flashdata('success', 'Dosage Form Added');				
			}
			redirect('index.php/Admincontroller/adminManageDosageForm');

		} catch (Exception $e) {
			// Log error to the database
			$this->ErrorLogModel->logError($e->getMessage(), $e->getFile(), $e->getLine());
			redirect('index.php/Admincontroller/ServerError');
		}
	}

	public function deleteDosageForm(){
		try
		{
			if (!$this->session->userdata('id')) {
				// User is not logged in, redirect to login page
				redirect('index.php/Usercontroller/index');
			}
			
			$dosage_id = $this->input->get('dosage_id');

			$response = $this->Usermodel->deleteDosageForm($dosage_id);
			if($response ==true){
				$this->session->set_flashdata('warning', 'Dosage form Deleted');				
			}
			redirect('index.php/Admincontroller/adminManageDosageForm');
			

		} 
		catch (Exception $e) {
			// Log error to the database
			$this->ErrorLogModel->logError($e->getMessage(), $e->getFile(), $e->getLine());
			redirect('index.php/Admincontroller/ServerError');
		}
	}
	public function adminManagePackingSize(){
		try{
			if (!$this->session->userdata('id')) {
				// User is not logged in, redirect to login page
				redirect('index.php/Usercontroller/index');
			}
	
			$id = $this->session->userdata('id');
	
	
			$data['user_data'] = $this->Usermodel->getUserData($id);
			$data['packing_size'] = $this->Usermodel->getPackingSize();
			$this->load->view('admin/admin_header',$data);
			$this->load->view('admin/admin_manage_packing_size');
			$this->load->view('admin/admin_footer');

		} catch (Exception $e) {
			// Log error to the database
			$this->ErrorLogModel->logError($e->getMessage(), $e->getFile(), $e->getLine());
			redirect('index.php/Admincontroller/ServerError');
		}
	}

	public function addPackingSize(){
		try{
			if (!$this->session->userdata('id')) {
				// User is not logged in, redirect to login page
				redirect('index.php/Usercontroller/index');
			}
	
			$data['packing_size'] = $this->input->post('packing_size');

			$response = $this->Usermodel->addPackingSize($data);
			if($response ==true){
				$this->session->set_flashdata('success', 'Packing Size Added');				
			}
			redirect('index.php/Admincontroller/adminManagePackingSize');

		} catch (Exception $e) {
			// Log error to the database
			$this->ErrorLogModel->logError($e->getMessage(), $e->getFile(), $e->getLine());
			redirect('index.php/Admincontroller/ServerError');
		}
	}

	public function deletePackingSize(){
		try
		{
			if (!$this->session->userdata('id')) {
				// User is not logged in, redirect to login page
				redirect('index.php/Usercontroller/index');
			}
			
			$packing_id = $this->input->get('packing_id');

			$response = $this->Usermodel->deletePackingSize($packing_id);
			if($response ==true){
				$this->session->set_flashdata('warning', 'Packing size Deleted');				
			}
			redirect('index.php/Admincontroller/adminManagePackingSize');
			

		} 
		catch (Exception $e) {
			// Log error to the database
			$this->ErrorLogModel->logError($e->getMessage(), $e->getFile(), $e->getLine());
			redirect('index.php/Admincontroller/ServerError');
		}
	}

	public function adminManagePharmacopeia(){
		try{
			if (!$this->session->userdata('id')) {
				// User is not logged in, redirect to login page
				redirect('index.php/Usercontroller/index');
			}
	
			$id = $this->session->userdata('id');
	
	
			$data['user_data'] = $this->Usermodel->getUserData($id);
			$data['pharmacopeia'] = $this->Usermodel->getPharmacopeia();
			$this->load->view('admin/admin_header',$data);
			$this->load->view('admin/admin_manage_pharmacopeia');
			$this->load->view('admin/admin_footer');

		} catch (Exception $e) {
			// Log error to the database
			$this->ErrorLogModel->logError($e->getMessage(), $e->getFile(), $e->getLine());
			redirect('index.php/Admincontroller/ServerError');
		}
	}

	public function addPharmacopeia(){
		try{
			if (!$this->session->userdata('id')) {
				// User is not logged in, redirect to login page
				redirect('index.php/Usercontroller/index');
			}
	
			$data['pharmacopeia_name'] = $this->input->post('pharmacopeia_name');

			$response = $this->Usermodel->addPharmacopeia($data);
			if($response ==true){
				$this->session->set_flashdata('success', 'Pharmacopeia Added');				
			}
			redirect('index.php/Admincontroller/adminManagePharmacopeia');

		} catch (Exception $e) {
			// Log error to the database
			$this->ErrorLogModel->logError($e->getMessage(), $e->getFile(), $e->getLine());
			redirect('index.php/Admincontroller/ServerError');
		}
	}
	public function deletePharmacopeia(){
		try
		{
			if (!$this->session->userdata('id')) {
				// User is not logged in, redirect to login page
				redirect('index.php/Usercontroller/index');
			}
			
			$pharmacopeia_id = $this->input->get('pharmacopeia_id');

			$response = $this->Usermodel->deletePharmacopeia($pharmacopeia_id);
			if($response ==true){
				$this->session->set_flashdata('warning', 'Pharmacopeia Deleted');				
			}
			redirect('index.php/Admincontroller/adminManagePharmacopeia');
			

		} 
		catch (Exception $e) {
			// Log error to the database
			$this->ErrorLogModel->logError($e->getMessage(), $e->getFile(), $e->getLine());
			redirect('index.php/Admincontroller/ServerError');
		}
	}
	public function updateStatus() {
		try {
		  // Check user login (unchanged)
		  if (!$this->session->userdata('id')) {
			redirect('index.php/Usercontroller/index');
		  }
	  
		  $inquiry_id = $this->input->get('inquiry_id');
		  $status = $this->input->get('status');
	  
		  // Use a switch statement for efficient handling of different statuses
		  switch ($status) {
			case 'updateKyc':
			  $response = $this->Usermodel->updateKycStatus($inquiry_id); // Call appropriate function
			  $message = 'KYC update initiated successfully.';
			  break;
			case 'productNotAvailable':
			  $response = $this->Usermodel->productNotAvailable($inquiry_id); // Existing logic
			  $message = 'Status updated successfully.';
			  break;
			case 'thankYou':
				$response = $this->Usermodel->thankYou($inquiry_id); // Existing logic
				$message = 'Thank you for choosing lakshmi.';
				break;
			case 'contactYouSoon':
				$response = $this->Usermodel->contactYouSoon($inquiry_id); // Existing logic
				$message = 'Thank you for choosing lakshmi.';
				break;
			case 'queryCreatedSuccesfully':
				$response = $this->Usermodel->queryCreatedSuccesfully($inquiry_id); // Existing logic
				$message = 'Thank you for choosing lakshmi.';
				break;
			case 'onProcessOfDocumentation':
				$response = $this->Usermodel->onProcessOfDocumentation($inquiry_id); // Existing logic
				$message = 'Thank you for choosing lakshmi.';
				break;
			case 'processOfVerification':
				$response = $this->Usermodel->processOfVerification($inquiry_id); // Existing logic
				$message = 'Thank you for choosing lakshmi.';
				break;
			case 'queryOnTheProcess':
				$response = $this->Usermodel->queryOnTheProcess($inquiry_id); // Existing logic
				$message = 'Thank you for choosing lakshmi.';
				break;
			// Add similar cases for other statuses (queryCreatedSuccesfully, onProcessOfDocumentation, processOfVerification, queryOnTheProcess)
			default:
			  $response = false;
			  $message = 'Invalid status.';
		  }

		  if ($response) {
			$this->session->set_flashdata('success', $message);
		  } else {
			$this->session->set_flashdata('error', 'Error updating status.');
		  }
	  
		  redirect('index.php/Admincontroller/adminViewInquiry');
	  
		} catch (Exception $e) {
		  // Error handling (unchanged)
		  $this->ErrorLogModel->logError($e->getMessage(), $e->getFile(), $e->getLine());
		  redirect('index.php/Admincontroller/ServerError');
		}
	  }
	
	  public function send_inquiry_email()
		{
			$user_email = 'amal.ganesh@icloud.com';
			// Email configuration
			$config = array(
				'protocol'  => 'smtp',
				'smtp_host' => 'mail.lammy.life',
				'smtp_port' => 465,
				'smtp_user' => 'enquiry@lammy.life',
				'smtp_pass' => 'cOVO[RXJ)4?h', // Replace with the actual password
				'smtp_crypto' => 'ssl', // Use 'ssl' for port 465
				'mailtype'  => 'html',
				'charset'   => 'utf-8',
				'wordwrap'  => TRUE
			);

			// Load email library and initialize configuration
			$this->load->library('email', $config);
			$this->email->set_newline("\r\n");

			// Set email parameters
			$this->email->from('enquiry@lammy.life', 'Your Company');
			$this->email->to($user_email);
			$this->email->subject('Inquiry Successful');
			$this->email->message('Thank you for your inquiry. We have received your request and will get back to you shortly.');

			// Send email
			if ($this->email->send()) {
				echo 'Email sent successfully.';
			} else {
				echo 'Email sending failed: ' . $this->email->print_debugger();
			}
		}

	
}

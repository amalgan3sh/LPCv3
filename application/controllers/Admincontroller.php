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

        $this->load->view('admin/admin_header',$data);
        $this->load->view('admin/admin_add_white_label_products',$data);
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
	
}

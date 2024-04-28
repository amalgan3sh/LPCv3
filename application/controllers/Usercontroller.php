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

		$this->load->view('user_header',$data);
		$this->load->view('user_home');
	}
	public function userProfile(){
		if (!$this->session->userdata('id')) {
			// User is not logged in, redirect to login page
			redirect('index.php/Usercontroller/index');
		}
		$id = $this->session->userdata('id');
		$data['user_data'] = $this->Usermodel->getUserData($id);
		$this->load->view('user_header',$data);
		$this->load->view('user_profile');
	}
	public function userUpdateProfile(){
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
		
	}
	public function userViewComposition(){
		if (!$this->session->userdata('id')) {
			// User is not logged in, redirect to login page
			redirect('index.php/Usercontroller/index');
		}
		$id = $this->session->userdata('id');
		$data['user_data'] = $this->Usermodel->getUserData($id);
		$data['composition'] = $this->Usermodel->getComposition();
		$this->load->view('user_header',$data);
		$this->load->view('user_view_composition');
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
		$this->load->view('user_header',$data);
		$this->load->view('user_view_products');
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
		$this->load->view('user_header',$data);
		$this->load->view('user_view_cart');
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
		$data['categories'] = $this->Usermodel->getCategory();
		$data['dosage_from'] = $this->Usermodel->getDosageFrom();
		$this->load->view('user_header',$data);
		$this->load->view('user_product_query');
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
		$this->load->view('user_header',$data);
		$this->load->view('user_product_query_details');
	}

	public function userSignup(){
		$this->load->view('register');
	}

	public function registerUser() {
		if (!$this->session->userdata('id')) {
			// User is not logged in, redirect to login page
			redirect('index.php/Usercontroller/index');
		}
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
				// Add other form fields here
			);
	
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
		$this->load->view('user_header',$data);
		$this->load->view('user_view_product_inquiry');

	}
	

	
}

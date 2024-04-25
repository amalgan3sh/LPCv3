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

			echo "<script>alert('Success');</script>";
			$this->userHome();

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
			redirect('controller_name/login');
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
		$id = $this->session->userdata('id');
		$data['user_data'] = $this->Usermodel->getUserData($id);
		$this->load->view('user_header',$data);
		$this->load->view('user_profile');
	}
	public function userUpdateProfile(){
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
		$id = $this->session->userdata('id');
		$data['user_data'] = $this->Usermodel->getUserData($id);
		$data['composition'] = $this->Usermodel->getComposition();
		$this->load->view('user_header',$data);
		$this->load->view('user_view_composition');
	}
	public function userViewProducts(){
		$id = $this->session->userdata('id');
		$data['user_data'] = $this->Usermodel->getUserData($id);
		$composition_name = $this->input->get('composition_name');
		$data['products'] = $this->Usermodel->getProductsByComposition($composition_name);
		$this->load->view('user_header',$data);
		$this->load->view('user_view_products');
	}
	public function userViewCart(){
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
	
}

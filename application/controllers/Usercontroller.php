<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Usercontroller extends CI_Controller {

	public function index()
	{
		$this->session->set_userdata('id', 83);
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
		$this->load->view('user_header',$data);
		$this->load->view('user_view_cart');
	}

	// public function userSearchComposition(){
	// 	$id = $this->session->userdata('id');
    // $data['user_data'] = $this->Usermodel->getUserData($id);
    // $composition_name = $this->input->get('search_composition');
    // $data['composition'] = $this->Usermodel->userSearchComposition($composition_name);

    // // Define the current page based on the query parameter 'page'
    // $data['current_page'] = $this->input->get('page', TRUE); // Set TRUE to get the value as integer

    // $this->load->view('user_header',$data);
    // $this->load->view('user_view_composition', $data);
	// }
	
	
}

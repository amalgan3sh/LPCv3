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
	public function adminViewUserProfile(){
        if (!$this->session->userdata('id')) {
			// User is not logged in, redirect to login page
			redirect('index.php/Usercontroller/index');
		}

        $id = $this->session->userdata('id');

		$data['user_data'] = $this->Usermodel->getUserData($id);
        $this->load->view('admin/admin_header',$data);
        $this->load->view('admin/admin_view_user_profile',$data);
    }
}

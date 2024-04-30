<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admincontroller extends CI_Controller {

	public function adminDashboard(){
        $this->load->view('admin/admin_home');
    }
}

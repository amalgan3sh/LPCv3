<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Usermodel extends CI_Model {

    public function getUserData($id){
        $this->db->where('id', $id);
        $query = $this->db->get('users');

        if ($query) {
            return $query->result_array()[0];
        } else {
            return false;
        }
    }
    public function userUpdateProfile($data,$id){
        $this->db->set($data);

        $this->db->where('id', $id);

        // Execute the update query
        $this->db->update('users');
    
        // Check if the update was successful
        if ($this->db->affected_rows() > 0) {
            // Update successful
            return true;
        } else {
            // Update failed
            return false;
        }
    }

    public function getUserOrderCount($id){
        $this->db->select('COUNT(user_id) AS total_orders');
        $this->db->from('orders');
        $this->db->where('user_id', $id);
        $query = $this->db->get();
    
        if ($query->num_rows() > 0) {
            return $query->row()->total_orders;
        } else {
            return 0;
        }
    }
    public function getProducts(){
        $query = $this->db->get('products');
        if ($query) {
            return $query;
        } else {
            return false;
        }
    }
    public function getComposition(){
        $query = $this->db->query('SELECT DISTINCT composition FROM products');
    
        if ($query->num_rows() > 0) {
            return $query;
        } else {
            return false;
        }
    }
    public function getProductsByComposition($compostion_name){
        $this->db->where('composition', $compostion_name);
        $query = $this->db->get('products');
        if ($query) {
            return $query;
        } else {
            return false;
        }
    }

    public function getProductDetails($product_id){

        $this->db->where('id', $product_id);
        $query = $this->db->get('products');
        if ($query) {
            return $query->result()[0];
        } else {
            return false;
        }
    }

    public function userLogin($email, $password) {
        // Load Database Library if not already loaded
        $this->load->database();
        
        // Query the database to check if the user exists
        $query = $this->db->get_where('users', array('email' => $email));
        
        // Check if a user with the given username exists
        if ($query->num_rows() > 0) {
            $user = $query->row(); // Get the user row
            
            // Verify password
            if (password_verify($password, $user->password)) {
                
                // Password is correct, login successful
                $this->session->set_userdata('id', $user->id);

                return true;
            } else {
                // Password is incorrect
                return false;
                
            }
        } else {
            // User with the given username does not exist
            echo json_encode("User with the given username does not exist");
                die();
            return false;
        }
    }
    
    public function getCategory(){
        $result = $this->db->get('categories');
        return $result->result_array();
    }
    public function getDosageFrom(){
        $result = $this->db->get('dosage_from');
        return $result->result_array();
    }
    public function userAddProductQuery($data){
        $this->db->insert('product_inquiry', $data);

        // Check if the insertion was successful
        if ($this->db->affected_rows() > 0) {
            // Return the inquiry_id if successful
            return true;
        } else {
            return false; // Return false if failed
        }
    } 
}

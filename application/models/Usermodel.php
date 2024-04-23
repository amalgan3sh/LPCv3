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
    // In your Usermodel.php

    // public function userSearchComposition($composition_name) {
    //     // Sanitize the input to prevent SQL injection
    //     $composition_name = $this->db->escape_like_str($composition_name);

    //     // Construct the SQL query
    //     $this->db->distinct();
    //     $this->db->select('composition');
    //     $this->db->like('composition', $composition_name);

    //     // Execute the query
    //     $query = $this->db->get('products');

    //     // Check if there are any results
    //     if ($query->num_rows() > 0) {
    //         // Fetch the results as an array
    //         return $query->result_array();
    //     } else {
    //         return array(); // No results found
    //     }
    // }

    
    
    
    
    
    
}

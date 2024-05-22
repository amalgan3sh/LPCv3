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
        
        // Check if a user with the given email exists
        if ($query->num_rows() > 0) {
            $user = $query->row(); // Get the user row
            
            // Verify password
            if (password_verify($password, $user->password)) {
                // Password is correct, login successful
                
                // Check user role
                if ($user->role == 'admin') {
                    // If user is admin, redirect to admin home
                    $this->session->set_userdata('id', $user->id);
                    redirect(base_url('index.php/Admincontroller/adminDashboard'));
                } elseif ($user->role == 'customer') {
                    
                    // If user is customer, redirect to user home
                    $this->session->set_userdata('id', $user->id);
                    redirect(base_url('index.php/Usercontroller/userHome'));
                } else {
                    // Invalid role, handle accordingly (e.g., display error message)
                    return "Invalid role for user.";
                }
            } else {
                // Password is incorrect
                return false;
            }
        } else {
            // User with the given email does not exist
            return "User with the given email does not exist";
        }
    }
    
    
    public function getCategory(){
        $result = $this->db->get('categories');
        return $result->result_array();
    }
    public function getDosageFrom(){
        $result = $this->db->get('dosage_form');
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
    public function registerUser($data) {
        // Insert user data into the database
        $this->db->insert('users', $data);
        
        // Check if the insertion was successful
        if ($this->db->affected_rows() > 0) {
            // Insertion successful
            return true;
        } else {
            // Insertion failed
            return false;
        }
    }
    public function getUserByEmail($email){
        // Query to fetch user by email
        $this->db->where('email', $email);
        $query = $this->db->get('users');

        // Check if user exists
        if ($query->num_rows() > 0) {
            return true; // Return user data
        } else {
            return false; // User not found
        }
    }
    public function userViewProductInquiry($id){
        $query = $this->db->get_where('product_inquiry', array('user_id' => $id));

        // Check if there are any results
        if ($query->num_rows() > 0) {
            // If there are results, return the data as an array of objects
            return $query->result_array();
        } else {
            // If no results found, return false or an empty array, depending on your preference
            return false;
        }
    }
    public function userUploadDocuments($data){
        // Insert user data into the database
        $this->db->insert('kyc_registration', $data);

        // Check if the insertion was successful
        if ($this->db->affected_rows() > 0) {

            return "true";
        } else {
            // Insertion failed
            return false;
        }
    }

    public function getUserDocuments($userId) {
        // Assuming you have a table named 'user_documents' to store uploaded documents
        // Adjust the table name and column names as per your database schema
        $this->db->where('user_id', $userId);
        $query = $this->db->get('kyc_registration');
        
        $result = $query->num_rows();
        if($result > 0){
            return true;
        }else{
            return false;
        }

    }
    public function getKycRegistration($id){
        // Assuming $id is the user_id
        
        // Fetch KYC registration data for the user from the database
        // Replace 'kyc_registration' with your actual table name
        $query = $this->db->get_where('kyc_registration', array('user_id' => $id));
        
        // Check if data exists for the user
        if($query->num_rows() > 0){
            // Get the row
            $row = $query->row();
            
            // Format the data into an array
            $kyc_data = array(
                'drug_license' => $row->drug_license ? true : false,
                'national_id_proof' => $row->national_id_proof ? true : false,
                'company_incorporation_certificate' => $row->company_incorporation_certificate ? true : false,
                // Add more fields as needed
            );
            
            return $kyc_data;
        } else {
            // No KYC registration data found for the user
            return false;
        }
    }
    public function getUserDocumentsSubmitted($id){
        $this->db->where('user_id', $id);
        $query = $this->db->get('kyc_registration');
        return $query->result_array();
    }
    public function getAllUserData(){
        $query = $this->db->get('users');
        return $query->result();
    }
    // Method to count total users
    public function countAllUserData(){
        return $this->db->count_all('users');
    }
    public function countAllWhiteLabelProductsData(){
        return $this->db->count_all('white_label_products');
    }

    // Method to fetch users for the current page
    public function getUsersPerPage($limit, $offset){
        $this->db->limit($limit, $offset);
        $query = $this->db->get('users');
        return $query->result();
    }
    public function getWhiteLabelProductsPerPage($limit, $offset){
        $this->db->limit($limit, $offset);
        $query = $this->db->get('white_label_products');
        return $query->result();
    }

    public function AdminInsertUser($data) {
        // Insert data into the 'users' table
        $inserted = $this->db->insert('users', $data);

        // Check if insertion was successful and return the result
        return $inserted;
    }
    public function getUserProfile($user_id){
        $this->db->where('id', $user_id);
        $query = $this->db->get('users');

        if ($query) {
            return $query->result_array()[0];
        } else {
            return false;
        }
    }
    public function getProductInquiries(){
        // Select data from product_inquiry table and join with users table
        $query = $this->db->select('product_inquiry.*, users.*')
                          ->from('product_inquiry')
                          ->join('users', 'product_inquiry.user_id = users.id')
                          ->get();
    
        // Check if there are any rows returned
        if ($query->num_rows() > 0) {
            return $query->result_array(); // Return the result as an array of arrays
        } else {
            return array(); // Return an empty array if no rows found
        }
    }
    public function getProductInquiryDetails($inquiry_id){
        // Custom SQL query to fetch detailed data
        $query = $this->db->query("SELECT product_inquiry.*, dosage_form.dosage_name, 
                                        categories.name AS category_name, CONCAT(users.firstname, ' ', users.lastname) AS username,
                                        comments,users.cname,users.order_address
                                    FROM product_inquiry
                                    INNER JOIN categories ON product_inquiry.drug_category = categories.id
                                    INNER JOIN dosage_form ON product_inquiry.dosage_form = dosage_form.dosage_id
                                    INNER JOIN users ON product_inquiry.user_id = users.id
                                    WHERE inquiry_id = $inquiry_id");
    
        // Check if there are any rows returned
        if ($query->num_rows() > 0) {
            return $query->row_array(); // Return the first row as an associative array
        } else {
            return null; // Return null if no rows found
        }
    }

    public function approveProduct($inquiry_id){
        // Data to be updated
        $data = array(
            'status' => 'approved'
        );
    
        // Update the product_inquiry table where inquiry_id matches $inquiry_id
        $this->db->where('inquiry_id', $inquiry_id);
        $this->db->update('product_inquiry', $data);
    
        // Check if the update was successful
        return $this->db->affected_rows() > 0; // Return true if rows were affected
    }
    public function rejectProduct($inquiry_id){
        // Data to be updated
        $data = array(
            'status' => 'rejected'
        );
    
        // Update the product_inquiry table where inquiry_id matches $inquiry_id
        $this->db->where('inquiry_id', $inquiry_id);
        $this->db->update('product_inquiry', $data);
    
        // Check if the update was successful
        return $this->db->affected_rows() > 0; // Return true if rows were affected
    }
    public function getKYCData(){
        // Custom SQL query to fetch KYC data with usernames
        $query = $this->db->query("SELECT kyc_registration.*, CONCAT(users.firstname, ' ', users.lastname) AS username,
                                    users.cname AS company_name
                                   FROM kyc_registration
                                   INNER JOIN users ON kyc_registration.user_id = users.id");
    
        // Check if there are any rows returned
        if ($query->num_rows() > 0) {
            return $query->result_array(); // Return the result as an array of arrays
        } else {
            return array(); // Return an empty array if no rows found
        }
    }
    
    public function AddWhiteLabelProducts($data){
        // Insert data into white_label_products table
        $inserted = $this->db->insert('white_label_products', $data);
        // Return true if insertion was successful, otherwise false
        return $inserted;
    }
    public function getWhiteLabelProducts(){
        $query = $this->db->get('white_label_products');
        // Return the result as an array of objects
        return $query->result();
    }
    public function deleteWhiteLabelProduct($product_id){
        // Perform the deletion
        $this->db->where('wl_product_id', $product_id);
        $success = $this->db->delete('white_label_products');

        // Check if deletion was successful
        if ($success) {
            return true;
        } else {
            return false;
        }
    }
    public function getBrandedProducts(){
        $query = $this->db->get('branded_products');
        // Return the result as an array of objects
        return $query->result();
    }
    public function userGetThirdPartyProducts(){
        $query = $this->db->get('third_party_manufactured_products');
        // Return the result as an array of objects
        return $query->result();
    }
    public function AddBrandedProducts($data){
        // Insert data into white_label_products table
        $inserted = $this->db->insert('branded_products', $data);
        // Return true if insertion was successful, otherwise false
        return $inserted;
    }
    public function AddThirdPartyProducts($data){
        // Insert data into white_label_products table
        $inserted = $this->db->insert('third_party_manufactured_products', $data);
        // Return true if insertion was successful, otherwise false
        return $inserted;
    }
    public function userAddInquiryThirdPartyProducts($data){
        $inserted = $this->db->insert('third_party_manufactured_products', $data);
        // Return true if insertion was successful, otherwise false
        return $inserted;
    }
    public function deleteBrandedProduct($user_id){
        $this->db->where('user_id', $user_id);
        $this->db->where('branded_product_id', $product_id);
        $success = $this->db->delete('branded_products');

        // Check if deletion was successful
        if ($success) {
            return true;
        } else {
            return false;
        }
    }
    public function userViewWhiteLabelProductDetails($product_id){
        // Query to fetch data from white_label_products table
        $this->db->where('wl_product_id', $product_id);
        $query = $this->db->get('white_label_products');

        // Check if any rows were returned
        if ($query->num_rows() > 0) {
            // Return the result as an object
            return $query->row();
        } else {
            // No data found, return false or handle accordingly
            return false;
        }
    }
    public function getThirdPartyManufacture(){
        $query = $this->db->get('third_party_manufactured_products');
        // Return the result as an array of objects
        return $query->result();
    }
    public function getDrugCategory(){
        $query = $this->db->get('drug_category');
        // Return the result as an array of objects
        return $query->result();
    }
    public function addDrugCategory($data) {
        $this->db->insert('drug_category', $data);
        if ($this->db->affected_rows() == 1) {
            return true;
        } else {
            return false;
        }
    }
    public function deleteDrugCategory($id){
        $this->db->where('drug_category_id', $id);
        $this->db->delete('drug_category');
        if ($this->db->affected_rows() > 0) {
            return true;
        } else {
            return false;
        }
    }
    public function getDosageForm(){
        $query = $this->db->get('dosage_form');
        // Return the result as an array of objects
        return $query->result();
    }
    public function addDosageForm($data){
        $this->db->insert('dosage_form', $data);
        if ($this->db->affected_rows() == 1) {
            return true;
        } else {
            return false;
        }
    }

    public function deleteDosageForm($id){
        $this->db->where('dosage_id', $id);
        $this->db->delete('dosage_form');
        if ($this->db->affected_rows() > 0) {
            return true;
        } else {
            return false;
        }
    }

    public function getPackingSize(){
        $query = $this->db->get('packing_size');
        // Return the result as an array of objects
        return $query->result();
    }

    public function addPackingSize($data){
        $this->db->insert('packing_size', $data);
        if ($this->db->affected_rows() == 1) {
            return true;
        } else {
            return false;
        }
    }
    public function deletePackingSize($id){
        $this->db->where('packing_id', $id);
        $this->db->delete('packing_size');
        if ($this->db->affected_rows() > 0) {
            return true;
        } else {
            return false;
        }
    }
    public function getPharmacopeia(){
        $query = $this->db->get('pharmacopeia');
        // Return the result as an array of objects
        return $query->result();
    }

    public function addPharmacopeia($data){
        $this->db->insert('pharmacopeia', $data);
        if ($this->db->affected_rows() == 1) {
            return true;
        } else {
            return false;
        }
    }

    public function deletePharmacopeia($id){
        $this->db->where('pharmacopeia_id', $id);
        $this->db->delete('pharmacopeia');
        if ($this->db->affected_rows() > 0) {
            return true;
        } else {
            return false;
        }
    }
    
}

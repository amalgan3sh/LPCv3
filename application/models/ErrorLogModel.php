<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class ErrorLogModel extends CI_Model {

public function __construct() {
    parent::__construct();
}

public function logError($message, $file, $line) {
    $data = array(
        'message' => $message,
        'file' => $file,
        'line' => $line
    );

    $this->db->insert('error_logs', $data);
}
}

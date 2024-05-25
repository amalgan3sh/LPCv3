

<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class EmailModel extends CI_Model {

    public function __construct() {
        parent::__construct();
        // Load necessary libraries or models if needed
        $this->load->library('email');
    }

    public function send_registration_email($data) {
        // Load SMTP configuration from a secure location
        $config = array(
            'protocol'  => 'smtp',
            'smtp_host' => 'mail.lammy.life',
            'smtp_port' => 465,
            'smtp_user' => 'enquiry@lammy.life',
            'smtp_pass' => 'cOVO[RXJ)4?h', // Load from environment variable
            'smtp_crypto' => 'ssl', // Use 'ssl' for port 465
            'mailtype'  => 'html',
            'charset'   => 'utf-8',
            'wordwrap'  => TRUE
        );

        $user_name = htmlspecialchars($data['firstname'] . ' ' . $data['lastname'], ENT_QUOTES, 'UTF-8');

        $message = "Dear " . $user_name . ",\n\n";
        $message .= "Thank you for registering with us!";

        // Load email library and initialize configuration
        $this->email->initialize($config);
        $this->email->set_newline("\r\n");

        // Set email parameters
        $this->email->from('enquiry@lammy.life', 'Lakshmi Pharmaceuticals');
        $this->email->to($data['email']);
        $this->email->subject('Registration successful');
        $this->email->message($message);

        // Send email and handle potential errors
        if ($this->email->send()) {
            return 'Email sent successfully.';
        } else {
            log_message('error', 'Email sending failed: ' . $this->email->print_debugger());
            return 'Email sending failed. Please try again later.';
        }
    }
}
?>
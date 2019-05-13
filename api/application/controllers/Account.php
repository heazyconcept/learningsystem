<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Account extends CI_Controller {

    public function index()
    {
        
        redirect('Account/Login','refresh');
        
    }
    public function Register()
    {
        $data["PageTitle"] = "Register - 90minsbet";
        $this->load->view("Account/Partials/Register", $data);
    }
    public function Login()
    {
        
        $this->load->view("Account/Partials/Login");
    }
    public function Logout()
    {
        $this->session->sess_destroy();
		redirect('');
    }

}

/* End of file Account.php */


?>
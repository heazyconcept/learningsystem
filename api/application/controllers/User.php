<?php 

defined('BASEPATH') OR exit('No direct script access allowed');

class User extends CI_Controller {

    
    public function __construct()
    {
        parent::__construct();
        $this->ValidateLogin();
    }
    

    public function index()
    {
        
        redirect('user/Dashboard');
        
    }
    
    public function Dashboard()
    {
        $data = array();
        $this->load->model("users");
        $this->load->model("premium");
        $this->load->model("pro");
        $this->load->model("rollover");
        $this->load->model("weekend");
        $this->load->view('User/Templates/MyProfile',$data);
       
    }
    public function MyBetStore()
    {
        $data = array();
        $this->load->model("betstore");
        $this->load->view('User/Templates/MyBetStore',$data);
       
    }
    public function MakePayment()
    {
        $country = $this->session->userdata("Country");
        $endPoint = "home/how_to_pay/".$country;
        redirect($endPoint);
    }
    public function MyProfile()
    {
        $data = array();
        $this->load->model("users");
        $this->load->model("premium");
        $this->load->model("pro");
        $this->load->model("rollover");
        $this->load->model("weekend");
        $this->load->view('User/Templates/MyProfile',$data);
    }
      
    private function ValidateLogin()
    {
        if ( $this->session->has_userdata("UserId") ) {
            if ($this->session->userdata("AccountType") == "Admin") {
                redirect("admin");
            }
         
        } else {
            redirect("account/Login");
        }
        

    }

}

/* End of file User.php */

?>
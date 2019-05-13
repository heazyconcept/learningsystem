<?php


defined('BASEPATH') OR exit('No direct script access allowed');

class Payment extends CI_Controller {

    public function index()
    {
        
    }
    
    public function OnlinePayment()
    {
        if (!$this->CheckLoginState()) {
            $URL = base_url("payment/OnlinePayment");
             $this->utilities->KeepPresentState($URL);
             redirect("account/Login");
             
         }
         $this->load->model("siteoptions");
         $this->load->model("pricing");
         $data["AllPlans"] = $this->pricing->ListAllPlan();
         $this->load->view("Front/Partials/Payment/OnlinePayment", $data);
        
    }
    public function PaypalPayment()
    {
        if (!$this->CheckLoginState()) {
            $URL = base_url("payment/PaypalPayment");
             $this->utilities->KeepPresentState($URL);
             redirect("account/Login");
             
         }
         $this->load->model("siteoptions");
         $this->load->model("pricing");
         $data["AllPlans"] = $this->pricing->ListAllPlan();
         $this->load->view("Front/Partials/Payment/PaypalPayment", $data);
    }
    private function CheckLoginState():bool
    {
      return $this->session->has_userdata("UserId");
    }

}

/* End of file Payment.php */


?>
<?php 

defined('BASEPATH') OR exit('No direct script access allowed');

class User extends CI_Controller {

    
    public function __construct()
    {
        parent::__construct();
        $this->load->model("customSession");
        $this->load->model("users");
        // $this->ValidateLogin();
    }
    public function FetchUserDetails($sessionId)
    {
        try {
            $result = file_get_contents(base_url("account/ValidateSession/" .$sessionId));
            $validation = json_decode($result);
            if ($validation->StatusCode == "00") {
                $sessionData =  $this->customSession->Get($sessionId);
                $UserData = $this->users->Get($sessionData->UserId);
                $processedUserData = array(
                    "FullName" => $UserData->FullName,
                    "EmailAddress" => $UserData->EmailAddress,
                    "Country" => $UserData->Country,
                );
                echo $this->utilities->outputMessage("success", $processedUserData);
                return;
            }
            echo $this->utilities->outputMessage("autherror");
            return;

        
        } catch (\Throwable $th) {
            $this->utilities->LogError($th);
            echo $this->utilities->outputMessage("error", "internal server error");
        }
       

        
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
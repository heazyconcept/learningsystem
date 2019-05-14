<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Account extends CI_Controller {

  
    public function __construct()
    {
        parent::__construct();
        $this->load->model("users");
        $this->load->model("customSession");
    }

    public function Register()
    {
        try {
            $this->ConfirmAjaxCall();

            $RegisterData = (object) $_POST;
            $NotExist = $this->users->CheckExist($RegisterData->EmailAddress, $RegisterData->PhoneNumber);

            if ($NotExist) {
               
               $RegisterData = $this->utilities->AddPropertyToObJect($RegisterData, "UserType" , "Student");
                $ServerResponse = $this->users->Insert((array)  $RegisterData);
                if (!empty($ServerResponse)) {
                    echo $this->utilities->outputMessage("success", "Your Account is created successfully");
                    return;
                } else {
                    echo $this->utilities->outputMessage("error", "Your Request cannot be processed at this time");
                    return;
                }

            } else {
                echo $this->utilities->outputMessage("error", "Email/phone already registered");
                return;
            }
        } catch (\Throwable $th) {
            log_message('error', $th->getMessage());
            echo $this->utilities->outputMessage("error", "Internal Server Error");
            return;
        }

    }
    public function Login()
    {
        try {
            $this->ConfirmAjaxCall();
            $LoginData = (object) $_POST;
            $UserData = $this->users->GetByEmail($LoginData->EmailAddress);
            if (empty((array) $UserData)) {
                echo $this->utilities->outputMessage("error", "Email address does not exist");
                return;
            }
            $InsertedPassword = $this->utilities->GeneratePassword($LoginData->Password);
            if ($UserData->Password == $InsertedPassword) {
                $SessionID =  $this->utilities->GenerateGUID();
                $sessionData = array(
                    "UserId" => $UserData->Id,
                    "SessionId" => $SessionID,
                    "SessionDate" => $this->utilities->DbTimeFormat(),
                    "IsActive" => 1
                );
               $DbResponse =  $this->customSession->Insert((object) $sessionData);
               if ($DbResponse > 0 ) {
                   echo $this->utilities->outputMessage("success", $SessionID);
                   return;
               }
                
                      
                }   
             else {
                echo $this->utilities->outputMessage("error", "Password is not correct");
                return;
            }

        } catch (\Throwable $th) {
            log_message('error', $th->getMessage());
           
        }
        echo $this->utilities->outputMessage("error", "Internal Server Error");
        return;

    }
    private function ConfirmAjaxCall()
    {
        if (empty($_REQUEST)) {
            redirect('/');
        }

    }
    public function Logout()
    {
        $this->session->sess_destroy();
		redirect('');
    }

}

/* End of file Account.php */


?>
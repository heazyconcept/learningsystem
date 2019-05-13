<?php

defined('BASEPATH') or exit('No direct script access allowed');

class AuthAjax extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model("users");
    }

    public function Register()
    {
        try {
            $this->ConfirmAjaxCall();

            $RegisterData = (object) $_POST;
            $NotExist = $this->users->CheckExist($RegisterData->EmailAddress, $RegisterData->PhoneNumber);

            if ($NotExist) {
                $ServerResponse = $this->users->Insert($_POST);
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
                echo $this->utilities->outputMessage("error", "Username does not exist");
                return;
            }
            $InsertedPassword = $this->utilities->GeneratePassword($LoginData->Password);
            if ($UserData->Password == $InsertedPassword) {
                $UserSession = $this->utilities->PrepareUserSession($UserData);
                $this->utilities->SetSession($UserSession);
                $PresentState =  $this->utilities->GetPresentState();
                if(empty($PresentState)){
                    if ($UserData->AccountType == "Admin") {
                        $redirectUrl = base_url("admin"); 
                    } else {
                        $redirectUrl = base_url("user");
                    }

                }else {
                    if ($UserData->AccountType == "Admin") {
                        echo $this->utilities->outputMessage("error", "You are not authorized to view this page");
                        return;
                    }

                    $redirectUrl = $PresentState;
                }
                
                
                
                echo $this->utilities->outputMessage("success", "", $redirectUrl);
                return;
            } else {
                echo $this->utilities->outputMessage("error", "Password is not correct");
                return;
            }

        } catch (\Throwable $th) {
            log_message('error', $th->getMessage());
            echo $this->utilities->outputMessage("error", "Internal Server Error");
            return;
        }

    }
    private function ConfirmAjaxCall()
    {
        if (empty($_REQUEST)) {
            redirect('/');
        }

    }

}

/* End of file AuthAjax.php */

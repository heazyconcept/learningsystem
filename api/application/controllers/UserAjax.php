<?php 

defined('BASEPATH') OR exit('No direct script access allowed');

class UserAjax extends CI_Controller {
    
    protected $userId;
    
    public function __construct()
    {
        parent::__construct();
        $this->userId = $this->session->userdata("UserId");
    }
    

   public function UpdateUserInfo()
   {
       try {
        $UserData = (object) $_POST;
        $this->load->model("users");
        // $userid = $this->session->userdata("UserId");
        $response = $this->users->update($UserData, $this->userId);
        if($response == 1){
            $newUserData =  $this->users->Get($this->userId);
            $userSession = $this->utilities->PrepareUserSession($newUserData);
            $this->utilities->SetSession($userSession);
            echo $this->utilities->outputMessage("success", "Information updated successfully");
           return;
        }
        echo $this->utilities->outputMessage("error", "Your request cannot be proccessed at this moment");
        return;
       } catch (\Throwable $th) {
           $this->utilities->LogError($th);
           echo $this->utilities->outputMessage("error", "Internal server error occurred");
           return;
       }
    
    
   }
   public function UpdatePassword()
   {
    try {
        $PasswordData = (object) $_POST;
        $this->load->model("users");
        if ($this->users->ConfirmPassword($PasswordData->CurrentPassword, $this->userId)) {
            $Response = $this->users->ChangePassword($PasswordData->NewPassword, $this->userId);
            if ($Response == 1) {
                $url = base_url("account/LogOut");
                echo $this->utilities->outputMessage(
                    "success", 
                    "Password updated successfully. please login again wit your new password",
                    $url 
                );
                return;
            }
        }
      
        echo $this->utilities->outputMessage("error", "Your request cannot be proccessed at this moment");
        return;
       } catch (\Throwable $th) {
           $this->utilities->LogError($th);
           echo $this->utilities->outputMessage("error", "Internal server error occurred");
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

/* End of file UserAjax.php */


?>
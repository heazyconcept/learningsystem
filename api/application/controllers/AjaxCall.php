<?php 


defined('BASEPATH') OR exit('No direct script access allowed');

class AjaxCall extends CI_Controller {

    public function getPrice($Duration)
    {
      try {
         
         $this->load->model("pricing");
         $Amount = $this->pricing->getPrice($Duration);
        
         if(!empty($Amount)){
            $Price = (object) unserialize($Amount);
         }else {
            echo $this->utilities->outputMessage("error", "No Category selected");
            return;
         }
         echo $this->utilities->outputMessage("success", $Price);
         return;
      } catch (\Throwable $th) {
        log_message('error', $th->getMessage());
        echo $this->utilities->outputMessage("error", "Internal Server Error");
        return;
      }
    }
    public function GetDuration($Plan)
    {
      try {
         
        $this->load->model("pricing");
        $Duration = $this->pricing->ListDurationByPlan($Plan);
        if(!empty($Duration)){
          echo $this->utilities->outputMessage("success", $Duration);
          return;
        }else {
           echo $this->utilities->outputMessage("error", "No Duration Found");
           return;
        }
       
     } catch (\Throwable $th) {
       log_message('error', $th->getMessage());
       echo $this->utilities->outputMessage("error", "Internal Server Error");
       return;
     }
    }
    public function ProfileUpload()
    {
      try {
          $this->load->model("users");
          $userId = $this->session->userdata("UserId");

          $fileName = $this->utilities->UploadFile('file');
          $ImageUrl = base_url('upload/profile_pic/'.$fileName);
          $UserUpdate = array(
            "ProfileImage" => $fileName
          );
          $this->users->update((object) $UserUpdate, $userId);
          $UpdatedUser = $this->users->Get($userId);
          $newSession = $this->utilities->PrepareUserSession($UpdatedUser);
          $this->utilities->SetSession($newSession);
          echo $this->utilities->outputMessage("success", $ImageUrl);
          return;
          
      } catch (\Throwable $th) {
        $this->utilities->LogError($th);
      }
      echo $this->utilities->outputMessage("error", "your request cannot be completed at this moment.");
    }

  
    private function ConfirmAjaxCall()
    {
        if (empty($_REQUEST)) {
            redirect('/');
        }

    }
}

/* End of file AjaxCall.php */

?>
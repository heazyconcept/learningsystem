<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class PaymentAjax extends CI_Controller {

    public function OnlinePayment()
    {
        try {
            $PaymentRequest = (object) $_POST;
            $this->load->model("transactions");
            $this->load->model("pricing");
            $this->load->model("users");
            $PaymentData = $this->pricing->GetPlan($PaymentRequest->planDuration);
            $PaymentData = array(
            "UserId" => $this->session->userdata("UserId"),
            "TransactionRef" => $PaymentRequest->transactionRef,
            "PaymentPlan" => $PaymentRequest->paymentPlan,
            "Duration" => $PaymentData->Duration,
            "Amount" => $PaymentRequest->amount,
            "PaymentMethod" => "Paystack",
            "DateCreated" => $this->utilities->DbTimeFormat()
        );
        $Response = $this->transactions->Insert($PaymentData);
        if ($Response > 0) {
            if($this->RenewAccount($PaymentRequest) > 0){
                $UserData = $this->users->Get($this->session->userdata("UserId"));
                $userSession = $this->utilities->PrepareUserSession($UserData);
                $this->utilities->SetSession($userSession);
                echo $this->utilities->outputMessage("success");
                return;
            }
               
        }
  
        } catch (\Throwable $th) {
          log_message('error', $th->getMessage());
          echo $this->utilities->outputMessage("error", "Internal Server Error");
          return;
        }
        echo $this->utilities->outputMessage("error", "Your proccess cannot be completed at this moment please try again later");
        return;
       
        

       
    }
    public function PaypalPayment()
    {
        try {
            $PaymentRequest = (object) $_POST;
            $this->load->model("transactions");
            $this->load->model("pricing");
            $this->load->model("users");
            $PaymentData = $this->pricing->GetPlan($PaymentRequest->planDuration);
            $PaymentData = array(
            "UserId" => $this->session->userdata("UserId"),
            "TransactionRef" => $PaymentRequest->transactionRef,
            "PaymentPlan" => $PaymentRequest->paymentPlan,
            "Duration" => $PaymentData->Duration,
            "Amount" => $PaymentRequest->amount,
            "PaymentMethod" => "Paypal",
            "DateCreated" => $this->utilities->DbTimeFormat()
        );
        $Response = $this->transactions->Insert($PaymentData);
        if ($Response > 0) {
            if($this->RenewAccount($PaymentRequest) > 0){
                $UserData = $this->users->Get($this->session->userdata("UserId"));
                $userSession = $this->utilities->PrepareUserSession($UserData);
                $this->utilities->SetSession($userSession);
                echo $this->utilities->outputMessage("success");
                return;
            }
               
        }
  
        } catch (\Throwable $th) {
          log_message('error', $th->getMessage());
          echo $this->utilities->outputMessage("error", "Internal Server Error");
          return;
        }
        echo $this->utilities->outputMessage("error", "Your proccess cannot be completed at this moment please try again later");
        return;
       
        

       
    }
    
  
    

    private function RenewAccount(stdClass $AccountData)
    {
      try {
          $this->load->model("pricing");
          $this->load->model("users");
          $this->load->model("pro");
          $this->load->model("rollover");
          $this->load->model("premium");
          $this->load->model("weekend");
          $PaymentData = $this->pricing->GetPlan($AccountData->planDuration);
          $ExpiryDate = $this->CalculateExpiry($PaymentData->Duration);
          $UserId = $this->session->userdata("UserId");
            $ActivationData = array(

                "ExpiryDate" => $ExpiryDate,
                "Duration" => $PaymentData->Duration,
                "Status" => "Active",
                "ModifiedBy" => $UserId,
                "CreatedBy" => $UserId,
                "UserIdHash" => $this->session->userdata("UserIdHash"),
                "UserId" => $UserId

            );
          if ($AccountData->paymentPlan == "premium") {
            //   $_res = $this->users->ActivatePremium($UserId);
             if($this->users->ActivatePremium($UserId) > 0){
                 $Response = $this->premium->UpdateDetails((object) $ActivationData, $UserId);
                 if($Response > 0)
                    return 1;
                
             };
             return 0;

          }elseif ($AccountData->paymentPlan == "pro") {
            if($this->users->ActivatePro($UserId) > 0){
                $Response = $this->pro->UpdateDetails((object) $ActivationData, $UserId);
                if($Response > 0)
                   return 1;
               
            };
            return 0;

         }elseif ($AccountData->paymentPlan == "rollover") {
            if($this->users->ActivateRollover($UserId) > 0){
                $Response = $this->rollover->UpdateDetails((object) $ActivationData, $UserId);
                if($Response > 0)
                   return 1;
               
            };
            return 0;

         }elseif ($AccountData->paymentPlan == "weekend") {
            if($this->users->ActivateWeekend20($UserId) > 0){
                $Response = $this->weekend->UpdateDetails((object) $ActivationData, $UserId);
                if($Response > 0)
                   return 1;
               
            };
            return 0;

         }
          
      } catch (\Throwable $th) {
        log_message('error', $th->getMessage()); 
      }
      return -1;
    }
    private function CalculateExpiry(string $Duration): string
    {
        try {
            $_durationArray =  explode(" ", $Duration);
            $today = $this->utilities->DbTimeFormat();
            $expiry = '';
            if(isset($_durationArray[1])){
                if (strtolower($_durationArray[1]) == 'day' || strtolower($_durationArray[1]) == 'days') {
                    $expiry = date('Y-m-d H:i:s', strtotime("+".$_durationArray[0]." day", strtotime($today)));
                }elseif (strtolower($_durationArray[1]) == 'week' || strtolower($_durationArray[1]) == 'weeks') {
                    $expiry = date('Y-m-d H:i:s', strtotime("+".$_durationArray[0]." week", strtotime($today)));
                }elseif (strtolower($_durationArray[1]) == 'year' || strtolower($_durationArray[1]) == 'years') {
                    $expiry = date('Y-m-d H:i:s', strtotime("+".$_durationArray[0]." year", strtotime($today)));
                }elseif (strtolower($_durationArray[1]) == 'month' || strtolower($_durationArray[1]) == 'months') {
                    $expiry = date('Y-m-d H:i:s', strtotime("+".$_durationArray[0]." months", strtotime($today)));
                }

            }else {
                $expiry = date('Y-m-d H:i:s', strtotime("+1 week", strtotime($today)));
            }
            
        } catch (\Throwable $th) {
            log_message('error', $th->getMessage()); 
        }
        return  $expiry;

    }

}

/* End of file paymentAjax.php */



?>
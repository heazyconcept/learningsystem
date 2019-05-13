<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Utilities
{
    protected $ci;

    public function __construct()
    {
        $this->ci =& get_instance();
    }
    public function formatDate($date)
    {
       return date("F j, Y g:i a", strtotime($date));
    }
    public function DateFormat($date)
    {
       return date("F j, Y", strtotime($date));
    }

    public function DbTimeFormat(){
        return date("Y-m-d H:i:s");

    }
    public function DbDateFormat(){
        return date("Y-m-d ");

    }
    public function Currency(){
        return "₦";
    }
    public function outputMessage($type, $message = "", $redirectURL = "")
    {
        if ($type == "success") {
            $output = array(
                "StatusCode" => "00",
                "StatusMessage" => $message,
                "RedirectUrl" => $redirectURL
            );
        } elseif ($type == "error") {
            $output = array(
                "StatusCode" => "99",
                "StatusMessage" => $message,
            );
        }
        return json_encode($output);

    }
    public function UpdateRequestId($reqId)
    {
        $requestId = $this->GenerateUniqueNumber(). $reqId;
        $processData = array(
            "RequestId" => $requestId
        );
        $dbOption = array(
            "table_name" => "orderrequest",
            "process_data" => $processData,
            "targets" => array("Id" => $reqId),
        );
        $this->ci->connectDb->modify_data(json_encode($dbOption));

    }
    public function SetSession($data)
    {
       $this->ci->session->set_userdata($data);

    }
    public function PrepareUserSession(stdClass $UserData): array
    {
        $UserSession = array(
            "UserId" => $UserData->Id,
            "FullName" => $UserData->FullName,
            "EmailAddress" => $UserData->EmailAddress,
            "PhoneNumber" => $UserData->PhoneNumber,
            "AccountType" => $UserData->AccountType,
            "Country" => $UserData->Country,
            "IsPremium" => $UserData->IsPremium,
            "IsPro" => $UserData->IsPro,
            "IsRollOver" => $UserData->IsRollOver,
            "IsWeekend20" => $UserData->IsWeekend20,
            "DateCreated" => $UserData->DateCreated,
            "UserIdHash" => $UserData->IdHash,
            "ProfileImage" => $UserData->ProfileImage
        );
        return $UserSession;

    }
    public function GetCountries() : string
    {
        $Countries = file_get_contents(base_url("json/countries.json"));
        return $Countries;
    }
    public function GeneratePassword( string $Password): string
    {
        $token = md5($Password);
        $EncryptedPassword = hash("sha512", $token . $Password);
        return $EncryptedPassword;
    }
    public function URLHash($string)
    {
        return md5($string);
    }
    public function IsNullOrEmptyString($str): bool
    {
        return (!isset($str) || trim($str) === '' || empty($str));
    }
    public function KeepPresentState(string $URL)
    {
       $this->ci->session->set_userdata("TempURl", $URL);
    }
    public function GetPresentState():string
    {
        if ($this->ci->session->has_userdata("TempURl")) {
            $PresentState = $this->ci->session->userdata("TempURl");
            $this->DestroyPresentState();
            return $PresentState;
            
        }
        return "";
    }
    private function DestroyPresentState()
    {
        $this->ci->session->unset_userdata('TempURl');
    }
    public function GenerateGUID(): string
    {
        if (function_exists('com_create_guid')) {
            $Guid = com_create_guid();
            $Guid = str_replace('-', '', $Guid);
            $Guid = str_replace('{', '', $Guid);
            $Guid = str_replace('}', '', $Guid);
            return strtolower($Guid);
        } else {
            mt_srand((double) microtime() * 10000); //optional for php 4.2.0 and up.
            $charid = strtoupper(md5(uniqid(rand(), true)));
            $uuid = substr($charid, 0, 8)
            . substr($charid, 8, 4)
            . substr($charid, 12, 4)
            . substr($charid, 16, 4)
            . substr($charid, 20, 12);

            return $uuid;
        }

    }
    public function AddPropertyToObJect(stdClass $Object, string $Key,  $Value): stdClass
    {
      $ObjectArray = (array) $Object;
      $ObjectArray[$Key] = $Value;
      return (object) $ObjectArray;
    }
    private function GenerateUniqueNumber()
    {
        return date("shim");
        
    }
    public function ProcessTable($DataOption): string
    {
        try {
            $json_data = array(
                "draw" => $DataOption->Draw,
                "recordsTotal" => $DataOption->totalData,
                "recordsFiltered" => $DataOption->totalFiltered,
                "data" => $DataOption->Data,
            );
            return json_encode($json_data);   
        } catch (\Throwable $th) {
            log_message('error', $th->getMessage());
        }
        return "";
       

       
    }
    public function UploadFile(string $UploadName): string
    {
        try {
            $this->ci->load->helper('form');
            $config['upload_path']          = './upload/profile_pic/';
            $config['allowed_types']        = 'jpg|png|gif|';
            $config['max_size']             = 10000;
            $this->ci->load->library('upload', $config);
            if ( ! $this->ci->upload->do_upload($UploadName))
            {
                $error = array('error' => $this->upload->display_errors());
                $this->LogError($error);
                return '';
               
            }else
            {
                $data =  $this->ci->upload->data();
                return $data['file_name'];
              
            }
        } catch (\Throwable $th) {
           $this->LogError($th);

        }
        return '';
    }
    public function LogError($Error)
    {
        log_message('error', $Error->getMessage());
    }
    public function CountDays($ExpiryDate)  :int
	{
       $today = $this->DbTimeFormat();
      $diff = strtotime($ExpiryDate)  - strtotime($today);
	  return round($diff / 86400) + 1;
    }
    public function GetProfileImage($UserImage): string
    {
        $imageUrl = (empty($UserImage))? 
        'https://via.placeholder.com/500x500': 
        base_url('upload/profile_pic/'. $UserImage);
        return $imageUrl;
    }


    




    

}

/* End of file LibraryName.php */
;

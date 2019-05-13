<?php 

defined('BASEPATH') OR exit('No direct script access allowed');

class Pro extends CI_Model {
    
    private $TableName = "pro";
   
   public function __construct()
   {
       parent::__construct();
       $this->load->model('connectDb');
       
   }
   
    public function UpdateDetails(stdClass $ProData, int $UserId): int
    {
        try {
            $DbResult = $this->GetByUserId($UserId);
            $userActivation = (array) $DbResult;
            if(!empty($userActivation)){
                $SubUpdate = array(
                    "PaymentDate" => $this->utilities->DbTimeFormat(),
                    "ExpiryDate" => $ProData->ExpiryDate,
                    "Duration" => $ProData->Duration,
                    "Status" => $ProData->Status,
                    "ModifiedBy" => $ProData->ModifiedBy,
                    "DateModified" => $this->utilities->DbTimeFormat(),
                );
                $dbOptions = array(
                    "table_name" => $this->TableName,
                    "process_data" => $SubUpdate,
                    "targets" => (object) array("UserId" => $UserId),
                );
                $DbResponse = $this->connectDb->modify_data((object) $dbOptions);
                if(!empty($DbResponse))
                    return 1;

            }else{
                $SubUpdate = array(
                    "UserId" => $ProData->UserId,
                    "PaymentDate" => $this->utilities->DbTimeFormat(),
                    "ExpiryDate" => $ProData->ExpiryDate,
                    "Duration" => $ProData->Duration,
                    "Status" => $ProData->Status,
                    "CreatedBy" => $ProData->CreatedBy,
                    "DateCreated" => $this->utilities->DbTimeFormat(),
                    "UserIdHash" => $ProData->UserIdHash,
                    "IdHash" => $this->utilities->GenerateGUID(),
                );
                $dbOptions = array(
                    "table_name" => $this->TableName,
                    "process_data" => $SubUpdate,
                    
                );
                $DbResponse = $this->connectDb->insert_data((object) $dbOptions);
                if(!empty($DbResponse))
                    return 1;

            }
           
           
        } catch (\Throwable $th) {
            
            log_message('error', $th->getMessage());
            return -1;
        }
       return 0;
        
    }
    public function Deactivate(int $UserId): int
    {
        try {
           
        
            $dbOptions = array(
                "table_name" => $this->TableName,
                "process_data" => (object) array("Status" => "Expired"),
                "targets" => (object) array("UserId" => $UserId)
            );
            $DbResponse = $this->connectDb->modify_data((object) $dbOptions);
            if(!empty($DbResponse))
                return 1;
            } catch (\Throwable $th) {
                log_message('error', $th->getMessage()); 
                return -1;
            }
            return 0;
    }
   
    public function GetByUserId(int $UserId): stdClass
    {
        try {
            $dbOptions = array(
                "table_name" => $this->TableName,
                "targets" => (object) array("UserId" => $UserId)
            );
            $dbResult = $this->connectDb->select_data((object) $dbOptions);
            if(!empty($dbResult))
                return $dbResult[0];
    
            
        } catch (\Throwable $th) {
            
            log_message('error', $th->getMessage());
        
        }
        return (object) array();
        
    }
    public function GetStatus(int $UserId): string
    {
        try {
            $dbOptions = array(
                "table_name" => $this->TableName,
                "targets" => (object) array("UserId" => $UserId)
            );
            $dbResult = $this->connectDb->select_data((object) $dbOptions);
            if(!empty($dbResult))
                return $dbResult[0]->Status;
    
            
        } catch (\Throwable $th) {
            
            log_message('error', $th->getMessage());
        
        }
        return null;
        
    }
    
   



}

/* End of file ModelName.php */



?>
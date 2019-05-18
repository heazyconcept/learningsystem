
<?php



defined('BASEPATH') OR exit('No direct script access allowed');

class CustomSession extends CI_Model {

    private $TableName = "customsession";
   
    public function __construct()
    {
        parent::__construct();
        $this->load->model('connectDb');
        
    }
    
     public function Insert(stdClass $SessionData): int
     {
         try {
             $ActiveSession = $this->GetActiveSession($SessionData->UserId);
             if (!empty($ActiveSession)) {
                 $this->DeleteSession($SessionData->UserId);
             }

             $dbOptions = array(
                 "table_name" => $this->TableName,
                 "process_data" => $SessionData,
             );
             $DbResponse = $this->connectDb->insert_data((object) $dbOptions);
             if(!empty($DbResponse))
                 return $DbResponse;
         } catch (\Throwable $th) {
             log_message('error', $th->getMessage());
             return -1;
         }
        return 0;
         
     }
     
     public function Get(string $SessionId): stdClass
     {
         try {
             $dbOptions = array(
                 "table_name" => $this->TableName,
                 "targets" => (object) array("SessionId" => $SessionId)
             );
             $dbResult = $this->connectDb->select_data((object) $dbOptions);
             if(!empty($dbResult))
                 return $dbResult[0];
     
             
         } catch (\Throwable $th) {
             
             log_message('error', $th->getMessage());
         
         }
         return null;
         
     }
     public function GetActiveSession(int $UserId): array
     {
         try {
             $dbOptions = array(
                 "table_name" => $this->TableName,
                 "targets" => (object) array("UserId" => $UserId, "IsActive" => 1)
             );
             $dbResult = $this->connectDb->select_data((object) $dbOptions);
             if(!empty($dbResult))
                 return $dbResult;
     
             
         } catch (\Throwable $th) {
             
             log_message('error', $th->getMessage());
         
         }
         return array();
         
     }
    
    
     public function VerifySession(string $SessionId): bool 
     {
         try {
             $dbOptions = array(
                 "table_name" => $this->TableName,
                 "targets" => (object) array("SessionId" => $SessionId)
             );
             $dbResult = $this->connectDb->select_data((object) $dbOptions);
             if(!empty($dbResult)){
                 if ($dbResult[0]->IsActive == 1) {
                     return true;
                 }
             }
                
     
             
         } catch (\Throwable $th) {
             
             log_message('error', $th->getMessage());
         
         }
         return false;
         
     }
     public function DeleteSession(int $UserId): bool
     {
         try {
             
         $sessionUpdate = array(
             "IsActive" => 0,
         );
         $dbOptions = array(
             "table_name" => $this->TableName,
             "process_data" => (object) $sessionUpdate,
             "targets" => (object) array("UserId" => $UserId)
         );
         $DbResponse = $this->connectDb->modify_data((object) $dbOptions);
         if(!empty($DbResponse))
             return true;
         } catch (\Throwable $th) {
             log_message('error', $th->getMessage()); 
         }
         return false;
         
     }
    

}

/* End of file Session.php */


?>
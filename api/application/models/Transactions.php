<?php 

defined('BASEPATH') OR exit('No direct script access allowed');

class Transactions extends CI_Model {
    private $TableName = "transactions";
   
    public function __construct()
    {
        parent::__construct();
        $this->load->model('connectDb');
        
    }
    
     public function Insert(array $TranData): int
     {
         try {
             $dbOptions = array(
                 "table_name" => $this->TableName,
                 "process_data" => (object) $TranData,
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
     
     public function Get(int $TranId): stdClass
     {
         try {
             $dbOptions = array(
                 "table_name" => $this->TableName,
                 "targets" => (object) array("Id" => $TranId)
             );
             $dbResult = $this->connectDb->select_data((object) $dbOptions);
             if(!empty($dbResult))
                 return $dbResult[0];
     
             
         } catch (\Throwable $th) {
             
             log_message('error', $th->getMessage());
         
         }
         return null;
         
     }
     public function GetByRef(string $TranRef): stdClass
     {
         try {
             $dbOptions = array(
                 "table_name" => $this->TableName,
                 "targets" => (object) array("TransactionRef" => $TranRef)
             );
             $dbResult = $this->connectDb->select_data((object) $dbOptions);
             if(!empty($dbResult))
                 return $dbResult[0];
         } catch (\Throwable $th) {
             log_message('error', $th->getMessage());
         
         }
         return (object) array();
         
     }
     
    
     
    
     
     
    
    
    
    
     
     
    
    

}

/* End of file Transactions.php */


?>
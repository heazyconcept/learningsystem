<?php 
 
 defined('BASEPATH') OR exit('No direct script access allowed');
 
 class Leagues extends CI_Model {
 
    private $TableName = "leagues";
   
    public function __construct()
    {
        parent::__construct();
        $this->load->model('connectDb');
        
    }
    
     public function Insert(array $LeagueData): int
     {
         $this->load->library("utilities");
         
         try {
             $LeagueData['IdHash'] = $this->utilities->GenerateGUID();
             $dbOptions = array(
                 "table_name" => $this->TableName,
                 "process_data" => (object) $LeagueData,
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
     public function update(object $LeagueData, int $LeagueId): int
     {
         try {
             $LeagueDB = $this->Get($LeagueId);
             $LeagueUpdate = array(
                 "League" => (isset($LeagueData->League) && $LeagueData->League != $LeagueDB->League)? $LeagueData->League : $LeagueDB->League,
                 "Region" => (isset($LeagueData->Region) && $LeagueData->Region != $LeagueDB->Region)? $LeagueData->Region : $LeagueDB->Region,
             );
             $dbOptions = array(
                 "table_name" => $this->TableName,
                 "process_data" => (object) $LeagueUpdate,
                 "targets" => (object) array("Id" => $LeagueId)
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
     public function updateByHash(object $LeagueData, int $LeagueHash): int
     {
         try {
             $LeagueDB = $this->Get($LeagueId);
             $LeagueUpdate = array(
                 "League" => (isset($LeagueData->League) && $LeagueData->League != $LeagueDB->League)? $LeagueData->League : $LeagueDB->League,
                 "Region" => (isset($LeagueData->Region) && $LeagueData->Region != $LeagueDB->Region)? $LeagueData->Region : $LeagueDB->Region,
             );
             $dbOptions = array(
                 "table_name" => $this->TableName,
                 "process_data" => (object) $LeagueUpdate,
                 "targets" => (object) array("IdHash" => $LeagueHash)
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
     public function Get(int $LeagueId): stdClass
     {
         try {
             $dbOptions = array(
                 "table_name" => $this->TableName,
                 "targets" => (object) array("Id" => $UserId)
             );
             $dbResult = $this->connectDb->select_data((object) $dbOptions);
             if(!empty($dbResult))
                 return $dbResult[0];
     
             
         } catch (\Throwable $th) {
             
             log_message('error', $th->getMessage());
         
         }
         return null;
         
     }
     public function GetByHash(string $LeagueHash): stdClass
     {
         try {
             $dbOptions = array(
                 "table_name" => $this->TableName,
                 "targets" => (object) array("IdHash" => $LeagueHash)
             );
             $dbResult = $this->connectDb->select_data((object) $dbOptions);
             if(!empty($dbResult))
                 return $dbResult[0];
     
             
         } catch (\Throwable $th) {
             
             log_message('error', $th->getMessage());
         
         }
         return null;
         
     }
     public function ListRegion(): array 
     {
         try {
             $dbOptions = array(
                 "table_name" => $this->TableName,
                "single_column" => "Region",
                "is_distinct" => 1
             );
             $dbResult = $this->connectDb->select_data((object) $dbOptions);
             if(!empty($dbResult))
                 return $dbResult;
             
         } catch (\Throwable $th) {
             
             log_message('error', $th->getMessage());
         
         }
         return null;
         
     }
     public function ListAll(): array 
     {
         try {
             $dbOptions = array(
                 "table_name" => $this->TableName,
             );
             $dbResult = $this->connectDb->select_data((object) $dbOptions);
             if(!empty($dbResult))
                 return $dbResult;
             
         } catch (\Throwable $th) {
             
             log_message('error', $th->getMessage());
         
         }
         return null;
         
     }
     public function ListLeagueByRegion(string $Region): array 
     {
         try {
             $dbOptions = array(
                 "table_name" => $this->TableName,
                "targets" => array("Region" => $Region)
             );
             $dbResult = $this->connectDb->select_data((object) $dbOptions);
             if(!empty($dbResult))
                 return $dbResult;
             
         } catch (\Throwable $th) {
             
             log_message('error', $th->getMessage());
         
         }
         return null;
         
     }
     public function GetColumn(int $leagueId, string $Column ): string
     {
        try {
            $dbOptions = array(
                "table_name" => $this->TableName,
                "targets" => (object) array("Id" => $leagueId)
            );
            $dbResult = $this->connectDb->select_data((object) $dbOptions);
            if(!empty($dbResult))
                return $dbResult[0]->$Column;
    
            
        } catch (\Throwable $th) {
            
            log_message('error', $th->getMessage());
        
        }
        return null;
     }
     
    public function DeleteLeague( int $LeagueId):bool
    {
        try {
            $dbOptions = array(
                "table_name" => $this->TableName,
               "targets" => array("Id" => $LeagueId)
            );
            $DbResponse = $this->connectDb->delete_data((object) $dbOptions);
            if(!empty($DbResponse))
                return true;
            
        } catch (\Throwable $th) {
            
            log_message('error', $th->getMessage());
        
        }
        return false;
    }
 
 
 
 }
 
 /* End of file Leagues.php */
 

?>
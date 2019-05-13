<?php 

defined('BASEPATH') OR exit('No direct script access allowed');

class LeagueTable extends CI_Model {

    private $TableName = "leaguetable";
   
    public function __construct()
    {
        parent::__construct();
        $this->load->model('connectDb');
        
    }
    
     public function Insert(array $TableData): int
     {
         
         try {
             $TableData['DateCreated'] = $this->utilities->DbTimeFormat();
             $TableData['IdHash'] = $this->utilities->GenerateGUID();
             $dbOptions = array(
                 "table_name" => $this->TableName,
                 "process_data" => (object) $TableData,
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
     public function update(stdClass $TableData, int $TableId): int
     {
        
         try {
             $TableDB = $this->Get($TableId);
             $TableUpdate = array(
                 "Team" => (isset($TableData->Team) && $TableData->Team != $TableDB->Team)? $TableData->Team : $TableDB->Team,
                 "TeamSlug" => (isset($TableData->TeamSlug) && $TableData->TeamSlug != $TableDB->TeamSlug)? $TableData->TeamSlug : $TableDB->TeamSlug,
                 "GamePlayed" => (isset($TableData->GamePlayed) && $TableData->GamePlayed != $TableDB->GamePlayed)? $TableData->GamePlayed : $TableDB->GamePlayed,
                 "Points" => (isset($TableData->Points) && $TableData->Points != $TableDB->Points)? $TableData->Points : $TableDB->Points,
                 "GoalDifference" => (isset($TableData->GoalDifference) && $TableData->GoalDifference != $TableDB->GoalDifference)? $TableData->GoalDifference : $TableDB->GoalDifference,
                 "DateModified" => $this->utilities->DbTimeFormat(),
             );
             $dbOptions = array(
                 "table_name" => $this->TableName,
                 "process_data" => (object) $TableUpdate,
                 "targets" => (object) array("Id" => $TableId)
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
     public function updateByHash(stdClass $TableData, int $TableHash): int
     {
        
         try {
             $TableDB = $this->Get($TableId);
             $TableUpdate = array(
                 "Team" => (isset($TableData->Team) && $TableData->Team != $TableDB->Team)? $TableData->Team : $TableDB->Team,
                 "TeamSlug" => (isset($TableData->TeamSlug) && $TableData->TeamSlug != $TableDB->TeamSlug)? $TableData->TeamSlug : $TableDB->TeamSlug,
                 "GamePlayed" => (isset($TableData->GamePlayed) && $TableData->GamePlayed != $TableDB->GamePlayed)? $TableData->GamePlayed : $TableDB->GamePlayed,
                 "Points" => (isset($TableData->Points) && $TableData->Points != $TableDB->Points)? $TableData->Points : $TableDB->Points,
                 "GoalDifference" => (isset($TableData->GoalDifference) && $TableData->GoalDifference != $TableDB->GoalDifference)? $TableData->GoalDifference : $TableDB->GoalDifference,
                 "DateModified" => $this->utilities->DbTimeFormat(),
             );
             $dbOptions = array(
                 "table_name" => $this->TableName,
                 "process_data" => (object) $TableUpdate,
                 "targets" => (object) array("IdHash" => $TableHash)
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
     public function Get(int $TableId): stdClass
     {
        
         try {
             $dbOptions = array(
                 "table_name" => $this->TableName,
                 "targets" => (object) array("Id" => $TableId)
             );
             $dbResult = $this->connectDb->select_data((object) $dbOptions);
             if(!empty($dbResult))
                 return $dbResult[0];
     
             
         } catch (\Throwable $th) {
             
             log_message('error', $th->getMessage());
         
         }
         return null;
         
     }
     public function GetByHash(int $TableHash): stdClass
     {
        
         try {
             $dbOptions = array(
                 "table_name" => $this->TableName,
                 "targets" => (object) array("IdHash" => $TableHash)
             );
             $dbResult = $this->connectDb->select_data((object) $dbOptions);
             if(!empty($dbResult))
                 return $dbResult[0];
     
             
         } catch (\Throwable $th) {
             
             log_message('error', $th->getMessage());
         
         }
         return null;
         
     }
    
    
     public function ListTableByLeague(int $leagueId): array 
     {
        
         try {
            $dbOptions = array(
                "my_query" => "SELECT * FROM $this->TableName where LeagueId = $leagueId order by Points DESC, GoalDifference DESC",
                "query_action" => "select"
            );
            
             $dbResult = $this->connectDb->custom_query((object) $dbOptions);
            
             if(!empty($dbResult))
                 return $dbResult;
             
         } catch (\Throwable $th) {
           
             log_message('error', $th->getMessage());
         
         }
         return array();
         
     }
     public function ListPossibleTeam(stdClass $searchParam): array
     {
         try {

        $query = "select * from $this->TableName where LeagueId = $searchParam->LeagueId and Team like '%$searchParam->teamSearch%'";
         $dbOptions = array(
             "my_query" => $query,
             "query_action" => 'select'
         );
         $dbResult = $this->connectDb->custom_query((object) $dbOptions);
         if(!empty($dbResult))
            return $dbResult;
         }  catch (\Throwable $th) {
           
            log_message('error', $th->getMessage());
        
        }
         return array();
     }
    
     
    public function DeleteTable( int $TableId):bool
    {
        try {
            $dbOptions = array(
                "table_name" => $this->TableName,
               "targets" => array("Id" => $TableId)
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

/* End of file LeagueTable.php */


?>
<?php 

defined('BASEPATH') OR exit('No direct script access allowed');

class Testimonials extends CI_Model {

    private $TableName = "testimonials";
   
    public function __construct()
    {
        parent::__construct();
        $this->load->model('connectDb');
        
    }
    public function Insert(stdClass $TestimonialData): int
    {
        try {
            $dbOptions = array(
                "table_name" => $this->TableName,
                "process_data" =>  $TestimonialData,
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
    public function update(stdClass $TestimonialData, int $TestimonialId): int
    {
        try {
            $TestimonialDB = $this->Get($TestimonialId);
            $TestimonialUpdate = array(
                "Testimony" => (isset($TestimonialData->Testimony) && $TestimonialData->Testimony != $TestimonialDB->Testimony)? $TestimonialData->Testimony : $TestimonialDB->Testimony,
                "FullName" => (isset($TestimonialData->FullName) && $TestimonialData->FullName != $TestimonialDB->FullName)? $TestimonialData->FullName : $TestimonialDB->FullName,
                "Country" => (isset($TestimonialData->Country) && $TestimonialData->Country != $TestimonialDB->Country)? $TestimonialData->Country : $TestimonialDB->Country,
                "IsActive" => (isset($TestimonialData->IsActive) && $TestimonialData->IsActive != $TestimonialDB->IsActive)? $TestimonialData->IsActive : $TestimonialDB->IsActive,
                 "DateModified" => $this->utilities->DbTimeFormat()
            );
            $dbOptions = array(
                "table_name" => $this->TableName,
                "process_data" => (object) $TestimonialUpdate,
                "targets" => (object) array("Id" => $TestimonialId)
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
    public function Get(int $TestimonialId): stdClass
    {
        try {
            $dbOptions = array(
                "table_name" => $this->TableName,
                "targets" => (object) array("Id" => $TestimonialId)
            );
            $dbResult = $this->connectDb->select_data((object) $dbOptions);
            if(!empty($dbResult))
                return $dbResult[0];
    
        } catch (\Throwable $th) {
            
            log_message('error', $th->getMessage());
        
        }
        return (object) array();
        
    }
    public function ListAll(int $limit = 0, int $start = 0, array $targets = array()): array
    {
        try {
            
            if (empty($targets)) {
                if (empty($limit) && empty($start)) {
                    $dbOptions = array(
                        "table_name" => $this->TableName,
                    );
                } else {

                    if (empty($limit)) {
                        $dbOptions = array(
                            "table_name" => $this->TableName,
                            "offset" => $start,
                        );
                    }elseif (empty($start)) {
                        $dbOptions = array(
                            "table_name" => $this->TableName,
                            "limit" => $limit,
                        );
                    }else {
                        $dbOptions = array(
                            "table_name" => $this->TableName,
                            "limit" => $limit,
                            "offset" => $start,
                        );
                    }
                }
            }else {
                if (empty($limit) && empty($start)) {
                    $dbOptions = array(
                        "table_name" => $this->TableName,
                        "targets" => (object) $targets
                    );
                } else {

                    if (empty($limit)) {
                        $dbOptions = array(
                            "table_name" => $this->TableName,
                            "offset" => $start,
                            "targets" => (object) $targets,
                        );
                    }elseif (empty($start)) {
                        $dbOptions = array(
                            "table_name" => $this->TableName,
                            "limit" => $limit,
                            "targets" => (object) $targets,
                        );
                    }else {
                        $dbOptions = array(
                            "table_name" => $this->TableName,
                            "limit" => $limit,
                            "offset" => $start,
                            "targets" => (object) $targets,
                        );
                    }
                }
            }
            $dbResult = $this->connectDb->select_data((object) $dbOptions);
                return $dbResult;
    
            
        } catch (\Throwable $th) {
            
            log_message('error', $th->getMessage());
        
        }
        return array();
        
    }
    public function SearchTestimonial(int $limit = 0, int $start = 0, string $SearchParam , $Targets = array() ): array
    {
        
        try {
            $_table = $this->TableName;
            $_targets = '';
            if(!empty($Targets)){
                $_key = key($Targets[0]);
                $_value = $Targets[0];
                $_targets = " AND $_key = '$_value'";
            }
            $query = "SELECT * FROM $_table WHERE  
            CONCAT(Testimony, FullName, Country) LIKE '%$SearchParam%' ". $_targets ." 
             LIMIT $limit OFFSET $start ";
            $dbOptions = array(
                "my_query" => $query,
                "query_action" => "select"
            );
            $dbResult = $this->connectDb->custom_query((object) $dbOptions);
            return $dbResult;

        } catch (\Throwable $th) {
             log_message('error', $th->getMessage());
        }
        return array();

    }
    public function SearchTestimonialCount( string $SearchParam, $Targets = array()): int
    {
        
        try {
            $_table = $this->TableName;
            $_targets = '';
            if(!empty($Targets)){
                $_key = key($Targets[0]);
                $_value = $Targets[0];
                $_targets = " AND $_key = '$_value'";
            }
            $query = "SELECT * FROM $_table WHERE  CONCAT(Testimony, FullName, Country) LIKE '%$SearchParam%' ". $_targets;
            $dbOptions = array(
                "my_query" => $query,
                "query_action" => "select"
            );
            $dbResult = $this->connectDb->custom_query((object) $dbOptions);
            return count($dbResult);

        } catch (\Throwable $th) {
             log_message('error', $th->getMessage());
        }
        return 0;

    }
    public function Delete( int $TestimonialId):bool
    {
        try {
            $dbOptions = array(
                "table_name" => $this->TableName,
               "targets" => array("Id" => $TestimonialId)
            );
            $DbResponse = $this->connectDb->delete_data((object) $dbOptions);
            if(!empty($DbResponse))
                return true;
            
        } catch (\Throwable $th) {
            
            log_message('error', $th->getMessage());
        
        }
        return false;
    }
    public function Count(array $targets = array(), string $operator = ''): int
    {
        try {
            if (empty($targets)) {
                $dbOptions = array(
                    "table_name" => $this->TableName
                );
            }else {
                $dbOptions = array(
                    "table_name" => $this->TableName,
                    "targets" => $targets,
                    "operator" => $operator
                );
            }
            
            $DbResponse = $this->connectDb->count_data((object) $dbOptions);
            return $DbResponse;
         } catch (\Throwable $th) {
            log_message('error', $th->getMessage()); 
        }
        return 0;
    
    }
  
    

}

/* End of file Testimonials.php */

?>
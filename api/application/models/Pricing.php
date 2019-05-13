<?php 

defined('BASEPATH') OR exit('No direct script access allowed');

class Pricing extends CI_Model {

    private $TableName = "pricing";
   
    public function __construct()
    {
        parent::__construct();
        $this->load->model('connectDb');
        
    }
    public function GetPrice($Id) : string
    {
        try {
                $dbOptions = array(
                    "table_name" => $this->TableName,
                    "targets" => (object) array("Id" => $Id)
                );
           
            $dbResult = $this->connectDb->select_data((object) $dbOptions);
            if(!empty($dbResult))
                return $dbResult[0]->Amount;
            
        } catch (\Throwable $th) {
            
            log_message('error', $th->getMessage());
        
        }
        return '';
    }
    public function GetPlan($Id) : stdClass
    {
        try {
                $dbOptions = array(
                    "table_name" => $this->TableName,
                    "targets" => (object) array("Id" => $Id)
                );
           
            $dbResult = $this->connectDb->select_data((object) $dbOptions);
            if(!empty($dbResult))
                return $dbResult[0];
            
        } catch (\Throwable $th) {
            
            log_message('error', $th->getMessage());
        
        }
        return '';
    }
    public function GetPremiumPrice($Duration = "") : array
    {
        try {
            if (empty($Duration)) {
                $dbOptions = array(
                    "table_name" => $this->TableName,
                    "targets" => (object) array("PlanType" => 'premium')
                );
            } else {
                $dbOptions = array(
                    "table_name" => $this->TableName,
                    "targets" => (object) array("PlanType" => 'premium', "Duration" => $Duration)
                );
            }
            $dbResult = $this->connectDb->select_data((object) $dbOptions);
            if(!empty($dbResult))
                return $dbResult;
            
        } catch (\Throwable $th) {
            
            log_message('error', $th->getMessage());
        
        }
        return array();
    }
    public function GetProPrice($Duration = "") : array
    {
        try {
            if (empty($Duration)) {
                $dbOptions = array(
                    "table_name" => $this->TableName,
                    "targets" => (object) array("PlanType" => 'pro')
                );
            } else {
                $dbOptions = array(
                    "table_name" => $this->TableName,
                    "targets" => (object) array("PlanType" => 'pro', "Duration" => $Duration)
                );
            }
           
            $dbResult = $this->connectDb->select_data((object) $dbOptions);
            if(!empty($dbResult))
                return $dbResult;
            
        } catch (\Throwable $th) {
            
            log_message('error', $th->getMessage());
        
        }
        return array();
    }
    public function GetRollOverPrice($Duration = "") : array
    {
        try {
            if (empty($Duration)) {
                $dbOptions = array(
                    "table_name" => $this->TableName,
                    "targets" => (object) array("PlanType" => 'rollover')
                );
            } else {
                $dbOptions = array(
                    "table_name" => $this->TableName,
                    "targets" => (object) array("PlanType" => 'rollover', "Duration" => $Duration)
                );
            }
           
            $dbResult = $this->connectDb->select_data((object) $dbOptions);
            if(!empty($dbResult))
                return $dbResult;
            
        } catch (\Throwable $th) {
            
            log_message('error', $th->getMessage());
        
        }
        return null;
    }
    public function GetWeekendPrice($Duration = "") : array
    {
        try {
            if (empty($Duration)) {
                $dbOptions = array(
                    "table_name" => $this->TableName,
                    "targets" => (object) array("PlanType" => 'weekend')
                );
            } else {
                $dbOptions = array(
                    "table_name" => $this->TableName,
                    "targets" => (object) array("PlanType" => 'weekend', "Duration" => $Duration)
                );
            }
           
            $dbResult = $this->connectDb->select_data((object) $dbOptions);
            if(!empty($dbResult))
                return $dbResult;
            
        } catch (\Throwable $th) {
            
            log_message('error', $th->getMessage());
        
        }
        return array();
    }
    public function ListAllPlan() : array
    {
        try {
                $dbOptions = array(
                    "table_name" => $this->TableName,
                    "single_column" => "PlanType",
                    "is_distinct" => 1
                );
          
           
            $dbResult = $this->connectDb->select_data((object) $dbOptions);
            if(!empty($dbResult))
                return $dbResult;
            
        } catch (\Throwable $th) {
            
            log_message('error', $th->getMessage());
        
        }
        return array();
    }
    public function ListDurationByPlan($Plan) : array
    {
        try {
            $dbOptions = array(
                "table_name" => $this->TableName,
                "targets" => (object) array("PlanType" => $Plan)
            );
           
            $dbResult = $this->connectDb->select_data((object) $dbOptions);
            if(!empty($dbResult))
                return $dbResult;
            
        } catch (\Throwable $th) {
            
            log_message('error', $th->getMessage());
        
        }
        return array();
    }
    
     
    
   
   
     
    

}

/* End of file Pricing.php */


?>
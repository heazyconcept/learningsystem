<?php 

defined('BASEPATH') OR exit('No direct script access allowed');

class Betstore extends CI_Model {

    private $TableName = "betstore";
   
    public function __construct()
    {
        parent::__construct();
        $this->load->model('connectDb');
        
    }

    public function GetStoreByPlan(string $Plan) : array
    {
        try {
                $dbOptions = array(
                    "table_name" => $this->TableName,
                    "targets" => (object) array("Plan" => $Plan)
                );
           
            $dbResult = $this->connectDb->select_data((object) $dbOptions);
            if(!empty($dbResult))
                return $dbResult;
            
        } catch (\Throwable $th) {
            
            log_message('error', $th->getMessage());
        
        }
        return array();
    }
    public function ListAll() : array
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
        return array();
    }
    
    

}

/* End of file Betstore.php */



?>
<?php 

defined('BASEPATH') OR exit('No direct script access allowed');

class Users extends CI_Model {
    
    private $TableName = "users";
   
   public function __construct()
   {
       parent::__construct();
       $this->load->model('connectDb');
       
   }
   
    public function Insert(array $UserData): int
    {
        try {
            $this->load->library("utilities");
        
            $hash = md5($UserData['Password']);
            $UserData['Password'] = hash("sha512", $hash . $UserData['Password']);
            $UserData["Hash"] = $hash;
            $userdata["IsActive"] = 1;
            $UserData["DateCreated"] = $this->utilities->DbTimeFormat();
            $dbOptions = array(
                "table_name" => $this->TableName,
                "process_data" => (object) $UserData,
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
    public function update(stdClass $UserData, int $UserId): int
    {
        try {
            $UserDB = $this->Get($UserId);
            $UserUpdate = array(
                "FullName" => (isset($UserData->FullName) && $UserData->FullName != $UserDB->FullName)? $UserData->FullName : $UserDB->FullName,
                "EmailAddress" => (isset($UserData->EmailAddress) && $UserData->EmailAddress != $UserDB->EmailAddress)? $UserData->EmailAddress : $UserDB->EmailAddress,
                "PhoneNumber" => (isset($UserData->PhoneNumber) && $UserData->PhoneNumber != $UserDB->PhoneNumber)? $UserData->PhoneNumber : $UserDB->PhoneNumber,
                "Country" => (isset($UserData->Country) && $UserData->Country != $UserDB->Country)? $UserData->Country : $UserDB->Country,
                "UserType" => (isset($UserData->UserType) && $UserData->UserType != $UserDB->UserType)? $UserData->UserType : $UserDB->UserType,
                "IsActive" => (isset($UserData->IsActive) && $UserData->IsActive != $UserDB->IsActive)? $UserData->IsActive : $UserDB->IsActive,
                "DateModified" => $this->utilities->DbTimeFormat(),
                "ProfileImage" => (isset($UserData->ProfileImage) && $UserData->ProfileImage != $UserDB->ProfileImage)? $UserData->ProfileImage : $UserDB->ProfileImage,
                 "Gender" => (isset($UserData->Gender) && $UserData->Gender != $UserDB->Gender)? $UserData->Gender : $UserDB->Gender
            );
            $dbOptions = array(
                "table_name" => $this->TableName,
                "process_data" => (object) $UserUpdate,
                "targets" => (object) array("Id" => $UserId)
            );
            $DbResponse = $this->connectDb->modify_data((object) $dbOptions);
            if($DbResponse > 0)
                return 1;
        } catch (\Throwable $th) {
            log_message('error', $th->getMessage());
            return -1;
        }
        return 0;
       
        
        
    }
    public function Get(int $UserId): stdClass
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
   
   
    public function GetByEmail(string $EmailAddress): stdClass 
    {
        try {
            $dbOptions = array(
                "table_name" => $this->TableName,
                "targets" => (object) array("EmailAddress" => $EmailAddress)
            );
            $dbResult = $this->connectDb->select_data((object) $dbOptions);
            if(!empty($dbResult))
                return $dbResult[0];
    
            
        } catch (\Throwable $th) {
            
            log_message('error', $th->getMessage());
        
        }
        return (object) array();
        
    }
    public function GetByPhoneNumber(string $PhoneNumber): stdClass 
    {
        try {
            $dbOptions = array(
                "table_name" => $this->TableName,
                "targets" => (object) array("PhoneNumber" => $PhoneNumber)
            );
            $dbResult = $this->connectDb->select_data((object) $dbOptions);
            if(!empty($dbResult))
                return $dbResult[0];
    
            
        } catch (\Throwable $th) {
            
            log_message('error', $th->getMessage());
        
        }
        return (object) array();
        
    }
    public function ChangePassword(string $Password, int $UserId): int
    {
        try {
            $hash = md5($Password);
        $Password = hash("sha512", $hash . $Password);
        $UserUpdate = array(
            "Password" => $Password,
            "Hash" => $hash
        );
        $dbOptions = array(
            "table_name" => $this->TableName,
            "process_data" => (object) $UserUpdate,
            "targets" => (object) array("Id" => $UserId)
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
    public function ConfirmPassword(string $Password, int $UserId): bool
    {
        try {
            $userdata =  $this->Get($UserId);
            $hash = md5($Password);
            $enteredPassword = hash("sha512", $hash . $Password);
            if ($userdata->Password == $enteredPassword) {
                return true;
            }
           
        
        } catch (\Throwable $th) {
            log_message('error', $th->getMessage()); 
           
        }
        return false;
        
    }
    
    public function ChangeAccountType(string $Type, int $UserId): int
    {
        try {
        
            $dbOptions = array(
                "table_name" => $this->TableName,
                "process_data" => (object) array("AccountType" => $Type),
                "targets" => (object) array("Id" => $UserId)
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
    public function CheckExist($EmailAddress, $PhoneNumber): bool
    {
        try {
            $dbOptions = array(
                "table_name" => $this->TableName,
                "targets" => array("EmailAddress" => $EmailAddress, "PhoneNumber" => $PhoneNumber ),
                "operator" => "OR"
            );
            $DbResponse = $this->connectDb->count_data((object) $dbOptions);
            if(empty($DbResponse))
                return true;
         } catch (\Throwable $th) {
            log_message('error', $th->getMessage()); 
            
        }
        return false;
      
    }
    public function CountUsers(array $targets = array(), string $operator = ''): int
    {
        try {
            if (empty($targets)) {
                $dbOptions = array(
                    "table_name" => $this->TableName,
                    "exclude_key" => "AccountType",
                    "exclude_values" => array("Admin")
                );
            }else {
                $dbOptions = array(
                    "table_name" => $this->TableName,
                    "targets" => $targets,
                    "operator" => $operator,
                    "exclude_key" => "AccountType",
                    "exclude_values" => array("Admin")
                );
            }
            
            $DbResponse = $this->connectDb->count_data((object) $dbOptions);
            return $DbResponse;
         } catch (\Throwable $th) {
            log_message('error', $th->getMessage()); 
        }
        return 0;
    
    }
    public function ListAll(int $limit = 0, int $start = 0, array $targets = array()): array
    {
        try {
            
            if (empty($targets)) {
                if (empty($limit) && empty($start)) {
                    $dbOptions = array(
                        "table_name" => $this->TableName,
                        "exclude_key" => "AccountType",
                        "exclude_values" => array("Admin")
                    );
                } else {

                    if (empty($limit)) {
                        $dbOptions = array(
                            "table_name" => $this->TableName,
                            "offset" => $start,
                            "exclude_key" => "AccountType",
                            "exclude_values" => array("Admin")
                        );
                    }elseif (empty($start)) {
                        $dbOptions = array(
                            "table_name" => $this->TableName,
                            "limit" => $limit,
                            "exclude_key" => "AccountType",
                            "exclude_values" => array("Admin")
                        );
                    }else {
                        $dbOptions = array(
                            "table_name" => $this->TableName,
                            "limit" => $limit,
                            "offset" => $start,
                            "exclude_key" => "AccountType",
                            "exclude_values" => array("Admin")
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
                            "exclude_key" => "AccountType",
                            "exclude_values" => array("Admin")
                        );
                    }elseif (empty($start)) {
                        $dbOptions = array(
                            "table_name" => $this->TableName,
                            "limit" => $limit,
                            "targets" => (object) $targets,
                            "exclude_key" => "AccountType",
                            "exclude_values" => array("Admin")
                        );
                    }else {
                        $dbOptions = array(
                            "table_name" => $this->TableName,
                            "limit" => $limit,
                            "offset" => $start,
                            "targets" => (object) $targets,
                            "exclude_key" => "AccountType",
                            "exclude_values" => array("Admin")
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
    public function SearchUser(int $limit = 0, int $start = 0, string $SearchParam , $Targets = array() ): array
    {
        
        try {
            $_table = $this->TableName;
            $_targets = '';
            if(!empty($Targets)){
                $_key = key($Targets[0]);
                $_value = $Targets[0];
                $_targets = " AND $_key = '$_value'";
            }
            $query = "SELECT * FROM $_table WHERE AccountType != 'Admin' and 
            CONCAT(FullName, EmailAddress, PhoneNumber,Country) LIKE '%$SearchParam%' ". $_targets ." 
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
    public function SearchUserCount( string $SearchParam, $Targets = array()): int
    {
        
        try {
            $_table = $this->TableName;
            $_targets = '';
            if(!empty($Targets)){
                $_key = key($Targets[0]);
                $_value = $Targets[0];
                $_targets = " AND $_key = '$_value'";
            }
            $query = "SELECT * FROM $_table WHERE AccountType != 'Admin' and 
            CONCAT(FullName, EmailAddress, PhoneNumber,Country) LIKE '%$SearchParam%' ". $_targets;
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
    public function GetDistinctUserCountry() : array
    {
        try {
            $_tableName = $this->TableName;
             $query = "SELECT DISTINCT Country from $_tableName WHERE AccountType != 'Admin'";
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




}

/* End of file ModelName.php */



?>
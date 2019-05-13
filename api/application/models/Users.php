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
        
            $token = md5($UserData['Password']);
            $UserData['Password'] = hash("sha512", $token . $UserData['Password']);
            $UserData["Token"] = $token;
            $UserData["DateCreated"] = $this->utilities->DbTimeFormat();
            $UserData["AccountType"] = "Free";
            $UserData["IdHash"] = $this->utilities->GenerateGUID();
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
                "State" => (isset($UserData->State) && $UserData->State != $UserDB->State)? $UserData->State : $UserDB->State,
                "AccountType" => (isset($UserData->AccountType) && $UserData->AccountType != $UserDB->AccountType)? $UserData->AccountType : $UserDB->AccountType,
                "IsPremium" => (isset($UserData->IsPremium) && $UserData->IsPremium != $UserDB->IsPremium)? $UserData->IsPremium : $UserDB->IsPremium,
                "IsPro" => (isset($UserData->IsPro) && $UserData->IsPro != $UserDB->IsPro)? $UserData->IsPro : $UserDB->IsPro,
                "IsRollOver" => (isset($UserData->IsRollOver) && $UserData->IsRollOver != $UserDB->IsRollOver)? $UserData->IsRollOver : $UserDB->IsRollOver,
                "IsWeekend20" => (isset($UserData->IsWeekend20) && $UserData->IsWeekend20 != $UserDB->IsWeekend20)? $UserData->IsWeekend20 : $UserDB->IsWeekend20,
                "DateModified" => $this->utilities->DbTimeFormat(),
                "ProfileImage" => (isset($UserData->ProfileImage) && $UserData->ProfileImage != $UserDB->ProfileImage)? $UserData->ProfileImage : $UserDB->ProfileImage
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
    public function GetByHash(string $UserHash): stdClass
    {
        try {
            $dbOptions = array(
                "table_name" => $this->TableName,
                "targets" => (object) array("IdHash" => $UserHash)
            );
            $dbResult = $this->connectDb->select_data((object) $dbOptions);
            if(!empty($dbResult))
                return $dbResult[0];
    
            
        } catch (\Throwable $th) {
            
            log_message('error', $th->getMessage());
        
        }
        return null;
        
    }
    public function GetUserIdByHash(string $UserHash): stdClass
    {

        try {
            $dbOptions = array(
                "table_name" => $this->TableName,
                "targets" => (object) array("IdHash" => $UserHash)
            );
            $dbResult = $this->connectDb->select_data((object) $dbOptions);
            if(!empty($dbResult))
                return $dbResult[0]->Id;
    
            
        } catch (\Throwable $th) {
            
            log_message('error', $th->getMessage());
        
        }
        return (object) array();
        
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
    public function ChangePassword(string $Password, int $UserId): int
    {
        try {
            $token = md5($Password);
        $Password = hash("sha512", $token . $Password);
        $UserUpdate = array(
            "Password" => $Password,
            "Token" => $token
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
            $token = md5($Password);
            $enteredPassword = hash("sha512", $token . $Password);
            if ($userdata->Password == $enteredPassword) {
                return true;
            }
           
        
        } catch (\Throwable $th) {
            log_message('error', $th->getMessage()); 
           
        }
        return false;
        
    }
    public function ActivatePremium(int $UserId): int
    {
        try {
        
        $dbOptions = array(
            "table_name" => $this->TableName,
            "process_data" => (object) array("AccountType" => 'Paid',"IsPremium" => 1, "DateModified" => $this->utilities->DbTimeFormat()),
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
    public function DeactivatePremium(int $UserId): int
    {
        try {
           
        
        $dbOptions = array(
            "table_name" => $this->TableName,
            "process_data" => (object) array("IsPremium" => 0, "DateModified" => $this->utilities->DbTimeFormat()),
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
    public function ActivatePro(int $UserId): int
    {
        try {
           
        
        $dbOptions = array(
            "table_name" => $this->TableName,
            "process_data" => (object) array("AccountType" => 'Paid',"IsPro" => 1, "DateModified" => $this->utilities->DbTimeFormat()),
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
    public function DeactivatePro(int $UserId): int
    {
        try {
           
        
        $dbOptions = array(
            "table_name" => $this->TableName,
            "process_data" => (object) array("IsPro" => 0, "DateModified" => $this->utilities->DbTimeFormat()),
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
    public function ActivateRollover(int $UserId): int
    {
        try {
        
        $dbOptions = array(
            "table_name" => $this->TableName,
            "process_data" => (object) array("AccountType" => 'Paid',"IsRollOver" => 1, "DateModified" => $this->utilities->DbTimeFormat()),
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
    public function DeactivateRollover(int $UserId): int
    {
        try {
        
        $dbOptions = array(
            "table_name" => $this->TableName,
            "process_data" => (object) array("IsRollOver" => 0, "DateModified" => $this->utilities->DbTimeFormat()),
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
    public function ActivateWeekend20(int $UserId): int
    {
        try {
        
        $dbOptions = array(
            "table_name" => $this->TableName,
            "process_data" => (object) array("AccountType" => 'Paid',"IsWeekend20" => 1, "DateModified" => $this->utilities->DbTimeFormat()),
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
    public function DeactivateWeekend20(int $UserId): int
    {
        try {
        
        $dbOptions = array(
            "table_name" => $this->TableName,
            "process_data" => (object) array("IsWeekend20" => 0, "DateModified" => $this->utilities->DbTimeFormat()),
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
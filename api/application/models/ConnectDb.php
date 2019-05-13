<?php
defined('BASEPATH') or exit('No direct script access allowed');

class ConnectDb extends CI_model
{

    public function select_data($options)
    {

        // $options = json_decode($options);

        if (isset($options->is_distinct) && $options->is_distinct == 1) {
            $this->db->distinct();
        }
        if (isset($options->single_column) && $options->single_column) {
            $this->db->select($options->single_column);
        }
        if (isset($options->targets) && $options->targets) {
            $this->db->where((array) $options->targets);
        }
        if (isset($options->exclude_key) && $options->exclude_key) {
            $this->db->where_not_in($options->exclude_key, $options->exclude_values);
        }
        if (isset($options->filter_key) && $options->filter_key) {
            $this->db->order_by($options->filter_key, $options->filter_value);
        }
        if (isset($options->limit) && $options->limit) {
            $this->db->limit($options->limit);
        }
        if (isset($options->offset) && $options->offset) {
            $this->db->offset($options->offset);
        }
        $query = $this->db->get($options->table_name);
        return $query->result();

    }
    public function modify_data($options)
    {
        // $options = json_decode($options);
        $this->db->where((array) $options->targets);
        $this->db->update($options->table_name, (array) $options->process_data);
        return $this->db->affected_rows();

    }
    public function delete_data($options)
    {

        if (isset($options->targets) && !empty($options->targets)) {
            $this->db->where((array) $options->targets);
            $this->db->delete($options->table_name);
        } else {
            $this->db->delete($options->table_name);
        }
        return $this->db->affected_rows();
    }
    public function insert_data($options)
    {
        // $options = json_decode($options);
        $this->db->insert($options->table_name, (array) $options->process_data);
        return $this->db->insert_id();
    }
    public function insert_batch_data($options)
    {
        // $options = json_decode($options);
        $this->db->insert_batch($options->table_name, (array) $options->batch_data);
        return $this->db->insert_id();

    }

    public function count_data($options)
    {
        // $options = json_decode($options);
        if (isset($options->targets) && !empty($options->targets)) {
            if (isset($options->operator)) {
                if ($options->operator == 'AND' || $options->operator == 'and') {
                    $this->db->where((array) $options->targets);
                } elseif ($options->operator == 'OR' || $options->operator == 'or') {
                    $this->db->or_where((array) $options->targets);
                }

            } else {
                $this->db->where((array) $options->targets);
            }
        }
        if (isset($options->exclude_key) && !empty($options->exclude_key)) {
            $this->db->where_not_in($options->exclude_key, (array)$options->exclude_values);
        }
        $count = $this->db->count_all_results($options->table_name);
        return $count;

    }

    public function custom_query($options)
    {
        // $options = json_decode($options);
        if ($options->query_action == 'others') {
            $this->db->query($options->my_query);
            return $this->db->affected_rows();
        } elseif ($options->query_action == 'select') {
            $sql = $this->db->query($options->my_query);
            return $sql->result();
        }
    }
    public function fetchPost($limit = 0)
    {
        if (empty($limit)) {
            $postOptions = array(
                'table_name' => 'posts',
            );
        } else {
            $postOptions = array(
                'table_name' => 'posts',
                'limit' => $limit,
            );
        }
        return $this->select_data(json_encode($postOptions));

    }
    public function fetchTestimonials($limit = 0)
    {
        if (empty($limit)) {
            $testmonialOptions = array(
                'table_name' => 'testimonials',
            );
        } else {
            $testmonialOptions = array(
                'table_name' => 'testimonials',
                'limit' => $limit,
            );
        }
        return $this->select_data(json_encode($testmonialOptions));
    }
   
    public function FetchUser($userId, $column = "")
    {
        $dbOptions = array(
            'table_name' => 'users',
            'targets' => array("Id" => $userId),
        );
        $userData = $this->select_data(json_encode($dbOptions));
        if (empty($column)) {
            return $userData[0];
        } else {
            return $userData[0]->$column;
        }
    }
    public function FetchWithdrawalDetails($withdrawId)
    {
        $dbOptions = array(
            'table_name' => 'withdrawalrequest',
            'targets' => array("Id" => $withdrawId),
        );
        $WithdrawData = $this->select_data(json_encode($dbOptions));
       return $WithdrawData[0];
    }
    public function FetchWithdrawalRequest($userId)
    {
        $dbOptions = array(
            'table_name' => 'withdrawalrequest',
            'targets' => array("RequestedBy" => $userId),
        );
        $Dbresult = $this->select_data(json_encode($dbOptions));
       return $Dbresult;
    }
    
    public function FetchOrderStatus()
    {
        $dbOptions = array(
            "table_name" => "orderstatus",
        );
        $Status = $this->select_data(json_encode($dbOptions));
        if (!empty($Status)) {
            return $Status;
        }

    }
    public function FetchOrderNotes($requestId)
    {
        $dbOptions = array(
            "table_name" => "ordernotes",
            "targets" => array("RequestId" => $requestId),
            "filter_key" => "DateCreated",
            "filter_value" => "DESC",
        );
        $Notes = $this->select_data(json_encode($dbOptions));
        if (!empty($Notes)) {
            return $Notes;
        }

    }
    public function FetchRemitData($requestId, $column = "")
    {

        $dbOptions = array(
            "table_name" => "remitance",
            "targets" => array("RequestId" => $requestId),
        );
        $RemitData = $this->select_data(json_encode($dbOptions));
        if (!empty($RemitData)) {
            if (empty($column)) {
                return $RemitData[0];
            } else {
                return $RemitData[0]->$column;
            }
        }else{
            return 'N/A';
        }

    }
    public function FetchWalletLogs($userId)
    {

        $dbOptions = array(
            "table_name" => "walletlogs",
            "targets" => array("UserId" => $userId),
        );
        $dbResult = $this->select_data(json_encode($dbOptions));
       return $dbResult;

    }
    public function FetchLocalGovernment($state)
    {
        $dbOptions = array(
			"table_name" => 'location',
			"single_column" => 'local_government',
			"targets" => array('state' => $state),
        );
        
        $lga = $this->select_data(json_encode($dbOptions));
		return $lga;
    }
    public function GetSiteOption($SiteKey)
    {
        $dbOptions = array(
            "table_name" => "siteoptions",
            "targets" => array("SiteKey" => $SiteKey),
        );
        $SiteData = $this->select_data(json_encode($dbOptions));
        if (!empty($SiteData)) {
            $SiteValue = $SiteData[0]->SiteValue;
        } else {
            $SiteValue = '';
        }
        return $SiteValue;

    }
    public function GetUserWallet($userId)
    {
        $dbOptions = array(
            "table_name" => "wallet",
            "targets" => array("UserId" => $userId),
        );
        $WalletData = $this->select_data(json_encode($dbOptions));
        if (!empty($WalletData)) {
            $WalletAmount = $WalletData[0]->Amount;
        } else {
            $WalletAmount = 0;
        }
        return $WalletAmount;

    }
    public function GetTotalEarned($userId)
    {
        $query = "select SUM(Amount) as TotalAmount from walletlogs where UserId = $userId";

        $dbOptions = array(
            "my_query" => $query,
            "query_action" => "select",
        );
        $EarnedData = $this->custom_query(json_encode($dbOptions));
        if (!empty($EarnedData)) {
            $TotalEarned = $EarnedData[0]->TotalAmount;
        } else {
            $TotalEarned = 0;
        }
        return $TotalEarned;

    }
    public function GetTotalOrder($userID)
    {
        $query = "select COUNT(Id) as TotalOrder from orderrequest where UserId = $userID";

        $dbOptions = array(
            "my_query" => $query,
            "query_action" => "select",
        );
        $OrderData = $this->custom_query(json_encode($dbOptions));
        if (!empty($OrderData)) {
            $TotalOrder = $OrderData[0]->TotalOrder;
        } else {
            $TotalOrder = 0;
        }
        return $TotalOrder;
    }
    public function GetRemitted($userID)
    {
        $query = "select SUM(Amount) as TotalRemitted from remitance where SubmittedBy = $userID";

        $dbOptions = array(
            "my_query" => $query,
            "query_action" => "select",
        );
        $RemitData = $this->custom_query(json_encode($dbOptions));
        if (!empty($RemitData)) {
            $TotalRemitted = $RemitData[0]->TotalRemitted;
        } else {
            $TotalRemitted = 0;
        }
        return $TotalRemitted;
    }
    public function GetUnremitted($userID)
    {
        $query = "select Count(Id) as UnRemitCount from orderrequest where UserId = $userID and IsRemitted = 0";
        $dbOptions = array(
            "my_query" => $query,
            "query_action" => "select",
        );
        $RemitData = $this->custom_query(json_encode($dbOptions));
        if (!empty($RemitData)) {
            $UnRemitCount = $RemitData[0]->UnRemitCount;
            $UnRemitAmount = $UnRemitCount * 10000;
        } else {
            $UnRemitAmount = 0;
        }
        return $UnRemitAmount;
    }
    public function GetUserImage($userID)
    {
        $dbOptions = array(
            "table_name" => "userdetails",
            "targets" => array("UserId" => $userID),
        );
        $dbResult = $this->select_data(json_encode($dbOptions));
        if (!empty($dbResult)) {
            $UserImageUrl = $dbResult[0]->ImageUrl;
        } else {
            $UserImageUrl = '';
        }
        return $UserImageUrl;
    }
    

    // public function escape_data($string)
    // {
    //   return $this->db->escape($string);
    // }
    // public function escape_search($string)
    // {
    //   return $this->db->escape_like_str($search);
    // }

}

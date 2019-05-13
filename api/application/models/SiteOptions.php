<?php

defined('BASEPATH') or exit('No direct script access allowed');

class SiteOptions extends CI_Model
{

    private $TableName = "siteoptions";

    public function __construct()
    {
        parent::__construct();
        $this->load->model('connectDb');

    }
    public function GetSiteMode(): string
    {
        try {
            $dbOptions = array(
                "table_name" => $this->TableName,
                "targets" => (object) array("Optionkey" => "site_mode"),
            );

            $dbResult = $this->connectDb->select_data((object) $dbOptions);
            if (!empty($dbResult)) {
                return $dbResult[0]->OptionValue;
            }

        } catch (\Throwable $th) {

            log_message('error', $th->getMessage());

        }
        return '';
    }
    public function PayStackKey(): string
    {
        try {
            $siteMode = $this->GetSiteMode();
            if (!empty($siteMode)) {
                $dbOptions = array(
                    "table_name" => $this->TableName,
                    "targets" => (object) array("Optionkey" => "paystack_" . $siteMode),
                );
                $dbResult = $this->connectDb->select_data((object) $dbOptions);
                if (!empty($dbResult)) {
                    return $dbResult[0]->OptionValue;
                }

            }

        } catch (\Throwable $th) {

            log_message('error', $th->getMessage());

        }
        return '';

    }
    public function GetPayPalEnvironment(): string
    {
        try {
            $siteMode = $this->GetSiteMode();
            if (!empty($siteMode)) {
                $dbOptions = array(
                    "table_name" => $this->TableName,
                    "targets" => (object) array("Optionkey" => "paypal_env_" . $siteMode),
                );
                $dbResult = $this->connectDb->select_data((object) $dbOptions);
                if (!empty($dbResult)) {
                    return $dbResult[0]->OptionValue;
                }

            }

        } catch (\Throwable $th) {

            log_message('error', $th->getMessage());

        }
        return '';

    }
    public function GetPayPalKey(): string
    {
        try {
            $siteMode = $this->GetSiteMode();
            if (!empty($siteMode)) {
                $dbOptions = array(
                    "table_name" => $this->TableName,
                    "targets" => (object) array("Optionkey" => "paypal_key_" . $siteMode),
                );
                $dbResult = $this->connectDb->select_data((object) $dbOptions);
                if (!empty($dbResult)) {
                    return $dbResult[0]->OptionValue;
                }

            }

        } catch (\Throwable $th) {

            log_message('error', $th->getMessage());

        }
        return '';

    }
   

}

/* End of file SiteOptions.php */

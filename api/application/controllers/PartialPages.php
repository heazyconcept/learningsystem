<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class PartialPages extends CI_Controller {

    public function UserAccount($userHash)
    {
        try {
            $this->load->model("users");
            $this->load->model("pro");
            $this->load->model("premium");
            $this->load->model("rollover");
            $this->load->model("weekend");
            $data["UserData"] = $this->users->GetByHash($userHash);
            $this->load->view('Admin/PartialPages/UserAccount', $data);
        } catch (\Throwable $th) {
            log_message('error', $th->getMessage());
        }
    }

}

/* End of file PartialPages.php */


?>
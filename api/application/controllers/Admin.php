<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Admin extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->ValidateAdminLogin();
    }
    public function index()
    {

        redirect('admin/Dashboard');

    }

    public function Dashboard()
    {
        $this->load->view('Admin/Templates/Dashboard');

    }
    public function Leagues()
    {
        $this->load->model('leagues');

        try {

            $data["menu"] = "league";
            $this->load->view('Admin/Templates/Leagues', $data);

        } catch (\Throwable $th) {
            log_message('error', $th->getMessage());
        }
    }
    public function LeagueTable()
    {
        $this->load->model('leagues');

        try {

            $data["menu"] = "league";
            $this->load->view('Admin/Templates/LeagueTables', $data);

        } catch (\Throwable $th) {
            log_message('error', $th->getMessage());
        }
    }
    public function AddMatch()
    {

        try {

            $this->load->model("leagues");
            $data["menu"] = "match";
            $this->load->view('Admin/Templates/AddMatch', $data);

        } catch (\Throwable $th) {
            log_message('error', $th->getMessage());
        }
    }
    public function ManageTable(string $TableId)
    {

        $this->load->model('leagues');
        $this->load->model('leagueTable');
        try {

            $leagueData = $data["leagueData"] = $this->leagues->GetByHash($TableId);
            $data['leagueTable'] = $this->leagueTable->ListTableByLeague($leagueData->Id);
            $data["menu"] = "league";
            $this->load->view('Admin/Templates/ViewTable', $data);

        } catch (\Throwable $th) {
            log_message('error', $th->getMessage());

        }
    }
    public function AllMatches()
    {
        try {
            $this->load->model("matches");
            $this->load->model("matchDetails");
            $this->load->model("leagues");
            $data["menu"] = "match";
            $data["LeaguesAvailable"] = $this->matches->ListDisctintLeague();
            $this->load->view('Admin/Templates/AllMatches', $data);
        } catch (\Throwable $th) {
            log_message('error', $th->getMessage());

        }
    }
    public function DailyMatch()
    {
        try {
            $this->load->model("matches");
            $this->load->model("matchDetails");
            $this->load->model("leagues");
            $data["menu"] = "match";
            $data["URL"] = "DailyMatch";
            $data["LeaguesAvailable"] = $this->matches->ListDisctintLeague('daily');
            $this->load->view('Admin/Templates/AllMatches', $data);
        } catch (\Throwable $th) {
            log_message('error', $th->getMessage());

        }
    }
    public function Rollover()
    {
        try {
            $this->load->model("matches");
            $this->load->model("matchDetails");
            $this->load->model("leagues");
            $data["menu"] = "match";
            $data["URL"] = "Rollover";
            $data["LeaguesAvailable"] = $this->matches->ListDisctintLeague('rollover');
            $this->load->view('Admin/Templates/AllMatches', $data);
        } catch (\Throwable $th) {
            log_message('error', $th->getMessage());

        }
    }
    public function Weekend()
    {
        try {
            $this->load->model("matches");
            $this->load->model("matchDetails");
            $this->load->model("leagues");
            $data["menu"] = "match";
            $data["URL"] = "Weekend";
            $data["LeaguesAvailable"] = $this->matches->ListDisctintLeague('weekend');
            $this->load->view('Admin/Templates/AllMatches', $data);
        } catch (\Throwable $th) {
            log_message('error', $th->getMessage());

        }
    }
    public function EditMatch($MatchIdHash)
    {

        try {
            $this->load->model("matches");
            $this->load->model("matchDetails");
            $this->load->model("leagues");
            $_match = $this->matches->GetByHash($MatchIdHash);
            $_matchDetails = $this->matchDetails->Get($_match->Id);
            $_matchArray = (array) $_match;
            $_matchDetailsArray = (array) $_matchDetails;
            $data["MatchData"] = (object) array_merge($_matchArray, $_matchDetailsArray);

            $this->load->view('Admin/Templates/EditMatch', $data);
        } catch (\Throwable $th) {
            log_message('error', $th->getMessage());

        }
    }
    public function Users($Usertype)
    {
        try {
            $this->load->model("users");
            $data["UserType"] = $Usertype;
            $this->load->view('Admin/Templates/Users', $data);
        } catch (\Throwable $th) {
            log_message('error', $th->getMessage());
        }
    }
    public function ViewUser($UserHash = "")
    {
        try {
            $this->CheckIfEmpty($UserHash);
            $this->load->model("users");
            $this->load->model("pro");
            $this->load->model("premium");
            $this->load->model("rollover");
            $this->load->model("weekend");
            $data["UserData"] = $this->users->GetByHash($UserHash);
            $this->load->view('Admin/Templates/ViewUser', $data);
        } catch (\Throwable $th) {
            log_message('error', $th->getMessage());
        }
    }
    public function ActivateUsers()
    {
        try {
            $this->load->model("users");
            $this->load->model("pro");
            $this->load->model("premium");
            $this->load->model("rollover");
            $this->load->model("weekend");
            $Users = $this->users->ListAll(20);
            $data['Users'] = $Users;
            $this->load->view('Admin/Templates/ActivateUser', $data);
        } catch (\Throwable $th) {
            log_message('error', $th->getMessage());
        }
    }
    public function Testimonials()
    {
        try {
            $this->load->model("testimonials");
            $data = array();
            $this->load->view('Admin/Templates/Testimonials', $data);
        } catch (\Throwable $th) {
            log_message('error', $th->getMessage());
        }
    }
    public function AddTestimonial()
    {
        try {
            $this->load->model("testimonials");
            $data = array();
            $this->load->view('Admin/Templates/AddTestimonial', $data);
        } catch (\Throwable $th) {
            log_message('error', $th->getMessage());
        }
    }
    public function EditTestimonial($TestimonialId = "")
    {
        try {
            $this->load->model("testimonials");
            $this->CheckIfEmpty($TestimonialId);
            $data["TestimonialData"] =  $this->testimonials->Get($TestimonialId);
            $this->load->view('Admin/Templates/EditTestimonial', $data);
        } catch (\Throwable $th) {
            log_message('error', $th->getMessage());
        }
    }
    public function DeactivateTestimonial($TestimonialId = "")
    {
        try {
            
            $this->load->model("testimonials");
            $this->CheckIfEmpty($TestimonialId);
            $status = array(
                "IsActive" => 0
            );
            
            $this->testimonials->update((object) $status, $TestimonialId);
          
           
        } catch (\Throwable $th) {
           
            log_message('error', $th->getMessage());
        }
            redirect('admin/Testimonials','refresh');
    }
    public function ActivateTestimonial($TestimonialId = "")
    {
        try {
            $this->load->model("testimonials");
            $this->CheckIfEmpty($TestimonialId);
            $status = array(
                "IsActive" => 1
            );
            $this->testimonials->update((object) $status, $TestimonialId);
           
        } catch (\Throwable $th) {
            log_message('error', $th->getMessage());
        }
            redirect('admin/Testimonials','refresh');
    }
    public function DeleteTestimonial($TestimonialId = "")
    {
        try {
            $this->load->model("testimonials");
            $this->CheckIfEmpty($TestimonialId);
           
            $this->testimonials->Delete($TestimonialId);
           
        } catch (\Throwable $th) {
            log_message('error', $th->getMessage());
        }
            redirect('admin/Testimonials','refresh');
    }
    


    private function ValidateAdminLogin()
    {
        if ($this->session->has_userdata("UserId")) {
            if ($this->session->userdata("AccountType") != "Admin") {
                redirect("user");
            }

        } else {
            redirect("account/Login");
        }

    }
    private function CheckIfEmpty($Arg)
    {
        if(empty($Arg))
            redirect("admin");
            
    }

}

/* End of file Admin.php */

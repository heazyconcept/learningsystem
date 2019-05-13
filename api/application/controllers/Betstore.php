<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Betstore extends CI_Controller
{

    public function index()
    {

    }
    //  Template1
    public function Over15()
    {

        try {
            $this->load->model("leagues");
            $this->load->model("matches");
            $this->load->model("matchDetails");
            $data["state"] = "";
            if (!$this->CheckLoginState()) {

                $URL = base_url("betstore/Over15");
                $this->utilities->KeepPresentState($URL);
                redirect("account/Login");

            }

            $today = $this->utilities->DbDateFormat();

            $Over15 = $this->matches->ListOver15($today);

            $Betitems = $data["Betitems"] = array();
            if (!empty($Over15)) {

                foreach ($Over15 as $obj) {
                    $_betItem = array(
                        "Time" => date("g:i a", strtotime($obj->MatchDate)),
                        "League" => $this->leagues->GetColumn($obj->LeagueId, "League"),
                        "Match" => $obj->MatchName,
                        "Tip" => "OVER 1.5",
                        "Score" => $obj->FullTimeScore,
                    );
                    $Betitems[] = (object) $_betItem;
                }
                $data["Betitems"] = $Betitems;

            }
            $this->load->view("Front/Partials/Betstore/Over15", $data);
        } catch (\Throwable $th) {

            log_message('error', $th->getMessage());
        }

    }
    //  Template1
    public function DoubleChance()
    {
        try {
            $this->load->model("leagues");
            $this->load->model("matches");
            $this->load->model("matchDetails");
            if (!$this->CheckLoginState()) {
                $URL = base_url("betstore/DoubleChance");
                $this->utilities->KeepPresentState($URL);
                redirect("account/Login");
            }
            $today = $this->utilities->DbDateFormat();
            $Doublechance = $this->matches->ListDoubleChance($today);
            $Betitems = $data["Betitems"] = array();
            if (!empty($Doublechance)) {
                foreach ($Doublechance as $double) {
                    $_betItem = array(
                        "Time" => date("g:i a", strtotime($double->MatchDate)),
                        "League" => $this->leagues->GetColumn($double->LeagueId, "League"),
                        "Match" => $double->MatchName,
                        "Tip" => $this->matchDetails->GetColumn($double->Id, "DoubleChanceTips"),
                        "Score" => $double->FullTimeScore,
                    );
                    $Betitems[] = (object) $_betItem;
                }
                $data["Betitems"] = $Betitems;

            }
            $this->load->view("Front/Partials/Betstore/DoubleChance", $data);
        } catch (\Throwable $th) {
            log_message('error', $th->getMessage());
        }

    }
    //  Template1
    public function CorrectScore()
    {

        try {
            $this->load->model("leagues");
            $this->load->model("matches");
            $this->load->model("matchDetails");
            $data["state"] = "";
            if (!$this->CheckLoginState()) {

                $URL = base_url("betstore/CorrectScore");
                $this->utilities->KeepPresentState($URL);
                redirect("account/Login");

            }

            $today = $this->utilities->DbDateFormat();

            $CorrectScore = $this->matches->ListCorrectScore($today);

            $Betitems = $data["Betitems"] = array();
            if (!empty($CorrectScore)) {

                foreach ($CorrectScore as $obj) {
                    $_betItem = array(
                        "Time" => date("g:i a", strtotime($obj->MatchDate)),
                        "League" => $this->leagues->GetColumn($obj->LeagueId, "League"),
                        "Match" => $obj->MatchName,
                        "Tip" => $this->matchDetails->GetColumn($obj->Id, "CorrectScoreTip"),
                        "Score" => $obj->FullTimeScore,
                    );
                    $Betitems[] = (object) $_betItem;
                }
                $data["Betitems"] = $Betitems;

            }
            $this->load->view("Front/Partials/Betstore/CorrectScore", $data);
        } catch (\Throwable $th) {

            log_message('error', $th->getMessage());
        }

    }
    //  Template1
    public function MonsterBet()
    {
        try {
            $this->load->model("leagues");
            $this->load->model("matches");
            $this->load->model("matchDetails");
            if (!$this->CheckLoginState()) {
                $URL = base_url("betstore/MonsterBet");
                $this->utilities->KeepPresentState($URL);
                redirect("account/Login");

            }
            $today = $this->utilities->DbDateFormat();
            $MonsterBet = $this->matches->ListMonsterBet($today);
            $Betitems = $data["Betitems"] = array();
            if (!empty($MonsterBet)) {
                foreach ($MonsterBet as $obj) {
                    $_betItem = array(
                        "Time" => date("g:i a", strtotime($obj->MatchDate)),
                        "League" => $this->leagues->GetColumn($obj->LeagueId, "League"),
                        "Match" => $obj->MatchName,
                        "Tip" => $this->matchDetails->GetColumn($obj->Id, "MonsterBetTip"),
                        "Score" => $obj->FullTimeScore,
                    );
                    $Betitems[] = (object) $_betItem;
                }
                $data["Betitems"] = $Betitems;
            }
            $this->load->view("Front/Partials/Betstore/MonsterBet", $data);

        } catch (\Throwable $th) {
            log_message('error', $th->getMessage());
        }

    }

    //  Template2
    public function SingleBet()
    {

        try {
            $this->load->model("leagues");
            $this->load->model("matches");
            $this->load->model("matchDetails");
            $data["state"] = "";
            if (!$this->CheckLoginState()) {

                $URL = base_url("betstore/SingleBet");
                $this->utilities->KeepPresentState($URL);
                redirect("account/Login");

            }

            $today = $this->utilities->DbDateFormat();

            $SingleBet = $this->matches->ListSingleBet($today);

            $Betitems = $data["Betitems"] = array();
            if (!empty($SingleBet)) {

                foreach ($SingleBet as $obj) {
                    $_betItem = array(
                        "Time" => date("g:i a", strtotime($obj->MatchDate)),
                        "League" => $this->leagues->GetColumn($obj->LeagueId, "League"),
                        "Match" => $obj->MatchName,
                        "Tip" => $this->matchDetails->GetColumn($obj->Id, "SingleBetTip"),
                        "Odds" => $this->matchDetails->GetColumn($obj->Id, "SingleBetOdd"),
                        "Score" => $obj->FullTimeScore,
                    );

                    $Betitems[] = (object) $_betItem;
                }
                $data["Betitems"] = $Betitems;

            }
            $this->load->view("Front/Partials/Betstore/SingleBet", $data);
        } catch (\Throwable $th) {

            log_message('error', $th->getMessage());
        }

    }
    //  Template3
    public function ScoreBothHalves()
    {

        try {
            $this->load->model("leagues");
            $this->load->model("matches");
            $this->load->model("matchDetails");
            $data["state"] = "";
            if (!$this->CheckLoginState()) {

                $URL = base_url("betstore/ScoreBothHalves");
                $this->utilities->KeepPresentState($URL);
                redirect("account/Login");

            }
            if (!$this->IsPremium()) {
                $data["accountPlan"] = "Premium";
                $this->load->view("Front/Partials/ErrorPages/subscribe", $data);
            }

            $today = $this->utilities->DbDateFormat();

            $ScoreBothHalves = $this->matches->ListScoreBothHalf($today);

            $Betitems = $data["Betitems"] = array();
            if (!empty($ScoreBothHalves)) {

                foreach ($ScoreBothHalves as $obj) {
                    $_betItem = array(
                        "Time" => date("g:i a", strtotime($obj->MatchDate)),
                        "League" => $this->leagues->GetColumn($obj->LeagueId, "League"),
                        "Match" => $obj->MatchName,
                        "Tip" => $this->matchDetails->GetColumn($obj->Id, "ScoreBothHalfTip"),
                        "FtScore" => $obj->FullTimeScore,
                        "HtScore" => $obj->HalfTimeScore,
                    );

                    $Betitems[] = (object) $_betItem;
                }
                $data["Betitems"] = $Betitems;

            }
            $this->load->view("Front/Partials/Betstore/ScoreBothHalves", $data);
        } catch (\Throwable $th) {

            log_message('error', $th->getMessage());
        }

    }
    //  Template3
    public function WinEitherHalf()
    {

        try {
            $this->load->model("leagues");
            $this->load->model("matches");
            $this->load->model("matchDetails");
            $data["state"] = "";
            if (!$this->CheckLoginState()) {

                $URL = base_url("betstore/WinEitherHalf");
                $this->utilities->KeepPresentState($URL);
                redirect("account/Login");

            }
            if (!$this->IsPremium()) {
                $data["accountPlan"] = "Premium";
                $this->load->view("Front/Partials/ErrorPages/subscribe", $data);
            }
            $today = $this->utilities->DbDateFormat();

            $WinEitherHalf = $this->matches->ListWinEitherHalf($today);

            $Betitems = $data["Betitems"] = array();
            if (!empty($WinEitherHalf)) {

                foreach ($WinEitherHalf as $obj) {
                    $_betItem = array(
                        "Time" => date("g:i a", strtotime($obj->MatchDate)),
                        "League" => $this->leagues->GetColumn($obj->LeagueId, "League"),
                        "Match" => $obj->MatchName,
                        "Tip" => $this->matchDetails->GetColumn($obj->Id, "WinEitherHalfTip"),
                        "FtScore" => $obj->FullTimeScore,
                        "HtScore" => $obj->HalfTimeScore,
                    );

                    $Betitems[] = (object) $_betItem;
                }
                $data["Betitems"] = $Betitems;

            }
            $this->load->view("Front/Partials/Betstore/WinEitherHalf", $data);
        } catch (\Throwable $th) {

            log_message('error', $th->getMessage());
        }

    }
    //  Template1
    public function Over25()
    {
        try {
            $this->load->model("leagues");
            $this->load->model("matches");
            $this->load->model("matchDetails");
            if (!$this->CheckLoginState()) {
                $URL = base_url("betstore/Over25");
                $this->utilities->KeepPresentState($URL);
                redirect("account/Login");

            }
            if (!$this->IsPremium()) {
                $data["accountPlan"] = "Premium";
                $this->load->view("Front/Partials/ErrorPages/subscribe", $data);
            }
            $today = $this->utilities->DbDateFormat();
            $Over25 = $this->matches->ListOver25($today);
            $Betitems = $data["Betitems"] = array();
            if (!empty($Over25)) {
                foreach ($Over25 as $obj) {
                    $_betItem = array(
                        "Time" => date("g:i a", strtotime($obj->MatchDate)),
                        "League" => $this->leagues->GetColumn($obj->LeagueId, "League"),
                        "Match" => $obj->MatchName,
                        "Tip" => "OVER 2.5",
                        "Score" => $obj->FullTimeScore,
                    );
                    $Betitems[] = (object) $_betItem;
                }
                $data["Betitems"] = $Betitems;
            }
            $this->load->view("Front/Partials/Betstore/Over25", $data);

        } catch (\Throwable $th) {
            log_message('error', $th->getMessage());
        }

    }
    //  Template1
    public function Under25()
    {
        try {
            $this->load->model("leagues");
            $this->load->model("matches");
            $this->load->model("matchDetails");
            if (!$this->CheckLoginState()) {
                $URL = base_url("betstore/Under25");
                $this->utilities->KeepPresentState($URL);
                redirect("account/Login");

            }
            if (!$this->IsPremium()) {
                $data["accountPlan"] = "Premium";
                $this->load->view("Front/Partials/ErrorPages/subscribe", $data);
            }
            $today = $this->utilities->DbDateFormat();
            $Under25 = $this->matches->ListUnder25($today);
            $Betitems = $data["Betitems"] = array();
            if (!empty($Under25)) {
                foreach ($Under25 as $obj) {
                    $_betItem = array(
                        "Time" => date("g:i a", strtotime($obj->MatchDate)),
                        "League" => $this->leagues->GetColumn($obj->LeagueId, "League"),
                        "Match" => $obj->MatchName,
                        "Tip" => "UNDER 2.5",
                        "Score" => $obj->FullTimeScore,
                    );
                    $Betitems[] = (object) $_betItem;
                }
                $data["Betitems"] = $Betitems;
            }
            $this->load->view("Front/Partials/Betstore/Under25", $data);

        } catch (\Throwable $th) {
            log_message('error', $th->getMessage());
        }

    }
    //  Template1
    public function Bts()
    {
        try {
            $this->load->model("leagues");
            $this->load->model("matches");
            $this->load->model("matchDetails");
            if (!$this->CheckLoginState()) {
                $URL = base_url("betstore/Bts");
                $this->utilities->KeepPresentState($URL);
                redirect("account/Login");

            }
            if (!$this->IsPremium()) {
                $data["accountPlan"] = "Premium";
                $this->load->view("Front/Partials/ErrorPages/subscribe", $data);
            }
            $today = $this->utilities->DbDateFormat();
            $Under25 = $this->matches->ListBothTeamToScore($today);
            $Betitems = $data["Betitems"] = array();
            if (!empty($Under25)) {
                foreach ($Under25 as $obj) {
                    $_betItem = array(
                        "Time" => date("g:i a", strtotime($obj->MatchDate)),
                        "League" => $this->leagues->GetColumn($obj->LeagueId, "League"),
                        "Match" => $obj->MatchName,
                        "Tip" => "BTS",
                        "Score" => $obj->FullTimeScore,
                    );
                    $Betitems[] = (object) $_betItem;
                }
                $data["Betitems"] = $Betitems;
            }
            $this->load->view("Front/Partials/Betstore/Bts", $data);

        } catch (\Throwable $th) {
            log_message('error', $th->getMessage());
        }

    }
    //  Template1
    public function Handicap()
    {
        try {
            $this->load->model("leagues");
            $this->load->model("matches");
            $this->load->model("matchDetails");
            if (!$this->CheckLoginState()) {
                $URL = base_url("betstore/Handicap");
                $this->utilities->KeepPresentState($URL);
                redirect("account/Login");

            }
            if (!$this->IsPremium()) {
                $data["accountPlan"] = "Premium";
                $this->load->view("Front/Partials/ErrorPages/subscribe", $data);
            }
            $today = $this->utilities->DbDateFormat();
            $Handicap = $this->matches->ListHandicap($today);
            $Betitems = $data["Betitems"] = array();
            if (!empty($Handicap)) {
                foreach ($Handicap as $obj) {
                    $_betItem = array(
                        "Time" => date("g:i a", strtotime($obj->MatchDate)),
                        "League" => $this->leagues->GetColumn($obj->LeagueId, "League"),
                        "Match" => $obj->MatchName,
                        "Tip" => $this->matchDetails->GetColumn($obj->Id, "HandicapTip"),
                        "Score" => $obj->FullTimeScore,
                    );
                    $Betitems[] = (object) $_betItem;
                }
                $data["Betitems"] = $Betitems;
            }
            $this->load->view("Front/Partials/Betstore/Handicap", $data);

        } catch (\Throwable $th) {
            log_message('error', $th->getMessage());
        }

    }
    // Template 8
    public function Odds2()
    {
        try {
            $this->load->model("leagues");
            $this->load->model("matches");
            $this->load->model("matchDetails");
            if (!$this->CheckLoginState()) {
                $URL = base_url("betstore/Odds2");
                $this->utilities->KeepPresentState($URL);
                redirect("account/Login");

            }
            if (!$this->IsPremium()) {
                $data["accountPlan"] = "Premium";
                $this->load->view("Front/Partials/ErrorPages/subscribe", $data);
            }
            $today = $this->utilities->DbDateFormat();
            $Odds2First = $this->matches->ListFirst2Odds($today);
            $BetitemsFirst = $data["BetitemsFirst"] = array();
            if (!empty($Odds2First)) {
                foreach ($Odds2First as $obj) {
                    $_betItem = array(
                        "Time" => date("g:i a", strtotime($obj->MatchDate)),
                        "League" => $this->leagues->GetColumn($obj->LeagueId, "League"),
                        "Match" => $obj->MatchName,
                        "Tip" => $this->matchDetails->GetColumn($obj->Id, "Tips2Odds"),
                        "Score" => $obj->FullTimeScore,
                        "TotalOdds" => $this->matchDetails->GetColumn($obj->Id, "TotalFirst2OddsTips"),
                    );

                    $BetitemsFirst[] = (object) $_betItem;
                }
                $data["BetitemsFirst"] = $BetitemsFirst;
            }
            $Odds2Second = $this->matches->ListSecond2Odds($today);
            $BetitemsSecond = $data["BetitemsSecond"] = array();
            if (!empty($Odds2Second)) {
                foreach ($Odds2Second as $obj) {
                    $_betItem = array(
                        "Time" => date("g:i a", strtotime($obj->MatchDate)),
                        "League" => $this->leagues->GetColumn($obj->LeagueId, "League"),
                        "Match" => $obj->MatchName,
                        "Tip" => $this->matchDetails->GetColumn($obj->Id, "Tips2Odds"),
                        "Score" => $obj->FullTimeScore,
                        "TotalOdds" => $this->matchDetails->GetColumn($obj->Id, "TotalSecond2OddsTips"),
                    );

                    $BetitemsSecond[] = (object) $_betItem;
                }
                $data["BetitemsSecond"] = $BetitemsSecond;
            }
            $this->load->view("Front/Partials/Betstore/Odds2", $data);

        } catch (\Throwable $th) {
            log_message('error', $th->getMessage());
        }

    }
    // Template 8
    public function Odds3()
    {
        try {
            $this->load->model("leagues");
            $this->load->model("matches");
            $this->load->model("matchDetails");
            if (!$this->CheckLoginState()) {
                $URL = base_url("betstore/Odds3");
                $this->utilities->KeepPresentState($URL);
                redirect("account/Login");

            }
            if (!$this->IsPremium()) {
                $data["accountPlan"] = "Premium";
                $this->load->view("Front/Partials/ErrorPages/subscribe", $data);
            }
            $today = $this->utilities->DbDateFormat();
            $Odds3First = $this->matches->ListFirst3Odds($today);
            $BetitemsFirst = $data["BetitemsFirst"] = array();
            if (!empty($Odds3First)) {
                foreach ($Odds3First as $obj) {
                    $_betItem = array(
                        "Time" => date("g:i a", strtotime($obj->MatchDate)),
                        "League" => $this->leagues->GetColumn($obj->LeagueId, "League"),
                        "Match" => $obj->MatchName,
                        "Tip" => $this->matchDetails->GetColumn($obj->Id, "Tips3Odds"),
                        "Score" => $obj->FullTimeScore,
                        "TotalOdds" => $this->matchDetails->GetColumn($obj->Id, "TotalFirst3OddsTips"),
                    );

                    $BetitemsFirst[] = (object) $_betItem;
                }
                $data["BetitemsFirst"] = $BetitemsFirst;
            }
            $Odds3Second = $this->matches->ListSecond3Odds($today);
            $BetitemsSecond = $data["BetitemsSecond"] = array();
            if (!empty($Odds3Second)) {
                foreach ($Odds3Second as $obj) {
                    $_betItem = array(
                        "Time" => date("g:i a", strtotime($obj->MatchDate)),
                        "League" => $this->leagues->GetColumn($obj->LeagueId, "League"),
                        "Match" => $obj->MatchName,
                        "Tip" => $this->matchDetails->GetColumn($obj->Id, "Tips3Odds"),
                        "Score" => $obj->FullTimeScore,
                        "TotalOdds" => $this->matchDetails->GetColumn($obj->Id, "TotalSecond3OddsTips"),
                    );

                    $BetitemsSecond[] = (object) $_betItem;
                }
                $data["BetitemsSecond"] = $BetitemsSecond;
            }
            $this->load->view("Front/Partials/Betstore/Odds3", $data);

        } catch (\Throwable $th) {
            log_message('error', $th->getMessage());
        }

    }
    //  Template3
    public function HtFt()
    {

        try {
            $this->load->model("leagues");
            $this->load->model("matches");
            $this->load->model("matchDetails");
            $data["state"] = "";
            if (!$this->CheckLoginState()) {

                $URL = base_url("betstore/HtFt");
                $this->utilities->KeepPresentState($URL);
                redirect("account/Login");

            }
            if (!$this->IsPremium()) {
                $data["accountPlan"] = "Premium";
                $this->load->view("Front/Partials/ErrorPages/subscribe", $data);
            }

            $today = $this->utilities->DbDateFormat();

            $HtFt = $this->matches->ListHtFt($today);

            $Betitems = $data["Betitems"] = array();
            if (!empty($HtFt)) {

                foreach ($HtFt as $obj) {
                    $_betItem = array(
                        "Time" => date("g:i a", strtotime($obj->MatchDate)),
                        "League" => $this->leagues->GetColumn($obj->LeagueId, "League"),
                        "Match" => $obj->MatchName,
                        "Tip" => $this->matchDetails->GetColumn($obj->Id, "HtFtTip"),
                        "FtScore" => $obj->FullTimeScore,
                        "HtScore" => $obj->HalfTimeScore,
                    );

                    $Betitems[] = (object) $_betItem;
                }
                $data["Betitems"] = $Betitems;

            }
            $this->load->view("Front/Partials/Betstore/HtFt", $data);
        } catch (\Throwable $th) {

            log_message('error', $th->getMessage());
        }

    }
    //  Template4
    public function WeekendBet()
    {

        try {
            $this->load->model("leagues");
            $this->load->model("matches");
            $this->load->model("matchDetails");
            $data["state"] = "";
            if (!$this->CheckLoginState()) {

                $URL = base_url("betstore/WeekendBet");
                $this->utilities->KeepPresentState($URL);
                redirect("account/Login");

            }
            if (!$this->IsPremium()) {
                $data["accountPlan"] = "Premium";
                $this->load->view("Front/Partials/ErrorPages/subscribe", $data);
            }

            $WeekendBet = $this->matches->ListWeekendBet();

            $Betitems = $data["Betitems"] = array();
            if (!empty($WeekendBet)) {

                foreach ($WeekendBet as $obj) {
                    $_betItem = array(
                        "Date" => date("d/m/Y", strtotime($obj->MatchDate)),
                        "Time" => date("g:i a", strtotime($obj->MatchDate)),
                        "League" => $this->leagues->GetColumn($obj->LeagueId, "League"),
                        "Match" => $obj->MatchName,
                        "Prediction" => $this->matchDetails->GetColumn($obj->Id, "WeekendBetTip"),
                        "Score" => $obj->FullTimeScore,
                    );

                    $Betitems[] = (object) $_betItem;
                }
                $data["Betitems"] = $Betitems;

            }
            $this->load->view("Front/Partials/Betstore/WeekendBet", $data);
        } catch (\Throwable $th) {

            log_message('error', $th->getMessage());
        }

    }
    //  Template3
    public function HalfTimeTips()
    {

        try {
            $this->load->model("leagues");
            $this->load->model("matches");
            $this->load->model("matchDetails");
            $data["state"] = "";
            if (!$this->CheckLoginState()) {

                $URL = base_url("betstore/HalfTimeTips");
                $this->utilities->KeepPresentState($URL);
                redirect("account/Login");

            }
            if (!$this->IsPremium()) {
                $data["accountPlan"] = "Premium";
                $this->load->view("Front/Partials/ErrorPages/subscribe", $data);
            }

            $today = $this->utilities->DbDateFormat();

            $HalfTimeTips = $this->matches->ListHalfTimeBet($today);

            $Betitems = $data["Betitems"] = array();
            if (!empty($HalfTimeTips)) {

                foreach ($HalfTimeTips as $obj) {
                    $_betItem = array(
                        "Time" => date("g:i a", strtotime($obj->MatchDate)),
                        "League" => $this->leagues->GetColumn($obj->LeagueId, "League"),
                        "Match" => $obj->MatchName,
                        "Tip" => $this->matchDetails->GetColumn($obj->Id, "HalfTimeTip"),
                        "FtScore" => $obj->FullTimeScore,
                        "HtScore" => $obj->HalfTimeScore,
                    );

                    $Betitems[] = (object) $_betItem;
                }
                $data["Betitems"] = $Betitems;

            }
            $this->load->view("Front/Partials/Betstore/HalfTimeTips", $data);
        } catch (\Throwable $th) {

            log_message('error', $th->getMessage());
        }

    }
    //  Template1
    public function SingleCombo()
    {
        try {
            $this->load->model("leagues");
            $this->load->model("matches");
            $this->load->model("matchDetails");
            if (!$this->CheckLoginState()) {
                $URL = base_url("betstore/SingleCombo");
                $this->utilities->KeepPresentState($URL);
                redirect("account/Login");

            }
            if (!$this->IsPremium()) {
                $data["accountPlan"] = "Premium";
                $this->load->view("Front/Partials/ErrorPages/subscribe", $data);
            }
            $today = $this->utilities->DbDateFormat();
            $SingleCombo = $this->matches->ListSingleCombo($today);
            $Betitems = $data["Betitems"] = array();
            if (!empty($SingleCombo)) {
                foreach ($SingleCombo as $obj) {
                    $_betItem = array(
                        "Time" => date("g:i a", strtotime($obj->MatchDate)),
                        "League" => $this->leagues->GetColumn($obj->LeagueId, "League"),
                        "Match" => $obj->MatchName,
                        "Tip" => $this->matchDetails->GetColumn($obj->Id, "SingleComboTip"),
                        "Score" => $obj->FullTimeScore,
                    );
                    $Betitems[] = (object) $_betItem;
                }
                $data["Betitems"] = $Betitems;
            }
            $this->load->view("Front/Partials/Betstore/SingleCombo", $data);

        } catch (\Throwable $th) {
            log_message('error', $th->getMessage());
        }

    }
    //  Template6
    public function ProBet()
    {
        try {
            $this->load->model("leagues");
            $this->load->model("matches");
            $this->load->model("matchDetails");
            if (!$this->CheckLoginState()) {
                $URL = base_url("betstore/ProBet");
                $this->utilities->KeepPresentState($URL);
                redirect("account/Login");

            }
            if (!$this->IsPro()) {
                $data["accountPlan"] = "Pro";
                $this->load->view("Front/Partials/ErrorPages/subscribe", $data);
            }
            $today = $this->utilities->DbDateFormat();
            $ProBet = $this->matches->ListProBetTip($today);
            $Betitems = $data["Betitems"] = array();
            if (!empty($ProBet)) {
                foreach ($ProBet as $obj) {
                    $_betItem = array(
                        "Time" => date("g:i a", strtotime($obj->MatchDate)),
                        "League" => $this->leagues->GetColumn($obj->LeagueId, "League"),
                        "Match" => $obj->MatchName,
                        "Tip" => $this->matchDetails->GetColumn($obj->Id, "ProBet"),
                        "Score" => $obj->FullTimeScore,
                        "TotalOdds" => $this->matchDetails->GetColumn($obj->Id, "ProBetOdd"),
                    );

                    $Betitems[] = (object) $_betItem;
                }
                $data["Betitems"] = $Betitems;
            }
            $this->load->view("Front/Partials/Betstore/ProBet", $data);

        } catch (\Throwable $th) {
            log_message('error', $th->getMessage());
        }

    }
    //  Template6
    public function RolloverBet()
    {
        try {
            $this->load->model("leagues");
            $this->load->model("matches");
            $this->load->model("matchDetails");
            if (!$this->CheckLoginState()) {
                $URL = base_url("betstore/RolloverBet");
                $this->utilities->KeepPresentState($URL);
                redirect("account/Login");

            }
            if (!$this->IsRollover()) {
            $data["accountPlan"] = "Rollover";
            $this->load->view("Front/Partials/ErrorPages/subscribe", $data);
        }
            $today = $this->utilities->DbDateFormat();
            $RolloverBet = $this->matches->ListRollOverTip($today);
            $Betitems = $data["Betitems"] = array();
            if (!empty($RolloverBet)) {
                foreach ($RolloverBet as $obj) {
                    $_betItem = array(
                        "Time" => date("g:i a", strtotime($obj->MatchDate)),
                        "League" => $this->leagues->GetColumn($obj->LeagueId, "League"),
                        "Match" => $obj->MatchName,
                        "Tip" => $this->matchDetails->GetColumn($obj->Id, "RollOverTip"),
                        "Score" => $obj->FullTimeScore,
                        "TotalOdds" => $this->matchDetails->GetColumn($obj->Id, "TotalRollOverOdd"),
                    );

                    $Betitems[] = (object) $_betItem;
                }
                $data["Betitems"] = $Betitems;
            }
            $this->load->view("Front/Partials/Betstore/RolloverBet", $data);

        } catch (\Throwable $th) {
            log_message('error', $th->getMessage());
        }

    }
    //  Template7
    public function Odds20()
    {
        try {
            $this->load->model("leagues");
            $this->load->model("matches");
            $this->load->model("matchDetails");
            if (!$this->CheckLoginState()) {
                $URL = base_url("betstore/Odds20");
                $this->utilities->KeepPresentState($URL);
                redirect("account/Login");

            }
            if (!$this->IsWeekend20()) {
            $data["accountPlan"] = "Weekend 20";
            $this->load->view("Front/Partials/ErrorPages/subscribe", $data);
        }
            //  $today = $this->utilities->DbDateFormat();
            $Odds20 = $this->matches->List20Odds();
            $Betitems = $data["Betitems"] = array();
            if (!empty($Odds20)) {
                foreach ($Odds20 as $obj) {
                    $_betItem = array(
                        "Date" => date("d/m/Y", strtotime($obj->MatchDate)),
                        "Time" => date("g:i a", strtotime($obj->MatchDate)),
                        "League" => $this->leagues->GetColumn($obj->LeagueId, "League"),
                        "Match" => $obj->MatchName,
                        "Tip" => $this->matchDetails->GetColumn($obj->Id, "Tips20Odds"),
                        "Odds" => $this->matchDetails->GetColumn($obj->Id, "Single20Odds"),
                        "ConfidenceLevel" => $this->matchDetails->GetColumn($obj->Id, "ConfidenceLevel"),
                        "TotalOdds" => $this->matchDetails->GetColumn($obj->Id, "Total20Odds"),
                    );

                    $Betitems[] = (object) $_betItem;
                }
                $data["Betitems"] = $Betitems;
            }
            $this->load->view("Front/Partials/Betstore/Odds20", $data);

        } catch (\Throwable $th) {
            log_message('error', $th->getMessage());
        }

    }
    //  Template5
    public function ExpertZone1()
    {

        try {
            $this->load->model("leagues");
            $this->load->model("matches");
            $this->load->model("matchDetails");
            $data["state"] = "";
            if (!$this->CheckLoginState()) {

                $URL = base_url("betstore/ExpertZone1");
                $this->utilities->KeepPresentState($URL);
                redirect("account/Login");

            }
            $today = $this->utilities->DbDateFormat();
            $ExpertZone1 = $this->matches->ListExpertZone1($today);

            $Betitems = $data["Betitems"] = array();
            if (!empty($ExpertZone1)) {

                foreach ($ExpertZone1 as $obj) {
                    $_betItem = array(
                        "Time" => date("g:i a", strtotime($obj->MatchDate)),
                        "League" => $this->leagues->GetColumn($obj->LeagueId, "League"),
                        "Match" => $obj->MatchName,
                        "Tip" => $this->matchDetails->GetColumn($obj->Id, "ExpertZone1Tips"),
                        "Odds" => $this->matchDetails->GetColumn($obj->Id, "ExpertZone1Odds"),
                        "ConfidenceLevel" => $this->matchDetails->GetColumn($obj->Id, "ExpertZone1ConfidenceLevel"),
                        "Score" => $obj->FullTimeScore,
                    );

                    $Betitems[] = (object) $_betItem;
                }
                $data["Betitems"] = $Betitems;

            }
            $this->load->view("Front/Partials/Betstore/ExpertZone1", $data);
        } catch (\Throwable $th) {

            log_message('error', $th->getMessage());
        }

    }
    //  Template5
    public function ExpertZone2()
    {

        try {
            $this->load->model("leagues");
            $this->load->model("matches");
            $this->load->model("matchDetails");
            $data["state"] = "";
            if (!$this->CheckLoginState()) {

                $URL = base_url("betstore/ExpertZone2");
                $this->utilities->KeepPresentState($URL);
                redirect("account/Login");

            }
            $today = $this->utilities->DbDateFormat();
            $ExpertZone2 = $this->matches->ListExpertZone2($today);

            $Betitems = $data["Betitems"] = array();
            if (!empty($ExpertZone2)) {

                foreach ($ExpertZone2 as $obj) {
                    $_betItem = array(
                        "Time" => date("g:i a", strtotime($obj->MatchDate)),
                        "League" => $this->leagues->GetColumn($obj->LeagueId, "League"),
                        "Match" => $obj->MatchName,
                        "Tip" => $this->matchDetails->GetColumn($obj->Id, "ExpertZone2Tips"),
                        "Odds" => $this->matchDetails->GetColumn($obj->Id, "ExpertZone2Odds"),
                        "ConfidenceLevel" => $this->matchDetails->GetColumn($obj->Id, "ExpertZone2ConfidenceLevel"),
                        "Score" => $obj->FullTimeScore,
                    );

                    $Betitems[] = (object) $_betItem;
                }
                $data["Betitems"] = $Betitems;

            }
            $this->load->view("Front/Partials/Betstore/ExpertZone2", $data);
        } catch (\Throwable $th) {

            log_message('error', $th->getMessage());
        }

    }
   

    private function CheckLoginState(): bool
    {
        return $this->session->has_userdata("UserId");
    }
    public function IsPremium(): bool
    {
        if ($this->session->userdata("IsPremium") == 1) {
            return true;
        }
        return false;
    }
    public function IsRollover(): bool
    {
        if ($this->session->userdata("IsRollOver") == 1) {
            return true;
        }
        return false;
    }
    public function IsPro(): bool
    {
        if ($this->session->userdata("IsPro") == 1) {
            return true;
        }
        return false;
    }
    public function IsWeekend20(): bool
    {
        if ($this->session->userdata("IsWeekend20") == 1) {
            return true;
        }
        return false;
    }

}

/* End of file Betstore.php */

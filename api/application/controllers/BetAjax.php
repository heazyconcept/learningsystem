<?php

defined('BASEPATH') or exit('No direct script access allowed');

class BetAjax extends CI_Controller
{
//  Template1
    public function DoubleChance($date)
    {
        try {
            $this->load->model("leagues");
            $this->load->model("matches");
            $this->load->model("matchDetails");

            $myDateTime = DateTime::createFromFormat('dmY', $date);
            $specifiedDate = $myDateTime->format("Y-m-d ");
            $Doublechance = $this->matches->ListDoubleChance($specifiedDate);
            $Betitems = array();
            if (!empty($Doublechance)) {
                foreach ($Doublechance as $double) {
                    $_betItem = array(
                        "Time" => date("g:i a", strtotime($double->MatchDate)),
                        "League" => $this->leagues->GetColumn($double->LeagueId, "League"),
                        "Match" => $double->MatchName,
                        "Tip" => $this->matchDetails->GetColumn($double->Id, "DoubleChanceTips"),
                        "Score" => $double->FullTimeScore,
                    );
                    $Betitems[] = $_betItem;
                }

                echo json_encode($Betitems);
                return;
            }
        } catch (\Throwable $th) {
            log_message('error', $th->getMessage());
        }
    }
//  Template1
    public function Over15($date)
    {
        try {
            $this->load->model("leagues");
            $this->load->model("matches");
            $this->load->model("matchDetails");

            $myDateTime = DateTime::createFromFormat('dmY', $date);
            $specifiedDate = $myDateTime->format("Y-m-d ");
            $Over15 = $this->matches->ListOver15($specifiedDate);
            $Betitems = array();
            if (!empty($Over15)) {
                foreach ($Over15 as $obj) {
                    $_betItem = array(
                        "Time" => date("g:i a", strtotime($obj->MatchDate)),
                        "League" => $this->leagues->GetColumn($obj->LeagueId, "League"),
                        "Match" => $obj->MatchName,
                        "Tip" => "OVER 1.5",
                        "Score" => $obj->FullTimeScore,
                    );
                    $Betitems[] = $_betItem;
                }
                echo json_encode($Betitems);
                return;
            }
        } catch (\Throwable $th) {
            log_message('error', $th->getMessage());
        }
        echo "";
        return;
    }
    //  Template1
    public function CorrectScore($date)
    {
        try {
            $this->load->model("leagues");
            $this->load->model("matches");
            $this->load->model("matchDetails");

            $myDateTime = DateTime::createFromFormat('dmY', $date);
            $specifiedDate = $myDateTime->format("Y-m-d ");

            $CorrectScore = $this->matches->ListCorrectScore($specifiedDate);

            $Betitems = array();
            if (!empty($CorrectScore)) {

                foreach ($CorrectScore as $obj) {
                    $_betItem = array(
                        "Time" => date("g:i a", strtotime($obj->MatchDate)),
                        "League" => $this->leagues->GetColumn($obj->LeagueId, "League"),
                        "Match" => $obj->MatchName,
                        "Tip" => $this->matchDetails->GetColumn($obj->Id, "CorrectScoreTip"),
                        "Score" => $obj->FullTimeScore,
                    );
                    $Betitems[] = $_betItem;
                }
                echo json_encode($Betitems);
                return;
            }

        } catch (\Throwable $th) {

            log_message('error', $th->getMessage());
        }
        echo "";
        return;

    }
    //  Template2
    public function SingleBet($date)
    {
        try {
            $this->load->model("leagues");
            $this->load->model("matches");
            $this->load->model("matchDetails");
            $data["state"] = "";
            $myDateTime = DateTime::createFromFormat('dmY', $date);
            $specifiedDate = $myDateTime->format("Y-m-d ");
            $SingleBet = $this->matches->ListSingleBet($specifiedDate);

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

                    $Betitems[] = $_betItem;
                }
                echo json_encode($Betitems);
                return;
            }
        } catch (\Throwable $th) {

            log_message('error', $th->getMessage());
        }
        echo "";
        return;
    }
    //  Template3
    public function ScoreBothHalves($date)
    {

        try {
            $this->load->model("leagues");
            $this->load->model("matches");
            $this->load->model("matchDetails");
            $data["state"] = "";
            $myDateTime = DateTime::createFromFormat('dmY', $date);
            $specifiedDate = $myDateTime->format("Y-m-d ");

            $ScoreBothHalves = $this->matches->ListScoreBothHalf($specifiedDate);

            $Betitems = array();
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

                    $Betitems[] = $_betItem;
                }
                echo json_encode($Betitems);
                return;

            }
        } catch (\Throwable $th) {

            log_message('error', $th->getMessage());
        }
        echo "";
        return;

    }
     //  Template3
     public function WinEitherHalf($date)
     {
         
         try {
             $this->load->model("leagues");
             $this->load->model("matches");
             $this->load->model("matchDetails");
             $myDateTime = DateTime::createFromFormat('dmY', $date);
            $specifiedDate = $myDateTime->format("Y-m-d ");
              $WinEitherHalf = $this->matches->ListWinEitherHalf($specifiedDate);
             
              $Betitems = $data["Betitems"] = array();
              if (!empty($WinEitherHalf)) {
                 
                foreach ($WinEitherHalf as $obj ) {
                 $_betItem = array(
                     "Time" => date("g:i a", strtotime($obj->MatchDate)),
                     "League" => $this->leagues->GetColumn($obj->LeagueId, "League"),
                     "Match" => $obj->MatchName,
                     "Tip" => $this->matchDetails->GetColumn($obj->Id, "WinEitherHalfTip"),
                     "FtScore" => $obj->FullTimeScore,
                     "HtScore" => $obj->HalfTimeScore
                 );
               
                 $Betitems[] = $_betItem;
                }
                echo json_encode($Betitems);
                return;
              }
         } catch (\Throwable $th) {
           
            log_message('error', $th->getMessage());
         }
         echo "";
         return;
        
         
     
     }
    //  Template1
    public function Over25($date)
    {
        try {
            $this->load->model("leagues");
            $this->load->model("matches");
            $this->load->model("matchDetails");
            $myDateTime = DateTime::createFromFormat('dmY', $date);
            $specifiedDate = $myDateTime->format("Y-m-d ");

            $Over25 = $this->matches->ListOver25($specifiedDate);
            $Betitems = array();
            if (!empty($Over25)) {
                foreach ($Over25 as $obj) {
                    $_betItem = array(
                        "Time" => date("g:i a", strtotime($obj->MatchDate)),
                        "League" => $this->leagues->GetColumn($obj->LeagueId, "League"),
                        "Match" => $obj->MatchName,
                        "Tip" => "OVER 2.5",
                        "Score" => $obj->FullTimeScore,
                    );
                    $Betitems[] = $_betItem;
                }
                echo json_encode($Betitems);
                return;
            }
        } catch (\Throwable $th) {
            log_message('error', $th->getMessage());
        }
        echo "";
        return;

    }
    //  Template1
    public function Under25($date)
    {
        try {
            $this->load->model("leagues");
            $this->load->model("matches");
            $this->load->model("matchDetails");
            $myDateTime = DateTime::createFromFormat('dmY', $date);
            $specifiedDate = $myDateTime->format("Y-m-d ");
            $Under25 = $this->matches->ListUnder25($specifiedDate);
            $Betitems = array();
            if (!empty($Under25)) {
                foreach ($Under25 as $obj) {
                    $_betItem = array(
                        "Time" => date("g:i a", strtotime($obj->MatchDate)),
                        "League" => $this->leagues->GetColumn($obj->LeagueId, "League"),
                        "Match" => $obj->MatchName,
                        "Tip" => "UNDER 2.5",
                        "Score" => $obj->FullTimeScore,
                    );
                    $Betitems[] = $_betItem;
                }
                echo json_encde($Betitems);
                return;
            }
        } catch (\Throwable $th) {
            log_message('error', $th->getMessage());
        }
        echo "";
        return;

    }
    //  Template1
    public function Bts($date)
    {
        try {
            $this->load->model("leagues");
            $this->load->model("matches");
            $this->load->model("matchDetails");
            $myDateTime = DateTime::createFromFormat('dmY', $date);
            $specifiedDate = $myDateTime->format("Y-m-d ");
            $Bts = $this->matches->ListBothTeamToScore($specifiedDate);
            $Betitems = $data["Betitems"] = array();
            if (!empty($Bts)) {
                foreach ($Bts as $obj) {
                    $_betItem = array(
                        "Time" => date("g:i a", strtotime($obj->MatchDate)),
                        "League" => $this->leagues->GetColumn($obj->LeagueId, "League"),
                        "Match" => $obj->MatchName,
                        "Tip" => "BTS",
                        "Score" => $obj->FullTimeScore,
                    );
                    $Betitems[] = $_betItem;
                }
                echo json_encode($Betitems);
                return;
            }

        } catch (\Throwable $th) {
            log_message('error', $th->getMessage());
        }
        echo "";
        return;

    }
    //  Template1
    public function Handicap($date)
    {
        try {
            $this->load->model("leagues");
            $this->load->model("matches");
            $this->load->model("matchDetails");
            $myDateTime = DateTime::createFromFormat('dmY', $date);
            $specifiedDate = $myDateTime->format("Y-m-d ");
            $Handicap = $this->matches->ListHandicap($specifiedDate);
            $Betitems = array();
            if (!empty($Handicap)) {
                foreach ($Handicap as $obj) {
                    $_betItem = array(
                        "Time" => date("g:i a", strtotime($obj->MatchDate)),
                        "League" => $this->leagues->GetColumn($obj->LeagueId, "League"),
                        "Match" => $obj->MatchName,
                        "Tip" => $this->matchDetails->GetColumn($obj->Id, "HandicapTip"),
                        "Score" => $obj->FullTimeScore,
                    );
                    $Betitems[] = $_betItem;
                }
                echo json_encode($Betitems);
                return;
            }

        } catch (\Throwable $th) {
            log_message('error', $th->getMessage());
        }
        echo "";
        return;

    }
    //  Template3
    public function HtFt($date)
    {

        try {
            $this->load->model("leagues");
            $this->load->model("matches");
            $this->load->model("matchDetails");
            $data["state"] = "";
            $myDateTime = DateTime::createFromFormat('dmY', $date);
            $specifiedDate = $myDateTime->format("Y-m-d ");
            $HtFt = $this->matches->ListHtFt($specifiedDate);

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

                    $Betitems[] = $_betItem;
                }
                echo json_encode($Betitems);
                return;

            }
        } catch (\Throwable $th) {

            log_message('error', $th->getMessage());
        }
        echo "";
        return;

    }
    //  Template3
    public function HalfTimeTips($date)
    {

        try {
            $this->load->model("leagues");
            $this->load->model("matches");
            $this->load->model("matchDetails");
            $data["state"] = "";
            $myDateTime = DateTime::createFromFormat('dmY', $date);
            $specifiedDate = $myDateTime->format("Y-m-d ");

            $HalfTimeTips = $this->matches->ListHalfTimeBet($specifiedDate);

            $Betitems = array();
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

                    $Betitems[] = $_betItem;
                }
                echo json_encode($Betitems);
                return;
            }
        } catch (\Throwable $th) {

            log_message('error', $th->getMessage());
        }
        echo "";
        return;

    }
    //  Template1
    public function SingleCombo($date)
    {
        try {
            $this->load->model("leagues");
            $this->load->model("matches");
            $this->load->model("matchDetails");
            $myDateTime = DateTime::createFromFormat('dmY', $date);
            $specifiedDate = $myDateTime->format("Y-m-d ");
            $SingleCombo = $this->matches->ListSingleCombo($specifiedDate);
            $Betitems = array();
            if (!empty($SingleCombo)) {
                foreach ($SingleCombo as $obj) {
                    $_betItem = array(
                        "Time" => date("g:i a", strtotime($obj->MatchDate)),
                        "League" => $this->leagues->GetColumn($obj->LeagueId, "League"),
                        "Match" => $obj->MatchName,
                        "Tip" => $this->matchDetails->GetColumn($obj->Id, "SingleComboTip"),
                        "Score" => $obj->FullTimeScore,
                    );
                    $Betitems[] = $_betItem;
                }
                echo json_encode($Betitems);
                return;
            }

        } catch (\Throwable $th) {
            log_message('error', $th->getMessage());
        }
        echo "";
        return;

    }
    //  Template5
    public function ExpertZone1($date)
    {

        try {
            $this->load->model("leagues");
            $this->load->model("matches");
            $this->load->model("matchDetails");
            $data["state"] = "";
            $myDateTime = DateTime::createFromFormat('dmY', $date);
            $specifiedDate = $myDateTime->format("Y-m-d ");
            $ExpertZone1 = $this->matches->ListExpertZone1($specifiedDate);

            $Betitems = array();
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

                    $Betitems[] = $_betItem;
                }
                echo json_encode($Betitems);
                return;

            }
        } catch (\Throwable $th) {

            log_message('error', $th->getMessage());
        }
        echo "";
        return;

    }

    //  Template5
    public function ExpertZone2($date)
    {

        try {
            $this->load->model("leagues");
            $this->load->model("matches");
            $this->load->model("matchDetails");
            $data["state"] = "";
            $myDateTime = DateTime::createFromFormat('dmY', $date);
            $specifiedDate = $myDateTime->format("Y-m-d ");
            $ExpertZone2 = $this->matches->ListExpertZone2($specifiedDate);

            $Betitems = array();
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

                    $Betitems[] = $_betItem;
                }
                echo json_encode($Betitems);
                return;

            }
        } catch (\Throwable $th) {

            log_message('error', $th->getMessage());
        }
        echo "";
        return;

    }
    //  Template6
    public function RolloverBet($date)
    {
        try {
            $this->load->model("leagues");
            $this->load->model("matches");
            $this->load->model("matchDetails");

            $myDateTime = DateTime::createFromFormat('dmY', $date);
            $specifiedDate = $myDateTime->format("Y-m-d ");
            $RolloverBet = $this->matches->ListRollOverTip($specifiedDate);
            $Betitems = array();
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

                    $Betitems[] = $_betItem;
                }
                echo json_encode($Betitems);
                return;
            }

        } catch (\Throwable $th) {
            log_message('error', $th->getMessage());
        }
        echo "";
        return;

    }
    //  Template6
    public function ProBet($date)
    {
        try {
            $this->load->model("leagues");
            $this->load->model("matches");
            $this->load->model("matchDetails");
            $myDateTime = DateTime::createFromFormat('dmY', $date);
            $specifiedDate = $myDateTime->format("Y-m-d ");
            $ProBet = $this->matches->ListProBetTip($specifiedDate);
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

                    $Betitems[] = $_betItem;
                }
                echo json_encode($Betitems);
                return;
            }

        } catch (\Throwable $th) {
            log_message('error', $th->getMessage());
        }
        echo "";
        return;

    }
    //  Template1
    public function MonsterBet($date)
    {
        try {
            $this->load->model("leagues");
            $this->load->model("matches");
            $this->load->model("matchDetails");
            $myDateTime = DateTime::createFromFormat('dmY', $date);
            $specifiedDate = $myDateTime->format("Y-m-d ");
            $MonsterBet = $this->matches->ListMonsterBet($specifiedDate);
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
                    $Betitems[] = $_betItem;
                }
                echo json_encode($Betitems);
                return;
            }

        } catch (\Throwable $th) {
            log_message('error', $th->getMessage());
        }
        echo "";
        return;

    }
    // Template 8
    public function Odds2($date)
    {
        try {
            $this->load->model("leagues");
            $this->load->model("matches");
            $this->load->model("matchDetails");
            $myDateTime = DateTime::createFromFormat('dmY', $date);
            $specifiedDate = $myDateTime->format("Y-m-d ");
            $Odds2First = $this->matches->ListFirst2Odds($specifiedDate);
            $BetitemsFirst = array();
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

                    $BetitemsFirst[] = $_betItem;
                }

            } else {
                $BetitemsFirst = 0;
            }
            $Odds2Second = $this->matches->ListSecond2Odds($specifiedDate);
            $BetitemsSecond = array();
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

                    $BetitemsSecond[] = $_betItem;
                }

            } else {
                $BetitemsSecond = 0;
            }
            $_output = array(
                "First" => $BetitemsFirst,
                "Second" => $BetitemsSecond,
            );
            echo json_encode($_output);
            return;

        } catch (\Throwable $th) {
            log_message('error', $th->getMessage());
        }

    }
    // Template 8
    public function Odds3($date)
    {
        try {
            $this->load->model("leagues");
            $this->load->model("matches");
            $this->load->model("matchDetails");
            $myDateTime = DateTime::createFromFormat('dmY', $date);
            $specifiedDate = $myDateTime->format("Y-m-d ");
            $Odds3First = $this->matches->ListFirst3Odds($specifiedDate);
            $BetitemsFirst = array();
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

                    $BetitemsFirst[] = $_betItem;
                }

            } else {
                $BetitemsFirst = 0;
            }
            $Odds3Second = $this->matches->ListSecond3Odds($specifiedDate);
            $BetitemsSecond = array();
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

                    $BetitemsSecond[] = $_betItem;
                }

            } else {
                $BetitemsSecond = 0;
            }
            $_output = array(
                "First" => $BetitemsFirst,
                "Second" => $BetitemsSecond,
            );
            echo json_encode($_output);
            return;

        } catch (\Throwable $th) {
            log_message('error', $th->getMessage());
        }

    }

}

/* End of file BetAjax.php */

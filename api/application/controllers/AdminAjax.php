<?php

defined('BASEPATH') or exit('No direct script access allowed');

class AdminAjax extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();

    }

    public function FetchTeam()
    {
        try {
            $this->ConfirmAjaxCall();
            $Request = (object) $_POST;
            if (empty($Request->teamSearch)) {
                echo json_encode('');
                return;
            }
            $this->load->model('leagueTable');
            $Result = $this->leagueTable->ListPossibleTeam($Request);
            echo json_encode($Result);
            return;

        } catch (\Throwable $th) {
            log_message('error', $th->getMessage());
            echo $this->utilities->outputMessage("error", "Internal Server Error");
            return;
        }
    }
    public function UpdateTeam()
    {
        try {
            $this->load->model("leagueTable");
            $this->ConfirmAjaxCall();
            $TeamRequest = (object) ($_POST);
            if ($this->utilities->IsNullOrEmptyString($TeamRequest->TeamId)) {

                unset($_POST['TeamId']);
                if ($this->leagueTable->Insert($_POST) > 0) {
                    echo $this->utilities->outputMessage("success", "Your request is successful");
                    return;
                } else {
                    echo $this->utilities->outputMessage("error", "Your Request cannot be proccessed at this time");
                    return;
                }
            } else {

                $_teamId = $TeamRequest->TeamId;

                if ($this->leagueTable->update($TeamRequest, $_teamId) == 1) {
                    echo $this->utilities->outputMessage("success", "Your request is successful");
                    return;
                } else {
                    echo $this->utilities->outputMessage("error", "Your Request cannot be proccessed at this time");
                    return;
                }
            }
        } catch (\Throwable $th) {
            log_message('error', $th->getMessage());
            echo $this->utilities->outputMessage("error", "Internal Server Error");
            return;
        }

    }
    public function TeamDetails($TeamId = '')
    {
        try {
            $this->load->model("leagueTable");
            if (empty($TeamId)) {
                return;
            }

            $teamDetails = $this->leagueTable->Get((int) $TeamId);
            echo json_encode($teamDetails);
            return;

        } catch (\Throwable $th) {
            log_message('error', $th->getMessage());
            echo $this->utilities->outputMessage("error", "Internal Server Error");
            return;
        }
    }
    public function TeamBulkUpdate()
    {
        try {
            $this->load->model("leagueTable");
            $this->ConfirmAjaxCall();
            $TeamBulkRequest = (object) $_POST;
            for ($i = 0; $i < count($TeamBulkRequest->TeamId); $i++) {
                $teamUpdate = array(
                    "GamePlayed" => $TeamBulkRequest->GamePlayed[$i],
                    "Points" => $TeamBulkRequest->Points[$i],
                    "GoalDifference" => $TeamBulkRequest->GoalDifference[$i],
                );
                if ($this->leagueTable->update((object) $teamUpdate, $TeamBulkRequest->TeamId[$i]) == 1) {
                    continue;
                } else {
                    echo $this->utilities->outputMessage("error", "Error Processing Table Update please try again later");
                    return;
                }

            }
            echo $this->utilities->outputMessage("success", "Request processed successfully");
            return;

        } catch (\Throwable $th) {
            log_message('error', $th->getMessage());
            echo $this->utilities->outputMessage("error", "Internal Server Error");
            return;
        }

    }
    public function AddMatch()
    {
        try {

            $this->load->model("matches");
            $this->load->model("matchDetails");
            $this->ConfirmAjaxCall();
            $userId = $this->session->userdata("UserId");
            $MatchRequest = (object) $_POST;
            $MatchHash = $this->utilities->GenerateGUID();
            $dbOptions = array(
                "MatchName" => $MatchRequest->MatchName,
                "MatchDate" => $MatchRequest->MatchDate,
                "MatchCategory" => $MatchRequest->MatchCategory,
                "LeagueId" => $MatchRequest->LeagueId,
                "IsFreepros" => $MatchRequest->IsFreepros,
                "IsDailyBankerTips" => $MatchRequest->IsDailyBankerTips,
                "IsUpcomingTips" => $MatchRequest->IsUpcomingTips,
                "IsProBetTip" => $MatchRequest->IsProBetTip,
                "IsRollOverTip" => $MatchRequest->IsRollOverTip,
                "IsExpertZone1" => $MatchRequest->IsExpertZone1,
                "IsExpertZone2" => $MatchRequest->IsExpertZone2,
                "FullTimeTips" => $MatchRequest->FullTimeTips,
                "MatchOdds" => $MatchRequest->MatchOdds,
                "Is2Odds" => $MatchRequest->Is2Odds,
                "IsFirst2Odds" => $MatchRequest->IsFirst2Odds,
                "IsSecond2Odds" => $MatchRequest->IsSecond2Odds,
                "Is3Odds" => $MatchRequest->Is3Odds,
                "IsFirst3Odds" => $MatchRequest->IsFirst3Odds,
                "IsSecond3Odds" => $MatchRequest->IsSecond3Odds,
                "Is20Odds" => $MatchRequest->Is20Odds,
                "IsDoubleChance" => $MatchRequest->IsDoubleChance,
                "IsDraw" => $MatchRequest->IsDraw,
                "IsOver15" => $MatchRequest->IsOver15,
                "IsOver25" => $MatchRequest->IsOver25,
                "IsUnder25" => $MatchRequest->IsUnder25,
                "IsSingleBet" => $MatchRequest->IsSingleBet,
                "BothTeamToScore" => $MatchRequest->BothTeamToScore,
                "IsAccumulator" => $MatchRequest->IsAccumulator,
                "IsSingleCombo" => $MatchRequest->IsSingleCombo,
                "IsMonsterBet" => $MatchRequest->IsMonsterBet,
                "IsHandicap" => $MatchRequest->IsHandicap,
                "IsHalfTimeBet" => $MatchRequest->IsHalfTimeBet,
                "IsCorrectScore" => $MatchRequest->IsCorrectScore,
                "IsHtFt" => $MatchRequest->IsHtFt,
                "ScoreBothHalf" => $MatchRequest->ScoreBothHalf,
                "WinEitherHalf" => $MatchRequest->WinEitherHalf,
                "IsWeekendBet" => $MatchRequest->IsWeekendBet,
                "HalfTimeScore" => $MatchRequest->HalfTimeScore,
                "FullTimeScore" => $MatchRequest->FullTimeScore,
                "CreatedBy" => $userId,
                "DateCreated" => $this->utilities->DbTimeFormat(),
                "IdHash" => $MatchHash,
                "MatchClosed" => $MatchRequest->MatchClosed,
                "WinningTip" => $MatchRequest->WinningTip,

            );
            $dbResponse = $this->matches->Insert($dbOptions);
            if ($dbResponse > 0) {
                $dbOptions = array(
                    "MatchId" => $dbResponse,
                    "ProBet" => $MatchRequest->ProBet,
                    "ProBetOdd" => $MatchRequest->ProBetOdd,
                    "RollOverTip" => $MatchRequest->RollOverTip,
                    "TotalRollOverOdd" => $MatchRequest->TotalRollOverOdd,
                    "ExpertZone1Tips" => $MatchRequest->ExpertZone1Tips,
                    "ExpertZone1Odds" => $MatchRequest->ExpertZone1Odds,
                    "ExpertZone1ConfidenceLevel" => $MatchRequest->ExpertZone1ConfidenceLevel,
                    "ExpertZone2Tips" => $MatchRequest->ExpertZone2Tips,
                    "ExpertZone2Odds" => $MatchRequest->ExpertZone2Odds,
                    "ExpertZone2ConfidenceLevel" => $MatchRequest->ExpertZone2ConfidenceLevel,
                    "Tips2Odds" => $MatchRequest->Tips2Odds,
                    "TotalFirst2OddsTips" => $MatchRequest->TotalFirst2OddsTips,
                    "TotalSecond2OddsTips" => $MatchRequest->TotalSecond2OddsTips,
                    "Tips3Odds" => $MatchRequest->Tips3Odds,
                    "TotalFirst3OddsTips" => $MatchRequest->TotalFirst3OddsTips,
                    "TotalSecond3OddsTips" => $MatchRequest->TotalSecond3OddsTips,
                    "Tips20Odds" => $MatchRequest->Tips20Odds,
                    "Single20Odds" => $MatchRequest->Single20Odds,
                    "Total20Odds" => $MatchRequest->Total20Odds,
                    "DoubleChanceTips" => $MatchRequest->DoubleChanceTips,
                    "SingleBetTip" => $MatchRequest->SingleBetTip,
                    "SingleBetOdd" => $MatchRequest->SingleBetOdd,
                    "SingleComboTip" => $MatchRequest->SingleComboTip,
                    "MonsterBetTip" => $MatchRequest->MonsterBetTip,
                    "HandicapTip" => $MatchRequest->HandicapTip,
                    "HalfTimeTip" => $MatchRequest->HalfTimeTip,
                    "CorrectScoreTip" => $MatchRequest->CorrectScoreTip,
                    "HtFtTip" => $MatchRequest->HtFtTip,
                    "ScoreBothHalfTip" => $MatchRequest->ScoreBothHalfTip,
                    "WinEitherHalfTip" => $MatchRequest->WinEitherHalfTip,
                    "WeekendBetTip" => $MatchRequest->WeekendBetTip,
                    "AlternateTips" => $MatchRequest->AlternateTips,
                    "ConfidenceLevel" => $MatchRequest->ConfidenceLevel,
                    "CreatedBy" => $userId,
                    "DateCreated" => $this->utilities->DbTimeFormat(),
                    "MatchIdHash" => $MatchHash,
                );
                $dbResponse = $this->matchDetails->Insert($dbOptions);
                if (!empty($dbResponse)) {
                    echo $this->utilities->outputMessage("success", "Match added successfully");
                    return;
                } else {
                    echo $this->utilities->outputMessage("error", "cannot process this request at this time");
                    return;
                }
            } else {
                echo $this->utilities->outputMessage("error ", "cannot process this request at this time");
                return;
            }

        } catch (\Throwable $th) {
            log_message('error', $th->getMessage());
            echo $this->utilities->outputMessage("error", "Internal Server Error");
            return;
        }
    }
    public function EditMatch()
    {
        try {
            $this->load->model("matches");
            $this->load->model("matchDetails");
            $this->ConfirmAjaxCall();
            $userId = $this->session->userdata("UserId");
            $MatchRequest = (object) $_POST;
            try {
                $MatchRequest = $this->utilities->AddPropertyToObJect($MatchRequest, "ModifiedBy", $userId);
                $this->matches->update($MatchRequest, $MatchRequest->MatchId);
                $this->matchDetails->update($MatchRequest, $MatchRequest->MatchId);
                echo $this->utilities->outputMessage("success", "Match updated successfully");
                return;
            } catch (\Throwable $th) {
                log_message("error", $th->getMessage());
                echo $this->utilities->outputMessage("error", "Your request cannot be proccessed at this time");
                return;
            }

        } catch (\Throwable $th) {
            log_message('error', $th->getMessage());
            echo $this->utilities->outputMessage("error", "Internal Server Error");
            return;
        }
    }
    public function GetUsers($UserType)
    {
        try {
            $this->ConfirmAjaxCall();
            $this->load->model("users");
            $limit = $this->input->get('length');
            $start = $this->input->get('start');
            $searchParam = $this->input->get('search')['value'];
            $_targets = array();
            if ($UserType == "Pro") {
                $_targets = array("IsPro" => 1);
            } elseif ($UserType == "Premium") {
                $_targets = array("IsPremium" => 1);
            } elseif ($UserType == "Rollover") {
                $_targets = array("IsRollover" => 1);
            } elseif ($UserType == "Weekend") {
                $_targets = array("IsWeekend20" => 1);
            }
            $totalData = $this->users->CountUsers($_targets);
            $totalFiltered = $totalData;
            if (empty($searchParam)) {
                $UserData = $this->users->ListAll((int) $limit, (int) $start, $_targets);
            } else {
                $UserData = $this->users->SearchUser((int) $limit, (int) $start, $searchParam, $_targets);
                $totalFiltered = $this->users->SearchUserCount($searchParam, $_targets);
            }
            $data = array();
            if (!empty($UserData)) {
                foreach ($UserData as $obj) {
                    $nestedData['Name'] = $obj->FullName;
                    $nestedData['Phone'] = $obj->PhoneNumber;
                    $nestedData['Email'] = $obj->EmailAddress;
                    $nestedData['Country'] = $obj->Country;
                    $nestedData['DateRegistered'] = $this->utilities->formatDate($obj->DateCreated);
                    $nestedData['Action'] = '<a href="' . base_url('admin/ViewUser/' . $obj->IdHash) . '" class="btn btn-dark pd-x-30">View</a>';
                    $data[] = $nestedData;
                }

            }

            $json_data = array(
                "draw" => intval($this->input->get('draw')),
                "recordsTotal" => intval($totalData),
                "recordsFiltered" => intval($totalFiltered),
                "data" => $data,
            );

            echo json_encode($json_data);

        } catch (\Throwable $th) {
            $this->utilities->LogError($th);
        }
    }
    public function SearchUsers($searchParam = "")
    {
        try {
            $this->load->model("users");

            if ($this->utilities->IsNullOrEmptyString($searchParam) || $searchParam == ' ') {
                $UserData = $this->users->ListAll(20);
            } else {
                $UserData = $this->users->SearchUser(20, 0, $searchParam);
            }
            echo json_encode($UserData);
            return;
        } catch (\Throwable $th) {
            $this->utilities->LogError($th);
        }
        echo json_encode(array());
        return;
    }
    public function RenewAccount()
    {
        try {
            $this->load->model("pricing");
            $this->load->model("users");
            $this->load->model("pro");
            $this->load->model("rollover");
            $this->load->model("premium");
            $this->load->model("weekend");
            $this->load->library("utilities");
            //  {userId: userId, plan: plan, expiryDate: expiryDate}
            $AccountData = (object) $_POST;
            $Duration = $this->utilities->CountDays($AccountData->expiryDate);
            $userData = $this->users->GetByHash($AccountData->userId);
            $ActivationData = array(
                "ExpiryDate" => $AccountData->expiryDate,
                "Duration" => (string) $Duration . " Days",
                "Status" => "Active",
                "ModifiedBy" => $this->session->userdata("UserId"),
                "CreatedBy" => $this->session->userdata("UserId"),
                "UserIdHash" => $userData->IdHash,
                "UserId" => $userData->Id,

            );
            if ($AccountData->plan == "premium") {

                if ($this->users->ActivatePremium($userData->Id) > 0) {
                    $Response = $this->premium->UpdateDetails((object) $ActivationData, $userData->Id);
                    if ($Response > 0) {
                        goto SuccessMessage;
                    }

                };
                goto ErrorMessage;

            } elseif ($AccountData->plan == "pro") {
                if ($this->users->ActivatePro($userData->Id) > 0) {
                    $Response = $this->pro->UpdateDetails((object) $ActivationData, $userData->Id);
                    if ($Response > 0) {
                        goto SuccessMessage;
                    }

                };
                goto ErrorMessage;

            } elseif ($AccountData->plan == "rollover") {
                if ($this->users->ActivateRollover($userData->Id) > 0) {
                    $Response = $this->rollover->UpdateDetails((object) $ActivationData, $userData->Id);
                    if ($Response > 0) {
                        goto SuccessMessage;
                    }

                };
                goto ErrorMessage;

            } elseif ($AccountData->plan == "weekend") {
                if ($this->users->ActivateWeekend20($userData->Id) > 0) {
                    $Response = $this->weekend->UpdateDetails((object) $ActivationData, $userData->Id);
                    if ($Response > 0) {
                        goto SuccessMessage;
                    }

                };
                goto ErrorMessage;

            }

            SuccessMessage:{
                echo $this->utilities->outputMessage("success");
                return;
            }
            ErrorMessage:{
                echo $this->utilities->outputMessage("error", "your proccess cannot be completed at this moment");
                return;
            }
        } catch (\Throwable $th) {
            log_message('error', $th->getMessage());
            echo $this->utilities->outputMessage("error", "Internal server error");
            return;
        }

    }
    public function GetTestimonial()
    {
        try {
            $this->ConfirmAjaxCall();
            $this->load->model("testimonials");
            $limit = $this->input->get('length');
            $start = $this->input->get('start');
            $searchParam = $this->input->get('search')['value'];

            $totalData = $this->testimonials->Count();
            $totalFiltered = $totalData;
            if (empty($searchParam)) {
                $TestimonialData = $this->testimonials->ListAll((int) $limit, (int) $start);
            } else {
                $TestimonialData = $this->testimonials->SearchTestimonial((int) $limit, (int) $start, $searchParam);
                $totalFiltered = $this->testimonials->SearchTestimonialCount($searchParam, $_targets);
            }
            $data = array();
            if (!empty($TestimonialData)) {
                foreach ($TestimonialData as $obj) {
                    $nestedData['Date'] = $this->utilities->formatDate($obj->DateCreated);
                    $nestedData['Testimonial'] = $obj->Testimony;
                    $nestedData['By'] = $obj->FullName;
                    $nestedData['Country'] = $obj->Country;
                    $nestedData['Status'] = ($obj->IsActive == 1) ? "Active" : "Inactive";
                    if ($obj->IsActive == 1) {
                        $nestedData['Action'] = '<a href="' . base_url('admin/EditTestimonial/' . $obj->Id) . '" class="btn btn-primary btn-test-action pd-x-30">Edit</a>
                 <a href="' . base_url('admin/DeleteTestimonial/' . $obj->Id) . '" class="btn btn-primary btn-test-action pd-x-30">Delete</a>
                 <a href="' . base_url('admin/DeactivateTestimonial/' . $obj->Id) . '" class="btn btn-primary btn-test-action pd-x-30">Deactivate</a>';
                    } else {
                        $nestedData['Action'] = '<a href="' . base_url('admin/EditTestimonial/' . $obj->Id) . '" class="btn btn-primary btn-test-action pd-x-30">Edit</a>
                 <a href="' . base_url('admin/DeleteTestimonial/' . $obj->Id) . '" class="btn btn-primary btn-test-action pd-x-30">Delete</a>
                 <a href="' . base_url('admin/ActivateTestimonial/' . $obj->Id) . '" class="btn btn-primary btn-test-action pd-x-30">Activate</a>';
                    }
                    $data[] = $nestedData;

                }

            }
            $json_data = array(
                "draw" => intval($this->input->get('draw')),
                "recordsTotal" => intval($totalData),
                "recordsFiltered" => intval($totalFiltered),
                "data" => $data,
            );

            echo json_encode($json_data);
            return;

        } catch (\Throwable $th) {
            $this->utilities->LogError($th);
        }
        $json_data = array(
            "draw" => intval($this->input->get('draw')),
            "recordsTotal" => 0,
            "recordsFiltered" => 0,
            "data" => $data,
        );

        echo json_encode($json_data);
        return;

    }
    public function AddTestimonial()
    {
        try {
            $this->load->model("testimonials");
            $this->ConfirmAjaxCall();
            $userId = $this->session->userdata("UserId");
            $TestimonialRequest = (object) $_POST;

            $TestimonialRequest = $this->utilities->AddPropertyToObJect($TestimonialRequest, "DateCreated", $this->utilities->DbTimeFormat());
            $Response = $this->testimonials->Insert($TestimonialRequest);
            if ($Response > 0) {
                echo $this->utilities->outputMessage("success", "Testimonial added sucessfully");
                return;
            }

        } catch (\Throwable $th) {
            log_message('error', $th->getMessage());
            echo $this->utilities->outputMessage("error", "Internal Server Error");
            return;
        }
        echo $this->utilities->outputMessage("error", "Your request cannot be proccessed at this time. Please try again later.");
        return;
    }
    public function EditTestimonial($TestimonyId)
    {
        try {
            $this->load->model("testimonials");
            $this->ConfirmAjaxCall();
            $userId = $this->session->userdata("UserId");
            $TestimonialRequest = (object) $_POST;
            $Response = $this->testimonials->update($TestimonialRequest, $TestimonyId);
            if ($Response > 0) {
                echo $this->utilities->outputMessage("success", "Testimonial Updated sucessfully");
                return;
            }

        } catch (\Throwable $th) {
            log_message('error', $th->getMessage());
            echo $this->utilities->outputMessage("error", "Internal Server Error");
            return;
        }
        echo $this->utilities->outputMessage("error", "Your request cannot be proccessed at this time. Please try again later.");
        return;
    }
    public function GetStatistics()
    {
        try {
            $this->load->model("users");
            // $this->ConfirmAjaxCall();
            $totalUsers = count($this->users->ListAll());
            $distinctCountry  =  $this->users->GetDistinctUserCountry();
            $FreeUsers = $this->users->CountUsers( array("AccountType" => 'Free'), "AND");
            $PremiumUsers = $this->users->CountUsers( array("IsPremium" => 1), "AND");
            $RollOverUsers = $this->users->CountUsers( array("IsRollOver" => 1), "AND");
            $ProUsers = $this->users->CountUsers( array("IsPro" => 1), "AND");
            $Weekend20Users = $this->users->CountUsers( array("IsWeekend20" => 1), "AND");
            $ArrayCountryStat = array(); 
            $ArraySubStat = array();
            if (!empty($distinctCountry)) {
                foreach ($distinctCountry as $country) {
                    $_target = array("Country" => $country->Country);
                    $_users = $this->users->CountUsers($_target, "AND");
                    
                    $_userPercentage = ($_users * 100) / $totalUsers;
                    $_tempArray = array(
                        "Country" => $country->Country,
                        "Percentage" => round($_userPercentage),
                        "count" => $_users
                    );
                    $ArrayCountryStat[] = $_tempArray;
                }

            }
            $_userPercentage = ($FreeUsers * 100) / $totalUsers;
            $_tempArray = array(
                "Name" => "Free",
                "Percentage" => round($_userPercentage),
                "count" => $FreeUsers
            );
            $ArraySubStat[] = $_tempArray;
            $_userPercentage = ($PremiumUsers * 100) / $totalUsers;
            $_tempArray = array(
                "Name" => "Premium",
                "Percentage" => round($_userPercentage),
                "count" => $PremiumUsers
            );
            $ArraySubStat[] = $_tempArray;
            $_userPercentage = ($RollOverUsers * 100) / $totalUsers;
            $_tempArray = array(
                "Name" => "Rollover",
                "Percentage" => round($_userPercentage),
                "count" => $RollOverUsers
            );
            $ArraySubStat[] = $_tempArray;
            $_userPercentage = ($ProUsers * 100) / $totalUsers;
            $_tempArray = array(
                "Name" => "Pro",
                "Percentage" => round($_userPercentage),
                "count" => $ProUsers
            );
            $ArraySubStat[] = $_tempArray;
            $_userPercentage = ($Weekend20Users * 100) / $totalUsers;
            $_tempArray = array(
                "Name" => "Weekend20",
                "Percentage" => round($_userPercentage),
                "count" => $Weekend20Users
            );
            $ArraySubStat[] = $_tempArray;
            $AllStat = array(
                "CountryStat" => $ArrayCountryStat,
                "SubscriptionStat" => $ArraySubStat
            );
           echo json_encode($AllStat);
           return;

        } catch (\Throwable $th) {
            log_message('error', $th->getMessage());
            echo $this->utilities->outputMessage("error", "Internal Server Error");
            return;
        }
      
    }
    private function ConfirmAjaxCall()
    {
        if (empty($_REQUEST)) {
            redirect('/');
        }

    }

}

/* End of file AdminAjax.php */

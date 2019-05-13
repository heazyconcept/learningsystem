<?php 

defined('BASEPATH') OR exit('No direct script access allowed');

class MatchDetails extends CI_Model {

    private $TableName = "matchdetails";
   
    public function __construct()
    {
        parent::__construct();
        $this->load->model('connectDb');
        
    }
    
     public function Insert(array $matchData): int
     {
         $matchData['IdHash'] = $this->utilities->GenerateGUID();
         try {
             
             $dbOptions = array(
                 "table_name" => $this->TableName,
                 "process_data" => (object) $matchData,
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
     public function update(stdClass $matchData, int $MatchId): int
     {
         try {
             $matchDB = $this->GetByMatch($MatchId);
             $MatchUpdate = array(
                 "ProBet" => (isset($matchData->ProBet) && $matchData->ProBet != $matchData->ProBet)? $matchData->ProBet : $matchData->ProBet,
                 "ProBetOdd" => (isset($matchData->ProBetOdd) && $matchData->ProBetOdd != $matchData->ProBetOdd)? $matchData->ProBetOdd : $matchData->ProBetOdd,
                 "RollOverTip" => (isset($matchData->RollOverTip) && $matchData->RollOverTip != $matchData->RollOverTip)? $matchData->RollOverTip : $matchData->RollOverTip,
                 "TotalRollOverOdd" => (isset($matchData->TotalRollOverOdd) && $matchData->TotalRollOverOdd != $matchData->TotalRollOverOdd)? $matchData->TotalRollOverOdd : $matchData->TotalRollOverOdd,
                 "ExpertZone1Tips" => (isset($matchData->ExpertZone1Tips) && $matchData->ExpertZone1Tips != $matchData->ExpertZone1Tips)? $matchData->ExpertZone1Tips : $matchData->ExpertZone1Tips,
                 "ExpertZone1Odds" => (isset($matchData->ExpertZone1Odds) && $matchData->ExpertZone1Odds != $matchData->ExpertZone1Odds)? $matchData->ExpertZone1Odds : $matchData->ExpertZone1Odds,
                 "ExpertZone1ConfidenceLevel" => (isset($matchData->ExpertZone1ConfidenceLevel) && $matchData->ExpertZone1ConfidenceLevel != $matchData->ExpertZone1ConfidenceLevel)? $matchData->ExpertZone1ConfidenceLevel : $matchData->ExpertZone1ConfidenceLevel,
                 "ExpertZone2Tips" => (isset($matchData->ExpertZone2Tips) && $matchData->ExpertZone2Tips != $matchData->ExpertZone2Tips)? $matchData->ExpertZone2Tips : $matchData->ExpertZone2Tips,
                 "ExpertZone2Odds" => (isset($matchData->ExpertZone2Odds) && $matchData->ExpertZone2Odds != $matchData->ExpertZone2Odds)? $matchData->ExpertZone2Odds : $matchData->ExpertZone2Odds,
                 "ExpertZone2ConfidenceLevel" => (isset($matchData->ExpertZone2ConfidenceLevel) && $matchData->ExpertZone2ConfidenceLevel != $matchData->ExpertZone2ConfidenceLevel)? $matchData->ExpertZone2ConfidenceLevel : $matchData->ExpertZone2ConfidenceLevel,
                 "Tips2Odds" => (isset($matchData->Tips2Odds) && $matchData->Tips2Odds != $matchData->Tips2Odds)? $matchData->Tips2Odds : $matchData->Tips2Odds,
                 "TotalFirst2OddsTips" => (isset($matchData->TotalFirst2OddsTips) && $matchData->TotalFirst2OddsTips != $matchData->TotalFirst2OddsTips)? $matchData->TotalFirst2OddsTips : $matchData->TotalFirst2OddsTips,
                 "TotalSecond2OddsTips" => (isset($matchData->TotalSecond2OddsTips) && $matchData->TotalSecond2OddsTips != $matchData->TotalSecond2OddsTips)? $matchData->TotalSecond2OddsTips : $matchData->TotalSecond2OddsTips,
                 "Tips3Odds" => (isset($matchData->Tips3Odds) && $matchData->Tips3Odds != $matchData->Tips3Odds)? $matchData->Tips3Odds : $matchData->Tips3Odds,
                 "TotalFirst3OddsTips" => (isset($matchData->TotalFirst3OddsTips) && $matchData->TotalFirst3OddsTips != $matchData->TotalFirst3OddsTips)? $matchData->TotalFirst3OddsTips : $matchData->TotalFirst3OddsTips,
                 "TotalSecond3OddsTips" => (isset($matchData->TotalSecond3OddsTips) && $matchData->TotalSecond3OddsTips != $matchData->TotalSecond3OddsTips)? $matchData->TotalSecond3OddsTips : $matchData->TotalSecond3OddsTips,
                 "Tips20Odds" => (isset($matchData->Tips20Odds) && $matchData->Tips20Odds != $matchData->Tips20Odds)? $matchData->Tips20Odds : $matchData->Tips20Odds,
                 "Single20Odds" => (isset($matchData->Single20Odds) && $matchData->Single20Odds != $matchData->Single20Odds)? $matchData->Single20Odds : $matchData->Single20Odds,
                 "Total20Odds" => (isset($matchData->Total20Odds) && $matchData->Total20Odds != $matchData->Total20Odds)? $matchData->Total20Odds : $matchData->Total20Odds,
                 "DoubleChanceTips" => (isset($matchData->DoubleChanceTips) && $matchData->DoubleChanceTips != $matchData->DoubleChanceTips)? $matchData->DoubleChanceTips : $matchData->DoubleChanceTips,
                 "SingleBetTip" => (isset($matchData->SingleBetTip) && $matchData->SingleBetTip != $matchData->SingleBetTip)? $matchData->SingleBetTip : $matchData->SingleBetTip,
                 "SingleBetOdd" => (isset($matchData->SingleBetOdd) && $matchData->SingleBetOdd != $matchData->SingleBetOdd)? $matchData->SingleBetOdd : $matchData->SingleBetOdd,
                 "SingleComboTip" => (isset($matchData->SingleComboTip) && $matchData->SingleComboTip != $matchData->SingleComboTip)? $matchData->SingleComboTip : $matchData->SingleComboTip,
                 "MonsterBetTip" => (isset($matchData->MonsterBetTip) && $matchData->MonsterBetTip != $matchData->MonsterBetTip)? $matchData->MonsterBetTip : $matchData->MonsterBetTip,
                 "HandicapTip" => (isset($matchData->HandicapTip) && $matchData->HandicapTip != $matchData->HandicapTip)? $matchData->HandicapTip : $matchData->HandicapTip,
                 "HalfTimeTip" => (isset($matchData->HalfTimeTip) && $matchData->HalfTimeTip != $matchData->HalfTimeTip)? $matchData->HalfTimeTip : $matchData->HalfTimeTip,
                 "CorrectScoreTip" => (isset($matchData->CorrectScoreTip) && $matchData->CorrectScoreTip != $matchData->CorrectScoreTip)? $matchData->CorrectScoreTip : $matchData->CorrectScoreTip,
                 "HtFtTip" => (isset($matchData->HtFtTip) && $matchData->HtFtTip != $matchData->HtFtTip)? $matchData->HtFtTip : $matchData->HtFtTip,
                 "ScoreBothHalfTip" => (isset($matchData->ScoreBothHalfTip) && $matchData->ScoreBothHalfTip != $matchData->ScoreBothHalfTip)? $matchData->ScoreBothHalfTip : $matchData->ScoreBothHalfTip,
                 "WinEitherHalfTip" => (isset($matchData->WinEitherHalfTip) && $matchData->WinEitherHalfTip != $matchData->WinEitherHalfTip)? $matchData->WinEitherHalfTip : $matchData->WinEitherHalfTip,
                 "WeekendBetTip" => (isset($matchData->WeekendBetTip) && $matchData->WeekendBetTip != $matchData->WeekendBetTip)? $matchData->WeekendBetTip : $matchData->WeekendBetTip,
                 "AlternateTips" => (isset($matchData->AlternateTips) && $matchData->AlternateTips != $matchData->AlternateTips)? $matchData->AlternateTips : $matchData->AlternateTips,
                 "ConfidenceLevel" => (isset($matchData->ConfidenceLevel) && $matchData->ConfidenceLevel != $matchData->ConfidenceLevel)? $matchData->ConfidenceLevel : $matchData->ConfidenceLevel,
                 "ModifiedBy" => (isset($matchData->ModifiedBy) && $matchData->ModifiedBy != $matchData->ModifiedBy)? $matchData->ModifiedBy : $matchData->ModifiedBy,
                 "DateModified" => $this->utilities->DbTimeFormat(),
                    );
             $dbOptions = array(
                 "table_name" => $this->TableName,
                 "process_data" => (object) $MatchUpdate,
                 "targets" => (object) array("Id" => $MatchId)
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
     public function Get(int $MatchId): stdClass
     {
         try {
             $dbOptions = array(
                 "table_name" => $this->TableName,
                 "targets" => (object) array("Id" => $MatchId)
             );
             $dbResult = $this->connectDb->select_data((object) $dbOptions);
             if(!empty($dbResult))
                 return $dbResult[0];
     
             
         } catch (\Throwable $th) {
             
             log_message('error', $th->getMessage());
         
         }
         return null;
         
     }
     public function GetByMatch(int $MatchId) : stdClass
     {
        try {
            $dbOptions = array(
                "table_name" => $this->TableName,
                "targets" => (object) array("MatchId" => $MatchId)
            );
            $dbResult = $this->connectDb->select_data((object) $dbOptions);
            if(!empty($dbResult))
                return $dbResult[0];
    
            
        } catch (\Throwable $th) {
            
            log_message('error', $th->getMessage());
        
        }
        return null;
     }
     public function ListAll(): array
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
     public function GetColumn(int $MatchId, string $Column ): string
     {
        try {
            $dbOptions = array(
                "table_name" => $this->TableName,
                "targets" => (object) array("MatchId" => $MatchId)
            );
            $dbResult = $this->connectDb->select_data((object) $dbOptions);
            if(!empty($dbResult))
                return $dbResult[0]->$Column;
    
            
        } catch (\Throwable $th) {
            
            log_message('error', $th->getMessage());
        
        }
        return "";
     }
    
     
     
    public function DeleteMatch( int $matchId):bool
    {
        try {
            $dbOptions = array(
                "table_name" => $this->TableName,
               "targets" => array("Id" => $matchId)
            );
            $DbResponse = $this->connectDb->delete_data((object) $dbOptions);
            if(!empty($DbResponse))
                return true;
            
        } catch (\Throwable $th) {
            
            log_message('error', $th->getMessage());
        
        }
        return false;
    }
    

}

/* End of file MatchDetails.php */

?>
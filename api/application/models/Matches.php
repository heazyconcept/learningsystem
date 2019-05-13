<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Matches extends CI_Model {

    private $TableName = "matches";
   
    public function __construct()
    {
        parent::__construct();
        $this->load->model('connectDb');
        
    }
    
     public function Insert(array $matchData): int
     {
         try {
            //  $matchData["IdHash"] = $this->utilities->GenerateGUID();
             
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
             $matchDB = $this->Get($MatchId);
             $MatchUpdate = array(
                 "MatchName" => (isset($matchData->MatchName) && $matchData->MatchName != $matchData->MatchName)? $matchData->MatchName : $matchData->MatchName,
                 "MatchDate" => (isset($matchData->MatchDate) && $matchData->MatchDate != $matchData->MatchDate)? $matchData->MatchDate : $matchData->MatchDate,
                 "MatchCategory" => (isset($matchData->MatchCategory) && $matchData->MatchCategory != $matchData->MatchCategory)? $matchData->MatchCategory : $matchData->MatchCategory,
                 "LeagueId" => (isset($matchData->LeagueId) && $matchData->LeagueId != $matchData->LeagueId)? $matchData->LeagueId : $matchData->LeagueId,
                 "IsFreepros" => (isset($matchData->IsFreepros) && $matchData->IsFreepros != $matchData->IsFreepros)? $matchData->IsFreepros : $matchData->IsFreepros,
                 "IsDailyBankerTips" => (isset($matchData->IsDailyBankerTips) && $matchData->IsDailyBankerTips != $matchData->IsDailyBankerTips)? $matchData->IsDailyBankerTips : $matchData->IsDailyBankerTips,
                 "IsUpcomingTips" => (isset($matchData->IsUpcomingTips) && $matchData->IsUpcomingTips != $matchData->IsUpcomingTips)? $matchData->IsUpcomingTips : $matchData->IsUpcomingTips,
                 "IsProBetTip" => (isset($matchData->IsProBetTip) && $matchData->IsProBetTip != $matchData->IsProBetTip)? $matchData->IsProBetTip : $matchData->IsProBetTip,
                 "IsRollOverTip" => (isset($matchData->IsRollOverTip) && $matchData->IsRollOverTip != $matchData->IsRollOverTip)? $matchData->IsRollOverTip : $matchData->IsRollOverTip,
                 "IsExpertZone1" => (isset($matchData->IsExpertZone1) && $matchData->IsExpertZone1 != $matchData->IsExpertZone1)? $matchData->IsExpertZone1 : $matchData->IsExpertZone1,
                 "IsExpertZone2" => (isset($matchData->IsExpertZone2) && $matchData->IsExpertZone2 != $matchData->IsExpertZone2)? $matchData->IsExpertZone2 : $matchData->IsExpertZone2,
                 "FullTimeTips" => (isset($matchData->FullTimeTips) && $matchData->FullTimeTips != $matchData->FullTimeTips)? $matchData->FullTimeTips : $matchData->FullTimeTips,
                 "MatchOdds" => (isset($matchData->MatchOdds) && $matchData->MatchOdds != $matchData->MatchOdds)? $matchData->MatchOdds : $matchData->MatchOdds,
                 "Is2Odds" => (isset($matchData->Is2Odds) && $matchData->Is2Odds != $matchData->Is2Odds)? $matchData->Is2Odds : $matchData->Is2Odds,
                 "IsFirst2Odds" => (isset($matchData->IsFirst2Odds) && $matchData->IsFirst2Odds != $matchData->IsFirst2Odds)? $matchData->IsFirst2Odds : $matchData->IsFirst2Odds,
                 "IsSecond2Odds" => (isset($matchData->IsSecond2Odds) && $matchData->IsSecond2Odds != $matchData->IsSecond2Odds)? $matchData->IsSecond2Odds : $matchData->IsSecond2Odds,
                 "Is3Odds" => (isset($matchData->Is3Odds) && $matchData->Is3Odds != $matchData->Is3Odds)? $matchData->Is3Odds : $matchData->Is3Odds,
                 "IsFirst3Odds" => (isset($matchData->IsFirst3Odds) && $matchData->IsFirst3Odds != $matchData->IsFirst3Odds)? $matchData->IsFirst3Odds : $matchData->IsFirst3Odds,
                 "IsSecond3Odds" => (isset($matchData->IsSecond3Odds) && $matchData->IsSecond3Odds != $matchData->IsSecond3Odds)? $matchData->IsSecond3Odds : $matchData->IsSecond3Odds,
                 "Is20Odds" => (isset($matchData->Is20Odds) && $matchData->Is20Odds != $matchData->Is20Odds)? $matchData->Is20Odds : $matchData->Is20Odds,
                 "IsDoubleChance" => (isset($matchData->IsDoubleChance) && $matchData->IsDoubleChance != $matchData->IsDoubleChance)? $matchData->IsDoubleChance : $matchData->IsDoubleChance,
                 "IsDraw" => (isset($matchData->IsDraw) && $matchData->IsDraw != $matchData->IsDraw)? $matchData->IsDraw : $matchData->IsDraw,
                 "IsOver15" => (isset($matchData->IsOver15) && $matchData->IsOver15 != $matchData->IsOver15)? $matchData->IsOver15 : $matchData->IsOver15,
                 "IsOver25" => (isset($matchData->IsOver25) && $matchData->IsOver25 != $matchData->IsOver25)? $matchData->IsOver25 : $matchData->IsOver25,
                 "IsUnder25" => (isset($matchData->IsUnder25) && $matchData->IsUnder25 != $matchData->IsUnder25)? $matchData->IsUnder25 : $matchData->IsUnder25,
                 "IsSingleBet" => (isset($matchData->IsSingleBet) && $matchData->IsSingleBet != $matchData->IsSingleBet)? $matchData->IsSingleBet : $matchData->IsSingleBet,
                 "BothTeamToScore" => (isset($matchData->BothTeamToScore) && $matchData->BothTeamToScore != $matchData->BothTeamToScore)? $matchData->BothTeamToScore : $matchData->BothTeamToScore,
                 "IsAccumulator" => (isset($matchData->IsAccumulator) && $matchData->IsAccumulator != $matchData->IsAccumulator)? $matchData->IsAccumulator : $matchData->IsAccumulator,
                 "IsSingleCombo" => (isset($matchData->IsSingleCombo) && $matchData->IsSingleCombo != $matchData->IsSingleCombo)? $matchData->IsSingleCombo : $matchData->IsSingleCombo,
                 "IsMonsterBet" => (isset($matchData->IsMonsterBet) && $matchData->IsMonsterBet != $matchData->IsMonsterBet)? $matchData->IsMonsterBet : $matchData->IsMonsterBet,
                 "IsHandicap" => (isset($matchData->IsHandicap) && $matchData->IsHandicap != $matchData->IsHandicap)? $matchData->IsHandicap : $matchData->IsHandicap,
                 "IsHalfTimeBet" => (isset($matchData->IsHalfTimeBet) && $matchData->IsHalfTimeBet != $matchData->IsHalfTimeBet)? $matchData->IsHalfTimeBet : $matchData->IsHalfTimeBet,
                 "IsCorrectScore" => (isset($matchData->IsCorrectScore) && $matchData->IsCorrectScore != $matchData->IsCorrectScore)? $matchData->IsCorrectScore : $matchData->IsCorrectScore,
                 "IsHtFt" => (isset($matchData->IsHtFt) && $matchData->IsHtFt != $matchData->IsHtFt)? $matchData->IsHtFt : $matchData->IsHtFt,
                 "ScoreBothHalf" => (isset($matchData->ScoreBothHalf) && $matchData->ScoreBothHalf != $matchData->ScoreBothHalf)? $matchData->ScoreBothHalf : $matchData->ScoreBothHalf,
                 "WinEitherHalf" => (isset($matchData->WinEitherHalf) && $matchData->WinEitherHalf != $matchData->WinEitherHalf)? $matchData->WinEitherHalf : $matchData->WinEitherHalf,
                 "IsWeekendBet" => (isset($matchData->IsWeekendBet) && $matchData->IsWeekendBet != $matchData->IsWeekendBet)? $matchData->IsWeekendBet : $matchData->IsWeekendBet,
                 "HalfTimeScore" => (isset($matchData->HalfTimeScore) && $matchData->HalfTimeScore != $matchData->HalfTimeScore)? $matchData->HalfTimeScore : $matchData->HalfTimeScore,
                 "FullTimeScore" => (isset($matchData->FullTimeScore) && $matchData->FullTimeScore != $matchData->FullTimeScore)? $matchData->FullTimeScore : $matchData->FullTimeScore,
                 "ModifiedBy" => (isset($matchData->ModifiedBy) && $matchData->ModifiedBy != $matchData->ModifiedBy)? $matchData->ModifiedBy : $matchData->ModifiedBy,
                 "MatchClosed" => (isset($matchData->MatchClosed) && $matchData->MatchClosed != $matchData->MatchClosed)? $matchData->MatchClosed : $matchData->MatchClosed,
                 "WinningTip" => (isset($matchData->WinningTip) && $matchData->WinningTip != $matchData->WinningTip)? $matchData->WinningTip : $matchData->WinningTip,
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
     public function GetByHash(string $MatchHash): stdClass
     {
         try {
             $dbOptions = array(
                 "table_name" => $this->TableName,
                 "targets" => (object) array("IdHash" => $MatchHash)
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
     public function ListDailyBankerTips(): array
     {
         try {
             $dbOptions = array(
                 "table_name" => $this->TableName,
                 "targets" => (object) array("IsDailyBankerTips" => true)
             );
             $dbResult = $this->connectDb->select_data((object) $dbOptions);
             if(!empty($dbResult))
                return $dbResult;
         } catch (\Throwable $th) {
            log_message('error', $th->getMessage());
         }
         return array();
     }
     public function ListUpcomingTips(): array
     {
         try {
             $dbOptions = array(
                 "table_name" => $this->TableName,
                 "targets" => (object) array("IsUpcomingTips" => true)
             );
             $dbResult = $this->connectDb->select_data((object) $dbOptions);
             if(!empty($dbResult))
                return $dbResult;
         } catch (\Throwable $th) {
            log_message('error', $th->getMessage());
         }
         return array();
     }
     public function ListProBetTip( string $Date = ""): array
     {
         try {
            if(empty($Date)){
                $dbOptions = array(
                    "table_name" => $this->TableName,
                    "targets" => (object) array("IsProBetTip" => true)
                );

             }else{
                $dbOptions = array(
                    "table_name" => $this->TableName,
                    "targets" => (object) array("IsProBetTip" => true, "Date(MatchDate)" => $Date)
                );
             }
            
             $dbResult = $this->connectDb->select_data((object) $dbOptions);
             if(!empty($dbResult))
                return $dbResult;
         } catch (\Throwable $th) {
            log_message('error', $th->getMessage());
         }
         return array();
     }
     public function ListRollOverTip( string $Date = "" ): array
     {
         try {
            if(empty($Date)){
                $dbOptions = array(
                    "table_name" => $this->TableName,
                    "targets" => (object) array("IsRollOverTip" => true)
                );

             }else{
                $dbOptions = array(
                    "table_name" => $this->TableName,
                    "targets" => (object) array("IsRollOverTip" => true, "Date(MatchDate)" => $Date)
                );
             }
            
             $dbResult = $this->connectDb->select_data((object) $dbOptions);
             if(!empty($dbResult))
                return $dbResult;
         } catch (\Throwable $th) {
            log_message('error', $th->getMessage());
         }
         return array();
     }
     public function ListExpertZone1(string $Date = ""): array
     {
         try {
            if(empty($Date)){
                $dbOptions = array(
                    "table_name" => $this->TableName,
                    "targets" => (object) array("IsExpertZone1" => true)
                );

             }else{
                $dbOptions = array(
                    "table_name" => $this->TableName,
                    "targets" => (object) array("IsExpertZone1" => true, "Date(MatchDate)" => $Date)
                );
             }
            
             $dbResult = $this->connectDb->select_data((object) $dbOptions);
             if(!empty($dbResult))
                return $dbResult;
         } catch (\Throwable $th) {
            log_message('error', $th->getMessage());
         }
         return array();
     }
     public function ListExpertZone2( string $Date = ""): array
     {
         try {
            if(empty($Date)){
                $dbOptions = array(
                    "table_name" => $this->TableName,
                    "targets" => (object) array("IsExpertZone2" => true)
                );

             }else{
                $dbOptions = array(
                    "table_name" => $this->TableName,
                    "targets" => (object) array("IsExpertZone2" => true, "Date(MatchDate)" => $Date)
                );
             }
            
             $dbResult = $this->connectDb->select_data((object) $dbOptions);
             if(!empty($dbResult))
                return $dbResult;
         } catch (\Throwable $th) {
            log_message('error', $th->getMessage());
         }
         return array();
     }
     public function List2Odds( string $Date = ""): array
     {
         
         try {
            if(empty($Date)){
                $dbOptions = array(
                    "table_name" => $this->TableName,
                    "targets" => (object) array("Is2Odds" => true)
                );

             }else{
                $dbOptions = array(
                    "table_name" => $this->TableName,
                    "targets" => (object) array("Is2Odds" => true, "Date(MatchDate)" => $Date)
                );
             }
            
             $dbResult = $this->connectDb->select_data((object) $dbOptions);
             if(!empty($dbResult))
                return $dbResult;
         } catch (\Throwable $th) {
            log_message('error', $th->getMessage());
         }
         return array();
     }
     public function ListFirst2Odds(string $Date = ""): array
     {
         try {
            if(empty($Date)){
                $dbOptions = array(
                    "table_name" => $this->TableName,
                    "targets" => (object) array("IsFirst2Odds" => true)
                );

             }else{
                $dbOptions = array(
                    "table_name" => $this->TableName,
                    "targets" => (object) array("IsFirst2Odds" => true, "Date(MatchDate)" => $Date)
                );
             }
            
             $dbResult = $this->connectDb->select_data((object) $dbOptions);
             if(!empty($dbResult))
                return $dbResult;
         } catch (\Throwable $th) {
            log_message('error', $th->getMessage());
         }
         return array();
     }
     public function ListSecond2Odds(string $Date = ""): array
     {
         try {
            if(empty($Date)){
                $dbOptions = array(
                    "table_name" => $this->TableName,
                    "targets" => (object) array("IsSecond2Odds" => true)
                );

             }else{
                $dbOptions = array(
                    "table_name" => $this->TableName,
                    "targets" => (object) array("IsSecond2Odds" => true, "Date(MatchDate)" => $Date)
                );
             }
           
             $dbResult = $this->connectDb->select_data((object) $dbOptions);
             if(!empty($dbResult))
                return $dbResult;
         } catch (\Throwable $th) {
            log_message('error', $th->getMessage());
         }
         return array();
     }
     public function List3Odds(string $Date = ""): array
     {
         try {
            if(empty($Date)){
                $dbOptions = array(
                    "table_name" => $this->TableName,
                    "targets" => (object) array("Is3Odds" => true)
                );

             }else{
                $dbOptions = array(
                    "table_name" => $this->TableName,
                    "targets" => (object) array("Is3Odds" => true, "Date(MatchDate)" => $Date)
                );
             }
            
             $dbResult = $this->connectDb->select_data((object) $dbOptions);
             if(!empty($dbResult))
                return $dbResult;
         } catch (\Throwable $th) {
            log_message('error', $th->getMessage());
         }
         return array();
     }
     public function ListFirst3Odds(string $Date = ""): array
     {
         try {
            if(empty($Date)){
                $dbOptions = array(
                    "table_name" => $this->TableName,
                    "targets" => (object) array("IsFirst3Odds" => true)
                );

             }else{
                $dbOptions = array(
                    "table_name" => $this->TableName,
                    "targets" => (object) array("IsFirst3Odds" => true, "Date(MatchDate)" => $Date)
                );
             }
             $dbResult = $this->connectDb->select_data((object) $dbOptions);
             if(!empty($dbResult))
                return $dbResult;
         } catch (\Throwable $th) {
            log_message('error', $th->getMessage());
         }
         return array();
     }
     public function ListSecond3Odds(string $Date = ""): array
     {
         try {
            if(empty($Date)){
                $dbOptions = array(
                    "table_name" => $this->TableName,
                    "targets" => (object) array("IsSecond3Odds" => true)
                );

             }else{
                $dbOptions = array(
                    "table_name" => $this->TableName,
                    "targets" => (object) array("IsSecond3Odds" => true, "Date(MatchDate)" => $Date)
                );
             }
            
             $dbResult = $this->connectDb->select_data((object) $dbOptions);
             if(!empty($dbResult))
                return $dbResult;
         } catch (\Throwable $th) {
            log_message('error', $th->getMessage());
         }
         return array();
     }
     public function List20Odds(string $Date = ""): array
     {
         try {
            if(empty($Date)){
                $dbOptions = array(
                    "table_name" => $this->TableName,
                    "targets" => (object) array("Is20Odds" => true)
                );

             }else{
                $dbOptions = array(
                    "table_name" => $this->TableName,
                    "targets" => (object) array("Is20Odds" => true, "Date(MatchDate)" => $Date)
                );
             }
            
             $dbResult = $this->connectDb->select_data((object) $dbOptions);
             if(!empty($dbResult))
                return $dbResult;
         } catch (\Throwable $th) {
            log_message('error', $th->getMessage());
         }
         return array();
     }
     public function ListDoubleChance(string $Date = ""): array
     {
         try {
             if(empty($Date)){
                $dbOptions = array(
                    "table_name" => $this->TableName,
                    "targets" => (object) array("IsDoubleChance" => true)
                );

             }else{
                $dbOptions = array(
                    "table_name" => $this->TableName,
                    "targets" => (object) array("IsDoubleChance" => true, "Date(MatchDate)" => $Date)
                );
             }
             
             $dbResult = $this->connectDb->select_data((object) $dbOptions);
             if(!empty($dbResult))
                return $dbResult;
         } catch (\Throwable $th) {
            log_message('error', $th->getMessage());
         }
         return array();
     }
     public function ListDraw(): array
     {
         try {
             $dbOptions = array(
                 "table_name" => $this->TableName,
                 "targets" => (object) array("IsDraw" => true)
             );
             $dbResult = $this->connectDb->select_data((object) $dbOptions);
             if(!empty($dbResult))
                return $dbResult;
         } catch (\Throwable $th) {
            log_message('error', $th->getMessage());
         }
         return array();
     }
     public function ListOver15(string $Date = ""): array
     {
         try {
            if(empty($Date)){
                $dbOptions = array(
                    "table_name" => $this->TableName,
                    "targets" => (object) array("IsOver15" => true)
                );

             }else{
                $dbOptions = array(
                    "table_name" => $this->TableName,
                    "targets" => (object) array("IsOver15" => true, "Date(MatchDate)" => $Date)
                );
             }
           
             $dbResult = $this->connectDb->select_data((object) $dbOptions);
             if(!empty($dbResult))
                return $dbResult;
         } catch (\Throwable $th) {
            log_message('error', $th->getMessage());
         }
         return array();
     }
     public function ListOver25( string $Date = ""): array
     {
         try {
            if(empty($Date)){
                $dbOptions = array(
                    "table_name" => $this->TableName,
                    "targets" => (object) array("IsOver25" => true)
                );

             }else{
                $dbOptions = array(
                    "table_name" => $this->TableName,
                    "targets" => (object) array("IsOver25" => true, "Date(MatchDate)" => $Date)
                );
             }
            
             $dbResult = $this->connectDb->select_data((object) $dbOptions);
             if(!empty($dbResult))
                return $dbResult;
         } catch (\Throwable $th) {
            log_message('error', $th->getMessage());
         }
         return array();
     }
     public function ListUnder25(string $Date = ""): array
     {
         try {
            if(empty($Date)){
                $dbOptions = array(
                    "table_name" => $this->TableName,
                    "targets" => (object) array("IsUnder25" => true)
                );

             }else{
                $dbOptions = array(
                    "table_name" => $this->TableName,
                    "targets" => (object) array("IsUnder25" => true, "Date(MatchDate)" => $Date)
                );
             }
            
             $dbResult = $this->connectDb->select_data((object) $dbOptions);
             if(!empty($dbResult))
                return $dbResult;
         } catch (\Throwable $th) {
            log_message('error', $th->getMessage());
         }
         return array();
     }
     public function ListSingleBet(string $Date = ""): array
     {
         try {
            if(empty($Date)){
                $dbOptions = array(
                    "table_name" => $this->TableName,
                    "targets" => (object) array("IsSingleBet" => true)
                );

             }else{
                $dbOptions = array(
                    "table_name" => $this->TableName,
                    "targets" => (object) array("IsSingleBet" => true, "Date(MatchDate)" => $Date)
                );
             }
             
             $dbResult = $this->connectDb->select_data((object) $dbOptions);
             if(!empty($dbResult))
                return $dbResult;
         } catch (\Throwable $th) {
            log_message('error', $th->getMessage());
         }
         return array();
     }
     public function ListBothTeamToScore(string $Date = ""): array
     {
         try {
            if(empty($Date)){
                $dbOptions = array(
                    "table_name" => $this->TableName,
                    "targets" => (object) array("BothTeamToScore" => true)
                );

             }else{
                $dbOptions = array(
                    "table_name" => $this->TableName,
                    "targets" => (object) array("BothTeamToScore" => true, "Date(MatchDate)" => $Date)
                );
             }
             
             $dbResult = $this->connectDb->select_data((object) $dbOptions);
             if(!empty($dbResult))
                return $dbResult;
         } catch (\Throwable $th) {
            log_message('error', $th->getMessage());
         }
         return array();
     }
     public function ListAccumulator(): array
     {
         try {
             $dbOptions = array(
                 "table_name" => $this->TableName,
                 "targets" => (object) array("IsAccumulator" => true)
             );
             $dbResult = $this->connectDb->select_data((object) $dbOptions);
             if(!empty($dbResult))
                return $dbResult;
         } catch (\Throwable $th) {
            log_message('error', $th->getMessage());
         }
         return array();
     }
     public function ListSingleCombo(string $Date = ""): array
     {
         try {
            if(empty($Date)){
                $dbOptions = array(
                    "table_name" => $this->TableName,
                    "targets" => (object) array("IsSingleCombo" => true)
                );

             }else{
                $dbOptions = array(
                    "table_name" => $this->TableName,
                    "targets" => (object) array("IsSingleCombo" => true, "Date(MatchDate)" => $Date)
                );
             }
            
             $dbResult = $this->connectDb->select_data((object) $dbOptions);
             if(!empty($dbResult))
                return $dbResult;
         } catch (\Throwable $th) {
            log_message('error', $th->getMessage());
         }
         return array();
     }
     public function ListMonsterBet(string $Date = ""): array
     {
         try {
            if(empty($Date)){
                $dbOptions = array(
                    "table_name" => $this->TableName,
                    "targets" => (object) array("IsMonsterBet" => true)
                );

             }else{
                $dbOptions = array(
                    "table_name" => $this->TableName,
                    "targets" => (object) array("IsMonsterBet" => true, "Date(MatchDate)" => $Date)
                );
             }
            
             $dbResult = $this->connectDb->select_data((object) $dbOptions);
             if(!empty($dbResult))
                return $dbResult;
         } catch (\Throwable $th) {
            log_message('error', $th->getMessage());
         }
         return array();
     }
     public function ListHandicap(string $Date = ""): array
     {
         try {
            if(empty($Date)){
                $dbOptions = array(
                    "table_name" => $this->TableName,
                    "targets" => (object) array("IsHandicap" => true)
                );

             }else{
                $dbOptions = array(
                    "table_name" => $this->TableName,
                    "targets" => (object) array("IsHandicap" => true, "Date(MatchDate)" => $Date)
                );
             }
            
             $dbResult = $this->connectDb->select_data((object) $dbOptions);
             if(!empty($dbResult))
                return $dbResult;
         } catch (\Throwable $th) {
            log_message('error', $th->getMessage());
         }
         return array();
     }
     public function ListHalfTimeBet(string $Date = ""): array
     {
         try {
            if(empty($Date)){
                $dbOptions = array(
                    "table_name" => $this->TableName,
                    "targets" => (object) array("IsHalfTimeBet" => true)
                );

             }else{
                $dbOptions = array(
                    "table_name" => $this->TableName,
                    "targets" => (object) array("IsHalfTimeBet" => true, "Date(MatchDate)" => $Date)
                );
             }
             
             $dbResult = $this->connectDb->select_data((object) $dbOptions);
             if(!empty($dbResult))
                return $dbResult;
         } catch (\Throwable $th) {
            log_message('error', $th->getMessage());
         }
         return array();
     }
     public function ListCorrectScore(string $Date = ""): array
     {
         try {
            if(empty($Date)){
                $dbOptions = array(
                    "table_name" => $this->TableName,
                    "targets" => (object) array("IsCorrectScore" => true)
                );

             }else{
                $dbOptions = array(
                    "table_name" => $this->TableName,
                    "targets" => (object) array("IsCorrectScore" => true, "Date(MatchDate)" => $Date)
                );
             }
            
             $dbResult = $this->connectDb->select_data((object) $dbOptions);
             if(!empty($dbResult))
                return $dbResult;
         } catch (\Throwable $th) {
            log_message('error', $th->getMessage());
         }
         return array();
     }
     public function ListHtFt(string $Date = ""): array
     {
         try {
            if(empty($Date)){
                $dbOptions = array(
                    "table_name" => $this->TableName,
                    "targets" => (object) array("IsHtFt" => true)
                );
             }else{
                $dbOptions = array(
                    "table_name" => $this->TableName,
                    "targets" => (object) array("IsHtFt" => true, "Date(MatchDate)" => $Date)
                );
             }
            
             $dbResult = $this->connectDb->select_data((object) $dbOptions);
             if(!empty($dbResult))
                return $dbResult;
         } catch (\Throwable $th) {
            log_message('error', $th->getMessage());
         }
         return array();
     }
     public function ListScoreBothHalf(string $Date = ""): array
     {
         try {
            if(empty($Date)){
                $dbOptions = array(
                    "table_name" => $this->TableName,
                    "targets" => (object) array("ScoreBothHalf" => true)
                );

             }else{
                $dbOptions = array(
                    "table_name" => $this->TableName,
                    "targets" => (object) array("ScoreBothHalf" => true, "Date(MatchDate)" => $Date)
                );
             }
             
             $dbResult = $this->connectDb->select_data((object) $dbOptions);
             if(!empty($dbResult))
                return $dbResult;
         } catch (\Throwable $th) {
            log_message('error', $th->getMessage());
         }
         return array();
     }
     public function ListWinEitherHalf(string $Date = ""): array
     {
         try {
            if(empty($Date)){
                $dbOptions = array(
                    "table_name" => $this->TableName,
                    "targets" => (object) array("WinEitherHalf" => true)
                );

             }else{
                $dbOptions = array(
                    "table_name" => $this->TableName,
                    "targets" => (object) array("WinEitherHalf" => true, "Date(MatchDate)" => $Date)
                );
             }
             
             $dbResult = $this->connectDb->select_data((object) $dbOptions);
             if(!empty($dbResult))
                return $dbResult;
         } catch (\Throwable $th) {
            log_message('error', $th->getMessage());
         }
         return array();
     }
     public function ListWeekendBet(): array
     {
         try {
             $dbOptions = array(
                 "table_name" => $this->TableName,
                 "targets" => (object) array("IsWeekendBet" => true)
             );
             $dbResult = $this->connectDb->select_data((object) $dbOptions);
             if(!empty($dbResult))
                return $dbResult;
         } catch (\Throwable $th) {
            log_message('error', $th->getMessage());
         }
         return array();
     }
     public function ListDisctintLeague(string $category = ""): array
     {
        try {
            if($category == "daily"){
                $dbOptions = array(
                    "table_name" => $this->TableName,
                    "single_column" => "LeagueId",
                    "is_distinct" => 1,
                    "targets" => array("DATE(MatchDate)" => $this->utilities->DbDateFormat())
                );
            }elseif ($category == "rollover") {
                $dbOptions = array(
                    "table_name" => $this->TableName,
                    "single_column" => "LeagueId",
                    "is_distinct" => 1,
                    "targets" => array("IsRollOverTip" => true)
                );
            }
            elseif ($category == "weekend") {
                $dbOptions = array(
                    "table_name" => $this->TableName,
                    "single_column" => "LeagueId",
                    "is_distinct" => 1,
                    "targets" => array("IsWeekendBet" => true)
                );
            }else {
                $dbOptions = array(
                    "table_name" => $this->TableName,
                    "single_column" => "LeagueId",
                    "is_distinct" => 1
                );
            }
            
            $dbResult = $this->connectDb->select_data((object) $dbOptions);
            if(!empty($dbResult))
               return $dbResult;
        } catch (\Throwable $th) {
           log_message('error', $th->getMessage());
        }
        return array();
        
     }
     public function ListByLeague( int $leagueId): array
     {
         try {
             $dbOptions = array(
                 "table_name" => $this->TableName,
                 "targets" => (object) array("LeagueId" => $leagueId)
             );
             $dbResult = $this->connectDb->select_data((object) $dbOptions);
             if(!empty($dbResult))
                return $dbResult;
         } catch (\Throwable $th) {
            log_message('error', $th->getMessage());
         }
         return array();
     }
    //  public function CloseMatch(int $matchId): int
    //  {
        
    //  }
     
     
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

/* End of file Matches.php */


?>
<?php $data["PageTitle"] = "Add Match - 90minsbet"; $data["PresentMenu"] = "matches"; ?>
<?php $this->load->view("Admin/Partials/Head", $data); ?>
<?php $this->load->view("Admin/Partials/Navigation"); ?>
<?php $Leagues = $this->leagues->ListAll(); ?>

<div class="az-content-body">
    <form autocomplete="off" id="MatchForm" class="needs-validation was-validated">
        <section class="general-section">
            <div class="form-title">
                <h4>Match General Details</h4>
                <hr class="mg-t-10 mg-b-30">
            </div>

            <div class="row row-sm">
                <div class="col-lg-4">
                    <div class="form-group has-success mg-b-0">
                        <label class="form-label mg-b-0">Match Name</label>
                        <input class="form-control" name="MatchName"placeholder="Enter the match name" required type="text" value ="<?php echo ($MatchData->MatchName)??""; ?>">
                    </div><!-- form-group -->
                </div><!-- col -->
                <div class="col-lg-4">
                    <div class="form-group has-success mg-b-0">
                        <label class="form-label mg-b-0">Match Category</label>
                        <select class="form-control select2" required name="MatchCategory">
                            <option label="Choose one"></option>
                            <option selected value="90MinBet">90MinBet</option>
                        </select>
                    </div><!-- form-group -->
                </div><!-- col -->
                <div class="col-lg-4">
                    <div class="form-group has-success mg-b-0">
                        <label class="form-label mg-b-0">League</label>
                        <select class="form-control select2" required name="LeagueId">
                            <option label="Choose one"></option>
                            <?php foreach ($Leagues as $league ) { ?>
                                <?php if ($league->Id == $MatchData->LeagueId ) { ?>
                                    <option selected value="<?php echo $league->Id ?>"><?php echo $league->League; ?></option>
                                <?php }else{ ?>
                                <option value="<?php echo $league->Id ?>"><?php echo $league->League; ?></option>

                                <?php } ?>
                           <?php } ?>
                        </select>
                    </div><!-- form-group -->
                </div><!-- col -->
                <div class="col-lg-4 mg-t-20">
                    <label class="form-label mg-b-0">Match Date</label>
                    <div class="input-group">
                        <div class="input-group-prepend">
                            <div class="input-group-text">
                                <i class="typcn typcn-calendar-outline tx-24 lh--9 op-6"></i>
                            </div>
                        </div>
                        <input name="MatchDate" required type="text" class="form-control fc-datepicker" value ="<?php echo ($MatchData->MatchDate)??""; ?>" placeholder="MM/DD/YYYY">
                    </div>
                </div><!-- col-4 -->
                <div class="col-lg-4 mg-t-20">
                    <label class="form-label mg-b-0">Full Time Tips</label>
                    <input name="FullTimeTips" value ="<?php echo ($MatchData->FullTimeTips)??""; ?>" class="form-control" type="text">
                </div><!-- col-4 -->
                <div class="col-lg-4 mg-t-20">
                    <label class="form-label mg-b-0">Match Odds</label>
                    <input name="MatchOdds" value ="<?php echo ($MatchData->MatchOdds)??""; ?>" class="form-control" type="text">
                </div><!-- col-4 -->
                <div class="col-lg-5 mg-t-20">
                    <div class="row">
                        <div class="col-md-4">
                            <label class="form-label mg-b-10">Free Pros Pick</label>
                            <div class="az-toggle-group-demo">
                                <div id="IsFreepros" class="az-toggle az-toggle-success <?php echo ($MatchData->IsFreepros == 1)? 'on': ''; ?>"><span></span></div>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <label class="form-label mg-b-10">Banker Tip of the Day</label>
                            <div class="az-toggle-group-demo">
                                <div id="IsDailyBankerTips" class="az-toggle az-toggle-success  <?php echo ($MatchData->IsDailyBankerTips == 1)? 'on': ''; ?>"><span></span></div>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <label class="form-label mg-b-10">Upcoming Tip</label>
                            <div class="az-toggle-group-demo">
                                <div id="IsUpcomingTips" class="az-toggle az-toggle-success <?php echo ($MatchData->IsUpcomingTips == 1)? 'on': ''; ?>"><span></span></div>
                            </div>
                        </div>
                    </div>

                </div><!-- col-8 -->
                <div class="col-lg-2 mg-t-20">
                    <label class="form-label mg-b-0">Alternate Tips</label>
                    <input name="AlternateTips" value ="<?php echo ($MatchData->AlternateTips)??""; ?>" class="form-control" type="text">
                </div><!-- col-3 -->
                <div class="col-lg-2 mg-t-20">
                    <label class="form-label mg-b-0">Confidence Level</label>
                    <input name="ConfidenceLevel" value ="<?php echo ($MatchData->ConfidenceLevel)??""; ?>" class="form-control" type="text">
                </div><!-- col-3 -->
                <div class="col-lg-2 mg-t-20">
                    <label class="form-label mg-b-0">Half Time Score</label>
                    <input name="HalfTimeScore" value ="<?php echo ($MatchData->HalfTimeScore)??""; ?>" class="form-control" type="text">
                </div><!-- col-3 -->
                <div class="col-lg-2 mg-t-20">
                    <label class="form-label mg-b-0">Full Time Score</label>
                    <input name="FullTimeScore" value ="<?php echo ($MatchData->FullTimeScore)??""; ?>" class="form-control" type="text">
                </div><!-- col-3 -->
    

            </div><!-- row -->


        </section>
        <div class="row">
            <div class="col-md-6">
                <section class="sep-section probet-section mg-t-30">
                    <div class="form-title">
                        <h4>Pro Bet</h4>
                        <hr class="mg-t-10 mg-b-30">
                        <div class="bet-decision mg-b-30">
                            <label class="form-label mg-b-10">Pro Bet Tip?</label>
                            <div class="az-toggle-group-demo">
                                <div id="IsProBetTip" data-id="ProBet" class="az-toggle az-toggle-success  <?php echo ($MatchData->IsProBetTip == 1)? 'on': ''; ?>"><span></span></div>
                            </div>

                        </div>
                    </div>

                    <div id="ProBet" class="row row-sm" style="display:none;">
                        <div class="col-lg-6">
                            <div class="form-group has-success mg-b-0">
                                <label class="form-label mg-b-0">Pro Bet</label>
                                <input value ="<?php echo ($MatchData->ProBet)??""; ?>" name="ProBet" class="form-control" type="text">
                            </div><!-- form-group -->
                        </div><!-- col -->
                        <div class="col-lg-6">
                            <div class="form-group has-success mg-b-0">
                                <label class="form-label mg-b-0">Pro Bet Odds</label>
                                <input value ="<?php echo ($MatchData->ProBetOdd)??""; ?>" name="ProBetOdd" class="form-control" type="text">
                            </div><!-- form-group -->
                        </div><!-- col -->


                    </div><!-- row -->


                </section>

            </div>
            <div class="col-md-6">
                <section class="sep-section rolloverbet-section mg-t-30">
                    <div class="form-title">
                        <h4>Rollover Bet</h4>
                        <hr class="mg-t-10 mg-b-30">
                        <div class="bet-decision mg-b-30">
                            <label class="form-label mg-b-10">Rollover Tip?</label>
                            <div class="az-toggle-group-demo">
                                <div id="IsRollOverTip" data-id="RolloverBet" class="az-toggle az-toggle-success  <?php echo ($MatchData->IsRollOverTip == 1)? 'on': ''; ?>"><span></span></div>
                            </div>

                        </div>
                    </div>

                    <div id="RolloverBet" class="row row-sm" style="display:none;">
                        <div class="col-lg-6">
                            <div class="form-group has-success mg-b-0">
                                <label class="form-label mg-b-0">Rollover Tip</label>
                                <input value ="<?php echo ($MatchData->RollOverTip)??""; ?>" name="RollOverTip" class="form-control" type="text">
                            </div><!-- form-group -->
                        </div><!-- col -->
                        <div class="col-lg-6">
                            <div class="form-group has-success mg-b-0">
                                <label class="form-label mg-b-0">Total Rollover Tip Odds</label>
                                <input value ="<?php echo ($MatchData->TotalRollOverOdd)??""; ?>" name="TotalRollOverOdd" class="form-control" type="text">
                            </div><!-- form-group -->
                        </div><!-- col -->


                    </div><!-- row -->


                </section>

            </div>

        </div>
        <section class="expert-zone-1-section mg-t-30">
            <div class="form-title">
                <h4>Expert Zone 1</h4>
                <hr class="mg-t-10 mg-b-30">
                <div class="bet-decision mg-b-30">
                    <label class="form-label mg-b-10">Expert Zone 1?</label>
                    <div class="az-toggle-group-demo">
                        <div id="IsExpertZone1" data-id="ExpertZone1" class="az-toggle az-toggle-success  <?php echo ($MatchData->IsExpertZone1 == 1)? 'on': ''; ?>"><span></span></div>
                    </div>

                </div>
            </div>

            <div id="ExpertZone1" class="row row-sm" style="display:none;">
                <div class="col-lg-4">
                    <div class="form-group has-success mg-b-0">
                        <label class="form-label mg-b-0">Experts Zone 1 Tips</label>
                        <input value ="<?php echo ($MatchData->ExpertZone1Tips)??""; ?>" name="ExpertZone1Tips" class="form-control" type="text">
                    </div><!-- form-group -->
                </div><!-- col -->
                <div class="col-lg-4">
                    <div class="form-group has-success mg-b-0">
                        <label class="form-label mg-b-0">Experts Zone 1 Odds</label>
                        <input value ="<?php echo ($MatchData->ExpertZone1Odds)??""; ?>" name="ExpertZone1Odds" class="form-control" type="text">
                    </div><!-- form-group -->
                </div><!-- col -->
                <div class="col-lg-4">
                    <div class="form-group has-success mg-b-0">
                        <label class="form-label mg-b-0">Experts Zone 1 Confidence Level</label>
                        <input value ="<?php echo ($MatchData->ExpertZone1ConfidenceLevel)??""; ?>" name="ExpertZone1ConfidenceLevel" class="form-control" type="text">
                    </div><!-- form-group -->
                </div><!-- col -->


            </div><!-- row -->


        </section>
        <section class="expert-zone-2-section mg-t-30">
            <div class="form-title">
                <h4>Expert Zone 2</h4>
                <hr class="mg-t-10 mg-b-30">
                <div class="bet-decision mg-b-30">
                    <label class="form-label mg-b-10">Expert Zone 2?</label>
                    <div class="az-toggle-group-demo">
                        <div id="IsExpertZone2" data-id="ExpertZone2" class="az-toggle az-toggle-success  <?php echo ($MatchData->IsExpertZone2 == 1)? 'on': ''; ?>"><span></span></div>
                    </div>

                </div>
            </div>

            <div id="ExpertZone2" class="row row-sm" style="display:none;">
                <div class="col-lg-4">
                    <div class="form-group has-success mg-b-0">
                        <label class="form-label mg-b-0">Experts Zone 1 Tips</label>
                        <input value ="<?php echo ($MatchData->ExpertZone2Tips)??""; ?>" name="ExpertZone2Tips" class="form-control" type="text">
                    </div><!-- form-group -->
                </div><!-- col -->
                <div class="col-lg-4">
                    <div class="form-group has-success mg-b-0">
                        <label class="form-label mg-b-0">Experts Zone 1 Odds</label>
                        <input value ="<?php echo ($MatchData->ExpertZone2Odds)??""; ?>" name="ExpertZone2Odds" class="form-control" type="text">
                    </div><!-- form-group -->
                </div><!-- col -->
                <div class="col-lg-4">
                    <div class="form-group has-success mg-b-0">
                        <label class="form-label mg-b-0">Experts Zone 2 Confidence Level</label>
                        <input value ="<?php echo ($MatchData->ExpertZone2ConfidenceLevel)??""; ?>" name="ExpertZone2ConfidenceLevel" class="form-control" type="text">
                    </div><!-- form-group -->
                </div><!-- col -->


            </div><!-- row -->


        </section>
        <section class="sep-section odds-2-section mg-t-30">
            <div class="form-title">
                <h4>2 Odds</h4>
                <hr class="mg-t-10 mg-b-30">
                <div class="bet-decision mg-b-30">
                    <label class="form-label mg-b-10">2 Odds?</label>
                    <div class="az-toggle-group-demo">
                        <div id="Is2Odds" data-id="Odd2" class="az-toggle az-toggle-success <?php echo ($MatchData->Is2Odds == 1)? 'on': ''; ?>"><span></span></div>
                    </div>

                </div>
            </div>

            <div id="Odd2" class="row row-sm" style="display:none;">
                <div class="col-lg-4">
                    <div class="form-group has-success mg-b-0">
                        <label class="form-label mg-b-0">2 Odds Tip</label>
                        <input name="Tips2Odds" value ="<?php echo ($MatchData->Tips2Odds)??""; ?>" class="form-control" type="text">
                    </div><!-- form-group -->
                </div><!-- col -->
                <div class="col-lg-8" style="margin-top: -115px;">
                    <div class="row">
                        <div class="col-md-6">
                            <section class="probet-section mg-t-30">
                                <div class="form-title">
                                    <div class="bet-decision mg-b-30">
                                        <label class="form-label mg-b-10">First Set 2 Odds?</label>
                                        <div class="az-toggle-group-demo">
                                            <div id="IsFirst2Odds"  data-id="Odds2First" class="az-toggle az-toggle-success <?php echo ($MatchData->IsFirst2Odds == 1)? 'on': ''; ?> "><span></span>
                                            </div>
                                        </div>

                                    </div>
                                </div>

                                <div id="Odds2First" class="row row-sm" style="display:none;">
                                    <div class="col-lg-12">
                                        <div class="form-group has-success mg-b-0">
                                            <label class="form-label mg-b-0">Total 2 Odds First Set</label>
                                            <input value ="<?php echo ($MatchData->TotalFirst2OddsTips)??""; ?>" name="TotalFirst2OddsTips" class="form-control" type="text">
                                        </div><!-- form-group -->
                                    </div><!-- col -->

                                </div><!-- row -->


                            </section>

                        </div>
                        <div class="col-md-6">
                            <section class="probet-section mg-t-30">
                                <div class="form-title">
                                    <div class="bet-decision mg-b-30">
                                        <label class="form-label mg-b-10">Second Set 2 Odds?</label>
                                        <div class="az-toggle-group-demo">
                                            <div id="IsSecond2Odds" data-id="Odds2Second" class="az-toggle az-toggle-success <?php echo ($MatchData->IsSecond2Odds == 1)? 'on': ''; ?>"><span></span>
                                            </div>
                                        </div>

                                    </div>
                                </div>

                                <div id="Odds2Second" class="row row-sm" style="display:none;">
                                    <div class="col-lg-12">
                                        <div class="form-group has-success mg-b-0">
                                            <label class="form-label mg-b-0">Total 2 Odds Second Set</label>
                                            <input value ="<?php echo ($MatchData->TotalSecond2OddsTips)??""; ?>" name="TotalSecond2OddsTips" class="form-control" type="text">
                                        </div><!-- form-group -->
                                    </div><!-- col -->

                                </div><!-- row -->


                            </section>

                        </div>


                    </div>

                </div>




            </div><!-- row -->


        </section>
        <section class="sep-section odds-3-section mg-t-30">
            <div class="form-title">
                <h4>3 Odds</h4>
                <hr class="mg-t-10 mg-b-30">
                <div class="bet-decision mg-b-30">
                    <label class="form-label mg-b-10">3 Odds?</label>
                    <div class="az-toggle-group-demo">
                        <div id="Is3Odds" data-id="Odd3" class="az-toggle az-toggle-success  <?php echo ($MatchData->Is3Odds == 1)? 'on': ''; ?>"><span></span></div>
                    </div>

                </div>
            </div>

            <div id="Odd3" class="row row-sm" style="display:none;">
                <div class="col-lg-4">
                    <div class="form-group has-success mg-b-0">
                        <label class="form-label mg-b-0">3 Odds Tip</label>
                        <input name="Tips3Odds" value ="<?php echo ($MatchData->Tips3Odds)??""; ?>" class="form-control" type="text">
                    </div><!-- form-group -->
                </div><!-- col -->
                <div class="col-lg-8" style="margin-top: -115px;">
                    <div class="row">
                        <div class="col-md-6">
                            <section class="probet-section mg-t-30">
                                <div class="form-title">
                                    <div class="bet-decision mg-b-30">
                                        <label class="form-label mg-b-10">First Set 3 Odds?</label>
                                        <div class="az-toggle-group-demo">
                                            <div id="IsFirst3Odds" data-id="Odds3First" class="az-toggle az-toggle-success  <?php echo ($MatchData->IsFirst3Odds == 1)? 'on': ''; ?>"><span></span>
                                            </div>
                                        </div>

                                    </div>
                                </div>

                                <div id="Odds3First" class="row row-sm" style="display:none;">
                                    <div class="col-lg-12">
                                        <div class="form-group has-success mg-b-0">
                                            <label class="form-label mg-b-0">Total 3 Odds First Set</label>
                                            <input  value ="<?php echo ($MatchData->TotalFirst3OddsTips)??""; ?>" name="TotalFirst3OddsTips" class="form-control" type="text">
                                        </div><!-- form-group -->
                                    </div><!-- col -->

                                </div><!-- row -->


                            </section>

                        </div>
                        <div class="col-md-6">
                            <section class="probet-section mg-t-30">
                                <div class="form-title">
                                    <div class="bet-decision mg-b-30">
                                        <label class="form-label mg-b-10">Second Set 3 Odds?</label>
                                        <div class="az-toggle-group-demo">
                                            <div id="IsSecond3Odds" data-id="Odds3Second" class="az-toggle az-toggle-success  <?php echo ($MatchData->IsSecond3Odds == 1)? 'on': ''; ?>"><span></span>
                                            </div>
                                        </div>

                                    </div>
                                </div>

                                <div id="Odds3Second" class="row row-sm" style="display:none;">
                                    <div class="col-lg-12">
                                        <div class="form-group has-success mg-b-0">
                                            <label class="form-label mg-b-0">Total 3 Odds Second Set</label>
                                            <input value ="<?php echo ($MatchData->TotalSecond3OddsTips)??""; ?>" name="TotalSecond3OddsTips" class="form-control" type="text">
                                        </div><!-- form-group -->
                                    </div><!-- col -->

                                </div><!-- row -->


                            </section>

                        </div>


                    </div>

                </div>




            </div><!-- row -->


        </section>
        <section class="Odds-20-section mg-t-30">
            <div class="form-title">
                <h4>20 Odds</h4>
                <hr class="mg-t-10 mg-b-30">
                <div class="bet-decision mg-b-30">
                    <label class="form-label mg-b-10">20 Odds?</label>
                    <div class="az-toggle-group-demo">
                        <div id="Is20Odds" data-id="Odds20" class="az-toggle az-toggle-success <?php echo ($MatchData->Is20Odds == 1)? 'on': ''; ?>"><span></span></div>
                    </div>
        
                </div>
            </div>
        
            <div id="Odds20" class="row row-sm" style="display:none;">
                <div class="col-lg-4">
                    <div class="form-group has-success mg-b-0">
                        <label class="form-label mg-b-0">20 Odds Tips</label>
                        <input value ="<?php echo ($MatchData->Tips20Odds)??""; ?>" name="Tips20Odds" class="form-control" type="text">
                    </div><!-- form-group -->
                </div><!-- col -->
                <div class="col-lg-4">
                    <div class="form-group has-success mg-b-0">
                        <label class="form-label mg-b-0">20 Odds Single</label>
                        <input value ="<?php echo ($MatchData->Single20Odds)??""; ?>" name="Single20Odds" class="form-control" type="text">
                    </div><!-- form-group -->
                </div><!-- col -->
                <div class="col-lg-4">
                    <div class="form-group has-success mg-b-0">
                        <label class="form-label mg-b-0">Total 20 Odds</label>
                        <input name="Total20Odds" value ="<?php echo ($MatchData->Total20Odds)??""; ?>" class="form-control" type="text">
                    </div><!-- form-group -->
                </div><!-- col -->
        
        
            </div><!-- row -->
        
        
        </section>
        <div class="row">
            <div class="col-md-6">
                <section class="sep-section double-chance-section mg-t-30">
                    <div class="form-title">
                        <h4>Double Chance</h4>
                        <hr class="mg-t-10 mg-b-30">
                        <div class="bet-decision mg-b-30">
                            <label class="form-label mg-b-10">Double Chance?</label>
                            <div class="az-toggle-group-demo">
                                <div id="IsDoubleChance" data-id="DoubleChance" class="az-toggle az-toggle-success  <?php echo ($MatchData->IsDoubleChance == 1)? 'on': ''; ?>"><span></span></div>
                            </div>
        
                        </div>
                    </div>
        
                    <div id="DoubleChance" class="row row-sm" style="display:none;">
                        <div class="col-lg-6">
                            <div class="form-group has-success mg-b-0">
                                <label  class="form-label mg-b-0">Double Chance Tip</label>
                                <input value ="<?php echo ($MatchData->DoubleChanceTips)??""; ?>" name="DoubleChanceTips" class="form-control" type="text">
                            </div><!-- form-group -->
                        </div><!-- col -->
                    </div><!-- row -->
        
        
                </section>
        
            </div>
            <div class="col-md-6">
                <section class="sep-section single-bet-section mg-t-30">
                    <div class="form-title">
                        <h4>Single Bet</h4>
                        <hr class="mg-t-10 mg-b-30">
                        <div class="bet-decision mg-b-30">
                            <label class="form-label mg-b-10">Single Bet?</label>
                            <div class="az-toggle-group-demo">
                                <div id="IsSingleBet" data-id="SingleBet" class="az-toggle az-toggle-success <?php echo ($MatchData->IsSingleBet == 1)? 'on': ''; ?>"><span></span></div>
                            </div>
        
                        </div>
                    </div>
        
                    <div id="SingleBet" class="row row-sm" style="display:none;">
                        <div class="col-lg-6">
                            <div class="form-group has-success mg-b-0">
                                <label class="form-label mg-b-0">Single Bet Tip</label>
                                <input value ="<?php echo ($MatchData->SingleBetTip)??""; ?>" name="SingleBetTip" class="form-control" type="text">
                            </div><!-- form-group -->
                        </div><!-- col -->
                        <div class="col-lg-6">
                            <div class="form-group has-success mg-b-0">
                                <label class="form-label mg-b-0">Single Bet Odd</label>
                                <input value ="<?php echo ($MatchData->SingleBetOdd)??""; ?>" name="SingleBetOdd" class="form-control" type="text">
                            </div><!-- form-group -->
                        </div><!-- col -->
        
        
                    </div><!-- row -->
        
        
                </section>
        
            </div>
        
        </div>
        <div class="row">
            <div class="col-md-6">
                <section class="sep-section single-combo-section mg-t-30">
                    <div class="form-title">
                        <h4>Single Combo</h4>
                        <hr class="mg-t-10 mg-b-30">
                        <div class="bet-decision mg-b-30">
                            <label class="form-label mg-b-10">Single Combo?</label>
                            <div class="az-toggle-group-demo">
                                <div id="IsSingleCombo" data-id="SingleCombo" class="az-toggle az-toggle-success <?php echo ($MatchData->IsSingleCombo == 1)? 'on': ''; ?>"><span></span></div>
                            </div>
        
                        </div>
                    </div>
        
                    <div id="SingleCombo" class="row row-sm" style="display:none;">
                        <div class="col-lg-6">
                            <div class="form-group has-success mg-b-0">
                                <label class="form-label mg-b-0">Single Combo Tip</label>
                                <input value ="<?php echo ($MatchData->SingleComboTip)??""; ?>" name="SingleComboTip" class="form-control" type="text">
                            </div><!-- form-group -->
                        </div><!-- col -->
                    </div><!-- row -->
        
        
                </section>
        
            </div>
            <div class="col-md-6">
                <section class="sep-section monster-bet-section mg-t-30">
                    <div class="form-title">
                        <h4>Monster Bet</h4>
                        <hr class="mg-t-10 mg-b-30">
                        <div class="bet-decision mg-b-30">
                            <label class="form-label mg-b-10">Monster Bet?</label>
                            <div class="az-toggle-group-demo">
                                <div id="IsMonsterBet" data-id="MonsterBet" class="az-toggle az-toggle-success  <?php echo ($MatchData->IsMonsterBet == 1)? 'on': ''; ?>"><span></span></div>
                            </div>
        
                        </div>
                    </div>
        
                    <div id="MonsterBet" class="row row-sm" style="display:none;">
                        <div class="col-lg-6">
                            <div class="form-group has-success mg-b-0">
                                <label class="form-label mg-b-0">Monster Bet Tip</label>
                                <input value ="<?php echo ($MatchData->MonsterBetTip)??""; ?>" name="MonsterBetTip" class="form-control" type="text">
                            </div><!-- form-group -->
                        </div><!-- col -->
        
        
        
                    </div><!-- row -->
        
        
                </section>
        
            </div>
        
        </div>
        <div class="row">
            <div class="col-md-6">
                <section class="sep-section handicap-section mg-t-30">
                    <div class="form-title">
                        <h4>Handicap</h4>
                        <hr class="mg-t-10 mg-b-30">
                        <div class="bet-decision mg-b-30">
                            <label class="form-label mg-b-10">Handicap?</label>
                            <div class="az-toggle-group-demo">
                                <div id="IsHandicap" data-id="Handicap" class="az-toggle az-toggle-success  <?php echo ($MatchData->IsHandicap == 1)? 'on': ''; ?>"><span></span></div>
                            </div>
        
                        </div>
                    </div>
        
                    <div id="Handicap" class="row row-sm" style="display:none;">
                        <div class="col-lg-6">
                            <div class="form-group has-success mg-b-0">
                                <label class="form-label mg-b-0">Handicap Tip</label>
                                <input  value ="<?php echo ($MatchData->HandicapTip)??""; ?>" name="HandicapTip" class="form-control" type="text">
                            </div><!-- form-group -->
                        </div><!-- col -->
                    </div><!-- row -->
        
        
                </section>
        
            </div>
            <div class="col-md-6">
                <section class="sep-section half-time-bet-section mg-t-30">
                    <div class="form-title">
                        <h4>Half Time Bet</h4>
                        <hr class="mg-t-10 mg-b-30">
                        <div class="bet-decision mg-b-30">
                            <label class="form-label mg-b-10">Half Time Bet?</label>
                            <div class="az-toggle-group-demo">
                                <div id="IsHalfTimeBet" data-id="HalfTimeBet" class="az-toggle az-toggle-success  <?php echo ($MatchData->IsHalfTimeBet == 1)? 'on': ''; ?>"><span></span></div>
                            </div>
        
                        </div>
                    </div>
        
                    <div id="HalfTimeBet" class="row row-sm" style="display:none;">
                        <div class="col-lg-6">
                            <div class="form-group has-success mg-b-0">
                                <label class="form-label mg-b-0">Half Time Tip</label>
                                <input  value ="<?php echo ($MatchData->HalfTimeTip)??""; ?>" name="HalfTimeTip" class="form-control" type="text">
                            </div><!-- form-group -->
                        </div><!-- col -->
        
        
        
                    </div><!-- row -->
        
        
                </section>
        
            </div>
        
        </div>
        <div class="row">
            <div class="col-md-6">
                <section class="sep-section correct-score-section mg-t-30">
                    <div class="form-title">
                        <h4>Correct Score</h4>
                        <hr class="mg-t-10 mg-b-30">
                        <div class="bet-decision mg-b-30">
                            <label class="form-label mg-b-10">Correct Score?</label>
                            <div class="az-toggle-group-demo">
                                <div id="IsCorrectScore" data-id="CorrectScore" class="az-toggle az-toggle-success <?php echo ($MatchData->IsCorrectScore == 1)? 'on': ''; ?>"><span></span></div>
                            </div>
        
                        </div>
                    </div>
        
                    <div id="CorrectScore" class="row row-sm" style="display:none;">
                        <div class="col-lg-6">
                            <div class="form-group has-success mg-b-0">
                                <label  class="form-label mg-b-0">Correct Score Tip</label>
                                <input  value ="<?php echo ($MatchData->CorrectScoreTip)??""; ?>" name="CorrectScoreTip" class="form-control" type="text">
                            </div><!-- form-group -->
                        </div><!-- col -->
                    </div><!-- row -->
        
        
                </section>
        
            </div>
            <div class="col-md-6">
                <section class="sep-section ht-ft-section mg-t-30">
                    <div class="form-title">
                        <h4>HT/FT</h4>
                        <hr class="mg-t-10 mg-b-30">
                        <div class="bet-decision mg-b-30">
                            <label class="form-label mg-b-10">HT/FT?</label>
                            <div class="az-toggle-group-demo">
                                <div id="IsHtFt" data-id="HtftBet" class="az-toggle az-toggle-success  <?php echo ($MatchData->IsHtFt == 1)? 'on': ''; ?>"><span></span></div>
                            </div>
        
                        </div>
                    </div>
        
                    <div id="HtftBet" class="row row-sm" style="display:none;">
                        <div class="col-lg-6">
                            <div class="form-group has-success mg-b-0">
                                <label class="form-label mg-b-0">HT/FT Tip</label>
                                <input  value ="<?php echo ($MatchData->HtFtTip)??""; ?>" name="HtFtTip" class="form-control" type="text">
                            </div><!-- form-group -->
                        </div><!-- col -->
        
        
        
                    </div><!-- row -->
        
        
                </section>
        
            </div>
        
        </div>
        <div class="row">
            <div class="col-md-6">
                <section class="sep-section score-both-halves-section mg-t-30">
                    <div class="form-title">
                        <h4>Score Both Halves</h4>
                        <hr class="mg-t-10 mg-b-30">
                        <div class="bet-decision mg-b-30">
                            <label class="form-label mg-b-10">Score Both Halves?</label>
                            <div class="az-toggle-group-demo">
                                <div id="ScoreBothHalf" data-id="ScoreBothHalves" class="az-toggle az-toggle-success <?php echo ($MatchData->ScoreBothHalf == 1)? 'on': ''; ?>"><span></span></div>
                            </div>
        
                        </div>
                    </div>
        
                    <div id="ScoreBothHalves" class="row row-sm" style="display:none;">
                        <div class="col-lg-6">
                            <div class="form-group has-success mg-b-0">
                                <label class="form-label mg-b-0">Score Both Halves Tip</label>
                                <input  value ="<?php echo ($MatchData->ScoreBothHalfTip)??""; ?>" name="ScoreBothHalfTip" class="form-control" type="text">
                            </div><!-- form-group -->
                        </div><!-- col -->
                    </div><!-- row -->
        
        
                </section>
        
            </div>
            <div class="col-md-6">
                <section class="sep-section win-either-half-section mg-t-30">
                    <div class="form-title">
                        <h4>Win Either Half</h4>
                        <hr class="mg-t-10 mg-b-30">
                        <div class="bet-decision mg-b-30">
                            <label class="form-label mg-b-10">Win Either Half</label>
                            <div class="az-toggle-group-demo">
                                <div id="WinEitherHalf" data-id="IsWinEitherHalf" class="az-toggle az-toggle-success  <?php echo ($MatchData->WinEitherHalf == 1)? 'on': ''; ?>"><span></span></div>
                            </div>
        
                        </div>
                    </div>
        
                    <div id="IsWinEitherHalf" class="row row-sm" style="display:none;">
                        <div class="col-lg-6">
                            <div class="form-group has-success mg-b-0">
                                <label class="form-label mg-b-0">Win Either Half Tip</label>
                                <input  value ="<?php echo ($MatchData->WinEitherHalfTip)??""; ?>" name="WinEitherHalfTip" class="form-control" type="text">
                            </div><!-- form-group -->
                        </div><!-- col -->
        
        
        
                    </div><!-- row -->
        
        
                </section>
        
            </div>
        
        </div>
        <div class="row">
            <div class="col-md-6">
                <section class="sep-section weekend-bet-section mg-t-30">
                    <div class="form-title">
                        <h4>Weekend Bet</h4>
                        <hr class="mg-t-10 mg-b-30">
                        <div class="bet-decision mg-b-30">
                            <label class="form-label mg-b-10">Weekend Bet?</label>
                            <div class="az-toggle-group-demo">
                                <div id="IsWeekendBet" data-id="WeekendBet" class="az-toggle az-toggle-success <?php echo ($MatchData->IsWeekendBet == 1)? 'on': ''; ?>"><span></span></div>
                            </div>
        
                        </div>
                    </div>
        
                    <div id="WeekendBet" class="row row-sm" style="display:none;">
                        <div class="col-lg-6">
                            <div class="form-group has-success mg-b-0">
                                <label class="form-label mg-b-0">Weekend Bet Tip</label>
                                <input  value ="<?php echo ($MatchData->WeekendBetTip)??""; ?>" name="WeekendBetTip" class="form-control" type="text">
                            </div><!-- form-group -->
                        </div><!-- col -->
                    </div><!-- row -->
        
        
                </section>
                <div class="row">
                        <div class="col-md-4">
                            <div class="bet-decision mg-b-30">
                                <label class="form-label mg-b-10">Close Match?</label>
                                <div class="az-toggle-group-demo">
                                    <div id="MatchClosed" class="az-toggle az-toggle-success <?php echo ($MatchData->MatchClosed == 1)? 'on': ''; ?>"><span></span></div>
                                </div>
        
                            </div>
                            
                        </div>
                        <div class="col-md-4">
                        <div class="bet-decision mg-b-30">
                                <label class="form-label mg-b-10">Winning Tip?</label>
                                <div class="az-toggle-group-demo">
                                    <div id="WinningTip" class="az-toggle az-toggle-success <?php echo ($MatchData->WinningTip == 1)? 'on': ''; ?>"><span></span></div>
                                </div>
        
                            </div>
                        </div>
                        
                    </div>
        
            </div>
            <div class="col-md-6">
                <section class="sep-section other-options-half-section mg-t-30">
                    <div class="form-title">
                        <h4>Other Options</h4>
                        <hr class="mg-t-10 mg-b-30">
        
                    </div>
                    <div class="row">
                        <div class="col-md-4">
                            <div class="bet-decision mg-b-30">
                                <label class="form-label mg-b-10">Draw</label>
                                <div class="az-toggle-group-demo">
                                    <div id="IsDraw" class="az-toggle az-toggle-success  <?php echo ($MatchData->IsDraw == 1)? 'on': ''; ?>"><span></span></div>
                                </div>
        
                            </div>
                            <div class="bet-decision mg-b-30">
                                <label class="form-label mg-b-10">Over 1.5</label>
                                <div class="az-toggle-group-demo">
                                    <div id="IsOver15" class="az-toggle az-toggle-success  <?php echo ($MatchData->IsOver15 == 1)? 'on': ''; ?>"><span></span></div>
                                </div>
        
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="bet-decision mg-b-30">
                                <label class="form-label mg-b-10">Over 2.5</label>
                                <div class="az-toggle-group-demo">
                                    <div id="IsOver25" class="az-toggle az-toggle-success  <?php echo ($MatchData->IsOver25 == 1)? 'on': ''; ?>"><span></span></div>
                                </div>
        
                            </div>
                            <div class="bet-decision mg-b-30">
                                <label class="form-label mg-b-10">Under 2.5</label>
                                <div class="az-toggle-group-demo">
                                    <div id="IsUnder25" class="az-toggle az-toggle-success  <?php echo ($MatchData->IsUnder25 == 1)? 'on': ''; ?>"><span></span></div>
                                </div>
        
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="bet-decision mg-b-30">
                                <label class="form-label mg-b-10">Both Team To Score</label>
                                <div class="az-toggle-group-demo">
                                    <div id="BothTeamToScore" class="az-toggle az-toggle-success  <?php echo ($MatchData->BothTeamToScore == 1)? 'on': ''; ?>"><span></span></div>
                                </div>
        
                            </div>
                            <div class="bet-decision mg-b-30">
                                <label class="form-label mg-b-10">Accumulator</label>
                                <div class="az-toggle-group-demo">
                                    <div id="IsAccumulator" class="az-toggle az-toggle-success  <?php echo ($MatchData->IsAccumulator == 1)? 'on': ''; ?>"><span></span></div>
                                </div>
        
                            </div>
                        </div>
                    </div>
        
        
        
        
                </section>
        
            </div>
        
        </div>
        <div class="form-action">
                <button type="submit" class="btn btn-az-primary pd-x-30 mg-r-5">Update</button>
                <a href="<?php echo base_url('admin/AllMatches') ?>" class="btn btn-dark pd-x-30">Back</a>

        </div>
        





    </form>
    








    <!-- your content goes here -->
</div><!-- az-content-body -->
<script>
    $(document).ready(function () {
       var postValue;
       var name;
       $('.az-toggle').each(function (i, obj) {
        if ($(this).data('id')) {
                var sectionId = $(this).data('id');
                if ($(this).hasClass('on')) {
                    $("#" + sectionId).fadeIn();
                } else {
                    $("#" + sectionId).fadeOut()
                }
            }
        });
      
        $('.az-toggle').on('click', function () {
            $(this).toggleClass('on');
            if ($(this).data('id')) {
                var sectionId = $(this).data('id');
                if ($(this).hasClass('on')) {
                    $("#" + sectionId).fadeIn();
                } else {
                    $("#" + sectionId).fadeOut()
                }
            }
        })
        $('.fc-datepicker').datetimepicker();
        $('.select2').select2({
            placeholder: 'Choose one'
        });

                $('#MatchForm').on('submit', function (e) {
              e.preventDefault();
              var formData = new FormData($('form#MatchForm')[0]);
              var DomIds = $('[id]');
              $.each(DomIds, function(key, value){
                  var _tempId = value.id;
                  var tempId = $("#"+_tempId);
                  if (tempId.hasClass('az-toggle')) {
                      if (tempId.hasClass('on')) {
                          postValue = 1;
                      } else {
                          postValue = 0;
                      }
                      name = value.id;
                    formData.append(name, postValue);
                  }
                
              });
              formData.append("MatchId", "<?php echo $MatchData->MatchId ?>");
              
             
              
              // formData.append("actions", "writer_request");
              AjaxInit("<?php echo base_url('adminAjax/EditMatch') ?>", formData, false, true);
    
    
            })
    })
</script>


<?php $this->load->view("Admin/Partials/Script");
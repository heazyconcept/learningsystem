<?php $data["PageTitle"] = "My BetStore - 90minbet"; ?>

<?php $this->load->view("User/Partials/Head", $data); ?>

<?php $this->load->view("User/Partials/Navigation"); ?>

<div class="az-content">
    <div class="container">
        <div class="az-content-body">

            <h2 class="az-content-title">My Bet Store</h2>
            <div class="bet-wrapper">
                <div class="bet-section mg-b-50">
                    <div class="az-content-label mg-b-5">Free Bet</div>
                    <!-- <p class="mg-b-20">An example some text within a card body.</p> -->
                    <div class="bet-lists">
                        <?php $FreeBet = $this->betstore->GetStoreByPlan("Free"); $count = 0 ?>
                        <?php foreach ($FreeBet as $bet) { ?>
                        <div class="bet-item <?php echo ($count == 0)? '': "mg-t-20 mg-md-t-0" ?> ">
                            <div class="card card-body bg-primary tx-white bd-0 ">
                                <a href="<?php echo base_url(urldecode($bet->EndPoint)) ?>"
                                    class="card-text"><?php echo $bet->StoreName ?></a>
                            </div><!-- card -->
                        </div><!-- col -->
                        <?php $count++; ?>
                        <?php } ?>

                    </div><!-- row -->

                </div>
                <?php if ($this->session->userdata("IsPremium") == 1) { ?>
                    <div class="bet-section mg-b-50">
                        <div class="az-content-label mg-b-5">Premium Bet</div>
                        <!-- <p class="mg-b-20">An example some text within a card body.</p> -->
                        <div class="bet-lists">
                            <?php $PremiumBet = $this->betstore->GetStoreByPlan("Premium"); $count = 0 ?>
                            <?php foreach ($PremiumBet as $bet) { ?>
                            <div class="bet-item <?php echo ($count == 0)? '': "mg-t-20 mg-md-t-0" ?> ">
                                <div class="card card-body bg-indigo tx-white bd-0 ">
                                    <a href="<?php echo base_url(urldecode($bet->EndPoint)) ?>"
                                        class="card-text"><?php echo $bet->StoreName ?></a>
                                </div><!-- card -->
                            </div><!-- col -->
                            <?php $count++; ?>
                            <?php } ?>
                    
                        </div><!-- row -->
                    
                    </div>
                <?php } ?>
               
            </div>


            <!-- your content goes here... -->
        </div><!-- az-content-body -->
    </div>
</div><!-- az-content -->

<?php $this->load->view("User/Partials/Scripts"); ?>
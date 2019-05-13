<?php $data["PageTitle"] = "Users  - 90minsbet";  $data["PresentMenu"] = "users"; ?>
<?php $this->load->view("Admin/Partials/Head", $data); ?>
<?php $this->load->view("Admin/Partials/Navigation", $data); ?>
<?php if($UserData->IsPremium == 1) 
        $PremiumStatus = $this->premium->GetStatus($UserData->Id); 
?>
<?php if($UserData->IsPro == 1) 
        $ProStatus = $this->pro->GetStatus($UserData->Id); 
?>
<?php if($UserData->IsRollOver == 1) 
        $RolloverStatus = $this->rollover->GetStatus($UserData->Id); 
?>
<?php if($UserData->IsWeekend20 == 1) 
        $WeekendStatus = $this->weekend->GetStatus($UserData->Id); 
?>

<div class="az-content-body az-content-body-contacts">
          <div class="az-contact-info-header">
            <div class="media">
              <div class="az-img-user">
                <img src="<?php echo $this->utilities->GetProfileImage($UserData->ProfileImage); ?>" alt="">
              </div>
              <div class="media-body">
                <h4><?php echo ucwords(strtolower($UserData->FullName)); ?></h4>
                <p><?php echo $UserData->Country; ?></p>
                <nav class="nav">
                  <a href="" class="nav-link"><i class="typcn typcn-device-phone"></i> <?php echo $UserData->PhoneNumber; ?></a>
                  <a href="" class="nav-link"><i class="typcn typcn-messages"></i> <?php echo $UserData->EmailAddress ?></a>
                  <a href="" class="nav-link"><i class="typcn typcn-user-add-outline"></i> Activate User</a>
                  <!-- <a href="" class="nav-link"><i class="typcn typcn-cancel"></i> Block</a> -->
                </nav>
              </div><!-- media-body -->
            </div><!-- media -->
            <!-- <div class="az-contact-action">
              <a href=""><i class="typcn typcn-edit"></i> Edit Contact</a>
              <a href=""><i class="typcn typcn-trash"></i> Delete Contact</a>
            </div> -->
            <!-- az-contact-action -->

          </div><!-- az-contact-info-header -->
          <div class="az-contact-info-body">
            <div class="media-list">
              <div class="media">
                <div class="media-icon">Premium</div>
                <div class="media-body">
                  <div>
                    <label>Status</label>
                    <span class="tx-medium"><?php echo ($UserData->IsPremium == 1)? 'Active' : 'InActive' ?></span>
                  </div>
                  <?php if ($UserData->IsPremium == 1) { ?>
                    <?php $PremuimDetails =  $this->premium->GetByUserId($UserData->Id); ?>
                    <div>
                    <label>Date Activated</label>
                    <span class="tx-medium"><?php echo $this->utilities->formatDate($PremuimDetails->PaymentDate); ?></span>
                  </div>
                  <div>
                    <label>Duration</label>
                    <span class="tx-medium"><?php echo  $PremuimDetails->Duration; ?></span>
                  </div>
                  <div>
                    <label>Expiry Date</label>
                    <span class="tx-medium"><?php echo  $this->utilities->formatDate($PremuimDetails->ExpiryDate); ?></span>
                  </div>
                  <?php } ?>
                 
                </div><!-- media-body -->
              </div><!-- media -->
             
             
              
            </div><!-- media-list -->
            <div class="media-list light-grey">
              <div class="media">
                <div class="media-icon">Pro</div>
                <div class="media-body">
                  <div>
                    <label>Status</label>
                    <span class="tx-medium"><?php echo ($UserData->IsPro == 1)? 'Active' : 'InActive' ?></span>
                  </div>
                  <?php if ($UserData->IsPro == 1) { ?>
                    <?php $ProDetails =  $this->pro->GetByUserId($UserData->Id); ?>
                    <div>
                    <label>Date Activated</label>
                    <span class="tx-medium"><?php echo $this->utilities->formatDate($ProDetails->PaymentDate); ?></span>
                  </div>
                  <div>
                    <label>Duration</label>
                    <span class="tx-medium"><?php echo  $ProDetails->Duration; ?></span>
                  </div>
                  <div>
                    <label>Expiry Date</label>
                    <span class="tx-medium"><?php echo  $this->utilities->formatDate($ProDetails->ExpiryDate); ?></span>
                  </div>
                  <?php } ?>
                 
                </div><!-- media-body -->
              </div><!-- media -->
             
             
              
            </div><!-- media-list -->
            <div class="media-list">
              <div class="media">
                <div class="media-icon">Rollover</div>
                <div class="media-body">
                  <div>
                    <label>Status</label>
                    <span class="tx-medium"><?php echo ($UserData->IsRollOver == 1)? 'Active' : 'InActive' ?></span>
                  </div>
                  <?php if ($UserData->IsRollOver == 1) { ?>
                    <?php $RolloverDetails =  $this->rollover->GetByUserId($UserData->Id); ?>
                    <div>
                    <label>Date Activated</label>
                    <span class="tx-medium"><?php echo $this->utilities->formatDate($RolloverDetails->PaymentDate); ?></span>
                  </div>
                  <div>
                    <label>Duration</label>
                    <span class="tx-medium"><?php echo  $RolloverDetails->Duration; ?></span>
                  </div>
                  <div>
                    <label>Expiry Date</label>
                    <span class="tx-medium"><?php echo  $this->utilities->formatDate($RolloverDetails->ExpiryDate); ?></span>
                  </div>
                  <?php } ?>
                 
                </div><!-- media-body -->
              </div><!-- media -->
             
             
              
            </div><!-- media-list -->
            <div class="media-list light-grey">
              <div class="media">
                <div class="media-icon">Weekend20</div>
                <div class="media-body">
                  <div>
                    <label>Status</label>
                    <span class="tx-medium"><?php echo ($UserData->IsWeekend20 == 1)? 'Active' : 'InActive' ?></span>
                  </div>
                  <?php if ($UserData->IsWeekend20 == 1) { ?>
                    <?php $WeekendDetails =  $this->weekend->GetByUserId($UserData->Id); ?>
                    <div>
                    <label>Date Activated</label>
                    <span class="tx-medium"><?php echo $this->utilities->formatDate($WeekendDetails->PaymentDate); ?></span>
                  </div>
                  <div>
                    <label>Duration</label>
                    <span class="tx-medium"><?php echo  $WeekendDetails->Duration; ?></span>
                  </div>
                  <div>
                    <label>Expiry Date</label>
                    <span class="tx-medium"><?php echo  $this->utilities->formatDate($WeekendDetails->ExpiryDate); ?></span>
                  </div>
                  <?php } ?>
                 
                </div><!-- media-body -->
              </div><!-- media -->
             
             
              
            </div><!-- media-list -->
          </div><!-- az-contact-info-body -->
        
        <div class="user-action">
            <button class="btn btn-primary btn-goback"> Go Back</button>
        </div>







    <!-- your content goes here -->
</div><!-- az-content-body -->


<script>
    $(document).ready(function () {
        $(".btn-goback").click(function () {
            history.back();
        })

      });
</script>
<?php $this->load->view("Admin/Partials/Script");
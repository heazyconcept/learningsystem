<?php 
$UserSession = (object) $this->session->userdata();
?>
<div class="az-header mg-b-50">
      <div class="container">
        <div class="az-header-left mw-30">
        <a href="<?php echo base_url(); ?>" class="az-logo">
              <img class="img-responsive mw-40" src="<?php echo asset_url('img/logo-alt.png') ?>" alt="">
            </a>
          <a href="" id="azNavShow" class="az-header-menu-icon d-lg-none"><span></span></a>
        </div><!-- az-header-left -->
        <div class="az-navbar az-navbar-three">
          <div>
              <a href="<?php echo base_url(); ?>" class="az-logo">
              <img class="img-responsive mw-40" src="<?php echo asset_url('img/logo.png') ?>" alt="">
            </a>
            </div>
          <ul class="nav">
            <li class="nav-label">Main Menu</li>
            <li class="nav-item active">
              <a href="<?php echo base_url("user/MyProfile"); ?>" class="nav-link"><i class="typcn typcn-book"></i>My Profile</a>
            </li><!-- nav-item -->
            
            <li class="nav-item">
              <a href="<?php echo base_url("user/MakePayment"); ?>" class="nav-link"><i class="typcn typcn-chart-bar-outline"></i>Make Payment</a>
            </li><!-- nav-item -->
            <li class="nav-item">
              <a href="<?php echo base_url("user/MyBetStore"); ?>" class="nav-link"><i class="typcn typcn-map"></i>My Bet Store</a>
            </li><!-- nav-item -->
            <?php if ($this->session->userdata("IsPro") == 1) { ?>
               <li class="nav-item">
               <a href="<?php echo base_url("betstore/ProBet"); ?>" class="nav-link"><i class="typcn typcn-map"></i>Pro Bet</a>
             </li>
           <?php } ?>
           <?php if ($this->session->userdata("IsRollOver") == 1) { ?>
               <li class="nav-item">
               <a href="<?php echo base_url("betstore/Rollover"); ?>" class="nav-link"><i class="typcn typcn-map"></i>Rollover Bet</a>
             </li>
           <?php } ?>
           <?php if ($this->session->userdata("IsWeekend20") == 1) { ?>
               <li class="nav-item">
               <a href="<?php echo base_url("betstore/Oddss20"); ?>" class="nav-link"><i class="typcn typcn-map"></i>20 Odds</a>
             </li>
           <?php } ?>
          </ul><!-- nav -->
        </div><!-- az-navbar -->
        <div class="az-header-right">
          <!-- az-header-message -->
          <!-- <div class="dropdown az-header-notification">
            <a href="" class="new"><i class="typcn typcn-bell"></i></a>
            <div class="dropdown-menu">
              <div class="az-dropdown-header mg-b-20 d-sm-none">
                <a href="" class="az-header-arrow"><i class="icon ion-md-arrow-back"></i></a>
              </div>
              <h6 class="az-notification-title">Notifications</h6>
              <p class="az-notification-text">You have 2 unread notification</p>
              <div class="az-notification-list">
                <div class="media new">
                  <div class="az-img-user"><img src="https://via.placeholder.com/500x500" alt=""></div>
                  <div class="media-body">
                    <p>Congratulate <strong>Socrates Itumay</strong> for work anniversaries</p>
                    <span>Mar 15 12:32pm</span>
                  </div>media-body
                </div>
                <div class="media new">
                  <div class="az-img-user online"><img src="https://via.placeholder.com/500x500" alt=""></div>
                  <div class="media-body">
                    <p><strong>Joyce Chua</strong> just created a new blog post</p>
                    <span>Mar 13 04:16am</span>
                  </div>
                </div>
                <div class="media">
                  <div class="az-img-user"><img src="https://via.placeholder.com/500x500" alt=""></div>
                  <div class="media-body">
                    <p><strong>Althea Cabardo</strong> just created a new blog post</p>
                    <span>Mar 13 02:56am</span>
                  </div>
                </div>
                <div class="media">
                  <div class="az-img-user"><img src="https://via.placeholder.com/500x500" alt=""></div>
                  <div class="media-body">
                    <p><strong>Adrian Monino</strong> added new comment on your photo</p>
                    <span>Mar 12 10:40pm</span>
                  </div>
                </div>
              </div>
              <div class="dropdown-footer"><a href="">View All Notifications</a></div>
            </div>
          </div> -->
          <div class="dropdown az-profile-menu">
            <a href="" class="az-img-user"><img class="profileImage" src="<?php echo $userImage ?>" alt=""></a>
            <div class="dropdown-menu">
              <div class="az-dropdown-header d-sm-none">
                <a href="" class="az-header-arrow"><i class="icon ion-md-arrow-back"></i></a>
              </div>
              <div class="az-header-profile">
                <div class="az-img-user">
                  <img src="<?php echo $userImage ?>" class="profileImage" alt="">
                </div>
                <h6><?php echo $UserSession->FullName; ?></h6>
                <span><?php $UserSession->AccountType; ?></span>
              </div>

              <a href="" class="dropdown-item"><i class="typcn typcn-user-outline"></i> My Profile</a>
              <a href="<?php echo base_url("account/LogOut"); ?>" class="dropdown-item"><i class="typcn typcn-power-outline"></i> Sign Out</a>
            </div><!-- dropdown-menu -->
          </div>
        </div><!-- az-header-right -->
      </div><!-- container -->
    </div><!-- az-header -->
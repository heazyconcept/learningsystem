<?php $userDetails = (object) $this->session->userdata(); ?>
<body class="az-body az-body-sidebar az-body-dashboard-nine">

    <div class="az-sidebar az-sidebar-sticky az-sidebar-indigo-dark">
      <div class="az-sidebar-header">
      <a href="<?php echo base_url(); ?>" class="az-logo">
              <img class="img-responsive mw-80" src="<?php echo asset_url('img/logo-alt.png') ?>" alt="">
            </a>
      </div><!-- az-sidebar-header -->
      <div class="az-sidebar-loggedin">
        <div class="az-img-user online"><img src="https://via.placeholder.com/500x500" alt=""></div>
        <div class="media-body">
          <h6><?php echo ucwords(strtolower($userDetails->FullName)) ?></h6>
          <span><?php echo ucwords(strtolower($userDetails->AccountType)) ?></span>
        </div><!-- media-body -->
      </div><!-- az-sidebar-loggedin -->
      <div class="az-sidebar-body">
        <ul class="nav">
          <li class="nav-label">Main Menu</li>
          <li class="nav-item <?php echo (isset($PresentMenu) && $PresentMenu == 'dashboard')? 'active' : ''; ?>">
            <a href="<?php echo base_url('admin') ?>" class="nav-link"><i class="typcn typcn-clipboard"></i>Dashboard</a>
          </li><!-- nav-item -->
          <li class="nav-item <?php echo (isset($PresentMenu) && $PresentMenu == 'users')? 'active' : ''; ?>">
            <a href="" class="nav-link with-sub"><i class="typcn typcn-document"></i>Users</a>
            <nav class="nav-sub">
              <a href="<?php echo base_url('admin/Users/All') ?>" class="nav-sub-link">All Users</a>
              <a href="<?php echo base_url('admin/Users/Pro') ?>" class="nav-sub-link">Pro Users</a>
              <a href="<?php echo base_url('admin/Users/Premium') ?>" class="nav-sub-link">Premium Users</a>
              <a href="<?php echo base_url('admin/Users/Rollover') ?>" class="nav-sub-link">Rollover Users</a>
              <a href="<?php echo base_url('admin/Users/weekend') ?>" class="nav-sub-link">Weekend20 Users</a>
              <a href="<?php echo base_url('admin/ActivateUsers') ?>" class="nav-sub-link">Activate Users</a>
            </nav>
          </li><!-- nav-item -->
          <li class="nav-item <?php echo (isset($PresentMenu) && $PresentMenu == 'leagues')? 'active' : ''; ?>">
            <a href="" class="nav-link with-sub"><i class="typcn typcn-document"></i>Leagues</a>
            <nav class="nav-sub">
              <a href="<?php echo base_url('admin/Leagues') ?>" class="nav-sub-link">All Leagues</a>
              <a href="<?php echo base_url('admin/LeagueTable') ?>" class="nav-sub-link">League Tables</a>
            </nav>
          </li><!-- nav-item -->
          <li class="nav-item <?php echo (isset($PresentMenu) && $PresentMenu == 'matches')? 'active' : ''; ?>">
            <a href="" class="nav-link with-sub"><i class="typcn typcn-document"></i>Matches</a>
            <nav class="nav-sub">
              <a href="<?php echo base_url('admin/AddMatch') ?>" class="nav-sub-link">Add Match</a>
              <a href="<?php echo base_url('admin/AllMatches') ?>" class="nav-sub-link">Edit Matches</a>
              <a href="<?php echo base_url('admin/DailyMatch') ?>" class="nav-sub-link">Today's Matches</a>
              <a href="<?php echo base_url('admin/Rollover') ?>" class="nav-sub-link">Rollover </a>
              <a href="<?php echo base_url('admin/Weekend') ?>" class="nav-sub-link">Weekend20 </a>
            </nav>
          </li><!-- nav-item -->
          <li class="nav-item <?php echo (isset($PresentMenu) && $PresentMenu == 'testimonials')? 'active' : ''; ?>">
            <a href="<?php echo base_url('admin/Testimonials') ?>" class="nav-link"><i class="typcn typcn-document"></i>Testimonials</a>
          </li><!-- nav-item -->
          <li class="nav-item <?php echo (isset($PresentMenu) && $PresentMenu == 'siteoptions')? 'active' : ''; ?>">
            <a href="" class="nav-link"><i class="typcn typcn-document"></i>Site Options</a>
          </li><!-- nav-item -->
        </ul><!-- nav -->
      </div><!-- az-sidebar-body -->
    </div><!-- az-sidebar -->
    <div class="az-content az-content-dashboard-nine">
    <div class="az-header az-header-dashboard-nine">
        <div class="container-fluid">
            <div class="az-header-left">
                <a href="" id="azSidebarToggle" class="az-header-menu-icon"><span></span></a>
            </div><!-- az-header-left -->
            <div class="az-header-center">

            </div><!-- az-header-center -->
            <div class="az-header-right">

                <div class="dropdown az-profile-menu">
                    <a href="" class="az-img-user"><img src="https://via.placeholder.com/500x500" alt=""></a>
                    <div class="dropdown-menu">
                        <div class="az-dropdown-header d-sm-none">
                            <a href="" class="az-header-arrow"><i class="icon ion-md-arrow-back"></i></a>
                        </div>
                        <div class="az-header-profile">
                            <div class="az-img-user">
                                <img src="https://via.placeholder.com/500x500" alt="">
                            </div><!-- az-img-user -->
                            <h6><?php echo ucwords(strtolower($userDetails->FullName)); ?></h6>
                            <!-- <span>Premium Member</span> -->
                        </div><!-- az-header-profile -->

                        <a href="" class="dropdown-item"><i class="typcn typcn-user-outline"></i> My Profile</a>
                        <a href="<?php echo base_url("account/Logout"); ?>" class="dropdown-item"><i class="typcn typcn-power-outline"></i> Sign
                            Out</a>
                    </div><!-- dropdown-menu -->
                </div>
            </div><!-- az-header-right -->
        </div><!-- container -->
    </div><!-- az-header -->
  
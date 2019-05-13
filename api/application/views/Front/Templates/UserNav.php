<?php $userImage =  $this->utilities->GetProfileImage($this->session->userdata('ProfileImage')); ?>
<style>
    .profile-block {
    max-width: 35px;
    max-height: 35px;
    overflow: hidden;
    border-radius: 50%;
}
</style>
<div class="col-lg-auto collapse navbar-collapse main-menu-collapse">
    <div class="hover-wrap-block d-flex align-items-center">
        <p class="mb-0 mr-10">
            <a href="<?php echo base_url("user"); ?>"><strong><?php echo ucwords(strtolower($this->session->userdata("FullName"))) ?></strong></a>
        </p>
        <div class="profile-block">
            <a href="#"><img src="<?php echo $userImage; ?>" height="35px" class="" alt=""></a>
        </div>
        <div class="hover-block shadow bg-default padding-x2" style="min-width: 200px;">
            <!-- <p class="text-secondary mb-10"><a href="#"><strong>Balance: $120</strong></a></p> -->
            <!-- <hr> -->
            <ul class="list-unstyled padding-x05-list mb-20">
                <li><a href="<?php echo base_url('user') ?>">My Account</a></li>
                <li><a href="<?php echo base_url('user/MyBetStore') ?>">My Bet Store</a></li>
                <li><a href="<?php echo base_url('user/MakePayment') ?>">Make Payment</a></li>
            </ul>
            <a href="<?php echo base_url("account/Logout") ?>" class="btn btn-danger btn-sm btn-block"><strong>Sign Out</strong></a>
        </div>
    </div>
</div>
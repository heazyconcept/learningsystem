<?php $userImage =  $this->utilities->GetProfileImage($this->session->userdata('ProfileImage')); ?>
<style>
    .mobile-user-front {
    max-width: 35px;
    max-height: 35px;
    overflow: hidden;
    border-radius: 50%;
}
</style>
<nav id="nav-logo-menu-btn-2" class="navbar navbar-expand-lg light spr-edit-el spr-oc-show spr-wout">
	<div class="container">
		<div class="row align-items-center">
			<div class="col-auto">
				<a class="navbar-brand" href="<?php echo base_url(); ?>">
					<img src="<?php echo asset_url('img/logo.png'); ?>" height="30px" class="mw-100" alt="">
					<!-- <img class="brand-logo" src="" > -->
				</a>
			</div>
			<div class="col-auto hidden-lg ml-auto">
				<?php if ($this->session->has_userdata("UserId") ) { ?>
				<div class="mobile-user-front">
					<a href="<?php echo base_url('user') ?>"><img src="<?php echo $userImage; ?>"
							height="35px"  alt=""></a>
				</div>
				<?php	} else { ?>
				<div class="mobile-authentication">
					<a href="<?php echo base_url('account/Login') ?>"><i class="icon ion-md-person"></i></a>
				</div>
				<?php } ?>


			</div>
			<div class="col-auto hidden-lg ml-auto">
				<button class="navbar-toggler collapsed" type="button" data-toggle="collapse"
					data-target=".main-menu-collapse" aria-controls="navbarMenuContent" aria-expanded="false"
					aria-label="Toggle navigation"><span class="icon-bar"></span><span class="icon-bar"></span><span
						class="icon-bar"></span></button>
			</div>
			<div class="col-lg-auto collapse navbar-collapse main-menu-collapse mr-auto">
				<ul class="navbar-nav">
					<li class="nav-item active">
						<a class="nav-link" href="<?php echo base_url('home/leagues'); ?>">Leagues</a>
					</li>
					<li class="nav-item">
						<a class="nav-link sub-menu-link" href="#">Bet Store<svg xmlns="http://www.w3.org/2000/svg"
								height="16" viewBox="0 0 16 16" width="16" class="icon icon-pos-right svg-secondary">
								<path d="m8 11 4-5h-8z" fill-rule="evenodd"></path>
							</svg></a>
						<div class="mega-menu-container shadow bg-default">
							<div class="container-fluid">
								<div class="row">
									<div class="col-lg">
										<p class="lead"><strong>Free</strong></p>
										<hr>
										<ul class="list-unstyled padding-list mb-30 mb-lg-0">
											<li><a href="<?php echo base_url('betstore/Over15'); ?>">Over 1.5</a></li>
											<li><a href="<?php echo base_url('betstore/DoubleChance'); ?>">Double
													Chance</a></li>
											<li><a href="<?php echo base_url('betstore/CorrectScore'); ?>">Correct
													Score</a></li>
											<li><a href="<?php echo base_url('betstore/MonsterBet'); ?>">Monster Bet</a>
											</li>
										</ul>
									</div>
									<div class="col-lg">
										<p class="lead"><strong>Premium </strong></p>
										<hr>
										<ul class="list-unstyled padding-list mb-30 mb-lg-0">
											<li><a href="<?php echo base_url('betstore/SingleBet'); ?>">Single Bet</a>
											</li>
											<li><a href="<?php echo base_url('betstore/ScoreBothHalves'); ?>">Score Both
													Halves</a></li>
											<li><a href="<?php echo base_url('betstore/WinEitherHalf'); ?>">Win Either
													Half</a></li>
											<li><a href="<?php echo base_url('betstore/Over25'); ?>">Over/Under 2.5</a>
											</li>
											<li><a href="<?php echo base_url('betstore/Bts'); ?>">BTS</a></li>
											<li><a href="<?php echo base_url('betstore/Handicap'); ?>">Handicap</a></li>
										</ul>
									</div>
									<div class="col-lg mt-50">

										<ul class="list-unstyled padding-list mb-30 mb-lg-0">
											<li><a href="<?php echo base_url('betstore/Odds2'); ?>">2 Odds</a></li>
											<li><a href="<?php echo base_url('betstore/Odds3'); ?>">3 Odds</a></li>
											<li><a href="<?php echo base_url('betstore/HtFt'); ?>">HT/FT</a></li>
											<li><a href="<?php echo base_url('betstore/WeekendBet'); ?>">Weekend
													Bets</a></li>
											<li><a href="<?php echo base_url('betstore/HalfTimeTips'); ?>">Half Time
													Bets</a></li>
											<li><a href="<?php echo base_url('betstore/SingleCombo'); ?>">Single
													Combo</a></li>
										</ul>
									</div>

									<div class="col-lg">
										<img src="<?php echo asset_url('images/banner-336280.jpg') ?>"
											srcset="images/banner-336280@2x.jpg 2x" alt="banner">
									</div>
								</div>
							</div>
						</div>
					</li>

					<li class="nav-item">
						<a class="nav-link" href="<?php echo base_url('betstore/ExpertZone1'); ?>">Experts Zone</a>
					</li>
					<li class="nav-item">
						<a class="nav-link" href="<?php echo base_url('betstore/ProBet'); ?>">Pro Bet</a>
					</li>
					<li class="nav-item">
						<a class="nav-link" href="<?php echo base_url('betstore/RolloverBet'); ?>">Rollover Bet</a>
					</li>
					<li class="nav-item">
						<a class="nav-link" href="<?php echo base_url('betstore/Odds20'); ?>">20 odds</a>
					</li>
					<li class="nav-item">
						<a class="nav-link" href="#">Blog</a>
					</li>
					<li class="nav-item">
						<a class="nav-link" href="<?php echo base_url('home/contact_us'); ?>">Contact Us</a>
					</li>

				</ul>
			</div>
			<?php if ($this->session->has_userdata("UserId")) { ?>
			<?php $this->load->view("Front/Templates/UserNav"); ?>
			<?php } else{ ?>
			<div class="col-auto collapse navbar-collapse main-menu-collapse desktop-authentication">
				<div>
					<a class="btn btn-primary btn-sm btn-login"
						href="<?php echo base_url('account/Login') ?>"><strong>Login</strong></a>
					<a class="btn btn-dark btn-sm btn-register"
						href="<?php echo base_url('account/Register') ?>"><strong>Register</strong></a>
				</div>
			</div>
			<?php }?>
		</div>
	</div>
	<div class="bg-wrap">
		<div class="bg"></div>
	</div>
</nav>
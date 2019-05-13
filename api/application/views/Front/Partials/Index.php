<?php
$Premiums = $this->pricing->GetPremiumPrice();
$Pros =  $this->pricing->GetProPrice();
$Rollovers = $this->pricing->GetRollOverPrice();
$Weekends =  $this->pricing->GetWeekendPrice();
$Testimonials = $this->testimonials->ListAll(0, 0, array("IsActive" => 1));

?>
<!DOCTYPE html>
<html lang="en">
<?php $this->load->view("Front/Templates/Header"); ?>

<body class="light-page">
	<div id="wrap">
		<?php $this->load->view("Front/Templates/Navigation"); ?>
		<!-- Slider Section -->
		<header id="header-text" class="text-center">
			<div class="home-slider">
				<div class="slide-item">
					<img class="img-responsive" src="<?php echo asset_url('img/slider1.jpg'); ?>" alt="">
				</div>
				<div class="slide-item">
					<img class="img-responsive" src="<?php echo asset_url('img/slider2.jpg'); ?>" alt="">
				</div>
			</div>
			<div class="slide-content">
				<div class="container">
					<div class="row">
						<div class="col-md-6">

							<div class="panel panel-default">
								<div class="panel-body">
									<div class="slide-cont-header pull-left">
										<h4>FREE PROS PICK</h4>
									</div>
									<div class="pull-right">
										<div class="btn-group">
											<button type="button" class="btn btn-success btn-filter"
												data-target="pagado">Yesterday</button>
											<button type="button" class="btn btn-warning btn-filter"
												data-target="pendiente">Today</button>
											<button type="button" class="btn btn-danger btn-filter"
												data-target="cancelado">Tomorrow</button>
										</div>
									</div>
									<div class="table-container">
										<table class="table table-bordered">

											<tbody>
												<tr>
													<td>EPL</td>
													<td>Manchester United Vs Wolves</td>
													<td>BTS</td>
													<td><span class="result-signal bg-success">1-1</span></td>
												</tr>
												<tr>
													<td>Belarus</td>
													<td>Bolivar Vs The Strongist</td>
													<td>Over 2.5</td>
													<td><span class="result-signal bg-success">2-2</span></td>
												</tr>
												<tr>
													<td>BUN</td>
													<td>Leipzig Vs Werder Bremen</td>
													<td>Under 2.5</td>
													<td><span class="result-signal  bg-danger">3-0</span></td>
												</tr>
											</tbody>
										</table>
									</div>
								</div>
							</div>

						</div>
						<div class="col-md-6">

						</div>
					</div>
				</div>
			</div>
			<div class="slide-action">
				<div class="action-container">
					<a href="<?php echo base_url('home/how_to_pay'); ?>" class="btn btn-slide-action btn-pay">How to
						pay</a>
					<!-- <a href="#" class="btn btn-slide-action btn-price">Our Prices</a> -->
					<a href="<?php echo base_url('betstore/ExpertZone1'); ?>" class="btn btn-slide-action btn-expert">Expert Banker Tip of the Day</a>
					<a href="<?php echo base_url('account/Register'); ?>" class="btn btn-slide-action btn-reg-slide">Register Now</a>

				</div>
			</div>

			<div class="bg-wrap">
				<div class="bg"></div>
			</div>
		</header>
		<!-- Slider Section Ends -->
		<!-- Slider Upcoming Tips Section -->
		<section id="desc-img-text" class="pt-30 pb-30 pt-md-15 pb-md-15 light">
			<div class="container">
				<div class="row align-items-center">
					<div class="col-md-6">
						<div class="panel panel-default">
							<!-- Default panel contents -->
							<div class="panel-heading">Upcoming Tips</div>


							<!-- Table -->
							<table class="table table-striped table-bordered">
								<thead>
									<tr>
										<th>Date</th>
										<th>League</th>
										<th>Match</th>
										<th>Tip</th>
										<th>Score</th>
									</tr>
								</thead>
								<tbody>
									<tr>
										<td>
											01/02
										</td>
										<td>
											HOL
										</td>
										<td>
											Graafschap vs Breda
										</td>
										<td>
											BTS
										</td>
										<td>
										</td>
									</tr>
									<tr>
										<td>
											13/02
										</td>
										<td>
											ECH
										</td>
										<td>
											Brentford vs Aston Villa
										</td>
										<td>
											BTS
										</td>
										<td>
										</td>
									</tr>
									<tr>
										<td>
											13/02
										</td>
										<td>
											UCL
										</td>
										<td>
											Ajax vs Real Madrid
										</td>
										<td>
											OVER 2.5
										</td>
										<td>
										</td>
									</tr>
									<tr>
										<td>
											13/02
										</td>
										<td>
											UCL
										</td>
										<td>
											Tottenham vs Dortmund
										</td>
										<td>
											1X
										</td>
										<td>
										</td>
									</tr>
									<tr>
										<td>
											13/02
										</td>
										<td>
											ECH
										</td>
										<td>
											Ipswich vs Derby
										</td>
										<td>
											X2
										</td>
										<td>
										</td>
									</tr>
									<tr>
										<td>
											13/02
										</td>
										<td>
											ECH
										</td>
										<td>
											Preston vs Norwich
										</td>
										<td>
											X2
										</td>
										<td>
										</td>
									</tr>
									<tr>
										<td>
											14/02
										</td>
										<td>
											UEL
										</td>
										<td>
											Malmo FF vs Chelsea
										</td>
										<td>
											2
										</td>
										<td>
										</td>
									</tr>
									<tr>
										<td>
											14/02
										</td>
										<td>
											UEL
										</td>
										<td>
											Zurich vs Napoli
										</td>
										<td>
											OVER 2.5
										</td>
										<td>
										</td>
									</tr>
									<tr>
										<td>
											14/02
										</td>
										<td>
											UEL
										</td>
										<td>
											Slavia Prague vs Genk
										</td>
										<td>
											BTS
										</td>
										<td>
										</td>
									</tr>
									<tr>
										<td>
											14/02
										</td>
										<td>
											UEL
										</td>
										<td>
											Galatasaray vs Benfica
										</td>
										<td>
											BTS
										</td>
										<td>
										</td>
									</tr>
									<tr>
										<td>
											14/02
										</td>
										<td>
											UEL
										</td>
										<td>
											Club Brugge KV vs Salzburg
										</td>
										<td>
											BTS
										</td>
										<td>
										</td>
									</tr>
								</tbody>
							</table>
						</div>

					</div>
					<div class="col-md-6">
						<div class="panel panel-default">
							<!-- Default panel contents -->
							<div class="panel-heading">Recent Winning Tips</div>


							<!-- Table -->
							<table class="table table-striped table-bordered">
								<thead>
									<tr>
										<th>Date</th>
										<th>League</th>
										<th>Match</th>
										<th>Tip</th>
										<th>Score</th>
									</tr>
								</thead>
								<tbody>
									<tr>
										<td>
											01/02
										</td>
										<td>
											HOL
										</td>
										<td>
											Graafschap vs Breda
										</td>
										<td>
											BTS
										</td>
										<td>
										</td>
									</tr>
									<tr>
										<td>
											13/02
										</td>
										<td>
											ECH
										</td>
										<td>
											Brentford vs Aston Villa
										</td>
										<td>
											BTS
										</td>
										<td>
										</td>
									</tr>
									<tr>
										<td>
											13/02
										</td>
										<td>
											UCL
										</td>
										<td>
											Ajax vs Real Madrid
										</td>
										<td>
											OVER 2.5
										</td>
										<td>
										</td>
									</tr>
									<tr>
										<td>
											13/02
										</td>
										<td>
											UCL
										</td>
										<td>
											Tottenham vs Dortmund
										</td>
										<td>
											1X
										</td>
										<td>
										</td>
									</tr>
									<tr>
										<td>
											13/02
										</td>
										<td>
											ECH
										</td>
										<td>
											Ipswich vs Derby
										</td>
										<td>
											X2
										</td>
										<td>
										</td>
									</tr>
									<tr>
										<td>
											13/02
										</td>
										<td>
											ECH
										</td>
										<td>
											Preston vs Norwich
										</td>
										<td>
											X2
										</td>
										<td>
										</td>
									</tr>
									<tr>
										<td>
											14/02
										</td>
										<td>
											UEL
										</td>
										<td>
											Malmo FF vs Chelsea
										</td>
										<td>
											2
										</td>
										<td>
										</td>
									</tr>
									<tr>
										<td>
											14/02
										</td>
										<td>
											UEL
										</td>
										<td>
											Zurich vs Napoli
										</td>
										<td>
											OVER 2.5
										</td>
										<td>
										</td>
									</tr>
									<tr>
										<td>
											14/02
										</td>
										<td>
											UEL
										</td>
										<td>
											Slavia Prague vs Genk
										</td>
										<td>
											BTS
										</td>
										<td>
										</td>
									</tr>
									<tr>
										<td>
											14/02
										</td>
										<td>
											UEL
										</td>
										<td>
											Galatasaray vs Benfica
										</td>
										<td>
											BTS
										</td>
										<td>
										</td>
									</tr>
									<tr>
										<td>
											14/02
										</td>
										<td>
											UEL
										</td>
										<td>
											Club Brugge KV vs Salzburg
										</td>
										<td>
											BTS
										</td>
										<td>
										</td>
									</tr>
								</tbody>
							</table>
						</div>
					</div>
				</div>
			</div>
			<div class="bg-wrap">
				<div class="bg"></div>
			</div>
		</section>
		<!-- Upcoming Tips Section Ends -->
		<!-- CTA Be a Pro -->
		<section id="action-text-btn" class="pt-50 pb-50 pt-lg-100 pb-lg-100 dark">
			<div class="container mw-60">
				<div class="row align-items-center justify-content-center">
					<div class="col-md-8 mw-100">
						<h2><strong>Bet Like a Pro</strong></h2>
						<p style="font-size: 22px;">Get tactical formula in football betting and make profit steadily
							everyday</p>
					</div>
					<div class="col-md-4 mw-100">
						<a href="<?php echo base_url("betstore/ProBet") ?>" class="btn btn-lg btn-success btn-try">Try Now</a>
					</div>
				</div>
			</div>
			<div class="bg-wrap">
				<div class="bg"></div>
			</div>
		</section>
		<!-- CTA Be a Pro Ends -->
		<!-- Pro Bet tracker Section -->
		<section id="action-text-timer" class="pt-30 pb-30 pt-md-75 pb-md-75 dark">
			<div class="container">
				<div class="row align-items-center text-center">
					<div class="count-wrapper">
						<div class="count-title">
							<h2>Pro Bet Odds: <span class="text-white"><strong> 1.80</strong></span> </h2>
							<h4>Next Pro Bet Starts In</h4>
						</div>
						<div class="countdown d-inline-flex align-items-center justify-content-center mb-20 mt-20"
							id="action-text-timer-countdown--0">
							<div class="mr-20">
								<h3><strong><span class="days">28</span></strong></h3>
								<p>Days</p>
							</div>
							<div class="mr-20">
								<h3><strong><span class="hours">12</span></strong></h3>
								<p>Hours</p>
							</div>
							<div class="mr-20">
								<h3><strong><span class="minutes">36</span></strong></h3>
								<p>Minutes</p>
							</div>
							<div>
								<h3><strong><span class="seconds">22</span></strong></h3>
								<p>Seconds</p>
							</div>
						</div>
					</div>
					<div class="bet-tracker-wrapper">
						<div class="container">
							<div class="align-items-center">
								<h4>Bet Profit Tracker</h4>
								<ul class="trackers">
									<li class="track-item">
										<span class="track-date">23/09</span>
										<span class="track-icon green">
											<i class="fas fa-check-circle"></i>
										</span>
									</li>
									<li class="track-item">
										<span class="track-date">24/09</span>
										<span class="track-icon green">
											<i class="fas fa-check-circle"></i>
										</span>
									</li>
									<li class="track-item">
										<span class="track-date">25/09</span>
										<span class="track-icon red">
											<i class="fas fa-times-circle"></i>

										</span>
									</li>
									<li class="track-item">
										<span class="track-date">26/09</span>
										<span class="track-icon green">
											<i class="fas fa-check-circle"></i>
										</span>
									</li>
									<li class="track-item">
										<span class="track-date">27/09</span>
										<span class="track-icon green">
											<i class="fas fa-check-circle"></i>
										</span>
									</li>
								</ul>
							</div>
						</div>
					</div>



				</div>
			</div>
			<div class="bg-wrap">
				<div class="bg"></div>
			</div>
		</section>
		<!-- Pro Bet Tracker Section Ends -->
		<!-- Bet Shop -->
		<section id="bet-shop" class="pt-50 pt-md-100 pb-md-50 gallery light">
			<div class="container">
				<div class="bet-shop-title">
					<h2>Bet Shop</h2>
				</div>
				<div class="free-bet-shop">
					<div class="bet-shop-sub-title">
						<h4>Free</h4>
						<div class="shop-wrapper">
							<ul class="shop-list">
							<?php $FreePlan = $this->betstore->GetStoreByPlan("Free"); ?>
								<?php foreach ($FreePlan as $_plan) { ?>
									<li class="shop-item">
									<a href="<?php echo base_url(urldecode($_plan->EndPoint)) ?>"><?php echo $_plan->StoreName; ?></a>
								</li>
								<?php } ?>
								
								<!-- <li class="shop-item">
									<a href="#">Over 1.5</a>
								</li>
								<li class="shop-item">
									<a href="#">Double Chance</a>
								</li>
								<li class="shop-item">
									<a href="#">Correct Score</a>
								</li>
								<li class="shop-item">
									<a href="#">Monster Bet</a>
								</li> -->
							</ul>
						</div>
					</div>
				</div>
				<div class="premium-bet-shop">
					<div class="bet-shop-sub-title">
						<h4>Premium</h4>
						<div class="shop-wrapper">
							<ul class="shop-list">
								<?php $PremiumPlan = $this->betstore->GetStoreByPlan("Premium"); ?>
								<?php foreach ($PremiumPlan as $_plan) { ?>
									<li class="shop-item">
									<a href="<?php echo base_url(urldecode($_plan->EndPoint)) ?>"><?php echo $_plan->StoreName; ?></a>
								</li>
								<?php } ?>
								
								<!-- <li class="shop-item">
									<a href="#">Scores Both Halves</a>
								</li>
								<li class="shop-item">
									<a href="#">Win Either Half</a>
								</li>
								<li class="shop-item">
									<a href="#">Over/Under 2.5</a>
								</li>
								<li class="shop-item">
									<a href="#">BTS</a>
								</li>
								<li class="shop-item">
									<a href="#">Handicap</a>
								</li>
								<li class="shop-item">
									<a href="#">2 Odds</a>
								</li>
								<li class="shop-item">
									<a href="#">3 Odds</a>
								</li>
								<li class="shop-item">
									<a href="#">HT/FT</a>
								</li>
								<li class="shop-item">
									<a href="#">Weekend Bets</a>
								</li>
								<li class="shop-item">
									<a href="#">Half Time Bets</a>
								</li>
								<li class="shop-item">
									<a href="#">Single Combo</a>
								</li> -->
							</ul>
						</div>
					</div>
				</div>

			</div>
			<div class="bg-wrap">
				<div class="bg"></div>
			</div>
		</section>
		<!-- Bet Shop Ends -->
		<!-- Expert Rollover Section -->
		<section id="expert-rollover" class="dark">
			<div class="row align-items-center justify-content-center">
				<div class="col-md-6  pt-50 pb-50 pt-lg-100 pb-lg-100">
					<div class="expert-zone-wrapper">
						<div class="expert-rollover-title">
							<h2>Experts Zone</h2>
						</div>
						<div class="expert-content">
							Have access to our experts best selection of the day!
						</div>
						<div class="expert-action">
							<a class="btn btn-primary btn-expert-cta" href="<?php echo base_url("betstore/ExpertZone1") ?>">Get 5 - 10 odds <br> from different
								experts!</a>
						</div>

					</div>



				</div>
				<div class="col-md-6 rollover-bet-wrapper pt-50 pb-50 pt-lg-100 pb-lg-100 light">
					<div class="expert-rollover-title">
						<h2>Rollover Bet</h2>
					</div>
					<div class="expert-content">
						Have access to the Rollover Daily Formula of 1.30 odds
					</div>
					<div class="expert-action">
						<a class="btn btn-primary btn-rollover" href="<?php echo base_url("betstore/RolloverBet"); ?>">Access Now</a>
					</div>

				</div>

			</div>
			<div class="bg-wrap">
				<div class="bg"></div>
			</div>
		</section>
		<!-- Expert Rollover Section Ends -->
		<!-- Pricing Section -->
		<section id="price-4col-2" class="pt-75 pb-50  text-center light spr-edit-el spr-oc-show spr-wout">
			<div class="container">
				<div class="row">
					<div class="col-12">
						<h3><strong>Pricing Plans</strong></h3>
						<svg xmlns="http://www.w3.org/2000/svg" height="20" viewBox="0 0 40 20" width="40"
							class="mb-50 svg-secondary" src="images/gallery/decor/line-h-1.svg" alt="sep">
							<path d="m0 8h40v4h-40z" fill-rule="evenodd"></path>
						</svg>
						<p>For users who want more than the free betting tips we offer, here are our pricing plans</p>

					</div>
					<div class="col-lg-3 col-md-6 pricing-item">
						<div class="content-box bg-default mb-50" style="background-color: #fff;">
							<div class="price-header-primary">
								<h4>Premium</h4>
								<?php $price = (object) unserialize($Premiums[0]->Amount);  ?>
								<h3 class="mb-20 price-title premium-price">
									&#8358;<?php echo number_format($price->N, 2); ?> /
									$<?php echo number_format($price->U, 2); ?> /
									KSH<?php echo number_format($price->K, 2); ?></h3>
							</div>
							<div class="triangle-topleft-primary"></div>

							<ul class="d-inline-block padding-list list-unstyled text-left mb-30">
								<li><i class="fas fa-check-double"></i>Access to all Leagues</li>
								<li><i class="fas fa-check-double"></i>Access to all Bet Shop</li>
								<li><i class="fas fa-check-double"></i>Access to Experts Zone</li>
								<li><i class="fas fa-check-double"></i>Access to Jackpot Tips</li>
								<li><i class="fas fa-check-double"></i>80% Accuraccy</li>
							</ul>
							<div class="duration-wrapper">
								<span class="duration-label">Select Duration</span>
								<select class="form-control duration_select"
									onchange="ChangePrice('premium-price', this )">
									<?php foreach ($Premiums as $premium) { ?>
									<option value="<?php echo $premium->Id ?>"><?php echo $premium->Duration;  ?>
									</option>
									<?php } ?>

								</select>
							</div>
							<button type="button" class="btn btn-primary">Pay Now</button>

							<!-- <a href="#" class="btn btn-block btn-secondary"><span class="spr-option-textedit-link">Try now</span></a> -->
						</div>
					</div>

					<div class="col-lg-3 col-md-6 pricing-item">
						<div class="content-box bg-default mb-50" style="background-color: #fff;">
							<div class="price-header-secondary dark">
								<h4>Pro Bet</h4>
								<?php $price = (object) unserialize($Pros[0]->Amount);  ?>
								<h3 class="mb-20 price-title pro-price">
									&#8358;<?php echo number_format($price->N, 2); ?> /
									$<?php echo number_format($price->U, 2); ?> /
									KSH<?php echo number_format($price->K, 2); ?></h3>

							</div>
							<div class="triangle-topleft-secondary"></div>

							<ul class="d-inline-block padding-list list-unstyled text-left mb-30">
								<li><i class="fas fa-check-double"></i>Bet Management</li>
								<li><i class="fas fa-check-double"></i>Access to Pro Bet</li>
								<li><i class="fas fa-check-double"></i>Consistent Profits</li>
								<li><i class="fas fa-check-double"></i>More Winnings</li>
								<li><i class="fas fa-check-double"></i>95% Accuracy</li>
							</ul>
							<div class="duration-wrapper">
								<span class="duration-label">Select Duration</span>
								<select class="form-control duration_select" onchange="ChangePrice('pro-price', this )">
									<?php foreach ($Pros as $pros) { ?>
									<option value="<?php echo $pros->Id ?>"><?php echo $pros->Duration;  ?></option>
									<?php } ?>

								</select>
							</div>
							<button type="button" class="btn btn-secondary">Pay Now</button>

							<!-- <a href="#" class="btn btn-block btn-secondary"><span class="spr-option-textedit-link">Try now</span></a> -->
						</div>
					</div>
					<div class="col-lg-3 col-md-6 pricing-item">
						<div class="content-box bg-default mb-50" style="background-color: #fff;">
							<div class="price-header-primary">
								<h4>Rollover Bet</h4>
								<?php $price = (object) unserialize($Rollovers[0]->Amount);  ?>
								<h3 class="mb-20 price-title rollover-price">
									&#8358;<?php echo number_format($price->N, 2); ?> /
									$<?php echo number_format($price->U, 2); ?> /
									KSH<?php echo number_format($price->K, 2); ?></h3>

							</div>
							<div class="triangle-topleft-primary"></div>

							<ul class="d-inline-block padding-list list-unstyled text-left mb-30">
								<li><i class="fas fa-check-double"></i>Bet Management</li>
								<li><i class="fas fa-check-double"></i>Access to Rollover Bet</li>
								<li><i class="fas fa-check-double"></i>98% Accuraccy</li>
							</ul>
							<div class="duration-wrapper temp-mt69">
								<span class="duration-label">Select Duration</span>
								<select class="form-control duration_select"
									onchange="ChangePrice('rollover-price', this )">
									<?php foreach ($Rollovers as $roll) { ?>
									<option value="<?php echo $roll->Id ?>"><?php echo $roll->Duration;  ?></option>
									<?php } ?>

								</select>
							</div>
							<button type="button" class="btn btn-primary">Pay Now</button>

							<!-- <a href="#" class="btn btn-block btn-secondary"><span class="spr-option-textedit-link">Try now</span></a> -->
						</div>
					</div>
					<div class="col-lg-3 col-md-6 pricing-item">
						<div class="content-box bg-default mb-50" style="background-color: #fff;">
							<div class="price-header-secondary dark">

								<h4>Weekend 20 Odds</h4>
								<?php $price = (object) unserialize($Weekends[0]->Amount);  ?>
								<h3 class="mb-20 price-title weekend-price">
									&#8358;<?php echo number_format($price->N, 2); ?> /
									$<?php echo number_format($price->U, 2); ?> /
									KSH<?php echo number_format($price->K, 2); ?></h3>


							</div>
							<div class="triangle-topleft-secondary"></div>

							<ul class="d-inline-block padding-list list-unstyled text-left mb-30">
								<li><i class="fas fa-check-double"></i>AccumulateGames for Weekend</li>
								<li><i class="fas fa-check-double"></i>Best Experts Tips Combo</li>
								<li><i class="fas fa-check-double"></i>85% Accuracy</li>
							</ul>
							<div class="duration-wrapper temp-mt69">
								<span class="duration-label">Select Duration</span>
								<select class="form-control duration_select"
									onchange="ChangePrice('weekend-price', this )">
									<?php foreach ($Weekends as $weekend) { ?>
									<option value="<?php echo $weekend->Id ?>"><?php echo $weekend->Duration;  ?>
									</option>
									<?php } ?>

								</select>
							</div>
							<button type="button" class="btn btn-secondary">Pay Now</button>

							<!-- <a href="#" class="btn btn-block btn-secondary"><span class="spr-option-textedit-link">Try now</span></a> -->
						</div>
					</div>


				</div>
			</div>
			<div class="bg-wrap">
				<div class="bg"></div>
			</div>
		</section>
		<!-- Pricing Section Ends -->
		<!-- Faq Section -->
		<section id="faq-4col-2"
			class="pb-75   light spr-edit-el spr-oc-show spr-wout">
			<div class="container">
				<div class="row align-items-center">
					<div class="col-12 text-center">
						<h3><strong>Frequently Asked Questions</strong></h3>
						<svg xmlns="http://www.w3.org/2000/svg" height="20" viewBox="0 0 40 20" width="40"
							class="mb-10 svg-secondary" src="images/gallery/decor/line-h-1.svg" alt="sep">
							<path d="m0 8h40v4h-40z" fill-rule="evenodd"></path>
						</svg>
						<p class="mb-50">A list of frequently asked questions, we'll try to answer all questions here, but of you need
							more help, support@90minbet.com</p>

					</div>
							<div class="col-md-6">
									<div class="accordion js-accordion">
										<div class="accordion__item js-accordion-item">
											<div class="accordion-header js-accordion-header">How do I join?</div>
											<div class="accordion-body js-accordion-body">
												<div class="accordion-body__contents">
														All you need do is to register as a member for FREE, afterwards, you can choose a plan of your 
														choice and make payment for it.
												</div>
											</div><!-- end of accordion body -->
										</div><!-- end of accordion item -->
										<div class="accordion__item js-accordion-item">
											<div class="accordion-header js-accordion-header">How do I subscribe?</div>
											<div class="accordion-body js-accordion-body">
												<div class="accordion-body__contents">
														You can subscribe by making payment either online with your card, or 
														a Bank Deposit/Transfer or via PayPal or Mpesa or MTN Mobile Money. 
														Then follow the procedures to activate your paid subscription.  <br>
														<a href="<?php echo base_url('home/how_to_pay') ?>">Click here</a> for more info. 
												</div>
											</div><!-- end of accordion body -->
										</div><!-- end of accordion item -->
										<div class="accordion__item js-accordion-item">
											<div class="accordion-header js-accordion-header">How accurate are your tips?</div>
											<div class="accordion-body js-accordion-body">
												<div class="accordion-body__contents">
														We have dedicated tipsters that are committed to ensure you make more profits than loses during your 
														subscription tenure scoring as high as 90% on the average.*
												</div>
											</div><!-- end of accordion body -->
										</div><!-- end of accordion item -->
										<div class="accordion__item js-accordion-item">
												<div class="accordion-header js-accordion-header">Do you sell fixed matches?</div>
												<div class="accordion-body js-accordion-body">
													<div class="accordion-body__contents">
															No we don’t deal on fixed matches. What we offer are well-analyzed predictions & tips.
													</div>
												</div><!-- end of accordion body -->
											</div><!-- end of accordion item -->
									
									</div><!-- end of accordion -->
			
			
								</div>
								<div class="col-md-6">
									<div class="faq-image">
										<img src="<?php echo asset_url('img/betting-tips.png'); ?>" alt="">
									</div>
			
								</div>
					



				</div>
			</div>
			<div class="bg-wrap">
				<div class="bg"></div>
			</div>
		</section>
		<!-- Faq Section Ends -->
		<!-- Client Feedback -->
		<section id="testimonial-single-5" class="pt-50 pb-50 text-center light">
			<div class="overlay primary-color-fade">

			</div>
			<div class="container">
				<div class="row">
					<div class="feedback-title">
						<h3><strong>Clients Feedback</strong></h3>
					</div>

					<div class="col-lg-8 ml-auto mr-auto">
						<div class="content-box blockquote">
						
							<h4 class="mt-30 mb-30">"<?php echo $Testimonials[0]->Testimony; ?>"</h4>
							<span class="feedback-user">
							<?php echo $Testimonials[0]->FullName; ?>
							</span>
							<span class="feedback-location text-white">
							<?php echo $Testimonials[0]->Country; ?>
							</span>
						</div>
					</div>
				</div>
			</div>
			<div class="bg-wrap">
				<div class="bg"></div>
			</div>
		</section>
		<!-- Client Feedback Ends -->
		<?php $this->load->view("Front/Templates/Footer"); ?>
	</div>



	<?php $this->load->view("Front/Templates/Script"); ?>
	<script>
		$(document).ready(function () {
			$('.home-slider').slick({
				slidesToShow: 1,
				slidesToScroll: 1,
				autoplay: true,
				autoplaySpeed: 5000,
			});
			accordion.init({ speed: 300, oneOpen: true });
		})
		var accordion = (function(){
  
  var $accordion = $('.js-accordion');
  var $accordion_header = $accordion.find('.js-accordion-header');
  var $accordion_item = $('.js-accordion-item');
 
  // default settings 
  var settings = {
    // animation speed
    speed: 400,
    
    // close all other accordion items if true
    oneOpen: false
  };
    
  return {
    // pass configurable object literal
    init: function($settings) {
      $accordion_header.on('click', function() {
        accordion.toggle($(this));
      });
      
      $.extend(settings, $settings); 
      
      // ensure only one accordion is active if oneOpen is true
      if(settings.oneOpen && $('.js-accordion-item.active').length > 1) {
        $('.js-accordion-item.active:not(:first)').removeClass('active');
      }
      
      // reveal the active accordion bodies
      $('.js-accordion-item.active').find('> .js-accordion-body').show();
    },
    toggle: function($this) {
            
      if(settings.oneOpen && $this[0] != $this.closest('.js-accordion').find('> .js-accordion-item.active > .js-accordion-header')[0]) {
        $this.closest('.js-accordion')
               .find('> .js-accordion-item') 
               .removeClass('active')
               .find('.js-accordion-body')
               .slideUp()
      }
      
      // show/hide the clicked accordion item
      $this.closest('.js-accordion-item').toggleClass('active');
      $this.next().stop().slideToggle(settings.speed);
    }
  }
})();


		function ChangePrice(htmlClass, selectOption) {
			var duration = selectOption.value;
			$.post("<?php echo base_url('ajaxCall/getPrice/') ?>" + duration)
				.done(function (response) {
					console.log(response);
					var data = JSON.parse(response);
					if (data.StatusCode == '00') {
						console.log(data.StatusMessage);
						var html = "&#8358;" + addCommas(data.StatusMessage.N) + " / " + "$" + addCommas(data.StatusMessage.U) + " / " + "KSH" + addCommas(data.StatusMessage.K);
						$("." + htmlClass).html(html);
					} else {

					}
				})
				.fail(function (error) {
					console.log(error);
				})
		}
// 		function Person(firstname, lastname) {
//     this.getInitials = function () {
//         firstnameInitial = firstname.charAt(0).toUpperCase();
//         lastnameInitial = lastname.charAt(0).toUpperCase();

//         return firstnameInitial + lastnameInitial;
//     };
// }
// var johnDoe = new Person("john", 'doe');

// console.log(johnDoe.getInitials());

	</script>
</body>

</html>
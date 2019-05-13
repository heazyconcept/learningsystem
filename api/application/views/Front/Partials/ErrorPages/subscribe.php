
<!DOCTYPE html>
<html lang="en">
<?php $this->load->view("Front/Templates/Header"); ?>

<body class="light-page">
	<div id="wrap">
		<?php $this->load->view("Front/Templates/Navigation"); ?>
		
		<section id="error-page" class="pt-30 pb-30 pt-md-15 pb-md-15 light text-center">
            <div class="container">
            <h4 class="red">Oops</h4>
            <p>You need to Subscribe to <?php echo $accountPlan ?> to access this page</p>

            <div class="error-action">
                <a href="<?php echo base_url("home/how_to_pay") ?>" class="btn btn-primary">How to Pay</a>
                <a href="<?php echo base_url() ?>" class="btn btn-secondary">Back to HomePage</a>

            </div>
            </div>
			
		</section>
	
		<?php $this->load->view("Front/Templates/Footer"); ?>
	</div>



	<?php $this->load->view("Front/Templates/Script"); ?>

</body>

</html>
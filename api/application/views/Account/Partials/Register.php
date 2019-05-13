<?php $data["PageTitle"] = $PageTitle; ?>
<?php  $this->load->view("Account/Templates/Head", $data);?>
<?php $Countries = json_decode($this->utilities->GetCountries()); ?>
  <body class="az-body">

    <div class="az-signup-wrapper">
      <div class="az-column-signup-left">
        <div>
            <a href="<?php echo base_url() ?>">
                <img class="img-responsive mw-30 mb-30" src="<?php echo asset_url('img/logo.png') ?>" alt="">
            </a>
            <h5>Already a Member?</h5>
            <p>Log in your details correctly to access our safe tips you can trust.</p>
            <a href="<?php echo base_url('account/Login') ?>" class="btn btn-solid-primary">Sign in</a>
        </div>
      </div><!-- az-column-signup-left -->
      <div class="az-column-signup">
            <a href="<?php echo base_url() ?>">
                    <img class="img-responsive mw-30 mb-30" src="<?php echo asset_url('img/logo.png') ?>" alt="">
                </a>
        <div class="az-signup-header">
          <h2>Get Started</h2>
          <h4>It's free to signup and only takes a minute.</h4>

          <form id="RegisterForm">
            <div class="row">
            <div class="form-group col-md-6">
              <label>Firstname &amp; Lastname</label>
              <input type="text" name="FullName" class="form-control" placeholder="Enter your firstname and lastname">
            </div><!-- form-group -->
            <div class="form-group col-md-6">
              <label>Email</label>
              <input type="email" name="EmailAddress" class="form-control" placeholder="Enter your email">
            </div><!-- form-group -->
            
            <div class="form-group col-md-6">
                    <label>Country</label>
                    <select name="Country" id="CountrySelect" class="form-control select2">
                        <?php foreach ($Countries as $country) { ?>
                            <option value="<?php echo $country->name ?>"><?php echo $country->name ?></option>
                            
                       <?php } ?>
                            
                    </select>
            </div><!-- form-group -->
            <div class="form-group col-md-6">
                    <label>Phone Number</label>
                    <input type="text" name="PhoneNumber" class="form-control" placeholder="Enter your Phone Number">
            </div><!-- form-group -->
            <div class="form-group col-md-6">
              <label>Password</label>
              <input Id="Password" name="Password" type="password" class="form-control" placeholder="Enter your password">
            </div><!-- form-group -->
            <div class="form-group col-md-6">
              <label>Confirm Password</label>
              <input  id="PasswordConfirm" type="password" class="form-control" placeholder="Confirm your password">
            </div><!-- form-group -->

            </div>
            
            
           
            <button class="btn btn-az-primary btn-block">Create Account</button>
            <div class="row row-xs">
              <!-- <div class="col-sm-6"><button class="btn btn-block"><i class="fab fa-facebook-f"></i> Signup with Facebook</button></div> -->
              <!-- <div class="col-sm-6 mg-t-10 mg-sm-t-0"><button class="btn btn-primary btn-block"><i class="fab fa-twitter"></i> Signup with Twitter</button></div> -->
            </div><!-- row -->
          </form>
        </div><!-- az-signup-header -->
        <div class="az-signup-footer">
          <p>Already have an account? <a href="<?php echo base_url('account/Login') ?>">Sign In</a></p>
        </div><!-- az-signin-footer -->
      </div><!-- az-column-signup -->
    </div><!-- az-signup-wrapper -->

    <script>
      $(document).ready(function () {
        $("#CountrySelect").select2();
        $('#RegisterForm').on('submit', function (e) {
          e.preventDefault();
          $('body').loading('start');
          if ($('#Password').val() != $('#PasswordConfirm').val()) {
            notificationMessage("info", "Password mismatch!", "kindly check your password");
            $('body').loading('stop');
            return;
          }
          var formData = new FormData($('form#RegisterForm')[0]);
          // formData.append("actions", "writer_request");
          AjaxInit("<?php echo base_url('authAjax/Register') ?>", formData);


        })
      })
    
    </script>

  <?php $this->load->view("Account/Templates/Footer"); ?>
<?php $data["PageTitle"] = "Register - 90minsbet"; ?>
<?php  $this->load->view("Account/Templates/Head", $data);?>
<?php $Countries = json_decode($this->utilities->GetCountries()); ?>
  

<div class="az-signin-wrapper">
      <div class="az-card-signin">
      <a href="<?php echo base_url() ?>">
                <img class="img-responsive mw-30 mb-30" src="<?php echo asset_url('img/logo.png') ?>" alt="">
            </a>
        <div class="az-signin-header">
          <h2>Welcome back!</h2>
          <h4>Please sign in to continue</h4>

          <form id="LoginForm">
            <div class="form-group">
              <label>Email</label>
              <input type="text" class="form-control" name="EmailAddress" placeholder="Enter your email" required>
            </div><!-- form-group -->
            <div class="form-group">
              <label>Password</label>
              <input type="password" class="form-control" name="Password" placeholder="Enter your password" required>
            </div><!-- form-group -->
            <button class="btn btn-az-primary btn-block">Sign In</button>
          </form>
        </div><!-- az-signin-header -->
        <div class="az-signin-footer">
          <p><a href="">Forgot password?</a></p>
          <p>Don't have an account? <a href="<?php echo base_url('account/Register') ?>">Create an Account</a></p>
        </div><!-- az-signin-footer -->
      </div><!-- az-card-signin -->
    </div><!-- az-signin-wrapper -->

    <script>
        $(document).ready(function () {
            $('#LoginForm').on('submit', function (e) {
          e.preventDefault();
          var formData = new FormData($('form#LoginForm')[0]);
          // formData.append("actions", "writer_request");
          AjaxInit("<?php echo base_url('authAjax/Login') ?>", formData, true);


        })
        })
    
    </script>

  <?php $this->load->view("Account/Templates/Footer"); ?>
<?php $data["PageTitle"] = "User Dashboard - 90minbet"; ?>
<?php $this->load->view("User/Partials/Head", $data); ?>

    <?php $this->load->view("User/Partials/Navigation"); ?>

    <div class="az-content">
      <div class="container">
        <div class="az-content-body">

          <h2 class="az-content-title-minimal">Hi, welcome back!</h2>
          <p class="az-content-text-minimal">Your cryptocurrency monitoring and performance dashboard template.</p>

          <!-- your content goes here... -->
        </div><!-- az-content-body -->
      </div>
    </div><!-- az-content -->

    <?php $this->load->view("User/Partials/Scripts"); ?>
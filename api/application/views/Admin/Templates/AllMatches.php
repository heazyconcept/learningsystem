<?php $data["PageTitle"] = "All Matches - 90minsbet"; $data["PresentMenu"] = "matches"; ?>
<?php $this->load->view("Admin/Partials/Head", $data); ?>
<?php $this->load->view("Admin/Partials/Navigation"); ?>


<div class="az-content-body">
    <?php foreach ($LeaguesAvailable as $league ) { ?>
       <?php  $data["LeagueId"] = $league->LeagueId;  ?>
       <?php $this->load->view('Admin/Partials/MatchTable', $data); ?>
  <?php  } ?>
    






    <!-- your content goes here -->
</div><!-- az-content-body -->



<?php $this->load->view("Admin/Partials/Script");
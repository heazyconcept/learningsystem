<?php $data["PageTitle"] = "All Leagues - 90minsbet";  $data["PresentMenu"] = "leagues";?>
<?php $this->load->view("Admin/Partials/Head", $data); ?>
<?php $this->load->view("Admin/Partials/Navigation", $data); ?>
<?php
$Regions = $this->leagues->ListRegion();

?>

<div class="az-content-body">
    <div class="row">

        <div class="col-md-4 col-lg-4 col-xl-4 mg-t-20">
            <div class="card card-dashboard-sixteen">
                <div class="card-header">
                    <h6 class="card-title tx-14 mg-b-0">EUROPE</h6>
                </div><!-- card-header -->
                <div class="card-body">
                    <div class="table-responsive">
                        <?php $data["Region"] = 'Europe'; $this->load->view('Admin/Partials/LeagueTablePartials', $data); ?>
                    </div><!-- table-responsive -->
                </div><!-- card-body -->
            </div><!-- card -->
        </div><!-- col -->
        <div class="col-md-8 col-lg-8 col-xl-8 mg-t-20">
            <div class="row">
                <div class="col-md-6">
                    <div class="card card-dashboard-sixteen">
                        <div class="card-header">
                            <h6 class="card-title tx-14 mg-b-0">AMERICAS</h6>
                        </div><!-- card-header -->
                        <div class="card-body">
                            <div class="table-responsive">
                            <?php $data["Region"] = 'AMERICAS'; $this->load->view('Admin/Partials/LeagueTablePartials', $data); ?>
                               
                            </div><!-- table-responsive -->
                        </div><!-- card-body -->
                    </div><!-- card -->
                    <div class="card card-dashboard-sixteen mg-t-20">
                        <div class="card-header">
                            <h6 class="card-title tx-14 mg-b-0">CUPS</h6>
                        </div><!-- card-header -->
                        <div class="card-body">
                            <div class="table-responsive">
                            <?php $data["Region"] = 'CUPS'; $this->load->view('Admin/Partials/LeagueTablePartials', $data); ?>
                               
                            </div><!-- table-responsive -->
                        </div><!-- card-body -->
                    </div><!-- card -->

                </div>
                <div class="col-md-6">
                        <div class="card card-dashboard-sixteen">
                            <div class="card-header">
                                <h6 class="card-title tx-14 mg-b-0">ASIA AND AUSTRALIA</h6>
                            </div><!-- card-header -->
                            <div class="card-body">
                                <div class="table-responsive">
                                <?php $data["Region"] = 'ASIA AND AUSTRALIA'; $this->load->view('Admin/Partials/LeagueTablePartials', $data); ?>
                                    
                                </div><!-- table-responsive -->
                            </div><!-- card-body -->
                        </div><!-- card -->
                        <div class="card card-dashboard-sixteen mg-t-20">
                            <div class="card-header">
                                <h6 class="card-title tx-14 mg-b-0 ">AFRICA</h6>
                            </div><!-- card-header -->
                            <div class="card-body">
                                <div class="table-responsive">
                                <?php $data["Region"] = 'AFRICA'; $this->load->view('Admin/Partials/LeagueTablePartials', $data); ?>
                                   
                                </div><!-- table-responsive -->
                            </div><!-- card-body -->
                        </div><!-- card -->
                        <div class="card card-dashboard-sixteen mg-t-20">
                                <div class="card-header">
                                    <h6 class="card-title tx-14 mg-b-0">INTERNATIONAL</h6>
                                </div><!-- card-header -->
                                <div class="card-body">
                                    <div class="table-responsive">
                                    <?php $data["Region"] = 'INTERNATIONAL'; $this->load->view('Admin/Partials/LeagueTablePartials', $data); ?>
                                        
                                    </div><!-- table-responsive -->
                                </div><!-- card-body -->
                            </div><!-- card -->
    
                    </div>
            </div>

        </div><!-- col -->





        <!-- your content goes here -->
    </div><!-- rows -->
</div><!-- az-content-body -->



<?php $this->load->view("Admin/Partials/Script");
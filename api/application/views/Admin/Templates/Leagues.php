<?php $data["PageTitle"] = "All Leagues - 90minsbet";  $data["PresentMenu"] = "leagues"; ?>
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
                        <table class="table mg-b-0">
                            <?php foreach ( $this->leagues->ListLeagueByRegion('EUROPE') as $league) { ?>
                            <tbody>
                                <tr>
                                    <td>
                                        <a href="#">Delete</a>
                                    </td>
                                    <td>
                                        <h6 class="mg-b-0 tx-inverse"><?php echo $league->League; ?></h6>

                                    </td>
                                    <td>

                                        <small class="tx-11 tx-gray-500">edit</small>
                                    </td>
                                </tr>
                            </tbody>
                            <?php  } ?>

                        </table>
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
                                <table class="table mg-b-0">
                                    <?php foreach ( $this->leagues->ListLeagueByRegion('AMERICAS') as $league) { ?>
                                    <tbody>
                                        <tr>
                                            <td>
                                                <a href="#">Delete</a>
                                            </td>
                                            <td>
                                                <h6 class="mg-b-0 tx-inverse"><?php echo $league->League; ?></h6>

                                            </td>
                                            <td>

                                                <small class="tx-11 tx-gray-500">edit</small>
                                            </td>
                                        </tr>
                                    </tbody>
                                    <?php  } ?>

                                </table>
                            </div><!-- table-responsive -->
                        </div><!-- card-body -->
                    </div><!-- card -->
                    <div class="card card-dashboard-sixteen mg-t-20">
                        <div class="card-header">
                            <h6 class="card-title tx-14 mg-b-0">CUPS</h6>
                        </div><!-- card-header -->
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table mg-b-0">
                                    <?php foreach ( $this->leagues->ListLeagueByRegion('CUPS') as $league) { ?>
                                    <tbody>
                                        <tr>
                                            <td>
                                                <a href="#">Delete</a>
                                            </td>
                                            <td>
                                                <h6 class="mg-b-0 tx-inverse"><?php echo $league->League; ?></h6>

                                            </td>
                                            <td>

                                                <small class="tx-11 tx-gray-500">edit</small>
                                            </td>
                                        </tr>
                                    </tbody>
                                    <?php  } ?>

                                </table>
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
                                    <table class="table mg-b-0">
                                        <?php foreach ( $this->leagues->ListLeagueByRegion('ASIA AND AUSTRALIA') as $league) { ?>
                                        <tbody>
                                            <tr>
                                                <td>
                                                    <a href="#">Delete</a>
                                                </td>
                                                <td>
                                                    <h6 class="mg-b-0 tx-inverse"><?php echo $league->League; ?></h6>
    
                                                </td>
                                                <td>
    
                                                    <small class="tx-11 tx-gray-500">edit</small>
                                                </td>
                                            </tr>
                                        </tbody>
                                        <?php  } ?>
    
                                    </table>
                                </div><!-- table-responsive -->
                            </div><!-- card-body -->
                        </div><!-- card -->
                        <div class="card card-dashboard-sixteen mg-t-20">
                            <div class="card-header">
                                <h6 class="card-title tx-14 mg-b-0 ">AFRICA</h6>
                            </div><!-- card-header -->
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table class="table mg-b-0">
                                        <?php foreach ( $this->leagues->ListLeagueByRegion('AFRICA') as $league) { ?>
                                        <tbody>
                                            <tr>
                                                <td>
                                                    <a href="#">Delete</a>
                                                </td>
                                                <td>
                                                    <h6 class="mg-b-0 tx-inverse"><?php echo $league->League; ?></h6>
    
                                                </td>
                                                <td>
    
                                                    <small class="tx-11 tx-gray-500">edit</small>
                                                </td>
                                            </tr>
                                        </tbody>
                                        <?php  } ?>
    
                                    </table>
                                </div><!-- table-responsive -->
                            </div><!-- card-body -->
                        </div><!-- card -->
                        <div class="card card-dashboard-sixteen mg-t-20">
                                <div class="card-header">
                                    <h6 class="card-title tx-14 mg-b-0">INTERNATIONAL</h6>
                                </div><!-- card-header -->
                                <div class="card-body">
                                    <div class="table-responsive">
                                        <table class="table mg-b-0">
                                            <?php foreach ( $this->leagues->ListLeagueByRegion('INTERNATIONAL') as $league) { ?>
                                            <tbody>
                                                <tr>
                                                    <td>
                                                        <a href="#">Delete</a>
                                                    </td>
                                                    <td>
                                                        <h6 class="mg-b-0 tx-inverse"><?php echo $league->League; ?></h6>
        
                                                    </td>
                                                    <td>
        
                                                        <small class="tx-11 tx-gray-500">edit</small>
                                                    </td>
                                                </tr>
                                            </tbody>
                                            <?php  } ?>
        
                                        </table>
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
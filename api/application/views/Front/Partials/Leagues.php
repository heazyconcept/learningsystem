<!DOCTYPE html>
<html lang="en">
<?php $this->load->view("Front/Templates/Header"); ?>
<?php $Regions = $this->leagues->ListRegion(); ?>

<body class="light-page">
    <div id="wrap">
        <?php $this->load->view("Front/Templates/Navigation"); ?>
        <div class="page-header">
            <div class="container">
                <h3>Leagues</h3>
            </div>
        </div>


        <section id="inner-list" class="pt-50 pb-50 light spr-edit-el spr-oc-show spr-wout">
            <div class="container">
                <div class="row">
                    <div class="col-md-12 ml-auto mr-auto">
                        <?php foreach ($Regions as $region ) { ?>
                        <div class="league-header">
                            <h4><?php echo $region->Region; ?></h4>
                        </div>
                        <div class="leagues-items">
                            <?php $data['Region'] = $region->Region; ?>
                            <?php $this->load->view("Front/Templates/LeagueItems", $data); ?>
                        </div>
                        <?php } ?>


                    </div>
                </div>
            </div>
            <div class="bg-wrap">
                <div class="bg"></div>
            </div>
        </section>








        <?php $this->load->view("Front/Templates/Footer"); ?>
    </div>



    <?php $this->load->view("Front/Templates/Script"); ?>
</body>

</html>
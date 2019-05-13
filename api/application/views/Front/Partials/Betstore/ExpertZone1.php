<!DOCTYPE html>
<html lang="en">
<?php $this->load->view("Front/Templates/Header"); ?>
<?php $data["BetItems"] = $Betitems; ?>


<body class="light-page">
    <div id="wrap">
        <?php $this->load->view("Front/Templates/Navigation"); ?>
        <div class="page-header">
            <div class="container">
                <h3>Expert Zone 1</h3>
            </div>
        </div>


        <section id="inner-list" class="pt-50 pb-50 light spr-edit-el spr-oc-show spr-wout">
            <div class="container">
              <?php $this->load->view("Front/Templates/BetstoreTemplates/Navigation2"); ?>
                <div class="row">
                    <div class="col-md-12 ml-auto mr-auto mt-50">
                      <?php $this->load->view("Front/Templates/BetstoreTemplates/TableTemplate5", $data); ?>
                    </div>

                    <div class="next-page">
                        <a href="<?php echo base_url('betstore/ExpertZone2') ?>" class="btn btn-primary ">View Expert Zone 2</a>
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

    <script>
    $(document).ready(function () {
        var tableHtml = '';
        $('.time-nav-item').click(function () {
            var matchDate = $(this).data("id");
            $.post('<?php echo base_url("betAjax/ExpertZone1/'+ matchDate +'") ?>')
            .done(function (data) {
                console.log(data);
                
                if (data == 0) {
                  tableHtml = "<tr><td colspan='5'><span class='no-tips'>No tips available at the moment</span></td></tr>"
                } else {
                    var tableResult = JSON.parse(data);
                    tableHtml = '';
                $.each(tableResult, function (key, items) {
                    var tempHtml = "<tr>" +
                        "<td>" + items.Time + "</td>" +
                        "<td>" + items.League + "</td>" +
                        "<td>" + items.Match + "</td>" +
                        "<td>" + items.Tip + "</td>" +
                        "<td>" + items.Odds + "</td>" +
                        "<td>" + items.ConfidenceLevel + "</td>" +
                        "<td>" + items.Score + "</td>" +
                        "</tr>";
                       
                      
                    tableHtml = tableHtml + tempHtml;
                });
               
                }
                $(".BetData").html(tableHtml);
               

            })
           
                $('.time-nav-item').removeClass("active");
                $(this).addClass("active");
        })
    })
    </script>
</body>

</html>
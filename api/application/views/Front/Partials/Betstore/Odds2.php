<!DOCTYPE html>
<html lang="en">
<?php $this->load->view("Front/Templates/Header"); ?>
<?php $data["BetItemsFirst"] = $BetitemsFirst; ?>
<?php $data["BetItemsSecond"] = $BetitemsSecond; ?>


<body class="light-page">
    <div id="wrap">
        <?php $this->load->view("Front/Templates/Navigation"); ?>
        <div class="page-header">
            <div class="container">
                <h3>Odds 2</h3>
            </div>
        </div>


        <section id="inner-list" class="pt-50 pb-50 light spr-edit-el spr-oc-show spr-wout">
            <div class="container">
                <?php $this->load->view("Front/Templates/BetstoreTemplates/Navigation"); ?>
                <div class="row">
                    <div class="col-md-12 ml-auto mr-auto mt-50">
                        <?php $this->load->view("Front/Templates/BetstoreTemplates/TableTemplate8", $data); ?>
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
            var tempHtml = "";
            var tableHtml2 = '';
            var tempHtml2 = "";
            $('.time-nav-item').click(function () {
                var matchDate = $(this).data("id");
                $.post('<?php echo base_url("betAjax/Odds2/' + matchDate + '") ?>')
                    .done(function (data) {
                        console.log(data);
                        var tableResult = JSON.parse(data);
                        if (tableResult.First == 0) {
                            tableHtml = "<tr><td colspan='5'><span class='no-tips'>No tips available at the moment</span></td></tr>"
                        } else {

                            tableHtml = '';
                            $.each(tableResult.First, function (key, items) {
                                tempHtml = "<tr>" +
                                    "<td>" + items.Time + "</td>" +
                                    "<td>" + items.League + "</td>" +
                                    "<td>" + items.Match + "</td>" +
                                    "<td>" + items.Tip + "</td>" +
                                    "<td>" + items.Score + "</td>" +
                                    "</tr>";

                                tableHtml = tableHtml + tempHtml;
                            });
                            tempHtml = "<tr>" +
                                "<td colspan='3'></td>" +
                                "<td><strong>Total Odds:</strong></td>" +
                                "<td>" + tableResult.First[0].TotalOdds + "</td>" +
                                "</tr>";
                            tableHtml = tableHtml + tempHtml;

                        }
                        $(".BetDataFirst").html(tableHtml);
                        if (tableResult.Second == 0) {
                            tableHtml2 = "<tr><td colspan='5'><span class='no-tips'>No tips available at the moment</span></td></tr>"
                        } else {

                            tableHtml2 = '';
                            $.each(tableResult.Second, function (key, items) {
                                tempHtml2 = "<tr>" +
                                    "<td>" + items.Time + "</td>" +
                                    "<td>" + items.League + "</td>" +
                                    "<td>" + items.Match + "</td>" +
                                    "<td>" + items.Tip + "</td>" +
                                    "<td>" + items.Score + "</td>" +
                                    "</tr>";

                                tableHtml2 = tableHtml2 + tempHtml2;
                            });
                            tempHtml2 = "<tr>" +
                                "<td colspan='3'></td>" +
                                "<td><strong>Total Odds:</strong></td>" +
                                "<td>" + tableResult.Second[0].TotalOdds + "</td>" +
                                "</tr>";
                            tableHtml2 = tableHtml2 + tempHtml2;

                        }
                        $(".BetDataSecond").html(tableHtml2);




                    })

                $('.time-nav-item').removeClass("active");
                $(this).addClass("active");
            })
        })
    </script>
</body>

</html>
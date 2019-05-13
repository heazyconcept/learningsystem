<!DOCTYPE html>
<html lang="en">
<?php $this->load->view("Front/Templates/Header"); ?>
<?php $PaystackApi = $this->siteoptions->PayStackKey(); ?>

<body class="light-page">
    <div id="wrap">
        <?php $this->load->view("Front/Templates/Navigation"); ?>
        <!-- <div class="page-header">
            <div class="container">
                <h3>Leagues</h3>
            </div>
        </div> -->


        <section id="contact-form-2" class="pt-50 pb-50 pt-lg-150 pb-lg-150 light spr-edit-el spr-oc-show spr-wout">
            <div class="container">
                <div class="row">
                    <div class="col-lg-5 ml-auto mr-auto">
                        <div class="content-box padding-x3 bg-default shadow">
                            <h3><strong>Make Payment</strong></h3>
                            <p class="mb-30">Please select your payment plan and duration</p>
                            <form class="contact_form mb-30 form-vertical" id="PaymentForm" novalidate="novalidate">
                                <div class="form-group text-field-group">
                                    <select name="PaymentPlan" id="PaymentPlan" class="form-control" onchange="GetDuration(this)">
                                        <option value="">Select payment option</option>
                                        <?php foreach ($AllPlans as $plan ) { ?>
                                        <option value="<?php echo $plan->PlanType; ?>">
                                            <?php echo ucfirst($plan->PlanType); ?></option>
                                        <?php } ?>
                                    </select>

                                </div>
                                <div class="form-group email-field-group">
                                    <select name="PlanDuration" id="DurationSelect" class="form-control"
                                        onchange="ChangePrice(this)">
                                        <option value="">Select Duration</option>
                                    </select>

                                </div>
                                <div class="plan-price">

                                </div>
                                <input type="hidden" name="PlanPrice" id="PlanPrice" value="">
                                <button type="submit" class="btn btn-lg btn-dark mt-30 btn-paynow">Make payment</button>
                            </form>

                        </div>
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
    <script src="https://js.paystack.co/v1/inline.js"></script>
    <script>
        function GetDuration(planOption) {
            var plan = planOption.value;
            var html = '<option value="">Select Duration</option>';
            $.post("<?php echo base_url('ajaxCall/GetDuration/') ?>" + plan)
                .done(function (response) {
                    console.log(response);
                    var data = JSON.parse(response);
                    if (data.StatusCode == '00') {
                        $.each(data.StatusMessage, function (index, value) {
                            html += '<option value="' + value.Id + '" >' + value.Duration + '</option>';
                        });
                        $("#DurationSelect").html(html);

                    } else {

                    }
                })
                .fail(function (error) {
                    console.log(error);
                })
        }
        function ChangePrice(durationOption) {
            var duration = durationOption.value;
            $.post("<?php echo base_url('ajaxCall/getPrice/') ?>" + duration)
                .done(function (response) {
                    console.log(response);
                    var data = JSON.parse(response);
                    if (data.StatusCode == '00') {
                        console.log(data.StatusMessage);
                        var html = "&#8358;" + addCommas(data.StatusMessage.N);
                        $(".plan-price").html(html);
                        $("#PlanPrice").val(data.StatusMessage.N);
                    } else {

                    }
                })
                .fail(function (error) {
                    console.log(error);
                })
        }
        $(document).ready(function () {
            $('#PaymentForm').on('submit', function (e) {
                e.preventDefault();
                var paymentObject = {amount: '', paymentPlan: '', planDuration: '', transactionRef: guid()};
                var planAmount = $("#PlanPrice").val();
                var handler = PaystackPop.setup({
                    key: '<?php echo $PaystackApi; ?>',
                    email: '<?php echo $this->session->userdata("EmailAddress"); ?>',
                    amount: planAmount * 100,
                    ref: paymentObject.transactionRef, // generates a pseudo-unique reference. Please replace with a reference you generated. Or remove the line entirely so our API will generate one for you
                    callback: function (response) {
                        paymentObject.amount = $("#PlanPrice").val();
                        paymentObject.paymentPlan = $("#PaymentPlan").val();
                        paymentObject.planDuration = $("#DurationSelect").val();
                        $.post("<?php echo base_url('paymentAjax/OnlinePayment') ?>", paymentObject)
                        .done(function (response) {
                            console.log(response);
                            
                            try {
                                var data = JSON.parse(response);
                            
                            if (data.StatusCode == "00") {
                                 notificationMessage("success", "Success", "Transaction Successfull. your account has been updated");
                            } else {
                             notificationMessage("info", "Error", data.StatusMessage);
                            }
                            } catch (error) {
                                console.log(error);
                                notificationMessage("error", "Fatal", "Internal Server Error Occurred");
                                
                            }
                           
                        })
                        .fail(function (error) {
                            console.log(error);
                            notificationMessage("error", "Fatal", "Internal Server Error Occurred");
                        })
                    },
                    onClose: function () {
                        alert('window closed');
                    }
                });
                handler.openIframe();
                // swal(`You typed: ${value}`);
                
    
        })
    })
          
    </script>

   
</body>

</html>
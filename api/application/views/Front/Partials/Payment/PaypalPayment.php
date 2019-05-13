<!DOCTYPE html>
<html lang="en">
<?php $this->load->view("Front/Templates/Header"); ?>
<?php $Environment = $this->siteoptions->GetPayPalEnvironment(); ?>
<?php $PaypalKey = $this->siteoptions->GetPayPalKey(); ?>

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
                                <div id="paypal-button"></div>
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
    <script src="https://www.paypalobjects.com/api/checkout.js"></script>
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
                        var html = "$" + addCommas(data.StatusMessage.U);
                        $(".plan-price").html(html);
                        $("#PlanPrice").val(data.StatusMessage.U);
                    } else {

                    }
                })
                .fail(function (error) {
                    console.log(error);
                })
        }
        
   
    paypal.Button.render({
    // Configure environment
    env: '<?php echo $Environment; ?>',
    client: {
        <?php  echo $Environment; ?> : '<?php echo $PaypalKey; ?>'
    //   sandbox: 'AQhxKfybCFKsCk3PvQl9I-j1JDmX4kumVxQwtWJT5xtV_XOiSAXJ3gqjDu0f28CJ3TL5XmuQLTWfYOE6',
    //   production: 'AZAPuksZjHfF8lUiHi3LvjO0rz7cEMZZeYVJ9dlbkTuPA5D3M5OJ4eXPSHYm6Y-hq325Et5HkwlP2RLx'
    },
    // Customize button (optional)
    locale: 'en_US',
    style: {
      size: 'small',
      color: 'gold',
      shape: 'pill',
    },

    // Enable Pay Now checkout flow (optional)
    commit: true,

    // Set up a payment
    payment: function (data, actions) {
      return actions.payment.create({
        transactions: [{
          amount: {
            total: $("#PlanPrice").val(),
            currency: 'USD'
          }
        }]
      });
    },
    // Execute the payment
    onAuthorize: function (data, actions) {
      return actions.payment.execute().then(function () {
        var paymentObject = {amount: '', paymentPlan: '', planDuration: '', transactionRef: guid()};
        paymentObject.amount = $("#PlanPrice").val();
        paymentObject.paymentPlan = $("#PaymentPlan").val();
        paymentObject.planDuration = $("#DurationSelect").val();
        $.post("<?php echo base_url('paymentAjax/PaypalPayment') ?>", paymentObject)
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
        // Show a confirmation message to the buyer
        // window.alert('Thank you for your purchase!');
        $.post("<?php echo base_url('payment_ajax/renew_plan') ?>", { amount: GlobalAmount, yardstick: GlobalYardStick, unit: GlobalUnit, plan: GlobalPlan, email: GlobalEmail['value'] })
          .done(function (result) {
            console.log(result);
            response = JSON.parse(result);
            if (response.responseCode == 1) {
              swal('Success', 'your subscription is automatically updated', 'success');
              $("#paypal-button").hide();
            } else {
              swal('Error', response.responseValue, 'error');
            }

          })
          .fail(function (error) {
            console.log(error);

          })

      });
    }
  }, '#paypal-button');
    </script>

   
</body>

</html>
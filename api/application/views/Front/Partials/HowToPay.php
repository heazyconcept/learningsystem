<?php $Countries = json_decode($this->utilities->GetCountries()); ?>

<!DOCTYPE html>
<html lang="en">
<?php $this->load->view("Front/Templates/Header"); ?>

<body class="light-page">
    <div id="wrap">
        <?php $this->load->view("Front/Templates/Navigation"); ?>
        <div class="page-header">
            <div class="container">
                <h3>How To pay</h3>
            </div>
        </div>


        <section id="inner-list" class="pt-50 pb-50 light spr-edit-el spr-oc-show spr-wout">
            <div class="container">
                <div class="country-selection-wrapper">
                    <div class="form-group ">
                        <label>Select Your Country</label>
                        <select name="Country" id="CountrySelect" class="form-control select2">
                            <option value="">Select Country</option>
                            <?php foreach ($Countries as $country) { ?>
                            <option value="<?php echo $country->name ?>" <?php echo (!empty($mycountry) && $mycountry == $country->name)? "selected": ''; ?>><?php echo $country->name ?></option>
                            <?php } ?>

                        </select>
                    </div>
                </div>
                <!-- Nigeria -->
                <div class="nigeria-payment payment-section" style="<?php echo (!empty($mycountry) && $mycountry == "Nigeria")? '': 'display: none;'; ?>">
                    <p class="red text-center" style="font-size: 18px;">Ensure you have registered on the website!</p>

                    <h3 class="payment-section-title">NIGERIA</h3>
                    <h4 class="payment-plan-title">OUR PAYMENT PLANS</h4>
                    <div class="payment-sub-section">
                        <div class="pymt-sub-section-item">
                            <div class="row">
                                <div class="col-md-3">
                                    <h4 class="payment-sub-title">Premium Plan</h4>
                                </div>
                                <div class="col-md-9">
                                    <ul class="payment-lists">
                                        <li class="payment-item">
                                            <?php echo $this->utilities->Currency(); ?>2,000 - 1 Month
                                        </li>
                                        <li class="payment-item">
                                            <?php echo $this->utilities->Currency(); ?>5,000 - 3 Months
                                        </li>
                                        <li class="payment-item">
                                            <?php echo $this->utilities->Currency(); ?>10,000 - 6 Months
                                        </li>
                                        <li class="payment-item">
                                            <?php echo $this->utilities->Currency(); ?>18,000 - 1 Year
                                        </li>
                                    </ul>
                                </div>

                            </div>

                        </div>
                        <div class="pymt-sub-section-item">
                            <div class="row">
                                <div class="col-md-3">
                                    <h4 class="payment-sub-title">Pro Plan</h4>
                                </div>
                                <div class="col-md-9">
                                    <ul class="payment-lists">
                                        <li class="payment-item">
                                            <?php echo $this->utilities->Currency(); ?>4,000 - 1 Week
                                        </li>
                                        <li class="payment-item">
                                            <?php echo $this->utilities->Currency(); ?>5,000 - 2 Weeks
                                        </li>
                                        <li class="payment-item">
                                            <?php echo $this->utilities->Currency(); ?>10,000 - 3 Weeks
                                        </li>

                                    </ul>
                                </div>

                            </div>

                        </div>
                        <div class="pymt-sub-section-item">
                            <div class="row">
                                <div class="col-md-3">
                                    <h4 class="payment-sub-title">Rollover Plan</h4>
                                </div>
                                <div class="col-md-9">
                                    <ul class="payment-lists">
                                        <li class="payment-item">
                                            <?php echo $this->utilities->Currency(); ?>4,100 - 10 Days
                                        </li>
                                    </ul>
                                </div>

                            </div>

                        </div>
                        <div class="pymt-sub-section-item">
                            <div class="row">
                                <div class="col-md-3">
                                    <h4 class="payment-sub-title">Weekend 20 Plan</h4>
                                </div>
                                <div class="col-md-9">
                                    <ul class="payment-lists">
                                        <li class="payment-item">
                                            <?php echo $this->utilities->Currency(); ?>2,500 - Fri - Sun
                                        </li>
                                    </ul>
                                </div>

                            </div>

                        </div>

                    </div>

                    <div class="payment-item-main">

                        <h4><strong>BANK DEPOSIT/TRANSFER</strong></h4>
                        <p>Payments can be made only to <br>
                            90MINS GAMING <br>
                            10XXXXXXXX <br>
                            UBA</p>
                        <p>After making payments, kindly get back to us via SMS on 090xxxxxxxx</p>
                        <p>For Bank Deposit:</p>
                        <ul>
                            <li>Depositor’s name</li>
                            <li>Email address or USER ID (registered on 90minsbet)</li>
                            <li>Amount paid and plan paid for</li>
                        </ul>
                        <p>For Transfer via USSD Code/ATM Transfer/Online Transfer:</p>
                        <ul>
                            <li>Name of the account you transferred from</li>
                            <li>Email address or USER ID (registered on 90minsbet)</li>
                            <li>Amount paid and plan paid for</li>
                        </ul>

                    </div>
                    <div class="payment-item-main">
                        <h4><strong>PAY ONLINE WITH YOUR DEBIT/CREDIT CARD</strong></h4>
                        <p>You can make payment online by using your debit card and it will reflect on your account
                            immediately</p>
                        <a href="<?php echo base_url('Payment/OnlinePayment'); ?>" class="btn btn-success btn-make-payment">Make Payment Now</a>

                    </div>
                    <div class="disclaimer-wrapper">
                        <small>
                            Disclaimer: Please be informed that there will be no refunds and credits are not
                            exchangeable for cash. By opting to receive soccer predictions and tips, you accept that all
                            90minsbet’s predictions and tips are for informational purposes only and that 90minsbet will
                            take no responsibility for any losses incurred by you, the subscriber, as a direct result of
                            acting upon received 90minsbet’s information. We do not encourage gambling in any sort of
                            form. Users under 18 years old must seek parental consent. For full terms and conditions,
                            please refer to Terms and Conditions
                        </small>
                    </div>
                </div>
                <!-- End Nigeria -->
                <!-- Ghana -->
                <div class="ghana-payment payment-section" style="<?php echo (!empty($mycountry) && $mycountry == "Ghana")? '': 'display: none;'; ?>">
                    <p class="red text-center" style="font-size: 18px;">Ensure you have registered on the website!</p>
                
                    <h3 class="payment-section-title">GHANA</h3>
                    <h4 class="payment-plan-title">OUR PAYMENT PLANS</h4>
                    <div class="payment-sub-section">
                        <div class="pymt-sub-section-item">
                            <div class="row">
                                <div class="col-md-3">
                                    <h4 class="payment-sub-title">Premium Plan</h4>
                                </div>
                                <div class="col-md-9">
                                    <ul class="payment-lists">
                                        <li class="payment-item">
                                            90 GHS - 1 Month
                                        </li>
                                        <li class="payment-item">
                                            150 GHS - 3 Months
                                        </li>
                                        <li class="payment-item">
                                            250 GHS - 6 Months
                                        </li>
                                        <li class="payment-item">
                                            400 GHS - 1 Year
                                        </li>
                                    </ul>
                                </div>
                
                            </div>
                
                        </div>
                        <div class="pymt-sub-section-item">
                            <div class="row">
                                <div class="col-md-3">
                                    <h4 class="payment-sub-title">Pro Plan</h4>
                                </div>
                                <div class="col-md-9">
                                    <ul class="payment-lists">
                                        <li class="payment-item">
                                            100 GHS - 1 Week
                                        </li>
                                        <li class="payment-item">
                                            160 GHS - 2 Weeks
                                        </li>
                                        <li class="payment-item">
                                            210 GHS - 3 Weeks
                                        </li>
                
                                    </ul>
                                </div>
                
                            </div>
                
                        </div>
                        <div class="pymt-sub-section-item">
                            <div class="row">
                                <div class="col-md-3">
                                    <h4 class="payment-sub-title">Rollover Plan</h4>
                                </div>
                                <div class="col-md-9">
                                    <ul class="payment-lists">
                                        <li class="payment-item">
                                            120 GHS - 10 Days
                                        </li>
                                    </ul>
                                </div>
                
                            </div>
                
                        </div>
                        <div class="pymt-sub-section-item">
                            <div class="row">
                                <div class="col-md-3">
                                    <h4 class="payment-sub-title">Weekend 20 Plan</h4>
                                </div>
                                <div class="col-md-9">
                                    <ul class="payment-lists">
                                        <li class="payment-item">
                                            80 GHS - Fri - Sun
                                        </li>
                                    </ul>
                                </div>
                
                            </div>
                
                        </div>
                
                    </div>
                
                    <div class="payment-item-main">
                
                        <h4><strong>Pay via MTN MOBILE MONEY (GHANA)</strong></h4>
                        <p>All payments should be made only to +233xxxxxxx <br>
                        </p>
                        <p>After making payments, ensure you send the payment details
                            (MTN MOBILE MONEY NAME, date of payment, amount paid and plan you paid for)
                            and registered email address as a text message or whatsapp message
                            to +233xxxxxxx. </p>
                        <p>Your 90MINSBET account would be upgraded within 12hours of payment confirmation</p>
                
                    </div>
                
                    <div class="disclaimer-wrapper">
                        <small>
                            Please be informed that there will be no refunds and credits are not
                            exchangeable for cash. By opting to receive soccer predictions and
                            tips, you accept that all 90minsbet’s predictions and tips are for
                            informational purposes only and that 90minsbet will take no
                            responsibility for any losses incurred by you, the subscriber, as a
                            direct result of acting upon received 90minsbet’s information.
                            We do not encourage gambling in any sort of form. Users under 18 years
                            old must seek parental consent. For full terms and conditions, please
                            refer to Terms and Conditions
                        </small>
                    </div>
                </div>
                <!-- End Ghana -->
                <!-- Kenya Tanzania -->
                <?php $Myarrays = array("Kenya", "Tanzania"); ?>
                <div class="kenya-tanzania-payment payment-section" style="<?php echo (!empty($mycountry) && in_array($mycountry, $Myarrays))? '': 'display: none;'; ?>">
                    <p class="red text-center" style="font-size: 18px;">Ensure you have registered on the website!</p>
                
                    <h3 class="payment-section-title">KENYA, TANZANIA</h3>
                    <h4 class="payment-plan-title">OUR PAYMENT PLANS</h4>
                    <div class="payment-sub-section">
                        <div class="pymt-sub-section-item">
                            <div class="row">
                                <div class="col-md-3">
                                    <h4 class="payment-sub-title">Premium Plan</h4>
                                </div>
                                <div class="col-md-9">
                                    <ul class="payment-lists">
                                        <li class="payment-item">
                                            2,000 KSH - 1 Month
                                        </li>
                                        <li class="payment-item">
                                            5,000 KSH- 3 Months
                                        </li>
                                        <li class="payment-item">
                                            10,000 KSH - 6 Months
                                        </li>
                                        <li class="payment-item">
                                            15,000 KSH - 1 Year
                                        </li>
                                    </ul>
                                </div>
                
                            </div>
                
                        </div>
                        <div class="pymt-sub-section-item">
                            <div class="row">
                                <div class="col-md-3">
                                    <h4 class="payment-sub-title">Pro Plan</h4>
                                </div>
                                <div class="col-md-9">
                                    <ul class="payment-lists">
                                        <li class="payment-item">
                                            4,000 KSH - 1 Week
                                        </li>
                                        <li class="payment-item">
                                            7,000 KSH - 2 Weeks
                                        </li>
                                        <li class="payment-item">
                                            9,000 KSH - 3 Weeks
                                        </li>
                
                                    </ul>
                                </div>
                
                            </div>
                
                        </div>
                        <div class="pymt-sub-section-item">
                            <div class="row">
                                <div class="col-md-3">
                                    <h4 class="payment-sub-title">Rollover Plan</h4>
                                </div>
                                <div class="col-md-9">
                                    <ul class="payment-lists">
                                        <li class="payment-item">
                                            4,100 KSH - 10 Days
                                        </li>
                                    </ul>
                                </div>
                
                            </div>
                
                        </div>
                        <div class="pymt-sub-section-item">
                            <div class="row">
                                <div class="col-md-3">
                                    <h4 class="payment-sub-title">Weekend 20 Plan</h4>
                                </div>
                                <div class="col-md-9">
                                    <ul class="payment-lists">
                                        <li class="payment-item">
                                            2,500 KSH - Fri - Sun
                                        </li>
                                    </ul>
                                </div>
                
                            </div>
                
                        </div>
                
                    </div>
                
                    <div class="payment-item-main">
                
                        <h4><strong>PAY VIA MPESA </strong></h4>
                        <p>All payments should be made only to +254xxxxxxx
                        </p>
                        <p>After making payments, ensure you send the payment details (MPESA name, date of payment, amount
                            paid and plan you paid for) and registered email address as a text message or whatsapp message
                            to +254xxxxxxxxxx </p>
                        <p>Your 90MINSBET account would be upgraded within 12hours of payment confirmation</p>
                
                    </div>
                
                    <div class="disclaimer-wrapper">
                        <small>
                            Please be informed that there will be no refunds and credits are not exchangeable for cash. By opting
                            to receive soccer predictions and tips, you accept that all 90minsbet’s predictions and tips are for
                            informational purposes only and that 90minsbet will take no responsibility for any losses incurred by
                            you, the subscriber, as a direct result of acting upon received 90minsbet’s information. We do not
                            encourage gambling in any sort of form. Users under 18 years old must seek parental consent. For full
                            terms and conditions, please refer to Terms and Conditions
                        </small>
                    </div>
                </div>
                <!-- End Kenya Tanzania -->
                <!-- Uganda -->
                <div class="uganda-payment payment-section" style="<?php echo (!empty($mycountry) && $mycountry == "Uganda")? '': 'display: none;'; ?>">
                    <p class="red text-center" style="font-size: 18px;">Ensure you have registered on the website!</p>
                
                    <h3 class="payment-section-title">UGANDA</h3>
                    <h4 class="payment-plan-title">OUR PAYMENT PLANS</h4>
                    <div class="payment-sub-section">
                        <div class="pymt-sub-section-item">
                            <div class="row">
                                <div class="col-md-3">
                                    <h4 class="payment-sub-title">Premium Plan</h4>
                                </div>
                                <div class="col-md-9">
                                    <ul class="payment-lists">
                                        <li class="payment-item">
                                            70,000 UGX - 1 Month
                                        </li>
                                        <li class="payment-item">
                                            150,000 UGX- 3 Months
                                        </li>
                                        <li class="payment-item">
                                            300,000 UGX - 6 Months
                                        </li>
                                        <li class="payment-item">
                                            500,000 UGX - 1 Year
                                        </li>
                                    </ul>
                                </div>
                
                            </div>
                
                        </div>
                        <div class="pymt-sub-section-item">
                            <div class="row">
                                <div class="col-md-3">
                                    <h4 class="payment-sub-title">Pro Plan</h4>
                                </div>
                                <div class="col-md-9">
                                    <ul class="payment-lists">
                                        <li class="payment-item">
                                            110,000 UGX - 1 Week
                                        </li>
                                        <li class="payment-item">
                                            180,000 UGX - 2 Weeks
                                        </li>
                                        <li class="payment-item">
                                            260,000 UGX- 3 Weeks
                                        </li>
                
                                    </ul>
                                </div>
                
                            </div>
                
                        </div>
                        <div class="pymt-sub-section-item">
                            <div class="row">
                                <div class="col-md-3">
                                    <h4 class="payment-sub-title">Rollover Plan</h4>
                                </div>
                                <div class="col-md-9">
                                    <ul class="payment-lists">
                                        <li class="payment-item">
                                            120,000 UGX - 10 Days
                                        </li>
                                    </ul>
                                </div>
                
                            </div>
                
                        </div>
                        <div class="pymt-sub-section-item">
                            <div class="row">
                                <div class="col-md-3">
                                    <h4 class="payment-sub-title">Weekend 20 Plan</h4>
                                </div>
                                <div class="col-md-9">
                                    <ul class="payment-lists">
                                        <li class="payment-item">
                                            80,000 UGX - Fri - Sun
                                        </li>
                                    </ul>
                                </div>
                
                            </div>
                
                        </div>
                
                    </div>
                
                    <div class="payment-item-main">
                
                        <h4><strong>PAY VIA MTN MOBILE MONEY </strong></h4>
                        <p>All payments should be made only to +256XXXXX</p>
                        <p>After making payments, ensure you send the payment details (MTN MOBILE name, date of payment, amount
                            paid and plan you paid for) and registered email address as a text message or whatsapp message to
                            +256xxxxxxxxxx </p>
                        <p>Your 90MINSBET account would be upgraded within 12hours of payment confirmation</p>
                
                    </div>
                
                    <div class="disclaimer-wrapper">
                        <small>
                            Please be informed that there will be no refunds and credits are not exchangeable for cash. By opting
                            to receive soccer predictions and tips, you accept that all 90minsbet’s predictions and tips are for
                            informational purposes only and that 90minsbet will take no responsibility for any losses incurred by
                            you, the subscriber, as a direct result of acting upon received 90minsbet’s information. We do not
                            encourage gambling in any sort of form. Users under 18 years old must seek parental consent. For full
                            terms and conditions, please refer to Terms and Conditions
                        </small>
                    </div>
                </div>
                <!-- End Uganda -->
                <!-- Others -->
                <?php $Myarrays = array("Kenya", "Tanzania", "Nigeria", "Ghana", "Uganda"); ?>
                <div class="others-payment payment-section" style="<?php echo (!empty($mycountry) && !in_array($mycountry, $Myarrays))? '': 'display: none;'; ?>">
                    <p class="red text-center" style="font-size: 18px;">Ensure you have registered on the website!</p>
                
                    <h3 class="payment-section-title">THE REST OF THE WORLD</h3>
                    <h4 class="payment-plan-title">OUR PAYMENT PLANS</h4>
                    <div class="payment-sub-section">
                        <div class="pymt-sub-section-item">
                            <div class="row">
                                <div class="col-md-3">
                                    <h4 class="payment-sub-title">Premium Plan</h4>
                                </div>
                                <div class="col-md-9">
                                    <ul class="payment-lists">
                                        <li class="payment-item">
                                            $20 - 1 Month
                                        </li>
                                        <li class="payment-item">
                                        $50 - 3 Months
                                        </li>
                                        <li class="payment-item">
                                        $100 - 6 Months
                                        </li>
                                        <li class="payment-item">
                                        $180 - 1 Year
                                        </li>
                                    </ul>
                                </div>
                
                            </div>
                
                        </div>
                        <div class="pymt-sub-section-item">
                            <div class="row">
                                <div class="col-md-3">
                                    <h4 class="payment-sub-title">Pro Plan</h4>
                                </div>
                                <div class="col-md-9">
                                    <ul class="payment-lists">
                                        <li class="payment-item">
                                        $40 - 1 Week
                                        </li>
                                        <li class="payment-item">
                                        $70 - 2 Weeks
                                        </li>
                                        <li class="payment-item">
                                        $90- 3 Weeks
                                        </li>
                
                                    </ul>
                                </div>
                
                            </div>
                
                        </div>
                        <div class="pymt-sub-section-item">
                            <div class="row">
                                <div class="col-md-3">
                                    <h4 class="payment-sub-title">Rollover Plan</h4>
                                </div>
                                <div class="col-md-9">
                                    <ul class="payment-lists">
                                        <li class="payment-item">
                                        $41 - 10 Days
                                        </li>
                                    </ul>
                                </div>
                
                            </div>
                
                        </div>
                        <div class="pymt-sub-section-item">
                            <div class="row">
                                <div class="col-md-3">
                                    <h4 class="payment-sub-title">Weekend 20 Plan</h4>
                                </div>
                                <div class="col-md-9">
                                    <ul class="payment-lists">
                                        <li class="payment-item">
                                        $25 - Fri - Sun
                                        </li>
                                    </ul>
                                </div>
                
                            </div>
                
                        </div>
                
                    </div>
                
                    <div class="payment-item-main">
                
                        <h4><strong>PAY VIA PAYPAL </strong></h4>
                        <p>You can make payment online by using PayPal and it will reflect on your account
                                immediately</p>
                            <a href="<?php echo base_url('Payment/PaypalPayment'); ?>" class="btn btn-success btn-make-payment">Make Payment Now</a>
                    </div>
                
                    <div class="disclaimer-wrapper">
                        <small>
                                Please be informed that there will be no refunds and credits are not 
                                exchangeable for cash. By opting to receive soccer predictions and tips, 
                                you accept that all 90minsbet’s predictions and tips are for informational 
                                purposes only and that 90minsbet will take no responsibility for any losses 
                                incurred by you, the subscriber, as a direct result of acting upon received 
                                90minsbet’s information. We do not encourage gambling in any sort of form. 
                                Users under 18 years old must seek parental consent. For full terms and 
                                conditions, please refer to Terms and Conditions 
                        </small>
                    </div>
                </div>
                <!-- End Others -->
    

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
            $("#CountrySelect").select2();
            $("#CountrySelect").on("change", function () {
                var country = $(this).val();
                if (country == "Nigeria") {
                    $(".nigeria-payment").show("slow");
                    $(".ghana-payment").hide("slow");
                    $(".kenya-tanzania-payment").hide("slow");
                    $(".uganda-payment").hide("slow");
                    $(".others-payment").hide("slow");
                }else if (country == "Ghana") {
                    $(".nigeria-payment").hide("slow");
                    $(".ghana-payment").show("slow");
                    $(".kenya-tanzania-payment").hide("slow");
                    $(".uganda-payment").hide("slow");
                    $(".others-payment").hide("slow");
                }else if (country == "Kenya" || country == "Tanzania" ) {
                    $(".nigeria-payment").hide("slow");
                    $(".ghana-payment").hide("slow");
                    $(".kenya-tanzania-payment").show("slow");
                    $(".uganda-payment").hide("slow");
                    $(".others-payment").hide("slow");
                }else if (country == "Uganda") {
                    $(".nigeria-payment").hide("slow");
                    $(".ghana-payment").hide("slow");
                    $(".kenya-tanzania-payment").hide("slow");
                    $(".uganda-payment").show("slow");
                    $(".others-payment").hide("slow");
                }else{
                    $(".nigeria-payment").hide("slow");
                    $(".ghana-payment").hide("slow");
                    $(".kenya-tanzania-payment").hide("slow");
                    $(".uganda-payment").hide("slow");
                    $(".others-payment").show("slow");
                }
            })
        })

    </script>
</body>

</html>
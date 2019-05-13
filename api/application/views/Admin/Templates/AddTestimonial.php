<?php $data["PageTitle"] = "Add Testimonial - 90minsbet"; $data["PresentMenu"] = "testimonials"; ?>
<?php $this->load->view("Admin/Partials/Head", $data); ?>
<?php $this->load->view("Admin/Partials/Navigation"); ?>
<?php $Countries = json_decode($this->utilities->GetCountries()); ?>

<div class="az-content-body">
    <form autocomplete="off" id="TestimonialForm" class="needs-validation was-validated">
        <section class="general-section">
            <div class="form-title">
                <h4>Add Testimonial</h4>
                <hr class="mg-t-10 mg-b-30">
            </div>

            <div class="row row-sm">
                <div class="col-md-5">
                    <div class="row row-sm">
                        <div class="col-lg-12">
                            <div class="form-group has-success mg-b-0">
                                <label class="form-label mg-b-0">Full Name</label>
                                <input class="form-control" name="FullName" placeholder="Enter the Fullname" required
                                    type="text">
                            </div><!-- form-group -->
                        </div><!-- col -->
                        <div class="col-lg-12 mg-t-20">
                            <div class="form-group has-success mg-b-0">
                                <label class="form-label mg-b-0">Country</label>
                                <select class="form-control select2" required name="Country">
                                    <option label="Choose one"></option>
                                    <?php foreach ($Countries as $country ) { ?>
                                    <option value="<?php echo $country->name ?>"><?php echo $country->name ?></option>
                                    <?php } ?>
                                </select>
                            </div><!-- form-group -->
                        </div><!-- col -->

                        <div class="col-lg-12 mg-t-20">
                            <label class="form-label mg-b-0">Testimonial</label>
                            <textarea name="Testimony" class="form-control" type="text"></textarea>
                        </div><!-- col-4 -->
                        <div class="col-md-12 mg-t-20">
                            <label class="form-label mg-b-10">Make Active</label>
                            <div class="az-toggle-group-demo">
                                <div id="IsActive" class="az-toggle az-toggle-success"><span></span></div>
                            </div>
                        </div>
                        <div class="col-md-12 form-action mg-t-20">
                            <button type="submit" class="btn btn-az-primary pd-x-30 mg-r-5">Submit</button>
                            <a href="<?php echo base_url("admin/Testimonials") ?>" class="btn btn-dark pd-x-30">Back</a>

                        </div>

                    </div>

                </div>




            </div><!-- row -->


        </section>









    </form>









    <!-- your content goes here -->
</div><!-- az-content-body -->
<script>
    $(document).ready(function () {
        var postValue;
        var name;
        $('.az-toggle').on('click', function () {
            $(this).toggleClass('on');
            
        })
        $('.select2').select2({
            placeholder: 'Choose one'
        });

        $('#TestimonialForm').on('submit', function (e) {
            e.preventDefault();
            var formData = new FormData($('form#TestimonialForm')[0]);
            var DomIds = $('[id]');
            $.each(DomIds, function (key, value) {
                var _tempId = value.id;
                var tempId = $("#" + _tempId);
                if (tempId.hasClass('az-toggle')) {
                    if (tempId.hasClass('on')) {
                        postValue = 1;
                    } else {
                        postValue = 0;
                    }
                    name = value.id;
                    formData.append(name, postValue);
                }

            })



            // formData.append("actions", "writer_request");
            AjaxInit("<?php echo base_url('adminAjax/AddTestimonial') ?>", formData, false, true);


        })
    })
</script>


<?php $this->load->view("Admin/Partials/Script"); ?>
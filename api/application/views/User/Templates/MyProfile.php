<?php $data["PageTitle"] = "My BetStore - 90minbet"; ?>
<?php $userData = (object) $this->session->userdata(); ?>
<?php $userImage = $data["userImage"] = (empty($userData->ProfileImage))?  'https://via.placeholder.com/500x500': base_url('upload/profile_pic/'.$userData->ProfileImage); ?>
<?php $this->load->view("User/Partials/Head", $data); ?>

<?php $this->load->view("User/Partials/Navigation", $data); ?>
<?php $userId = $this->session->userdata("UserId"); ?>



<div class="az-content az-content-profile">
    <div class="container mn-ht-100p">
        <div class="az-content-left az-content-left-profile">

            <div class="az-profile-overview">
                <div class="az-img-user">
                    <img class="profileImage" src="<?php echo $userImage; ?>" alt="">
                    <input type="file" id="profilePics" name="profilePics" style="display:none;">
                </div><!-- az-img-user -->
                <div class="d-flex justify-content-between mg-b-20">
                    <div>
                        <h5 class="az-profile-name"><?php echo ucwords(strtolower($userData->FullName)); ?></h5>
                    </div>
                    <div class="btn-icon-list">
                        <button Id="initiateUpload" class="btn btn-indigo btn-icon"><i class="typcn typcn-plus-outline"></i></button>
                    </div>
                </div>
                <hr class="mg-y-30">

                <div class="az-content-label tx-13 mg-b-25">Contact Information</div>
                <div class="az-profile-contact-list">
                    <div class="media">
                        <div class="media-icon"><i class="icon ion-md-phone-portrait"></i></div>
                        <div class="media-body">
                            <span>Mobile</span>
                            <div><?php echo $userData->PhoneNumber; ?></div>
                        </div><!-- media-body -->
                    </div><!-- media -->
                    <div class="media">
                        <div class="media-icon"><i class="icon ion-logo-slack"></i></div>
                        <div class="media-body">
                            <span>Email</span>
                            <div><?php echo $userData->EmailAddress; ?></div>
                        </div><!-- media-body -->
                    </div><!-- media -->
                    <div class="media">
                        <div class="media-icon"><i class="icon ion-md-locate"></i></div>
                        <div class="media-body">
                            <span>Country</span>
                            <div><?php echo $userData->Country; ?></div>
                        </div><!-- media-body -->
                    </div><!-- media -->
                </div><!-- az-profile-contact-list -->

            </div><!-- az-profile-overview -->

        </div><!-- az-content-left -->
        <div class="az-content-body az-content-body-profile pd-20">

            <div class="az-content-label mg-b-20">My Dashboard</div>
            <!-- <p class="mg-b-20">Add an optional color header within a card.</p> -->

            <div class="row row-sm">
                <div class="col-md-3">
                    <div class="card bd-0">
                        <div class="card-header tx-medium bd-0 tx-white bg-gray-800">
                            Premium
                        </div><!-- card-header -->
                        <div class="card-body bd bd-t-0">
                            <div class="mg-b-0">
                                <p><strong>Status:</strong>
                                    <?php echo ($this->session->userdata("IsPremium") == 1)? "Active": "Inactive" ?>
                                </p>
                                <?php if ($this->session->userdata("IsPremium") == 1) { ?>
                                <?php $premium = $this->premium->GetByUserId($userId); ?>
                                <p><strong>Expiry Date:</strong>
                                    <?php echo $this->utilities->DateFormat($premium->ExpiryDate); ?></p>
                                <?php } ?>


                            </div>
                        </div><!-- card-body -->
                    </div><!-- card -->
                </div><!-- col -->
                <div class="col-md-3 mg-t-20 mg-md-t-0">
                    <div class="card bd-0">
                        <div class="card-header tx-medium bd-0 tx-white bg-gray-800">
                            Pro
                        </div><!-- card-header -->
                        <div class="card-body bd bd-t-0">
                            <div class="mg-b-0">
                                <p><strong>Status:</strong>
                                    <?php echo ($this->session->userdata("IsPro") == 1)? "Active": "Inactive" ?> </p>
                                <?php if ($this->session->userdata("IsPro") == 1) { ?>
                                <?php $pro = $this->pro->GetByUserId($userId); ?>
                                <p><strong>Expiry Date:</strong>
                                    <?php echo $this->utilities->DateFormat($pro->ExpiryDate); ?></p>
                                <?php } ?>
                            </div>
                        </div><!-- card-body -->
                    </div><!-- card -->
                </div><!-- col -->
                <div class="col-md-3 mg-t-20 mg-md-t-0">
                    <div class="card bd-0">
                        <div class="card-header tx-medium bd-0 tx-white bg-gray-800">
                            Rollover
                        </div><!-- card-header -->
                        <div class="card-body bd bd-t-0">
                            <div class="mg-b-0">
                                <p><strong>Status:</strong>
                                    <?php echo ($this->session->userdata("IsRollOver") == 1)? "Active": "Inactive" ?>
                                </p>
                                <?php if ($this->session->userdata("IsRollOver") == 1) { ?>
                                <?php $rollover = $this->rollover->GetByUserId($userId); ?>
                                <p><strong>Expiry Date:</strong>
                                    <?php echo $this->utilities->DateFormat($rollover->ExpiryDate); ?></p>
                                <?php } ?>
                            </div>
                        </div><!-- card-body -->
                    </div><!-- card -->
                </div><!-- col -->
                <div class="col-md-3 mg-t-20 mg-md-t-0">
                    <div class="card bd-0">
                        <div class="card-header tx-medium bd-0 tx-white bg-gray-800">
                            Weekend 20
                        </div><!-- card-header -->
                        <div class="card-body bd bd-t-0">
                            <div class="mg-b-0">
                                <p><strong>Status:</strong>
                                    <?php echo ($this->session->userdata("IsWeekend20") == 1)? "Active": "Inactive" ?>
                                </p>
                                <?php if ($this->session->userdata("IsWeekend20") == 1) { ?>
                                <?php $weekend = $this->weekend->GetByUserId($userId); ?>
                                <p><strong>Expiry Date:</strong>
                                    <?php echo $this->utilities->DateFormat($weekend->ExpiryDate); ?></p>
                                <?php } ?>
                            </div>
                        </div><!-- card-body -->
                    </div><!-- card -->
                </div><!-- col -->
            </div><!-- row -->
            <div class="other-user-info">
                <nav class="nav az-nav-line nav-tabs">
                    <a href="#AccountInfo" data-toggle="tab" class="nav-link active" data-toggle="tab">Account
                        Information</a>
                    <a href="#PasswordChange" data-toggle="tab" class="nav-link" data-toggle="tab">Change Password</a>
                </nav>

                <div class="az-profile-body tab-content">
                    <div id="AccountInfo" class="tab-pane active show">
                        <div class="row mg-b-20">
                            <div class="col-md-8 mg-t-40 mg-md-t-0">
                                <div class="az-content-label tx-13 mg-b-20">Account Information</div>
                                <div class="row row-xs">
                                    <div class="col-md-6 mg-b-20">
                                        <div class="az-form-group">
                                            <label class="form-label">Full Name</label>
                                            <input type="text" id="FullName" class="form-control"
                                                value="<?php echo $userData->FullName ?>">
                                        </div><!-- az-form-group -->
                                    </div><!-- col -->
                                    <div class="col-md-6 mg-b-20 ">
                                        <div class="az-form-group">
                                            <label class="form-label">Email Address</label>
                                            <input type="email" id="EmailAddress" class="form-control"
                                                value="<?php echo $userData->EmailAddress; ?>">
                                        </div><!-- az-form-group -->
                                    </div><!-- col -->
                                    <div class="col-md-6 mg-b-20 ">
                                        <div class="az-form-group">
                                            <label class="form-label"> Phone Number</label>
                                            <input type="text" id="PhoneNumber" class="form-control"
                                                value="<?php echo $userData->PhoneNumber; ?>">
                                        </div><!-- az-form-group -->
                                    </div><!-- col -->
                                    <div class="col-md-6 mg-b-20 ">
                                        <div class="az-form-group">
                                            <label class="form-label"> Country</label>
                                            <input type="text" id="Country" class="form-control"
                                                value="<?php echo $userData->Country; ?>">
                                        </div><!-- az-form-group -->
                                    </div><!-- col -->
                                    <div class="col-md-12 mg-t-0">
                                        <button id="UpdateInformation" type="button"
                                            class="btn btn-primary btn-block btn-user-action">Update</button>
                                    </div>
                                </div><!-- row -->

                            </div><!-- col -->
                        </div><!-- row -->

                    </div>
                    <div id="PasswordChange" class="tab-pane">
                        <div class="row mg-b-20">
                            <div class="col-md-8 mg-t-40 mg-md-t-0">
                                <div class="az-content-label tx-13 mg-b-20">Change Your Password</div>
                                <div class="row row-xs">
                                    <div class="col-md-6 mg-b-20">
                                        <div class="az-form-group">
                                            <label class="form-label">Current Password</label>
                                            <input type="password" id="CurrentPassword" class="form-control" value="">
                                        </div><!-- az-form-group -->
                                    </div><!-- col -->
                                    <div class="col-md-6 mg-b-20 ">
                                        <div class="az-form-group">
                                            <label class="form-label">New Password</label>
                                            <input type="password" id="NewPassword" class="form-control" value="">
                                        </div><!-- az-form-group -->
                                    </div><!-- col -->
                                    <div class="col-md-6 mg-b-20 ">
                                        <div class="az-form-group">
                                            <label class="form-label">Confirm Password </label>
                                            <input type="password" id="ConfirmPassword" class="form-control" value="">
                                        </div><!-- az-form-group -->
                                    </div><!-- col -->

                                    <div class="col-md-6 mg-b-20">
                                        <button id="UpdatePassword"
                                            class="btn btn-primary btn-block btn-user-action pd-13">Update</button>
                                    </div>
                                </div><!-- row -->

                            </div><!-- col -->
                        </div><!-- row -->

                    </div>


                </div><!-- az-profile-body -->
            </div>
        </div><!-- az-content-body -->
    </div><!-- container -->
</div><!-- az-content -->

<?php $this->load->view("User/Partials/Scripts"); ?>
<script>
    $(document).ready(function () {
        var userInfo = { FullName: "", PhoneNumber: "", EmailAddress: "", Country: "" }
        var passwordData = { CurrentPassword: "", NewPassword: "" }
        $("#UpdateInformation").click(function () {
            userInfo.FullName = $("#FullName").val();
            userInfo.PhoneNumber = $("#PhoneNumber").val();
            userInfo.EmailAddress = $("#EmailAddress").val();
            userInfo.Country = $("#Country").val();
            console.log(userInfo);
            SimpleAjaxInit("<?php echo base_url("userAjax/UpdateUserInfo"); ?>", userInfo, false, true);
        });
        $("#UpdatePassword").click(function () {
            if ($("#NewPassword").val() != $("#ConfirmPassword").val()) {
                notificationMessage("error", "Password Mismatch!", "Confirmed password does not match please check the password and try again");
                return;
            }
            passwordData.CurrentPassword = $("#CurrentPassword").val();
            passwordData.NewPassword = $("#NewPassword").val();
            SimpleAjaxInit("<?php echo base_url("userAjax/UpdatePassword"); ?>", passwordData, true, false, true);
        })
        $("#initiateUpload").click(function () {
            $("#profilePics").click();
        });
        $(document).on("change", "#profilePics", function () {
            var fileProperty = document.getElementById('profilePics').files[0];
            var profileData = new FormData();
            profileData.append("file", fileProperty);
            $.ajax({
                url: '<?php echo base_url('ajaxCall/ProfileUpload') ?>',
                method: 'POST',
                data: profileData,
                contentType: false,
                cache: false,
                processData: false,
                success: function (data) {
                    console.log(data);
                   try {
                    var ImageResponse = JSON.parse(data);
                    if (ImageResponse.StatusCode == "00") {
                        $(".profileImage").attr("src", ImageResponse.StatusMessage);
                    } else {
                        notificationMessage('info', 'Error', ImageResponse.StatusMessage);
                    }
                   } catch (error) {
                       console.log(error);
                       notificationMessage('error', 'Error', 'Internal server error occurred');
                   }
                },
                error: function (error) {
                    console.log(error);
                    notificationMessage('error', 'Error', 'Internal server error occurred');
                }

            })
        })
        
    })
</script>
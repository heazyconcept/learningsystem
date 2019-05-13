<?php $data["PageTitle"] = "Users  - 90minsbet"?>
<?php $this->load->view("Admin/Partials/Head", $data);?>
<?php $this->load->view("Admin/Partials/Navigation");?>


<div class="az-content-body az-content-body-contacts">
    <div class="container">
        <div class="row">
            <div class="col-md-2">
                <div class="user-search-wrapper">
                    <input type="text" class="form-control" placeholder="Search user" id="userSearch">
                </div>
                <div class="az-content-left az-content-left-contacts">


                    <div id="azContactList" class="az-contacts-list">
                        <?php $i = 0;
                        foreach ($Users as $user) {?>
                        <div data-id="<?php echo $user->IdHash ?>"
                            class="az-contact-item <?php echo ($i == 0) ? 'selected' : ''; ?>">
                            <div class="az-contact-body">
                                <h6><?php echo $user->FullName; ?></h6>
                                <span class="phone"><?php echo $user->PhoneNumber; ?></span>
                            </div><!-- az-contact-body -->
                        </div><!-- az-contact-item -->
                        <?php $i++;?>
                        <?php }?>


                    </div><!-- az-contacts-list -->

                </div><!-- az-content-left -->

            </div>
            <div class="col-md-10" id="UserDetails">
                <?php $data["UserData"] = $Users[0]; ?>
                <?php $this->load->view("Admin/PartialPages/UserAccount", $data); ?>
               


            </div>
        </div>
    </div>


</div><!-- az-content-body -->


<script>
    $(document).ready(function () {
        $("body").on('click', '.az-contact-item', function () {
            var userHash = $(this).data("id");
            $("#UserDetails").load("<?php echo base_url('partialPages/UserAccount/') ?>" + userHash);
            $(".selected").removeClass("selected");
            $(this).addClass("selected");
        });

        $("#userSearch").keyup(function () {
            var searchParam = $(this).val();
            $.post("<?php echo base_url('adminAjax/SearchUsers/') ?>" + searchParam)
                .done(function (data) {
                    console.log(data);

                    var html = "";
                    if (data != '' || data != ' ') {
                        var userArray = JSON.parse(data);
                        $.each(userArray, function (key, value) {
                            html += '<div data-id="' + value.IdHash + '" class="az-contact-item">';
                            html += '<div class="az-contact-body">';
                            html += '<h6>' + value.FullName + '</h6>';
                            html += '<span class="phone">' + value.PhoneNumber + '</span>';
                            html += '</div><!-- az-contact-body -->';
                            html += '</div><!-- az-contact-item -->';
                        });

                    }

                    $("#azContactList").html(html);
                    $('body').loading('stop');
                })
                .fail(function (error) {
                    console.log(error);
                })
        })

        $("body").on('click', '.btn-initiate-activation', function () {
            $(".temp-date").remove();
            var plan = $(this).data("plan");
            var userId = $(this).data("id")
            $(this).hide();
            html = '<div class="temp-date">' +
                '<div class="input-group">' +
                '<div class="input-group-prepend">' +
                '<div class="input-group-text">' +
                '<i class="typcn typcn-calendar-outline tx-24 lh--9 op-6"></i>' +
                '</div>' +
                '</div>' +
                '<input id="expirydate" type="text" class="form-control fc-datepicker"  placeholder="DD/MM/YYYY">' +
                '</div>' +
                "</div>" +
                '<div>' +
                '<button type="button" data-plan="' + plan + '" data-id="' + userId + '" class="btn btn-az-primary pd-x-30 mg-r-5 update-this">Update</button>';
            '</div>'
            $(this).parent().before(html)


            $('.fc-datepicker').datetimepicker({
                showClose: true
            });
        })
        $(document).on('click', '.update-this', function () {
            var plan = $(this).data("plan");
            var userId = $(this).data("id");
            //    alert($(".temp-date").html());
            var expiryDate = $("#expirydate").val();
            var updateData = { userId: userId, plan: plan, expiryDate: expiryDate }
            $.post("<?php echo base_url('adminAjax/RenewAccount/') ?>", updateData)
                .done(function (data) {
                    console.log(data);
                    
                    try {
                        var response = JSON.parse(data);
                        if (response.StatusCode == "00") {
                            notificationMessage("success", "Success", "Account updated");
                            $("#UserDetails").load("<?php echo base_url('partialPages/UserAccount/') ?>" + userId);
                        } else {
                            notificationMessage("info", "Error", response.StatusMessage);
                        }
                    } catch (error) {
                        console.log(error);
                        notificationMessage("error", "Error", "Internal server error");
                    }
                })
                .fail(function (error) {
                    console.log(error);
                    notificationMessage("error", "Error", "Internal server error");
                })

        })
    });
</script>
<?php $this->load->view("Admin/Partials/Script");
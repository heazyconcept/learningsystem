<?php $data["PageTitle"] = "All Leagues - 90minsbet";  $data["PresentMenu"] = "leagues"; ?>
<?php $this->load->view("Admin/Partials/Head", $data); ?>
<?php $this->load->view("Admin/Partials/Navigation", $data); ?>
<?php $data['leagueTable'] = $leagueTable; ?>

<div class="az-content-body">
    <div class="row">

        <div class="col-md-7 col-lg-7 col-xl-7 mg-t-20">
            <div class="table-responsive">
                <?php $this->load->view("Admin/Partials/LeagueTable", $data); ?>
            </div><!-- bd -->
        </div><!-- col -->
        <div class="col-md-5 col-lg-5 col-xl-5 mg-t-20">
            <div class="pd-30 pd-sm-40 bg-gray-200">
                <form id="TeamForm" autocomplete="off">
                    <div class="row row-xs align-items-center mg-b-20">
                        <div class="col-md-12">
                            <label class="form-label mg-b-0">Team Name</label>
                        </div><!-- col -->
                        <div class="col-md-12 mg-t-5 mg-md-t-0">
                            <input type="text" id="Team" name="Team" class="form-control"
                                placeholder="Enter the team name">
                            <div class="possible-result">

                            </div>
                        </div><!-- col -->
                    </div><!-- row -->

                    <div class="row row-xs align-items-center mg-b-20">
                        <div class="col-md-12">
                            <label class="form-label mg-b-0">Abbreviation</label>
                        </div><!-- col -->
                        <div class="col-md-12 mg-t-5 mg-md-t-0">
                            <input type="text" id="TeamSlug" name="TeamSlug" class="form-control"
                                placeholder="Team abbreviation">
                        </div><!-- col -->
                    </div><!-- row -->

                    <div class="row row-xs align-items-center mg-b-20">
                        <div class="col-md-12">
                            <label class="form-label mg-b-0">Game Played</label>
                        </div><!-- col -->
                        <div class="col-md-12 mg-t-5 mg-md-t-0">
                            <input type="number" id="GamePlayed" name="GamePlayed" class="form-control"
                                placeholder="Total game played">

                        </div><!-- col -->
                    </div><!-- row -->
                    <div class="row row-xs align-items-center mg-b-20">
                        <div class="col-md-12">
                            <label class="form-label mg-b-0">Points</label>
                        </div><!-- col -->
                        <div class="col-md-12 mg-t-5 mg-md-t-0">
                            <input type="number" id="Points" name="Points" class="form-control" placeholder="Points">
                            <input type="hidden" id="TeamId" name="TeamId" class="form-control" >
                            <input type="hidden" id="LeagueId" name="LeagueId" value="<?php echo $leagueData->Id; ?>"
                                class="form-control">
                        </div><!-- col -->
                    </div><!-- row -->
                    <div class="row row-xs align-items-center mg-b-20">
                        <div class="col-md-12">
                            <label class="form-label mg-b-0">Goal Difference</label>
                        </div><!-- col -->
                        <div class="col-md-12 mg-t-5 mg-md-t-0">
                            <input type="number" id="GoalDifference" name="GoalDifference" class="form-control"
                                placeholder="Goal difference">

                        </div><!-- col -->
                    </div><!-- row -->

                    <button type="submit" class="btn btn-az-primary pd-x-30 mg-r-5">Submit</button>
                    <button type="reset" class="btn btn-dark pd-x-30">Reset</button>

                </form>

            </div>
        </div><!-- col -->






        <!-- your content goes here -->
    </div><!-- rows -->
</div><!-- az-content-body -->
<script>
    $(document).ready(function () {
        
        $("#Team").on('keyup', function () {
            var teamSearch = { teamSearch: $(this).val(), LeagueId: $("#LeagueId").val() };
            $.post('<?php echo base_url("adminAjax/FetchTeam") ?>', teamSearch)
                .done(function (result) {
                    console.log(result);
                    
                    var resultObject = JSON.parse(result);
                    if ($.isEmptyObject(resultObject)) {
                        $(".possible-result").html('');
                    } else {
                        var resultHtml = '';
                        $.each(resultObject, function (key, item) {
                            resultHtml += '<div data-id ="' + item.Id + '" class="result-item"> '+
                            '<span class="team-name">' + item.Team + ' </span>'+
                            '</div>';
                        });
                        
                        $(".possible-result").html(resultHtml);

                    }

                })
                .fail(function (error) {
                    console.log(error);

                })


        })
        $(document).on("click",".result-item", function () {
            var teamId = $(this).data("id");
            $.post('<?php echo base_url("adminAjax/TeamDetails/") ?>' + teamId)
                .done(function (data) {
                    dataObject = JSON.parse(data);
                    console.log(dataObject);
                    
                    $("#Team").val(dataObject.Team);
                    $("#TeamSlug").val(dataObject.TeamSlug);
                    $("#GamePlayed").val(dataObject.GamePlayed);
                    $("#Points").val(dataObject.Points);
                    $("#TeamId").val(dataObject.Id);
                    $("#GoalDifference").val(dataObject.GoalDifference);
                    $(".possible-result").html('');

                })
                .fail(function (error) {
                    console.log(error);

                })
        })
        $('#TeamForm').on('submit', function (e) {
            e.preventDefault();
            var formData = new FormData($('form#TeamForm')[0]);
            // formData.append("actions", "writer_request");
            AjaxInit("<?php echo base_url('adminAjax/UpdateTeam') ?>", formData, false, true);

        })
        $('#TeamUpdateBulkForm').on('submit', function (e) {
            e.preventDefault();
            var formData = new FormData($('form#TeamUpdateBulkForm')[0]);
            // formData.append("actions", "writer_request");
            AjaxInit("<?php echo base_url('adminAjax/TeamBulkUpdate') ?>", formData, false, true);

        })
    })
</script>


<?php $this->load->view("Admin/Partials/Script");
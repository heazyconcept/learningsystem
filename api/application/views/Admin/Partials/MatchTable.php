<div class="mg-t-30 match-view-header">
    <h4><?php echo $this->leagues->GetColumn($LeagueId, 'League'); ?></h4>
    <hr class="mg-t-10 mg-b-30">
</div>

<table class="table table-striped table-bordered mg-b-0">
    <thead>
        <tr>
            <th>Date</th>
            <th>Match</th>
            <th>Tips</th>
            <th>HT Result</th>
            <th>FT Result</th>
            <th></th>
           
        </tr>
    </thead>
    <tbody>
    <?php foreach ( $this->matches->ListByLeague($LeagueId) as $match) { ?>
        <tr>

            <td> <?php echo $this->utilities->formatDate($match->MatchDate); ?></td>
            <td><?php echo $match->MatchName; ?></td>
            <td><?php echo $match->FullTimeTips; ?></td>
            <td><?php echo $match->HalfTimeScore; ?></td>
            <td><?php echo $match->FullTimeScore; ?></td>
            <td width="21%">
            <a href="<?php echo base_url("admin/EditMatch/". $match->IdHash); ?>" class="btn btn-az-primary pd-x-30 mg-r-5">Edit</a>
                <button type="reset" class="btn btn-dark pd-x-30">Delete</button>
            </td>
        </tr>
       
    <?php } ?>

    </tbody>
</table>
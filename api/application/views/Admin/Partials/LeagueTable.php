<form id="TeamUpdateBulkForm">
<table class="table table-striped table-bordered mg-b-0">
    <thead>
        <tr>
            <th>Position</th>
            <th>Team</th>
            <th>Game Played</th>
            <th>Point</th>
            <th>Goal Difference</th>
        </tr>
    </thead>
    <tbody>
        <?php  if (!empty($leagueTable)) { ?>
        <?php $i = 1; ?>
        <?php foreach ($leagueTable as $league ) { ?>
        <tr>

            <th scope="row"><input type="hidden" name="TeamId[]" class="form-control"  value="<?php echo $league->Id ?>"><?php echo $i; ?></th>
            <td><?php echo $league->Team ?></td>
            <td><input type="text" name="GamePlayed[]" class="form-control"  value="<?php echo $league->GamePlayed ?>"></td>
            <td><input type="text" name="Points[]" class="form-control"  value="<?php echo $league->Points ?>"></td>
            <td><input type="text" name="GoalDifference[]" class="form-control"  value="<?php echo $league->GoalDifference ?>"></td>
        </tr>
        <?php $i++; ?>
        <?php }?>
        <?php } ?>


    </tbody>
</table>
<button type="submit" class="btn btn-az-primary mg-t-20 pd-x-30 mg-r-5">Update All</button>
</form>
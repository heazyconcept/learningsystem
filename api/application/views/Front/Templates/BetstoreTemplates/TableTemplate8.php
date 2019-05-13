<div class="betstore-table tamplate-one">
    <div class="betstore-partition">
        <div class="betstore-sub-head">
            Set One
        </div>
        <table class="table table-striped table-responsive">
            <thead>
                <tr>
                    <th>
                        TIME
                    </th>
                    <th>LEAGUE</th>
                    <th>MATCH</th>
                    <th>TIP</th>
                    <th>SCORE</th>
                </tr>

            </thead>
            <tbody class="BetDataFirst">
                <?php if (empty($BetItemsFirst)) { ?>
                <tr>
                    <td colspan='5'><span class='no-tips'>No tips available at the moment</span></td>
                </tr>
                <?php  } else { ?>
                <?php foreach ($BetItemsFirst as $item) { ?>
                <tr>
                    <td><?php echo $item->Time; ?></td>
                    <td><?php echo $item->League ?></td>
                    <td><?php echo $item->Match ?></td>
                    <td><?php echo $item->Tip ?></td>
                    <td><?php echo $item->Score ?></td>
                </tr>
                <?php } ?>
                <tr>
                    <td colspan="3"></td>
                    <td><strong>Total Odds:</strong></td>
                    <td><?php echo $BetItemsFirst[0]->TotalOdds ?></td>
                </tr>
                <?php } ?>

            </tbody>

        </table>

    </div>
    <div class="betstore-partition">
            <div class="betstore-sub-head">
                Set Two
            </div>
            <table class="table table-striped table-bordered table-responsive">
                <thead>
                    <tr>
                        <th>
                            TIME
                        </th>
                        <th>LEAGUE</th>
                        <th>MATCH</th>
                        <th>TIP</th>
                        <th>SCORE</th>
                    </tr>
    
                </thead>
                <tbody class="BetDataSecond">
                    <?php if (empty($BetItemsSecond)) { ?>
                    <tr>
                        <td colspan='5'><span class='no-tips'>No tips available at the moment</span></td>
                    </tr>
                    <?php  } else { ?>
                    <?php foreach ($BetItemsSecond as $item) { ?>
                    <tr>
                        <td><?php echo $item->Time; ?></td>
                        <td><?php echo $item->League ?></td>
                        <td><?php echo $item->Match ?></td>
                        <td><?php echo $item->Tip ?></td>
                        <td><?php echo $item->Score ?></td>
                    </tr>
                    <?php } ?>
                    <tr>
                        <td colspan="3"></td>
                        <td><strong>Total Odds:</strong></td>
                        <td><?php echo $BetItemsSecond[0]->TotalOdds ?></td>
                    </tr>
                    <?php } ?>
    
                </tbody>
    
            </table>
    
        </div>


</div>
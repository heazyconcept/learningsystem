<div class="betstore-table tamplate-one">
    <table class="table table-striped table-bordered table-responsive">
        <thead>
        <tr>
        <th>DATE</th>
            <th>
                TIME
            </th>
            <th>LEAGUE</th>
            <th>MATCH</th>
            <th>TIP</th>
            <th>ODDS</th>
            <th>CONFIDENCE LEVEL</th>
           
        </tr>

        </thead>
        <tbody class="BetData">
            <?php if (empty($BetItems)) { ?>
                <tr>
                    <td colspan='6'><span class='no-tips'>No tips available at the moment</span></td>
                </tr>
          <?php  } else { ?>
            <?php foreach ($BetItems as $item) { ?>
               <tr>
                   <td><?php echo $item->Date; ?></td>
                   <td><?php echo $item->Time; ?></td>
                   <td><?php echo $item->League ?></td>
                   <td><?php echo $item->Match ?></td>
                   <td><?php echo $item->Tip ?></td>
                   <td><?php echo $item->Odds ?></td>
                   <td><?php echo $item->ConfidenceLevel ?></td>
               </tr>
            <?php } ?>
            <tr>
                   <td colspan="5"></td>
                   <td><strong>Total Odds:</strong></td>
                   <td><strong><?php echo $BetItems[0]->TotalOdds ?></strong></td>
               </tr>


         <?php } ?>
            
        </tbody>
      
    </table>

</div>
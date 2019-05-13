<div class="betstore-table tamplate-one">
    <table class="table table-striped table-bordered table-responsive">
        <thead>
        <tr>
            <th>
                TIME
            </th>
            <th>LEAGUE</th>
            <th>MATCH</th>
            <th>TIP</th>
            <th>HT Score</th>
            <th>FT Score</th>
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
                   <td><?php echo $item->Time; ?></td>
                   <td><?php echo $item->League ?></td>
                   <td><?php echo $item->Match ?></td>
                   <td><?php echo $item->Tip ?></td>
                   <td><?php echo $item->HtScore ?></td>
                   <td><?php echo $item->FtScore ?></td>
               </tr>
            <?php } ?>
         <?php } ?>
            
        </tbody>
      
    </table>

</div>
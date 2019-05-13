<table class="table mg-b-0">
    <?php foreach ( $this->leagues->ListLeagueByRegion($Region) as $league) { ?>
        <?php 
            $this->load->library('utilities'); 
            $url =  $this->utilities->URLHash($league->Id); 
        ?>
    <tbody>
        <tr>
            <td>
                <h6 class="mg-b-0 tx-inverse"><?php echo $league->League; ?></h6>
            </td>
            <td>
                <a href="<?php echo base_url('admin/ManageTable/' .$url ); ?>">View Table</a>
            </td>
        </tr>
    </tbody>
    <?php  } ?>

</table>
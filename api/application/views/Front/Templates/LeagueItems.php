<ul class="list-unstyled lead league-list">
    <?php foreach ( $this->leagues->ListLeagueByRegion($Region) as $league) { ?>
        <li> <a href="#"><?php echo  ucwords(strtolower($league->League));  ?></a> </li>
    <?php } ?>
    
</ul>
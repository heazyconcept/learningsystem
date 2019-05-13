<?php 
$TwodaysAgo = date('d/m/Y',strtotime("-2 days"));
$_TwodaysAgo = date('dmY',strtotime("-2 days"));
$Yesterday = date('d/m/Y',strtotime("-1 days"));
$_Yesterday = date('dmY',strtotime("-1 days"));
$_Today = date('dmY');
$Tommorrow = date('d/m/Y',strtotime("1 days"));
$_Tommorrow = date('dmY',strtotime("1 days"));
$NextTomorrow = date('d/m/Y',strtotime("2 days"));
$_NextTomorrow = date('dmY',strtotime("2 days"));

?>
<div class="row">
 <div class="time-nav">
  <button data-id="<?php echo $_TwodaysAgo ?>"  class="btn time-nav-item"> <?php echo $TwodaysAgo; ?></button>
  <button data-id="<?php echo $_Yesterday ?>" class="btn time-nav-item"> <?php echo $Yesterday; ?></button>
  <button data-id="<?php echo $_Today ?>" class="btn time-nav-item active">Today</button>
  <button data-id="<?php echo $_Tommorrow ?>" class="btn time-nav-item"> <?php echo $Tommorrow; ?></button>
  <button data-id="<?php echo $_NextTomorrow ?>" class="btn time-nav-item"> <?php echo $NextTomorrow; ?></button>
 </div>
</div>
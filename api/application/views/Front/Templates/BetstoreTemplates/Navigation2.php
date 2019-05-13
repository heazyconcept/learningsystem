<?php 

$Yesterday = date('d/m/Y',strtotime("-1 days"));
$_Yesterday = date('dmY',strtotime("-1 days"));
$_Today = date('dmY');
$Tommorrow = date('d/m/Y',strtotime("1 days"));
$_Tommorrow = date('dmY',strtotime("1 days"));


?>
<div class="row">
 <div class="time-nav time-nav-2">
  <button data-id="<?php echo $_Yesterday ?>" class="btn time-nav-item"> <?php echo $Yesterday; ?></button>
  <button data-id="<?php echo $_Today ?>" class="btn time-nav-item active">Today</button>
  <button data-id="<?php echo $_Tommorrow ?>" class="btn time-nav-item"> <?php echo $Tommorrow; ?></button>
 </div>
</div>
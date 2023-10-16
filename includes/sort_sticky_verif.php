<?php

  $sticky_unique = "";
  $sticky_imag = "";

  $sql_order_part = ' ORDER BY ';

  $sform_valid = False;
  $reset_valid = False;
  $sort_valid=False;

  if(isset($_GET['reset'])){
    $sticky_unique = "";
    $sticky_imag = "";
    $reset_valid = True;
  }
  else{
    if(isset($_GET['submit'])){
      $sort = $_GET['sort'];
      if($sort == 'unique'){
        $sticky_unique = 'checked';
        $sql_order_part = $sql_order_part . " is_unique DESC";
        $sort_valid = True;
      }
      elseif($sort == 'imag'){
        $sticky_imag = 'checked';
        $sql_order_part = $sql_order_part . " is_imaginative DESC";
        $sort_valid = True;
      }

      if(strlen($sql_order_part)>10){
        $sql_filter_query = $sql_filter_query . $sql_order_part . ';';
      }
      else{
        $sql_filter_query = $sql_filter_query . ';';
      }
    }
}

  if($sort_valid || $reset_valid) $sform_valid = True;
?>

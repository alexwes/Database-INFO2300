<?php
  $sticky_filter_explconst = False;
  $sticky_filter_explsens = False;
  $sticky_filter_phys = False;
  $sticky_filter_imag = False;
  $sticky_filter_restor = False;
  $sticky_filter_express = False;
  $sticky_filter_bio = False;
  $sticky_filter_rules = False;




  $filter_explconst = $_GET['filter-explconst'];
  $filter_explsens = $_GET['filter-explsens'];
  $filter_phys = $_GET['filter-phys'];
  $filter_imag = $_GET['filter-imag'];
  $filter_restor = $_GET['filter-restor'];
  $filter_express = $_GET['filter-express'];
  $filter_rules = $_GET['filter-rules'];
  $filter_bio = $_GET['filter-bio'];


  $count_valid_filter = True;

  //SQL query variables
  $sql_select = "SELECT * FROM plants";
  $sql_where = "";
  $filters_array = array();


  if($_GET['apply'] == 'Apply Filters'){
      $count=0;
    if(isset($filter_explconst)) {
      $sticky_filter_explconst = True;
      $count+=1;
      array_push($filters_array, "is_explora_const = 'X'");
    }if(isset($filter_explsens)) {
      $sticky_filter_explsens = True;
      $count+=1;
      array_push($filters_array, "is_sensory = 'X'");
    }if(isset($filter_phys)) {
      $sticky_filter_phys = True;
      $count += 1;
      array_push($filters_array, "is_physical = 'X'");
    }if(isset($filter_imag)) {
      $sticky_filter_imag = False;
      $count+=1;
      array_push($filters_array, "is_imaginative = 'X'");
    }if(isset($filter_restor)) {
      $sticky_filter_restor = True;
      $count+=1;
      array_push($filters_array, "is_restorative = 'X'");
    }if(isset($filter_rules)){
      $sticky_filter_rules = True;
      $count+=1;
      array_push($filters_array, "is_rules = 'X'");
    }if(isset($filter_express)){
      $sticky_filter_express = True;
      $count+=1;
      array_push($filters_array, "is_expressive = 'X'");
    }if(isset($filter_bio)){
      $sticky_filter_bio = True;
      $count+=1;
      array_push($filters_array, "is_bio = 'X'");
    }
    if($count<1){
        $count_valid_filter = False;
        $form_valid=False;
    }
  }

  if(count($filters_array)>0){
    $sql_where = " WHERE " . implode(" OR ", $filters_array) ;
  }

  $sql_filter_query = $sql_select . $sql_where;
?>

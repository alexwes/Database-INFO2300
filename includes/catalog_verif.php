<?php


  $sticky_shrub = False;
  $sticky_grass = False;
  $sticky_vine = False;
  $sticky_tree = False;
  $sticky_flower = False;
  $sticky_ground = False;

  $fshrub = $_GET['fshrub'];
  $fgrass = $_GET['fgrass'];
  $fvine = $_GET['fvine'];
  $ftree = $_GET['ftree'];
  $fflower = $_GET['fflower'];
  $fground = $_GET['fground'];

  $count_valid_catalog = True;

  //SQL query variables
  $sql_select = "SELECT plants.id AS 'id', plants.name_coll AS 'name_coll', tags.tag_name AS 'tag_name'
  FROM plant_tags";
  $sql_join = " INNER JOIN plants ON (plants.id = plant_tags.plant_id)
  INNER JOIN tags ON (tags.id = plant_tags.tag_id) ";
  $sql_where = "";
  $tag_filters_array = array();


  if($_GET['tag-filter'] == 'Filter Tags'){
      $count=0;
    if(isset($fshrub)) {
      $sticky_shrub = True;
      $count+=1;
      array_push($tag_filters_array, "tag_name = 'Shrub'");
    }if(isset($fgrass)) {
      $sticky_grass = True;
      $count+=1;
      array_push($tag_filters_array, "tag_name = 'Grass'");
    }if(isset($fvine)) {
      $sticky_vine = True;
      $count += 1;
      array_push($tag_filters_array, "tag_name = 'Vine'");
    }if(isset($ftree)) {
      $sticky_tree = True;
      $count+=1;
      array_push($tag_filters_array, "tag_name = 'Tree'");
    }if(isset($fflower)) {
      $sticky_flower = True;
      $count+=1;
      array_push($tag_filters_array, "tag_name = 'Flower'");
    }if(isset($fground)){
      $sticky_ground = True;
      $count+=1;
      array_push($tag_filters_array, "tag_name = 'Groundcovers'");
    }

    if($count<1){
        $count_valid_catalog = False;
    }
  }

  if(count($tag_filters_array)>0){
    $sql_where = "WHERE " . implode(" OR ", $tag_filters_array);
    $sql_filter_tag_query = $sql_select . $sql_join . $sql_where . " ORDER BY plant_tags.plant_id ASC";
  }else{
    $sql_filter_tag_query = $sql_select . $sql_join . " ORDER BY plant_tags.plant_id ASC";
  }

?>

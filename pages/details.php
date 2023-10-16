<?php

  $db = init_sqlite_db('db/site.sqlite', 'db/init.sql');
  $id = $_GET['id'] ?? NULL;

  $sql_select = "SELECT plants.id AS 'id', plants.name_coll AS 'name_coll', plants.is_perennial AS 'perennial', plants.is_annual AS 'annual', plants.full_sun AS 'full_sun', plants.partial_shade AS 'partial_shade', plants.full_shade AS 'full_shade', plants.hardiness_range AS 'hardiness_range',  tags.tag_name AS 'tag_name'
  FROM plant_tags";
  $sql_join = " INNER JOIN plants ON (plants.id = plant_tags.plant_id)
  INNER JOIN tags ON (tags.id = plant_tags.tag_id) ";
  $sql_where = "";

  if($id){
    $sql_where = "WHERE plants.id = :id";
    $details_query = $sql_select . $sql_join . $sql_where;
    $records = exec_sql_query($db, $details_query, array(":id"=>$id))->fetchAll();

    $length = count($records);

    $perennial_val = "";
    $annual_val = "";
    $sun_val = "";
    $partial_val = "";
    $shade_val = "";
    $hard_val= "";

    if(count($records)>=1){
      $plant = $records[0];

      $plant_name = $plant['name_coll'];

      $img_src = '/public/uploads/photos/' . $plant['id'] . '.jpg';

      $tags = $plant['tag_name'];

      for($i = 1; $i < $length; $i++){
        $tags = $tags . ", " . $records[$i]['tag_name'];
      }

      if($plant['perennial'] == 'X'){
        $perennial_val = "Yes";
      }else{
        $perennial_val = "No";
      }
      if($plant['annual'] == 'X'){
        $annual_val = "Yes";
      }else{
        $annual_val = "No";
      }
      if($plant['full_sun'] == 'X'){
        $sun_val = "Yes";
      }else{
        $sun_val = "No";
      }
      if($plant['partial_shade'] == 'X'){
        $partial_val = "Yes";
      }else{
        $partial_val = "No";
      }
      if($plant['full_shade'] == 'X'){
        $shade_val = "Yes";
      }else{
        $shade_val = "No";

      }
    }
  }else{
    $plant = NULL;
  }



?>


<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <link rel="stylesheet" href="/public/styles/styles.css">


  <title><?php echo $plant_name . " - Details"?></title>
</head>

<body>
  <header class = 'header'>
    <h1><?php echo $plant_name . " - Details"?></h1>
    <img src="/public/images/kids-outdoors.png" alt="children outdoors">
  </header>

  <a href="/">⤆ Back Home</a>

  <h1><?php echo $plant_name; ?></h1>
  <img  class='detailsimg' src=<?php echo $img_src ?> alt="">
  <p>Tag(s):<?php echo $tags;?></p>
  <h3>Growing Needs and Characteristics</h3>
  <p>Perennial: <?php echo $perennial_val;?></p>
  <p>Annual: <?php echo $annual_val;?></p>
  <p>Full Sun: <?php echo $sun_val;?></p>
  <p>Partial Shade: <?php echo $partial_val;?></p>
  <p>Full Shade: <?php echo $shade_val; ?></p>

</body>

</html>

<?php
  $db = init_sqlite_db('db/site.sqlite', 'db/init.sql');

  include('includes/catalog_verif.php');

  $records = exec_sql_query($db, $sql_filter_tag_query)->fetchAll();

?>

<!DOCTYPE html>
<html lang="en">
<!-- img not found: https://www.google.com/url?sa=i&url=https%3A%2F%2Fwww.salonlfc.com%2Fen%2Fimage-not-found%2F&psig=AOvVaw0f2CDin2a-PwztN6RPYmbn&ust=1651114001216000&source=images&cd=vfe&ved=0CAoQjhxqFwoTCJCOiI6ds_cCFQAAAAAdAAAAABAI -->

<!-- hmbrgr icon https://www.google.com/url?sa=i&url=https%3A%2F%2Fwww.iconspng.com%2Fimage%2F43852%2Fhamburger-menu-icon&psig=AOvVaw0PO6We2k_CzsI6Dcs3lqDo&ust=1651116098348000&source=images&cd=vfe&ved=0CAoQjhxqFwoTCICx-vuks_cCFQAAAAAdAAAAABAY -->
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="/public/styles/styles.css">
  <script src="/public/scripts/scripts.js"></script>
  <title>Playful Plants</title>

</head>

<body>

  <?php include('includes/header.php'); ?>


  <h2>Playful Plants Catalog </h2>
  <div id="dropdown">
    <a href="javascript:void(0);" class="icon" onclick="hamburgerToggle()">
      <button id="filter-tag">Filter &#9660;</button>
    </a>
  </div>

  <div id="hamburger" class="top-forms">
    <div class="center-form">
      <?php include('includes/catalog_filter_form.php')?>
    </div>
  </div>

  <div class="media-catalog">

      <?php
      $length = count($records);
      for($i = 0; $i< $length; $i++){
        $record = $records[$i];
        $tags = $record['tag_name'];
        $j = $i;
        while($record['name_coll'] == $records[$j+1]['name_coll']){
          $tags = $tags . ', ' . $records[$j+1]['tag_name'];
          $i++;
          $j++;
        }


        ?>
        <div class="catalog-item">
          <?php $img_src = "/public/uploads/photos/" . $record["id"] . '.jpg';?>
          <a href="/details?<?php echo http_build_query(array("id" => $record['id']))?>">
            <img class="media-catalog-img" src=<?php echo $img_src ?> alt="">
          </a>
          <p class = "catalog-name"><?php echo $record["name_coll"];?></p>
          <p>Tag(s):<?php echo $tags;?></p>
        </div>

      <?php } ?>

    </div>

</body>

<footer><br><br><br><br></footer>

</html>

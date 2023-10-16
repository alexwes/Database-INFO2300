<?php
    $id = $_GET['id'] ?? NULL;
    $db = init_sqlite_db('db/site.sqlite', 'db/init.sql');
    $record = exec_sql_query($db, "SELECT name_coll FROM plants WHERE id = :id", array(":id"=>$id))->fetchAll()[0]
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <link rel="stylesheet" href="/public/styles/styles.css">


  <title>Admin - Edit Plant</title>
</head>

<body>
  <header class = 'header'>
    <h1>Playful Plants</h1>
    <img src="/public/images/error-image.png" alt="children outdoors">
  </header>

  <a href="/admin">⤆ Back to Admin</a>

  <?php if(is_user_logged_in()){ ?>


  <h3>Edit - <?php echo $record['name_coll']?> </h3>

  <form action="/admin" method="post">

    <label for="new-name-col">Change colloquial name: </label>
    <input for="new-name-coll" name = "new-name-coll" type="text">

    <label for="new-name-sci">Change scientific name: </label>
    <input for="new-name-sci" name = "new-name-sci" type="text">

    <p>Select <em>all</em> applicable tags: </p>

    <div class='filter-form-sensory'>

      <input type="checkbox" name="edit-shrub" id="filter-play" <?php
      if($sticky_edit_shrub){?>
      checked
      <?php } ?>/>
      <label for="tags">Shrubs</label>

      <input type="checkbox" name="edit-grass" id="filter-play" <?php
      if($sticky_edit_grass){?>
      checked
      <?php } ?>/>
      <label for="tags">Grass</label>


      <input type="checkbox" name="edit-vine" id="filter-play" <?php
      if($sticky_edit_vine){?>
      checked
      <?php } ?>/>
      <label for="tags">Vine</label>

      <input type="checkbox" name="edit-tree" id="filter-play" <?php
      if($sticky_edit_tree){?>
      checked
      <?php } ?>/>
      <label for="tags">Tree</label>

      <input type="checkbox" name="edit-flower" id="filter-play" <?php
      if($sticky_edit_flower){?>
      checked
      <?php } ?>/>
      <label for="tags">Flower</label>

      <input type="checkbox" name="edit-ground" id="filter-play" <?php
      if($sticky_edit_ground){?>
      checked
      <?php } ?>/>
      <label for="tags">Groundcover</label>

      <input type="hidden" name="id" value=<?php echo $id?>>

      <div class="center-item">
        <input id="request-submit" type="submit" name="edit-submit" value="Submit Edits" />
      </div>

    </div>

  </form>

  <?php }else{?>
    <p>Please sign in:</p>
    <?php echo_login_form("/admin", $session_messages);
  }?>

</body>

</html>

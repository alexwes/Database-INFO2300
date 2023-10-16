  <?php if($delete_valid){ ?>
  <div class="top-forms">
    <p><?php echo $record['name_coll']; ?> Successfully Deleted &#10003</p>
  </div>
  <?php } ?>

  <?php if($edit_tags_valid){ ?>
  <div class="top-forms">
    <p><?php echo $record['name_coll']; ?> Tags Successfully Edited &#10003</p>
  </div>
  <?php } ?>

  <?php if($edit_names_valid){ ?>
  <div class="top-forms">
    <p><?php echo $record['name_coll']; ?> Names Successfully Edited &#10003</p>
  </div>
  <?php } else{?>
    <div class="top-forms feedback">
    <p>Note: To edit names, please enter both colloquial and scientific names (even if you only want to edit one of them).</p>
  </div>

    <?php }?>

  <h2>Playful Plants Catalog </h2>


  <div class="top-forms">
    <div class="center-form">
      <?php include('includes/filter_form.php')?>
    </div>
    <div class="center-form">
      <?php include('includes/sort_form.php')?>
    </div>
  </div>


  <table>
    <tr>
      <th>ID</th>
      <th>Name (Colloquial)</th>
      <th>Name (Genus, Species)</th>
      <th>Plant ID</th>
      <th>Supports Exploratory Constructive Play</th>
      <th>Supports Exploratory Sensory Play</th>
      <th>Supports Physical Play</th>
      <th>Supports Imaginative Play</th>
      <th>Supports Restorative Play</th>
      <th>Supports Expressive Play</th>
      <th>Supports Play with Rules</th>
      <th>Supports Bio Play</th>
      <th>Actions</th>
    </tr>
    <?php foreach ($records as $record){ ?>
        <tr>
          <td><?php echo htmlspecialchars($record['id'])?></td>
          <td><?php echo htmlspecialchars($record['name_coll']); ?></td>
          <td><?php echo htmlspecialchars($record['name_sci']); ?></td>
          <td><?php echo htmlspecialchars($record['plant_id']); ?></td>
          <td><?php echo htmlspecialchars($record['is_explora_const']); ?></td>
          <td><?php echo htmlspecialchars($record['is_sensory']); ?></td>
          <td><?php echo htmlspecialchars($record['is_physical']); ?></td>
          <td><?php echo htmlspecialchars($record['is_imaginative']); ?></td>
          <td><?php echo htmlspecialchars($record['is_restorative']); ?></td>
          <td><?php echo htmlspecialchars($record['is_expressive']); ?></td>
          <td><?php echo htmlspecialchars($record['is_rules']); ?></td>
          <td><?php echo htmlspecialchars($record['is_bio']); ?></td>
          <td>
            <div id = "delete-edit">
                <a href="/admin/edit?<?php echo http_build_query(array("id" => $record['id']))?>">
                    <img class = 'delete-edit' src="/public/images/edit-icon.png" alt="edit">
                    <!-- source: https://www.stockunlimited.com/vector-illustration/edit-icon_1626685.html -->
                </a>

                <a href="/admin/delete?<?php echo http_build_query(array("id" => $record['id']))?>">
                    <img class = 'delete-edit' src="/public/images/delete-icon.png" alt="delete">
                    <!-- source: https://www.flaticon.com/free-icon/delete_1214428 -->
                </a>
            </div>
          </td>
        </tr>

    <?php } ?>
  </table>

    <h3>Add your own playful plant by filling out this form</h3>

    <?php include('includes/insert_form.php')?>

    <?php include('includes/upload_form.php') ?>

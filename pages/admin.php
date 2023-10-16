<?php
  $db = init_sqlite_db('db/site.sqlite', 'db/init.sql');
  include('includes/filter_sticky_verif.php');

  include('includes/insert_sticky_verif.php');
  include('includes/sort_sticky_verif.php');

  include('includes/delete_verif.php');
  include('includes/edit_verif.php');


  $records = exec_sql_query($db, $sql_filter_query)->fetchAll();
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <link rel="stylesheet" href="/public/styles/styles.css">
  <script src="/public/scripts/scripts.js"></script>
  <title>Playful Plants</title>
</head>

<body>

  <?php
  include('includes/header.php');
  if(is_user_logged_in()){
    include('includes/admin-full.php');
  }else{?>
    <p>Please sign in:</p>
    <?php echo_login_form("/admin", $session_messages);
  }

  ?>

</body>

<footer><br><br><br><br></footer>

</html>

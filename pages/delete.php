<?php
    $id = $_GET['id'] ?? NULL;
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <link rel="stylesheet" href="/public/styles/styles.css">


  <title>Admin - Delete Plant</title>
</head>

<body>
    <header class = 'header'>
        <h1>Playful Plants</h1>
        <img src="/public/images/error-image.png" alt="children outdoors">
    </header>

    <?php if(is_user_logged_in()){ ?>

    <form action="/admin" method="post">
        <h3>Are you sure you want to delete <?php echo $record['name_coll']?>  from the database? This action is <strong>irreveresible</strong>.</h3>
        <input type="hidden" name="id" value=<?php echo $id?>>
        <input type="submit" name="delete-submit" value="Yes, delete">
        <input type="submit" name="delete-submit" value="Cancel">
    </form>
    <?php }else{?>
        <p>Please sign in:</p>
        <?php echo_login_form("/admin", $session_messages);
    }?>

</body>

</html>

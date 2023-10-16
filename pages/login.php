<?php
  // $db = open_sqlite_db('tmp/site.sqlite');

  $records = exec_sql_query($db, $sql_filter_query)->fetchAll();


?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <link rel="stylesheet" href="/public/styles/styles.css">
  <title>Playful Plants</title>
</head>

<body>
  <header class = 'header'>
    <h1>Playful Plants</h1>
    <img src="/public/images/kids-outdoors.png" alt="children outdoors">
  </header>

<form action="/admin" method="POST">
  <fieldset>
    <label for="username">Enter your username: </label>
    <input for="username" type="text">

    <label for="password">Enter your password: </label>
    <input for='password 'type="text">

    <input type="submit">
  </fieldset>

</form>
</body>

<footer></footer>

</html>

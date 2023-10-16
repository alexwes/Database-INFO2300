<?php

  $sticky_name_coll = "";
  $sticky_name_sci = "";
  $sticky_pid = "";
  $sticky_insert_explconst = False;
  $sticky_insert_explsens = False;
  $sticky_insert_phys = False;
  $sticky_insert_restor = False;
  $sticky_insert_express = False;
  $sticky_insert_rules = False;
  $sticky_insert_unique = False;

  $name_coll = trim($_POST['name-coll']); //untrusted
  $name_sci = trim($_POST['name-sci']); //untrusted
  $pid = trim($_POST["pid"]);
  $insert_explconst = $_POST['insert-explconst'];
  $insert_explsens = $_POST['insert-explsens'];
  $insert_phys = $_POST['insert-phys'];
  $insert_imag = $_POST['insert-imag'];
  $insert_restor = $_POST['insert-restor'];
  $insert_express = $_POST['insert-express'];
  $insert_rules = $_POST['insert-rules'];
  $insert_bio = $_POST['insert-bio'];
  $insert_unique = $_POST['insert-unique'];


  $is_explconst = NULL;
  $is_explsens = NULL;
  $is_phys = NULL;
  $is_imag = NULL;
  $is_restor = NULL;
  $is_express = NULL;
  $is_bio = NULL;
  $is_rules = NULL;
  $is_unique = NULL;

  $form_valid = False;

  $name_coll_valid = True;
  $name_sci_valid = True;
  $pid_valid = True;

  $count_valid = True;

  $record_added = False;

  $sql_insert = 'INSERT INTO plants (';
  $names_array = array();
  $sql_values = ') VALUES (';
  $values_array = array();

  $sci_valid = False;
  $coll_valid = False;
  $p_id_valid = False;
  $image_valid = False;

  if(isset($_POST['add'])){

    $image = $_FILES['image'];

    if($image['error'] == UPLOAD_ERR_OK){
      $image_name = basename($image['name']);

      $image_ext = strtolower(pathinfo($image_name, PATHINFO_EXTENSION));

      if($image_ext == 'jpg'){
        $image_valid=True;
      }

    }

    if($image_valid){

      if(!empty($name_coll)){
          $sticky_name_coll = $name_coll; //tainted
          $coll_valid=True;
      }else{
          $name_coll_valid = False;
          $coll_valid = False;
      }
      if(!empty($name_sci)){
        $sticky_name_sci = $name_sci; //tainted
        $sci_valid = True;
      }else{
          $name_sci_valid = False;
          $sci_valid = False;
      }
      if(!empty($pid)){
        $sticky_pid = $pid;
        $pid_valid = True;
      }else{
        $p_id_valid = False;
        $pid_valid = False;
      }

      if($sci_valid && $coll_valid && $pid_valid){
        $form_valid = True;
      }else{
        $form_valid = False;
      }

      $count = 0;
      if(isset($insert_explconst)) {
        $sticky_insert_explconst = True;
        $count += 1;
        $is_explconst = "X";
      }
      if(isset($insert_explsens)) {
        $sticky_insert_explsens = True;
        $count += 1;
        $is_explsens = "X";
      }if(isset($insert_phys)) {
        $sticky_insert_phys = True;
        $count += 1;
        $is_phys = "X";
      }if(isset($insert_imag)) {
        $sticky_insert_imag = True;
        $count += 1;
        $is_imag = "X";
      }if(isset($insert_restor)) {
        $sticky_insert_restor = True;
        $count += 1;
        $is_restor = "X";
      }if(isset($insert_express)) {
        $sticky_insert_express = True;
        $count += 1;
        $is_express = "X";
      }if(isset($insert_rules)) {
        $sticky_insert_rules = True;
        $count += 1;
        $is_rules = "X";
      }if(isset($insert_bio)) {
        $sticky_insert_bio = True;
        $count += 1;
        $is_bio = "X";
      }if(isset($insert_unique)) {
        $sticky_insert_unique = True;
        $count += 1;
        $is_unique = "X";
      }

      if($count < 1){
          $count_valid = False;
          $form_valid = False;
      }

        if($form_valid){
          $result = exec_sql_query($db, "INSERT INTO plants (name_coll, name_sci, plant_id, is_explora_const, is_sensory, is_physical, is_imaginative, is_restorative, is_expressive, is_rules, is_bio)  VALUES (:coll, :sci, :pid, :explconst, :explsens, :phys, :imag, :restor, :express, :rules, :bio);",
          array(
            ":coll" => $name_coll, //tainted
            ":sci" => $name_sci, //tainted
            "pid" => $pid, //tainted
            ":explconst" => $is_explconst,
            ":explsens" => $is_explsens,
            ":phys" => $is_phys,
            ":imag" => $is_imag,
            ":restor" => $is_restor,
            ":express" => $is_express,
            ":rules" => $is_rules,
            ":bio" => $is_bio
          ));


          if($result){
            $record_added = True;
            $record_id = $db->lastInsertId('id');
            $id_filename = 'public/uploads/photos/' . $record_id . '.' . $image_ext;
            move_uploaded_file($image["tmp_name"], $id_filename);
          }
     }
    }else{

    }
  }

?>

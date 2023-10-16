<?php
$id = $_POST['id'];

$set_array = array();
$set_tags_array = array();

$new_name_coll = $_POST['new-name-coll'];
$new_name_sci = $_POST['new-name-sci'];
$edit_shrub = $_POST['edit-shrub'];
$edit_grass = $_POST['edit-grass'];
$edit_vine = $_POST['edit-vine'];
$edit_tree = $_POST['edit-tree'];
$edit_flower = $_POST['edit-flower'];
$edit_ground = $_POST['edit-ground'];

if($_POST['edit-submit'] == "Submit Edits"){
    $edit_tags_valid = False;
    $edit_names_valid = False;
    if($id){
        $sql_update_plants = "UPDATE plants SET ";
        $sql_set_plants = "";
        $sql_where = " WHERE id = :id";
        $sql_del_where = " WHERE plant_id = :id";
        $record = exec_sql_query($db, "SELECT name_coll FROM plants WHERE id = :id", array(":id"=>$id))->fetchAll()[0];
        $sql_delete_plant_tags = "DELETE FROM plant_tags";
    }

    $name_coll_edit_valid = True;
    $name_sci_edit_valid = True;


    if($new_name_coll){
        array_push($set_array, "name_coll = :new_name_coll");
    }else{
        $name_coll_edit_valid = False;
    }if($new_name_sci){
        array_push($set_array, "name_sci = :new_name_sci");
    }else{
        $name_sci_edit_valid = False;
    }
    if($edit_shrub){
        array_push($set_tags_array, "1");

    }if($edit_grass){
        array_push($set_tags_array, "2");

    }if($edit_vine){
        array_push($set_tags_array, "3");
    }if($edit_tree){
        array_push($set_tags_array, "4");
    }if($edit_flower){
        array_push($set_tags_array, "5");
    }if($edit_ground){
        array_push($set_tags_array, "6");
    }
    if(count($set_array)>0){
        $sql_set_plants = implode(" , ", $set_array);
        $sql_update_plants = $sql_update_plants . $sql_set_plants . $sql_where;
        if($name_coll_edit_valid && $name_sci_edit_valid){
            $edit_names_valid = True;
            exec_sql_query($db, $sql_update_plants,
                array(
                    ":new_name_coll" => $new_name_coll,
                    ":new_name_sci" => $new_name_sci,
                    ":id"=>$id
                ));
        }
        else{
            $edit_names_valid = False;
        }
    }

    if(count($set_tags_array)>0){
        $sql_insert_plant_tags = "INSERT INTO plant_tags (plant_id, tag_id)";
        $sql_delete_plant_tags = $sql_delete_plant_tags . $sql_del_where .";";
        $response_del = exec_sql_query($db, $sql_delete_plant_tags, array(":id"=>$id));
        foreach($set_tags_array as $tag_id){
            $sql_tags_values = " VALUES " . "(" . $id . "," . $tag_id  . ")";
            $response_edit = exec_sql_query($db, $sql_insert_plant_tags. $sql_tags_values);
            if($response_del && $response_edit){
                $edit_tags_valid = True;
            }
        }

    }
}
?>

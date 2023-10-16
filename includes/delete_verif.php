<?php
    $id = $_POST['id'];
    $delete = $_POST['delete-submit'];
    $delete_valid = False;

    if($delete == "Yes, delete"){
        if($id){
            $sql_delete_plants = "DELETE FROM plants";
            $sql_delete_plant_tags = "DELETE FROM plant_tags";
            $sql_where = " WHERE id=:id";
            $record = exec_sql_query($db, "SELECT name_coll FROM plants WHERE id = :id", array(":id"=>$id))->fetchAll()[0];
        }

        if(strlen($sql_delete_plant_tags)>0){
            $sql_delete_plant_tags = $sql_delete_plant_tags . $sql_where;
            $sql_delete_plants = $sql_delete_plants . $sql_where;
            $del_response = exec_sql_query($db, $sql_delete_plants, array(":id"=>$id));
            if($del_response){
                $delete_valid = True;
            }
        }
    }
?>

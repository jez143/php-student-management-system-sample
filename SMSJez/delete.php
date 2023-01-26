<?php

include_once("connection/connection.php");
$con = connection();


if(isset($_POST['delete'])){

    $id = $_POST['id'];
    $sql = "DELETE FROM studentlist WHERE id = '$id'";
    $con->query($sql) or die ($con->error);
    echo header("Location: index.php");
}



?>
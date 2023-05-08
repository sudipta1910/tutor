<?php 
    include "connection.php";
    $id = $_REQUEST['id'];
    $query="DELETE FROM candidate WHERE id= $id ";
    mysqli_query($con, $query);
    header('Location: candtable.php');

?>
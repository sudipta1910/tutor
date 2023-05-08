<?php 
    include "connection.php";
    $id = $_REQUEST['id'];
    $query="DELETE FROM tutor WHERE id= $id ";
    mysqli_query($con, $query);
    header('Location: tuttable.php');

?>
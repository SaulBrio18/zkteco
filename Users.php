<?php
include "db.php";

$conn=db();

mysqli_query($conn,"BEGIN"); 

echo "terminado";
?>
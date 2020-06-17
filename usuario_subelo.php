<?php
include "db_subelo.php";

$db=db();

$sel_sql = "Select * from usuarios LIMIT 1";

$resp_query=mysqli_query($db,$sel_sql); 

$arr= mysqli_fetch_array($resp_query);

print_r($arr);


?>
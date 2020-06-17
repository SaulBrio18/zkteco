<?php
include "db.php";

$db=db();

$sel_sql = "Select * from empleado";

$resp_query=mysqli_query($db,$sel_sql); 

while($usuario = mysqli_fetch_array($resp_query))
{
    echo "  nombre:$usuario[nombre],<br>
            clave:$usuario[clave],<br>
            pass:$usuario[pass],<br>
            roll:$usuario[roll],<br>
            uid:$usuario[uid],<br>
            finger:$usuario[finger],<br>
            finger_num:$usuario[finger_num],<br>
            str_finger:$usuario[str_finger]<br>";
    echo "----------------<br/>";
}

echo "terminado";
?>
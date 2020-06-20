<?php
//setUser($uid, $userid, $name, $password, $role)
?>


<form action="action_usuario.php" method="POST">

    Nombre:<input type="text" name="nom"/>
    Password:<input type="text" name="pass"/>
    Roll:
    <select name="roll">
        <option value="0" selected>Empleado</option> 
        <option value="1" >Administrador</option>
    </select>
    Id:<input type="text" name="id"/>
    <input type="submit" value="Guardar en reloj">
</form>
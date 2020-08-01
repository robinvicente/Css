<?php 
    require_once 'login.php';
    $conexion = new mysqli($hn, $un, $pw, $db);
    if ($conexion->connect_error) die ("Fatal error");

    if(isset($_POST['user']) && isset($_POST['pass']))
    {
        $user = mysql_fix_string($conexion, $_POST['user']);
        $pass = md5($_POST['pass']);

        $query = "SELECT * FROM users WHERE user='$user' AND pass='$pass'";

        $result = $conexion->query($query);
        if ($result->num_rows >= 1)
            echo "<h1>Bienvenido</h1>";
        else
            echo "Usuario o password incorrecto <a href='signup.php'>Registrarse?</a>";
        echo "<br><a href='signin.php'>Ingresar</a>";
    }
    else
    {
        echo <<<_END
        <h1>Ingresa</h1>
        <form action="signin.php" method="post"><pre>
        <input  name="Usuario" type="text" name="user">
        Password <br> <input type="password" name="pass">
                 <input type="submit" value="INGRESAR">
        </form>
        _END;
    }
    function mysql_fix_string($coneccion, $string)
    {
        if (get_magic_quotes_gpc())
            $string = stripcslashes($string);
        return $coneccion->real_escape_string($string);
    }
?>

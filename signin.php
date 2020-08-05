<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,400;0,500;0,700;1,300;1,400&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Raleway:ital,wght@0,300;0,400;0,500;0,700;1,400&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="styles/normalize.css">
    <link rel="stylesheet" href="styles/style.css">
    <title>Login</title>
</head>
<body>
    <article class="principal-center-login">
        <nav class="box">
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
                {
                    echo <<<END
                            <nav class="box"
                                <div class="central">
                                    <h1>ነ Pixerly</h1>
                                </div>
                            <div class="second">
                                <p>Has accedido corectamente</p>
                            </div>
                    END;
                }
                else
                    echo "Usuario o password incorrecto <a href='signup.php'>Registrarse?</a>";
                echo "<br><a href='signin.php'>Ingresar</a>";
            }
            else
            {
                echo <<<_END
                            <div class="central">
                                <h1>ነ Pixerly</h1>
                            </div>
                            <div class="second">
                                <p>Iniciar sesión</p>
                            </div>
                            <div class="inputs">
                                <form action="signin.php" method="post">
                                <input type="text" name="user" placeholder="User">
                                <input type="password" name="pass" placeholder="Password">
                                 <input type="submit" value="INGRESAR">
                                </form>
                            </div>
                            <div class="mini">
                                    <h2>Aún no tienes una cuenta, </h2>
                                    <a href='signup.php'>registrate</a>
                                </div>
                            _END;
            }
            function mysql_fix_string($coneccion, $string)
            {
                if (get_magic_quotes_gpc())
                    $string = stripcslashes($string);
                return $coneccion->real_escape_string($string);
            }
            ?>
        </nav>
</body>
</html>

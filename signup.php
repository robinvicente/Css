<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://fonts.googleapis.com/css2?family=Raleway:ital,wght@0,300;0,400;0,500;0,700;1,400&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="styles/normalize.css">
    <link rel="stylesheet" href="styles/style.css">
    <title>Document</title>
</head>
<body>
    <article class="principal-center">

        <?php
        require_once 'login.php';
        $conexion = new mysqli($hn, $un, $pw, $db);
        if ($conexion->connect_error) die ("Fatal error");

        if(isset($_POST['user']) && isset($_POST['pass']))
        {
            $user = $_POST['user'];
            $pass = md5($_POST['pass']);

            $query = "INSERT INTO users VALUES('$user', '$pass')";
            $result = $conexion->query($query);
            if (!$result) die ("Falló registro");

            echo "Registro exitoso <a href='signin.php'>Ingresar</a>";
        }
        else
        {
            echo <<<_END
            <h1>Regístrate</h1>
                <form action="signup.php" method="post"><pre>
                <input type="text" name="user" placeholder="User">
                <input type="password" name="pass" placeholder="Password">
                <input type="submit" value="REGISTRAR">
                <input type="submit" value="LOGIN">
                </pre>
            </form>
        _END;
        }
        ?>
    </article>
</body>
</html>


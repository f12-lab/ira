<?php
session_start();

if (isset($_SESSION["auth"]) && $_SESSION["auth"] === true) {
    header("Location: admin.php");
    exit;
}

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $usuario = $_POST["user"] ?? "";
    $contrasena = $_POST["pass"] ?? "";

    if ($usuario === "admin" && $contrasena === "qwerty123") {
        $_SESSION["auth"] = true;
        header("Location: admin.php");
        exit;
    } else {
        echo "Credenciales incorrectas.";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="stylesheet" href="css/estilo.css">
</head>
<body>
    <h2>Login de Administrador</h2>
    <form method="POST">
        <label for="user">Usuario:</label>
        <input type="text" id="user" name="user" required>
        <br>
        <label for="pass">Contraseña:</label>
        <input type="password" id="pass" name="pass" required>
        <br>
        <input type="submit" value="Entrar">
    </form>
</body>
</html>
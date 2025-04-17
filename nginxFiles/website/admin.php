<?php
session_start();
if (!isset($_SESSION["auth"])) {
    header("Location: logout.php");
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Panel admin</title>
    <link rel="stylesheet" href="css/estilo.css">
</head>
<body>
    <h2>Panel de administración</h2>
    <ul>
        <li><a href="cmd.php">Ejecutar comandos</a></li>
        <li><a href="upload.php">Subir archivos</a></li>
    </ul>
    <a href="logout.php" class="volver">Salir</a>
</body>
</html>
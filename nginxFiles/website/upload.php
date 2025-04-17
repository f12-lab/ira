<?php
session_start();
if (!isset($_SESSION["auth"])) {
    header("Location: logout.php");
}

$msg = "";
if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $nombre = $_FILES["archivo"]["name"];
    $tmp = $_FILES["archivo"]["tmp_name"];
    $destino = "/usr/share/nginx/html/uploads/" . $nombre;

    if (move_uploaded_file($tmp, $destino)) {
        $url = "uploads/" . $nombre;
        $msg = "Archivo subido: <a href='$url' target='_blank'>$nombre</a>";
    } else {
        $msg = "Error al subir el archivo.";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Subida de archivos</title>
    <link rel="stylesheet" href="css/estilo.css">
</head>
<body>
    <h2>Subir archivo</h2>
    <form method="POST" enctype="multipart/form-data">
        <input type="file" name="archivo" required>
        <input type="submit" value="Subir">
    </form>
    <p><?php echo $msg; ?></p>

    <a href="admin.php" class="volver">Volver</a>
</body>
</html>
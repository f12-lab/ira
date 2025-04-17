<?php
session_start();
if (!isset($_SESSION["auth"])) {
    header("Location: logout.php");
}

$resultado = "";
if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $cmd = $_POST["cmd"];
    $resultado = shell_exec("sudo " . $cmd);
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Comandos</title>
    <link rel="stylesheet" href="css/estilo.css">
</head>
<body>
    <h2>Ejecutar comando</h2>
    <form method="POST">
        <input type="text" name="cmd" placeholder="comando" required>
        <br>
        <input type="submit" value="Ejecutar">
    </form>

    <?php if ($resultado): ?>
    <script>
        alert(<?php echo json_encode($resultado); ?>);
    </script>
    <?php endif; ?>

    <a href="admin.php" class="volver">Volver</a>
</body>
</html>
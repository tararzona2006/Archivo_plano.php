<?php
// Inicializar mensaje de estado
$mensaje = "";

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $nombre = trim($_POST['nombre']);
    
    if (!empty($nombre)) {
        // Guardar el nombre en el archivo estudiantes.txt
        $resultado = file_put_contents('estudiantes.txt', $nombre . PHP_EOL, FILE_APPEND | LOCK_EX);
        
        if ($resultado === false) {
            $mensaje = "Error al guardar el estudiante.";
        } else {
            $mensaje = "Estudiante registrado: " . htmlspecialchars($nombre);
        }
    } else {
        $mensaje = "Por favor, ingresa un nombre.";
    }
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registrar Estudiante</title>
</head>
<body>
    <h1>Registrar Estudiante</h1>
    <form method="post" action="">
        <label for="nombre">Nombre del Estudiante:</label>
        <input type="text" id="nombre" name="nombre" required>
        <button type="submit">Registrar</button>
    </form>
    <br>
    <?php if (!empty($mensaje)) echo "<p>$mensaje</p>"; ?>
    <a href="mostrar_lista.php">Ver lista de estudiantes</a>
</body>
</html>
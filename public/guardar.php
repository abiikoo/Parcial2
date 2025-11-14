<?php
// public/guardar.php
require_once __DIR__ . '/../src/Models/Inscrito.php';

if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    header('Location: index.php');
    exit;
}

$inscrito = new Inscrito($_POST);

if (!$inscrito->validar()) {
    // Hay errores, mostrarlos
    $errores = $inscrito->errores;
} else {
    // Guardar en la BD
    try {
        $inscrito->guardar();
        $guardado = true;
    } catch (Exception $e) {
        $errores = ['Error al guardar en la base de datos: ' . $e->getMessage()];
    }
}
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Resultado del formulario</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f6f9;
        }
        .container {
            max-width: 800px;
            margin: 30px auto;
            background: #fff;
            padding: 20px 25px;
            border-radius: 8px;
            box-shadow: 0 0 8px rgba(0,0,0,0.1);
        }
        .ok {
            color: #155724;
            background-color: #d4edda;
            border: 1px solid #c3e6cb;
            padding: 10px;
            border-radius: 4px;
        }
        .error {
            color: #721c24;
            background-color: #f8d7da;
            border: 1px solid #f5c6cb;
            padding: 10px;
            border-radius: 4px;
            margin-bottom: 10px;
        }
        a {
            color: #007bff;
            text-decoration: none;
            margin-right: 10px;
        }
        a:hover {
            text-decoration: underline;
        }
        ul {
            margin: 5px 0 0 20px;
        }
    </style>
</head>
<body>
<div class="container">
    <h1>Resultado del formulario</h1>

    <?php if (!empty($guardado)): ?>
        <div class="ok">
            El formulario se ha guardado correctamente en la base de datos.
        </div>
        <p>
            <a href="index.php">Volver al formulario</a>
            <a href="reporte.php">Ver reporte de inscripciones</a>
        </p>
    <?php else: ?>
        <div class="error">
            <strong>Se encontraron los siguientes errores:</strong>
            <ul>
                <?php foreach ($errores as $error): ?>
                    <li><?php echo htmlspecialchars($error); ?></li>
                <?php endforeach; ?>
            </ul>
        </div>
        <p>
            <a href="index.php">Regresar al formulario</a>
        </p>
    <?php endif; ?>
</div>
</body>
</html>

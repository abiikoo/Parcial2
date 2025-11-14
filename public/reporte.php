<?php
// public/reporte.php
require_once __DIR__ . '/../src/Models/Inscrito.php';

$inscriptos = Inscrito::obtenerTodos();
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Reporte de Inscripciones</title>
    <link rel="stylesheet" href="css/style.css">
</head>
<body>
<div class="container">
    <h1>Reporte de Inscripciones</h1>

    <p><a href="index.php">Volver al formulario</a></p>

    <?php if (empty($inscriptos)): ?>
        <p>No hay inscripciones registradas.</p>
    <?php else: ?>
        <table>
            <thead>
            <tr>
                <th>#</th>
                <th>Nombre completo</th>
                <th>Edad</th>
                <th>Sexo</th>
                <th>País de residencia</th>
                <th>Nacionalidad</th>
                <th>Temas tecnológicos</th>
                <th>Correo</th>
                <th>Celular</th>
                <th>Fecha formulario</th>
            </tr>
            </thead>
            <tbody>
            <?php foreach ($inscriptos as $i => $row): ?>
                <tr>
                    <td><?php echo $i + 1; ?></td>
                    <td><?php echo htmlspecialchars($row['nombre'] . ' ' . $row['apellido']); ?></td>
                    <td><?php echo htmlspecialchars($row['edad']); ?></td>
                    <td><?php echo htmlspecialchars($row['sexo']); ?></td>
                    <td><?php echo htmlspecialchars($row['pais_nombre']); ?></td>
                    <td><?php echo htmlspecialchars($row['nacionalidad']); ?></td>
                    <td><?php echo htmlspecialchars($row['tema_tecnologico']); ?></td>
                    <td><?php echo htmlspecialchars($row['correo']); ?></td>
                    <td><?php echo htmlspecialchars($row['celular']); ?></td>
                    <td><?php echo htmlspecialchars($row['fecha_formulario']); ?></td>
                </tr>
            <?php endforeach; ?>
            </tbody>
        </table>
    <?php endif; ?>

    <div class="footer">
        Reporte generado automáticamente desde la base de datos (iTECH).
    </div>
</div>
</body>
</html>

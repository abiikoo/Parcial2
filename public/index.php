<?php
// public/index.php
require_once __DIR__ . '/../src/Database/DB.php';

$db = DB::getInstance()->getConnection();

// Obtener países para el combo
$stmtPaises = $db->query("SELECT id, nombre FROM pais ORDER BY nombre");
$paises = $stmtPaises->fetchAll(PDO::FETCH_ASSOC);

// Obtener áreas de interés para los checkboxes
$stmtAreas = $db->query("SELECT id, nombre FROM area_interes ORDER BY nombre");
$areas = $stmtAreas->fetchAll(PDO::FETCH_ASSOC);
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Formulario de Inscripción iTECH</title>
    <link rel="stylesheet" href="css/style.css">
</head>
<body>
<div class="container">
    <h1>Formulario de Inscripción</h1>
    <h2>Programa iTECH</h2>

    <form action="guardar.php" method="post">
        <!-- Nombre -->
        <div class="campo">
            <label for="nombre">Nombre *</label>
            <input type="text" name="nombre" id="nombre" required>
        </div>

        <!-- Apellido -->
        <div class="campo">
            <label for="apellido">Apellido *</label>
            <input type="text" name="apellido" id="apellido" required>
        </div>

        <!-- Edad -->
        <div class="campo">
            <label for="edad">Edad *</label>
            <input type="number" name="edad" id="edad" min="1" required>
        </div>

        <!-- Sexo -->
        <div class="campo">
            <label>Sexo *</label>
            <div class="radio-group">
                <label><input type="radio" name="sexo" value="Masculino" required> Masculino</label>
                <label><input type="radio" name="sexo" value="Femenino"> Femenino</label>
                <label><input type="radio" name="sexo" value="Otro"> Otro</label>
            </div>
        </div>

        <!-- País de residencia -->
        <div class="campo">
            <label for="pais_residencia">País de residencia *</label>
            <select name="pais_residencia" id="pais_residencia" required>
                <option value="">Seleccione un país</option>
                <?php foreach ($paises as $pais): ?>
                    <option value="<?php echo htmlspecialchars($pais['id']); ?>">
                        <?php echo htmlspecialchars($pais['nombre']); ?>
                    </option>
                <?php endforeach; ?>
            </select>
        </div>

        <!-- Nacionalidad -->
        <div class="campo">
            <label for="nacionalidad">Nacionalidad *</label>
            <input type="text" name="nacionalidad" id="nacionalidad" required>
        </div>

        <!-- Temas tecnológicos (checkbox) -->
        <div class="campo">
            <label>¿Qué tema tecnológico le gustaría aprender?</label>
            <div class="checkbox-group">
                <?php foreach ($areas as $area): ?>
                    <label>
                        <input type="checkbox" name="tema[]" value="<?php echo htmlspecialchars($area['nombre']); ?>">
                        <?php echo htmlspecialchars($area['nombre']); ?>
                    </label>
                <?php endforeach; ?>
            </div>
        </div>

        <!-- Correo -->
        <div class="campo">
            <label for="correo">Correo electrónico *</label>
            <input type="email" name="correo" id="correo" required>
        </div>

        <!-- Celular -->
        <div class="campo">
            <label for="celular">Celular</label>
            <input type="text" name="celular" id="celular">
        </div>

        <!-- Observaciones -->
        <div class="campo">
            <label for="observaciones">Observaciones / Consulta</label>
            <textarea name="observaciones" id="observaciones" rows="3"></textarea>
        </div>

        <!-- Fecha (con calendario) -->
        <div class="campo">
            <label for="fecha_formulario">Fecha del formulario *</label>
            <input
                type="date"
                name="fecha_formulario"
                id="fecha_formulario"
                value="<?php echo date('Y-m-d'); ?>"
                required
            >
        </div>

        <button type="submit">Enviar formulario</button>
    </form>

    <div style="margin-top: 15px;">
        <a href="reporte.php">Ver reporte de inscripciones</a>
    </div>

    <div class="footer">
        (© <?php echo date('Y'); ?> iTECH. All rights reserved.)
    </div>
</div>
</body>
</html>

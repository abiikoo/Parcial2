<?php
// src/Models/Inscrito.php
require_once __DIR__ . '/../Database/DB.php';

class Inscrito
{
    public $nombre;
    public $apellido;
    public $edad;
    public $sexo;
    public $pais_residencia;
    public $nacionalidad;
    public $tema_tecnologico;
    public $correo;
    public $celular;
    public $observaciones;
    public $fecha_formulario;
    public $errores = [];

    public function __construct(array $data)
    {
        $this->nombre          = trim($data['nombre'] ?? '');
        $this->apellido        = trim($data['apellido'] ?? '');
        $this->edad            = trim($data['edad'] ?? '');
        $this->sexo            = $data['sexo'] ?? '';
        $this->pais_residencia = $data['pais_residencia'] ?? '';
        $this->nacionalidad    = trim($data['nacionalidad'] ?? '');
        $this->tema_tecnologico = isset($data['tema']) && is_array($data['tema'])
            ? implode(',', $data['tema'])
            : '';
        $this->correo          = trim($data['correo'] ?? '');
        $this->celular         = trim($data['celular'] ?? '');
        $this->observaciones   = trim($data['observaciones'] ?? '');

        // Si viene fecha del formulario, la usamos; si no, usamos la actual
        if (!empty($data['fecha_formulario'])) {
            // El input date viene como YYYY-MM-DD → le agregamos la hora actual
            $this->fecha_formulario = $data['fecha_formulario'] . ' ' . date('H:i:s');
        } else {
            $this->fecha_formulario = date('Y-m-d H:i:s');
        }
    }

    public function validar(): bool
    {
        // Obligatorios
        if ($this->nombre === '') {
            $this->errores[] = 'El nombre es obligatorio.';
        }

        if ($this->apellido === '') {
            $this->errores[] = 'El apellido es obligatorio.';
        }

        if ($this->edad === '' || !is_numeric($this->edad)) {
            $this->errores[] = 'La edad es obligatoria y debe ser numérica.';
        }

        if ($this->sexo === '') {
            $this->errores[] = 'Debe seleccionar el sexo.';
        }

        if ($this->pais_residencia === '' || !is_numeric($this->pais_residencia)) {
            $this->errores[] = 'Debe seleccionar el país de residencia.';
        }

        if ($this->nacionalidad === '') {
            $this->errores[] = 'La nacionalidad es obligatoria.';
        }

        if (!filter_var($this->correo, FILTER_VALIDATE_EMAIL)) {
            $this->errores[] = 'El correo electrónico no es válido.';
        }

        if (empty($this->fecha_formulario)) {
            $this->errores[] = 'La fecha del formulario es obligatoria.';
        }

        // Requisito: poner nombre y apellido con mayúscula inicial
        $this->nombre   = ucwords(strtolower($this->nombre));
        $this->apellido = ucwords(strtolower($this->apellido));

        return empty($this->errores);
    }

    public function guardar(): void
    {
        $db = DB::getInstance()->getConnection();

        $sql = "INSERT INTO inscripto 
                (nombre, apellido, edad, sexo, pais_residencia, nacionalidad, 
                 tema_tecnologico, correo, celular, observaciones, fecha_formulario)
                VALUES (?,?,?,?,?,?,?,?,?,?,?)";

        $stmt = $db->prepare($sql);
        $stmt->execute([
            $this->nombre,
            $this->apellido,
            $this->edad,
            $this->sexo,
            $this->pais_residencia,
            $this->nacionalidad,
            $this->tema_tecnologico,
            $this->correo,
            $this->celular,
            $this->observaciones,
            $this->fecha_formulario
        ]);
    }

    public static function obtenerTodos(): array
    {
        $db = DB::getInstance()->getConnection();

        $sql = "SELECT i.*, p.nombre AS pais_nombre
                FROM inscripto i
                INNER JOIN pais p ON i.pais_residencia = p.id
                ORDER BY i.fecha_formulario DESC";

        $stmt = $db->query($sql);
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
}

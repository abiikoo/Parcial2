# Formulario de Inscripción – Proyecto PHP (Parcial)

Este proyecto es un sistema de **registro de inscripciones** desarrollado como parte de un laboratorio académico utilizando **PHP, MySQL y XAMPP**. El sistema permite que un usuario complete un formulario con sus datos personales, intereses tecnológicos y fecha del registro. Cada inscripción se guarda en una base de datos y puede visualizarse en un **reporte dinámico**. El objetivo principal es aplicar buenas prácticas de programación, separación de capas, uso de POO, conexión a base de datos y validaciones.

---

## Tecnologías Utilizadas

| Tecnología | Descripción |
|-----------|-------------|
| ![PHP](https://img.shields.io/badge/PHP-777BB4?style=for-the-badge&logo=php&logoColor=white) | Lenguaje principal del backend |
| ![XAMPP](https://img.shields.io/badge/XAMPP-FB7A24?style=for-the-badge&logo=xampp&logoColor=white) | Servidor local (Apache + MySQL) |
| ![MySQL](https://img.shields.io/badge/MySQL-4479A1?style=for-the-badge&logo=mysql&logoColor=white) | Base de datos del proyecto |
| ![HTML](https://img.shields.io/badge/HTML5-E34F26?style=for-the-badge&logo=html5&logoColor=white) | Interfaz del formulario |
| ![CSS](https://img.shields.io/badge/CSS3-563D7C?style=for-the-badge&logo=css3&logoColor=white) | Estilos en tema lila |
| ![GitHub](https://img.shields.io/badge/GitHub-000000?style=for-the-badge&logo=github&logoColor=white) | Control de versiones |

---

## Características
- Validaciones completas del lado servidor
- Estilo moderno en tonos lila
- Arquitectura limpia: config + src + public
- Código organizado y fácil de mantener
- Registro real utilizando PDO + MySQL

## Características del Formulario
- Validación de campos obligatorios
- Conversión automática de nombres a mayúscula inicial
- Input de fecha con calendario (`type="date"`)
- Combobox dinámico de países (MySQL)
- Checkboxes de áreas de interés (MySQL)
- Observaciones opcionales
- Estilo visual lila profesional


## Buenas Prácticas en Este Proyecto
- Arquitectura separada por capas (`config`, `src`, `public`)
- Uso de **POO** (Programación Orientada a Objetos)
- Clase de conexión con patrón **Singleton**
- Validaciones en backend antes de guardar en MySQL
- Consultas seguras con **PDO + prepared statements**
- Estilos centralizados en `/public/css/style.css`
- Código organizado y comentado
- Convenciones PSR básicas aplicadas

## Programa Ejecutado
- Interfaz del Formulario
  <img width="1919" height="939" alt="image" src="https://github.com/user-attachments/assets/045be331-2bd3-40cf-98e7-db8e09457c2e" />
- Reporte de Inscripciones
  <img width="1919" height="911" alt="image" src="https://github.com/user-attachments/assets/fbf3ea3e-36cf-4424-a69d-441a0a48e70e" />



---
Este laboratorio ha sido desarrollado por la estudiante de la Universidad Tecnológica de Panamá:  
**Nombre:** Abigail Koo  
**Correo:** abigail.koo@utp.ac.pa  
**Curso:** Ingeniería Web  
**Instructor:** Ing. Irina Fong <br>
**Fecha de Ejecución:** 14 de Noviembre de 2025

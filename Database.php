<?php
$serverName = "DESKTOP-FIDELPE\\SQLEXPRESS"; // Nombre del servidor de SQL Server
$connectionOptions = array(
    "Database" => "Asesorias", // Nombre de tu base de datos
    "ConnectionPooling" => 0 // Desactivar el agrupamiento de conexiones
);

// Intentar establecer la conexión
$conn = sqlsrv_connect($serverName, $connectionOptions);

// Verificar la conexión
if ($conn === false) {
    die( print_r( sqlsrv_errors(), true));
}

// Obtener los datos del formulario
$nombre = $_POST['nombre'];
$materia = $_POST['materia'];
$mensaje = $_POST['mensaje'];

// Preparar la consulta SQL para insertar los datos
$sql = "INSERT INTO solicitudes_asesoria (nombre, materia, mensaje) VALUES (?, ?, ?)";

// Ejecutar la consulta
$params = array($nombre, $materia, $mensaje);
$stmt = sqlsrv_query($conn, $sql, $params);

// Verificar si la consulta fue exitosa
if ($stmt === false) {
    die( print_r( sqlsrv_errors(), true));
} else {
    echo "Solicitud guardada correctamente.";
}

// Cerrar la conexión
sqlsrv_close($conn);
?>

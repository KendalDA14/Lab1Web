<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "lab1.1";

$conn = new mysqli($servername, $username, $password, $dbname);
if ($conn->connect_error) {
    die("Error de conexión: " . $conn->connect_error);
}

function ejecutarConsulta($sql) {
    global $conn;
    $resultado = $conn->query($sql);
    return $resultado;
}
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $deudor = $_POST['deudor'];
    $cuota = $_POST['cuota'];
    $cuota_capital = $_POST['cuota_capital'];
    $fecha_pago = $_POST['fecha_pago'];

    $sql = "INSERT INTO pagos (deudor, cuota, cuota_capital, fecha_pago) VALUES ('$deudor', $cuota, $cuota_capital, '$fecha_pago')";
    if (ejecutarConsulta($sql)) {
    } else {
        echo "Error: " . $conn->error;
    }
}
?>
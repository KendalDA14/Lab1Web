<?php
// Incluir el archivo de conexión
require_once 'conexion.php';
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>lab1</title>
</head>
<body>
    <h1>Registre un nuevo pago</h1>
    <form method="POST" action="<?php echo $_SERVER['PHP_SELF']; ?>">
        <label for="deudor">Deudor:</label>
        <input type="text" id="deudor" name="deudor" required><br><br>
        <label for="cuota">Cuota:</label>
        <input type="number" id="cuota" name="cuota" required><br><br>
        <label for="cuota_capital">Cuota Capital:</label>
        <input type="number" step="0.01" id="cuota_capital" name="cuota_capital" required><br><br>
        <label for="fecha_pago">Fecha de Pago:</label>
        <input type="date" id="fecha_pago" name="fecha_pago" required><br><br>
        <input type="submit" value="Registrar Pago">
    </form>

    <h1>Lista de Pagos</h1>
    <?php
    $sql = "SELECT id, deudor, cuota, cuota_capital, fecha_pago FROM pagos";
    $resultado = ejecutarConsulta($sql);

    echo "<table border='1'>
            <tr>
                <th>ID</th>
                <th>Deudor</th>
                <th>Cuota</th>
                <th>Cuota Capital</th>
                <th>Fecha de Pago</th>
            </tr>";

    if ($resultado->num_rows > 0) {
        while ($fila = $resultado->fetch_assoc()) {
            echo "<tr>
                    <td>{$fila['id']}</td>
                    <td>{$fila['deudor']}</td>
                    <td>{$fila['cuota']}</td>
                    <td>{$fila['cuota_capital']}</td>
                    <td>{$fila['fecha_pago']}</td>
                  </tr>";
        }
    } else {
        echo "<tr><td colspan='5'>No hay pagos.</td></tr>";
    }

    echo "</table>";
    ?>
</body>
</html>

<?php
$conn->close();
?>
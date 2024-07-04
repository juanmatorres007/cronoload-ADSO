<?php
include "../conexion/conexion.php";

// Obtener la conexión a la base de datos
$conn = conectaDb();

if ($conn) {
    try {
        $stmt = $conn->query("SELECT * FROM notification");

        while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
?>
            <div class="notification">
                <p>
                    <?php echo htmlspecialchars($row['user_not']); ?><br>
                    <?php echo htmlspecialchars($row['created_on']); ?><br>
                    <?php echo htmlspecialchars($row['notification']); ?><br><br><br>
                    <?php if (!empty($row['file_not'])) {
                        echo "<a href='" . htmlspecialchars($row['file_not']) . "' download>Descargar archivo adjunto</a><br>";
                        echo "<a href='" . htmlspecialchars($row['file_not']) . "' target='_blank'>Ver archivo adjunto</a>";
                    }
                    ?>
                </p>
            </div>
<?php
        }
    } catch (PDOException $e) {
        echo "Error en la consulta: " . $e->getMessage();
    }
} else {
    echo "Error en la conexión a la base de datos.";
}
?>

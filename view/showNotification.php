
<!DOCTYPE html>
<html>

<head>
    <meta charset='utf-8'>
    <meta http-equiv='X-UA-Compatible' content='IE=edge'>
    <title>Page Title</title>
    <meta name='viewport' content='width=device-width, initial-scale=1'>
    <link rel='stylesheet' type='text/css' media='screen' href='not.css'>
</head>

<body>
    <?php
    include "../conexion/conexion.php";

    try {
        $conn = conectaDb();
        $sql = "SELECT * FROM `notification`";
        $stmt = $conn->prepare($sql);
        $stmt->execute();
        $notifications = $stmt->fetchAll(PDO::FETCH_ASSOC);
    } catch (PDOException $e) {
        echo "Error: en la consulta " . $e->getMessage();
    }
    ?>

    <!DOCTYPE html>
    <html>
    <head>
        <title>Mensajes</title>
    </head>
    <body>
        <div class="container">
            <?php
            if (!empty($notifications)) {
                foreach ($notifications as $row) {
            ?>
                    <div class="notification">
                        <p>
                            <?php echo $row['created_on']; ?><br>
                            <?php echo $row['notification']; ?>
                        </p>
                    </div>
                <?php
                }
            } else {
                ?>
                <div class="message">
                    <p>
                        No hay ninguna conversación previa.
                    </p>
                </div>
            <?php
            }
            ?>
        </div>
    </body>
    </html>
</body>
</html>


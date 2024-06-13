
<!DOCTYPE html>
<html>
<head>
    <meta charset='utf-8'>
    <meta http-equiv='X-UA-Compatible' content='IE=edge'>
    <title>Page Title</title>
    <meta name='viewport' content='width=device-width, initial-scale=1'>
    <link rel='stylesheet' type='text/css' media='screen' href='main.css'>
</head>
<body>
<?php    
include "../conexion/conexion.php";

if($_POST) {
    $name = $_SESSION['name'];
    $msg = $_POST['msg'];
    
    try {
        $conn = conectaDb();
        $sql = "INSERT INTO `notification`(`notification`) VALUES (:msg)";
        $stmt = $conn->prepare($sql);
        $stmt->bindParam(':msg', $msg, PDO::PARAM_STR);
        
        if($stmt->execute()) {
            header('Location: chatpage.php');
        } else {
            echo "Algo salió mal";
        }
    } catch (PDOException $e) {
        echo "Error: en la consulta " . $e->getMessage();
    }
}
?>
<div class="container">
    <form method="post" action="chatpage.php">
        <div>
            <div>
                <textarea name="msg" placeholder="Ingrese Novedad"></textarea>
            </div>
            <div>
                <button type="submit">Enviar</button>
            </div>
        </div>
    </form>
</div>
</body>
</html>

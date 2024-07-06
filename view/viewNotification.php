<!DOCTYPE html>
<html>

<head>
    <meta charset='utf-8'>
    <meta http-equiv='X-UA-Compatible' content='IE=edge'>
    <title>Page Title</title>
    <meta name='viewport' content='width=device-width, initial-scale=1'>
    <link rel='stylesheet' type='text/css' media='screen' href='../css/sendNottifications.css'>
</head>

<body>
    <div class="card">
        <form class="form" method="post" action="../routes/sendNotification.php" enctype="multipart/form-data">
            <div class="group">
                <textarea name="msg" placeholder=""></textarea>
                <label for="comment">Notificaciones</label>
            </div>
            <label for="file-input" class="drop-container">
                <span class="drop-title">Añadir un archivo</span>
                seleccione un archivo
                <input type="file" name="fileNot" id="file-input"> 
            </label><br>
            <div class="button"><button type="submit">Enviar</button></div>
            </form>
    </div>


    <div>
        <a href="../view/showNotification.php"><button>enviadas</button></a>
    </div>
</body>

</html>
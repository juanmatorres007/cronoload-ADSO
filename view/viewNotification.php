<!DOCTYPE html>
<html>
<head>
    <meta charset='utf-8'>
    <meta http-equiv='X-UA-Compatible' content='IE=edge'>
    <title>Page Title</title>
    <meta name='viewport' content='width=device-width, initial-scale=1'>
    <link rel='stylesheet' type='text/css' media='screen' href='../css/main.css'>
</head>
<body>
    <div class="container">
        <form method="post" action="../routes/sendNotification.php" enctype="multipart/form-data">
            <div>
                <div>
                    <textarea name="msg" placeholder="Ingrese Novedad"></textarea>
                </div>
                <div>
                    <input type="file" name="fileNot"><br><br>
                </div>
                <div>
                    <button type="submit">Enviar</button>
                </div>
            </div>
        </form>
    </div><br><br>

    <div>
        <a href="../view/showNotification.php"><button>enviadas</button></a>
    </div>
</body>
</html>

<!DOCTYPE html>
<html>

<head>
    <meta charset='utf-8'>
    <meta http-equiv='X-UA-Compatible' content='IE=edge'>
    <title>Page Title</title>
    <meta name='viewport' content='width=device-width, initial-scale=1'>
    <link rel='stylesheet' type='text/css' media='screen' href='../css/notications.css'>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <script src='main.js'></script>
    <script type="text/javascript">
        function tiempoReal() {
            var not = $.ajax({
                url: '../routes/showNotification.php',
                dataType: 'text',
                async: false
            }).responseText;

            document.getElementById("notifications").innerHTML = not;
        }
        setInterval(tiempoReal, 1000);
    </script>

</head>

<body>
    <header>
        <h1>NOTIFICACIONES ENVIADAS </h1>
    </header>
    <section id="notifications">
    </section>
</body>

</html>
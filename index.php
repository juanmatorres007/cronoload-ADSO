<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css" rel="stylesheet">
    <link rel='stylesheet' type="text" media='screen' href='css/styles.css'>
    <title>Login MVC</title>
    
</head>


<body class="boody">
    <div class="container w-75 bg-info mt-5 rounded shodow">
        <div class="row align-items-stretch">
            <div class="col bg d-none d-lg-block col-md-5 col-lg-5 col-xl-6 col-xs-6 col-sm-3 rounded" id="lol">
                
            </div>

            <div class="col p-5 bg-white">
                <div class="col-md-12 text-end col-sm-3 offset-sm-3 text-center">
                    <img src="img/logo.png" width="230px" class="">
                </div>

                <h5 class="fw-bold text-center py-5">INICIAR SESIÓN</h5>
                <?php if (isset($error)) { ?>
                    <p><?php echo $error; ?></p>
                <?php } ?>

                <!-- LOGIN -->

                <form action="routes/login.php" class="text-center" class="tabla" method="POST">
                    <input type="hidden" name="login_form" value="1"> <!-- Campo oculto para identificar el formulario -->

                    <?php
                    $ex = $_REQUEST;
                    if (!empty($ex['x'])) {
                    ?>
                        <h6>N.Documento o Constraseña Son Incorrectos</h6><br>
                    <?php
                    }
                    ?>
                    <div class="mb-4">
                        <label for="email" class="form-label">Numero de Documento</label>
                        <input type="number" class="form-control" name="document" required>
                    </div>

                    <div class="mb-4">
                        <label for="password" class="form-label">Contraseña</label>
                        <div class="input-group">

                            <input type="password" name="pass" id="pass" class="form-control" name="txtcontraseña" id="bry">
                            <span class="input-group-text" onclick="vista_form()">
                                <i class="bi bi-eye" id="ver"></i>
                                <i class="bi bi-eye-slash" id="ocultar" style="display: none;"></i>
                            </span>
                        </div><br><br>

                        <div class="d-grid">
                            <input name="btn" type="submit" class="btn btn-outline-dark" value="Iniciar sesión">
                        </div><br><br>

                        <div class="d-grid gap-2 text-center">
                            <a href="" class="sd">¿Has olvidado tu contraseña?</a><br>
                            <h5>Cualquier información:</h5>
                            <h6>Servicioalciudadano@sena.edu.co.</h6>
                            <h6>+57 3204822017</h6>
                        </div>
                    </div>
            </div>
        </div>
    </div>
 </div>
 <script>
        function vista_form() {
            let pass = document.getElementById('pass');
            let ver = document.getElementById('ver');
            let ocultar = document.getElementById('ocultar');
            if (pass.type === 'password') {
                pass.type = 'text';
                ver.style.display = 'none';
                ocultar.style.display = 'block';

            } else {
                pass.type = 'password';
                ver.style.display = 'block';
                ocultar.style.display = 'none';
            }

        }
        </script>
</body>

</html>
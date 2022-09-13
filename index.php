<?php
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <title>Asistencia | Feminicidio: Retos y desafíos en la impartición de justicia </title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!--===============================================================================================-->
    <link rel="icon" type="image/png" href="./assets/logos/isoooom.png"/>
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="vendor/bootstrap/css/bootstrap.min.css">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="fonts/font-awesome-4.7.0/css/font-awesome.min.css">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="vendor/animate/animate.css">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="vendor/css-hamburgers/hamburgers.min.css">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="vendor/select2/select2.min.css">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="./css/util.css">
    <link rel="stylesheet" type="text/css" href="./css/main.css">
    <!--===============================================================================================-->
    <script language="JavaScript" type="text/javascript" src="js/function.js"></script>
    <!--===============================================================================================-->
</head>
<body>
<div class="limiter">
    <div class="container-login100">
        <div class="wrap-login100">
            <div class="login100-pic js-tilt" style="align-items: center;" data-tilt>
                <img src="./assets/logos/imgFJD_1.png" alt="IMG">
            </div>

            <form class="login100-form validate-form" id="testeo" method="post" name="checker" action="" onsubmit="enviarDatosAsistente(); return false;">
                <div class="img-form">
                    <img src="./assets/logos/imgFJD_2.png" alt="IMG">
                </div>
                <span class="login100-form-title">Bienvenido</span>
                <div style="justify-content: center; text-align: center; color: var(--primary-color);" class="m-b-20"><small style="justify-self: center;">Para registrar tu asistencia, proporciona los siguientes datos: <br> </small></div>
                <div class="wrap-input100 validate-input" data-validate = "Valor requerido.">
                    <input class="input100" type="text" name="nom" placeholder="Nombre completo">
                    <span class="focus-input100"></span>
                    <span class="symbol-input100">
							<i class="fa fa-user" aria-hidden="true"></i>
                    </span>
                </div>
                <div class="wrap-input100 validate-input" data-validate = "Es necesario un email válido: ex@abc.xyz">
                    <input class="input100" type="email" name="email" placeholder="Email">
                    <span class="focus-input100"></span>
                    <span class="symbol-input100">
							<i class="fa fa-envelope" aria-hidden="true"></i>
						</span>
                </div>
                <div class="wrap-input100 validate-input" data-validate = "Valor requerido">
                    <p hidden>Su ubicación:  <span id="latitud"></span> / <span id="longitud"></span></p>
                    <p id="location" hidden></p>
                    <!--<input class="input100" type="text" name="loc" id="location">-->
                </div>
                <div style="justify-content: center; text-align: center; color: var(--primary-color);"><small style="justify-self: center;">Su ubicación será enviada para validar su asistencia.<br> </small></div>
                <div style="justify-content: center; text-align: center; color: var(--primary-color);"><small style="justify-self: center;">Antes de continuar, verifica que tus datos sean correctos.<br> </small></div>
                <div class="container-login100-form-btn">
                    <button class="login100-form-btn" name="enviar" type="submit">
                        Enviar datos
                    </button>
                </div>
                <div style="justify-content: center; text-align: center; color: var(--primary-color);" class="m-b-20" id="resultado">
                    <small style="justify-self: center;"> </small></div>
            </form>
        </div>
    </div>
</div>




<!--===============================================================================================-->
<script src="vendor/jquery/jquery-3.2.1.min.js"></script>
<!--===============================================================================================-->
<script src="vendor/bootstrap/js/popper.js"></script>
<script src="vendor/bootstrap/js/bootstrap.min.js"></script>
<!--===============================================================================================-->
<script src="vendor/select2/select2.min.js"></script>
<!--===============================================================================================-->
<script src="vendor/tilt/tilt.jquery.min.js"></script>
<script >
    $('.js-tilt').tilt({
        scale: 1.1
    })
</script>
<!--===============================================================================================-->
<script src="js/main.js"></script>
<script src="js/location.js"></script>
</body>
</html>

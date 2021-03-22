<!DOCTYPE html>
<html lang="es">
<head>
	<title>Recordar Contrase&ntildea</title>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
<!--===============================================================================================-->	
	<link rel="icon" type="image/png" href="../images/icons/favicon.ico"/>
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="../vendor/bootstrap/css/bootstrap.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="../assets/fonts/font-awesome-4.7.0/css/font-awesome.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="../assets/fonts/Linearicons-Free-v1.0.0/icon-font.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="../vendor/animate/animate.css">
<!--===============================================================================================-->	
	<link rel="stylesheet" type="text/css" href="../vendor/css-hamburgers/hamburgers.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="../vendor/animsition/css/animsition.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="../vendor/select2/select2.min.css">
<!--===============================================================================================-->	
	<link rel="stylesheet" type="text/css" href="../vendor/daterangepicker/daterangepicker.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="../assets/css/util.css">
	<link rel="stylesheet" type="text/css" href="../assets/css/main.css">
<!--===============================================================================================-->
</head>
<body style="background-color: #666666;">
	
	<div class="limiter">
		<div class="container-login100">
			<div class="wrap-login100">
				<form class="login100-form validate-form" action="../backend/consultarContra.php" method="GET">
					<span class="login100-form-title p-b-43">
						Recordar Contrase&ntildea
					</span>

					<?php
						if(isset($_GET["fallo"]) && $_GET["fallo"] == 'noEnviado')
						{
							echo "<div style='color:red'>Este correo no existe, intente nuevamente </div>";
						}
						else if (isset($_GET["fallo"]) && $_GET["fallo"] == 'vacio')
						{
							echo "<div style='color:red'>Llene el espacio para poder procesar su solicitud </div>";
						}
					?>
					
					<div class="wrap-input100 validate-input" data-validate = "Por favor ingrese una dirección de correo electronico valida">
						<input class="input100" type="text" name="email" id="email">
						<span class="focus-input100"></span>
						<span class="label-input100">Correo</span>
					</div>

					<div class="container-login100-form-btn">
						<input type="submit" value="Enviar Solicitud" class="login100-form-btn">
					</div>

                    <br>

                    <div class="container-login100-form-btn">
                        <div>
							<a href="../index.php">
								Iniciar Sesi&oacuten
							</a>
						</div>
					</div>
					
				</form>

				<div class="login100-more" style="background-image: url('../images/UTP1.jpg');">
			</div>
		</div>
	
<!--===============================================================================================-->
	<script src="../vendor/jquery/jquery-3.2.1.min.js"></script>
<!--===============================================================================================-->
	<script src="../vendor/animsition/js/animsition.min.js"></script>
<!--===============================================================================================-->
	<script src="../vendor/bootstrap/js/popper.js"></script>
	<script src="../vendor/bootstrap/js/bootstrap.min.js"></script>
<!--===============================================================================================-->
	<script src="../vendor/select2/select2.min.js"></script>
<!--===============================================================================================-->
	<script src="../vendor/daterangepicker/moment.min.js"></script>
	<script src="../vendor/daterangepicker/daterangepicker.js"></script>
<!--===============================================================================================-->
	<script src="../vendor/countdowntime/countdowntime.js"></script>
<!--===============================================================================================-->
	<script src="../assets/js/main.js"></script>

</body>
</html>
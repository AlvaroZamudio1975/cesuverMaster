<!doctype html>
<html lang="es-MX">
	<head>
		<!-- Google tag (gtag.js) -->
		<script async src="https://www.googletagmanager.com/gtag/js?id=G-3Y676XCGJE"></script>
		<script>
		window.dataLayer = window.dataLayer || [];
		function gtag(){dataLayer.push(arguments);}
		gtag('js', new Date());

		gtag('config', 'G-3Y676XCGJE');
		</script>
		<title>Solicitud Vacaciones</title>
	    <meta name="description" content="Formato electrónico para la automatización de la solicitud de Vacaciones." />
	    <link href="estilos.css" rel="stylesheet" type="text/css" />
	    <link href="favicon.png" rel="icon" type="image/png" />
	</head>
	<body>
		<header>
			<div class="logo"><img src="logoCesuver.png" /></div>
		</header>
		<div class="contenedor">
			<form id="frmEmpleado" name="frmEmpleado" onsubmit="ValidaCampo();" action="process.php" method="post">
				<h2>Solicitud de Vacaciones</h2>
				<div class="formulario">
					<div class="instrucciones">
						Ingresa tu número de empleado
					</div>
					<div class="etiqueta">No. empleado</div>
					<div class="campo">
						<input type="text"  class="textbox" id="NumeroEmpleado" name="NumeroEmpleado" onchange="ValidaCampo();" />
					</div>
					<div class="boton">
						<input type="submit" name="botonsubmit" id="botonsubmit" value="Validar y Enviar" style="display:none;" />
					</div>
					<span style="font-size:10pt;">Se te recuerda que el número máximo de días para disfrutar es de 10.</span>
				</div>
			</form>
			
		</div>
		<footer>
			<hr/>
			Elaborado por Alvaro Zamudio Díaz @ 2025
		</footer>
		<script>
			//Se crea una función para validar que el campo esté lleno
			function ValidaCampo()
			{
				if(document.getElementById("NumeroEmpleado").value=="")
				{
					document.getElementById("botonsubmit").style.display="none";
				}
				else
				{
					document.getElementById("botonsubmit").style.display="block";
				}
			}
		</script>
	</body>
</html>

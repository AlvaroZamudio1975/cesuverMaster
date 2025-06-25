<!doctype html>
<html lang="es-MX">
	<head>
		<title>Solicitud Vacaciones (Respuesta)</title>
	    <meta name="description" content="Formato electrónico para la automatización de la solicitud de Vacaciones." />
	    <link href="css/estilos.css" rel="stylesheet" type="text/css" />
	    <link href="images/favicon.png" rel="icon" type="image/png" />
	</head>
	<body>
		<header>
			<div class="logo"><img src="images/logoCesuver.png" /></div>
		</header>
        <div class="Respuesta">
            <?php
            if ($_SERVER["REQUEST_METHOD"] === "POST") {
                // Recupera el dato
                $numemp = htmlspecialchars($_POST['NumeroEmpleado']);

                $servername = "localhost";
                $username = "root";
                $password = "";
                $database = "vacaciones_db";
                $diasdisponibles=0;

                // Crear conexión
                $conn = new mysqli($servername, $username, $password, $database);

                // Verificar conexión
                if ($conn->connect_error) {
                    die("Conexión fallida: " . $conn->connect_error);
                }
                
            // Consulta SQL
            $sql = "SELECT FK_EMPLEADO,FL_DIAS,FL_NOMBRE FROM tb_dias_vacaciones LEFT JOIN tb_empleados ON PK_EMPLEADO=FK_EMPLEADO WHERE FK_EMPLEADO=$numemp";
            $resultado = $conn->query($sql);
            
            // Verificar si hay resultados
            if ($resultado->num_rows > 0) {
                // Recorrer los resultados
                while ($fila = $resultado->fetch_assoc()) {
                    $diasdisponibles=10-$fila["FL_DIAS"];
                    echo " - ID: " . $fila["FK_EMPLEADO"] . "<br/> - Días Gozados: " . $fila["FL_DIAS"] . "<br/> - Nombre: " . $fila["FL_NOMBRE"] . "<br/><br/>";
                }
                // Muestra los resultados
                echo "Felicidades! El número de empleado (<b>$numemp</b>) tiene <b>'$diasdisponibles'</b> días de vacaciones disponibles.<br/><br/><style>#formFinal{display:block;}</style>";
            } 
            else {
                echo "No se encontraron resultados.<style>#formFinal{display:none;}</style>";
            }

            // Cerrar conexión
            $conn->close();

            } else {
                echo "Método equivocado.";
            }
            ?>
        </div>
        <div class="formulario" id="formFinal">
			<div class="etiqueta">Días Solcitados:</div>
            <div class="campo">
                <input type="text"  class="textbox" id="NumeroEmpleado" name="NumeroEmpleado"/>
            </div>
            <div class="boton">
                <input type="submit" name="botonsubmit" id="botonsubmit" value="Iniciar Trámite" />
            </div>
            <span style="font-size:10pt;">Se te recuerda que el número máximo de días para disfrutar es de 10.</span>
        </div>
        <div class="volver"><a href="index.php"><< Regresar</a></div>
        <footer>
			<hr/>
			Elaborado por Alvaro Zamudio Díaz @ 2025
		</footer>
    </body>
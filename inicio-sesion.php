<?php
// Config File
require 'config.php';

if (isset($_POST['user_login']) && isset($_POST['user_pass']) ) {

	// Create connection
	$conn = new mysqli($servername, $username, $password, $dbname);
	// Check connection
	if ($conn->connect_error) {
	    die("Connection failed: " . $conn->connect_error);
	} 
	
	$user_login = $_POST ['user_login'];
	$user_pass = $_POST ['user_pass'];

	$salt='Lto7LuGzDYHQKPL/s*a7qL2D';
	$saltedHash = md5($user_pass . $salt);
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Panel de Control |Tienda Fox electronics</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link href="https://fonts.googleapis.com/css?family=Open+Sans" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="css/styles.css">
</head>
<body>
	<!-- Navbar content -->
	<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
	  <a class="navbar-brand" href="index.html">Tienda Fox electronics</a>
	  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
	    <span class="navbar-toggler-icon"></span>
	  </button>
	  <div class="collapse navbar-collapse" id="navbarNavDropdown">
	    <ul class="navbar-nav">
	    	<li class="nav-item dropdown">
	    	  <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
	    	    Administrador
	    	  </a>
	    	  <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
	    	    <a class="dropdown-item" href="create-database.php">Crear Base de Datos</a>
	    	    <a class="dropdown-item" href="create-table.php">Crear Tabla en BD</a>
	    	    <a class="dropdown-item" href="create-table-users.php">Crear Tabla Usuarios en BD</a>
	    	    <a class="dropdown-item" href="registro-usuario.html">Registro Usuario</a>
	    	    <a class="dropdown-item" href="inicio-sesion.html">Inicio de Sesión</a>
	    	    <a class="dropdown-item" href="backup-database.php">Backup Base de Datos</a>
	    	  </div>
	    	</li>
	      <li class="nav-item dropdown active">
	        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
	          Inventario
	        </a>
	        <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
	          <a class="dropdown-item" href="ingresar-producto.html">Ingresar Producto</a>
	          <a class="dropdown-item" href="actualizar-producto.html">Actualizar Producto</a>
	          <a class="dropdown-item" href="eliminar-producto.html">Eliminar Producto</a>
	          <a class="dropdown-item" href="consultar-producto.html">Consultar Producto</a>
	          <a class="dropdown-item" href="informe-inventario.php">Informe Inventario</a>
	        </div>
	      </li>
	      <li class="nav-item">
	        <a class="nav-link" href="ventas.html">Ventas</a>
	      </li>
	      <li class="nav-item dropdown">
	        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
	          Utilidades
	        </a>
	        <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
	          <a class="dropdown-item" href="calculadora.html">Calculadora Ventas</a>
	          <a class="dropdown-item" href="calculadora-resistencias.html">Calculadora Resistencias</a>
	        </div>
	      </li>
	    </ul>
	  </div>
	</nav>

	<!-- / Navbar content -->

	<div class="container mt-4">
	  <?php 
	  	$sql = "SELECT user_login, user_pass, user_status, reg_date FROM $tableusers WHERE user_login = '$user_login'";
	  		$result = $conn->query($sql);

	  		if ($result->num_rows > 0) {
	  			$row = $result->fetch_assoc();
	  			
	  			if ( $saltedHash === $row["user_pass"]) {
	  				//echo $saltedHash . " = " . $row["user_pass"];
	  				if ($row["user_status"] == 1) {

	  					session_start();

	  					$_SESSION["session_expires"] = time() + $maximum_user_session;
	  					$_SESSION["user_login"] = $row["user_login"];
	  					$session_time = date('H:i A', $_SESSION['session_expires']); 

	  					?>
	  						<h1>Panel de Control</h1>
	  						<p>Bienvenido <strong><?php echo $row["user_login"]; ?></strong> al Panel de Control </p>
	  						<p><?php echo "Su sesión finaliza a las: ".$session_time; ?></p>				 
	  					<?php 
	  				}
	  				else {
	  					?>
	  						<h1>Error Inicio de Sesión</h1>
	  					    <p>La cuenta: <strong><?php echo $row["user_login"]; ?></strong> fue inhabilitada por el administrador</p>
	  					<?php 
	  				}
	  			}
	  			else {
	  				?>
	  					<h1>Error Inicio de Sesión</h1>
	  				    <p>Error de Inicio de sesión verifique el usuario y la contraseña</p>
	  				<?php    
	  			}	

	  			?>	  			
	  			
	  		<?php 
	  		} else {
	  			?>
	  			<h1>Error Inicio de Sesión</h1>
	  		    <p>Error de Inicio de sesión verifique el usuario y la contraseña</p>
	  		<?php    
	  		}
	  		$conn->close();

	  	}
	  	else {
	  		echo "Error al enviar el formulario";
	  	}

	  ?>	

	 
	</div>
	<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
	<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
	<script src="js/main.js"></script>
</body>
</html>	
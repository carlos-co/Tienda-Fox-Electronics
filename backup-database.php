<?php 
// Config File
require 'config.php';
require 'session.php';

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
$dir = dirname(__FILE__) . '/backups/backup_bdunad33.dump';
exec("mysqldump --user={$username} --password={$password} --host={$servername} {$dbname} --result-file={$dir} 2>&1", $output);
//var_dump($output);
?>

 <!DOCTYPE html>
 <html lang="es">
 <head>
     <meta charset="UTF-8">
     <title>Backup Base de Datos</title>
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
 	      <li class="nav-item dropdown">
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
 	  <span class="navbar-text"><?php echo "@" . $_SESSION["user_login"] . " su sesión finaliza a las: ".$session_time; ?></span>
 	</nav>
 	<!-- / Navbar content -->

 	<div class="container  mt-4">
 	  <h1>Backup Base de Datos</h1>
 	  <p>Información referente a la copia de seguridad: <?php echo $output[0]; ?></p>
 	  <a class="btn btn-primary product__button" href="backups/backup_bdunad33.dump" role="button">Descargar Backup</a>

 	</div>
 	<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
 	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
 	<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
 	<script src="js/main.js"></script>
 </body>
 </html>

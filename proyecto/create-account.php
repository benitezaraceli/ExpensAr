<?php 
// *****************************************************************************
// Nombre: index.php
// Descripción: 
// Autor: 
// Fecha de creación: 
// Fecha de modificacion: 99/99/9999 Autor: xxx  Modificación: xxxxxxxx
//******************************************************************************

include("top.php");

?>

<body>

<div class="container">

	<?php

	$check = "SELECT * FROM persona WHERE dni = '$_POST[dni]' OR username = '$_POST[username]' ";

	$result = $db-> query($check);
	$count = mysqli_num_rows($result);

	if ($count == 1) {
	echo "<div class='alert center' role='alert'><h3>El usuario ingresado ya está registrado.</h3><hr />
		<a class='btn btn-outline-primary' href='index.php' role='button'>Ingresar</a></div>";

	} else {	
	
	$nombre = $_POST['nombre'];
	$apellido = $_POST['apellido'];
	$dni = $_POST['dni'];
	$telefono = $_POST['telefono'];
	$username = $_POST['username'];
	$pass = $_POST['password'];
	
	$passHash = password_hash($pass, PASSWORD_DEFAULT);
	
	$query = "INSERT INTO persona (nombre, apellido, dni, telefono, username, password)
				VALUES ('$nombre', '$apellido', '$dni', '$telefono', '$username', '$passHash')";

	if (mysqli_query($db, $query)) {

		echo "<div class='alert alert-success center' role='alert'><h3>La cuenta ha sido registrada correctamente.</h3>
		<a class='btn btn-outline-primary' href='index.php' role='button'>Login</a></div>";		
		} else {
			echo "Error: " . $query . "<br>" . mysqli_error($db);
		}	
	}	
	mysqli_close($db);
	?>
</div>

  </body>
</html>
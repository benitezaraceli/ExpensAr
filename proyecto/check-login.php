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
	
	$username = $_POST['username']; 
	$password = $_POST['password'];
	
	$rs = mysqli_query($db, "SELECT password, nombre, apellido, dni FROM persona WHERE username = '$username'");

	$row = mysqli_fetch_assoc($rs);
	
	$hash = $row['password'];

	if (password_verify($_POST['password'], $hash)) {
		
		$_SESSION['loggedin'] = true;
		$_SESSION['nombre'] = $row['nombre'];
		$_SESSION['apellido'] = $row['apellido'];
		$_SESSION['dni'] = $row['dni'];
		$_SESSION['start'] = time();
		$_SESSION['expire'] = $_SESSION['start'] + (999 * 999) ;
		
		 echo '<meta http-equiv="Refresh" content="0;URL=home.php">';

	} else {
		echo "<div class='alert alert-danger center' role='alert'>Las credenciales son invalidas<p><a href='./index.php'><strong>Regresar</strong></a></p></div>";			
	}

?>
	</div>

</body>
</html>
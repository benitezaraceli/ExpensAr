<?php 
// *****************************************************************************
// Nombre: agregar-evento.php
// Descripción: 
// Autor: 
// Fecha de creación: 
// Fecha de modificacion: 99/99/9999 Autor: xxx  Modificación: xxxxxxxx
//******************************************************************************

include("navbar.php");
if ($_SESSION['dni'] == 40302747) {

?>

<body>

<div class="container">

	<?php
	
	$tema = $_POST['tema'];
	$fecha = $_POST['fecha'];
	$id_edificio = $_POST['id_edificio'];

	if((time() - strtotime($_POST['fecha']))-(60*60*24) < strtotime($_POST['fecha'])){

		$check = "SELECT * FROM agenda WHERE fecha = '$fecha' AND id_edificio= '$id_edificio";

		$result = $db-> query($check);
		$count = mysqli_num_rows($result);

		if ($count == 1) {
			echo "<div class='alert center' role='alert'><h3>Ya existe un evento a esa fecha y hora</h3><hr />
			<a class='btn btn-outline-primary' href='agenda.php' role='button'>Regresar</a></div>";

		} else {	
		
			$query = "INSERT INTO agenda (tema, fecha, id_edificio)
					VALUES ('$tema', '$fecha', '$id_edificio')";

		if (mysqli_query($db, $query)) {

			echo '<meta http-equiv="Refresh" content="0;URL=agenda-root.php">';	
			} else {
				echo "Error: " . $query . "<br>" . mysqli_error($db);
			}	
		}	
		mysqli_close($db);
		?>
	</div>

	</body>
	</html>
	<?php
	}else{
		echo "<div class='alert alert-danger center' role='alert'>Ingrese una fecha válida<p><a href='./form-agregar-evento.php'><strong>Regresar</strong></a></p></div>";
	}
?>
	</div>
</body>
</html>

<?php
}else{
    echo "<div class='alert alert-danger center' role='alert'>Usuario sin acceso a esta página<p><a href='./index.php'><strong>Login</strong></a></p></div>";
}
?>
	</div>
</body>
</html>
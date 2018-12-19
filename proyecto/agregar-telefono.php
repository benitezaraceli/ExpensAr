<?php 
// *****************************************************************************
// Nombre: form-reclamo.php
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
	
	$nombre_telefono = $_POST['nombre_telefono'];
	$tipo_telefono = $_POST['tipo_telefono'];
	$telefono = $_POST['telefono'];
	$id_edificio = $_POST['id_edificio'];

	try{

		$check = "SELECT * FROM telefono
		WHERE nombre_telefono = '$nombre_telefono' AND telefono = '$telefono' AND id_edificio = $id_edificio" ;

		$result = $db-> query($check);
		$count = mysqli_num_rows($result);

		if ($count == 1) {
		echo "<div class='alert center' role='alert'><h3>Este telefono ya esta registrado</h3><hr />
			<a class='btn btn-outline-primary' href='telefonos-root.php' role='button'>Regresar</a></div>";

		} else {	
		
		$query = "INSERT INTO TELEFONO (nombre_telefono, tipo_telefono, telefono, id_edificio)
					VALUES ('$nombre_telefono', '$tipo_telefono', '$telefono', '$id_edificio')";

		if (mysqli_query($db, $query)) {

			echo '<meta http-equiv="Refresh" content="0;URL=telefonos-root.php">';	
			} else {
				echo "Error: " . $query . "<br>" . mysqli_error($db);
			}	
		}	
		mysqli_close($db);

	}catch(Exception $ex){
        echo "OCURRIO UN ERROR AL ACTUALIZAR LOS DATOS";
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
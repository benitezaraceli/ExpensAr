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
	
	$titulo = $_POST['titulo'];
	$comentario = $_POST['comentario'];
	$id_edificio = $_POST['id_edificio'];
		
	$query = "INSERT INTO novedades (titulo, comentario, id_edificio)
				VALUES ('$titulo', '$comentario', '$id_edificio')";

	if (mysqli_query($db, $query)) {

		echo '<meta http-equiv="Refresh" content="0;URL=home.php">';	
	} else {
			echo "Error: " . $query . "<br>" . mysqli_error($db);
	}	
	
	mysqli_close($db);
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
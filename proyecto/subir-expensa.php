<?php 
include("navbar.php");

$id_edificio = $_POST['edificio'];
$piso = $_POST['piso'];
$departamento = $_POST['departamento'];

try{

	$sql = "SELECT departamento.id_departamento FROM departamento
				WHERE id_edificio = '$id_edificio'
				AND piso = '$piso' AND departamento = '$departamento' ";

	$result = mysqli_query($db, $sql);

	if (mysqli_num_rows($result) < 0) {
		echo "<div class='alert center' role='alert'><h3>Error</h3><hr />
			<a class='btn btn-outline-primary' href='form-subir-expensa.php' role='button'>Regresar</a></div>";

	} else {

		while($row = mysqli_fetch_assoc($result)) {

			mysqli_autocommit($db, false);

			if ($_FILES) {
				$carpeta = "expensas/";
				$destino = $carpeta . time() . ".pdf";
				move_uploaded_file($_FILES['archivo']['tmp_name'], $destino);

				$sql = "INSERT INTO expensas (expensa, id_departamento, alias)
					VALUES(
					'" . $_FILES['archivo']['name'] . "', '" . $row['id_departamento'] . "', '" . time() . "')";

				mysqli_query($db, $sql);

				mysqli_commit($db);
			}
		}
	}

}catch(Exception $ex){
	var_dump($ex);
	mysqli_rollback($db);
}

header('Location: ./form-subir-expensa.php');

?>

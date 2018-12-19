<?php 
include("navbar.php");

$asunto = $_POST['asunto'];
$id_tipo_reclamo = $_POST['id_tipo_reclamo'];
$id_sector = $_POST['id_sector'];
$comentario = $_POST['comentario'];

try{

	mysqli_autocommit($db, false);

	$sql = "INSERT INTO reclamo (asunto, id_tipo_reclamo, id_sector, comentario, id_persona) 
			VALUES( 
			'$asunto','$id_tipo_reclamo','$id_sector','$comentario', '" . $_SESSION['dni'] . "')";
	mysqli_query($db, $sql);

	$id_reclamo = mysqli_insert_id($db);

	if ($_FILES) {
		foreach($_FILES['archivo']['name'] as $key=>$val){
			
			$carpeta = "uploads/";
			$destino = $carpeta . time().$_FILES['archivo']['name'][$key];
			move_uploaded_file($_FILES['archivo']['tmp_name'][$key], $destino);

			$sqlArchivo ="INSERT INTO archivo_reclamo (nombre_archivo, id_reclamo) 
				VALUES( 
				'" . time().$_FILES['archivo']['name'][$key] . "','$id_reclamo')";

			mysqli_query($db, $sqlArchivo);
		}
	}

	mysqli_commit($db);

}catch(Exception $ex){
	var_dump($ex);
	mysqli_rollback($db);
}

header('Location: ./home.php');

?>

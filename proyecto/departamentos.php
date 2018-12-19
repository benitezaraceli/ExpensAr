<?php
	require_once('includes/conexion.php');

	if (! isset($_GET['id_edificio']) || null == $_GET['id_edificio']){
		echo "no"; 
	}

	$id_edificio = $_GET['id_edificio'];

	$sql ="SELECT departamento AS id FROM DEPARTAMENTO WHERE id_edificio= '$id_edificio'";

	$rs = mysqli_query($db, $sql);
	$arrayDepartamentos = array();
	if ( $rs ) {
		while ($r = mysqli_fetch_array($rs) ) {
			array_push($arrayDepartamentos, $r);
		}
	}

	echo json_encode($arrayDepartamentos);
?>
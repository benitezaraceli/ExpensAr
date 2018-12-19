<?php
	require_once('includes/conexion.php');

	$sql ="SELECT id_edificio, direccion FROM edificio ORDER BY direccion";

	$rs = mysqli_query($db, $sql);
	$arrayEdificios = array();
	if ( $rs ) {
		while ($r = mysqli_fetch_array($rs) ) {
			array_push($arrayEdificios, $r);
		}
	}
	echo json_encode($arrayEdificios);
?>
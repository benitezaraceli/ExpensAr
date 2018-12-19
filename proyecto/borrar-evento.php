<?php 
// *****************************************************************************
// Nombre: personas-borrar.php
// Descripción: 
// Autor: 
// Fecha de creación: 
// Fecha de modificacion: 99/99/9999 Autor: xxx  Modificación: xxxxxxxx
//******************************************************************************

include("top.php");

$sql = "DELETE FROM agenda WHERE id_agenda = " . $_GET["id_agenda"];
$rs = mysqli_query($db, $sql);

header('Location: agenda-root.php');

?>
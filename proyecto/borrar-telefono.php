<?php 
// *****************************************************************************
// Nombre: personas-borrar.php
// Descripción: 
// Autor: 
// Fecha de creación: 
// Fecha de modificacion: 99/99/9999 Autor: xxx  Modificación: xxxxxxxx
//******************************************************************************

include("top.php");

$sql = "DELETE FROM telefono WHERE id_telefono = " . $_GET["id_telefono"];
$rs = mysqli_query($db, $sql);

header('Location: telefonos-root.php');

?>
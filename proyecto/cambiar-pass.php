<?php 
// *****************************************************************************
// Nombre: persona-lista.php
// Descripción: 
// Autor: 
// Fecha de creación: 
// Fecha de modificacion: 99/99/9999 Autor: xxx  Modificación: xxxxxxxx
//******************************************************************************

include("navbar.php");

if($_SERVER['REQUEST_METHOD'] == 'POST'){
        $password = $_POST['password'];
        $new_pass = $_POST['new_pass'];
        $confirm_pass = $_POST['confirm_pass'];


    try{

        $rs = mysqli_query($db, "SELECT password FROM persona WHERE dni= '" . $_SESSION['dni'] . "'");

        $row = mysqli_fetch_assoc($rs);
  
        $hash = $row['password'];

        if (password_verify($_POST['password'], $hash) && $new_pass == $confirm_pass) {

            $passHash = password_hash($new_pass, PASSWORD_DEFAULT);

            $sql = "UPDATE persona SET 
                    password='$passHash'
                    WHERE dni= '" . $_SESSION['dni'] . "'";

            mysqli_query($db, $sql);

            header('Location: index.php');

          } else {
        echo "<div class='alert alert-danger center' role='alert'>Datos ingresados invalidos<p><a href='./index.php'><strong>Regresar</strong></a></p></div>";      
          }

    }catch(Exception $ex){
        echo "OCURRIO UN ERROR";
    }
}
?>
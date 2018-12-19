<?php
//el usuario no está logueado 
if (!isset($_SESSION['loggedin']) || $_SESSION['loggedin'] != true){
    echo "<div class='alert alert-danger center' role='alert'>
    <h4>Es necesario ingresar con sus credenciales.</h4>
    <p><a href='./index.php'>Ingrese aquí!</a></p></div>";
    exit;
}
    // verificamos que la sesiòn no haya expirado.
    $now = time();            
    if ($now > $_SESSION['expire'] )
    {
        session_destroy();
        echo "<div class='alert alert-danger center' role='alert'>
        <h4>Su sesión ha expirado. Por favor vuelva a ingresar!</h4>
        <p><a href='./index.php'>Ingrese aquí</a></p></div>";
        exit;
    }
?>
<?php 
// *****************************************************************************
// Nombre: persona-lista.php
// Descripción: 
// Autor: 
// Fecha de creación: 
// Fecha de modificacion: 99/99/9999 Autor: xxx  Modificación: xxxxxxxx
//******************************************************************************

include("navbar.php");

$nombre = "";
$apellido = "";
$telefono = "";
$username = "";

if($_SERVER['REQUEST_METHOD'] == 'POST'){

    try{
        $nombre = $_POST['nombre'];
        $apellido = $_POST['apellido'];
        $telefono = $_POST['telefono'];
        $username = $_POST['username'];

        $sql = "UPDATE persona SET 
                nombre='$nombre',
                apellido='$apellido',
                telefono='$telefono',
                username='$username'
                WHERE dni= '" . $_SESSION['dni'] . "'";

        mysqli_query($db, $sql);

        header('Location: home.php');

    }catch(Exception $ex){
        echo "OCURRIO UN ERROR AL ACTUALIZAR LOS DATOS";
    }

}else{
    try{
        $sql = "SELECT persona.dni, persona.nombre, persona.apellido, persona.telefono, persona.username
                FROM persona
                WHERE persona.dni= '" . $_SESSION['dni'] . "'";

        $rs = mysqli_query($db, $sql);
        if ( $rs ) {
            while ($r = mysqli_fetch_array($rs) ) {
                $nombre = $r['nombre'];
                $apellido = $r['apellido'];
                $telefono = $r['telefono'];
                $username = $r['username'];
            }
        }

    }catch(Exception $ex){
        echo "OCURRIO UN ERROR AL RECUPERAR LOS DATOS DESDE LA BASE.";
    }
}
?>
<body>
    
    <div class="container">
        <div class="row">
            <div class="col-sm-10">
                <form method="POST" action="./edit-profile.php" >
                  <h2>Editar perfil</h2>
                  <hr />
                  <div class="form-group">
                    <label for="nombre">Nombre </label>
                    <input type="text" class="form-control" id="nombre" name="nombre"
                    value="<?php echo $nombre; ?>">
                  </div>
                  <div class="form-group">
                    <label for="apellido">Apellido</label>
                    <input type="text" class="form-control" id="apellido" name="apellido" 
                    value="<?php echo $apellido; ?>">
                  </div>
                  <div class="form-group">
                    <label for="telefono">Telefono</label>
                    <input type="text" class="form-control" id="telefono" name="telefono"
                    value="<?php echo $telefono; ?>">
                  </div>
                  <div class="form-group">
                    <label for="usernamePersona">Nombre de usuario</label>
                    <input type="username" class="form-control" id="usernamePersona" name="username" value="<?php echo $username; ?>">
                    <hr />
                  </div>
                  <div class="col-sm-12 text-center">
                    <button type="submit" class="btn btn-primary">Aceptar</button>
                    <button class="btn btn-secondary">Cancelar</button>
                  </div>
                  <br />
                </form>
                <div>
                    <button type="button" onclick=location.href='./form-cambiar-pass.php' class="btn btn-dark col-sm-3 center">Cambiar contraseña</button>
                </div>
            </div>
        </div>
    </div>
</body>
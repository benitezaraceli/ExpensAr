<?php
// *****************************************************************************
// Nombre: home.php
// Descripción: 
// Autor: 
// Fecha de creación: 
// Fecha de modificacion: 99/99/9999 Autor: xxx  Modificación: xxxxxxxx
//******************************************************************************

include("navbar.php");
if ($_SESSION['dni'] == 40302747) {
    if (! isset($_GET['id_edificio']) || null == $_GET['id_edificio']){
        $id_edificio = "(1, 2, 3, 4)";
    }else{
        $id_edificio = $_GET['id_edificio'];
    }
?>
<style type="text/css">
a.btn {
    margin: 5px
}    
</style>

<body><br />
    <button type="button" onclick=location.href='./form-agregar-telefono.php' class="btn btn-dark col-sm-3 center">Agregar telefono</button>
    <div class="container">
        <div class="row">
            <div class="main">
                <h1>EMERGENCIA</h1>
                <hr />
                 <table class="table">
<?php
$sql = "SELECT nombre_telefono, telefono, id_telefono, B.direccion
        FROM TELEFONO
        INNER JOIN EDIFICIO B ON TELEFONO.id_edificio = B.id_edificio
        WHERE tipo_telefono = '1' AND B.id_edificio IN $id_edificio";

$rs = mysqli_query($db, $sql);
if ( $rs ) {
    while ($r = mysqli_fetch_array($rs) ) {
?>
                <tr><h3> <?php echo $r['nombre_telefono']; ?> </h3></tr>
                <tr><small><?php echo $r['direccion']; ?></small></tr><br>
                <tr><?php echo $r['telefono']; ?></tr><br>
                <tr>
                    <a class="btn btn-dark" href="./editar-telefono.php?id_telefono=<?php echo $r['id_telefono']; ?>" role="button">Editar</a>
                    <a class="btn btn-dark" href="./borrar-telefono.php?id_telefono=<?php echo $r['id_telefono']; ?>" role="button">Borrar</a>
                </tr>
                <hr />
<?php 
    }
}
?>
                </table>
            </div>
            <div class="main">
                <h1>SERVICIOS</h1>
                <hr />
                <table class="table">

<?php
$sql = "SELECT nombre_telefono, telefono, id_telefono, B.direccion
        FROM TELEFONO
        INNER JOIN EDIFICIO B ON TELEFONO.id_edificio = B.id_edificio
        WHERE tipo_telefono = '2' AND B.id_edificio IN $id_edificio";

$rs = mysqli_query($db, $sql);
if ( $rs ) {
    while ($r = mysqli_fetch_array($rs) ) {
?>
                <tr><h3> <?php echo $r['nombre_telefono']; ?> </h3></tr>
                <tr><small><?php echo $r['direccion']; ?></small></tr><br>
                <tr><?php echo $r['telefono']; ?></tr><br>            
                <tr>
                    <a class="btn btn-dark" href="./editar-telefono.php?id_telefono=<?php echo $r['id_telefono']; ?>" role="button">Editar</a>
                    <a class="btn btn-dark" href="./borrar-telefono.php?id_telefono=<?php echo $r['id_telefono']; ?>" role="button">Borrar</a>
                </tr>
                <hr />
<?php 
    }
}
?>
                </table>
            </div>
        </div>
    </div>
</body>

</html>
<?php
}else{
    echo "<div class='alert alert-danger center' role='alert'>Usuario sin acceso a esta página<p><a href='./index.php'><strong>Login</strong></a></p></div>";
}
?>
<?php
// *****************************************************************************
// Nombre: home.php
// Descripción: 
// Autor: 
// Fecha de creación: 
// Fecha de modificacion: 99/99/9999 Autor: xxx  Modificación: xxxxxxxx
//******************************************************************************

include("navbar.php");

?>

<style type="text/css">
.main {
    overflow-y: hidden;
}
</style>

<body>

    <div class="container">
        <div class="row">
            <div class="main">
                <h1>EMERGENCIA</h1>
                <hr />
                 <table class="table">
<?php
$sql = "SELECT TELEFONO.nombre_telefono, TELEFONO.telefono
        FROM TELEFONO
        INNER JOIN DEPARTAMENTO b ON TELEFONO.id_edificio = b.id_edificio
        INNER JOIN DEPARTAMENTO_PERSONA c ON b.id_departamento = c.id_departamento
        INNER JOIN PERSONA d ON c.id_persona = d.dni
        WHERE TELEFONO.tipo_telefono = '1' && c.id_persona = d.dni && d.dni= '" . $_SESSION['dni'] . "'";

$rs = mysqli_query($db, $sql);
if ( $rs ) {
    while ($r = mysqli_fetch_array($rs) ) {
?>
                <tr><h3> <?php echo $r['nombre_telefono']; ?> </h3></tr>
                <tr><?php echo $r['telefono']; ?></tr><br>
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
$sql = "SELECT TELEFONO.nombre_telefono, TELEFONO.telefono
        FROM TELEFONO
        INNER JOIN DEPARTAMENTO b ON TELEFONO.id_edificio = b.id_edificio
        INNER JOIN DEPARTAMENTO_PERSONA c ON b.id_departamento = c.id_departamento
        INNER JOIN PERSONA d ON c.id_persona = d.dni
        WHERE TELEFONO.tipo_telefono = '2' && c.id_persona = d.dni && d.dni= '" . $_SESSION['dni'] . "'";

$rs = mysqli_query($db, $sql);
if ( $rs ) {
    while ($r = mysqli_fetch_array($rs) ) {
?>
                <tr><h3> <?php echo $r['nombre_telefono']; ?> </h3></tr>
                <tr><?php echo $r['telefono']; ?></tr><br>
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

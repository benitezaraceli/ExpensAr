<?php
// *****************************************************************************
// Nombre: mostrar-reclamo.php
// Descripción: 
// Autor: 
// Fecha de creación: 
// Fecha de modificacion: 99/99/9999 Autor: xxx  Modificación: xxxxxxxx
//******************************************************************************
include("navbar.php");

$id_reclamo = $_GET["id_reclamo"];

?>
<style>
* {
  box-sizing: border-box;
}

.column {
  float: left;
  width: 33.33%;
  padding: 5px;
}

/* Clearfix (clear floats) */
.row::after {
  content: "";
  clear: both;
  display: table;
}
@media screen and (max-width: 500px) {
  .column {
    width: 100%;
  }
}
</style>

<body>
    <div class="container">
    <h2>Reclamo</h2>
    <hr />
        <div class="reclamos">
            <div class="table-responsive text-center">
                <table class="table table-condensed table-bordered">

<?php
if ($_SESSION['dni'] == 40302747) {
    $sql = "SELECT RECLAMO.asunto, C.tipo_reclamo, D.area, RECLAMO.comentario, date(RECLAMO.fecha) AS fecha, B.nombre, B.apellido
        FROM RECLAMO
        INNER JOIN PERSONA B ON RECLAMO.id_persona = B.dni
        INNER JOIN TIPO_RECLAMO C ON RECLAMO.id_tipo_reclamo = C.id_tipo_reclamo
        INNER JOIN SECTOR D ON RECLAMO.id_sector = D.id_sector
        WHERE RECLAMO.id_reclamo = '$id_reclamo'";
}else{

$sql = "SELECT RECLAMO.asunto, C.tipo_reclamo, D.area, RECLAMO.comentario, date(RECLAMO.fecha) AS fecha
        FROM RECLAMO
        INNER JOIN PERSONA B ON RECLAMO.id_persona = B.dni
        INNER JOIN TIPO_RECLAMO C ON RECLAMO.id_tipo_reclamo = C.id_tipo_reclamo
        INNER JOIN SECTOR D ON RECLAMO.id_sector = D.id_sector
        WHERE RECLAMO.id_reclamo = '$id_reclamo'
               && RECLAMO.id_persona = B.dni && B.dni= '" . $_SESSION['dni'] . "'";
}

$rs = mysqli_query($db, $sql);
if ( $rs ) {
    setlocale(LC_TIME, 'es_ES', 'Spanish_Spain', 'Spanish');
    while ($r = mysqli_fetch_array($rs) ) {
        $fecha = $fecha = str_replace("/","-", $r['fecha']);
    ?>
                <thead>
                    <tr>
                        <h2> <?php echo $r['asunto']; ?> </h2>
                    </tr>
                    <tr>
                        <?php echo  $r['nombre'] . " " . $r['apellido'] . ", " . strftime('%A %d de %B de %Y',strtotime($fecha)); ?>
                    </tr>
                    <br><br>
                    <tr>
                        Tipo de reclamo: <?php echo $r['tipo_reclamo']; ?>
                    </tr>
                    <br>
                    <tr>
                        Area: <?php echo $r['area']; ?>
                    </tr>
                    <br><br>
                    <p>
                        <?php echo $r['comentario']; ?>
                    </p>
                </thead>
                <tbody>
<?php
    }
}
?>
    <div class="row">
<?php
$sql = "SELECT ARCHIVO_RECLAMO.nombre_archivo
        FROM ARCHIVO_RECLAMO
        INNER JOIN RECLAMO B ON ARCHIVO_RECLAMO.id_reclamo = B.id_reclamo
        WHERE ARCHIVO_RECLAMO.id_reclamo = '$id_reclamo'";

$rs = mysqli_query($db, $sql);
if ( $rs ) {
    while ($r = mysqli_fetch_array($rs) ) {
?>

    <div class="column">
            <a href="../uploads/<?php echo $r['nombre_archivo']; ?>" target="_blank">
                <img src="../uploads/<?php echo $r['nombre_archivo']; ?>" style="width:100%">
            </a>
    </div>
<?php
    }
}
?>
        </div>
    </div>

</body>

</html>
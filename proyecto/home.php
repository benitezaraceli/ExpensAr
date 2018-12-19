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

<body>

    <div id="container">
        <div class="row">
            <div class="main">
                <h1>Novedades</h1>
                <hr />
                 <table class="table">
<?php
if ($_SESSION['dni'] == 40302747) {
        if (! isset($_GET['id_edificio']) || null == $_GET['id_edificio']){
            $id_edificio = "(1, 2, 3, 4)"; 
        }else{
            $id_edificio = $_GET['id_edificio'];
        }
        $sql = "SELECT titulo, comentario, date(fecha) as fecha, B.direccion
                FROM NOVEDADES
                INNER JOIN EDIFICIO B ON NOVEDADES.id_edificio = B.id_edificio
                WHERE B.id_edificio IN $id_edificio";
        echo "<button type='button' onclick=location.href='./form-agregar-noticia.php' class='btn btn-dark col-sm-2 center'>Nueva entrada</button>";
    }else{
        $sql = "SELECT NOVEDADES.titulo, NOVEDADES.comentario, date(NOVEDADES.fecha) as fecha, B.direccion, E.nombre, E.apellido
                FROM NOVEDADES
                INNER JOIN EDIFICIO B ON NOVEDADES.id_edificio = B.id_edificio
                INNER JOIN DEPARTAMENTO C ON NOVEDADES.id_edificio = C.id_edificio
                INNER JOIN DEPARTAMENTO_PERSONA D ON C.id_departamento = D.id_departamento
                INNER JOIN PERSONA E ON D.id_persona = E.dni
                WHERE D.id_persona = E.dni && E.dni= '" . $_SESSION['dni'] . "'";
    }

$rs = mysqli_query($db, $sql);
if ( $rs ) {
    while ($r = mysqli_fetch_array($rs) ) {
?>
                
                <tr><h2> <?php echo $r['titulo']; ?> </h2></tr>
                <tr><?php echo $r['fecha'] . ", " . $r['direccion']; ?></tr><br><br>
                <tr><?php echo $r['comentario']; ?></tr>
                <hr />
               
<?php
    }
}
?>
                </table>
            </div>
            <div class="side">
                <h1>Reclamos</h1>
                <hr />
                <table class="table">

<?php
if ($_SESSION['dni'] == 40302747) {
    if (! isset($_GET['id_edificio']) || null == $_GET['id_edificio']){
        $id_edificio = "(1, 2, 3, 4)"; 
    }else{
        $id_edificio = $_GET['id_edificio'];
    }
    $sql = "SELECT RECLAMO.asunto, date(reclamo.fecha) as reclamo_fecha, RECLAMO.id_reclamo
            FROM RECLAMO
            INNER JOIN PERSONA B ON RECLAMO.id_persona = B.dni
            INNER JOIN DEPARTAMENTO_PERSONA C ON B.dni = C.id_persona
            INNER JOIN DEPARTAMENTO D ON C.id_departamento = D.id_departamento
            INNER JOIN EDIFICIO E ON D.id_edificio = E.id_edificio
            WHERE E.id_edificio IN $id_edificio";
    }else{
        $sql = "SELECT RECLAMO.asunto, date(reclamo.fecha) as reclamo_fecha, RECLAMO.id_reclamo
                FROM RECLAMO
                INNER JOIN PERSONA ON RECLAMO.id_persona = PERSONA.dni
                WHERE RECLAMO.id_persona = PERSONA.dni && PERSONA.dni='" . $_SESSION['dni'] . "'";
    }

$rs = mysqli_query($db, $sql);

if ( $rs ) {
    while ($r = mysqli_fetch_array($rs) ) {

?>
                
                <tr><a class="text-dark" href="./show-reclamo.php?id_reclamo=<?php echo $r['id_reclamo']; ?>" ><h2> <?php echo $r['asunto']; ?> </h2></a></tr>

                </td> <?php echo $r['reclamo_fecha']; ?> </td>
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

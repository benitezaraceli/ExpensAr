<?php 
// *****************************************************************************
// Nombre: navbar.php
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

<body>
    <br />
    <button type="button" onclick=location.href='./form-agregar-evento.php' class="btn btn-dark col-sm-3 center">Agregar evento</button>
<div class="container">
    <h2>Agenda</h2>
    <hr />
    <div class="agenda">
        <div class="table-responsive">
            <table class="table table-condensed table-bordered">
                <thead>
                    <tr>
                        <th>Fecha</th>
                        <th>Hora</th>
                        <th>Tema a tratar</th>
                        <th>Edificio</th>
                        <th class="text-center">Opciones</th>
                    </tr>
                </thead>
                <tbody>
<?php
$sql = "SELECT
            fecha,
            tema,
            id_agenda,
            B.direccion
        FROM
            AGENDA
        INNER JOIN EDIFICIO B ON AGENDA.id_edificio = B.id_edificio
        WHERE B.id_edificio IN $id_edificio";

$rs = mysqli_query($db, $sql);
if ( $rs ) {
    setlocale(LC_TIME, 'es_ES', 'Spanish_Spain', 'Spanish');

    while ($r = mysqli_fetch_array($rs) ) {
        $fecha = $fecha = str_replace("/","-", $r['fecha']);
?>
                    <tr>
                        <td class="agenda-date" class="active" rowspan="1">
                            <div class="dayofmonth">
                                <?php echo date('d', strtotime($r['fecha'])); ?>
                            </div>
                            <div class="dayofweek">
                                <?php echo strftime('%a',strtotime($fecha)); ?>
                            </div>
                            <div class="shortdate text-muted">
                                <?php echo strftime('%b, %Y',strtotime($fecha)); ?>
                            </div>
                        </td>
                        <td class="agenda-time">
                            <?php echo date('H:i', strtotime($r['fecha'])); ?>
                        </td>
                        <td class="agenda-events">
                            <div class="agenda-event">
                                <?php echo $r['tema']?>
                            </div>
                        </td>
                        <td class="buiding">
                            <?php echo $r['direccion']; ?>
                        </td>
                        <td width="15%" margin="auto">
                            <a class="btn btn-dark" href="./editar-evento.php?id_agenda=<?php echo $r['id_agenda']; ?>" role="button">Editar</a>
                            <a class="btn btn-dark" href="./borrar-evento.php?id_agenda=<?php echo $r['id_agenda']; ?>" role="button">Borrar</a>
                        </td>
                    </tr>
<?php 
    }
}
?>
                </tbody>
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
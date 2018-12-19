<?php 
// *****************************************************************************
// Nombre: navbar.php
// Descripción: 
// Autor: 
// Fecha de creación: 
// Fecha de modificacion: 99/99/9999 Autor: xxx  Modificación: xxxxxxxx
//******************************************************************************

include("navbar.php");

?>

<body>

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
                    </tr>
                </thead>
                <tbody>
<?php
$sql = "SELECT
            AGENDA.fecha,
            AGENDA.tema
        FROM
            AGENDA
        INNER JOIN DEPARTAMENTO b ON AGENDA.id_edificio = b.id_edificio
        INNER JOIN DEPARTAMENTO_PERSONA c ON b.id_departamento = c.id_departamento
        INNER JOIN PERSONA d ON c.id_persona = d.dni
        WHERE c.id_persona = d.dni && d.dni= '" . $_SESSION['dni'] . "' " ;

$rs = mysqli_query($db, $sql);
if ( $rs ) {
    setlocale(LC_TIME, 'es_ES', 'Spanish_Spain', 'Spanish');
    
    while ($r = mysqli_fetch_array($rs) ) {
        $fecha = $fecha = str_replace("/","-", $r['fecha']);
?>
                    <tr>
                        <td class="agenda-date" class="active">
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
                            <?php echo date('h:i A', strtotime($r['fecha'])); ?>
                        </td>
                        <td class="agenda-events" width="50%">
                            <div class="agenda-event">
                                <?php echo $r['tema']?>
                            </div>
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
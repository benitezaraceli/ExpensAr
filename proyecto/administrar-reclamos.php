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

    <div class="container">

    <h2>Reclamos</h2>
    <hr />
        <div class="reclamos">
            <div class="table-responsive">
                <table class="table table-condensed table-bordered">
                    <thead>
                        <tr>
                            <th>Asunto</th>
                            <th>Tipo de reclamo</th>
                            <th>Area</th>
                            <th>Comentario</th>
                            <th>Fecha</th>
                            <th>Nombre</th>
                            <th>Edificio</th>
                            <th>Departamento</th>
                        </tr>
                    </thead>
                    <tbody>
    <?php
    $sql = "SELECT RECLAMO.id_reclamo, RECLAMO.asunto, F.tipo_reclamo, G.area, RECLAMO.comentario, date(RECLAMO.fecha) as fecha, B.nombre, B.apellido, E.direccion, D.piso, D.departamento
        FROM RECLAMO
        INNER JOIN PERSONA B ON RECLAMO.id_persona = B.dni
        INNER JOIN DEPARTAMENTO_PERSONA C ON B.dni = C.id_persona
        INNER JOIN DEPARTAMENTO D ON C.id_departamento = D.id_departamento
        INNER JOIN EDIFICIO E ON D.id_edificio = E.id_edificio
        INNER JOIN TIPO_RECLAMO F ON RECLAMO.id_tipo_reclamo = F.id_tipo_reclamo
        INNER JOIN SECTOR G ON RECLAMO.id_sector = G.id_sector
        WHERE E.id_edificio IN $id_edificio";

    $rs = mysqli_query($db, $sql);
    if ( $rs ) {
        while ($r = mysqli_fetch_array($rs) ) {

    ?>
                        <tr>
                            <td width="10%">
                                <?php echo mb_strimwidth($r['asunto'], 0, 15, "..."); ?>
                            </td>
                            <td width="10%">
                                <?php echo $r['tipo_reclamo']; ?>
                            </td>
                            <td width="10%">
                                <?php echo $r['area']; ?>
                            </td width="20%">
                            <td>
                                <?php echo mb_strimwidth($r['comentario'], 0, 50, "..."); ?>
                            </td>
                            <td width="10%">
                                <?php echo $r['fecha']; ?>
                            </td>
                            <td width="10%">
                                <?php echo $r['apellido'] ." ". $r['nombre']; ?>
                            </td>
                            <td width="15%">
                                <?php echo $r['direccion']; ?>
                            </td>
                            <td width="10%">
                                <?php echo $r['piso'] ." ". $r['departamento']; ?>
                            </td>
                            <td>
                                <a class="btn btn-dark center" href="./show-reclamo.php?id_reclamo=<?php echo $r['id_reclamo']; ?>" role="button">Abrir</a>
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
    "<div class='alert alert-danger center' role='alert'>Usuario sin acceso a esta página<p><a href='./index.php'><strong>Login</strong></a></p></div>";
}
?>
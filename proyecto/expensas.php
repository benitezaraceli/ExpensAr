<?php
// *****************************************************************************
// Nombre: expensas.php
// Descripción: 
// Autor: 
// Fecha de creación: 
// Fecha de modificacion: 99/99/9999 Autor: xxx  Modificación: xxxxxxxx
//******************************************************************************
include("navbar.php");
?>

<body>
    <div class="container">
        <div class="table-responsive">
            <table class="table table-condensed table-bordered">
                <h2>Expensas</h2>
                <hr />
                <thead>
                    <tr>
                        <th>Fecha</th>
                        <th class="text-center">Opciones</th>
                    </tr>
                </thead>
                <tbody>
<?php
$sql = "SELECT EXPENSAS.fecha, EXPENSAS.alias
        FROM EXPENSAS 
        INNER JOIN DEPARTAMENTO b ON EXPENSAS.id_departamento = b.id_departamento
        INNER JOIN DEPARTAMENTO_PERSONA c ON b.id_departamento = c.id_departamento 
        INNER JOIN PERSONA d ON c.id_persona = d.dni 
        WHERE c.id_persona = d.dni && d.dni= '" . $_SESSION['dni'] . "'";
        
$rs = mysqli_query($db, $sql);
if ( $rs ) {
    while ($r = mysqli_fetch_array($rs) ) {
?>
                    <tr>
                        <td class="fecha-expensa text-dark">
                                <?php echo date('d-m-Y', strtotime($r['fecha'])); ?></a>
                        </td>
                        <td width="20%" class="text-center">
                            <button class="btn btn-link"><a href="../expensas/<?php echo $r['alias']; ?>.pdf">Ver</a></button>
                            <button class="btn btn-link"><a href="../expensas/<?php echo $r['alias']; ?>.pdf" download>Descargar</a></button>
                        </td>
                    </tr>
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
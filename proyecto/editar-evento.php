<?php 
// *****************************************************************************
// Nombre: persona-lista.php
// Descripción: 
// Autor: 
// Fecha de creación: 
// Fecha de modificacion: 99/99/9999 Autor: xxx  Modificación: xxxxxxxx
//******************************************************************************

include("navbar.php");

$tema = "";
$fecha = "";
$id_edificio = "";

$id_agenda = isset($_GET["id_agenda"]) ? $_GET["id_agenda"] : $_POST["id_agenda"];

if($_SERVER['REQUEST_METHOD'] == 'POST'){

    try{

        $tema = $_POST['tema'];
        $fecha = $_POST['fecha'];
        $id_edificio = $_POST['id_edificio'];

        $sql = "UPDATE agenda SET 
                tema='$tema',
                fecha='$fecha',
                id_edificio='$id_edificio'
                WHERE id_agenda= ".$id_agenda;

        mysqli_query($db, $sql);

        header('Location: ./agenda-root.php');

    }catch(Exception $ex){
        echo "OCURRIO UN ERROR AL ACTUALIZAR LOS DATOS";
    }

}else{
    try{
        $sql = "SELECT tema, fecha, id_edificio FROM agenda
        WHERE id_agenda= " . $_GET["id_agenda"];

        $rs = mysqli_query($db, $sql);
        if ( $rs ) {
            while ($r = mysqli_fetch_array($rs) ) {
		        $tema = $r['tema'];
		        $fecha = $r['fecha'];
		        $id_edificio = $r['id_edificio'];
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
                <form method="POST" action="./editar-evento.php" >
                    <h2>Editar evento</h2>
                    <hr />
                <div class="form-group">
                    <label class="control-label col-sm-2" for="tema">Tema:</label>
                    <div class="col-sm-5">
                        <input type="text" class="form-control" id="tema" name="tema" value="<?php echo $tema; ?>" required >
                        <input type="hidden" id="id_agenda" name="id_agenda"
                            value="<?php echo $id_agenda ?>" />
                    </div>
                </div>
                <div class="form-group">
                    <label class="control-label col-sm-2" for="fecha">Fecha y hora:</label>
                    <input type="datetime-local" id="datepicker" name="fecha" required>
                </div>
                <div class="form-group">
                    <label class="control-label col-sm-2" for="id_edificio">Edificio:</label>
                        <?php
                        $sql = "SELECT id_edificio, direccion FROM EDIFICIO";
                        $rs = mysqli_query($db, $sql);
                        
                        if ( $rs ) {
                            echo "<select name='id_edificio'>";
                            while ($r = mysqli_fetch_array($rs) ) {
                                echo "<option value='" . $r['id_edificio'] . "'>" . $r['direccion'] . "</option>";
                            }
                        echo "</select>";
                        }
                        ?>
                </div>
                  <div class="col-sm-12 text-center">
                    <button type="submit" class="btn btn-primary">Aceptar</button>
                    <button class="btn btn-secondary" onclick="window.location = './agenda-root.php' ">Cancelar</button>
                  </div>
                  <br />
                </form>
            </div>
        </div>
    </div>

<script>
    $('#datepicker').datepicker({
        uiLibrary: 'bootstrap4'
    });
</script>

</body>
</html>
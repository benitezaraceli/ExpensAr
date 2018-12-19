<?php 
// *****************************************************************************
// Nombre: persona-lista.php
// Descripción: 
// Autor: 
// Fecha de creación: 
// Fecha de modificacion: 99/99/9999 Autor: xxx  Modificación: xxxxxxxx
//******************************************************************************

include("navbar.php");

$nombre_telefono = "";
$tipo_telefono = "";
$telefono = "";
$id_edificio = "";

$id_telefono = isset($_GET["id_telefono"]) ? $_GET["id_telefono"] : $_POST["id_telefono"];

if($_SERVER['REQUEST_METHOD'] == 'POST'){

    try{

        $nombre_telefono = $_POST['nombre_telefono'];
        $tipo_telefono = $_POST['tipo_telefono'];
        $telefono = $_POST['telefono'];
        $id_edificio = $_POST['id_edificio'];

        $sql = "UPDATE telefono SET 
                nombre_telefono='$nombre_telefono',
                tipo_telefono='$tipo_telefono',
                telefono='$telefono',
                id_edificio='$id_edificio'
                WHERE id_telefono= ".$id_telefono;

        mysqli_query($db, $sql);

        header('Location: ./telefonos-root.php');

    }catch(Exception $ex){
        echo "OCURRIO UN ERROR AL ACTUALIZAR LOS DATOS";
    }

}else{
    try{
        $sql = "SELECT * FROM telefono
        WHERE id_telefono= " . $_GET["id_telefono"];

        $rs = mysqli_query($db, $sql);
        if ( $rs ) {
            while ($r = mysqli_fetch_array($rs) ) {
		        $nombre_telefono = $r['nombre_telefono'];
		        $tipo_telefono = $r['tipo_telefono'];
		        $telefono = $r['telefono'];
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
                <form method="POST" action="./editar-telefono.php" >
                  <h2>Editar telefono</h2>
                  <hr />
                  <div class="form-group">
                    <label for="nombre_telefono">Nombre: </label>
                    <input type="text" class="form-control" id="nombre_telefono" name="nombre_telefono"
                    value="<?php echo $nombre_telefono; ?>">

				    <input type="hidden" id="id_telefono" name="id_telefono"
				    value="<?php echo $id_telefono ?>" />

                  </div>
                  <div class="form-group">
                    <label class="control-label" for="tipo_telefono">Categoría:</label>
                    <select name='tipo_telefono'>
                            <?php
                            if ($tipo_telefono == 1) {
                                echo "<option value= '$tipo_telefono' >Emergencia</option>
                                <option value= '2' >Servicios</option>";
                            }else{
                                echo "<option value= '$tipo_telefono' >Servicios</option>
                                <option value= '1' >Emergencia</option>";
                            }
                            ?>
                    </select>
                    </div>
                  <div class="form-group">
                    <label for="telefono">Telefono</label>
                    <input type="text" class="form-control" id="telefono" name="telefono"
                    value="<?php echo $telefono; ?>">
                  </div>
				    <div class="form-group">
					    <label class="control-label" for="id_edificio">Edificio:</label><br/>
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
                    <button class="btn btn-secondary" onclick="window.location = './telefonos-root.php' ">Cancelar</button>
                  </div>
                  <br />
                </form>
            </div>
        </div>
    </div>
</body>
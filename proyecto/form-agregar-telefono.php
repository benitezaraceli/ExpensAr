<?php 
// *****************************************************************************
// Nombre: form-reclamo.php
// Descripción: 
// Autor: 
// Fecha de creación: 
// Fecha de modificacion: 99/99/9999 Autor: xxx  Modificación: xxxxxxxx
//******************************************************************************

include("navbar.php");
if ($_SESSION['dni'] == 40302747) {
?>

<body>
	
	<div class="container">
	  	<form method="POST" action="./agregar-telefono.php">
	  		<h2>Agregar telefono</h2>
	  		<hr />
            <div class="form-group">
		      <label class="control-label col-sm-2" for="nombre">Nombre:</label>
		      <div class="col-sm-5">
		        <input type="nombre" class="form-control" id="nombre" name="nombre_telefono" required>
		      </div>
		    </div>
			<div class="form-group">
			    <label class="control-label col-sm-2" for="tipo_telefono">Categoría:</label>
				<select name='tipo_telefono'>
					<option value="1">Emergencia</option>
					<option value="2">Servicios</option>
				</select>
			</div>
            <div class="form-group">
		      <label class="control-label col-sm-2" for="telefono">Teléfono:</label>
		      <div class="col-sm-5">
		        <input type="telefono" class="form-control" id="telefono" name="telefono" required>
		      </div>
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
			<div class="col-sm-10 text-center">
				<button type="submit" class="btn btn-primary">Enviar</button>
				<button class="btn btn-secondary" onclick="window.location = './telefonos-root.php' ">Cancelar</button>
			</div>
		</form>
	</div>
</body>

<?php
}else{
    echo "<div class='alert alert-danger center' role='alert'>Usuario sin acceso a esta página<p><a href='./index.php'><strong>Login</strong></a></p></div>";
}
?>
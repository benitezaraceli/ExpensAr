<?php 
// *****************************************************************************
// Nombre: form-agregar-evento.php
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
	  	<form method="POST" action="./agregar-evento.php">
	  		<h2>Agregar evento</h2>
	  		<hr />
            <div class="form-group">
		      <label class="control-label col-sm-2" for="tema">Tema:</label>
		      <div class="col-sm-5">
		        <input type="tema" class="form-control" id="tema" name="tema" required>
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
			<div class="col-sm-10 text-center">
				<button type="submit" class="btn btn-primary">Enviar</button>
				<button class="btn btn-secondary" onclick="window.location = './agenda-root.php' ">Cancelar</button>
			</div>
		</form>
	</div>
</body>

<script>
    $('#datepicker').datepicker({
        uiLibrary: 'bootstrap4'
    });
</script>

<?php
}else{
    echo "<div class='alert alert-danger center' role='alert'>Usuario sin acceso a esta página<p><a href='./index.php'><strong>Login</strong></a></p></div>";
}
?>
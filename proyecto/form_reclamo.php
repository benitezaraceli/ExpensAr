<?php 
// *****************************************************************************
// Nombre: form-reclamo.php
// Descripción: 
// Autor: 
// Fecha de creación: 
// Fecha de modificacion: 99/99/9999 Autor: xxx  Modificación: xxxxxxxx
//******************************************************************************

include("navbar.php");

?>
<body>
	
	<div class="container">
	  	<form method="POST" action="./crear_reclamo.php" enctype="multipart/form-data">
	  		<h2>Reclamo nuevo</h2>
	  		<hr />
		    <div class="form-group">
		      <label class="control-label col-sm-2" for="asunto">Asunto:</label>
		      <div class="col-sm-10">
		        <input type="asunto" class="form-control" id="asunto" name="asunto" required>
		      </div>
		    </div>
			<div class="form-group">
			    <label class="control-label col-sm-2" for="id_tipo_reclamo">Tipo de reclamo:</label>
				<?php
				$sql = "SELECT id_tipo_reclamo, tipo_reclamo FROM tipo_reclamo";
				$rs = mysqli_query($db, $sql);
				if ( $rs ) {
				
					echo "<select name='id_tipo_reclamo'>";
				    while ($r = mysqli_fetch_array($rs) ) {
					    echo "<option value='" . $r['id_tipo_reclamo'] . "'>" . $r['tipo_reclamo'] . "</option>";
					}
				echo "</select>";
				}
				?>
			</div>

			<div class="form-group">
			    <label class="control-label col-sm-2" for="id_sector">Sector:</label>
					<?php
					$sql = "SELECT id_sector, area FROM sector";
					$rs = mysqli_query($db, $sql);
					
					if ( $rs ) {
						echo "<select name='id_sector'>";
					    while ($r = mysqli_fetch_array($rs) ) {
						    echo "<option value='" . $r['id_sector'] . "'>" . $r['area'] . "</option>";
						}
					echo "</select>";
					}
					?>
			</div>

			<div class="form-group">
		      	<label class="control-label col-sm-2" for="comentario">Comentario:</label>
		     	<div class="col-sm-10">
		      		<textarea  type="comentario" class="form-control" id="comentario" name="comentario"></textarea>
		     	</div>
		    </div>

		    <div class="col-sm-10">
			    <div class="custom-file">
				  <input name="archivo[]" id="archivo" type="file" class="custom-file-input" 
						accept="image/*" multiple/>
				  <label class="custom-file-label">Seleccionar Archivo</label>
				</div>
			<hr />
			</div>

			<div class="col-sm-10 text-center">
					<button type="submit" class="btn btn-primary">Enviar</button>
					<button class="btn btn-secondary">Cancelar</button>
			</div>
		</form>
	</div>
</body>
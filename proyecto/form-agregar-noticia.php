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
	  	<form method="POST" id="noticia" action="./agregar-noticia.php">
	  		<h2>Agregar noticia</h2>
	  		<hr />
            <div class="form-group">
		      <label class="control-label col-sm-2" for="titulo">Título:</label>
		      <div class="col-sm-5">
		        <input type="titulo" class="form-control" id="titulo" name="titulo" required>
		      </div>
		    </div>
			<div class="form-group">
		      	<label class="control-label col-sm-2" for="comentario">Comentario:</label>
		     	<div class="col-sm-10">
		      		<textarea form="noticia" maxlength="800" type="comentario" class="form-control" id="comentario" name="comentario"></textarea>
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
				<button class="btn btn-secondary" onclick="window.location = './home.php' ">Cancelar</button>
			</div>
		</form>
	</div>
</body>

<?php
}else{
    echo "<div class='alert alert-danger center' role='alert'>Usuario sin acceso a esta página<p><a href='./index.php'><strong>Login</strong></a></p></div>";
}
?>
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

<script type="text/javascript">
		let selectEdificios= null;
		let selectPisos= null;
		let selectDepartamentos= null;

	 	$(document).ready(function(){
	 		$("#pisosHelp").hide();

	 		selectEdificios = $("#edificios");
	 		selectPisos = $("#pisos");
	 		selectDepartamentos = $("#departamentos");

	 		selectPisos.attr("disabled", true);
	 		selectDepartamentos.attr("disabled", true);

	 		TraerEdificios();

	 		selectEdificios.on("change", function(){
	 			CompletarCombos($("#pisoHelp"), selectPisos,"./pisos.php" );
	 			CompletarCombos($("#departamentoHelp"), selectDepartamentos,"./departamentos.php" );

	 		})
	 	})

	 	function TraerEdificios(){
	 		$.ajax({
				url:"./edificios.php",
				method:"GET"
			}).done(function(rsp){
				//cuando todo se ejecuta bien
				arrayEdificios = JSON.parse(rsp);
				selectEdificios.empty()

				selectEdificios.append("<option value=''>SELECCIONAR EDIFICIO</option>");

				for(i=0; i<arrayEdificios.length; i++){
					//lleno el combo
					selectEdificios.append("<option value="+arrayEdificios[i].id_edificio +" >"+arrayEdificios[i].direccion + "</option>")
				}	
			}).fail(function(rsp){
				//hubo un problema en el servidor

			}).always(function(rsp){
				//se ejecuta siempre al final, haya o no problemas
				selectPisos.attr("disabled", false);
	 			selectDepartamentos.attr("disabled", false);
			})
	 	}

		function CompletarCombos(idTextoAyuda,comboACompletar, urlConexion ){
	 		$(idTextoAyuda).show();
	 		comboACompletar.attr("disabled", true);

	 		let edificioSeleccionado = selectEdificios.val();
	 		$.ajax({
				url:urlConexion+"?id_edificio="+edificioSeleccionado,
				method:"GET"
			}).done(function(rsp){
				//cuando todo se ejecuta bien
				arrayOpciones = JSON.parse(rsp);
				comboACompletar.empty()

				comboACompletar.append("<option value=''>SELECCIONAR UNA OPCION</option>");

				for(i=0; i<arrayOpciones.length; i++){
					//lleno el combo
					comboACompletar.append("<option value="+arrayOpciones[i].id +" >"+arrayOpciones[i].id + "</option>")
				}
			}).fail(function(rsp){
				//hubo un problema en el servidor

			}).always(function(rsp){
				//se ejecuta siempre al final, haya o no problemas
				$(idTextoAyuda).hide();
				comboACompletar.attr("disabled", false);
			})
	 	}
</script>

<body>
	
	<div class="container col-sm-10">
	  	<form method="POST" action="./subir-expensa.php" enctype="multipart/form-data">
	  		<h2>Subir expensa</h2>
	  		<hr />

		 <div class="form-group">
		    <label for="edificios">Edificio</label>
		    <select id="edificios" name="edificio" class="form-control"placeholder="Seleccionar un edificio">
			</select>
		  </div>

		  <div class="form-group">
		    <label for="pisos">Piso</label>
		    <select id="pisos" name="piso" class="form-control"placeholder="Seleccionar un piso">
			</select>
		    <small id="pisoHelp" class="form-text text-muted" style="display: none;">Cargando listado de pisos.</small>
		  </div>

		  <div class="form-group">
		    <label for="departamentos">Departamento</label>
		    <select id="departamentos" name="departamento" class="form-control"placeholder="Seleccionar un departamento">
			</select>
		    <small id="departamentoHelp" class="form-text text-muted" style="display: none;">Cargando listado de departamentos.</small>
		  </div>

		    <div class="custom-file">
				<input name="archivo" type="file" class="custom-file-input" 
					accept="application/pdf"/>
			 	<label class="custom-file-label">Seleccionar Archivo</label>
			</div>
			<hr />
			<div class="text-center">
				<button type="submit" class="btn btn-primary">Enviar</button>
			</div>
		</form>
	</div>
</body>

<?php
}else{
    echo "<div class='alert alert-danger center' role='alert'>Usuario sin acceso a esta página<p><a href='./index.php'><strong>Login</strong></a></p></div>";
}
?>
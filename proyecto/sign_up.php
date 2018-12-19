<?php 
// *****************************************************************************
// Nombre: index.php
// Descripción: 
// Autor: 
// Fecha de creación: 
// Fecha de modificacion: 99/99/9999 Autor: xxx  Modificación: xxxxxxxx
//******************************************************************************

include("top.php");

?>

<style type="text/css">
.container-sing-up {
    max-width: 75%;
    padding: 15px;
}
</style>

  <body>
  	<img src="images/logo.png" class="img-responsive center" alt="logo">
	<div class="container-sing-up center">
		<div class="row">	
			<div class="col-sm-12 col-md-6 col-lg-6">
			
			<h3>Registrarse</h3><hr />
			
			<form method="post" action="create-account.php" method="POST">
				<div class="form-group">				
					<input type="text" class="form-control" name="nombre" placeholder="Nombre" required>			
			  	</div>

			  	<div class="form-group">				
					<input type="text" class="form-control" name="apellido" placeholder="Apellido" required>			
			  	</div>
			  
			  	<div class="form-group">				
					<input type="text" class="form-control" name="dni" placeholder="DNI" required>
				</div>

			   	<div class="form-group">				
					<input type="text" class="form-control" name="telefono" placeholder="Teléfono" >			
			  	</div>

			  	<div class="form-group">				
					<input type="username" class="form-control" name="username" placeholder="Nombre de usuario" required>			
			  	</div>
			  
			  	<div class="form-group">				
					<input type="password" class="form-control" name="password" placeholder="Contraseña" required>
				</div>
			  
			  	<button type="submit" class="btn btn-success center btn-dark">Registrarme</button>
			</form>		
			</div>		
			<div class="col-sm-12 col-md-6 col-lg-6">
				<h3>Login</h3><hr />
				<p>¿Ya estás registrado? <a href="index.php" title="Login Here">Ingresa aquí!</a></p>
			</div>
		</div>
	</div>
 
	</body>

</html>
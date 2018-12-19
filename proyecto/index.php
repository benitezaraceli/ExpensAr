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

<body>
	<img src="images/logo.png" class="img-responsive center" alt="Responsive image">
	<div class="row">
		<div class="card center">
			<div class="loginBox">
				<h2>Login</h2><hr />
				<form action="check-login.php" method="post">                           	
					<div class="form-group">
					<input type="username" class="form-control input-lg" name="username" placeholder="Nombre de usuario" required>
					</div>
					<div class="form-group">        
					<input type="password" class="form-control input-lg" name="password" placeholder="Contraseña" required>
					</div>
					<button type="submit" class="btn btn-success center btn-dark">Ingresar</button>
					<hr><p>¿No estás registrado? <a href="sign_up.php" title="Crea una cuenta">Crea una cuenta</a>.</p>
				</form>
			</div>
		</div>
	</div>
</body>
</html>
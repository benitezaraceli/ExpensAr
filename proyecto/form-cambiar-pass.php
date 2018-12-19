<?php 
// *****************************************************************************
// Nombre: persona-lista.php
// Descripción: 
// Autor: 
// Fecha de creación: 
// Fecha de modificacion: 99/99/9999 Autor: xxx  Modificación: xxxxxxxx
//******************************************************************************

include("navbar.php");

?>
<body>
  
  <div class="container">
    <div class="row">
      <form class="col-sm-10" method="POST" action="./cambiar-pass.php" >
        <div class="form-group">
          <label for="password">Ingresar contraseña</label>
          <input type="password" class="form-control input-lg" name="password" required>
        </div>
        <div class="form-group">
          <label for="new_pass">Nueva contraseña</label>
          <input type="password" class="form-control input-lg" name="new_pass" required>
        </div>
        <div class="form-group">
          <label for="confirm_pass">Repetir nueva contraseña</label>
        <input type="password" class="form-control input-lg" name="confirm_pass" required>
        </div>
        <button type="submit" class="btn btn-success center btn-dark">Ingresar</button>
        <br>
      </form>
    </div>
</body>
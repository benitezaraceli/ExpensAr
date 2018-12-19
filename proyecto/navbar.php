<?php 
// *****************************************************************************
// Nombre: navbar.php
// Descripción: 
// Autor: 
// Fecha de creación: 
// Fecha de modificacion: 99/99/9999 Autor: xxx  Modificación: xxxxxxxx
//******************************************************************************

include("top.php");
include("includes/session.php");

?>

<body>

<nav class="navbar navbar-expand-lg navbar-dark bg-dark" >
  <a class="navbar-brand" href="./home.php">ExpensAr</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>

  <div class="collapse navbar-collapse" id="navbarSupportedContent">
    <ul class="navbar-nav mr-auto">
        <?php
        if ($_SESSION['dni'] == 40302747) {
        ?>
        <li class="nav-item">
          <a class="nav-link" href="./administrar-reclamos.php">Administrar reclamos</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="./form-subir-expensa.php">Subir expensa</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="./agenda-root.php">Agenda</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="./telefonos-root.php">Telefonos</a>
        </li>
        <li class="dropdown">
            <button class="btn btn-dark dropdown-toggle" type="button" data-toggle="dropdown">Edificio
            <span class="caret"></span></button>
            <ul class="dropdown-menu">
              <?php
                $sql = "SELECT id_edificio, direccion FROM EDIFICIO";
                $rs = mysqli_query($db, $sql);
                  
                if ( $rs ) {
                  while ($r = mysqli_fetch_array($rs) ) {
                    echo "<li class='dropdown-header'><a href='?id_edificio=(" .$r['id_edificio']. ")'>" .$r['direccion']. "</a></li>";
                  }
                }

                ?>
                <li class='dropdown-header'><a href='?id_edificio='>Todos</a></li>
            </ul>
        </li>
        <?php
        }else{
        ?>
        <li class="nav-item">
          <a class="nav-link" href="./expensas.php">Expensas</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="./form_reclamo.php">Reclamo nuevo</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="./agenda.php">Agenda</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="./telefonos.php">Telefonos</a>
        </li>
        <?php 
          }
        ?>
    </ul>
    <ul class="nav navbar-nav navbar-right">
      <li class="nav-item">
        <a class="nav-link" href="./edit-profile.php"><?php echo $_SESSION['apellido'] .", ". $_SESSION['nombre']; ?><span class="glyphicon glyphicon-user"></span> </a>
      </li>
      <li><a class="nav-link" href="./logout.php"><span class="glyphicon glyphicon-log-out"></span> Logout </a></li>
    </ul>
    
  </div>
</nav>
</body>
</html>

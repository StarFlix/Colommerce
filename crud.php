
<!DOCTYPE html>
<html lang="es">
<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Colommerce</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=DM+Serif+Display&display=swap" rel="stylesheet">
    <link rel="shortcut icon" href="Logo/Logo2.png" type="image/x-icon">
    <link rel="stylesheet" href="estilosnosotros.css">
    <link rel="stylesheet" href="estilos.css">
    <link rel="stylesheet" href="pagina.css">
    <link rel="stylesheet" href="perfilcss.css">
    <link rel="stylesheet" href="boost.css">
    <link rel="stylesheet" href="mycss.css">

</head>
<body>

    <nav class="menu">
        <section class="menu__container">
            <img src="Logo/Logox2.png" class="menu__logo"></img>
            <ul data-aos="fade-up" class="menu__links">
            <li class="menu__item">
                <a href="AdminPerfil.php" class="menu__link">Perfil<img src="imagenes/despligue.svg" class="menu__arrow"></a>
             </li>
             <li class="menu__item">
                <a href="Admintienda.php" class="menu__link">Tienda<img src="imagenes/despligue.svg" class="menu__arrow"></a>
             </li>
             <li class="menu__item">
                <a href="cerrar.php" class="menu__link">Cerrar sesión<img src="imagenes/despligue.svg" class="menu__arrow"></a>
            </li>
         </ul>
    </nav>
<br><h1>Usuarios</h1>
<div class="todo">
  <div id="cabecera">
  	<div id="img1">
  </div>
  <div id="contenido">
  	<table style="margin: auto; width: 800px; border-collapse: separate; border-spacing: 10px 5px;">
  		<thead>
  			<th>Documento</th>
  			<th>Nombres</th>
  			<th>Apellidos</th>
  			<th>Edad</th>
        <th>Genero</th>
  			<th>Telefono</th>
  			<th>Correo</th>
  			<th>Direccion</th>
        <th>Interes</th>
  			<th>Cargo</th>
  			<th>usuario</th>

  			<td> <a href="nuevo1.php"> <button type="button" class="btn btn-info">Agregar</button> </a> </td>
  		</thead>

      <?php
        include "basedatos.php";
        $sentecia="SELECT * FROM usuario";
        $resultado= $conexion->query($sentecia) or die (mysqli_error($conexion));
        while($fila=$resultado->fetch_assoc())
        {
          echo "<tr>";
            echo "<td>"; echo $fila['Documento']; echo "</td>";
            echo "<td>"; echo $fila['Nombres']; echo "</td>";
            echo "<td>"; echo $fila['Apellidos']; echo "</td>";
            echo "<td>"; echo $fila['Edad']; echo "</td>";
            echo "<td>"; echo $fila['Genero']; echo "</td>";
            echo "<td>"; echo $fila['Telefono']; echo "</td>";
            echo "<td>"; echo $fila['Correo']; echo "</td>";
            echo "<td>"; echo $fila['Direccion']; echo "</td>";
            echo "<td>"; echo $fila['Interes']; echo "</td>";
            echo "<td>"; echo $fila['id_cargo']; echo "</td>";
            echo "<td>"; echo $fila['Usuario']; echo "</td>";

            echo "<td><a href='modificar.php?Usuario=".$fila['Usuario']."'> <button type='button' class='btn btn-success'>Modificar</button> </a></td>";
            echo " <td><a href='eliminar.php?Usuario=".$fila['Usuario']."'> <button type='button' class='btn btn-danger'>Eliminar</button> </a></td>";
          echo "</tr>";
        }
      ?>
  	</table>
  
      <br><h1>Empleados</h1>
<div class="todo">
  <div id="cabecera">
  	<div id="img1">
  </div>
  <div id="contenido">
  	<table style="margin: auto; width: 800px; border-collapse: separate; border-spacing: 10px 5px;">
  		<thead>
  			<th>Documento</th>
  			<th>Nombre</th>
  			<th>Apellidos</th>
  			<th>Edad</th>
            <th>Genero</th>
  			<th>Telefono</th>
  			<th>Correo</th>
  			<th>Direccion</th>
            <th>Fecha de nacimiento</th>
  			<th>Cargo</th>

  			<td> <a href="nuevo1.php"> <button type="button" class="btn btn-info">Agregar</button> </a> </td>
  		</thead>

      <?php
        include "basedatos.php";
        $sentecia="SELECT * FROM empleado";
        $resultado= $conexion->query($sentecia) or die (mysqli_error($conexion));
        while($fila=$resultado->fetch_assoc())
        {
          echo "<tr>";
            echo "<td>"; echo $fila['Documento']; echo "</td>";
            echo "<td>"; echo $fila['Nombre']; echo "</td>";
            echo "<td>"; echo $fila['Apellidos']; echo "</td>";
            echo "<td>"; echo $fila['Edad']; echo "</td>";
            echo "<td>"; echo $fila['Genero']; echo "</td>";
            echo "<td>"; echo $fila['Telefono']; echo "</td>";
            echo "<td>"; echo $fila['Correo']; echo "</td>";
            echo "<td>"; echo $fila['Direccion']; echo "</td>";
            echo "<td>"; echo $fila['Fecha de nacimiento']; echo "</td>";
            echo "<td>"; echo $fila['Cargo']; echo "</td>";

            echo "<td><a href='modificar.php?Documento=".$fila['Documento']."'> <button type='button' class='btn btn-success'>Modificar</button> </a></td>";
            echo " <td><a href='eliminar.php?Documento=".$fila['Documento']."'> <button type='button' class='btn btn-danger'>Eliminar</button> </a></td>";
          echo "</tr>";
        }
      ?>

  	</table>
  
      <br><h1>Proveedores</h1>
<div class="todo">
  <div id="cabecera">
  	<div id="img1">
  </div>
  <div id="contenido">
  	<table style="margin: auto; width: 800px; border-collapse: separate; border-spacing: 10px 5px;">
  		<thead>
  			<th>ID</th>
  			<th>Nombre</th>
  			<th>Categoria de productos</th>

  			<td> <a href="nuevo1.php"> <button type="button" class="btn btn-info">Agregar</button> </a> </td>
  		</thead>

      <?php
        include "basedatos.php";
        $sentecia="SELECT * FROM proveedor";
        $resultado= $conexion->query($sentecia) or die (mysqli_error($conexion));
        while($fila=$resultado->fetch_assoc())
        {
          echo "<tr>";
            echo "<td>"; echo $fila['id_proveedor']; echo "</td>";
            echo "<td>"; echo $fila['nombre']; echo "</td>";
            echo "<td>"; echo $fila['categoria_productos']; echo "</td>";

            echo "<td><a href='modificar.php?id_proveedor=".$fila['id_proveedor']."'> <button type='button' class='btn btn-success'>Modificar</button> </a></td>";
            echo " <td><a href='eliminar.php?id_proveedor=".$fila['id_proveedor']."'> <button type='button' class='btn btn-danger'>Eliminar</button> </a></td>";
          echo "</tr>";
        }
      ?>
  

  	</table>
  
      <br><h1>Productos</h1>
<div class="todo">
  <div id="cabecera">
  	<div id="img1">
  </div>
  <div id="contenido">
  	<table style="margin: auto; width: 800px; border-collapse: separate; border-spacing: 10px 5px;">
  		<thead>
  			<th>ID</th>
  			<th>Imagen</th>
  			<th>Nombre</th>
  			<th>Descripción</th>
  			<th>Precio</th>
  			<th>Creado</th>
  			<th>Modificar</th>
  			<th>Estatus</th>

  			<td> <a href="nuevo1.php"> <button type="button" class="btn btn-info">Agregar</button> </a> </td>
  		</thead>

      <?php
        include "basedatos.php";
        $sentecia="SELECT * FROM products";
        $resultado= $conexion->query($sentecia) or die (mysqli_error($conexion));
        while($fila=$resultado->fetch_assoc())
        {
          echo "<tr>";
            echo "<td>"; echo $fila['id']; echo "</td>";
            echo "<td>"; echo $fila['image']; echo "</td>";
            echo "<td>"; echo $fila['name']; echo "</td>";
            echo "<td>"; echo $fila['description']; echo "</td>";
            echo "<td>"; echo $fila['price']; echo "</td>";
            echo "<td>"; echo $fila['created']; echo "</td>";
            echo "<td>"; echo $fila['modified']; echo "</td>";
            echo "<td>"; echo $fila['status']; echo "</td>";

            echo "<td><a href='modificar.php?id=".$fila['id']."'> <button type='button' class='btn btn-success'>Modificar</button> </a></td>";
            echo " <td><a href='eliminar.php?id=".$fila['id']."'> <button type='button' class='btn btn-danger'>Eliminar</button> </a></td>";
          echo "</tr>";
        }
      ?>

     
  		
  	</table>
</div>

  	</div>

</div>
<!-- FOOTER INDEX -->

<footer id="footer">
            <div class="contenedor footer-contenido">
                    <div class="logo-us">
                        <img data-aos="fade-up" class="logo" src="Logo/Logox2.png">
                        <img data-aos="fade-up" class="logo" src="Logo/Logo2.png">
                    </div>
                    <div data-aos="fade-up"  class="media">
                        <a href="index.html" class="media-icon">
                            <i class='icono_home'>
                                <img src="imagenes/home.svg" alt="">
                            </i>
                        </a>
                        <a href="registrar.html" class="media-icon">
                            <i class='icono_nosotros'>
                                <img src="imagenes/question.svg" alt="">
                            </i>
                        </a>
                        <a href="ingresar.html" class="media-icon">
                            <i class='icono_ingresar' >
                                <img src="imagenes/ingresar.svg" alt="">
                            </i>
                        </a>
                    </div>
            </div>
            <div class="linea"></div>
            <p  class="derechos">Colommerce</p>
            <br>
            <p  class="contactom"> Contacto: colommerce@gmail.com || +573136769185 || 
                Facebook/Instagram/Twitter: Colommerce ||</p>
        </footer>

</body>
</html>
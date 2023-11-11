
<?php
include_once "funciones.php";
if (!isset($_POST["id"])) {
    exit("No hay id");
}
quitarProductoDelCarrito($_POST["id"]);
# Saber si redireccionamos a tienda o al carrito, esto es porque
# llamamos a este archivo desde la tienda y desde el carrito
if (isset($_POST["redireccionar_carrito"])) {
    header("Location: ver_carrito.php");
} else {
    header("Location: tienda.php");
}
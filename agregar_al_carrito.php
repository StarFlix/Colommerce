<?php
include_once "funciones.php";
if (!isset($_POST["id"])) {
    exit("No hay id");
}
agregarProductoAlCarrito($_POST["id"]);
header("Location: tienda.php");
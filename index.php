<?php


session_start();
if (isset($_SESSION['user'])){
    echo '<h1>Bienvenido ' . $_SESSION['user'] . '</h1>';?>
    <a href="views/selectCategory.php">Agregar producto </a><br><br>
    Acá en el index se van a ver todas las publicaciones mas nuevas<br><br>
   Ver mis productos <br><br>

    Categorias...<br><br>

    <a href="sessionDestroy.php">Cerrar sesion </a><br>

<?php
}else{ ?>
    <a href="views/register.php?regUser">Registrarse como usuario normal</a><br>
    <a href="views/register.php?regMerchant">Registrarse como negocio</a><br>
    <a href="views/login.php">Iniciar sesion</a>
<?php
}


/**
 * Cuando un usuario añade un producto al carrito, en la tabla "ventas" si inserta los datos del producto, del usuario que lo publico, y del usuario que lo compro.
 * Para ver ventas de un usuario, hacer un select de la tabla ventas, where nombre = username
 * Lo mismo para ver las compras de un usuario.
 *
 */
/*
require_once "src/Connection.php";
require_once "src/Product.php";
$conn = new Connection();
$sql1 = "SELECT * FROM user_products WHERE id_user = :id";
$data = [
        ':id' => '7'
];
$results = $conn->viewByClassById($sql1,$data,'Product');


foreach ($results as $value){
    echo $value->getName() . '<br>';

}

echo "<pre>";
var_dump($results);
echo "</pre>";
*/












var_dump($_SESSION);
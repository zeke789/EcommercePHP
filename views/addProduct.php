<a href="../index.php" style="font-size: 28px">Volver al inicio</a><br><br>


<?php
session_start();

 

require_once '../src/Connection.php';
require_once '../src/Product.php';
require_once '../src/Validator/ProductValidator.php';
require_once '../src/Repositories/ProductCollection.php';
date_default_timezone_set('America/Argentina/Buenos_Aires');

$conn = new Connection;
$catId = $_GET['cat'];
$subcatId = isset($_GET['subcat'])?$_GET['subcat']:'';
$data1= [':catId' => $subcatId];
    $data2 = [':id' => $catId];
    $sql1= "SELECT * FROM subcategories WHERE id =:catId";
    $sql2 = "SELECT `name` FROM categories WHERE id =:id";
    $results1 = $conn->viewSelectByParameter($sql1,$data1);
    $results2 = $conn->viewSelectByParameter($sql2,$data2);

        ?>
        <p style="font-size: 20px">Categoria seleccionada: <?php foreach($results2 as $value){ echo ucfirst($value['name']); } ?></p>
        <?php if (isset($_GET['subcat'])) {?><p style="font-size: 20px">Subcategoria seleccionada: <?php foreach($results1 as $value){ echo ucfirst($value['name']); } ?></p> <?php } ?>

        <form action="" method="post" id="formproductos" name="formproductos" enctype="multipart/form-data">


        <label>Nombre:</label>
        <input type="text" name="name" id="name" value="" autofocus />

        <label>Precio:</label>
        <input type="text" name="price" id="price" value="" />

        <label>Stock:</label>
        <input type="text" name="stock"  value="" /><br><br>

    <label>Categoria:</label>
        <select name="category">
            <option value="">Seleccione una opción</option>
                <option value="computadoras"> Computadoras </option>
                <option value="celulares"> Celulares </option>
            <option value="televisores"> Televisores </option>
        </select><br><br>

        <legend>Estado:</legend>

        <input type="radio" value="nuevo" name="state" />
        <label >Nuevo</label>

        <input type="radio" value="usado" name="state"/>
        <label>Usado</label><br><br>

        <label for="descripcion" id="labeldescripcion"  >Descripción:</label><br>
        <textarea name="description" id="descripcion" cols="80" rows="5" placeholder="Descripción..."></textarea><br><br>

        <label>Foto:</label><br>
        <input type="file" name="photo" id="foto" /><br><br>

    <input type="submit" value="Publicar producto" id="agregar" />

    <input type="hidden" name="user_id" value=" <?= isset($_SESSION['id'])?$_SESSION['id']:'' ?> ">

    
</form>

    <?php
        


if ($_SERVER['REQUEST_METHOD'] = 'POST'){
    $time = time();
    $date = date("d-m-Y", $time);
    $hour = date("H:i", $time);
    $prd = new Product;
    $prd->setName(isset($_POST['name'])?$_POST['name']:'');
    $prd->setCategory($catId);
      $prd->setSubcategory($subcatId);
    $prd->setDate($date);
    $prd->setHour($hour);
    $prd->setDescription(isset($_POST['description'])?$_POST['description']:'');
    $prd->setImage(isset($_POST['image'])?$_POST['image']:'');
    $prd->setPrice(isset($_POST['price'])?$_POST['price']:'');
    $prd->setState(isset($_POST['state'])?$_POST['state']:'');
    $prd->setStock(isset($_POST['stock'])?$_POST['stock']:'');
    $prd->setUserId(isset($_POST['user_id'])?$_POST['user_id']:'');

    echo 'nombre:'  . $prd->getName() . '<br>';
    echo 'categoriaId:'  . $prd->getCategory(). '<br>';
    echo 'subcatId:' . $prd->getSubcategory(). '<br>';
    echo 'description:'  . $prd->getDescription(). '<br>';
    echo  'price:'  . $prd->getPrice(). '<br>';
    echo  $prd->getImage(). '<br>';
    echo 'estado:'  . $prd->getState(). '<br>';
    echo 'userId:' . $prd->getUserId(). '<br>';
     echo 'stock:'  . $prd->getstock(). '<br>';
    echo 'aniadido en la fecha'  . $prd->getDate(). '<br>';
    echo 'en la hora: ' . $prd->getHour(). '<br>';
//var_dump($_POST['user_id']);
     
    try{
    }catch (PDOException $e){
        echo $e->getMessage();
    }
}











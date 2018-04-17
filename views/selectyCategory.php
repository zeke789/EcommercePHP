<?php 
date_default_timezone_set('America/Argentina/Buenos_Aires');
require_once '../src/Connection.php';
require_once '../src/Product.php';
require_once '../src/Validator/ProductValidator.php';
require_once '../src/Repositories/ProductCollection.php';
$conn = new Connection;

$sql = "SELECT `id`,`name` FROM categories";
$results = $conn->viewAllSelect($sql);
if (!isset($_POST['cat'])){
?>
<h3>Seleccione categoria</h3>
<form action="" method="post">
    <select name="cat" >
        <option value=""></option>
        <?php foreach ($results as $value){
           $as = str_replace('_',' ',ucfirst($value['name']));
            ?>
        <option value="<?= $value['id'] ?>"> <?= $as ?> </option>
        <?php } ?>
    </select>
    <input type="submit" value="Continuar">
</form>

<?php
}


if (isset($_POST['cat'])){
    $catId = $_POST['cat'];
    $data1= [':catId' => $catId];
    $data2 = [':id' => $catId];
    $sql1= "SELECT * FROM subcategories WHERE category_id =:catId";
    $sql2 = "SELECT `name` FROM categories WHERE id =:id";
    $results = $conn->viewSelectByParameter($sql1,$data1);
    $results2 = $conn->viewSelectByParameter($sql2,$data2);
    if (!empty($results)){ ?>
        <p style="font-size: 20px">Categoria seleccionada: <?php foreach($results2 as $value){ echo ucfirst($value['name']); } ?></p>
        <h3>Seleccione Subcategoria</h3>
<form action="addProduct.php" method="post">
    <select name="subcat">
        <option value=""></option>
        <?php foreach ($results as $value){
            $as = str_replace('_',' ',ucfirst($value['cat']));
            ?>
            <option value="<?=$value['id'] ?>"> <?=$as?> </option>
        <?php } ?>
        </select>
        <input type="submit" value="Continuar">
        </form>
        <?php
    } else{
    	header('Location: addProduct.php?cat='.$catId);
    }
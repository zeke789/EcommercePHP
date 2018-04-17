
<?php
require_once '../src/User.php';
require_once '../src/Connection.php';
require_once '../src/Validator/UserValidator.php';
require_once '../src/Repositories/UserCollection.php';




if (isset($_GET['regUser'])){
    if ($_SERVER['REQUEST_METHOD'] == 'POST'){
       require_once '../src/User.php';
       try{
           $user = new User;
           $user->setName($_POST['name']);
           $user->setSurname($_POST['surname']);
           $user->setUsername($_POST['username']);
           if (!empty ($_POST['day']) && !empty ($_POST['month'])&& !empty ($_POST['year'])){
               $user->setBirthdate($_POST['day']. '/' . $_POST['month'] . '/' . $_POST['year']);
           }
            $user->setEmail($_POST['email']);
            $user->setProvince($_POST['province']);
            $user->setCity($_POST['city']);
            $user->setPassword1($_POST['password1']);
            $user->setPassword2($_POST['password2']);
            $userValidator = new userValidator($user);
            $userValidator->validarDatos();

            /*si cuando se validan los datos del form, hay algun error, entonces la descripcion de esos errores
            se carga en el array o variable errors*/
            if (!empty($userValidator->getErors())){
                foreach($userValidator->getErors() as $value){
                    echo '<div style="color: red">' . $value . '</div>';
                }
            }
            $msg = !empty($userValidator->getMsg()) ? $userValidator->getMsg() : '';
            echo '<div style="color: limegreen; font-size: 25px">' .  $msg .'</div>';
    }catch (PDOException $e){?>
        <div style="color: red">

<?php            echo $e->getMessage();
?>
        </div>
<?php   }

    }


$connection = new Connection();

$sql1 = 'SELECT id,`name` FROM province';
$sql2 ='SELECT `id`,`name` FROM city';
$results1 = $connection->viewAllSelect($sql1);
$results2 = $connection->viewAllSelect($sql2);

?>

<a href="../index.php">Ir a la pagina de inicio</a><br><br>

<form action="" method="post">
    Nombre:<br>
    <input type="text" name="name"><br><br>
    Apellido:<br>
    <input type="text" name="surname"><br><br>
    Nombre de usuario:<br>
    <input type="text" name="username"><br><br>
    Email:<br>
    <input type="email" name="email"><br><br>

    Provincia:<br>
    <select name="province">
        <option value=""></option>
        <?php foreach($results1 as $value){ ?>
            <option value="<?=$value['id'] ?>"> <?= $value['name'] ?> </option>
        <?php }  ?>
    </select><br><br>

    Ciudad:<br>
    <select name="city">
        <option value=""></option>
        <?php  foreach($results2 as $value) {?>
        <option value="<?=$value['id'] ?>"> <?= $value['name'] ?> </option>
        <?php }  ?>
    </select><br><br>

    Fecha de nacimiento:<br>
    Dia
    <select name="day" id="">
        <option value=""></option>
        <?php for ($i=1;$i<32;$i++){?>
        <option value="<?=$i?>"><?=$i?> </option>
        <?php }?>
    </select>

    Mes
    <select name="month">
        <option value=""></option>
        <?php for ($i=1;$i<13;$i++){?>
            <option value="<?=$i?>"><?=$i?> </option>
        <?php }?>
    </select>
    Año
    <select name="year">
        <option value=""></option>
        <?php for ($i=2017;$i>1909;$i--){?>
            <option value="<?=$i?>"> <?=$i?> </option>
        <?php }?>
    </select><br><br>

    Contraseña:<br>
    <input type="password" name="password1"><br><br>

    Repita contraseña:<br>
    <input type="password" name="password2"><br><br>
    <input type="submit" value="Registrarse">

</form>

<?php
}

if(isset($_GET['regMerchant'])){
    if($_SERVER['REQUEST_METHOD'] == 'POST'){
        require_once '../src/Merchant.php';
        require_once '../src/Validator/MerchantValidator.php';
        try {
            $merchant = new Merchant;
            $merchant->setName(isset($_POST['name']) ? $_POST['name'] : '');
            $merchant->setSurname(isset($_POST['surname']) ? $_POST['surname'] : '');
            if (!empty ($_POST['day']) && !empty ($_POST['month'])&& !empty ($_POST['year'])){
                $merchant->setBirthdate($_POST['day']. '/' . $_POST['month'] . '/' . $_POST['year']);
            }
            $merchant->setEmail(isset($_POST['email']) ? $_POST['email'] : '');
            $merchant->setUsername(isset($_POST['username']) ? $_POST['username'] : '');
            $merchant->setCommerceName(isset($_POST['commerceName']) ? $_POST['commerceName'] : '');
            $merchant->setProvinceId(isset($_POST['provinceId']) ? $_POST['provinceId'] : '');
            $merchant->setCityId(isset($_POST['cityId']) ? $_POST['cityId'] : '');
            $merchant->setCommerceDescription(isset($_POST['commerceDescription']) ? $_POST['commerceDescription'] : '');
            $merchant->setPassword1(isset($_POST['password1']) ? $_POST['password1'] : '');
            $merchant->setPassword2(isset($_POST['password2']) ? $_POST['password2'] : '');
            $merchant->setDelivery(isset($_POST['delivery']) ? $_POST['delivery'] : '');
            $merchant->setTelephone(isset($_POST['telephone']) ? $_POST['telephone'] : '');
            $merchant->setAdress(isset($_POST['adress']) ? $_POST['adress'] : '');

            $validator = new MerchantValidator($merchant);
            $validator->validarDatos();
            if(!empty ($validator->getErrors())){ ?>
                <div style="color: red">

                <?php
                foreach($validator->getErrors() as $value){
                    echo  $value . '<br>';
                }
                ?>
                </div>
                <?php
            }elseif (empty($validator->getErrors())){
              /*  echo $merchant->getName() .'<br>';
                echo $merchant->getSurname().'<br>';
                echo $merchant->getUsername().'<br>';
                echo $merchant->getEmail().'<br>';
                echo $merchant->getDelivery().'<br>';
                echo $merchant->getBirthdate().'<br>';
                echo $merchant->getCommerceName().'<br>';
                echo $merchant->getCommerceDescription().'<br>';
                echo $merchant->getCityId().'<br>';
                echo $merchant->getProvinceId().'<br>';
                echo $merchant->getPassword1().'<br>';
                echo $merchant->getPassword2().'<br>';
                echo $merchant->getAdress().'<br>';
                die;*/
                $collect = new UserCollection();
                $collect->addMerchant($merchant);
                $msg = !empty($collect->getMessage()) ? $collect->getMessage() : '';
                echo '<div style="color: limegreen; font-size: 25px">' .  $msg .'</div>';

            }

        }catch(PDOException $e){
            echo $e->getMessage();
        }
    }

    $connection = new Connection();
    $sql1 = 'SELECT id,`name` FROM provinces';
    $sql2 ='SELECT `id`,`name` FROM cities';
    $results1 = $connection->viewAllSelect($sql1);
    $results2 = $connection->viewAllSelect($sql2);
?>
    <a href="../index.php">Ir a la pagina de inicio</a><br><br>

    <form action="" method="post">
        Nombre:<br>
        <input type="text" name="name"><br><br>

        Apellido:<br>
        <input type="text" name="surname"><br><br>



        Fecha de nacimiento:<br>

        Dia
        <select name="day" id="">
            <option value=""></option>
            <?php for ($i=1;$i<32;$i++){?>
                <option value="<?=$i?>"><?=$i?> </option>
            <?php }?>
        </select>
        Mes
        <select name="month">
            <option value=""></option>
            <?php for ($i=1;$i<13;$i++){?>
                <option value="<?=$i?>"><?=$i?> </option>
            <?php }?>
        </select>
        Año
        <select name="year">
            <option value=""></option>
            <?php for ($i=2017;$i>1909;$i--){?>
                <option value="<?=$i?>"> <?=$i?> </option>
            <?php }?>
        </select><br><br>


        Email:<br>
        <input type="email" name="email"><br><br>


        Nombre de usuario:<br>
        <input type="text" name="username"><br><br>


        Nombre del negocio:<br>
        <input type="text" name="commerceName"><br><br>


        Provincia:<br>
        <select name="provinceId">
            <option value=""></option>
            <?php foreach($results1 as $value){ ?>
                <option value="<?=$value['id'] ?>"> <?= $value['name'] ?> </option>
            <?php }  ?>
        </select><br><br>

        Ciudad:<br>
        <select name="cityId">
            <option value=""></option>
            <?php  foreach($results2 as $value) {?>
                <option value="<?=$value['id'] ?>"> <?= $value['name'] ?> </option>
            <?php }  ?>
        </select><br><br>

        Descripcion del negocio:<br>
        <textarea name="commerceDescription" cols="80" rows="5" placeholder="Descripción..."></textarea><br><br>

        Hacen delivery?<br>
       Si <input type="radio" name="delivery" value="si">
        No<input type="radio" name="delivery" value="no"> <br><br>

        Direccion:(Opcional)<br>
        <input type="text" name="adress"><br><br>

        Numero de telefono:(Opcional)<br>
        <input type="text" name="telephone"><br><br>

        Contraseña:<br>
        <input type="password" name="password1"><br><br>

        Repita contraseña:<br>
        <input type="password" name="password2"><br><br>
        <input type="submit" value="Registrarse">

    </form>

<?php
}
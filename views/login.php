
<form action="" method="post">
    Nombre de usuario: <br>
    <input type="text" name="user"><br><br>
    Contraseña: <br>
    <input type="password" name="pass"><br>
    <input type="submit" value="Iniciar sesion"><br>
</form>

<?php

require_once '../src/Log.php';
require_once '../src/Connection.php';
require_once '../src/validator/logValidator.php';




if ($_SERVER['REQUEST_METHOD']=='POST'){
    try{
        $username = $_POST['user'];
        $password = $_POST['pass'];
        $logValidator = new logValidator($username,$password);
            if ($logValidator->verificar() == false){
            echo 'Usuario o contraseña incorrectos';
        }else{
            if (isset($_SESSION['user'])){
                header('Location: ../index.php');
            }
        }
    }catch (PDOException $e){
        echo $e->getMessage();
    }
}


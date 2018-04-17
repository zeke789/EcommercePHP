<?php

class MerchantValidator
{
    private $merchant;
    private $errors;
    private $msg;

    public function __construct(Merchant $merchantUser)
    {
        $this->merchant = $merchantUser;
    }

    public function getErrors()
    {
        return $this->errors;
    }
    public function getMsg()
    {
        return $this->msg;
    }

    public function validarDatos()
    {
        if (empty($this->merchant->getName())) {
            $this->errors[] = 'Debe ingresar un nombre';
        }
        if (empty($this->merchant->getSurname())) {
            $this->errors[].= 'Debe ingresar un apellido';
        }






        if (empty($this->merchant->getBirthdate())){
            $this->errors[] = 'Debe ingresar fecha de nacimiento';
        }



        if (empty($this->merchant->getEmail())) {
            $this->errors[] = 'Debe ingresar un email';
        }

        if (empty($this->merchant->getUsername())) {
            $this->errors[] = 'Debe introducir un nombre de usuario';
        } elseif (strlen($this->merchant->getUsername()) < 5 || strlen($this->merchant->getUsername()) > 16) {
            $this->errors[] = 'El usuario debe tener entre 5 y 16 caracteres';
        }

        if (empty($this->merchant->getCommerceName())) {
            $this->errors[] = 'Debe ingresar un nombre para su negocio';
        }

        if (empty($this->merchant->getProvinceId())) {
            $this->errors[] = 'Debe seleccionar provincia';
        }
        if (empty($this->merchant->getCityId())) {
            $this->errors[] = 'Debe seleccionar una ciudad';
        }

        if (empty($this->merchant->getCommerceDescription())) {
            $this->errors[] = 'Debe dar una descripcion sobre su negocio';
        }


        if (empty($this->merchant->getPassword1())) {
            $this->errors[] = 'Debe ingresar una contraseña';
        } elseif (strlen($this->merchant->getPassword1()) < 6 || strlen($this->merchant->getPassword1()) > 10 ) {
            $this->errors[] = 'La contraseña debe tener entre 6 y 10 caracteres';
        } else {
            if (empty($this->merchant->getPassword2())) {
                $this->errors[] = 'Debe ingresar dos veces la contraseña';
            }
        }

        if (!empty($this->merchant->getPassword2()) && !empty($this->merchant->getPassword1())) {
            if ($this->merchant->getPassword1() !== $this->merchant->getPassword2()) {
                $this->errors [] = 'Las contraseñas no coinciden';
            }
        }






        if (empty($this->merchant->getDelivery())) {
            $this->errors[] = 'Debe indicar si hacen delivery o no';
        }


        if (empty($this->errors)){
            $this->validarDisponibilidad($this->merchant->getUsername(),$this->merchant->getEmail());
        }

    }

    private function validarDisponibilidad($username,$email)
    {
        $conn = new Connection();
        $sql1 = "SELECT username FROM users WHERE username =:usu";
        $sql2 = "SELECT email FROM users WHERE email =:mail";
        $sql3 = "SELECT username FROM merchants WHERE username =:usu";
        $sql4 = "SELECT email FROM merchants WHERE email =:mail";
        $data1 = [
            ':usu' => $username
        ];
        $data2 = [
            ':mail' => $email
        ];
        $data3 = [
            ':usu' => $username
        ];
        $data4 = [
            ':mail' => $email
        ];


        $consulta1 = $conn->selectAffected($sql1,$data1);
        $consulta2 = $conn->selectAffected($sql2,$data2);
        $consulta3 = $conn->selectAffected($sql3,$data3);
        $consulta4 = $conn->selectAffected($sql4,$data4);

        if ($consulta1 > 0){
            throw new PDOException('El nombre de usuario ya esta en uso');
        }
        if ($consulta2 > 0){
            throw new PDOException('El email ya esta en uso');
        }
        if ($consulta3 > 0){
            throw new PDOException('El nombre de usuario ya esta en uso');
        }
        if ($consulta4 > 0){
            throw new PDOException('El email ya esta en uso');
        }

return true;
      //  if (empty($this->errors)){
            $collect = new UserCollection();
            $collect->addMerchant($this->merchant);
            $this->msg = $collect->getMessage();
            return $this->msg;
       // }
    }

}
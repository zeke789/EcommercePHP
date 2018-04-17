<?php


class userValidator
{
    private $user;
    private $errors;
    private $msg;

    public function __construct(User $user)
    {
        $this->user = $user;
    }

    public function getErors()
    {
      return $this->errors;
    }
    public function getMsg()
    {
      return $this->msg;
    }

    public function validarDatos()
    {
        if (empty($this->user->getName())) {
            $this->errors[] = 'Debe ingresar un nombre<br>';
        }
        if (empty($this->user->getSurname())) {
            $this->errors[].= 'Debe ingresar un apellido<br>';
        }

        if (empty($this->user->getUsername())) {
            $this->errors[] = 'Debe introducir un nombre de usuario<br>';
        } elseif (strlen($this->user->getUsername()) < 5 || strlen($this->user->getUsername()) > 16) {
            $this->errors[] = 'El usuario debe tener entre 5 y 16 caracteres<br>';
        }

        if (empty($this->user->getPassword1())) {
            $this->errors[] = 'Debe ingresar una contraseña<br>';
        } elseif (strlen($this->user->getPassword1()) < 6 || strlen($this->user->getPassword1()) > 10 ) {
            $this->errors[] = 'La contraseña debe tener entre 6 y 10 caracteres<br>';
        } else {
            if (empty($this->user->getPassword2())) {
                $this->errors[] = 'Debe ingresar dos veces la contraseña<br>';
            }
        }

        if (!empty($this->user->getPassword2()) && !empty($this->user->getPassword1())) {
            if ($this->user->getPassword1() !== $this->user->getPassword2()) {
                $this->errors [] = 'Las contraseñas no coinciden<br>';
            }
        }
        if (empty($this->user->getEmail())) {
            $this->errors[] = 'Debe ingresar un email<br>';
        }
       /* if (empty($this->user->getBirthdate())) {
            $this->errors[] = 'Debe ingresar fecha de nacimiento<br>';
        } else {
            if (strlen($this->user->getDni()) != 8 || !is_numeric($this->user->getDni())) {
                $this->errors[] =  'El dni ingresado es incorrecto<br>';
            }
        }*/
        if (empty($this->user->getBirthdate())){
            $this->errors[] = 'Debe ingresar fecha de nacimiento<br>';
        }
        if (empty($this->errors)){
            $this->validarUsuario($this->user->getUsername(),$this->user->getEmail());
        }

    }

    private function validarUsuario($username,$email)
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


        if (empty($this->errors)){
           $collect = new UserCollection();
           $collect->addUser($this->user);
            $this->msg = $collect->getMessage();
        }
    }





}
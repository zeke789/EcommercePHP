<?php

//require_once '../helpers.php';
//require_once 'Validator/userValidator.php';
//require_once 'UserCollection.php';
class User
{
    private $username;
    private $name;
    private $surname;
    private $password1;
    private $password2;
    private $email;
    private $province;
    private $city;
    private $birthdate;

    public function getProvince()
    {
        return $this->province;
    }

    public function setProvince($province)
    {
        $this->province = $province;
        return $this;
    }

    public function getCity()
    {
        return $this->city;
    }

    public function setCity($city)
    {
        $this->city = $city;
        return $this;
    }

    public function setPassword1($password)
    {
        $this->password1 = $password;
        return $this;

    }
    public function getPassword1()
    {
        return $this->password1;

    }
    public function getUsername()
    {
        return $this->username;
    }

    public function setUsername($username)
    {
        $this->username = $username;
        return $this;
    }

    public function getName()
    {
        return $this->name;
    }

    public function setName($name)
    {
        $this->name = $name;
        return $this;
    }

    public function getSurname()
    {
        return $this->surname;
    }

    public function setSurname($surname)
    {
        $this->surname = $surname;
        return $this;
    }

    public function getPassword2()
    {
        return $this->password2;
    }


    public function setPassword2($password2)
    {
        $this->password2 =$password2;
        return $this;
    }

    public function getEmail()
    {
        return $this->email;
    }

    public function setEmail($email)
    {
        $this->email = $email;
        return $this;
    }

    /*public function getDni()
    {
        return $this->dni;
    }

    public function setDni($dni)
    {
        $this->dni = $dni;
        return $this;
    }*/

    public function getBirthdate()
    {
        return $this->birthdate;
    }

    public function setBirthdate($birthdate)
    {
        $this->birthdate = $birthdate;
        return $this;
    }


}


/***************************************************
 *
 *   $sql = "SELECT * FROM users";
 *   $query = $this->conn->query($sql);
 *   while ($row = $query->fetch(PDO::FETCH_OBJ)){
 *       echo $row->username;
 *   }
 *class user implements register, implements log
**************************************************/

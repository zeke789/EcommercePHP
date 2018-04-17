<?php


class Merchant
{


    private $name;
    private $surname;
    private $username;
    private $commerceName;
    private $commerce_description; //aca va una breve descripcion del negocio, por ejemplo que tipo de ropa vende, de toodo un poco, ropa deportiva, etc.
    private $delivery; //yes or not
    private $adress; //NULL
    private $telephone;
    private $password1;
    private $password2;
    private $email;
    private $provinceId;
    private $cityId;
    private $birthdate;


    public function getName()
    {
        return $this->name;
    }
    public function setName($name)
    {
        $this->name = $name;
    }



    public function getSurname()
    {
        return $this->surname;
    }
    public function setSurname($surname)
    {
        $this->surname = $surname;
    }




    public function getUsername()
    {
        return $this->username;
    }
    public function setUsername($username)
    {
        $this->username = $username;
    }




    public function getCommerceName()
    {
        return $this->commerceName;
    }
    public function setCommerceName($commerceName)
    {
        $this->commerceName = $commerceName;
    }




    public function getCommerceDescription()
    {
        return $this->commerce_description;
    }
    public function setCommerceDescription($commerce_description)
    {
        $this->commerce_description = $commerce_description;
    }



    public function getDelivery()
    {
        return $this->delivery;
    }
    public function setDelivery($delivery)
    {
        $this->delivery = $delivery;
    }




    public function getAdress()
    {
        return $this->adress;
    }
    public function setAdress($adress)
    {
        $this->adress = $adress;
    }




    public function getTelephone()
    {
        return $this->telephone;
    }
    public function setTelephone($telephone)
    {
        $this->telephone = $telephone;
    }




    public function getPassword1()
    {
        return $this->password1;
    }
    public function setPassword1($password1)
    {
        $this->password1 = $password1;
    }



    public function getPassword2()
    {
       return $this->password2;
    }
    public function setPassword2($password2)
    {
        $this->password2 = $password2;
    }



    public function getEmail()
    {
        return $this->email;
    }
    public function setEmail($email)
    {
        $this->email = $email;
    }



    public function getProvinceId()
    {
        return $this->provinceId;
    }
    public function setProvinceId($provinceId)
    {
        $this->provinceId = $provinceId;
    }



    public function getCityId()
    {
        return $this->cityId;
    }
    public function setCityId($cityId)
    {
        $this->cityId = $cityId;
    }




    public function getBirthdate()
    {
        return $this->birthdate;
    }
    public function setBirthdate($birthdate)
    {
        $this->birthdate = $birthdate;
    }



}
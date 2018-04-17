<?php



class UserCollection
{
    private $msg;

    public function getMessage()
    {
        return $this->msg;
    }

    private function hashPass($password)
    {
        return $this->password2 = password_hash($password,PASSWORD_DEFAULT);
    }

    public function addUser(User $user)
    {
        $sql = "INSERT INTO users (`name`,`surname`,`username`,`birthdate`,`pass`,`email`,`id_province`,`id_city`,`type`) VALUES (?,?,?,?,?,?,?,?)";
        $conn = new Connection;
        $data = [
            1=>$user->getName(),
            2=>$user->getSurname(),
            3=>$user->getUsername(),
            4=>$user->getBirthdate(),
            5=>$this->hashPass($user->getPassword2()),
            6=>$user->getEmail(),
            7=>$user->getProvince(),
            8=> $user->getCity(),
            9=> 'user'
        ];
        try {
             if ($conn->insert($sql,$data) == true){
                $this->msg = 'Usuario registrado';
             }
        }catch(PDOException $e){
            echo $e->getMessage();
        }
    }

    public function addMerchant(Merchant $merchant)
    {
        $sql = "INSERT INTO merchants(`name`,`surname`,`username`,`commerce_name`,`email`,`id_city`,`id_province`,`birthdate`,`delivery`,`telephone`,`adress`,`type`,`pass`,`commerce_description`) VALUES (?,?,?,?,?,?,?,?,?,?,?,?,?,?)";
        $data=[
            1=>$merchant->getName(),
            2=>$merchant->getSurname(),
            3=>$merchant->getUsername(),
            4=>$merchant->getCommerceName(),
            5=>$merchant->getEmail(),
            6=>$merchant->getCityId(),
            7=>$merchant->getProvinceId(),
            8=> $merchant->getBirthdate(),
            9=> $merchant->getDelivery(),
            10=> $merchant->getTelephone(),
            11=> $merchant->getAdress(),
            12=> 'merchant',
            13 =>$this->hashPass($merchant->getPassword2()),
            14 =>$merchant->getCommerceDescription()
        ];
        $conn = new Connection;
        if ($conn->insert($sql,$data) == true){
            $this->msg = 'Negocio registrado';
            return true;
        }else{
            throw new PDOException('Hubo un problema al intentar registrarse, por favor reintentelo nuevamente');
        }


    }


    public function deleteUser()
    {

    }

    public function editUser()
    {


    }

}

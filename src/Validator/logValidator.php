<?php

//require_once '../../helpers.php';
class logValidator
{
    private $password;
    private $hash;
    private $email;
    private $id;
    private $type;

    public function __construct($username,$password)
    {
        $this->username = $username;
        $this->password = $password;
    }


    public function verificar()
    {
        $conn = new Connection;
        $data = [
            ':us' => $this->username
        ];
        $sql = "SELECT username,pass,id,email,`type` FROM users WHERE username =:us";
        $sql1 = "SELECT username,pass,id,email,`type` FROM merchants WHERE username =:us";
        // $conn->select($sql,$data);
     /*    if ($conn->selectAffected($sql,$data) == 0 && $conn->selectAffected($sql1,$data) == 0){
            return false;
         } else {
            $row = $conn->viewSelectByParameter($sql,$data);
            foreach ($row as $value){
                $this->hash = $value['pass'];
                $this->email= $value['email'];
                $this->id= $value['id'];
            }

            }*/
        if ($conn->selectAffected($sql,$data) > 0){
            $row = $conn->viewSelectByParameter($sql,$data);
            foreach ($row as $value){
                $this->hash = $value['pass'];
                $this->email= $value['email'];
                $this->id= $value['id'];
                $this->type= $value['type'];
            }
        }elseif($conn->selectAffected($sql1,$data) > 0){
            $row = $conn->viewSelectByParameter($sql1,$data);
            foreach ($row as $value){
                $this->hash = $value['pass'];
                $this->email= $value['email'];
                $this->id= $value['id'];
                $this->type= $value['type'];

            }

        }

         if ($this->passVerify() == true ){
                $log = new Log($this->username,$this->email,$this->id,$this->type);
                $log->sessionStart();
                return true;
            }else{
                return false;
            }
        }


    private function passVerify()
    {
        if (password_verify($this->password,$this->hash) == true){
            return true;
        }else{
            return false;
        }
    }




}
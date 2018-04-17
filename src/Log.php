<?php

class Log

{
    private $user;
    private $email;
    private $id;
    private $type;

public function __construct($user,$email,$id,$type)
{
    $this->user = $user;
    $this->email = $email;
    $this->id = $id;
    $this->type = $type;
}



public function sessionStart()
{
    session_start();
    $_SESSION['user'] = $this->user;
    $_SESSION['id'] = $this->id;
    $_SESSION['email'] = $this->email;
    $_SESSION['type'] = $this->type;

}
    /* public function getUsername()
      {
          return  $this->user;
      }
      public function getId()
      {
          return  $this->id;
      }
      public function email()
      {
          return  $this->email;
      }*/

}
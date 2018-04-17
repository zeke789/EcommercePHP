<?php



 class Connection
 {
    private $engine = 'mysql';
    private $hostname = '127.0.0.1';
    private  $dbname = 'ecommerce';
    private $username = 'root';
    private  $password = '';
    private $pdo;

     public function __construct()
     {
             $dsn = $this->engine . ':host=' . $this->hostname . ';dbname=' . $this->dbname;
             $this->pdo = new PDO($dsn,$this->username,$this->password);
             return $this->pdo;
     }



     public function insert($sql, array $data)
     {
         $stmt = $this->pdo->prepare($sql);
         foreach($data as $key => $value){
             $stmt->bindValue($key,$value);
         }
         if ($stmt->execute()){
             return true;
         }else{
             return false;
         }
     }



     public function selectAffected($sql,$data)
     {
         $stmt = $this->pdo->prepare($sql);
         foreach ($data as $key=>$value){
             $stmt->bindValue($key,$value);
         }
         $stmt->execute();
         return $stmt->rowCount();
     }



     public function viewSelectByParameter($sql,$data)
     {
         $result = [];
         $stmt = $this->pdo->prepare($sql);
         foreach ($data as $key =>$value){
             $stmt->bindValue($key,$value);
         }
         $stmt->execute();
         while ($row = $stmt->fetch(PDO:: FETCH_ASSOC)){
             $result[] = $row;
         }
         return $result;
     }


     public function viewAllSelect($sql)
     {
         $result = [];
         $stmt = $this->pdo->prepare($sql);

         $stmt->execute();
         while( $row = $stmt->fetch(PDO:: FETCH_ASSOC)){
             $result[] = $row;
         }
        return $result;
     }


     public function viewAllByClass($sql,$class)
     {
         $stmt = $this->pdo->prepare($sql);
         $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_CLASS,$class);

     }
      public function viewByClassById($sql,$data,$class)
      {
          $stmt = $this->pdo->prepare($sql);

          foreach ($data as $key=>$value){

              $stmt->bindValue($key,$value);
          }
          $stmt->execute();

         return $stmt->fetchAll(PDO::FETCH_CLASS,$class);

      }

 }
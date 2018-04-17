<?php


class ProductCollection
{

    private function addProduct()
    {
        $connection = new Connection();

        $sql = "INSERT INTO products(namee,price,stock,category,state,description,user_id,date_added,image)
        VALUES (?,?,?,?,?,?,?,?,?)";
        $date = date('Y-m-d');
        $stmt = $conn->prepare($sql);
        $stmt->bindParam(1,$this->name);
        $stmt->bindParam(2,$this->price);
        $stmt->bindParam(3,$this->stock);
        $stmt->bindParam(4,$this->category);
        $stmt->bindParam(5,$this->state);
        $stmt->bindParam(6,$this->description);
        $stmt->bindParam(7,$this->user_id);
        $stmt->bindParam(8,$this->date);
        $stmt->bindParam(9,$this->image);

        if(!$stmt->execute()){
            throw new PDOException('Hubo un error al intentar agregar el producto');
        }

    }

}
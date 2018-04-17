<?php
require_once 'Connection.php';
class Product
{

    private $name;
    private $price;
    private $stock;
    private $category;
    private $subCategory;
    private $state;
    private $description;
    private $image;
    private $date;
    private $hour;
    private $user_id;

    public function getSubcategory()
    {
        return $this->subCategory;
    }


    public function setsubCategory($subCategory)
    {
        $this->subCategory = $subCategory;
    }

    public function getHour()
    {
        return $this->hour;
    }


    public function setHour($hour)
    {
        $this->hour = $hour;
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


    public function getPrice()
    {
        return $this->price;
    }


    public function setPrice($price)
    {
        $this->price = $price;
        return $this;
    }


    public function getStock()
    {
        return $this->stock;
    }


    public function setStock($stock)
    {
        $this->stock = $stock;
        return $this;
    }


    public function getCategory()
    {
        return $this->category;
    }


    public function setCategory($category)
    {
        $this->category = $category;
        return $this;
    }


    public function getState()
    {
        return $this->state;
    }


    public function setState($state)
    {
        $this->state = $state;
        return $this;
    }


    public function getDescription()
    {
        return $this->description;
    }


    public function setDescription($description)
    {
        $this->description = $description;
        return $this;
    }


    public function getImage()
    {
        return $this->image;
    }


    public function setImage($image)
    {
        $this->image = $image;
        return $this;
    }


    public function getDate()
    {
        return $this->date;
    }


    public function setDate($date)
    {
        $this->date = $date;
        return $this;
    }


    public function getUserId()
    {
        return $this->user_id;
    }


    public function setUserId($user_id)
    {
        $this->user_id = $user_id;
        return $this;
    }






}




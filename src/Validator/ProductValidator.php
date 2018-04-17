<?php


class ProductValidator
{

    public $errors;

    public function categoryVerify()
    {

    }
    public function subcategoryVerify()
    {

    }

    public function dataVerify($user)
    {
        if (empty($this->name)){
            $this->errors[] = 'Debe ponerle nombre al producto';
        }
        if (empty($this->price)){
            $this->errors[] = 'Debe ingresar un precio';
        } elseif(!is_numeric($this->price)){
            $this->errors[]  = 'El precio ingresado no es un numero';
        }
        if (empty($this->stock)){
            $this->errors[] = 'Debe indicar stock';
        }
        if (empty($this->category)){
            $this->errors[] = 'Debe seleccionar una categoria';
        }
        if (empty($this->state)){
            $this->errors[] = 'Por favor indique si el producto es usado o nuevo';
        }
        if (empty($this->description)){
            $this->errors[] = 'Debe ingresar una descripcion del producto';
        }
        if (!empty($this->errors)){
            return false;
        }

        $this->addProduct();
        return true;
    }

}
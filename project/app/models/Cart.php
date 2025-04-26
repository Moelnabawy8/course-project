<?php
include_once __DIR__ . '/../database/config.php';
include_once __DIR__ . '/../database/operations.php';
class Cart extends config implements operations
{

    private $user_id;
    private $product_id;

    
    public function getUser_id()
    {
        return $this->user_id;
    }


    public function setUser_id($user_id)
    {
        $this->user_id = $user_id;

        return $this;
    }


    public function getProduct_id()
    {
        return $this->product_id;
    }


    public function setProduct_id($product_id)
    {
        $this->product_id = $product_id;

        return $this;
    }

    
    public function create()
    {
        // Implementation for creating a user
    }

    public function read()
    {
        // Implementation for reading a user
    }

    public function update()
    {
        // Implementation for updating a user
    }

    public function delete()
    {
        // Implementation for deleting a user
    }
}

<?php 

include_once __DIR__ . '/../database/config.php';
include_once __DIR__ . '/../database/operations.php';
class Review extends config implements operations
{
    private $product_id;
    private $user_id;
    private $value;
    private $comment;
    private $created_at;
    private $updated_at;
   



   


    public function getCreated_at()
    {
        return $this->created_at;
    }


    public function setCreated_at($created_at)
    {
        $this->created_at = $created_at;

        return $this;
    }


    public function getUpdated_at()
    {
        return $this->updated_at;
    }


    public function setUpdated_at($updated_at)
    {
        $this->updated_at = $updated_at;

        return $this;
    }


   
  

    /**
     * Get the value of product_id
     */ 
    public function getProduct_id()
    {
        return $this->product_id;
    }

    /**
     * Set the value of product_id
     *
     * @return  self
     */ 
    public function setProduct_id($product_id)
    {
        $this->product_id = $product_id;

        return $this;
    }

    /**
     * Get the value of user_id
     */ 
    public function getUser_id()
    {
        return $this->user_id;
    }

    /**
     * Set the value of user_id
     *
     * @return  self
     */ 
    public function setUser_id($user_id)
    {
        $this->user_id = $user_id;

        return $this;
    }

    /**
     * Get the value of value
     */ 
    public function getValue()
    {
        return $this->value;
    }

    /**
     * Set the value of value
     *
     * @return  self
     */ 
    public function setValue($value)
    {
        $this->value = $value;

        return $this;
    }

    /**
     * Get the value of comment
     */ 
    public function getComment()
    {
        return $this->comment;
    }

    /**
     * Set the value of comment
     *
     * @return  self
     */ 
    public function setComment($comment)
    {
        $this->comment = $comment;

        return $this;
    }
    public function create()
    {
        // Implementation for creating a category
    }

    public function read()
{
    $query = "SELECT reviews.*, users.first_name, users.last_name 
              FROM reviews 
              JOIN users ON users.id = reviews.user_id 
              WHERE product_id = '$this->product_id'";
    return $this->runDQL($query);
}

    public function update()
    {
        // Implementation for updating a category
    }

    public function delete()
    {
        // Implementation for deleting a category
    }
}



?>
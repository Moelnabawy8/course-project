<?php
include_once __DIR__ . '/../database/config.php';
include_once __DIR__ . '/../database/operations.php';
class Subcategory extends config implements operations
{
    private $id;
    private $name_en;
    private $name_ar;
    private $status;
    private $category_id;
    private $created_at;
    private $updated_at;
    private $image;



    public function getId()
    {
        return $this->id;
    }


    public function setId($id)
    {
        $this->id = $id;

        return $this;
    }


    public function getName_en()
    {
        return $this->name_en;
    }


    public function setName_en($name_en)
    {
        $this->name_en = $name_en;

        return $this;
    }


    public function getName_ar()
    {
        return $this->name_ar;
    }


    public function setName_ar($name_ar)
    {
        $this->name_ar = $name_ar;

        return $this;
    }


    public function getStatus()
    {
        return $this->status;
    }


    public function setStatus($status)
    {
        $this->status = $status;

        return $this;
    }


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


    public function getImage()
    {
        return $this->image;
    }


    public function setImage($image)
    {
        $this->image = $image;

        return $this;
    }
    /**
     * Get the value of category_id
     */ 
    public function getCategory_id()
    {
        return $this->category_id;
    }

    /**
     * Set the value of category_id
     *
     * @return  self
     */ 
    public function setCategory_id($category_id)
    {
        $this->category_id = $category_id;

        return $this;
    }
    public function create()
    {
        // Implementation for creating a category
    }

    public function read()
    {
        // Implementation for reading a category
        $query = "SELECT `id` , `name_en`,`category_id` FROM subcategories WHERE status = 1 order by name_en asc";
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

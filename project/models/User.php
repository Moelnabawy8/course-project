<?php
include_once __DIR__ . '/../database/config.php';
include_once __DIR__ . '/../database/operations.php';

class User extends config implements operations
{
    private $id;
    private $first_name;
    private $last_name;
    private $email;
    private $password;
    private $phone;
    private $gender;
    private $email_verified_at;
    private $created_at;
    private $updated_at;
    private $image;
    private $code;
    private $status;


    public function getId()
    {
        return $this->id;
    }


    public function setId($id)
    {
        $this->id = $id;

        return $this;
    }


    public function getFirst_name()
    {
        return $this->first_name;
    }


    public function setFirst_name($first_name)
    {
        $this->first_name = $first_name;

        return $this;
    }


    public function getLast_name()
    {
        return $this->last_name;
    }


    public function setLast_name($last_name)
    {
        $this->last_name = $last_name;

        return $this;
    }


    public function getEmail()
    {
        return $this->email;
    }


    public function setEmail($email)
    {
        $this->email = $email;

        return $this;
    }


    public function getPassword()
    {
        return $this->password;
    }


    public function setPassword($password)
    {
        $this->password = $password;

        return $this;
    }


    public function getPhone()
    {
        return $this->phone;
    }


    public function setPhone($phone)
    {
        $this->phone = $phone;

        return $this;
    }


    public function getGender()
    {
        return $this->gender;
    }


    public function setGender($gender)
    {
        $this->gender = $gender;

        return $this;
    }


    public function getEmail_verified_at()
    {
        return $this->email_verified_at;
    }


    public function setEmail_verified_at($email_verified_at)
    {
        $this->email_verified_at = $email_verified_at;

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


    public function getCode()
    {
        return $this->code;
    }


    public function setCode($code)
    {
        $this->code = $code;

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

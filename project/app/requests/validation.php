<?php
include_once __DIR__ . '/../database/config.php';
class validation
{
    private $name;
    private $value;
    public function __construct($name, $value)
    {
        $this->name = $name;
        $this->value = $value;
    }

    
    public function required()
    {
        if (empty($this->value)) {
            return $this->name . " is required";
        } else {
            return "";
        }
    }

    public function regx($regx)
    {
        if (!preg_match($regx, $this->value)) {
            return $this->name . " is invalid";
        } else {
            return "";
        }
    }

    public function unique($table)
    {
        // check if the email is unique in the database
        // if not return error message
        // else return empty string
        $query = "SELECT * FROM $table WHERE $this->name = '$this->value'";
        $config = new config();
        $result = $config->runDQL($query);
        return (empty($result)) ? "" : $this->name . " already exists in the database";
    }


    public function confirmed($valueconfirmed)
    {
        if ($this->value != $valueconfirmed) {
            return $this->name . " does not match";
        } else {
            return "";
        }
    }
}

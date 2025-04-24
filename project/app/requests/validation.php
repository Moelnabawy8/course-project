<?php
// استدعاء ملف الاتصال بقاعدة البيانات
include_once __DIR__ . "/../database/config.php";

class Validation
{
    private $name;   // اسم الحقل (مثلاً: email, phone)
    private $value;  // القيمة المُدخلة من المستخدم

    // كونستراكتور بياخد اسم الحقل والقيمة الخاصة به
    public function __construct($name, $value)
    {
        $this->name = $name;
        $this->value = $value;
    }

    // التحقق إن الحقل مش فاضي
    public function required() {
        if (empty($this->value)) {
            return "{$this->name} is required";
        }
        return "";
    }

    // التحقق من صحة القيمة باستخدام Regular Expression
    public function regex($regex): string
    {
        return preg_match($regex, $this->value) ? "" : "$this->name is not valid";
    }

    // التحقق من إن القيمة مش موجودة بالفعل في قاعدة البيانات (فريدة)
    public function unique($table): string
    {
        $query = "SELECT * FROM `$table` WHERE `$this->name` = '$this->value'";
        $config = new Config(); // إنشاء اتصال بقاعدة البيانات
        $result = $config->runDQL($query);
        return empty($result) ? "" : "$this->name already exists in the database";
    }

    // التحقق من تأكيد القيمة (زي تأكيد الباسورد)
    public function confirmed($inputValueConfirmed): string
    {
        return $this->value != $inputValueConfirmed ? "$this->name does not match" : "";
    }
}

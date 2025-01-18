<?php

namespace App\Models;

class CustomerModel extends AbstractModel
{
    public $customerId;
    public $name;
    public $email;
    public $phone;
    public $city;
    public $zipCode;
    public $password;
    public $registrationDate;
    public $address;

    protected static $tableName = "customer";
    protected static $tableSchema = array (
        'name'      => self::DATA_TYPE_STR,
        'email'     => self::DATA_TYPE_STR,
        'phone'     => self::DATA_TYPE_STR,
        'city'      => self::DATA_TYPE_STR,
        'zipCode'   => self::DATA_TYPE_STR,
        'password'  => self::DATA_TYPE_STR,
        'address'   => self::DATA_TYPE_STR,
    );
    protected static $primaryKey = 'customerId';

//    public function __construct(public $name, public $email, public $address, public $phone) {
//    }

    public function __get($property) {
        return $this->$property;
    }

    public function setName($name) {
        $this->name = $name;
    }

}
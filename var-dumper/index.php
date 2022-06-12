<?php


require_once __DIR__.'/vendor/autoload.php';

class UserService  {

    private $name;

    public function __construct($name)
    {
        $this->name = $name;
    }

    public function getName() {
        return $this->name;
    }
}

$obj = new UserService("测试");

$arr = [11,22,33,44];

$map = [
    'name'  =>  'json',
    'age'   =>  32,
    'status'=>true,
];

dump($obj);

dd($obj,$arr,$map);

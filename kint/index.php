<?php
require_once __DIR__.'/vendor/autoload.php';
Kint::$expanded = true;
Kint\Renderer\RichRenderer::$theme = 'aante-light.css';

class UserService {
    
    private $repository;

    public function __construct() {
    }
    
    
    public function getUserById($userId) {
    }
    
    public function getUserByName($username) {
    }
    
    public function getUserByAge($age) {
    }
    
    public function getUserList() {
    }
    
    public function getUserByWhere() {
    }
}

Kint::$aliases[] = 'dump';
 
function dump(...$vars)
{
    return Kint::dump(...$vars);
}

$service = new UserService;
$arr = [11,22,33,'44',[11,22,33],'name'=>'json','age'=>null];

dump($service,$arr);



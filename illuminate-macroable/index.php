<?php 

// 挂载方法
require_once __DIR__.'/vendor/autoload.php';

use Illuminate\Support\Traits\Macroable;
 

class User {

    use Macroable;
    
    private $userId;
    private $userName;
    
    public function __construct($id,$username) {
        $this->userId = $id;
        $this->userName = $username;
    }
}

User::macro("getName",function() {
    return $this->userName;
});

$user = new User(1,'json');

print_r($user->getName());
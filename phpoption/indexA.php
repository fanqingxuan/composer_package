<?php 

require_once __DIR__.'/vendor/autoload.php';

class User {
    private $userId;
    
    public function __construct($id) {
        $this->userId = $id;
    }
    
    public function getUserId() {
        return $this->userId;
    }
}

class UserRepository {

    public function findUser($id) {
        if($id == 1) {
            return \PhpOption\Option::fromValue(new User(1));
        }
        return \PhpOption\Option::fromValue(null);
    }
}

$repository = new UserRepository;

print_r($repository->findUser(1)->getOrElse(new User("1 else")));
print_r($repository->findUser(3)->getOrElse(new User("3 else")));

$entity = $repository->findUser(1)->getOrCall(function(){
    return new User("1 else");
});
print_r($entity);
$entity = $repository->findUser(44)->getOrCall(function(){
    return new User("44 else");
});
print_r($entity);


<?php 

require_once __DIR__.'/vendor/autoload.php';

class User {
    private $userId;
    private $username;
    
    public function __construct($id) {
        $this->userId = $id;
    }
}

class UserRepository {

    public function findUser($id) {
        if($id == 1) {
            return new \PhpOption\Some(new User($id));
        }
        return \PhpOption\None::create();
    }
    
    public function findUserA($id) {
        if($id == 1) {
            return \PhpOption\Option::fromValue(new User($id));
        }
        return \PhpOption\Option::fromValue(null);
    }
}

$repository = new UserRepository;

print_r($repository->findUser(1));
print_r($repository->findUser(3));

print_r($repository->findUserA(1));
print_r($repository->findUserA(3));
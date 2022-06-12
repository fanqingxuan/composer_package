<?php

require_once __DIR__.'/vendor/autoload.php';

use Dotenv\Repository\Adapter\PutenvAdapter;
use Dotenv\Repository\RepositoryBuilder;
use PhpOption\Option;
use Dotenv\Dotenv;


$dotenv = Dotenv::createMutable(__DIR__);
$dotenv->load();

var_dump(env('DEBUG',true));
var_dump(env('DEBUG_MODE',true));

    
function env($key, $default = null)
{
    $builder = RepositoryBuilder::createWithDefaultAdapters();
    $builder = $builder->addAdapter(PutenvAdapter::class);
    $repository = $builder->immutable()->make();
    return Option::fromValue($repository->get($key))
        ->map(function ($value) {
            switch (strtolower($value)) {
                case 'true':
                case '(true)':
                    return true;
                case 'false':
                case '(false)':
                    return false;
                case 'empty':
                case '(empty)':
                    return '';
                case 'null':
                case '(null)':
                    return;
            }

            if (preg_match('/\A([\'"])(.*)\1\z/', $value, $matches)) {
                return $matches[2];
            }

            return $value;
        })
        ->getOrCall(function () use ($default) {
            return $default;
        });
}
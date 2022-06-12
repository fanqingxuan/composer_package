<?php

require_once __DIR__.'/vendor/autoload.php';

use Doctrine\Inflector\Inflector;
use Doctrine\Inflector\NoopWordInflector;

$inflector = new Inflector(new NoopWordInflector(), new NoopWordInflector());

// Converts ``ModelName`` to ``model_name``:
var_dump($inflector->tableize('SysUser'));

// Converts ``model_name`` to ``ModelName``:
var_dump($inflector->classify('lgt_good_price'));

// Converts ``model_name`` to ``modelName``:
var_dump($inflector->camelize('lgt_good_price'));

/**
Takes a string and capitalizes all of the words, like PHP's built-in
``ucwords`` function. This extends that behavior, however, by allowing the
word delimiters to be configured, rather than only separating on
whitespace.
*/
$string = 'top-o-the-morning to all_of_you!';
echo $inflector->capitalize($string); // Top-O-The-Morning To All_of_you!
echo $inflector->capitalize($string, '-_ '); // Top-O-The-Morning To All_Of_You!
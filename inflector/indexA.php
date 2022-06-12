<?php

require_once __DIR__.'/vendor/autoload.php';

use Doctrine\Inflector\InflectorFactory;
use Doctrine\Inflector\Rules\Pattern;
use Doctrine\Inflector\Rules\Patterns;
use Doctrine\Inflector\Rules\Ruleset;
use Doctrine\Inflector\Rules\Substitution;
use Doctrine\Inflector\Rules\Substitutions;
use Doctrine\Inflector\Rules\Transformation;
use Doctrine\Inflector\Rules\Transformations;
use Doctrine\Inflector\Rules\Word;

$inflector = InflectorFactory::create()
    ->withSingularRules(
        new Ruleset(
            new Transformations(
                new Transformation(new Pattern('/^(bil)er$/i'), '\1'),
                new Transformation(new Pattern('/^(inflec|contribu)tors$/i'), '\1ta')
            ),
            new Patterns(new Pattern('singulars')),
            new Substitutions(new Substitution(new Word('spins'), new Word('spinor')))
        )
    )
    ->withPluralRules(
        new Ruleset(
            new Transformations(
                new Transformation(new Pattern('^(bil)er$'), '\1'),
                new Transformation(new Pattern('^(inflec|contribu)tors$'), '\1ta')
            ),
            new Patterns(new Pattern('noflect'), new Pattern('abtuse')),
            new Substitutions(
                new Substitution(new Word('amaze'), new Word('amazable')),
                new Substitution(new Word('phone'), new Word('phonezes'))
            )
        )
    )
    ->build();
//Returns a word in plural form
var_dump($inflector->pluralize('user'));
var_dump($inflector->pluralize('mouse'));

//Returns a word in singular form.
var_dump($inflector->singularize('users'));

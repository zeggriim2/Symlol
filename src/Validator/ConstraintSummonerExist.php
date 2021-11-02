<?php

namespace App\Validator;

use Symfony\Component\Validator\Constraint;

class ConstraintSummonerExist extends Constraint
{
    public $message = "Test d'un message";
    public $toto = 'strict'; 

    public function __construct($options = null, array $groups = null, $payload = null)
    {
        parent::__construct($options ?? [], $groups, $payload);
    }

    public function validatedBy()
    {
        return static::class."Validator";
    }
}
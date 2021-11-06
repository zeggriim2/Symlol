<?php

namespace App\Validator;

use Symfony\Component\Validator\Constraint;

/**
 * @Annotation
 */
class ConstraintSummonerExist extends Constraint
{
    public string $message = "Ce Summoner {{ nameSummoner }} n'existe pas sur cette platform {{ platform }}";
    public string $toto = 'strict';

    public function __construct($options = null, array $groups = null, $payload = null)
    {
        parent::__construct($options ?? [], $groups, $payload);
    }
}

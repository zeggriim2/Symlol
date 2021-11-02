<?php

namespace App\Validator;

use App\Service\API\LOL\SummonerApi;
use Symfony\Component\Validator\Constraint;
use Symfony\Component\HttpFoundation\RequestStack;
use Symfony\Component\Validator\ConstraintValidator;
use Symfony\Component\Validator\Exception\UnexpectedTypeException;
use Symfony\Component\Validator\Exception\UnexpectedValueException;

class ConstraintSummonerExistValidator extends ConstraintValidator
{
    private $summonerApi;
    private $requestStack;

    public function validate($value, Constraint $constraint)
    {

        if (!$constraint instanceof ConstraintSummonerExist) {
            throw new UnexpectedTypeException($constraint, ContainsAlphanumeric::class);
        }
        $platform = $this->requestStack->getMainRequest()->request->all()['registration_form']['platform'];
        if (is_null($this->SummonerExiste($value, $platform))){
            throw new UnexpectedValueException('test', 'string');
        }
    }


    private function SummonerExiste($value, $platform)
    {
            $return = $this->summonerApi->getSummonerBySummonerName($platform, $value);
        dd($return);
    }

    public function __construct(
        SummonerApi $summonerApi, 
        RequestStack $requestStack
    )
    {
        $this->summonerApi = $summonerApi;
        $this->requestStack = $requestStack;
    }
}
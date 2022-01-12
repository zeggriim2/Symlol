<?php

namespace App\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\HttpFoundation\RequestStack;
use Symfony\Component\OptionsResolver\OptionsResolver;

class LevelChampionType extends AbstractType
{
    /** CONSTANTE **/
    private const LEVEL_MIN = 1;
    private const LEVEL_MAX = 18;
    /** CONSTANTE **/
    /**
     * @var RequestStack
     */
    private $requestStack;


    /**
     * LevelChampionType constructor.
     */
    public function __construct(RequestStack $requestStack)
    {
        $this->requestStack = $requestStack;
    }

    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('level', ChoiceType::class, [
                    'choices'  => $this->generateArrayLevel(),
                    "data" => $this->requestStack->getSession()->get('StatChampionlevel')
            ])
        ;
    }

    private function generateArrayLevel(): array
    {
        return array_combine(range(self::LEVEL_MIN, self::LEVEL_MAX), range(self::LEVEL_MIN, self::LEVEL_MAX));
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            // Configure your form options here
        ]);
    }
}

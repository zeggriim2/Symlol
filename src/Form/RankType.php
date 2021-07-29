<?php

namespace App\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\HttpFoundation\RequestStack;
use Symfony\Component\OptionsResolver\OptionsResolver;

class RankType extends AbstractType
{
    /**
     * @var RequestStack
     */
    private $requestStack;

    /**
     * RankType constructor.
     */
    public function __construct(RequestStack $requestStack)
    {
        $this->requestStack = $requestStack;
    }

    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('league', ChoiceType::class, [
                'label' => 'Ligues',
                'choices' => [
                    'Challenger' => "challenger",
                    'Grand Master' => "grandmaster",
                    'Master' => "master",
                ],
                "data" => "RANKED_SOLO_5x5"
            ])
            ->add('queue', ChoiceType::class, [
                'choices' => [
                    'Ranked Solo' => "RANKED_SOLO_5x5",
                    'Ranked Flex' => "RANKED_FLEX_SR",
                ],
                "data" => "RANKED_SOLO_5x5"
            ])
            ->add('platform', ChoiceType::class, [
                'label' => 'Regions',
                'choices' => [
                    'BR1' => "BR1",
                    'EUN1' => "EUN1",
                    'EUW1' => "EUW1",
                    'KR' => "KR",
                    'LA1' => "LA1",
                    'LA2' => "LA2",
                    'NA1' => "NA1",
                    'OC1' => "OC1",
                    'RU' => "RU",
                ],
                "data" => $this->requestStack->getSession()->get('platform') ?: 'EUW1'
            ])
            ->add('Valider', SubmitType::class);
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            // Configure your form options here
        ]);
    }
}

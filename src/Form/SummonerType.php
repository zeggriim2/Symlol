<?php

namespace App\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\ButtonType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class SummonerType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('name', TextType::class)
            ->add('platform', ChoiceType::class,[
                    'choices'  => [
                        'EUW1' => "EUW1",
                        'BR1' => "BR1",
                        'EUN1' => "EUN1",
                        'KR' => "KR",
                        'LA1' => "LA1",
                        'LA2' => "LA2",
                        'NA1' => "NA1",
                        'OC1' => "OC1",
                        'RU' => "RU",
                    ]
            ])
            ->add('Valider', SubmitType::class)
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            // Configure your form options here
        ]);
    }
}

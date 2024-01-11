<?php

namespace App\Form;

use App\Entity\Attaque;
use App\Entity\Dresseur;
use App\Entity\PokemonMer;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class PokemonMerType extends PokemonType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        parent::buildForm($builder,$options); //appele la methode build form de la classe mer
        $builder
          
            ->add('nbNageoires')
           
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => PokemonMer::class,
        ]);
    }
}

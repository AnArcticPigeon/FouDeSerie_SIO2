<?php

namespace App\Form;

use App\Entity\Attaque;
use App\Entity\Dresseur;
use App\Entity\PokemonCasanier;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class PokemonCasanierType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('nom')
            ->add('poids')
            ->add('taille')
            ->add('nbPattes')
            ->add('nbHeuresTv')
            ->add('lesAttaques', EntityType::class, [
                'class' => Attaque::class,
                'choice_label' => 'nom',
                'multiple' => true,
                'expanded'=>true
            ])
            ->add(
                'leDresseur',
                EntityType::class,
                array(
                'class' => Dresseur::class,
                'choice_label' => 'nom', // libelle est la propriété de l'entité Genre que l'on veut afficher
                'multiple' => false, // permet la sélection multiple
                'expanded' => true //permet de faire des cases a cocher
                ));
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => PokemonCasanier::class,
        ]);
    }
}

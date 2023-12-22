<?php

namespace App\Form;

use App\Entity\Genre;
use App\Entity\Pays;
use App\Entity\WebSerie;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class SerieWebType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('titre')
            ->add('resume')
            ->add('premiereDiffusion')
            ->add('nbEpisodes')
            ->add('image')
            ->add('site')
            ->add(
                'lePays',
                EntityType::class,
                array(
                'class' => Pays::class,
                'choice_label' => 'nom', // libelle est la propriété de l'entité Genre que l'on veut afficher
                'expanded' => true
                ))
            ->add(
                'lesGenres',
                EntityType::class,
                array(
                'class' => Genre::class,
                'choice_label' => 'libelle', // libelle est la propriété de l'entité Genre que l'on veut afficher
                'multiple' => true, // permet la sélection multiple
                'expanded' => true //permet de faire des cases a cocher
                ));
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => WebSerie::class,
        ]);
    }
}

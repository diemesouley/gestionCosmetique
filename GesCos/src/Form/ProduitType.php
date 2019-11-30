<?php

namespace App\Form;

use App\Entity\Categorie;
use App\Entity\Produit;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\DateType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class ProduitType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('libelleProduit', TextType::class, array(
                'attr' => array('class' => 'form-control'),
            ))
            ->add('description', TextType::class, array(
                'attr' => array('class' => 'form-control'),
            ))
            ->add('type_ou_taille', TextType::class, array(
                'attr' => array('class' => 'form-control'),
            ))
            ->add('prixUnitaire', TextType::class, array(
                'attr' => array('class' => 'form-control'),
            ))
            ->add('quantite', TextType::class, array(
                'attr' => array('class' => 'form-control'),
            ))
            ->add('dateAjout', DateType::class, [
                'widget' => 'single_text'
            ])
            
            ->add('id_categorie', EntityType::class,
            array('class'=> Categorie::class,'choice_label'=>'libelle'))
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Produit::class,
        ]);
    }
}

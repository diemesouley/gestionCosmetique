<?php

namespace App\Form;

use App\Entity\Client;
use App\Entity\Produit;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class LigneCommandeType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
        ->add('id_produit', EntityType::class,
        array('class'=> Produit::class,'choice_label'=>'libelle'))
    
        ->add('quantite')
        ->add('prixUnitaire')
        ->add('id_client', EntityType::class,
        array('class'=> Client::class,'choice_label'=>'prenomClient'))
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            // Configure your form options here
        ]);
    }
}

<?php

namespace App\Form;

use App\Entity\Client;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class ClientType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('nomClient', TextType::class, array(
                'attr' => array('class' => 'form-control'),
            ))
            
            ->add('prenomClient', TextType::class, array(
                'attr' => array('class' => 'form-control'),
            ))
            ->add('telephoneClient', TextType::class, array(
                'attr' => array('class' => 'form-control'),
            ))
            ->add('sommeVerce', TextType::class, array(
                'attr' => array('class' => 'form-control'),
            ))
            ->add('dette', TextType::class, array(
                'attr' => array('class' => 'form-control'),
            ))
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Client::class,
        ]);
    }
}

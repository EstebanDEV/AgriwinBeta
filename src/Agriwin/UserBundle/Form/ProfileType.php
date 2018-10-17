<?php

namespace Agriwin\UserBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;

class ProfileType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('name', null, array(
                'label' => 'form.name', 
                'translation_domain' => 'FOSUserBundle',
            ))
            ->add('firstname', null, array(
                'label' => 'form.firstname', 
                'translation_domain' => 'FOSUserBundle',
            ))
            ->add('mobile', null, array(
                'label' => 'form.mobile', 
                'translation_domain' => 'FOSUserBundle',
            ))
            ->add('pays', null, array(
                'label' => 'form.pays', 
                'translation_domain' => 'FOSUserBundle',
            ))
            ->add('ville', null, array(
                'label' => 'form.ville', 
                'translation_domain' => 'FOSUserBundle',
            ))
            ->add('postal', null, array(
                'label' => 'form.postal', 
                'translation_domain' => 'FOSUserBundle',
            ))
            ->add('adresse', null, array(
                'label' => 'form.adresse', 
                'translation_domain' => 'FOSUserBundle',
            ))
        ; 
    }

    public function getParent()
    {
        return 'FOS\UserBundle\Form\Type\ProfileFormType';
    }

    public function getBlockPrefix()
    {
        return 'agriwin_user_profile';
    }
}
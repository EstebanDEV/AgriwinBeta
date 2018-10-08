<?php

namespace Agriwin\UserBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;

class RegistrationType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('name', null, array(
                'label' => 'form.name', 
                'translation_domain' => 'FOSUserBundle',
            ))
            ->add('surname', null, array(
                'label' => 'form.surname', 
                'translation_domain' => 'FOSUserBundle',
            ))
        ; 
    }

    public function getParent()
    {
        return 'FOS\UserBundle\Form\Type\RegistrationFormType';
    }

    public function getBlockPrefix()
    {
        return 'agriwin_user_registration';
    }
}
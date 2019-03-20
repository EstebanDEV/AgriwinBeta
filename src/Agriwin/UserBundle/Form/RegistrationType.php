<?php

namespace Agriwin\UserBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Captcha\Bundle\CaptchaBundle\Form\Type\CaptchaType;

class RegistrationType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('cible', null, array(
                'label' => 'form.cible', 
                'translation_domain' => 'FOSUserBundle',
            ))
            ->add('captchaCode', CaptchaType::class, array(
                'captchaConfig' => 'RegisterCaptcha',
                'label' => 'form.captcha',
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
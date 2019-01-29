<?php

namespace Agriwin\UserBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Captcha\Bundle\CaptchaBundle\Form\Type\CaptchaType;

class ResettingType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder->add('captchaCode', CaptchaType::class, array(
            'captchaConfig' => 'RegisterCaptcha',
            'label' => 'form.captcha',
        ));
    }

    public function getParent()
    {
        return 'FOS\UserBundle\Form\Type\ResettingFormType';
    }

    public function getBlockPrefix()
    {
        return 'agriwin_user_resetting';
    }
}

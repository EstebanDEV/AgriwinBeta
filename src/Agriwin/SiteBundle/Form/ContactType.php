<?php

namespace Agriwin\SiteBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\Extension\Core\Type\EmailType;
use Symfony\Component\Validator\Constraints\Email;
use Symfony\Component\Validator\Constraints\NotBlank;

class ContactType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('name', TextType::class, array(
                'constraints' => array(
                    new NotBlank(array('message' => 'Merci d\'insérer votre nom')),
                )
            ))
            ->add('subject', TextType::class, array(
                'constraints' => array(
                    new NotBlank(array('message' => 'Merci d\'indiquer un sujet')),
                )
            ))
            ->add('email', EmailType::class, array(
                'constraints' => array(
                    new NotBlank(array('message' => 'Merci d\'entrer une adresse e-mail valide')),
                    new Email(array('message' => 'Votre adresse e-mail ne semble pas être valide')),
                )
            ))
            ->add('message', TextareaType::class, array(
                'constraints' => array(
                    new NotBlank(array('message' => 'Merci d\'écrire un message')),
                )
            ))
            ->add('society', TextType::class, array(
                'required' => false,
            ))
            ->add('mobile', TextType::class, array(
                'required' => false,
            ))
        ;
    }

    public function setDefaultOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(array(
            'error_bubbling' => true
        ));
    }

    public function getName()
    {
        return 'contact_form';
    }
}
<?php

namespace App\Form;

use App\Entity\Contact;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\TelType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\EmailType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;

class ContactType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('firstname', TextType::class, [
                "label" => "Prenom",
                "required" => false
            ])
            ->add('LastName', TextType::class, [
                "label" => "Nom",
                "required" => false

            ])
            ->add('email', EmailType::class, [
                "label" => "Email",
                "required" => false
            ])
            ->add('message', TextareaType::class, [
                "label" => "Message",
                "required" => false

            ])
            ->add('phone', TelType::class, [
                "label" => "Tel",
                "required" => false
            ]);
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Contact::class,
        ]);
    }
}

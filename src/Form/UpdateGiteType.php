<?php

namespace App\Form;

use App\Entity\Gite;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;

class UpdateGiteType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {


        $builder
            ->add('name', TextType::class, [
                "label" => "Nom",
                "required" => false
            ])
            ->add('description', TextareaType::class, [
                "label" => "Description",
                "required" => false
            ])
            ->add('surface', TextType::class, [
                "label" => "Surface",
                "required" => false
            ])
            ->add('bedroom', TextType::class, [
                "label" => "Chambre",
                "required" => false
            ])
            ->add('address', TextType::class, [
                "label" => "Adresse",
                "required" => false
            ])
            ->add('city', TextType::class, [
                "label" => "Ville",
                "required" => false
            ])
            ->add('postal_code', TextType::class, [
                "label" => "Code Postal",
                "required" => false
            ])
            ->add('animals');
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Gite::class,
        ]);
    }
}

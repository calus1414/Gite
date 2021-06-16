<?php

namespace App\Form;

use App\Entity\Gite;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;

class GiteType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('name', TextType::class, [
                "required" => false,
                "label" => "Nom",
                "attr" => [

                    "placeholder" => "Nom du Gite"
                ]
            ])
            ->add('description', TextareaType::class, [
                "required" => false,
                "label" => "Description",
                "attr" => [

                    "placeholder" => "Description du Gite"
                ]
            ])
            ->add('surface', TextType::class, [
                "required" => false,
                "label" => "Surface",
                "attr" => [

                    "placeholder" => "0"
                ]
            ])
            ->add('bedroom', TextType::class, [
                "required" => false,
                "label" => "Nombre de Chambres",
                "attr" => [

                    "placeholder" => "1"
                ]
            ])
            ->add('address', TextType::class, [
                "required" => false,
                "label" => "Adresse",
                "attr" => [

                    "placeholder" => "Adresse du Gite"
                ]
            ])
            ->add('city', TextType::class, [
                "required" => false,
                "label" => "Ville",
                "attr" => [

                    "placeholder" => "Nom de la ville du Gite"
                ]
            ])
            ->add('postal_code', TextType::class, [
                "required" => false,
                "label" => "Code Postal",
                "attr" => [

                    "placeholder" => "Code postal du Gite"
                ]
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

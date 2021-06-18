<?php

namespace App\Form;

use App\Entity\Gite;
use App\Entity\Equipement;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\TextType;

class SearchGiteType extends AbstractType
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

            ->add('surface', TextType::class, [
                "required" => false,
                "label" => "Surface",
                "attr" => [

                    "placeholder" => "0"
                ]
            ])
            ->add('bedroom', TextType::class, [
                "required" => false,
                "label" => "Chambres",
                "attr" => [

                    "placeholder" => "1"
                ]
            ])

            ->add('city', TextType::class, [
                "required" => false,
                "label" => "Ville",

            ])

            ->add('animals')
            ->add('equipements', EntityType::class, [
                "class" => Equipement::class,
                "choice_label" => "name",
                "multiple" => true
            ]);;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Gite::class,
        ]);
    }
}

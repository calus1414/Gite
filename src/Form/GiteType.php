<?php

namespace App\Form;

use App\Entity\Gite;
use App\Entity\Services;
use App\Entity\Equipement;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\FileType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\HiddenType;
use Symfony\Component\Form\Extension\Core\Type\IntegerType;
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
            ->add('surface', IntegerType::class, [
                "required" => false,
                "label" => "Surface",
                "attr" => [

                    "placeholder" => "0"
                ]
            ])
            ->add('bedroom', IntegerType::class, [
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
            ->add('animals')

            ->add('equipements', EntityType::class, [
                "class" => Equipement::class,
                "choice_label" => "name",
                "multiple" => true,
                "expanded" => true
            ])
            ->add('services', EntityType::class, [
                "class" => Services::class,
                "choice_label" => "name",
                "multiple" => true,
                "expanded" => true
            ])
            ->add('imageName', FileType::class, [

                "label" => "Ajouter une image"

            ])
            ->add('lat', HiddenType::class)
            ->add('lng', HiddenType::class);
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Gite::class,
        ]);
    }
}

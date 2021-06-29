<?php

namespace App\Form;

use App\Entity\Services;
use App\Entity\Equipement;
use App\Entity\PropertySearch;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\IntegerType;
use Symfony\Component\Form\Extension\Core\Type\CheckboxType;

class PropertySearchType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('minSurface', IntegerType::class, [
                "required" => false,
                'label' => "Surface minimum"

            ])
            ->add('minBedroom', IntegerType::class, [
                "required" => false,
                'label' => "nombre de chambre"

            ])
            ->add('city', TextType::class, [
                "required" => false,
                'label' => "Ville"



            ])
            ->add('animals', CheckboxType::class, [
                "required" => false,
                'label' => "Animaux"


            ])
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
            ]);
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => PropertySearch::class,
            "method" => 'get',
            "csrf_protection" => false
        ]);
    }


    /**
     * {@inheritdoc}
     */
    public function getBlockPrefix()
    {
        return  '';
    }
}

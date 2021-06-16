<?php

namespace App\Form;

use App\Entity\Gite;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class UpdateGiteType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('name', null, [
                "label" => "Nom",
                "required" => false
            ])
            ->add('description', null, [
                "label" => "Description",
                "required" => false
            ])
            ->add('surface', null, [
                "label" => "Surface",
                "required" => false
            ])
            ->add('bedroom', null, [
                "label" => "Chambre",
                "required" => false
            ])
            ->add('address', null, [
                "label" => "Adresse",
                "required" => false
            ])
            ->add('city', null, [
                "label" => "Ville",
                "required" => false
            ])
            ->add('postal_code', null, [
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

<?php

namespace App\Form;

use App\Entity\Prestation;
use App\Entity\RendezVous;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\DateTimeType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class RendezVousType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('nom')
            ->add('email')
            ->add('telephone')
            ->add('dateSouhaitee', DateTimeType::class, [
                'widget' => 'single_text',
            ])
            ->add('message', TextareaType::class, [
                'required' => false,
            ])
            ->add('Prestation', EntityType::class, [
                'class' => Prestation::class,
                'choice_label' => 'nom',
            ])
;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => RendezVous::class,
        ]);
    }
}

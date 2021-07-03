<?php

namespace App\Form;

use App\Entity\Risque;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class RisqueType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('designation')
            ->add('Description')
           // ->add('Impact')
           ->add('Impact', ChoiceType::class, [
               'choices' => [
                   'Liste' => [
                       '1 (Faible)' => 'stock_yes',
                       '2 (Moyen)' => 'stock_no',
                       '3 (Fort)' => 'stock_no',
                       '4 (Majeur)' => 'stock_no',
                   ]]])
            ->add('frequence', ChoiceType::class, [
                'choices' => [
                    'Liste' => [
                        '1 (rare)' => 'stock_yes',
                        '2 (peu fréquent)' => 'stock_no',
                        '3 (frequent)' => 'stock_no',
                        '4 (tres frequent)' => 'stock_no',
                    ]]])
          //  ->add('Risque_intrinseque')
            ->add('DMR')
            ->add('EvaluationDMR', ChoiceType::class, [
                'choices' => [
                    'Liste' => [
                        'inexistant' => 'stock_yes',
                        'insuffisant' => 'stock_no',
                        'efficace' => 'stock_no',

                    ]]])
            ->add('RisqueResiduel')
            ->add('macroprocessus')
            ->add('processus')
            ->add('niveau1')
            ->add('niveau2')
            ->add('niveau3')
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Risque::class,
        ]);
    }
}

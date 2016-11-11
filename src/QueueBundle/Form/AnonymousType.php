<?php
/**
 * Created by PhpStorm.
 * User: peter.self
 * Date: 09/11/16
 */

namespace QueueBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;

class AnonymousType
    extends AbstractType
{

    /**
     * @param FormBuilderInterface $builder
     * @param array $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('service', ChoiceType::class, [
                'choices' => [
                    'housing' =>'Housing',
                    'benefits' => 'Benefits',
                    'councilTax' => 'Council Tax',
                    'flyTipping' => 'Fly-tipping',
                    'missedBin' => 'Missed Bin'
                ],
                'label' => 'Service',
                'expanded' => true,
                'multiple' => false,
                'mapped' => false,
                'required' => true
            ])
            ->add('Submit', SubmitType::class)
        ;
    }

}
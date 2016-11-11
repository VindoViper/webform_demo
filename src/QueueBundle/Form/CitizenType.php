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
use Symfony\Component\Form\Extension\Core\Type\TextType;

class CitizenType
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
                'choices' => [ //@todo inject choices as parameter
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
            ->add('title', ChoiceType::class, [
                'choices' => [
                    'mr' => 'Mr',
                    'mrs' => 'Mrs',
                    'miss' => 'Miss',
                    'doctor' => 'Doctor'
                ],
                'expanded' => false,
                'multiple' => false,
                'label' => 'Title',
                'required' => true
            ])
            ->add('firstName', TextType::class, [
                'label' => 'First Name',
                'required' => true
            ])
            ->add('lastName', TextType::class, [
                'label' => 'Last Name',
                'required' => true
            ])
            ->add('Submit', SubmitType::class)
        ;
    }

}
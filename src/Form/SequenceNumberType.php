<?php


namespace App\Form;


use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\NumberType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\FormBuilderInterface;

class SequenceNumberType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        for ($i = 1; $i <= 10; $i++) {
            $builder->add('testCase_' . $i, NumberType::class);
        }
        $builder->add('save', SubmitType::class);
    }
}
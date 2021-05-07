<?php


namespace App\Form;


use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\CheckboxType;
use Symfony\Component\Form\Extension\Core\Type\EmailType;
use Symfony\Component\Form\Extension\Core\Type\NumberType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\Validator\Constraints\NotBlank;
use Symfony\Component\Validator\Constraints\Range;

class IndexFormType extends AbstractType
{
    /**
     * {@inheritdoc}
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder->add('name', TextType::class, ['required' => true, 'constraints' => [new NotBlank()]])
            ->add('surname', TextType::class, ['required' => true, 'constraints' => [new NotBlank()]])
            ->add('age', NumberType::class, ['required' => true, 'constraints' => [new NotBlank(), new Range(['min' => 18, 'max' => 99])]])
            ->add('email', EmailType::class, ['required' => true, 'constraints' => [new NotBlank()]])
            ->add('agree', CheckboxType::class, ['required' => true]);
    }
}
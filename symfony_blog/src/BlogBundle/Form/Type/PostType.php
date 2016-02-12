<?php
namespace BlogBundle\Form\Type;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\DateType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;

class PostType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('title', TextType::class, array(
            	'required' => false
            ))
            ->add('content', TextType::class, array(
                'required' => false
            ))
            ->add('createdAt', DateType::class)
            ->add('save', SubmitType::class, array('label' => 'Envoyer'))
        ;
    }
}
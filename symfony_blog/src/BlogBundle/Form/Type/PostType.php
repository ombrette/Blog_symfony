<?php
namespace BlogBundle\Form\Type;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\Extension\Core\Type\DateType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;

class PostType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('title', TextType::class, array(
            	'required' => false
            ))
            ->add('content', TextareaType::class, array(
                'required' => false
            ))
            ->add('category', EntityType::class, array(
                'class' => 'BlogBundle:Category',
                'choice_label' => 'name'
            ))
            ->add('tags', EntityType::class, array(
                'class' => 'BlogBundle:Tag',
                'choice_label'  => 'name',
                'multiple'      => true,
                'required'      => false
            ))
            ->add('createdAt', DateType::class)
            ->add('save', SubmitType::class, array('label' => 'Envoyer'))
        ;
    }
}
<?php

namespace App\Form;

use App\Entity\Assessments;
use App\Entity\Courses;
use App\Entity\Levels;
use App\Entity\Languages;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\FileType;
use Symfony\Component\Form\Extension\Core\Type\IntegerType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class CoursesType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('title', TextType::class)
            ->add('image', FileType::class,array(
                "label" => "Image *",
                "attr" =>array("class" => "form-control"),
                "data_class" => null
            ))
            ->add('description', TextareaType::class)
            ->add('duration', TextType::class)
            ->add('level', EntityType::class, array(
                'class' => Levels::class
            ))
            ->add('language', EntityType::class, array(
                'class' => Languages::class
            ))
            ->add('assessments', EntityType::class, array(
                'class' => Assessments::class
            ))
            ->add('price', IntegerType::class)
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Courses::class,
        ]);
    }
}

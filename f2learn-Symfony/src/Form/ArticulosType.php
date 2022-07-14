<?php

namespace App\Form;

use App\Entity\Articulos;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\DateTimeType;
use Symfony\Component\Form\Extension\Core\Type\DateType;
use Symfony\Component\Form\Extension\Core\Type\FileType;
use Symfony\Component\Form\Extension\Core\Type\IntegerType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class ArticulosType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('nombre', TextType::class)
            ->add('precio', IntegerType::class)
            ->add('fechaCaducidad', DateType::class, array(
                'input'  => 'datetime',
                'widget' => 'single_text',
                'format' => 'yyyy-MM-dd',
                'empty_data' => date("d-m-Y",strtotime(date("d-m-Y")."+ 1 week"))
            ))
            ->add('imagen', FileType::class,array(
                'label' => 'Image *',
                'attr' =>array('class' => 'form-control'),
                'data_class' => null
            ))
            ->add('descripcion', TextareaType::class)
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Articulos::class
        ]);
    }
}

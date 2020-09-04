<?php

namespace App\Form;

use App\Entity\Renglon;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class RenglonType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('nombre',TextType::class,array(
                'label'=>'Nombre *',
                'attr'=>array('class'=>'form-control','placeholder'=>'Nombre'),
                'required'=>true
            ))
            ->add('nombreEn',TextType::class,array(
                'label'=>'Nombre Inglés *',
                'attr'=>array('class'=>'form-control','placeholder'=>'Nombre Inglés'),
                'required'=>true
            ))
            ->add('descripcion',TextareaType::class,array(
                'label'=>'Descripcion *',
                'attr'=>array('class'=>'form-control','placeholder'=>'Descripcion'),
                'required'=>true
            ))   
            ->add('descripcionEn',TextareaType::class,array(
                'label'=>'Descripcion Inglés *',
                'attr'=>array('class'=>'form-control','placeholder'=>'Descripcion Inglés'),
                'required'=>true
            ))  
            ->add('imagen',TextType::class,array(
                'label'=>'Imagen *',
                'attr'=>array('class'=>'form-control','placeholder'=>'Imagen'),
                'required'=>true
            ))                                        
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Renglon::class,
        ]);
    }
}

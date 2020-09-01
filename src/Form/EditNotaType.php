<?php

namespace App\Form;

use App\Entity\Nota;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class EditNotaType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('titulo',TextType::class,array(
                'label'=>'Titulo *',
                'attr'=>array('class'=>'form-control','placeholder'=>'Titulo'),
                'required'=>true
            ))
            ->add('titulo_en',TextType::class,array(
                'label'=>'Titulo Inglés *',
                'attr'=>array('class'=>'form-control','placeholder'=>'Titulo Inglés'),
                'required'=>true
            ))
            ->add('subtitulo',TextType::class,array(
                'label'=>'SubTitulo *',
                'attr'=>array('class'=>'form-control','placeholder'=>'SubTitulo'),
                'required'=>true
            ))      
            ->add('subtitulo_en',TextType::class,array(
                'label'=>'SubTitulo Inglés *',
                'attr'=>array('class'=>'form-control','placeholder'=>'SubTitulo Inglés'),
                'required'=>true
            ))   
            ->add('contenido',TextareaType::class,array(
                'label'=>'Contenido *',
                'attr'=>array('class'=>'form-control','placeholder'=>'Contenido'),
                'required'=>true
            ))   
            ->add('contenido_en',TextareaType::class,array(
                'label'=>'Contenido Inglés *',
                'attr'=>array('class'=>'form-control','placeholder'=>'Contenido Inglés'),
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
            'data_class' => Nota::class,
        ]);
    }
}

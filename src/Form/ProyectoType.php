<?php

namespace App\Form;

use App\Entity\Proyecto;
use App\Entity\ProyectoTipo;
use App\Entity\Renglon;
use App\Repository\ProyectoTipoRepository;
use App\Repository\RenglonRepository;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class ProyectoType extends AbstractType
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
            ->add('alcance',TextType::class,array(
                'label'=>'Alcance',
                'attr'=>array('class'=>'form-control','placeholder'=>'Alcance'),
                'required'=>false
            )) 
            ->add('tipo', EntityType::class, [
                'label'=>'Tipo *',
                'attr'=>['class'=>'form-control'],
                'class' => ProyectoTipo::class,
                'choice_label' => 'tipo',
                'query_builder' => function (ProyectoTipoRepository $er) {
                    return $er->createQueryBuilder('t')->orderBy('t.tipo', 'ASC');
                }
            ])  
            ->add('renglon', EntityType::class, [
                'label'=>'Renglón *',
                'attr'=>['class'=>'form-control'],
                'class' => Renglon::class,
                'choice_label' => 'nombre',
                'query_builder' => function (RenglonRepository $er) {
                    return $er->createQueryBuilder('r')->orderBy('r.nombre', 'ASC');
                }
            ])                                                               
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Proyecto::class,
        ]);
    }
}

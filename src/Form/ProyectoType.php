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
use Symfony\Component\Form\Extension\Core\Type\FileType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Validator\Constraints\File;

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
                'required'=>true,
                'query_builder' => function (ProyectoTipoRepository $er) {
                    return $er->createQueryBuilder('t')->orderBy('t.tipo', 'ASC');
                }
            ])  
            ->add('renglon', EntityType::class, [
                'label'=>'Renglón *',
                'attr'=>['class'=>'form-control'],
                'class' => Renglon::class,
                'choice_label' => 'nombre',
                'required'=>true,
                'query_builder' => function (RenglonRepository $er) {
                    return $er->createQueryBuilder('r')->orderBy('r.nombre', 'ASC');
                }
            ]) 
            ->add('imagen1', FileType::class, [
                'label' => 'Imagen 1',
                'attr'=>array('class'=>'form-control','placeholder'=>'Imagen 1'),
                // unmapped means that this field is not associated to any entity property
                'mapped' => false,

                // make it optional so you don't have to re-upload the PDF file
                // every time you edit the Product details
                'required' => false,

                // unmapped fields can't define their validation using annotations
                // in the associated entity, so you can use the PHP constraint classes
                'constraints' => [
                    new File([
                        'maxSize' => '1024k',
                        'mimeTypes' => [
                            'image/jpeg'
                        ],
                        'mimeTypesMessage' => 'Seleccione una imagen valida',
                    ])
                ],
            ])
            ->add('imagen2', FileType::class, [
                'label' => 'Imagen 2',
                'attr'=>array('class'=>'form-control','placeholder'=>'Imagen 2'),
                // unmapped means that this field is not associated to any entity property
                'mapped' => false,

                // make it optional so you don't have to re-upload the PDF file
                // every time you edit the Product details
                'required' => false,

                // unmapped fields can't define their validation using annotations
                // in the associated entity, so you can use the PHP constraint classes
                'constraints' => [
                    new File([
                        'maxSize' => '1024k',
                        'mimeTypes' => [
                            'image/jpeg'
                        ],
                        'mimeTypesMessage' => 'Seleccione una imagen valida',
                    ])
                ],
            ])  
            ->add('imagen3', FileType::class, [
                'label' => 'Imagen 3',
                'attr'=>array('class'=>'form-control','placeholder'=>'Imagen 3'),
                // unmapped means that this field is not associated to any entity property
                'mapped' => false,

                // make it optional so you don't have to re-upload the PDF file
                // every time you edit the Product details
                'required' => false,

                // unmapped fields can't define their validation using annotations
                // in the associated entity, so you can use the PHP constraint classes
                'constraints' => [
                    new File([
                        'maxSize' => '1024k',
                        'mimeTypes' => [
                            'image/jpeg'
                        ],
                        'mimeTypesMessage' => 'Seleccione una imagen valida',
                    ])
                ],
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

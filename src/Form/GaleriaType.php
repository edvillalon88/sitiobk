<?php

namespace App\Form;

use App\Entity\Galeria;
use App\Entity\ProyectoTipo;
use App\Repository\ProyectoTipoRepository;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\Extension\Core\Type\FileType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Validator\Constraints\File;

class GaleriaType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('titulo',TextType::class,array(
                'label'=>'Título *',
                'attr'=>array('class'=>'form-control','placeholder'=>'Nombre'),
                'required'=>true
            ))
            ->add('tituloEn',TextType::class,array(
                'label'=>'Título Inglés *',
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
            ->add('imagen', FileType::class, [
                'label' => 'Imagen',
                'attr'=>array('class'=>'form-control','placeholder'=>'Imagen'),
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
            'data_class' => Galeria::class,
        ]);
    }
}

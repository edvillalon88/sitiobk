<?php

namespace App\Form;

use App\Entity\Noticia;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\Extension\Core\Type\FileType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Validator\Constraints\File;

class EditNoticiaType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('titulo',TextType::class,array(
                'label'=>'Titulo *',
                'attr'=>array('class'=>'form-control','placeholder'=>'Titulo'),
                'required'=>true
            ))
            ->add('tituloEn',TextType::class,array(
                'label'=>'Titulo Inglés *',
                'attr'=>array('class'=>'form-control','placeholder'=>'Titulo Inglés'),
                'required'=>true
            ))
            ->add('subtitulo',TextType::class,array(
                'label'=>'SubTitulo *',
                'attr'=>array('class'=>'form-control','placeholder'=>'SubTitulo'),
                'required'=>true
            ))      
            ->add('subtituloEn',TextType::class,array(
                'label'=>'SubTitulo Inglés *',
                'attr'=>array('class'=>'form-control','placeholder'=>'SubTitulo Inglés'),
                'required'=>true
            ))   
            ->add('contenido',TextareaType::class,array(
                'label'=>'Contenido *',
                'attr'=>array('class'=>'form-control','placeholder'=>'Contenido'),
                'required'=>true
            ))   
            ->add('contenidoEn',TextareaType::class,array(
                'label'=>'Contenido Inglés *',
                'attr'=>array('class'=>'form-control','placeholder'=>'Contenido Inglés'),
                'required'=>true
            ))  
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
            'data_class' => Noticia::class,
        ]);
    }
}

<?php

namespace App\Form;

use App\Entity\Proveedor;
use App\Entity\Continente;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use App\Repository\ContinenteRepository;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class ProveedorType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('pais',TextType::class,array(
                'label'=>'País *',
                'attr'=>array('class'=>'form-control','placeholder'=>'País'),
                'required'=>true
            ))
            ->add('paisEn',TextType::class,array(
                'label'=>'País Inglés *',
                'attr'=>array('class'=>'form-control','placeholder'=>'País Inglés'),
                'required'=>true
            ))
             ->add('continente', EntityType::class, [
                'label'=>'Continente *',
                'attr'=>['class'=>'form-control'],
                'class' => Continente::class,
                'choice_label' => 'nombre',
                'query_builder' => function (ContinenteRepository $er) {
                    return $er->createQueryBuilder('c')->orderBy('c.nombre', 'ASC');
                }
            ])                                              
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Proveedor::class,
        ]);
    }
}

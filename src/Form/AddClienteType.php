<?php

namespace App\Form;

use App\Entity\Cliente;
use App\Entity\User;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class AddClienteType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('usuario',UserType::class,[
                'attr'=>[]
            ])
            ->add('url',TextType::class,array(
                'label'=>'Url *',
                'attr'=>array('class'=>'form-control','placeholder'=>'Url'),
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
            'data_class' => Cliente::class,
        ]);
    }
}

<?php

namespace App\Form;

use App\Entity\Cita;
use App\Entity\Doctor;
use App\Repository\DoctorRepository;
use AppBundle\Form\DataTransformer\DateTimeTransformer;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\DateTimeType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;


class CitaType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('paciente', PacienteType::class)
            ->add('fechaHora', TextType::class, array(
                'attr'=>array('class'=>'form-control datetimepicker', 'placeholder'=>'Fecha y hora', 'readonly'=>true),
                'required'=>true
            ))
            ->add('descripcion', TextareaType::class,array(
                'attr'=>array('class'=>'form-control', 'placeholder'=>'Descripcion'),
                'required'=>true
            ))
            ->add('doctor',EntityType::class, [
                'attr'=>['class'=>'form-control'],
                'class' => Doctor::class,
                'query_builder' => function (DoctorRepository $er) {
                    return $er->createQueryBuilder('s')->select('s, u')->join('s.usuario', 'u')->orderBy('u.nombre', 'ASC');
                }
            ]);
        $builder->get('fechaHora')
            ->addModelTransformer(new DateTimeTransformer());
    } 

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Cita::class,
        ]);
    }
}

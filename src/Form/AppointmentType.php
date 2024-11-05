<?php

namespace App\Form;

use App\Entity\Appointment;
use App\Entity\Medecin;
use App\Entity\User;
use Doctrine\ORM\EntityRepository;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\CheckboxType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;


class AppointmentType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('day_of_appointment', null, [
                'widget' => 'single_text',
            ])
            ->add('medecin', EntityType::class, [
                'class' => Medecin::class,
                'choice_label' => 'getMedecin.name',
            ])
            ->add('user', EntityType::class, [
                'class' => User::class,
                'choice_label' => 'name',
                'query_builder' => function(EntityRepository $er) {
                    $role = "ROLE_PATIENT";
                    return $er->createQueryBuilder('u')
                        ->where('u.roles LIKE :role')
                        ->setParameter('role', '%' .$role. '%');
                }
            ])
            ->add('is_cancel',CheckboxType::class,[
                'mapped'=> false,
                'required'=>false,
                ]
            )
            ->add('hour',ChoiceType::class,[
                'mapped' => false,
                'choices'  => [
                    '9H' => '9h',
                    '10H' => '10H',
                    '11H' => '11H',
                    '12H' => '12H',
                    '13H' => '13H',
                    '14H' => '14H',
                    '15H' => '15H',
                    '16H' => '16H',
                    '17H' => '17H',
                ],
            ])
            ->add('note',TextType::class, [

            ])
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Appointment::class,
        ]);
    }
}

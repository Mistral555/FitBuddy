<?php

namespace App\Form;

use App\Entity\User;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\CheckboxType;
use Symfony\Component\Form\Extension\Core\Type\EmailType;
use Symfony\Component\Form\Extension\Core\Type\PasswordType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Validator\Constraints\IsTrue;
use Symfony\Component\Validator\Constraints\Length;
use Symfony\Component\Validator\Constraints\NotBlank;

class infoType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('nom', null, [
                'label' => 'Nom',
                'attr' => ['placeholder' => 'Nom'],
            ])
            ->add('email', EmailType::class, [
                'attr' => ['placeholder' => 'Email'],
            ])
            ->add('poids', null, [
                'label' => 'Poids',
                'attr' => ['placeholder' => 'Poids'],
            ])
            ->add('age', null, [
                'label' => 'Age',
                'attr' => ['placeholder' => 'Age'],
            ])
            ->add('taille', null, [
                'label' => 'Taille',
                'attr' => ['placeholder' => 'Taille'],
            ])
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => User::class,
        ]);
    }
}

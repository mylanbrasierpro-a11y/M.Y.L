<?php

namespace App\Form;

use App\Entity\User;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\EmailType;
use Symfony\Component\Form\Extension\Core\Type\PasswordType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Vich\UploaderBundle\Entity\File;
use Vich\UploaderBundle\Form\Type\VichImageType;

class InscriptionType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('email', EmailType::class, [
                'attr' => ['class' => 'form-input'],
                'row_attr' => ['class' => 'form-group'],
            ])
            ->add('password', PasswordType::class, [
                'attr' => ['class' => 'form-input'],
                'row_attr' => ['class' => 'form-group'],
            ])
            ->add('username', TextType::class, [
                'label' => 'Nom d\'utilisateur',
                'attr' => ['class' => 'form-input'],
                'row_attr' => ['class' => 'form-group'],
            ])
            ->add('imageFile', VichImageType::class, [
                'required' => false,
                'allow_delete' => false,
                'download_uri' => false,
                'attr' => ['class' => 'form-input-file'],
                'row_attr' => ['class' => 'form-group'],
                'constraints' => [
                    new File([
                        'maxSize' => '2M',
                        'mimeTypes' => [
                            'image/jpeg',
                            'image/pgn',
                            'image/gif',
                            'image/jpg',
                            'image/webp',
                            'image/png',
                            'attr' => ['class' => 'form-input'],
                            'row_attr' => ['class' => 'form-group'],
                        ],
                        'mimeTypesMessage' => 'veuillez uploader une image valide ( JPEG, PNG, GIF, JPG, WEBP)'
                    ])
                ]
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
<?php

namespace App\Form;

use App\Entity\User;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\FileType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Validator\Constraints\File;

class InscriptionType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('email')
            ->add('password')
            ->add('username')
            ->add('img_profil', FileType::class,[
                'required' => false,
                'mapped'=> true,
                'constraints'=>[
                    new File([
                        'maxSize'=>'2M',
                        'mimeTypes'=>[
                            'image/jpeg',
                            'image/pgn',
                            'image/gif',
                            'image/jpg',
                            'imagewebp',
                            'image/png',

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

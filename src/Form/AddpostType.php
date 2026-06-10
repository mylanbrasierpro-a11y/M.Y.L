<?php

namespace App\Form;

use App\Entity\Posts;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\FileType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Validator\Constraints\File;

class AddpostType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('title', TextType::class,[
                'attr' => ['class' => 'form-input'],
                'row_attr' => ['class' => 'form-group'],
            ])
            ->add('Body', TextType::class,[
                'attr' => ['class' => 'form-input'],
                'row_attr' => ['class' => 'form-group'],
            ])
            ->add('imageFile', FileType::class,[
                'label' => false,
                'required' => false,
                'mapped' => true,
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
            ]);
    }
    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Posts::class,    
        ]);
    }
}
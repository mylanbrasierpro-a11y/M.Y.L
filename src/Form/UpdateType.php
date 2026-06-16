<?php

namespace App\Form;


use App\Entity\Posts;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\FileType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\HttpFoundation\File\File;
use Symfony\Component\OptionsResolver\OptionsResolver;

class UpdateType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
           ->add('title', TextType::class,[
                'label' => 'Titre',
                'attr' => ['class' => 'form-input'],
                'row_attr' => ['class' => 'form-group'],
            ])
            ->add('Body', TextType::class,[
                'label' => 'Bio',
                'attr' => ['class' => 'form-input'],
                'row_attr' => ['class' => 'form-group'],
            ])
            ->add('imageFile', FileType::class,[
                'label' => 'Image du post',
                'required' => false,
                'mapped' => true,
                'attr' => ['class' => 'form-input'],
                'row_attr' => ['class' => 'form-group'],
            ])
        ;

    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Posts::class,
            
        ]);
    }
}

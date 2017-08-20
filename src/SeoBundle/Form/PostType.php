<?php

namespace SeoBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\DateType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class PostType extends AbstractType
{
    /**
     * {@inheritdoc}
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder->add('titre',TextType::class)
            ->add('date', DateType::class, array(
                'widget' => 'single_text',
            ))
            ->add('contenu', TextareaType::class)
            ->add('medias', MediaType::class,array(
                'label' => false,
                'required' => true
            ))
            ->add('sousTitre1',TextType::class,array(
                'required' => false
            ))
            ->add('contenu1', TextareaType::class,array(
                'required' => false
            ))
            ->add('sousTitre2',TextType::class,array(
                'required' => false
            ))
            ->add('contenu2', TextareaType::class,array(
                'required' => false
            ))
            ->add('send', SubmitType::class, array(
                'label'=>'Valider'
            ));
    }
    
    /**
     * {@inheritdoc}
     */
    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'SeoBundle\Entity\Post'
        ));
    }

    /**
     * {@inheritdoc}
     */
    public function getBlockPrefix()
    {
        return 'seobundle_post';
    }


}

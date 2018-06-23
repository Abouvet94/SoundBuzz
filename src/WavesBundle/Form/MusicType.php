<?php

namespace WavesBundle\Form;

use WavesBundle\Entity\Music;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Doctrine\DBAL\Types\FloatType;


class MusicType extends AbstractType
{

    public function buildForm(\Symfony\Component\Form\FormBuilderInterface $builder, array $options)
    {
        parent::buildForm($builder, $options);
        $builder
            ->add('titre', TextType::class, array('required' => true))
            ->add('album', TextType::class, array('required' => true))
            ->add('artiste', TextType::class, array('required' => true))
            ->add('artiste', TextType::class, array('required' => true))
            ->add('piste', TextType::class, array('required' => true))
            ->add('src', TextType::class, array('required' => true))
            ->add('image', TextType::class, array('required' => true))
            ->add('type', TextType::class, array('required' => true));
    }
}
<?php

namespace AppBundle\Admin;

use WavesBundle\Entity\Playlist;
use Sonata\AdminBundle\Admin\AbstractAdmin;
use Sonata\AdminBundle\Datagrid\ListMapper;
use Sonata\AdminBundle\Form\FormMapper;
use Sonata\AdminBundle\Datagrid\DatagridMapper;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\DateType;
use Symfony\Component\Form\Extension\Core\Type\HiddenType;
use Symfony\Component\Form\Extension\Core\Type\NumberType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\FileType;
use \DateTime;

class PlaylistAdmin extends AbstractAdmin
{
    protected function configureFormFields(FormMapper $formMapper)
    {
        $formMapper
            ->add('nom', TextType::class)
            ->add('nb_music', NumberType::class,array('required' => false))
            ->add('nb_abo', NumberType::class,array('required' => false))
            ->add('active_flag', ChoiceType::class, array(
                'choices' => array('Oui' => '1', 'Non' => '0'),
                'required'    => false,
                'placeholder' => 'Activer la Music',
            ))
            ->add('all_temp', NumberType::class, array('required' => false))
            ->add('image', TextType::class, array('required' => false))
            ;
    }

    protected function configureListFields(ListMapper $listMapper)
    {
        $listMapper
            ->addIdentifier ('nom')
            ->addIdentifier ('nb_music')
            ->addIdentifier ('nb_abo')
            ->addIdentifier ('active_flag')
            ->addIdentifier ('all_temp')
        ;
    }

    protected function configureDatagridFilters(DatagridMapper $datagridMapper)
    {
        $datagridMapper
            ->add ('nom')
            ->add ('nb_music')
            ->add ('nb_abo')
            ->add ('active_flag')
            ->add ('all_temp')
        ;
    }


}
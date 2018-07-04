<?php

namespace AppBundle\Admin;

use WavesBundle\Entity\Music;
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

class MusicAdmin extends AbstractAdmin
{
    protected function configureFormFields(FormMapper $formMapper)
    {
        $formMapper
            ->add('titre', TextType::class)
            ->add('artiste', TextType::class,array('required' => false))
            ->add('album', TextType::class,array('required' => false))
            ->add('active_flag', ChoiceType::class, array(
                'choices' => array('Oui' => '1', 'Non' => '0'),
                'required'    => false,
                'placeholder' => 'Activer la Music',
            ))
            ->add('autorise_flag', ChoiceType::class, array(
                'choices' => array('Oui' => '1', 'Non' => '0'),
                'required'    => false,
                'placeholder' => 'Activer la Music',
            ))
            ->add('piste', TextType::class,array('required' => false))
            ->add('src', TextType::class,array('required' => false))
            ->add('file', FileType::class, [
                'required' => false,
                'data_class' => null
            ])           
            ->add('image', TextType::class,array('required' => false))
            ->add('type', TextType::class,array('required' => false))
            ->add('times', NumberType::class,array('required' => false))
            ->add('description', TextType::class,array('required' => false))
            ->add('compositeur', TextType::class,array('required' => false))
            ->add('contenue_explicite', TextType::class,array('required' => false))
            ->add('datecreated', DateType::class, [
                'required' => false,
                'widget' => 'single_text',
            ])
            ->add('datetransfert', DateType::class, [
                'required' => false,
                'widget' => 'single_text',
            ]);
    }

    public function prePersist($music)
    {
        $this->manageFileUpload($music);
    }

    public function preUpdate($music)
    {
        $this->manageFileUpload($music);
    }

    private function manageFileUpload($music)
    {
        if ($music->getFile()) {
    //        $music->refreshUpdated();
        }
    }


    protected function configureListFields(ListMapper $listMapper)
    {
        $listMapper
            ->addIdentifier ('titre')
            ->addIdentifier ('artiste')
            ->addIdentifier ('album')
            ->addIdentifier ('type')
            ->addIdentifier ('compositeur')
            ->addIdentifier ('datecreated')
        ;
    }

    protected function configureDatagridFilters(DatagridMapper $datagridMapper)
    {
        $datagridMapper
            ->add ('titre')
            ->add ('artiste')
            ->add ('album')
            ->add ('type')
            ->add ('compositeur')
            ->add ('datecreated')
        ;
    }


}
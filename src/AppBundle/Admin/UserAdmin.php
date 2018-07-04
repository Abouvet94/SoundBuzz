<?php

namespace AppBundle\Admin;

use AppBundle\Entity\User;
use Sonata\AdminBundle\Admin\AbstractAdmin;
use Sonata\AdminBundle\Datagrid\ListMapper;
use Sonata\AdminBundle\Form\FormMapper;
use Sonata\AdminBundle\Datagrid\DatagridMapper;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\DateType;
use Symfony\Component\Form\Extension\Core\Type\NumberType;
use Symfony\Component\Form\Extension\Core\Type\TextType;

use Symfony\Component\Security\Core\SecurityContext;

class UserAdmin extends AbstractAdmin
{
    protected function configureFormFields(FormMapper $formMapper)
    {

        $container = $this->getConfigurationPool()->getContainer();
        $roles = $container->getParameter('security.role_hierarchy.roles');
        $rolesChoices = self::flattenRoles($roles);
    
        $formMapper 
            ->with('Informations :', array('class' => 'col-md-9'))
            ->add('username', 'text')
            //->add('password', 'text')
            ->add('plainPassword', 'password', array(
                'required' => false,
                
            )) 
            ->add('email', 'text')
            ->end()
            ->with('Gestion :', array('class' => 'col-md-3'))
            ->add('roles', 'choice', array(
                'choices'  => $rolesChoices,
                'multiple' => true
                )
            )
            ->add('enabled', ChoiceType::class, array(
                'choices' => array('Activer' => '1', 'Désactiver' => '0'),
                'required'    => true,
                'label' => 'Activer l\'utilisateur :',
            ))
            ->end()
        ;
    }

  

    protected function configureListFields(ListMapper $listMapper)
    {
        $listMapper
            ->addIdentifier('username')
            ->addIdentifier('password')
            ->addIdentifier('email')
            ->addIdentifier('roles')
            ->addIdentifier('enabled')
            ->add('_action', 'actions', array(
                'actions' => array(
                    'delete' =>array(),
                    'edit' => array(),
                )
            ));
      
    }

    protected function configureDatagridFilters(DatagridMapper $datagridMapper)
    {
        $datagridMapper
            ->add('username')
            ->add('password')
            ->add('email')
            ->add('roles')
            ->add('enabled');      
    }
//By AB
/**
 * Turns the role's array keys into string <ROLES_NAME> keys.
 * @todo Move to convenience or make it recursive ? ;-)
 */
protected static function flattenRoles($rolesHierarchy) 
{
    $flatRoles = array();
    foreach($rolesHierarchy as $roles) {

        if(empty($roles)) {
            continue;
        }

        foreach($roles as $role) {
            if(!isset($flatRoles[$role])) {
                $flatRoles[$role] = $role;
            }
        }
    }

    return $flatRoles;
}



}
<?php
/**
 * Created by ABouvet
 * Date: 16/06/2018
 */

namespace WavesBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use AppBundle\Entity\User;

/**
 * Class Commentaire
 * @ORM\Entity
 * @package WavesBundle\Entity
 */

class Commentaire
{
    /**
     * @ORM\Column(name="com_id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO");
     */
    private  $com_id;

    /**
    * @ORM\Column(name="active_flag", type="integer", nullable=true)
    */
    private $active_flag;

    /**
     * @ORM\ManyToOne(targetEntity="AppBundle\Entity\User")
     * @ORM\JoinColumn(name="user_id", referencedColumnName="id")
     */
     private $user_id; 

    /**
    * @ORM\Column(name="text", type="string", length=255, nullable=true)
    */
    private $text;

    /**
     * @ORM\Column(name="date_creation", type="date", nullable=true)
     */
    private $date_creation;

    /**
    * @ORM\Column(name="titre", type="string", length=255, nullable=true)
    */
    private $titre;

    /**
    * @ORM\Column(name="action", type="string", length=255, nullable=true)
    */
    private $action;


    //Getter Setter

    /**
     * @return mixed
     */
    public function getCom_Id()
    {
        return $this->com_id;
    }

    /**
     * @param mixed $com_id
     */
    public function setCom_Id($com_id)
    {
        $this->com_id = $com_id;
    }

    
    /**
    * @return mixed
    */
    public function getActive_Flag()
    {
        return $this->active_flag;
    }

    /**
    * @param mixed $active_flag
    */
    public function setActive_Flag($active_flag)
    {
        $this->active_flag = $active_flag;
    }

     
    /**
    * @return mixed
    */
    public function getUser_Id()
    {
        return $this->user_id;
    }

    /**
     * @param mixed $user_id
     */
     public function setUser_id(\AppBundle\Entity\User $user_id = null)
     {
         $this->user_id = $user_id;
         return $this;
     }

     
    /**
    * @return mixed
    */
    public function getText()
    {
        return $this->text;
    }

    /**
    * @param mixed $text
    */
    public function setText($text)
    {
        $this->text = $text;
    }

    /**
    * @return mixed
    */
    public function getDate_Creation()
    {
        return $this->date_creation;
    }

    /**
    * @param mixed $date_creation
    */
    public function setDate_Creation($date_creation)
    {
        $this->date_creation = $date_creation;
    }

    /**
    * @return mixed
    */
    public function getTitre()
    {
        return $this->titre;
    }

    /**
    * @param mixed $titre
    */
    public function setTitre($titre)
    {
        $this->titre = $titre;
    }

    /**
    * @return mixed
    */
    public function getAction()
    {
        return $this->action;
    }

    /**
    * @param mixed $action
    */
    public function setAction($action)
    {
        $this->action = $action;
    }
}

<?php
/**
 * Created by ABouvet
 * Date: 12/06/2018
 */

namespace WavesBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use AppBundle\Entity\User;

/**
 * Class Playlist
 * @ORM\Entity
 * @package WavesBundle\Entity
 */

class Playlist
{
    /**
     * @ORM\Column(name="play_id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO");
     */
    private  $play_id;

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
    * @ORM\Column(name="nom", type="string", length=255, nullable=true)
    */
    private $nom;

    //Getter Setter

    /**
     * @return mixed
     */
    public function getPlay_Id()
    {
        return $this->play_id;
    }

    /**
     * @param mixed $play_id
     */
    public function setPlay_Id($play_id)
    {
        $this->play_id = $play_id;
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
    public function getNom()
    {
        return $this->nom;
    }

    /**
    * @param mixed $nom
    */
    public function setNom($nom)
    {
        $this->nom = $nom;
    }
}

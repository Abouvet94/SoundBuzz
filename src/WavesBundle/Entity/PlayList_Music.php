<?php
/**
 * Created by ABouvet
 * Date: 12/06/2018
 */

namespace WavesBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use WavesBundle\Entity\Music;
use WavesBundle\Entity\PlayList;

/**
 * Class Playlist_Music
 * @ORM\Entity
 * @package WavesBundle\Entity
 */

class Playlist_Music
{
    /**
     * @ORM\Column(name="playlist_music_id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO");
     */
    private $playlist_Music_id;

    /**
    * @ORM\ManyToOne(targetEntity="WavesBundle\Entity\Music")
    * @ORM\JoinColumn(name="music_id", referencedColumnName="music_id", onDelete="CASCADE")
    */
    private $music_id; 

    /**
    * @ORM\ManyToOne(targetEntity="WavesBundle\Entity\PlayList")
    * @ORM\JoinColumn(name="play_id", referencedColumnName="play_id")
    */
    private $play_id; 

    /**
    * @ORM\Column(name="active_flag", type="integer", nullable=true)
    */
    private $active_flag;

    /**
    * @ORM\Column(name="position", type="integer", nullable=true)
    */
    private $position;

    //Getter Setter

    /**
     * @return mixed
     */
    public function getPlaylist_Music_Id()
    {
        return $this->playlist_Music_id;
    }

    /**
     * @param mixed $Playlist_Music_id
     */
    public function setPlaylist_Music_Id($playlist_Music_id)
    {
        $this->playlist_Music_id = $playlist_Music_id;
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
    public function getPosition()
    {
        return $this->position;
    }

    /**
    * @param mixed $position
    */
    public function setPosition($position)
    {
        $this->position = $position;
    }
    
    /**
    * @return mixed
    */
    public function getMusic_Id()
    {
        return $this->music_id;
    }

    /**
     * @param mixed $music_id
     */
     public function setMusic_Id(\WavesBundle\Entity\Music $music_id = null)
     {
         $this->music_id = $music_id;
         return $this;
     }

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
    public function setPlay_Id(\WavesBundle\Entity\PlayList $play_id = null)
    {
        $this->play_id = $play_id;
        return $this;
    }
}

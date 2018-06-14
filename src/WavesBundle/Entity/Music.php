<?php
/**
 * Created by ABouvet
 * Date: 12/06/2018
 */

namespace WavesBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Music
 *
 * @ORM\Table(name="music")
 * @ORM\Entity
 * @ORM\Entity(repositoryClass="WavesBundle\Entity\MusicRepository")
 */

class Music
{
    /**
     * @ORM\Column(name="music_id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO");
     */
    private  $music_id;

    /**
    * @ORM\Column(name="titre", type="string", length=255, nullable=true)
    */
    private $titre;

    /**
    * @ORM\Column(name="active_flag", type="integer", nullable=true)
    */
    private $active_flag;

    /**
    * @ORM\Column(name="artiste", type="string", length=255, nullable=true)
    */
    private $artiste;

    /**
    * @ORM\Column(name="album", type="string", length=255, nullable=true)
    */
    private $album;

    /**
    * @ORM\Column(name="piste", type="string", length=255, nullable=true)
    */
    private $piste;

    /**
    * @ORM\Column(name="src", type="string", length=255, nullable=true)
    */
    private $src;



    //Getter Setter

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
    public function setMusic_Id($music_id)
    {
        $this->music_id = $music_id;
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
    public function getArtiste()
    {
        return $this->artiste;
    }

    /**
    * @param mixed $artiste
    */
    public function setArtiste($artiste)
    {
        $this->artiste = $artiste;
    }

    /**
    * @return mixed
    */
    public function getAlbum()
    {
        return $this->album;
    }

    /**
    * @param mixed $album
    */
    public function setAlbum($album)
    {
        $this->album = $album;
    }

    /**
    * @return mixed
    */
    public function getPiste()
    {
        return $this->piste;
    }

    /**
    * @param mixed $piste
    */
    public function setPiste($piste)
    {
        $this->piste = $piste;
    }

    /**
    * @return mixed
    */
    public function getSrc()
    {
        return $this->src;
    }

    /**
    * @param mixed $src
    */
    public function setSrc($src)
    {
        $this->src = $src;
    }
}

<?php
/**
 * Created by ABouvet
 * Date: 12/06/2018
 */

namespace WavesBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\HttpFoundation\File\UploadedFile;
use Symfony\Component\Validator\Constraints as Assert;


/**
 * Music
 *
 * @ORM\Table(name="music")
 * @ORM\Entity
 * @ORM\Entity(repositoryClass="WavesBundle\Entity\MusicRepository")
 */

class Music 
{

    const PATH_MUSIC = 'framework/audio/';

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
    * @ORM\Column(name="autorise_flag", type="integer", nullable=true)
    */
    private $autorise_flag;

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

    /**
    * @ORM\Column(name="image", type="string", length=255, nullable=true)
    */
    private $image;

    /**
    * @ORM\Column(name="type", type="string", length=255, nullable=true)
    */
    private $type;

    /**
    * @ORM\Column(name="times", type="integer", nullable=true)
    */
    private $times;

    /**
    * @ORM\Column(name="description", type="string", length=255, nullable=true)
    */
    private $description;

    /**
    * @ORM\Column(name="compositeur", type="string", length=255, nullable=true)
    */
    private $compositeur;

    /**
    * @ORM\Column(name="contenue_explicite", type="string", length=255, nullable=true)
    */
    private $contenue_explicite;

    /**
     * @ORM\Column(name="datecreated", type="date", nullable=true)
     */
    private $datecreated;

    /**
     * @ORM\Column(name="datetransfert", type="date", nullable=true)
     */
    private $datetransfert;

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
    public function getActiveFlag()
    {
        return $this->active_flag;
    }

    /**
    * @param mixed $active_flag
    */
    public function setActiveFlag($active_flag)
    {
        $this->active_flag = $active_flag;
    }

    /**
    * @return mixed
    */
    public function getAutoriseFlag()
    {
        return $this->autorise_flag;
    }

    /**
    * @param mixed $active_flag
    */
    public function setAutoriseFlag($autorise_flag)
    {
        $this->autorise_flag = $autorise_flag;
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

    /**
    * @return mixed
    */
    public function getImage()
    {
        return $this->image;
    }

    /**
    * @param mixed $image
    */
    public function setImage($image)
    {
        $this->image = $image;
    }

    /**
    * @return mixed
    */
    public function getType()
    {
        return $this->type;
    }

    /**
    * @param mixed $type
    */
    public function setType($type)
    {
        $this->type = $type;
    }

    /**
    * @return mixed
    */
    public function getTimes()
    {
        return $this->times;
    }

    /**
    * @param mixed $times
    */
    public function setTimes($times)
    {
        $this->times = $times;
    }

    /**
    * @return mixed
    */
    public function getDescription()
    {
        return $this->description;
    }

    /**
    * @param mixed $description
    */
    public function setDescription($description)
    {
        $this->description = $description;
    }   

    /**
    * @return mixed
    */
    public function getCompositeur()
    {
        return $this->compositeur;
    }

    /**
    * @param mixed $compositeur
    */
    public function setCompositeur($compositeur)
    {
        $this->compositeur = $compositeur;
    }

    /**
    * @return mixed
    */
    public function getContenueExplicite()
    {
        return $this->contenue_explicite;
    }

    /**
    * @param mixed $contenue_explicite
    */
    public function setContenueExplicite($contenue_explicite)
    {
        $this->contenue_explicite = $contenue_explicite;
    }

    /**
    * @return mixed
    */
    public function getDateCreated()
    {
        return $this->datecreated;
    }

    /**
    * @param mixed $datecreated
    */
    public function setDateCreated($datecreated)
    {
        $this->datecreated = $datecreated;
    }

    /**
    * @return mixed
    */
    public function getDateTransfert()
    {
        return $this->datetransfert;
    }

    /**
    * @param mixed $datetransfert
    */
    public function setDateTransfert($datetransfert)
    {
        $this->datetransfert = $datetransfert;
    }


    // Function Upload

    
    /**
     * @ORM\Column(type="string")
     *
     * @Assert\NotBlank(message="Merci de prendre un format de Musique Compatible.")
     * @Assert\File(mimeTypes={  "audio/mpeg", "audio/wav", "audio/x-wav", "application/octet-stream"})
     */
    private $file;

    
    public function getFile()
    {
        return $this->file;
    }

    public function setFile($file)
    {
        $this->file = $file;

        return $this;
    }
    
  
}

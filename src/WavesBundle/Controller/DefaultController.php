<?php

namespace WavesBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Leafo\ScssPhp\Compiler;
use Symfony\Component\Security\Core\Authentication\Token\UsernamePasswordToken;
use AppBundle\Entity\User;

class DefaultController extends Controller
{

    public function indexAction()
    {
        //Creer l'objet Compiler()
        $scss = new Compiler();
        //formatage du Css
        $scss->setFormatter(new \Leafo\ScssPhp\Formatter\Expanded());
        //Path SaSS
        $sassFilesPath = $this->get('kernel')->getRootDir() . '/../web/framework/sass/';
        //Path Css
        $cssFilesPath = $this->get('kernel')->getRootDir() . '/../web/framework/css/';
        // Ecrit dans les fichier CSS 'all.css'
        file_put_contents(
            $cssFilesPath. "style.css",
            $scss->compile(
                file_get_contents(
                    $sassFilesPath. "style.scss"
                )
            )
        );

        //Récupération des Playlist (all)
        $playlist = $this->getDoctrine()
        ->getRepository('WavesBundle:Playlist')
        ->findAll();
        //Récupére les PlayListe User
        //$UserId = $this->container->get('security.context')->getToken()->getUser()->getCandidat()->getId();
        // if ($UserId = $this->getUser()->getId()){
        //     if(!empty($UserId)){
        //         $PlayListUser = [];
        //         $PlayListUser = $this->getDoctrine()->getManager()->getRepository('WavesBundle:Music')->getPlaylisteUser($UserId);
        //     }
        // }else { $PlayListUser = false;}
        $PlayListUser = false;
        //Récupération des music (all)
        $music = $this->getDoctrine()
        ->getRepository('WavesBundle:Music')
        ->findAll();
        //Récupération des Commentaires (all)
        $commentaire = $this->getDoctrine()
        ->getRepository('WavesBundle:Commentaire')
        ->findAll();

        return $this->render('WavesBundle:Default:home.html.twig', array(
            'playlist' => $playlist,
            'PlayListUser' => $PlayListUser,
            'music' => $music,
            'commentaire' => $commentaire,
        ));
    }
}

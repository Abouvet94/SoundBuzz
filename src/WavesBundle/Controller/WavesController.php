<?php

namespace WavesBundle\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use WavesBundle\Entity\Music;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Response;

//Import Sass

class WavesController extends Controller {

    public function musicAction(){

        $music = $this->getDoctrine()
        ->getRepository('WavesBundle:Music')
        ->findAll();

        $playlist = $this->getDoctrine()
        ->getRepository('WavesBundle:Playlist')
        ->findAll();

        return $this->render('WavesBundle:Default:music.html.twig', array (
        'music' => $music,
        'playlist' => $playlist
        ));
    }

    public function PlaylisteAutomateAction(Request $request){

        if ($request->isXMLHttpRequest()) {

            $content = $request->getContent();
            $em = $this->getDoctrine()->getManager();

            if (!empty($content)) {
                $params = json_decode($content, true);
                $idplayliste = $request->get('id');
                //Récupére Playliste dans un tableau
                $result = [];
                $resutl = $this->getDoctrine()->getManager()->getRepository('WavesBundle:Music')->getPlayliste($idplayliste);
                
                return new JsonResponse($resutl);
            }
        }
        return new Response('Error!', 400);
    }
}
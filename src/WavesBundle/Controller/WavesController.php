<?php

namespace WavesBundle\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use WavesBundle\Entity\Music;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\File\File;


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
               
                for ($i=0; $i < sizeof($resutl) ; $i++){
                    $id = $resutl[$i]['music_id'];
                    $music[] = $this->getDoctrine()->getManager()->getRepository('WavesBundle:Music')->getMusic($id);
                }
                
                return new JsonResponse($music);
            }
        }
        return new Response('Error!', 400);
    }

    public function getMusicidAction(Request $request){
        if ($request->isXMLHttpRequest()) {
            $content = $request->getContent();
            $em = $this->getDoctrine()->getManager();
            if (!empty($content)) {
                $params = json_decode($content, true);
                $id = $request->get('id');
                //Récupére Playliste dans un tableau
                $result = [];
                $resutl = $this->getDoctrine()->getManager()->getRepository('WavesBundle:Music')->getMusic($id);                
                return new JsonResponse($resutl);
            }
        }
        return new Response('Error!', 400);
    } 

    public function dowloadmusic($id){
        $music = $this->getDoctrine()->getRepository('WavesBundle:Music')->find($id);
        if(!$music){
            throw new createNotFoundException('la Music na pas ete trouvé !');
            
        }

        $samplePdf = new File($this->getParameter('dir.downloads').$music['src']);
        return $this->file($samplePdf);
    }
}
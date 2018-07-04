<?php

namespace WavesBundle\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use WavesBundle\Entity\Music;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\File\File;
use Symfony\Component\HttpFoundation\BinaryFileResponse;
use Symfony\Component\HttpFoundation\ResponseHeaderBag;
use WavesBundle\Form\MusicType;



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

    public function Playliste_add_musicAction(Request $request){
        if ($request->isXMLHttpRequest()) {
            $content = $request->getContent();
            $em = $this->getDoctrine()->getManager();
            if (!empty($content)) {
                $params = json_decode($content, true);
                //Récupére Playliste dans un tableau
                $playlist = $this->getDoctrine()
                ->getRepository('WavesBundle:Playlist')
                ->findAll();   
                var_dump($playlist);            
                return new JsonResponse($playlist);
            }
        }
        return new Response('Error!', 400);
    } 

    public function dowloadmusicAction(Request $request,$id){
        try {
            $file = $this->getDoctrine()->getRepository('WavesBundle:Music')->find($id);
            if (! $file) {
                $array = array (
                    'status' => 0,
                    'message' => 'Fichier :'.$id.' Non Trouvé !' 
                );
                $response = new JsonResponse ( $array, 200 );
                return $response;
            }
            $Music_Titre = $file->getTitre();
            $Music_Src = $file->getSrc();
            $Music_Type = $file->getType();
            if(empty($Music_Type)){ $Music_Type = 'mp3';}
            $file_with_path = $this->container->getParameter ( 'file_dowload' ) . $Music_Src;
            $response = new BinaryFileResponse ( $file_with_path );
            $response->headers->set ( 'Content-Type', 'audio/mpeg3;audio/wave;audio/webm;' );
            $response->setContentDisposition ( ResponseHeaderBag::DISPOSITION_ATTACHMENT, $Music_Titre .'.'.$Music_Type );
            return $response;
        } catch ( Exception $e ) {
            $array = array (
                'status' => 0,
                'message' => 'Erreur de télchargement !' 
            );
            $response = new JsonResponse ( $array, 400 );
            return $response;
        }
    }

    public function DeleteMusicAction(Request $request, $id)
    {
        #Connection a la base de données
        $em = $this->getDoctrine()->getManager();
        #Vient chercher le Contrat avec l'id donnée en parametre
        $entity = $em->getRepository('WavesBundle:Music')->find($id);
        #Verif
        if (!$entity) {
            throw $this->createNotFoundException('Music non trouvé.');
        }
        $em->remove($entity);
        $em->flush();
        return $this->redirect($this->generateUrl('home'));
    }
}
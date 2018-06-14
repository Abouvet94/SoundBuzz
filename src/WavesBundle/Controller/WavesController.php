<?php

namespace WavesBundle\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use WavesBundle\Entity\Music;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Response;

//Import Sass
use Leafo\ScssPhp\Compiler;


class WavesController extends Controller {

    public function musicAction(){


        // // Create an instance of the Sass Compiler class
        $scss = new Compiler();

        $scss->setFormatter(new \Leafo\ScssPhp\Formatter\Expanded());

        //Path SaSS
        $sassFilesPath = $this->get('kernel')->getRootDir() . '/../web/framework/sass/';
        //Path Css
        $cssFilesPath = $this->get('kernel')->getRootDir() . '/../web/framework/css/';

        // Write output css file
        file_put_contents(
            $cssFilesPath. "all.css",
            // Set the content of all.css the output of the
            // sass compiler from the file all.scss
            $scss->compile(
                // Read content of all.scss
                file_get_contents(
                    $sassFilesPath. "test.scss"
                )
            )
        );

        // $music = $this->getDoctrine()
        // ->getRepository('WavesBundle:Music')
        // ->findAll();

        // $playlist = $this->getDoctrine()
        // ->getRepository('WavesBundle:Playlist')
        // ->findAll();

        //return new Response("Sass File Succesfully compiled");
        return $this->render('WavesBundle:Default:test.html.twig');
        // return $this->render('WavesBundle:Default:music.html.twig', array (
        //     'music' => $music,
        //     'playlist' => $playlist
        // ));
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
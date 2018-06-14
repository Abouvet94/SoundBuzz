<?php

namespace WavesBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Leafo\ScssPhp\Compiler;

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
            $cssFilesPath. "all.css",
            $scss->compile(
                file_get_contents(
                    $sassFilesPath. "test.scss"
                )
            )
        );
        return $this->render('WavesBundle:Default:index.html.twig');
    }
}

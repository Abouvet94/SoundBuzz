<?php

namespace WavesBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class DefaultController extends Controller
{

    public function indexAction()
    {
        return $this->render('WavesBundle:Default:index.html.twig');
    }

}

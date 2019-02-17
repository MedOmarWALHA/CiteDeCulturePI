<?php

namespace CiteDeCultureBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class DefaultController extends Controller
{
    public function indexAction()
    {
        return $this->render('CiteDeCultureBundle:Default:index.html.twig');
    }

    public function backAction()
    {
        return $this->render('CiteDeCultureBundle:Default:back.html.twig');
    }
}

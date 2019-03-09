<?php

namespace ArtClassiqueBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class DefaultController extends Controller
{
    public function indexAction()
    {
        return $this->render('ArtClassiqueBundle:Default:index.html.twig');
    }
}

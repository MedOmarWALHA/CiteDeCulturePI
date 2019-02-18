<?php

namespace CiteDeCultureBundle\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\IsGranted;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class DefaultController extends Controller
{
    public function indexAction()
    {
        return $this->render('CiteDeCultureBundle:Default:index.html.twig');
    }

    /**
     * @IsGranted("ROLE_ADMIN")
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function backAction()
    {
        return $this->render('CiteDeCultureBundle:Default:back.html.twig');
    }
}

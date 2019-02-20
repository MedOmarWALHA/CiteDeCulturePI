<?php

namespace FoireBundle\Controller;

use FoireBundle\Entity\Foire;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;

/**
 * Foire controller.
 *
 */
class StandController extends Controller
{
    public function listeStandAction()
    {
        $em= $this->getDoctrine()->getManager();
        $Stand=$em->getRepository("FoireBundle:Foire")->findAll();
        return $this->render('@Foire\Stand\Afficher.html.twig',array("stand"=>$Stand));
    }

}

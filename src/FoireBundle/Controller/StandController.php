<?php

namespace FoireBundle\Controller;

use FoireBundle\Entity\Foire;
use FoireBundle\Entity\notification;
use FoireBundle\Entity\Stand;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use FoireBundle\Repository\Stand1;

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
        $Foire=$em->getRepository("FoireBundle:Stand")->findAll();

        return $this->render('@Foire\Stand\Afficher.html.twig',array("stand"=>$Stand,"foire"=>$Foire));
    }

    public function listeStand1Action()
    {
        $em= $this->getDoctrine()->getManager();


$Stand = $em->getRepository('FoireBundle:Foire')->findBy(array('NomFoire' => 'bglk'));
        return $this->render('@Foire\Stand\Afficher.html.twig',array("stand"=>$Stand));
    }


    public function listeStandDemandeAction()
    {
        $em= $this->getDoctrine()->getManager();
        $Stands=$em->getRepository("FoireBundle:Stand")->findAll();

        return $this->render('@Foire\Stand\AfficherDemandeStand.html.twig',array("stands"=>$Stands));
    }



    public function louerStandAction(Foire $foire)
    {
        $stand = new Stand();
        $stand->setFoire($foire);
        $stand->setUser($this->getUser());
        $stand->setEtatdeReponse("En attente");

        $em = $this->getDoctrine()->getManager();
        $em->persist($stand);
        $em->flush();

        return $this->redirectToRoute('stand_afficher');

    }



}

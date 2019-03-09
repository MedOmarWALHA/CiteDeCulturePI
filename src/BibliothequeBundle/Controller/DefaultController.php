<?php

namespace BibliothequeBundle\Controller;

use BibliothequeBundle\Entity\emprunt;
use CMEN\GoogleChartsBundle\GoogleCharts\Charts\PieChart;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class DefaultController extends Controller
{
    public function indexAction()
    {
        return $this->render('BibliothequeBundle:Default:index.html.twig');
    }
    public function index2Action()
    {
        $pieChart = new PieChart();
        $em= $this->getDoctrine();
        $empruntes = $em->getRepository(emprunt::class)->findAll();
        $totalEm=30;
        foreach($empruntes as $emprunte) {
            $totalEm=$totalEm+count($emprunte($this->getId()));
        }
        $data= array();
        $stat=['emprunt', 'nbemprunte'];
        $nb=0;
        array_push($data,$stat);
        foreach($empruntes as $emprunte) {
            $stat=array();
            array_push($stat,$emprunte->getId(),((count($emprunte->getId())) *100)/$totalEm);
            $nb=($emprunte->getId() *100)/$totalEm;
            $stat=[$emprunte->getId(),$nb];
            array_push($data,$stat);
        }
        $pieChart->getData()->setArrayToDataTable(
            $data
        );
        $pieChart->getOptions()->setTitle('Pourcentages des étudiants par niveau');
        $pieChart->getOptions()->setHeight(500);
        $pieChart->getOptions()->setWidth(900);
        $pieChart->getOptions()->getTitleTextStyle()->setBold(true);
        $pieChart->getOptions()->getTitleTextStyle()->setColor('#009900');
        $pieChart->getOptions()->getTitleTextStyle()->setItalic(true);
        $pieChart->getOptions()->getTitleTextStyle()->setFontName('Arial');
        $pieChart->getOptions()->getTitleTextStyle()->setFontSize(20);
        return $this->render('@Graphe\Default\index.html.twig', array('piechart' => $pieChart));
    }

}

<?php
/**
 * Created by PhpStorm.
 * User: MON ASUS
 * Date: 21/02/2019
 * Time: 23:58
 */

namespace FoireBundle\Repository;
use Doctrine\ORM\EntityRepository;
use FoireBundle\Entity\notification;

class Stand1 extends EntityRepository
{
    public function compternotification()
    {
        $em = $this->getEntityManager();


        $query = $em->createQuery('SELECT COUNT(*) FROM FoireBundle:notification');

        return $query;

    }

}
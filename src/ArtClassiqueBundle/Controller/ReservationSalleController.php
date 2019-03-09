<?php

namespace ArtClassiqueBundle\Controller;

use ArtClassiqueBundle\Entity\ReservationSalle;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;

/**
 * Reservationsalle controller.
 *
 */
class ReservationSalleController extends Controller
{
    /**
     * Lists all reservationSalle entities.
     *
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $reservationSalles = $em->getRepository('ArtClassiqueBundle:ReservationSalle')->findAll();

        return $this->render('@ArtClassique/reservationsalle/index.html.twig', array(
            'reservationSalles' => $reservationSalles,
        ));
    }

    /**
     * Creates a new reservationSalle entity.
     *
     */
    public function newAction(Request $request)
    {
        $reservationSalle = new Reservationsalle();
        $form = $this->createForm('ArtClassiqueBundle\Form\ReservationSalleType', $reservationSalle);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($reservationSalle);
            $em->flush();

            return $this->redirectToRoute('salle_reservation_show', array('id' => $reservationSalle->getId()));
        }

        return $this->render('@ArtClassique/reservationsalle/new.html.twig', array(
            'reservationSalle' => $reservationSalle,
            'form' => $form->createView(),
        ));
    }

    /**
     * Finds and displays a reservationSalle entity.
     *
     */
    public function showAction(ReservationSalle $reservationSalle)
    {
        $deleteForm = $this->createDeleteForm($reservationSalle);

        return $this->render('@ArtClassique/reservationsalle/show.html.twig', array(
            'reservationSalle' => $reservationSalle,
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Displays a form to edit an existing reservationSalle entity.
     *
     */
    public function editAction(Request $request, ReservationSalle $reservationSalle)
    {
        $deleteForm = $this->createDeleteForm($reservationSalle);
        $editForm = $this->createForm('ArtClassiqueBundle\Form\ReservationSalleType', $reservationSalle);
        $editForm->handleRequest($request);

        if ($editForm->isSubmitted() && $editForm->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('salle_reservation_edit', array('id' => $reservationSalle->getId()));
        }

        return $this->render('@ArtClassique/reservationsalle/edit.html.twig', array(
            'reservationSalle' => $reservationSalle,
            'edit_form' => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Deletes a reservationSalle entity.
     *
     */
    public function deleteAction(Request $request, ReservationSalle $reservationSalle)
    {
        $form = $this->createDeleteForm($reservationSalle);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->remove($reservationSalle);
            $em->flush();
        }

        return $this->redirectToRoute('salle_reservation_index');
    }

    /**
     * Creates a form to delete a reservationSalle entity.
     *
     * @param ReservationSalle $reservationSalle The reservationSalle entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm(ReservationSalle $reservationSalle)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('salle_reservation_delete', array('id' => $reservationSalle->getId())))
            ->setMethod('DELETE')
            ->getForm()
        ;
    }
}

<?php

namespace ArtClassiqueBundle\Controller;

use ArtClassiqueBundle\Entity\SalleArt;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;

/**
 * Salleart controller.
 *
 */
class SalleArtController extends Controller
{
    /**
     * Lists all salleArt entities.
     *
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $salleArts = $em->getRepository('ArtClassiqueBundle:SalleArt')->findAll();

        return $this->render('@ArtClassique/salleart/index.html.twig', array(
            'salleArts' => $salleArts,
        ));
    }

    /**
     * Creates a new salleArt entity.
     *
     */
    public function newAction(Request $request)
    {
        $salleArt = new Salleart();
        $form = $this->createForm('ArtClassiqueBundle\Form\SalleArtType', $salleArt);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($salleArt);
            $em->flush();

            return $this->redirectToRoute('salleart_show', array('id' => $salleArt->getId()));
        }

        return $this->render('@ArtClassique/salleart/new.html.twig', array(
            'salleArt' => $salleArt,
            'form' => $form->createView(),
        ));
    }

    /**
     * Finds and displays a salleArt entity.
     *
     */
    public function showAction(SalleArt $salleArt)
    {
        $deleteForm = $this->createDeleteForm($salleArt);

        return $this->render('@ArtClassique/salleart/show.html.twig', array(
            'salleArt' => $salleArt,
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Displays a form to edit an existing salleArt entity.
     *
     */
    public function editAction(Request $request, SalleArt $salleArt)
    {
        $deleteForm = $this->createDeleteForm($salleArt);
        $editForm = $this->createForm('ArtClassiqueBundle\Form\SalleArtType', $salleArt);
        $editForm->handleRequest($request);

        if ($editForm->isSubmitted() && $editForm->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('salleart_edit', array('id' => $salleArt->getId()));
        }

        return $this->render('@ArtClassique/salleart/edit.html.twig', array(
            'salleArt' => $salleArt,
            'edit_form' => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Deletes a salleArt entity.
     *
     */
    public function deleteAction(Request $request, SalleArt $salleArt)
    {
        $form = $this->createDeleteForm($salleArt);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->remove($salleArt);
            $em->flush();
        }

        return $this->redirectToRoute('salleart_index');
    }

    /**
     * Creates a form to delete a salleArt entity.
     *
     * @param SalleArt $salleArt The salleArt entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm(SalleArt $salleArt)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('salleart_delete', array('id' => $salleArt->getId())))
            ->setMethod('DELETE')
            ->getForm()
        ;
    }
}

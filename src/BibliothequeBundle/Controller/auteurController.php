<?php

namespace BibliothequeBundle\Controller;

use BibliothequeBundle\Entity\auteur;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;

/**
 * Auteur controller.
 *
 */
class auteurController extends Controller
{
    /**
     * Lists all auteur entities.
     *
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $auteurs = $em->getRepository('BibliothequeBundle:auteur')->findAll();

        return $this->render('auteur/index.html.twig', array(
            'auteurs' => $auteurs,
        ));
    }

    /**
     * Creates a new auteur entity.
     *
     */
    public function newAction(Request $request)
    {
        $auteur = new Auteur();
        $form = $this->createForm('BibliothequeBundle\Form\auteurType', $auteur);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($auteur);
            $em->flush();

            return $this->redirectToRoute('auteur_show', array('id' => $auteur->getId()));
        }

        return $this->render('auteur/new.html.twig', array(
            'auteur' => $auteur,
            'form' => $form->createView(),
        ));
    }

    /**
     * Finds and displays a auteur entity.
     *
     */
    public function showAction(auteur $auteur)
    {
        $deleteForm = $this->createDeleteForm($auteur);

        return $this->render('auteur/show.html.twig', array(
            'auteur' => $auteur,
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Displays a form to edit an existing auteur entity.
     *
     */
    public function editAction(Request $request, auteur $auteur)
    {
        $deleteForm = $this->createDeleteForm($auteur);
        $editForm = $this->createForm('BibliothequeBundle\Form\auteurType', $auteur);
        $editForm->handleRequest($request);

        if ($editForm->isSubmitted() && $editForm->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('auteur_edit', array('id' => $auteur->getId()));
        }

        return $this->render('auteur/edit.html.twig', array(
            'auteur' => $auteur,
            'edit_form' => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Deletes a auteur entity.
     *
     */
    public function deleteAction(Request $request, auteur $auteur)
    {
        $form = $this->createDeleteForm($auteur);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->remove($auteur);
            $em->flush();
        }

        return $this->redirectToRoute('auteur_index');
    }

    /**
     * Creates a form to delete a auteur entity.
     *
     * @param auteur $auteur The auteur entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm(auteur $auteur)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('auteur_delete', array('id' => $auteur->getId())))
            ->setMethod('DELETE')
            ->getForm()
        ;
    }
}

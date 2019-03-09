<?php

namespace ArtClassiqueBundle\Controller;

use ArtClassiqueBundle\Entity\GroupeArtistes;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;

/**
 * Groupeartiste controller.
 *
 */
class GroupeArtistesController extends Controller
{
    /**
     * Lists all groupeArtiste entities.
     *
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $groupeArtistes = $em->getRepository('ArtClassiqueBundle:GroupeArtistes')->findAll();

        return $this->render('@ArtClassique/groupeartistes/index.html.twig', array(
            'groupeArtistes' => $groupeArtistes,
        ));
    }

    /**
     * Creates a new groupeArtiste entity.
     *
     */
    public function newAction(Request $request)
    {
        $groupeArtiste = new GroupeArtistes();
        $form = $this->createForm('ArtClassiqueBundle\Form\GroupeArtistesType', $groupeArtiste);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($groupeArtiste);
            $em->flush();

            return $this->redirectToRoute('groupe_show', array('id' => $groupeArtiste->getId()));
        }

        return $this->render('@ArtClassique/groupeartistes/new.html.twig', array(
            'groupeArtiste' => $groupeArtiste,
            'form' => $form->createView(),
        ));
    }

    /**
     * Finds and displays a groupeArtiste entity.
     *
     */
    public function showAction(GroupeArtistes $groupeArtiste)
    {
        $deleteForm = $this->createDeleteForm($groupeArtiste);

        return $this->render('@ArtClassique/groupeartistes/show.html.twig', array(
            'groupeArtiste' => $groupeArtiste,
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Displays a form to edit an existing groupeArtiste entity.
     *
     */
    public function editAction(Request $request, GroupeArtistes $groupeArtiste)
    {
        $deleteForm = $this->createDeleteForm($groupeArtiste);
        $editForm = $this->createForm('ArtClassiqueBundle\Form\GroupeArtistesType', $groupeArtiste);
        $editForm->handleRequest($request);

        if ($editForm->isSubmitted() && $editForm->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('groupe_edit', array('id' => $groupeArtiste->getId()));
        }

        return $this->render('@ArtClassique/groupeartistes/edit.html.twig', array(
            'groupeArtiste' => $groupeArtiste,
            'edit_form' => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Deletes a groupeArtiste entity.
     *
     */
    public function deleteAction(Request $request, GroupeArtistes $groupeArtiste)
    {
        $form = $this->createDeleteForm($groupeArtiste);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->remove($groupeArtiste);
            $em->flush();
        }

        return $this->redirectToRoute('groupe_index');
    }

    /**
     * Creates a form to delete a groupeArtiste entity.
     *
     * @param GroupeArtistes $groupeArtiste The groupeArtiste entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm(GroupeArtistes $groupeArtiste)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('groupe_delete', array('id' => $groupeArtiste->getId())))
            ->setMethod('DELETE')
            ->getForm()
        ;
    }
}

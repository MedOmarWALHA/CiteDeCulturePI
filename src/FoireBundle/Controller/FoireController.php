<?php

namespace FoireBundle\Controller;

use FoireBundle\Entity\Foire;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;

/**
 * Foire controller.
 *
 */
class FoireController extends Controller
{
    /**
     * Lists all foire entities.
     *
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $foires = $em->getRepository('FoireBundle:Foire')->findAll();

        return $this->render('@Foire/foire/index.html.twig', array(
            'foires' => $foires,
        ));
    }

    /**
     * Creates a new foire entity.
     *
     */
    public function newAction(Request $request)
    {
        $foire = new Foire();
        $form = $this->createForm('FoireBundle\Form\FoireType', $foire);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($foire);
            $em->flush();

            return $this->redirectToRoute('foire_show', array('identifiant' => $foire->getIdentifiant()));
        }

        return $this->render('@Foire/foire/new.html.twig', array(
            'foire' => $foire,
            'form' => $form->createView(),
        ));
    }

    /**
     * Finds and displays a foire entity.
     *
     */
    public function showAction(Foire $foire)
    {
        $deleteForm = $this->createDeleteForm($foire);

        return $this->render('@Foire/foire/show.html.twig', array(
            'foire' => $foire,
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Displays a form to edit an existing foire entity.
     *
     */
    public function editAction(Request $request, Foire $foire)
    {
        $deleteForm = $this->createDeleteForm($foire);
        $editForm = $this->createForm('FoireBundle\Form\FoireType', $foire);
        $editForm->handleRequest($request);

        if ($editForm->isSubmitted() && $editForm->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('foire_edit', array('identifiant' => $foire->getIdentifiant()));
        }

        return $this->render('@Foire/foire/edit.html.twig', array(
            'foire' => $foire,
            'edit_form' => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Deletes a foire entity.
     *
     */
    public function deleteAction(Request $request, Foire $foire)
    {
        $form = $this->createDeleteForm($foire);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->remove($foire);
            $em->flush();
        }

        return $this->redirectToRoute('foire_index');
    }

    /**
     * Creates a form to delete a foire entity.
     *
     * @param Foire $foire The foire entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm(Foire $foire)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('foire_delete', array('identifiant' => $foire->getIdentifiant())))
            ->setMethod('DELETE')
            ->getForm()
        ;
    }
}

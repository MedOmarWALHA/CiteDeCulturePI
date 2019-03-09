<?php

namespace BibliothequeBundle\Controller;

use BibliothequeBundle\Entity\dommaine;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;

/**
 * Dommaine controller.
 *
 */
class dommaineController extends Controller
{
    /**
     * Lists all dommaine entities.
     *
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $dommaines = $em->getRepository('BibliothequeBundle:dommaine')->findAll();

        return $this->render('dommaine/index.html.twig', array(
            'dommaines' => $dommaines,
        ));
    }

    /**
     * Creates a new dommaine entity.
     *
     */
    public function newAction(Request $request)
    {
        $dommaine = new Dommaine();
        $form = $this->createForm('BibliothequeBundle\Form\dommaineType', $dommaine);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($dommaine);
            $em->flush();

            return $this->redirectToRoute('dommaine_show', array('id' => $dommaine->getId()));
        }

        return $this->render('dommaine/new.html.twig', array(
            'dommaine' => $dommaine,
            'form' => $form->createView(),
        ));
    }

    /**
     * Finds and displays a dommaine entity.
     *
     */
    public function showAction(dommaine $dommaine)
    {
        $deleteForm = $this->createDeleteForm($dommaine);

        return $this->render('dommaine/show.html.twig', array(
            'dommaine' => $dommaine,
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Displays a form to edit an existing dommaine entity.
     *
     */
    public function editAction(Request $request, dommaine $dommaine)
    {
        $deleteForm = $this->createDeleteForm($dommaine);
        $editForm = $this->createForm('BibliothequeBundle\Form\dommaineType', $dommaine);
        $editForm->handleRequest($request);

        if ($editForm->isSubmitted() && $editForm->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('dommaine_edit', array('id' => $dommaine->getId()));
        }

        return $this->render('dommaine/edit.html.twig', array(
            'dommaine' => $dommaine,
            'edit_form' => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Deletes a dommaine entity.
     *
     */
    public function deleteAction(Request $request, dommaine $dommaine)
    {
        $form = $this->createDeleteForm($dommaine);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->remove($dommaine);
            $em->flush();
        }

        return $this->redirectToRoute('dommaine_index');
    }

    /**
     * Creates a form to delete a dommaine entity.
     *
     * @param dommaine $dommaine The dommaine entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm(dommaine $dommaine)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('dommaine_delete', array('id' => $dommaine->getId())))
            ->setMethod('DELETE')
            ->getForm()
        ;
    }
}

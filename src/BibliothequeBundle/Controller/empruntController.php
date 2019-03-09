<?php

namespace BibliothequeBundle\Controller;

use BibliothequeBundle\Entity\emprunt;
use BibliothequeBundle\Entity\livre;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;

/**
 * Emprunt controller.
 *
 */
class empruntController extends Controller
{
    /**
     * Lists all emprunt entities.
     *
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $emprunts = $em->getRepository('BibliothequeBundle:emprunt')->findAll();

        return $this->render('emprunt/index.html.twig', array(
            'emprunts' => $emprunts,
        ));
    }

    /**
     * Creates a new emprunt entity.
     *
     */
    public function newAction(Request $request)
    {
        $emprunt = new Emprunt();
        $form = $this->createForm('BibliothequeBundle\Form\empruntType', $emprunt);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $emprunt->getRendu();
            $emprunt->setRendu(true);

            $em->persist($emprunt);
            $em->flush();

            return $this->redirectToRoute('emprunt_show', array('id' => $emprunt->getId()));
        }

        return $this->render('emprunt/new.html.twig', array(
            'emprunt' => $emprunt,
            'form' => $form->createView(),
        ));
    }
    public function empruntAction(Request $request, livre $livre)
    {
        $emprunt=new emprunt();
        if ($request->isMethod('GET'))
        {

            $emprunt->setLivre($livre);
            $emprunt->setDatedebut(new\DateTime('now'));
            $emprunt->setDatefin(new\DateTime($request->get('f1')));
            $emprunt->setUser($this->getUser());
            $emprunt->setRendu(false);
            $em=$this->getDoctrine()->getManager();
            $em->persist($emprunt);
            $em->flush();


            return $this->redirectToRoute('livre_index2');

        }
        return $this->redirectToRoute('livre_index2');
    }

    /**
     * Finds and displays a emprunt entity.
     *
     */
    public function showAction(emprunt $emprunt)
    {
        $deleteForm = $this->createDeleteForm($emprunt);

        return $this->render('emprunt/show.html.twig', array(
            'emprunt' => $emprunt,
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Displays a form to edit an existing emprunt entity.
     *
     */
    public function editAction(Request $request, emprunt $emprunt)
    {
        $deleteForm = $this->createDeleteForm($emprunt);
        $editForm = $this->createForm('BibliothequeBundle\Form\empruntType', $emprunt);
        $editForm->handleRequest($request);

        if ($editForm->isSubmitted() && $editForm->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('emprunt_edit', array('id' => $emprunt->getId()));
        }

        return $this->render('emprunt/edit.html.twig', array(
            'emprunt' => $emprunt,
            'edit_form' => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Deletes a emprunt entity.
     *
     */
    public function deleteAction(Request $request, emprunt $emprunt)
    {
        $form = $this->createDeleteForm($emprunt);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->remove($emprunt);
            $em->flush();
        }

        return $this->redirectToRoute('emprunt_index');
    }

    /**
     * Creates a form to delete a emprunt entity.
     *
     * @param emprunt $emprunt The emprunt entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm(emprunt $emprunt)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('emprunt_delete', array('id' => $emprunt->getId())))
            ->setMethod('DELETE')
            ->getForm()
        ;
    }
}

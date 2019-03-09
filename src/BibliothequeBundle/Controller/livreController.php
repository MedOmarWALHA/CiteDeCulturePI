<?php

namespace BibliothequeBundle\Controller;


use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\File\Exception\FileException;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;
use Symfony\Component\Routing\Annotation\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use BibliothequeBundle\Entity\livre;
use BibliothequeBundle\Form\livreType;
use Symfony\Component\HttpFoundation\File\File;

/**
 * Livre controller.
 *
 */
class livreController extends Controller
{
    /**
     * Lists all livre entities.
     *
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $livres = $em->getRepository('BibliothequeBundle:livre')->findAll();

        return $this->render('livre/index.html.twig', array(
            'livres' => $livres,
        ));
    }

    /**
     * Creates a new livre entity.
     *
     */

    /**
     * @Route("/livre/new", name="app_livre_new")
     */

    public function index2Action()
    {
        $em = $this->getDoctrine()->getManager();

        $livres = $em->getRepository('BibliothequeBundle:livre')->findAll();
        $emprunt = $em->getRepository('BibliothequeBundle:emprunt')->findAll();

        return $this->render('livre/index2.html.twig', array(
            'livres' => $livres,
            'emprunt' => $emprunt

        ));
    }

    /**
     * Creates a new livre entity.
     *
     */

    /**
     * @Route("/livre/new", name="app_livre_new")
     */
    public function newAction(Request $request)
    {
        $entity = new livre();
        $form = $this->createForm(livreType::class, $entity);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            dump($entity);
            $file2 = $entity->getProfilePictureFile();

            $fileName2 = $this->generateUniqueFileName().'.'.$file2->guessExtension();

            // moves the file to the directory where brochures are stored
            $file2->move(
                $this->getParameter('brochures_directory'),
                $fileName2
            );

            // updates the 'brochure' property to store the PDF file name
            // instead of its contents
            $entity->setProfilePictureFile($fileName2);

            // $file stores the uploaded PDF file
            /** @var Symfony\Component\HttpFoundation\File\UploadedFile $file */
            $file = $entity->getImage();

            $fileName = $this->generateUniqueFileName().'.'.$file->guessExtension();

            // Move the file to the directory where brochures are stored
            try {
                $file->move(
                    $this->getParameter('Livre_directory'),
                    $fileName
                );
            } catch (FileException $e) {
                // ... handle exception if something happens during file upload
            }

            // updates the 'brochure' property to store the PDF file name
            // instead of its contents
            $entity->setImage($fileName);
            $em=$this->getDoctrine()->getManager();
            $em->persist($entity);
            $em->flush();

            return $this->redirectToRoute('livre_show', array('id' => $entity->getId()));
        }

        return $this->render('livre/new.html.twig', array(
            'livre' => $entity,
            'form' => $form->createView(),
        ));
    }

    /**
     * Finds and displays a livre entity.
     *
     */

    /**
     * @return string
     */
    private function generateUniqueFileName()
    {
        // md5() reduces the similarity of the file names generated by
        // uniqid(), which is based on timestamps
        return md5(uniqid());
    }

    public function showAction(livre $livre)
    {
        $deleteForm = $this->createDeleteForm($livre);

        return $this->render('livre/show.html.twig', array(
            'livre' => $livre,
            'delete_form' => $deleteForm->createView(),
        ));
    }
    public function showfrontAction(livre $livre)
    {

        return $this->render('livre/showfront.html.twig', array(
            'livre' => $livre,
        ));
    }
    /**
     * Displays a form to edit an existing livre entity.
     *
     */
    public function editAction($id , Request $request, livre $livre)
    {
        $em = $this->getDoctrine()->getManager();

        $livre = $em->getRepository('BibliothequeBundle:livre')->find($id);
        if (null === $livre) {
            throw new NotFoundHttpException("L'annonce d'id " . $id . " n'existe pas.");
        }
        $form = $this->get('form.factory')->create(livreType::class, $livre);
        if ($request->isMethod('POST') && $form->handleRequest($request)->isValid()) {
            $file = $livre->getImage();
            $fileName = md5(uniqid()) . '.' . $file->guessExtension();
            $file->move($this->getParameter('Livre_directory'), $fileName);
            $livre->setImage($fileName);
            $file2 = $livre->getProfilePictureFile();

            $fileName2 = $this->generateUniqueFileName().'.'.$file2->guessExtension();

            // moves the file to the directory where brochures are stored
            $file2->move(
                $this->getParameter('brochures_directory'),
                $fileName2
            );

            // updates the 'brochure' property to store the PDF file name
            // instead of its contents
            $livre->setProfilePictureFile($fileName2);
            $em->persist($livre);
            $em->flush();

            $request->getSession()->getFlashBag()->add('livre', 'livre bien modifiée.');

            return $this->redirectToRoute('livre_show', array('id' => $livre->getIdfestival()));
        }

        return $this->render('@BibliothequeBundle/livre/edit.html.twig', array(
            'livre' => $livre,
            'form' => $form->createView(),
        ));
    }

    /**
     * Deletes a livre entity.
     *
     */
    public function deleteAction($id, Request $request, livre $livre)
    {
        $form = $this->createDeleteForm($livre);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->remove($livre);
            $em->flush();
        }

        return $this->redirectToRoute('livre_index');
    }
    public function supprimerAction($id){
        $em=$this->getDoctrine()->getManager() ;
        $livre=$em->getRepository("BibliothequeBundle:livre")->find($id);
        $em->remove($livre);
        $em->flush();
        return $this->redirectToRoute('livre_index') ;

    }
    public function newDAction()
    {
        $entity = new livre();
        $form   = $this->createCreateForm($entity);

        return array(
            'entity' => $entity,
            'form'   => $form->createView(),
        );
    }
//Cette Route pour la page d'acceuil
    /**
     * @Route("/ind", name="cmd_ind")
     * @Method("GET")
     * @Template()
     */
    /**
     * Creates a form to delete a livre entity.
     *
     * @param livre $livre The livre entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm(livre $livre)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('livre_delete', array('id' => $livre->getId())))
            ->setMethod('DELETE')
            ->getForm()
        ;
    }

}

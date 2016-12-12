<?php

namespace LucieDesaintBundle\Controller;

use LucieDesaintBundle\Entity\Artiste;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;

/**
 * Artiste controller.
 *
 */
class ArtisteController extends Controller
{
    /**
     * Lists all artiste entities.
     *
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $artistes = $em->getRepository('LucieDesaintBundle:Artiste')->findAll();

        return $this->render('artiste/index.html.twig', array(
            'artistes' => $artistes,
        ));
    }

    /**
     * Creates a new artiste entity.
     *
     */
    public function newAction(Request $request)
    {
        $artiste = new Artiste();
        $form = $this->createForm('LucieDesaintBundle\Form\ArtisteType', $artiste);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($artiste);
            $em->flush($artiste);

            return $this->redirectToRoute('artiste_show', array('id' => $artiste->getId()));
        }

        return $this->render('artiste/new.html.twig', array(
            'artiste' => $artiste,
            'form' => $form->createView(),
        ));
    }

    /**
     * Finds and displays a artiste entity.
     *
     */
    public function showAction(Artiste $artiste)
    {
        $deleteForm = $this->createDeleteForm($artiste);

        return $this->render('artiste/show.html.twig', array(
            'artiste' => $artiste,
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Displays a form to edit an existing artiste entity.
     *
     */
    public function editAction(Request $request, Artiste $artiste)
    {
        $deleteForm = $this->createDeleteForm($artiste);
        $editForm = $this->createForm('LucieDesaintBundle\Form\ArtisteType', $artiste);
        $editForm->handleRequest($request);

        if ($editForm->isSubmitted() && $editForm->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('artiste_edit', array('id' => $artiste->getId()));
        }

        return $this->render('artiste/edit.html.twig', array(
            'artiste' => $artiste,
            'edit_form' => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Deletes a artiste entity.
     *
     */
    public function deleteAction(Request $request, Artiste $artiste)
    {
        $form = $this->createDeleteForm($artiste);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->remove($artiste);
            $em->flush($artiste);
        }

        return $this->redirectToRoute('artiste_index');
    }

    /**
     * Creates a form to delete a artiste entity.
     *
     * @param Artiste $artiste The artiste entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm(Artiste $artiste)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('artiste_delete', array('id' => $artiste->getId())))
            ->setMethod('DELETE')
            ->getForm()
        ;
    }
}

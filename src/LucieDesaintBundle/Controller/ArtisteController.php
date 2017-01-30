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

        return $this->render('@LucieDesaint/admin/artiste/index.html.twig', array(
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
            $em->flush();

            return $this->redirectToRoute('artiste_show', array('id' => $artiste->getId()));
        }

        return $this->render('@LucieDesaint/admin/artiste/new.html.twig', array(
            'artiste' => $artiste,
            'form' => $form->createView(),
        ));
    }

    /**
     * Displays a form to edit an existing artiste entity.
     *
     */
    public function editAction(Request $request, Artiste $artiste)
    {
        $editForm = $this->createForm('LucieDesaintBundle\Form\ArtisteType', $artiste);
        $editForm->handleRequest($request);

        if ($editForm->isSubmitted() && $editForm->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $artistes = $em->getRepository('LucieDesaintBundle:Artiste')->findAll();
            $artiste->getImage()->preUpload();
            $em->persist($artiste);
            $em->flush();

            return $this->render('@LucieDesaint/admin/artiste/index.html.twig', array(
                'artistes' => $artistes,
            ));
        }

        return $this->render('@LucieDesaint/admin/artiste/edit.html.twig', array(
            'artiste' => $artiste,
            'edit_form' => $editForm->createView()
        ));
    }
}

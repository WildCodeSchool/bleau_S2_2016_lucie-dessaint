<?php

namespace LucieDesaintBundle\Controller;

use LucieDesaintBundle\Entity\Images;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

/**
 * Image controller.
 *
 */
class ImagesController extends Controller
{
    /**
     * Lists all image entities.
     *
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $images = $em->getRepository('LucieDesaintBundle:Images')->findAll();

        return $this->render('@LucieDesaint/admin/images/index.html.twig', array(
            'images' => $images,
        ));
    }

    /**
     * Creates a new image entity.
     *
     */
    public function newAction(Request $request)
    {
        $image = new Images();
        $form = $this->createForm('LucieDesaintBundle\Form\ImagesType', $image);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($image);
            $em->flush($image);

            return $this->redirectToRoute('images_show', array('id' => $image->getId()));
        }

        return $this->render('@LucieDesaint/admin/images/new.html.twig', array(
            'image' => $image,
            'form' => $form->createView(),
        ));
    }

    /**
     * Finds and displays a image entity.
     *
     */
    public function showAction(Images $image)
    {
        $deleteForm = $this->createDeleteForm($image);

        return $this->render('@LucieDesaint/admin/images/show.html.twig', array(
            'image' => $image,
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Displays a form to edit an existing image entity.
     *
     */
    public function editAction(Request $request, Images $image)
    {
        $deleteForm = $this->createDeleteForm($image);
        $editForm = $this->createForm('LucieDesaintBundle\Form\ImagesType', $image);
        $editForm->handleRequest($request);

        if ($editForm->isSubmitted() && $editForm->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('images_edit', array('id' => $image->getId()));
        }

        return $this->render('@LucieDesaint/admin/images/edit.html.twig', array(
            'image' => $image,
            'edit_form' => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Deletes a image entity.
     *
     */
    public function deleteAction(Request $request, Images $image)
    {
        $form = $this->createDeleteForm($image);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->remove($image);
            $em->flush($image);
        }

        return $this->redirectToRoute('images_index');
    }

    /**
     * Creates a form to delete a image entity.
     *
     * @param Images $image The image entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm(Images $image)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('images_delete', array('id' => $image->getId())))
            ->setMethod('DELETE')
            ->getForm()
        ;
    }
}

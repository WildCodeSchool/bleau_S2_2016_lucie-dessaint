<?php

namespace LucieDesaintBundle\Controller;

use LucieDesaintBundle\Entity\Produit;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;

/**
 * Produit controller.
 *
 */
class ProduitController extends Controller
{
    /**
     * Lists all produit entities.
     *
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $produits = $em->getRepository('LucieDesaintBundle:Produit')->findAll();

        return $this->render('@LucieDesaint/admin/produit/index.html.twig', array(
            'produits' => $produits,
        ));
    }

    /**
     * Creates a new produit entity.
     *
     */
    public function newAction(Request $request)
    {
        $produit = new Produit();
        $form = $this->createForm('LucieDesaintBundle\Form\ProduitType', $produit);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($produit);
            $em->flush();

            return $this->redirectToRoute('produit_show', array('id' => $produit->getId()));
        }

        return $this->render('@LucieDesaint/admin/produit/new.html.twig', array(
            'produit' => $produit,
            'form' => $form->createView(),
        ));
    }

    /**
     * Finds and displays a produit entity.
     *
     */
    public function showAction(Produit $produit)
    {
        return $this->render('@LucieDesaint/admin/produit/show.html.twig', array(
            'produit' => $produit,
        ));
    }

    /**
     * Displays a form to edit an existing produit entity.
     *
     */
    public function editAction(Request $request, Produit $produit)
    {
        $editForm = $this->createForm('LucieDesaintBundle\Form\ProduitType', $produit);
        $editForm->handleRequest($request);

        if ($editForm->isSubmitted() && $editForm->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('produit_show', array('id' => $produit->getId()));
        }

        return $this->render('@LucieDesaint/admin/produit/edit.html.twig', array(
            'produit' => $produit,
            'edit_form' => $editForm->createView(),
        ));
    }

    public function deleteAction(Produit $produit){
        $em = $this->getDoctrine()->getManager();
        $img = $em->getRepository('LucieDesaintBundle:Images')->findOneById($produit->getImage()->getId());
        $em->remove($produit);
        $em->remove($img);
        $em->flush();
        return $this->redirectToRoute('produit_index');
    }

//    /**
//     * Deletes a produit entity.
//     *
//     */
//    public function deleteAction(Request $request, Produit $produit)
//    {
//        $form = $this->createDeleteForm($produit);
//        $form->handleRequest($request);
//
//        if ($form->isSubmitted() && $form->isValid()) {
//            $em = $this->getDoctrine()->getManager();
//            $em->remove($produit);
//            $em->flush();
//        }
//
//        return $this->redirectToRoute('produit_index');
//    }
//
//    /**
//     * Creates a form to delete a produit entity.
//     *
//     * @param Produit $produit The produit entity
//     *
//     * @return \Symfony\Component\Form\Form The form
//     */
//    private function createDeleteForm(Produit $produit)
//    {
//        return $this->createFormBuilder()
//            ->setAction($this->generateUrl('produit_delete', array('id' => $produit->getId())))
//            ->setMethod('DELETE')
//            ->getForm()
//        ;
//    }
}

<?php

namespace LucieDesaintBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class DefaultController extends Controller
{
    public function indexAction()
    {
        return $this->render('LucieDesaintBundle:Default:index.html.twig');
    }

    public function artAction()
    {
        return $this->render('@LucieDesaint/Default/art.html.twig');
    }

    public function bijouxAction() {

        $em = $this->getDoctrine()->getManager();
        $produits = $em->getRepository('LucieDesaintBundle:Produit')->findAll();

        return $this->render('@LucieDesaint/Default/bijoux.html.twig', array(
            'produits' => $produits,
        ));
    }

    public function artisteAction(){

        $em = $this->getDoctrine()->getManager();
        $artistes = $em->getRepository('LucieDesaintBundle:Artiste')->findAll();

        return $this->render('@LucieDesaint/Default/artiste.html.twig', array(
            'artistes' => $artistes,
        ));
    }

    public function contactAction()
    {
        return $this->render('@LucieDesaint/Default/contact.html.twig');
    }

    public function layoutAction()
    {
        return $this->render('@LucieDesaint/Default/layout.html.twig');
    }
}

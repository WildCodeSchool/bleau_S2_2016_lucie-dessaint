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
        $em = $this->getDoctrine()->getManager();
        $tableaux = $em->getRepository('LucieDesaintBundle:Produit')->findByCategories(1);

        return $this->render('@LucieDesaint/Default/art.html.twig', array(
            'tableaux' => $tableaux
        ));
    }

    public function bijouxAction()
    {
        return $this->render('@LucieDesaint/Default/bijoux.html.twig');
    }

    public function artisteAction()
    {
        return $this->render('@LucieDesaint/Default/artiste.html.twig');
    }

    public function contactAction()
    {
        return $this->render('@LucieDesaint/Default/contact.html.twig');
    }
}

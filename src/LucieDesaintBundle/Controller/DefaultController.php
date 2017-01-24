<?php

namespace LucieDesaintBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;


class DefaultController extends Controller
{
    public function indexAction(Request $request) {
        $em = $this->getDoctrine()->getManager();
        $actualites = $em->getRepository('LucieDesaintBundle:Actualites')->findAll();

        $request->setlocale('fr');

        return $this->render('LucieDesaintBundle:Default:index.html.twig', array(
            'actualites' => $actualites,
        ));
    }

    public function artAction() {

        $em = $this->getDoctrine()->getManager();
        $categorie = $em->getRepository('LucieDesaintBundle:Categories')->findOneByLabel('tableau');
        $produits = $em->getRepository('LucieDesaintBundle:Produit')->findByCategorie($categorie);

        return $this->render('@LucieDesaint/Default/art.html.twig', array(
            'produits' => $produits,
        ));
    }

    public function bijouxAction() {

        $em = $this->getDoctrine()->getManager();
        $categorie = $em->getRepository('LucieDesaintBundle:Categories')->findOneByLabel('bijoux');
        $produits = $em->getRepository('LucieDesaintBundle:Produit')->findByCategorie($categorie);

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

}

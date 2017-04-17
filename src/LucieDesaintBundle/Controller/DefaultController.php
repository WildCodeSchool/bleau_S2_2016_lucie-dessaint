<?php

namespace LucieDesaintBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;


class DefaultController extends Controller
{

    public function setLocaleAction($locale, Request $request){

        // some logic to determine the $locale
        $request->setLocale($locale);
        return $this->redirectToRoute('lucie_desaint_homepage');
    }

    public function indexAction() {
        $em = $this->getDoctrine()->getManager();
        $actualites = $em->getRepository('LucieDesaintBundle:Actualites')->findAll();
        $imagesTableaux = $em->getRepository('LucieDesaintBundle:Produit')->getCateg('Tableaux');
        $imagesBijoux = $em->getRepository('LucieDesaintBundle:Produit')->getCateg('Bijoux');

        return $this->render('LucieDesaintBundle:Default:index.html.twig', array(
            'actualites' => $actualites,
            'imagesTableaux' => $imagesTableaux,
            'imagesBijoux' => $imagesBijoux
        ));
    }

    public function artAction() {

        $em = $this->getDoctrine()->getManager();
        $categorie = $em->getRepository('LucieDesaintBundle:Categories')->findOneBy(array(
            'label_fr' => 'tableau'
        ));
        $produits = $em->getRepository('LucieDesaintBundle:Produit')->findByCategorie($categorie);

        return $this->render('@LucieDesaint/Default/art.html.twig', array(
            'produits' => $produits,
        ));
    }

    public function bijouxAction() {

        $em = $this->getDoctrine()->getManager();
        $categorie = $em->getRepository('LucieDesaintBundle:Categories')->findOneBy(array(
            'label_fr' => 'bijoux'
        ));
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

//    public function newsletterAction()
//    {
//        return $this->render('@LucieDesaint/Default/newsletter.html.twig');
//    }


}

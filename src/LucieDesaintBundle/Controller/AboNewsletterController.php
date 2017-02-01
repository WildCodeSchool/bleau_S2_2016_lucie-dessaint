<?php

namespace LucieDesaintBundle\Controller;

use LucieDesaintBundle\Entity\AboNewsletter;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;

/**
 * Abonewsletter controller.
 *
 */
class AboNewsletterController extends Controller
{
    public function newAction(){
        $mail = $_POST['email'];
        if ($mail != '') {
            $em = $this->getDoctrine()->getManager();
            $aboNewsletter = new AboNewsletter();
            $aboNewsletter->setEmail($mail);
            $em->persist($aboNewsletter);
            $em->flush();
            $this->addFlash(
                'notice',
                'Vous êtes bien enregistré à la Newsletter'
            );
        }
        else{
            $this->addFlash(
                'notice',
                'Veuillez renseigner une adresse email valide'
            );
        }
        return $this->redirectToRoute('lucie_desaint_homepage');
    }
}

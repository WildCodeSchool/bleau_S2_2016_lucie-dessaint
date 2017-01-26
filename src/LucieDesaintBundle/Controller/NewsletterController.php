<?php
/**
 * Created by PhpStorm.
 * User: apprenti
 * Date: 16/01/17
 * Time: 14:11
 */

namespace LucieDesaintBundle\Controller;

use LucieDesaintBundle\Entity\Newsletter;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class NewsletterController extends Controller
{

    public function newsletterAction() {
        $newsletter = new Newsletter();
        $em = $this->getDoctrine()->getManager();
        $email = $_POST['email'];

        $newsletter->setEmail($email);

        $em->persist($newsletter);
        $em->flush();

        return $this->redirectToRoute('lucie_desaint_homepage');
    }
/*        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($newsletter);
            $em->flush($newsletter);
            return $this->redirectToRoute('newsletter_show', array('id' => $newsletter->getId()));
        }*/


//        $form = $this->createForm(new $contact);


        //if ($contact->isSubmitted() && $contact>isValid()) {
/*
            $name = $newsletter[0];

            $message = \Swift_Message::newInstance()
                ->setSubject('Mail de '. $name)
                ->setFrom('projetmooc1@gmail.com')
                ->setTo($newsletter[1])
                ->setBody(
                    $this->renderView(
                    // app/Resources/views/Emails/registration.html.twig
                        '@LucieDesaint/Default/retour-mail.html.twig',
                        array('name' => $name,)
                    ),
                    'text/html'
                )
            ;
            $this->get('mailer')->send($message);

//            Rendu pour l'emmeteur du message

                $message = \Swift_Message::newInstance()
                    ->setSubject('Mail de '. $name)
                    ->setFrom('projetmooc1@gmail.com')
                    ->setTo('usa.pascal@yahoo.fr')
                    ->setBody(
                        $this->renderView(
                        // app/Resources/views/Emails/registration.html.twig
                            '@LucieDesaint/Default/retour-mail.html.twig',
                            array('name' => $name,
                                'mail' => $newsletter[1],
                                'text' => $newsletter[2],)
                        ),
                        'text/html'
                    )
                ;

            $this->get('mailer')->send($message);
        //}

        return $this->render('@LucieDesaint/Default/emetteur-mail.html.twig', array(
            'name' => $name,
            'mail' => $newsletter[1],
            'text' => $newsletter[2],
        ));
    }*/

}

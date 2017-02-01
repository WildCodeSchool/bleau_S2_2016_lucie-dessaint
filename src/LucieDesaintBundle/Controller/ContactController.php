<?php
/**
 * Created by PhpStorm.
 * User: apprenti
 * Date: 16/01/17
 * Time: 14:11
 */

namespace LucieDesaintBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class ContactController extends Controller
{

    public function envoiAction()
    {
        $name = $_POST['first_name'];
        $email = $_POST['email'];
        $message = $_POST['message'];
        $from = $this->getParameter('mailer_user');

        $message_from = \Swift_Message::newInstance()
            ->setSubject('Récapitulatif de votre message')
            ->setFrom(array($from => 'Lucie Dessaint'))
            ->setTo($email)
            ->setBody(
                $this->renderView(
                    '@LucieDesaint/Default/emetteur-mail.html.twig',
                    array('name' => $name,
                        'mail' => $email,
                        'text' => $message
                    ,)
                ),
                'text/html'
            )
        ;
        $this->get('mailer')->send($message_from);

//          Rendu pour l'emmeteur du message

        $message2 = \Swift_Message::newInstance()
            ->setSubject('Mail de '. $name)
            ->setFrom(array($from => 'Lucie Dessaint'))
            ->setTo($from)
            ->setBody(
                $this->renderView(
                    '@LucieDesaint/Default/retour-mail.html.twig',
                    array('name' => $name,
                        'mail' => $email,
                        'text' => $message
                    ,)
                ),
                'text/html'
            )
        ;

        $this->get('mailer')->send($message2);

        $this->addFlash(
            'notice',
            'Votre message a bien été envoyé'
        );
        return $this->redirectToRoute('lucie_desaint_homepage');
    }

}

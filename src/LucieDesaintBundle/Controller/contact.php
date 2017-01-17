<?php
/**
 * Created by PhpStorm.
 * User: apprenti
 * Date: 16/01/17
 * Time: 14:11
 */

namespace LucieDesaintBundle\Controller;


class contact
{
    public function ContactAction()
    {
        return $this->render('@LucieDesaint/Advert/contact.html.twig');
    }

    public function sendAction(Request $request)
    {
        $from = $this->getParameter('mailer_user');
// Instanciation des variables name, firstname, mail, sujet, msg pour récupérer la data
        $name = $request->request->get('nom');
        $mail = $request->request->get('e-mail');
        $sujet = $request->request->get('sujet');
        $msg = $request->request->get('msg');
// Instanciation d'un nouveau message vers l'administrateur avec la prise en compte des variables
        $message = \Swift_Message::newInstance()
            ->setSubject('Contact Lucie De Sain')
            ->setFrom(array($from => 'Lucie De Saint'))
            ->setTo($from)
            ->setBody(
                $this->renderView(
                    '@Chouettes/user/mail.html.twig',
                    array(
                        'nom' => $name,
                        'e-mail' => $mail,
                        'sujet' => $sujet,
                        'message' => $msg
                    )
                ),
                'text/html'
            );
}


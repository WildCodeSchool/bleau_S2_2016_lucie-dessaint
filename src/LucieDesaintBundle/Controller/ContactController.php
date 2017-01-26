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

        $contact = array();
        $contact[] = $_POST['first_name'];
        $contact[] = $_POST['email'];
        $contact[] = $_POST['message'];

//        $form = $this->createForm(new $contact);


        //if ($contact->isSubmitted() && $contact>isValid()) {

            $name = $contact[0];

            $message = \Swift_Message::newInstance()
                ->setSubject('Mail de '. $name)
                ->setFrom('projetmooc1@gmail.com')
                ->setTo($contact[1])
                ->setBody(
                    $this->renderView(
                    // app/Resources/views/Emails/registration.html.twig
                        '@LucieDesaint/Default/retour-mail.html.twig',
                        array('name' => $name,
                            'mail' => $contact[1],
                            'text' => $contact[2],)
                    ),
                    'text/html'
                )
            ;
            $this->get('mailer')->send($message);

//            Rendu pour l'emmeteur du message

                $message = \Swift_Message::newInstance()
                    ->setSubject('Mail de '. $name)
                    ->setFrom('projetmooc1@gmail.com')
//                    ->setTo('usa.pascal@yahoo.fr')
                    ->setBody(
                        $this->renderView(
                        // app/Resources/views/Emails/registration.html.twig
                            '@LucieDesaint/Default/retour-mail.html.twig',
                            array('name' => $name,
                                'mail' => $contact[1],
                                'text' => $contact[2],)
                        ),
                        'text/html'
                    )
                ;

            $this->get('mailer')->send($message);
        //}

        return $this->render('@LucieDesaint/Default/emetteur-mail.html.twig', array(
            'name' => $name,
            'mail' => $contact[1],
            'text' => $contact[2],
        ));
    }

}

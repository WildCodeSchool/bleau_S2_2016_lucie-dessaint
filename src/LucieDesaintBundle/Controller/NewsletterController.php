<?php

namespace LucieDesaintBundle\Controller;

use LucieDesaintBundle\Entity\AboNewsletter;
use LucieDesaintBundle\Entity\Newsletter;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;

/**
 * Newsletter controller.
 *
 */
class NewsletterController extends Controller
{
    /**
     * Lists all newsletter entities.
     *
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $newsletters = $em->getRepository('LucieDesaintBundle:Newsletter')->findAll();

        return $this->render('@LucieDesaint/admin/newsletter/index.html.twig', array(
            'newsletters' => $newsletters,
        ));
    }

    /**
     * Creates a new newsletter entity.
     *
     */
    public function newAction(Request $request)
    {
        $newsletter = new Newsletter();
        $form = $this->createForm('LucieDesaintBundle\Form\NewsletterType', $newsletter);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $newsletter->setStatus(false);
            $em->persist($newsletter);
            $em->flush($newsletter);

            return $this->redirectToRoute('newsletter_show', array('id' => $newsletter->getId()));
        }

        return $this->render('@LucieDesaint/admin/newsletter/new.html.twig', array(
            'newsletter' => $newsletter,
            'form' => $form->createView(),
        ));
    }

    /**
     * Finds and displays a newsletter entity.
     *
     */
    public function showAction(Newsletter $newsletter)
    {
        $deleteForm = $this->createDeleteForm($newsletter);

        return $this->render('@LucieDesaint/admin/newsletter/show.html.twig', array(
            'newsletter' => $newsletter,
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Displays a form to edit an existing newsletter entity.
     *
     */
    public function editAction(Request $request, Newsletter $newsletter)
    {
        $deleteForm = $this->createDeleteForm($newsletter);
        $editForm = $this->createForm('LucieDesaintBundle\Form\NewsletterType', $newsletter);
        $editForm->handleRequest($request);

        if ($editForm->isSubmitted() && $editForm->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('newsletter_edit', array('id' => $newsletter->getId()));
        }

        return $this->render('@LucieDesaint/admin/newsletter/edit.html.twig', array(
            'newsletter' => $newsletter,
            'edit_form' => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Deletes a newsletter entity.
     *
     */
    public function deleteAction(Request $request, Newsletter $newsletter)
    {
        $form = $this->createDeleteForm($newsletter);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->remove($newsletter);
            $em->flush($newsletter);
        }

        return $this->redirectToRoute('newsletter_index');
    }

    /**
     * Creates a form to delete a newsletter entity.
     *
     * @param Newsletter $newsletter The newsletter entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm(Newsletter $newsletter)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('newsletter_delete', array('id' => $newsletter->getId())))
            ->setMethod('DELETE')
            ->getForm()
        ;
    }

    public function sendNewsAction(Newsletter $newsletter)
    {
        $em = $this->getDoctrine()->getManager();
        $abonnes = $em->getRepository('LucieDesaintBundle:AboNewsletter')->findAll();

        //Structure du mail à enovyer
        $from = $this->getParameter('mailer_user');

        $emails=[];

        foreach ($abonnes as $value) {
            $emails[] = $value->getEmail();
        }
        $titre = $newsletter->getTitre();
        $content = $newsletter->getContent();

        $message = \Swift_Message::newInstance();
        $cid = $message->embed(\Swift_Image::fromPath('../web/bundles/luciedesaint/images/new-logo-lucie_mail.png'));
        $message
            ->setSubject($titre)
            ->setFrom(array($from => 'Lucie De Saint'))
            ->setBcc($emails)
            ->setBody(
                $this->renderView(
                    '@LucieDesaint/Default/newsletter_template.html.twig',
                    array(
                        'titre' => $titre,
                        'cid' => $cid,
                        'content' => $content,
                    )
                ),
                'text/html'
            );
        $this->get('mailer')->send($message);

        $newsletter->setStatus(true);
        $em->persist($newsletter);
        $em->flush();

        $this->addFlash(
            'notice',
            'La newsletter a bien été envoyé'
        );

        //Renvoie vers la vue index, avec "newsletter envoyée cochée"
        return $this->redirectToRoute('newsletter_index');
    }


    public function getAllAboAction(){
        $em = $this->getDoctrine()->getManager();
        $users = $em->getRepository('LucieDesaintBundle:AboNewsletter')->findAll();
        return $this->render('@LucieDesaint/admin/newsletter/list_abonné.html.twig', array(
            'users' => $users
        ));
    }

    public function deleteAbonneAction(AboNewsletter $aboNewsletter){
        $em = $this->getDoctrine()->getManager();
        $em->remove($aboNewsletter);
        $em->flush();

        $this->addFlash(
            'notice',
            'L\'abonné a bien été supprimé'
        );

        return $this->redirectToRoute('newsletter_show_abonne');
    }
}

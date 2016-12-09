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
}

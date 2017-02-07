<?php

namespace LucieDesaintBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class FOSUserController extends Controller
{
    public function contactAction()
    {
        return $this->render('@FOSUser/Security/login.html.twig');
    }
}

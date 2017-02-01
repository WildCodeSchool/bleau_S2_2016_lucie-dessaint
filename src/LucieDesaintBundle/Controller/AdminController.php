<?php
/**
 * Created by PhpStorm.
 * User: apprenti
 * Date: 13/12/16
 * Time: 12:26
 */

namespace LucieDesaintBundle\Controller;

use LucieDesaintBundle\LucieDesaintBundle;
use Sensio\Bundle\FrameworkExtraBundle\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;


class AdminController extends Controller
{
 public function indexAction()
 {
   return $this->render('@LucieDesaint/admin/index.html.twig');
 }
}
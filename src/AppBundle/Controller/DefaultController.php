<?php

namespace AppBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class DefaultController extends Controller
{
    public function indexAction()
    {
        return $this->render('AppBundle:Default:testRoom.html.twig');
    }

    public function chatAction()
    {
        return $this->render('AppBundle:Default:chatRoom.html.twig');
    }
}

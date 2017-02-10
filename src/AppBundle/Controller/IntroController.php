<?php

namespace AppBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class IntroController extends Controller
{
    public function indexAction()
    {
        return $this->render('AppBundle:Intro:index.html.twig');
    }

    public function companionAction()
    {
        return $this->render('AppBundle:Intro:companion.html.twig');
    }


    public function paymentAction()
    {
        return $this->render('AppBundle:Intro:payment.html.twig');
    }
}

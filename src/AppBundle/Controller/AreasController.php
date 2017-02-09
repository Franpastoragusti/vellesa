<?php

namespace AppBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class AreasController extends Controller
{
    public function healthAction()
    {
        return $this->render('AppBundle:Areas:health.html.twig');
    }

    public function enviromentAction()
    {
        return $this->render('AppBundle:Areas:enviroment.html.twig');
    }

    public function personalAction()
    {
        return $this->render('AppBundle:Areas:personal.html.twig');
    }

    public function familyAction()
    {
        return $this->render('AppBundle:Areas:family.html.twig');
    }

    public function issuesAction()
    {
        return $this->render('AppBundle:Areas:issues.html.twig');
    }

}

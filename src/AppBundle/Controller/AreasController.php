<?php

namespace AppBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;

class AreasController extends Controller
{
    public function healthAction(Request $request, $companion)
    {
      $companion_name = ucfirst($companion);

      $session = $request -> getSession();
      $session->set('companion_name', $companion_name);

      $session_companion_name = $session->get('companion_name');
      return $this->render('AppBundle:Areas:health.html.twig',array('companion' => $session_companion_name));
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

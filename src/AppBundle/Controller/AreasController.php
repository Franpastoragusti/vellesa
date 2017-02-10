<?php

namespace AppBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;

class AreasController extends Controller
{
    public function healthAction()
    {
      return $this->render('AppBundle:Areas:health.html.twig');
    }

    public function enviromentAction(Request $request)
    {
        $session = $request -> getSession();
        $session_companion_name = $session->get('companion_name');
        return $this->render('AppBundle:Areas:enviroment.html.twig',array('companion' => $session_companion_name));
    }

    public function personalAction(Request $request)
    {

        $session = $request -> getSession();
        $session_companion_name = $session->get('companion_name');
        return $this->render('AppBundle:Areas:personal.html.twig',array('companion' => $session_companion_name));
    }

    public function familyAction(Request $request)
    {
        $session = $request -> getSession();
        $session_companion_name = $session->get('companion_name');
        return $this->render('AppBundle:Areas:family.html.twig',array('companion' => $session_companion_name));
    }

}

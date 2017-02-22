<?php

namespace AppBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;

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

    public function setCookiesAction($companion)
    {

      if ($companion == 0) {
        $companion_name = "Eli";
        $companion_img = "/img/eli.jpg";
      }else {
        $companion_name = "Merce";
        $companion_img = "/img/merce.jpg";
      }

      $session = $this->get('session');

      $session->set('companion', array('companion_name' => $companion_name, 'companion_img' => $companion_img));

    return $this->redirectToRoute('Areas_health');
    }
}

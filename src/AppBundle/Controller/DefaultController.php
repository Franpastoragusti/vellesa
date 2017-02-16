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

    public function pdfAction()
    {
      $personal_data = $this->getDoctrine()->getRepository('AppBundle:PersonalData')->findBypersonclassId(1);
      $witness_data = $this->getDoctrine()->getRepository('AppBundle:PersonalData')->findBypersonclassId(2);
      $representant_data = $this->getDoctrine()->getRepository('AppBundle:PersonalData')->findBypersonclassId(3);

      //$name = $personal_data->getName();
      // $surname = $personal_data->getSurname();
      // $sip = $personal_data->getSip();
      // $phone = $personal_data->getPhone();
      // $dni = $personal_data->getDni();


        return $this->render('AppBundle:Default:pdf.html.twig', array(
          "personal_data" => $personal_data,
          "witness_data" => $witness_data,
          "representant_data" => $representant_data
        ));
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

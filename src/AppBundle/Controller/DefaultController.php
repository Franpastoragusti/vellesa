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

    public function pdfAction()
    {

      $user = $this->getUser()->getId();
      $em = $this->getDoctrine()->getManager();
      $query = $em->createQuery(
          'SELECT p AS personalData, d AS direction
          FROM AppBundle:PersonalData p, AppBundle:Direction d
          WHERE p.userId = :userId
          AND d.id = p.direction
          ORDER BY p.personclassId'
      )->setParameter('userId' , $user);


      $data=$query->getResult();

      $directionAplicant = $data[0]['personalData']->getDirection();
      $directionWitness1 = $data[2]['personalData']->getDirection();
      $directionWitness2 = $data[4]['personalData']->getDirection();
      $directionWitness3 = $data[6]['personalData']->getDirection();
      $directionRepresentant = $data[8]['personalData']->getDirection();

      $healthData = $this->getDoctrine()->getRepository('AppBundle:HealthArea')->findOneByuserId($user);
      $environmentData = $this->getDoctrine()->getRepository('AppBundle:EnvironmentArea')->findOneByuserId($user);
      $personalAreaData = $this->getDoctrine()->getRepository('AppBundle:PersonalArea')->findOneByuserId($user);
      $familyData = $this->getDoctrine()->getRepository('AppBundle:FamilyArea')->findOneByuserId($user);

        return $this->render('AppBundle:Default:pdf.html.twig', array(
          "applicant" => $data[0]['personalData'], 'directionAplicant' => $directionAplicant,
          "witness1" => $data[2]['personalData'], 'directionWitness1' => $directionWitness1,
          "witness2" => $data[4]['personalData'], 'directionWitness2' => $directionWitness2,
          "witness3" => $data[6]['personalData'], 'directionWitness3' => $directionWitness3,
          "representant" => $data[8]['personalData'], 'directionRepresentant' => $directionRepresentant,
          "healthData" => $healthData, 'environmentData' => $environmentData,
          "personalAreaData" => $personalAreaData, 'familyData' => $familyData
        ));
    }

    public function chatAction()
    {
        return $this->render('AppBundle:Default:chatRoom.html.twig');
    }

    public function setCookiesAction($companion, $help)
    {
      if ($companion == 0) {
        $companion_name = "Eli";
        $companion_img = "/img/eli.jpg";
        if ($help == 0) {
          $companion_help = "texto";
        }else {
          $companion_help = "audio";
        }
      }else {
        $companion_name = "Merce";
        $companion_img = "/img/merce.jpg";
        if ($help == 0) {
          $companion_help = "texto";
        }else {
          $companion_help = "audio";
        }
      }

      $session = $this->get('session');

      $session->set('companion', array('companion_name' => $companion_name, 'companion_img' => $companion_img,
      'companion_help' => $companion_help));

    return $this->redirectToRoute('Areas_health');
    }




}

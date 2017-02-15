<?php

namespace AppBundle\Controller;

use AppBundle\Entity\FamilyArea;
use AppBundle\Entity\Person;
use AppBundle\Entity\HealthArea;
use AppBundle\Form\FamilyAreaType;
use AppBundle\Form\HealthAreaType;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;


class AreasController extends Controller
{
    public function healthAction(Request $request)
    {
        $userId = $this->getUser()->getId();
        $healthData = $this->getDoctrine()->getRepository('AppBundle:HealthArea')->findOneByuserId($userId);

        //Si no encuentra registro de que el usuario ya ha hecho el formulario
        if ($healthData == null) {
            $healthData = new HealthArea();
         }

          $form = $this->createForm(HealthAreaType::class,$healthData);

          $form->handleRequest($request);

          if ($form->isSubmitted() && $form->isValid()) {

                $healthData = $form->getData();

                $user = $this->getUser();
                $healthData->setUserId($user);
                var_dump($user);

                /***TODO Controlar error**/
                $em = $this->getDoctrine()->getManager();
                $em->persist($healthData);
                $em->flush();

                return $this->redirectToRoute('Bureaucracy_menu', array('status'=>'OK'));
                //return $this->redirectToRoute('test_room', array('status'=>'OK'));
            }

        return $this->render('AppBundle:Areas:health.html.twig', array('form' => $form->createView()));
    }

    public function enviromentAction()
    {
        return $this->render('AppBundle:Areas:enviroment.html.twig');
    }

    public function personalAction()
    {

        return $this->render('AppBundle:Areas:personal.html.twig');
    }

    public function familyAction(Request $request)
    {
        //$familyData = new FamilyArea();
        $userId = $this->getUser()->getId();
        $familyData = $this->getDoctrine()->getRepository('AppBundle:FamilyArea')->findOneByuserId($userId);

        //Si no encuentra registro de que el usuario ya ha hecho el formulario
        if ($familyData == null) {
            $familyData = new FamilyArea();
         }else{

        $form = $this->createForm(FamilyAreaType::class,$familyData);

        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            // $form->getData() holds the submitted values

            $familyData = $form->getData();
            $user = $this->getUser();
            $familyData->setUserId($user);

            $em = $this->getDoctrine()->getManager();

            $em->persist($familyData);
            $em->flush();

            return $this->redirectToRoute('Bureaucracy_menu', array('status'=>'OK'));

        }
      }

        return $this->render('AppBundle:Areas:family.html.twig', array('form' => $form->createView()));
    }

}

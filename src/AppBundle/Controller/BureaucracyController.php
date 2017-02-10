<?php

namespace AppBundle\Controller;

use AppBundle\Entity\Direction;
use AppBundle\Entity\PersonalData;
use AppBundle\Form\DirectionType;
use AppBundle\Form\PersonalDataType;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

class BureaucracyController extends Controller
{



    public function indexAction()
    {
      return $this->render('AppBundle:Bureaucracy:index.html.twig');
    }

    public function representantAction(Request $request)
    {

        //return $this->render('AppBundle:Bureaucracy:representant.html.twig');
        #array('form' => $form->createView()) TODO

    }

    public function instanceAction()
    {
      return $this->render('AppBundle:Bureaucracy:instance.html.twig');
    }

    public function personalAction(Request $request)
    {

      $applicant = new PersonalData();
        $direction = new Direction();


      $form = $this->createForm(PersonalDataType::class, $applicant);
      $form->handleRequest($request);

        $formDir =  $this->createForm(DirectionType::class, $direction);
        $formDir->handleRequest($request);

      if ($form->isSubmitted() && $form->isValid()) {

          $file = $applicant->getDnifront();
          $file2 = $applicant->getDnibehind();
          $fileName = md5(uniqid()).'.'.$file->guessExtension();
          $fileName2 = md5(uniqid()).'.'.$file2->guessExtension();
          $file->move(
                $this->getParameter('dni_directory'),
                $fileName
            );
          $file2->move(
                $this->getParameter('dni_directory'),
                $fileName2
            );
          $applicant->setDnifront($fileName);
          $applicant->setDnibehind($fileName);
          $applicant = $form->getData();
          // ... perform some action, such as saving the task to the database
          // for example, if Task is a Doctrine entity, save it!
          $em = $this->getDoctrine()->getManager();
          $em->persist($applicant);
          $em->flush();

          return $this->redirectToRoute('FirstFase_witness');
      }

      return $this->render('AppBundle:Bureaucracy:personal.html.twig' , array(
          'form' => $form->createView(),
          'formDir' => $formDir->createView()
          ));

    }

    public function areasAction()
    {

    }
}

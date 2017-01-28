<?php

namespace AppBundle\Controller;

use AppBundle\Entity\Witness;
use AppBundle\Form\WitnessType;
use AppBundle\Entity\Applicant;
use AppBundle\Form\ApplicantType;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\JsonResponse;

class FirstFaseController extends Controller
{
    public function witnessAction(Request $request)
    {
      $witness = new Witness();
      $form1 = $this->createForm(WitnessType::class, $witness);
      $form2 = $this->createForm(WitnessType::class, $witness);
      $form3 = $this->createForm(WitnessType::class, $witness);
      $form1->handleRequest($request);
      $form2->handleRequest($request);
      $form3->handleRequest($request);
      if ($form3->isSubmitted() && $form3->isValid()) {
          // $form->getData() holds the submitted values

          // but, the original `$task` variable has also been updated
          $witness = $form3->getData();

          // ... perform some action, such as saving the task to the database
          // for example, if Task is a Doctrine entity, save it!
          $em = $this->getDoctrine()->getManager();
          $em->persist($witness);
          $em->flush();

          return $this->redirectToRoute('FirstFase_representant', array('status'=>'OK'));
      }

      return $this->render('AppBundle:FirstFase:witness.html.twig', array('form1' => $form1->createView(),'form2' => $form2->createView(),'form3' => $form3->createView()));

    }

    public function newWitnessAction(Request $request){
      $witness = new Witness();
      $connection = $this->getDoctrine()->getManager();
      $content = $request->getContent();
      $data = json_decode($content);
      $witness = $witness->deserialize($data, $witness);
      $connection->persist($witness);
      $connection->flush();
      if ($witness->getId() > 0) {
          $response = new JsonResponse(array('status' => 'ok'), 200);
      }else {
          $response = new JsonResponse(array('status' => 'ko'), 200);
      }
      echo $witness->getId();
      return $response;
    }




    public function indexAction()
    {
      return $this->render('AppBundle:FirstFase:index.html.twig');
    }

    public function representantAction()
    {
      return $this->render('AppBundle:FirstFase:representant.html.twig');
    }

    public function instanceAction()
    {
      return $this->render('AppBundle:FirstFase:instance.html.twig');
    }

    public function personalAction(Request $request)
    {

      $applicant = new Applicant();
      $form = $this->createForm(ApplicantType::class, $applicant);
      $form->handleRequest($request);
      if ($form->isSubmitted() && $form->isValid()) {
          // $form->getData() holds the submitted values

          // but, the original `$task` variable has also been updated
          $applicant = $form->getData();

          // ... perform some action, such as saving the task to the database
          // for example, if Task is a Doctrine entity, save it!
          $em = $this->getDoctrine()->getManager();
          $em->persist($applicant);
          $em->flush();

          return $this->redirectToRoute('FirstFase_witness');
      }

      return $this->render('AppBundle:FirstFase:personal.html.twig', array('form' => $form->createView()));
    }

    public function areasAction()
    {
      return $this->render('AppBundle:FirstFase:areas.html.twig');
    }
}

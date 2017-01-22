<?php

namespace AppBundle\Controller;

use AppBundle\Entity\Witness;
use AppBundle\Form\WitnessType;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\JsonResponse;

class FirstFaseController extends Controller
{
    public function witnessAction(Request $request)
    {
      $witness = new Witness();
      $form = $this->createForm(WitnessType::class, $witness);
      $form->handleRequest($request);
      return $this->render('AppBundle:FirstFase:witness.html.twig', array('form' => $form->createView()));

    }

    public function newWitnessAction(Request $request){
      $witness = new Witness();
      $connection = $this->getDoctrine()->getManager();
      $content = $request->getContent();
      $data = json_decode($content);
      $witness = $this->deserialize($data, $witness);
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


    public function deserialize($data, $witness)
    {
      $witness->setName($data->name);
      $witness->setSurname($data->surname);
      $witness->setAddres($data->addres);
      $witness->setCp($data->cp);
      $witness->setCity($data->city);
      $witness->setNumber($data->number);
      $witness->setrepresentant($data->representant);
      $witness->setPhone($data->phone);
      $witness->setUrldnifront($data->urldnifront);
      $witness->setUrldnibehind($data->urldnibehind);

      return $witness;
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

    public function personalAction()
    {
      return $this->render('AppBundle:FirstFase:personal.html.twig');
    }

    public function areasAction()
    {
      return $this->render('AppBundle:FirstFase:areas.html.twig');
    }
}

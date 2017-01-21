<?php

namespace AppBundle\Controller;

use AppBundle\Entity\Witness;
use AppBundle\Form\WitnessType;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;

class FirstFaseController extends Controller
{
    public function witnessAction(Request $request)
    {
      $witness = new Witness();
      $form = $this->createForm(WitnessType::class, $witness);
      $form->handleRequest($request);

      if ($form->isSubmitted() && $form->isValid()) {
          $em = $this->getDoctrine()->getManager();
          $em->persist($witness);
          $em->flush();

          return $this->redirect($this->generateUrl(
              'admin_post_show',
              array('id' => $witness->getId())
          ));
      }

      return $this->render('AppBundle:FirstFase:witness.html.twig', array('form' => $form->createView()));
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

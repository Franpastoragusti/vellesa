<?php

namespace AppBundle\Controller;

use AppBundle\Entity\Witness;
use AppBundle\Form\WitnessType;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;

class FirstFaseController extends Controller
{
    public function newAction(Request $request)
    {
        $post = new Witness();
        $form = $this->createForm(WitnessType::class, $post);

        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($post);
            $em->flush();

            return $this->redirect($this->generateUrl(
                'admin_post_show',
                array('id' => $post->getId())
            ));
        }

        return $this->render('AppBundle:Default:witness.html.twig', array('form' => $form->createView()));
    }

    public function witnessAction()
    {
      return $this->render('AppBundle:FirstFase:witness.html.twig');
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

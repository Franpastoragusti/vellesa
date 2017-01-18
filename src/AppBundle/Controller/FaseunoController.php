<?php

namespace AppBundle\Controller;

use AppBundle\Entity\Witness;
use AppBundle\Form\WitnessType;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;

class FaseunoController extends Controller
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
}

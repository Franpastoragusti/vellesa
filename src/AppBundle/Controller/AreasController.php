<?php

namespace AppBundle\Controller;

use AppBundle\Entity\FamilyArea;
use AppBundle\Form\FamilyAreaType;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;

class AreasController extends Controller
{
    public function healthAction()
    {
      return $this->render('AppBundle:Areas:health.html.twig');
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
        $familyData = new FamilyArea();

        $form = $this->createForm(FamilyAreaType::class,$familyData);

        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            // $form->getData() holds the submitted values
            // but, the original `$task` variable has also been updated
            $empresa = $form->getData();

            // ... perform some action, such as saving the task to the database
            // for example, if Task is a Doctrine entity, save it!
            $em = $this->getDoctrine()->getManager();
            $em->persist($empresa);
            $em->flush();

            return $this->redirectToRoute('Bureaucracy_menu', array('status'=>'OK'));
        }

        return $this->render('AppBundle:Areas:family.html.twig', array('form' => $form->createView()));
    }

}

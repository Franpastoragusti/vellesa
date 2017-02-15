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
        $healthData = new HealthArea();

        $form = $this->createForm(HealthAreaType::class,$healthData);

        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {

            $healthData = $form->getData();

            $user = $this->getUser();
            $healthData->setUserId($user);

            /***TODO Controlar error**/
            $em = $this->getDoctrine()->getManager();
            $em->persist($healthData);
            $em->flush();

            return $this->redirectToRoute('Bureaucracy_menu', array('status'=>'OK'));

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
        $familyData = new FamilyArea();

        $form = $this->createForm(FamilyAreaType::class,$familyData);

        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            // $form->getData() holds the submitted values


            $familyData = $form->getData();
            $familyData->setUserId($user);


            $em = $this->getDoctrine()->getManager();

//            insertando en tabla aparte
//            $personNames = $familyData->getBeloved();
//            foreach ($personNames as $personName) {
//                if ($personName != ''){
//                    $person = new Person();
//                    $person->setName($personName);
//                    $person->setType($familyData->getBasicActivities());
//                    $person->setUserId($user);
//                    $em->persist($person);
//                    $em->flush();
//                }
//            }


            // ... perform some action, such as saving the task to the database
            // for example, if Task is a Doctrine entity, save it!

            $em->persist($familyData);
            $em->flush();

            return $this->redirectToRoute('Bureaucracy_menu', array('status'=>'OK'));

        }

        return $this->render('AppBundle:Areas:family.html.twig', array('form' => $form->createView()));
    }

}

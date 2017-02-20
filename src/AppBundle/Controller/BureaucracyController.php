<?php

namespace AppBundle\Controller;

use AppBundle\Entity\Direction;
use AppBundle\Entity\PDF;
use AppBundle\Entity\PersonalData;
use AppBundle\Entity\PersonClass;
use AppBundle\Form\DirectionType;
use AppBundle\Form\PersonalDataType;
use AppBundle\Form\PersonType;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\Form\Extension\Core\Type\CollectionType;
use Symfony\Component\HttpFoundation\File\UploadedFile;

class BureaucracyController extends Controller
{



    public function indexAction()
    {
        $applicant = $this->checkPersonData(1);
        $witness1 = $this->checkPersonData(2);
        $witness2 = $this->checkPersonData(3);
        $witness3 = $this->checkPersonData(4);
        $representant = $this->checkPersonData(5);

        return $this->render('AppBundle:Bureaucracy:index.html.twig', array('applicant' => $applicant, 'witness1' =>$witness1, 'witness2' =>$witness2, 'witness3' =>$witness3, 'representant' =>$representant));
    }

    public function instanceAction()
    {
        $user = $this->getUser();
        $pdf = new PDF();
        $pdf->setUserId($user);
        $em = $this->getDoctrine()->getManager();
        $em->persist($pdf);
        $em->flush();



      return $this->render('AppBundle:Bureaucracy:instance.html.twig');
    }
    private function checkPersonData($number){
      $user = $this->getUser()->getId();
      $em = $this->getDoctrine()->getManager();
      $query = $em->createQuery(
          'SELECT p AS personalData
          FROM AppBundle:PersonalData p
          WHERE p.userId = :userId
          AND p.personclassId = :class'
      )->setParameter('userId' , $user)->setParameter('class' , $number);

      $personalData=$query->getResult();
      if ($personalData) {
        return 1;
      }else {
        return 0;
      }
    }

    public function officialDataAction($number, Request $request)
    {
        $user = $this->getUser()->getId();
        $em = $this->getDoctrine()->getManager();
        $query = $em->createQuery(
            'SELECT p AS personalData, d AS direction
            FROM AppBundle:PersonalData p, AppBundle:Direction d
            WHERE p.userId = :userId
            AND p.personclassId = :class
            AND d.id = p.direction'
        )->setParameter('userId' , $user)->setParameter('class' , $number);

        $personalData=$query->getResult();

        if ($personalData == null) {
            $personalData = new PersonalData();
            $direction = new Direction();

        }else{
            $direction = $personalData[0]['personalData']->getDirection();
            $personalData = $personalData[0]['personalData'];
        }

         $form = $this->createForm(PersonType::class, array('personalData' => $personalData, 'direction' =>$direction));

        switch ($number) {
            case 1:
                $title = "Tus Datos";
                break;
            case 2:
                $title = "Primer Testigo";
                break;
            case 3:
                $title = "Segundo Testigo";
                break;
            case 4:
                $title = "Tercer Testigo";
                break;
            case 5:
                $title = "Representante";
                break;
            default;
                $title = "No hay";
        }


        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {

            //Obtenemos los datos del formulario
            $personData = $form["personalData"] -> getData();
            $direction = $form["direction"] -> getData();

            //Guardamos el nombre de la iamgen en BBDD y la imagen en una carpeta
            $file = $personData->getDni();
            $fileName = md5(uniqid()) . '.' . $file->guessExtension();

            $file->move(
                $this->getParameter('dni_directory'),
                $fileName
            );

           $em = $this->getDoctrine()->getManager();
           //Obtenemos el usuario
           $user = $this->getUser();
           //obtenemos la referencia de la clase
           $class = $em->getReference('AppBundle\Entity\PersonClass', $number);

           //Seteamos la clase
           $personData->setPersonclassId($class);
           //seteamos el nombre del DNI
           $personData->setDni($fileName);
           //Seteamos el id_direccion
           $personData->setDirection($direction);
           //Seteamos el user_id_direccion
           $personData->setUserId($user);

            //Seteamos los nuevos datos en las tablas
           $em->persist($direction);
           $em->persist($personData);
           $em->flush();
          return $this->redirect("/app/bureaucracy/");
        }


      return $this->render('AppBundle:Bureaucracy:personal.html.twig' , array(
          'form' => $form->createView(),
          'number' => $number,
          'title' => $title
          ));

    }
}

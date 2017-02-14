<?php

namespace AppBundle\Controller;

use AppBundle\Entity\Direction;
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
            return $this->render('AppBundle:Bureaucracy:index.html.twig');
    }



    public function instanceAction()
    {
      return $this->render('AppBundle:Bureaucracy:instance.html.twig');
    }



    public function officialDataAction($number, Request $request)
    {

        $form = $this->createForm(PersonType::class);

        switch ($number) {
            case 0:
                $title = "Tus Datos";
                break;
            case 1:
                $title = "Primer Testigo";
                break;
            case 2:
                $title = "Segundo Testigo";
                break;
            case 3:
                $title = "Tercer Testigo";
                break;
            case 4:
                $title = "Representante";
                break;
            default;
                $title = "No hay";
        }

        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {

            //Obtenemos repositorios para los inserts
            $repositoryClass = $this->getDoctrine()->getRepository('AppBundle:PersonClass');

            //Obtenemos los datos del formulario
            $personData = $form["personalData"] -> getData();
            $direction = $form["direction"] -> getData();

            //Obtenemos la clase de persona en funcion del number de GET
            $class = $repositoryClass->find($number);


            //Guardamos el nombre de la iamgen en BBDD y la imagen en una carpeta
            $file = $personData->getDni();
            $fileName = md5(uniqid()) . '.' . $file->guessExtension();
            $file->move(
                $this->getParameter('dni_directory'),
                $fileName
            );

            //seteamos el nombre del DNI
            $personData->setDni($fileName);

            //Seteamos la clase de persona en la tabla PersonalData
            $personData->setPersonclassId($class);

            //Seteamos el id_direccion de persona en la tabla PersonalData
            $personData->setDirection($direction);


           $em = $this->getDoctrine()->getManager();

           //Seteamos los nuevos datos
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

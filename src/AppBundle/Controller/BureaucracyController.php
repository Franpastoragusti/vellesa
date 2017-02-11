<?php

namespace AppBundle\Controller;

use AppBundle\Entity\Direction;
use AppBundle\Entity\PersonalData;
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

        $personData = new PersonalData();
        $direction = new Direction();

        $mergedData = array(
            'personData'    => $personData,
            'direction' => $direction
        );

        $form = $this->createForm(PersonType::class, $mergedData);

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

        if ($form->isSubmitted()) {



            var_dump($form);


            /***TODO setear segun number el classid***/




            /*#Guardar imagen
                $file = $form['personalData']['dni']->getData();

                $extension =  $file->guessExtension();

                if (!$extension) {
                    // extension cannot be guessed
                    $extension = 'jpg';
                }
                $file->move('dni_directory', rand(1, 99999).'.'.$extension);
            #Fin de guardado de imagen



            // ... perform some action, such as saving the task to the database
            // for example, if Task is a Doctrine entity, save it!
            $em = $this->getDoctrine()->getManager();
            $em->persist($personData);
            $em->persist($direction);
            $em->flush();
            */
            return $this->redirectToRoute('/app/bureaucracy/');
        }


        $form->handleRequest($request);



      return $this->render('AppBundle:Bureaucracy:personal.html.twig' , array(
          'form' => $form->createView(),
          'number' => $number,
          'title' => $title
          ));

    }











    public function testAction($number, Request $request)
    {

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
        }

        $personData = new PersonalData();
        $direction = new Direction();
        $form = $this->createForm(PersonalDataType::class, $personData);
        $form->handleRequest($request);

        $formDir = $this->createForm(DirectionType::class, $direction);
        $formDir->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {



            //setear (number,users,class,direction)

            $file = $personData->getDnifront();
            $file2 = $personData->getDnibehind();
            $fileName = md5(uniqid()) . '.' . $file->guessExtension();
            $fileName2 = md5(uniqid()) . '.' . $file2->guessExtension();
            $file->move(
                $this->getParameter('dni_directory'),
                $fileName
            );
            $file2->move(
                $this->getParameter('dni_directory'),
                $fileName2
            );
            $personData->setDnifront($fileName);
            $personData->setDnibehind($fileName);
            $personData = $form->getData();
            // ... perform some action, such as saving the task to the database
            // for example, if Task is a Doctrine entity, save it!
            $em = $this->getDoctrine()->getManager();
            $em->persist($personData);
            $em->flush();

            return $this->redirectToRoute('');
        }
    }

}

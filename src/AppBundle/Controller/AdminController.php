<?php
/**
 * Created by PhpStorm.
 * User: sergioparau
 * Date: 17/2/17
 * Time: 23:45
 */

namespace AppBundle\Controller;

use JavierEguiluz\Bundle\EasyAdminBundle\Controller\AdminController as BaseAdminController;

class AdminController extends BaseAdminController
{

    public function pdfAction()
    {




        $id = $this->request->query->get('id');
        $entity = $this->em->getRepository('AppBundle:PDF')->find($id);
        $urlpdf= $entity ->getUrlpdf();
        $this->em->flush();


        return $this->render('AppBundle:Default:testRoom.html.twig', array(
            'id' => $id,  // IDUSUARIO
            'urlpdf' => $urlpdf,  //URL DE LA IMAGEN EN BASE DATOS TABLA PDF
            'entity' => $this->request->query->get('entity'),
        ));

    }

    public function googleMapsAction()
    {

     

    }

}
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

      $pdf = $this->getDoctrine()->getRepository('AppBundle:PDF')->findOneByid($id);

      if ($pdf == null) {
          $pdf = new PDF();
      }

      $userId = $pdf->getUserId();

      $FosUser = $this->getDoctrine()->getRepository('AppBundle:User')->findOneByid($userId);

      if ($FosUser == null) {
          $FosUser = new User();
      }

      $id= $FosUser->getId();

        $em = $this->getDoctrine()->getManager();
        $query = $em->createQuery(
            'SELECT p AS personalData, d AS direction
            FROM AppBundle:PersonalData p, AppBundle:Direction d
            WHERE p.userId = :userId
            AND d.id = p.direction
            ORDER BY p.personclassId'
        )->setParameter('userId' , $id);

        $data=$query->getResult();
        $directionAplicant = $data[0]['personalData']->getDirection();
        $directionWitness1 = $data[2]['personalData']->getDirection();
        $directionWitness2 = $data[4]['personalData']->getDirection();
        $directionWitness3 = $data[6]['personalData']->getDirection();
        $directionRepresentant = $data[8]['personalData']->getDirection();

        $healthData = $this->getDoctrine()->getRepository('AppBundle:HealthArea')->findOneByuserId($id);
        $environmentData = $this->getDoctrine()->getRepository('AppBundle:EnvironmentArea')->findOneByuserId($id);
        $personalAreaData = $this->getDoctrine()->getRepository('AppBundle:PersonalArea')->findOneByuserId($id);
        $familyData = $this->getDoctrine()->getRepository('AppBundle:FamilyArea')->findOneByuserId($id);

          return $this->render('AppBundle:Default:pdf.html.twig', array(
            "applicant" => $data[0]['personalData'], 'directionAplicant' => $directionAplicant,
            "witness1" => $data[2]['personalData'], 'directionWitness1' => $directionWitness1,
            "witness2" => $data[4]['personalData'], 'directionWitness2' => $directionWitness2,
            "witness3" => $data[6]['personalData'], 'directionWitness3' => $directionWitness3,
            "representant" => $data[8]['personalData'], 'directionRepresentant' => $directionRepresentant,
            "healthData" => $healthData, 'environmentData' => $environmentData,
            "personalAreaData" => $personalAreaData, 'familyData' => $familyData
          ));
    }



}

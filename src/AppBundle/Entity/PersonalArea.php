<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * PersonalArea
 *
 * @ORM\Table(name="personal_area")
 * @ORM\Entity(repositoryClass="AppBundle\Repository\PersonalAreaRepository")
 */
class PersonalArea
{
    /**
     * @var int
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * @ORM\OneToOne(targetEntity="User")
     * @ORM\JoinColumn(name="userId", referencedColumnName="id")
     */
    private $userId;



    /**
     * @var string
     *
     * @ORM\Column(name="importantDocuments", type="string", length=255)
     */
    private $importantDocuments;

    /**
     * @var string
     *
     * @ORM\Column(name="comunicateTo", type="string", length=255)
     */
    private $comunicateTo;

    /**
     * @var string
     *
     * @ORM\Column(name="emotionalLegacy", type="string", length=255)
     */
    private $emotionalLegacy;

    /**
     * @var string
     *
     * @ORM\Column(name="perfomDigitalTestament", type="string", length=255)
     */
    private $perfomDigitalTestament;

    /**
     * @var string
     *
     * @ORM\Column(name="observations", type="string", length=255)
     */
    private $observations;


    /**
     * Get id
     *
     * @return int
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set importantDocuments
     *
     * @param string $importantDocuments
     *
     * @return PersonalArea
     */
    public function setImportantDocuments($importantDocuments)
    {
        $this->importantDocuments = $importantDocuments;

        return $this;
    }

    /**
     * Get importantDocuments
     *
     * @return string
     */
    public function getImportantDocuments()
    {
        return $this->importantDocuments;
    }

    /**
     * Set comunicateTo
     *
     * @param string $comunicateTo
     *
     * @return PersonalArea
     */
    public function setComunicateTo($comunicateTo)
    {
        $this->comunicateTo = $comunicateTo;

        return $this;
    }

    /**
     * Get comunicateTo
     *
     * @return string
     */
    public function getComunicateTo()
    {
        return $this->comunicateTo;
    }

    /**
     * Set emotionalLegacy
     *
     * @param string $emotionalLegacy
     *
     * @return PersonalArea
     */
    public function setEmotionalLegacy($emotionalLegacy)
    {
        $this->emotionalLegacy = $emotionalLegacy;

        return $this;
    }

    /**
     * Get emotionalLegacy
     *
     * @return string
     */
    public function getEmotionalLegacy()
    {
        return $this->emotionalLegacy;
    }

    /**
     * Set perfomDigitalTestament
     *
     * @param string $perfomDigitalTestament
     *
     * @return PersonalArea
     */
    public function setPerfomDigitalTestament($perfomDigitalTestament)
    {
        $this->perfomDigitalTestament = $perfomDigitalTestament;

        return $this;
    }

    /**
     * Get perfomDigitalTestament
     *
     * @return string
     */
    public function getPerfomDigitalTestament()
    {
        return $this->perfomDigitalTestament;
    }

    /**
     * Set observations
     *
     * @param string $observations
     *
     * @return PersonalArea
     */
    public function setObservations($observations)
    {
        $this->observations = $observations;

        return $this;
    }

    /**
     * Get observations
     *
     * @return string
     */
    public function getObservations()
    {
        return $this->observations;
    }
    /**
     * Set userId
     *
     * @param \AppBundle\Entity\User $userId
     *
     * @return PersonalArea
     */
    public function setUserId(\AppBundle\Entity\User $userId = null)
    {
        $this->userId = $userId;

        return $this;
    }

    /**
     * Get userId
     *
     * @return \AppBundle\Entity\User
     */
    public function getUserId()
    {
        return $this->userId;
    }
}


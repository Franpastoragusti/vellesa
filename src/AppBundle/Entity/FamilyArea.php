<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * FamilyArea
 *
 * @ORM\Table(name="family_area")
 * @ORM\Entity(repositoryClass="AppBundle\Repository\FamilyAreaRepository")
 */
class FamilyArea
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
     * @var string
     *
     * @ORM\Column(name="beloved", type="string", length=255)
     */
    private $beloved;

    /**
     * @var array
     *
     * @ORM\Column(name="basicActivities", type="json_array")
     */
    private $basicActivities;

    /**
     * @var array
     *
     * @ORM\Column(name="instrumentActivities", type="json_array")
     */
    private $instrumentActivities;

    /**
     * @var array
     *
     * @ORM\Column(name="mentalFaculty", type="json_array")
     */
    private $mentalFaculty;

    /**
     * @var array
     *
     * @ORM\Column(name="visits", type="json_array")
     */
    private $visits;

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
     * Set beloved
     *
     * @param string $beloved
     *
     * @return FamilyArea
     */
    public function setBeloved($beloved)
    {
        $this->beloved = $beloved;

        return $this;
    }

    /**
     * Get beloved
     *
     * @return string
     */
    public function getBeloved()
    {
        return $this->beloved;
    }

    /**
     * Set basicActivities
     *
     * @param array $basicActivities
     *
     * @return FamilyArea
     */
    public function setBasicActivities($basicActivities)
    {
        $this->basicActivities = $basicActivities;

        return $this;
    }

    /**
     * Get basicActivities
     *
     * @return array
     */
    public function getBasicActivities()
    {
        return $this->basicActivities;
    }

    /**
     * Set instrumentActivities
     *
     * @param array $instrumentActivities
     *
     * @return FamilyArea
     */
    public function setInstrumentActivities($instrumentActivities)
    {
        $this->instrumentActivities = $instrumentActivities;

        return $this;
    }

    /**
     * Get instrumentActivities
     *
     * @return array
     */
    public function getInstrumentActivities()
    {
        return $this->instrumentActivities;
    }

    /**
     * Set mentalFaculty
     *
     * @param array $mentalFaculty
     *
     * @return FamilyArea
     */
    public function setMentalFaculty($mentalFaculty)
    {
        $this->mentalFaculty = $mentalFaculty;

        return $this;
    }

    /**
     * Get mentalFaculty
     *
     * @return array
     */
    public function getMentalFaculty()
    {
        return $this->mentalFaculty;
    }

    /**
     * Set visits
     *
     * @param array $visits
     *
     * @return FamilyArea
     */
    public function setVisits($visits)
    {
        $this->visits = $visits;

        return $this;
    }

    /**
     * Get visits
     *
     * @return array
     */
    public function getVisits()
    {
        return $this->visits;
    }

    /**
     * Set observations
     *
     * @param string $observations
     *
     * @return FamilyArea
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
}


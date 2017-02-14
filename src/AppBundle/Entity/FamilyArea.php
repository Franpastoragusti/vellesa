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
     * @ORM\ManyToOne(targetEntity="User")
     * @ORM\JoinColumn(name="user_id", referencedColumnName="id")
     */
    private $user_id;

    /**
     * @var array
     *
     * @ORM\Column(name="beloved", type="json_array")
     */
    private $beloved;

    /**
     * @var array
     *
     * @ORM\Column(name="profesionals", type="json_array")
     */
    private $profesionals;

    /**
     * @var int
     *
     * @ORM\Column(name="basicActivities", type="integer")
     */
    private $basicActivities;

    /**
     * @var int
     *
     * @ORM\Column(name="instrumentActivities", type="integer")
     */
    private $instrumentActivities;

    /**
     * @var boolean
     *
     * @ORM\Column(name="mentalFaculty", type="boolean")
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


    /**
     * Set userId
     *
     * @param \AppBundle\Entity\User $userId
     *
     * @return FamilyArea
     */
    public function setUserId(\AppBundle\Entity\User $userId = null)
    {
        $this->user_id = $userId;

        return $this;
    }

    /**
     * Get userId
     *
     * @return \AppBundle\Entity\User
     */
    public function getUserId()
    {
        return $this->user_id;
    }

    /**
     * Set profesionals
     *
     * @param array $profesionals
     *
     * @return FamilyArea
     */
    public function setProfesionals($profesionals)
    {
        $this->profesionals = $profesionals;

        return $this;
    }

    /**
     * Get profesionals
     *
     * @return array
     */
    public function getProfesionals()
    {
        return $this->profesionals;
    }
}

<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * healthArea
 *
 * @ORM\Table(name="health_area")
 * @ORM\Entity(repositoryClass="AppBundle\Repository\healthAreaRepository")
 */
class healthArea
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
     * @var array
     *
     * @ORM\Column(name="DecideMyself", type="json_array")
     */
    private $decideMyself;

    /**
     * @var array
     *
     * @ORM\Column(name="KnowAll", type="json_array")
     */
    private $knowAll;

    /**
     * @var string
     *
     * @ORM\Column(name="personInCharge", type="string", length=255)
     */
    private $personInCharge;

    /**
     * @var array
     *
     * @ORM\Column(name="beloved", type="json_array")
     */
    private $beloved;

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
     * Set decideMyself
     *
     * @param array $decideMyself
     *
     * @return healthArea
     */
    public function setDecideMyself($decideMyself)
    {
        $this->decideMyself = $decideMyself;

        return $this;
    }

    /**
     * Get decideMyself
     *
     * @return array
     */
    public function getDecideMyself()
    {
        return $this->decideMyself;
    }

    /**
     * Set knowAll
     *
     * @param array $knowAll
     *
     * @return healthArea
     */
    public function setKnowAll($knowAll)
    {
        $this->knowAll = $knowAll;

        return $this;
    }

    /**
     * Get knowAll
     *
     * @return array
     */
    public function getKnowAll()
    {
        return $this->knowAll;
    }

    /**
     * Set personInCharge
     *
     * @param string $personInCharge
     *
     * @return healthArea
     */
    public function setPersonInCharge($personInCharge)
    {
        $this->personInCharge = $personInCharge;

        return $this;
    }

    /**
     * Get personInCharge
     *
     * @return string
     */
    public function getPersonInCharge()
    {
        return $this->personInCharge;
    }

    /**
     * Set beloved
     *
     * @param array $beloved
     *
     * @return healthArea
     */
    public function setBeloved($beloved)
    {
        $this->beloved = $beloved;

        return $this;
    }

    /**
     * Get beloved
     *
     * @return array
     */
    public function getBeloved()
    {
        return $this->beloved;
    }

    /**
     * Set observations
     *
     * @param string $observations
     *
     * @return healthArea
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


<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * EnvironmentArea
 *
 * @ORM\Table(name="environment_area")
 * @ORM\Entity(repositoryClass="AppBundle\Repository\EnvironmentAreaRepository")
 */
class EnvironmentArea
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
     * @var array
     *
     * @ORM\Column(name="placetobe", type="json_array")
     */
    private $placetobe;

    /**
     * @var string
     *
     * @ORM\Column(name="expressLikes", type="string", length=255)
     */
    private $expressLikes;

    /**
     * @var array
     *
     * @ORM\Column(name="selfwill", type="json_array")
     */
    private $selfwill;

    /**
     * @var string
     *
     * @ORM\Column(name="Farewell", type="string", length=255)
     */
    private $farewell;

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
     * Set placetobe
     *
     * @param array $placetobe
     *
     * @return EnvironmentArea
     */
    public function setPlacetobe($placetobe)
    {
        $this->placetobe = $placetobe;

        return $this;
    }

    /**
     * Get placetobe
     *
     * @return array
     */
    public function getPlacetobe()
    {
        return $this->placetobe;
    }

    /**
     * Set expressLikes
     *
     * @param array $expressLikes
     *
     * @return EnvironmentArea
     */
    public function setExpressLikes($expressLikes)
    {
        $this->expressLikes = $expressLikes;

        return $this;
    }

    /**
     * Get expressLikes
     *
     * @return array
     */
    public function getExpressLikes()
    {
        return $this->expressLikes;
    }

    /**
     * Set selfwill
     *
     * @param array $selfwill
     *
     * @return EnvironmentArea
     */
    public function setSelfwill($selfwill)
    {
        $this->selfwill = $selfwill;

        return $this;
    }

    /**
     * Get selfwill
     *
     * @return array
     */
    public function getSelfwill()
    {
        return $this->selfwill;
    }

    /**
     * Set farewell
     *
     * @param string $farewell
     *
     * @return EnvironmentArea
     */
    public function setFarewell($farewell)
    {
        $this->farewell = $farewell;

        return $this;
    }

    /**
     * Get farewell
     *
     * @return string
     */
    public function getFarewell()
    {
        return $this->farewell;
    }

    /**
     * Set observations
     *
     * @param string $observations
     *
     * @return EnvironmentArea
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
     * @return EnvironmentArea
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

<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * Direction
 *
 * @ORM\Table(name="direction")
 * @ORM\Entity(repositoryClass="AppBundle\Repository\DirectionRepository")
 */
class Direction
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
     * @var int
     *
     * @ORM\Column(name="cp", type="integer")
     *
     * @Assert\NotBlank()
     * @Assert\Length(
     *      min = 5,
     *      max = 5,
     *      minMessage = "El codigo postal debe tener una longitud de  {{ limit }} números",
     *      maxMessage = "El codigo postal debe contener un máximo de  {{ limit }} números"
     * )
     */

    private $cp;

    /**
     * @var string
     *
     * @ORM\Column(name="city", type="string", length=255)
     * @Assert\NotBlank()
     */
    private $city;

    /**
     * @var string
     *
     * @ORM\Column(name="province", type="string", length=255)
     * @Assert\NotBlank()
     */
    private $province;

    /**
     * @var string
     *
     * @ORM\Column(name="route", type="string", length=255)
     * @Assert\NotBlank()
     */
    private $route;


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
     * Set cp
     *
     * @param integer $cp
     *
     * @return Direction
     */
    public function setCp($cp)
    {
        $this->cp = $cp;

        return $this;
    }

    /**
     * Get cp
     *
     * @return int
     */
    public function getCp()
    {
        return $this->cp;
    }

    /**
     * Set city
     *
     * @param string $city
     *
     * @return Direction
     */
    public function setCity($city)
    {
        $this->city = $city;

        return $this;
    }

    /**
     * Get city
     *
     * @return string
     */
    public function getCity()
    {
        return $this->city;
    }

    /**
     * Set province
     *
     * @param string $province
     *
     * @return Direction
     */
    public function setProvince($province)
    {
        $this->province = $province;

        return $this;
    }

    /**
     * Get province
     *
     * @return string
     */
    public function getProvince()
    {
        return $this->province;
    }

    /**
     * Set route
     *
     * @param string $route
     *
     * @return Direction
     */
    public function setRoute($route)
    {
        $this->route = $route;

        return $this;
    }

    /**
     * Get route
     *
     * @return string
     */
    public function getRoute()
    {
        return $this->route;
    }
}

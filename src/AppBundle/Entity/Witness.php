<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Witness
 *
 * @ORM\Table(name="witness")
 * @ORM\Entity(repositoryClass="AppBundle\Repository\WitnessRepository")
 */
class Witness
{
    /**
     * @var int
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     *
     */
    private $id;

    /**
     * @ORM\ManyToOne(targetEntity="User", inversedBy="witnesses")
     * @ORM\JoinColumn(name="user_id", referencedColumnName="id")
     */

    private $users;

    public  function getUsers(){
        return $this->users;
    }

    /**
     * @var string
     *
     * @ORM\Column(name="name", type="string", length=255)
     */
    private $name;

    /**
     * @var string
     *
     * @ORM\Column(name="surname", type="string", length=255)
     */
    private $surname;

    /**
     * @var string
     *
     * @ORM\Column(name="addres", type="string", length=255)
     */
    private $addres;

    /**
     * @var int
     *
     * @ORM\Column(name="cp", type="integer")
     */
    private $cp;

    /**
     * @var string
     *
     * @ORM\Column(name="city", type="string", length=255)
     */
    private $city;

    /**
     * @var int
     *
     * @ORM\Column(name="number", type="integer")
     */
    private $number;

    /**
     * @var bool
     *
     * @ORM\Column(name="representant", type="boolean")
     */
    private $representant;

    /**
     * @var int
     *
     * @ORM\Column(name="phone", type="integer")
     */
    private $phone;

    /**
     * @var string
     *
     * @ORM\Column(name="urldnifront", type="string", length=255)
     */
    private $urldnifront;

    /**
     * @var string
     *
     * @ORM\Column(name="urldnibehind", type="string", length=255)
     */
    private $urldnibehind;


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
     * Set name
     *
     * @param string $name
     *
     * @return Witness
     */
    public function setName($name)
    {
        $this->name = $name;

        return $this;
    }

    /**
     * Get name
     *
     * @return string
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * Set surname
     *
     * @param string $surname
     *
     * @return Witness
     */
    public function setSurname($surname)
    {
        $this->surname = $surname;

        return $this;
    }

    /**
     * Get surname
     *
     * @return string
     */
    public function getSurname()
    {
        return $this->surname;
    }

    /**
     * Set addres
     *
     * @param string $addres
     *
     * @return Witness
     */
    public function setAddres($addres)
    {
        $this->addres = $addres;

        return $this;
    }

    /**
     * Get addres
     *
     * @return string
     */
    public function getAddres()
    {
        return $this->addres;
    }

    /**
     * Set cp
     *
     * @param integer $cp
     *
     * @return Witness
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
     * @return Witness
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
     * Set number
     *
     * @param integer $number
     *
     * @return Witness
     */
    public function setNumber($number)
    {
        $this->number = $number;

        return $this;
    }

    /**
     * Get number
     *
     * @return int
     */
    public function getNumber()
    {
        return $this->number;
    }

    /**
     * Set representant
     *
     * @param boolean $representant
     *
     * @return Witness
     */
    public function setrepresentant($representant)
    {
        $this->representant = $representant;

        return $this;
    }

    /**
     * Get representant
     *
     * @return bool
     */
    public function getrepresentant()
    {
        return $this->representant;
    }

    /**
     * Set phone
     *
     * @param integer $phone
     *
     * @return Witness
     */
    public function setPhone($phone)
    {
        $this->phone = $phone;

        return $this;
    }

    /**
     * Get phone
     *
     * @return int
     */
    public function getPhone()
    {
        return $this->phone;
    }

    /**
     * Set urldnifront
     *
     * @param string $urldnifront
     *
     * @return Witness
     */
    public function setUrldnifront($urldnifront)
    {
        $this->urldnifront = $urldnifront;

        return $this;
    }

    /**
     * Get urldnifront
     *
     * @return string
     */
    public function getUrldnifront()
    {
        return $this->urldnifront;
    }

    /**
     * Set urldnibehind
     *
     * @param string $urldnibehind
     *
     * @return Witness
     */
    public function setUrldnibehind($urldnibehind)
    {
        $this->urldnibehind = $urldnibehind;

        return $this;
    }

    /**
     * Get urldnibehind
     *
     * @return string
     */
    public function getUrldnibehind()
    {
        return $this->urldnibehind;
    }

}

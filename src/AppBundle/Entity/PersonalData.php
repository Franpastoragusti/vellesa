<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * PersonalData
 *
 * @ORM\Table(name="personal_data")
 * @ORM\Entity(repositoryClass="AppBundle\Repository\PersonalDataRepository")
 */
class PersonalData
{
    /**
     * @var int
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * @ORM\ManyToOne(targetEntity="User")
     * @ORM\JoinColumn(name="user_id", referencedColumnName="id")
     */
    private $users;

    /**
     * @ORM\ManyToOne(targetEntity="Direction")
     * @ORM\JoinColumn(name="direction_id", referencedColumnName="id")
     */
    private $direction;

    /**
     * @ORM\ManyToOne(targetEntity="PersonClass")
     * @ORM\JoinColumn(name="personclass_id", referencedColumnName="id")
     */
    private $class;

    /**
     * @var string
     *
     * @ORM\Column(name="name", type="string", length=255)
     * @Assert\NotBlank()
     * @Assert\Regex(
     *     pattern = "/([A-ZÁÉÍÓÚ]{1}[a-zñáéíóú]{2,15}[\s]?)/",
     *     message = "EL nombre que ha escrito tiene menos de 4 caracteres"
     * )
     */
    private $name;

    /**
     * @var string
     *
     * @ORM\Column(name="surname", type="string", length=255)
     * @Assert\NotBlank()
     * @Assert\Regex(
     *     pattern = "/([A-ZÁÉÍÓÚ]{1}[a-zñáéíóú]{2,15}[\s]?)/",
     *     message = "EL apellido que ha escrito tiene menos de 4 caracteres"
     * )
     */
    private $surname;

    /**
     * @var string
     *
     * @ORM\Column(name="address", type="string", length=255)
     * @Assert\NotBlank()
     */
    private $address;


    /**
     * @var int
     *
     * @ORM\Column(name="phone", type="integer")
     * @Assert\NotBlank()
     * @Assert\Regex(
     *     pattern = "/^[9|6]{1}([\d]{2}[-]*){3}[\d]{2}$/",
     *     message = "El teléfono introducido no es válido"
     * )
     */
    private $phone;

    /**
     * @var int
     *
     * @ORM\Column(name="number", type="integer")
     * @Assert\NotBlank()
     */
    private $number;

    /**
     * @var string
     *
     * @ORM\Column(name="dnifront", type="string", length=255)
     */
    private $dnifront;
    

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
     * @return PersonalData
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
     * @return PersonalData
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
     * Set address
     *
     * @param string $address
     *
     * @return PersonalData
     */
    public function setAddress($address)
    {
        $this->address = $address;

        return $this;
    }

    /**
     * Get address
     *
     * @return string
     */
    public function getAddress()
    {
        return $this->address;
    }

    /**
     * Set cp
     *
     * @param integer $cp
     *
     * @return PersonalData
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
     * @return PersonalData
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
     * Set type
     *
     * @param string $type
     *
     * @return PersonalData
     */
    public function setType($type)
    {
        $this->type = $type;

        return $this;
    }

    /**
     * Get type
     *
     * @return string
     */
    public function getType()
    {
        return $this->type;
    }

    /**
     * Set phone
     *
     * @param integer $phone
     *
     * @return PersonalData
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
     * Set dnifront
     *
     * @param string $dnifront
     *
     * @return PersonalData
     */
    public function setDnifront($dnifront)
    {
        $this->dnifront = $dnifront;

        return $this;
    }

    /**
     * Get dnifront
     *
     * @return string
     */
    public function getDnifront()
    {
        return $this->dnifront;
    }


    /**
     * Set province
     *
     * @param string $province
     *
     * @return PersonalData
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
     * Set users
     *
     * @param \AppBundle\Entity\User $users
     *
     * @return PersonalData
     */
    public function setUsers(\AppBundle\Entity\User $users = null)
    {
        $this->users = $users;

        return $this;
    }

    /**
     * Get users
     *
     * @return \AppBundle\Entity\User
     */
    public function getUsers()
    {
        return $this->users;
    }

    /**
     * Set id
     *
     * @param integer $id
     *
     * @return PersonalData
     */
    public function setId($id)
    {
        $this->id = $id;

        return $this;
    }

    /**
     * Set number
     *
     * @param integer $number
     *
     * @return PersonalData
     */
    public function setNumber($number)
    {
        $this->number = $number;

        return $this;
    }

    /**
     * Get number
     *
     * @return integer
     */
    public function getNumber()
    {
        return $this->number;
    }

    public function deserialize($data, $witness)
    {
      $witness->setName($data->name);
      $witness->setSurname($data->surname);
      $witness->setAddress($data->addres);
      $witness->setCp($data->cp);
      $witness->setCity($data->city);
      $witness->setNumber($data->number);
      $witness->setPhone($data->phone);
      $witness->setUsers($data->users);
      $witness->setType($data->type);
      $witness->setDnifront($data->dnifront);
      $witness->setDnibehind($data->dnibehind);
      $witness->setProvince($data->province);
      return $witness;
    }

    /**
     * Set direction
     *
     * @param \AppBundle\Entity\Direction $direction
     *
     * @return PersonalData
     */
    public function setDirection(\AppBundle\Entity\Direction $direction = null)
    {
        $this->direction = $direction;

        return $this;
    }

    /**
     * Get direction
     *
     * @return \AppBundle\Entity\Direction
     */
    public function getDirection()
    {
        return $this->direction;
    }

    /**
     * Set class
     *
     * @param \AppBundle\Entity\PersonClass $class
     *
     * @return PersonalData
     */
    public function setClass(\AppBundle\Entity\PersonClass $class = null)
    {
        $this->class = $class;

        return $this;
    }

    /**
     * Get class
     *
     * @return \AppBundle\Entity\PersonClass
     */
    public function getClass()
    {
        return $this->class;
    }
}

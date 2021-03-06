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
     * @ORM\JoinColumn(name="userId", referencedColumnName="id")
     */
    private $userId;

    /**
     * @ORM\ManyToOne(targetEntity="Direction")
     * @ORM\JoinColumn(name="directionId", referencedColumnName="id")
     */
    private $direction;

    /**
     * @var string
     *
     * @ORM\Column(name="name", type="string", length=255)
     * @Assert\NotBlank()
     */
    private $name;

    /**
     * @var string
     *
     * @ORM\Column(name="surname", type="string", length=255)
     * @Assert\NotBlank()
     */
    private $surname;

    /**
     * @var string
     *
     * @ORM\Column(name="sip", type="string", length=255)
     * @Assert\NotBlank()
     */
    private $sip;


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
     * @ORM\ManyToOne(targetEntity="PersonClass")
     * @ORM\JoinColumn(name="personclassId", referencedColumnName="id")
     */

    private $personclassId;



    /**
     * @var string
     *
     * @ORM\Column(name="dni", type="string", length=255)
     * @Assert\NotBlank()
     *
     */
    private $dni;


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
     *
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
     * Set sip
     *
     * @param string $sip
     *
     * @return PersonalData
     *
     */
    public function setSip($sip)
    {
        $this->sip = $sip;

        return $this;
    }

    /**
     * Get sip
     *
     * @return string
     */
    public function getSip()
    {
        return $this->sip;
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
     * Set dni
     *
     * @param string $dni
     *
     * @return PersonalData
     */
    public function setDni($dni)
    {
        $this->dni = $dni;

        return $this;
    }

    /**
     * Get dni
     *
     * @return string
     */
    public function getDni()
    {
        return $this->dni;
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
     * Set personclassId
     *
     * @param \AppBundle\Entity\PersonClass $personclassId
     *
     * @return PersonalData
     */
    public function setPersonclassId(\AppBundle\Entity\PersonClass $personclassId = null)
    {
        $this->personclassId = $personclassId;

        return $this;
    }

    /**
     * Get personclassId
     *
     * @return \AppBundle\Entity\PersonClass
     */
    public function getPersonclassId()
    {
        return $this->personclassId;
    }

    public function __toString()
    {
        return $this->direction;
    }

    /**
     * Set userId
     *
     * @param \AppBundle\Entity\User $userId
     *
     * @return PersonalData
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

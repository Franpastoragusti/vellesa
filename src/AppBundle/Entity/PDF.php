<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * PDF
 *
 * @ORM\Table(name="p_d_f")
 * @ORM\Entity(repositoryClass="AppBundle\Repository\PDFRepository")
 */
class PDF
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
     * @ORM\JoinColumn(name="userId", referencedColumnName="id")
     */
    private $userId;



    /**
     * @var string
     *
     * @ORM\Column(name="dateFinished", type="string", length=255)
     */
    private $dateFinished = 'En proceso';

    /**
     * @var bool
     *
     * @ORM\Column(name="printed", type="boolean")
     */
    private $printed = false;

    /**
     * @var bool
     *
     * @ORM\Column(name="signed", type="boolean")
     */
    private $signed = false;

    /**
     * @var bool
     *
     * @ORM\Column(name="managed", type="boolean")
     */
    private $managed = false;


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
     * Set printed
     *
     * @param boolean $printed
     *
     * @return PDF
     */
    public function setPrinted($printed)
    {
        $this->printed = $printed;

        return $this;
    }

    /**
     * Get printed
     *
     * @return bool
     */
    public function getPrinted()
    {
        return $this->printed;
    }

    /**
     * Set signed
     *
     * @param boolean $signed
     *
     * @return PDF
     */
    public function setSigned($signed)
    {
        $this->signed = $signed;

        return $this;
    }

    /**
     * Get signed
     *
     * @return bool
     */
    public function getSigned()
    {
        return $this->signed;
    }

    /**
     * Set managed
     *
     * @param boolean $managed
     *
     * @return PDF
     */
    public function setManaged($managed)
    {
        $this->managed = $managed;

        return $this;
    }

    /**
     * Get managed
     *
     * @return bool
     */
    public function getManaged()
    {
        return $this->managed;
    }


    /**
     * Set userId
     *
     * @param \AppBundle\Entity\User $userId
     *
     * @return PDF
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

    /**
     * Set dateFinished
     *
     * @param string $dateFinished
     *
     * @return PDF
     */
    public function setDateFinished($dateFinished)
    {
        $this->dateFinished = $dateFinished;

        return $this;
    }

    /**
     * Get dateFinished
     *
     * @return string
     */
    public function getDateFinished()
    {
        return $this->dateFinished;
    }
}

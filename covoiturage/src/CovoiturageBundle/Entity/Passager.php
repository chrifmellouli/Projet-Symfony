<?php

namespace CovoiturageBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Passager
 *
 * @ORM\Table(name="passager")
 * @ORM\Entity(repositoryClass="CovoiturageBundle\Repository\PassagerRepository")
 */
class Passager
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
     * @ORM\Column(name="nompass", type="string", length=255)
     */
    private $nompass;

    /**
     * @var string
     *
     * @ORM\Column(name="prenompass", type="string", length=255)
     */
    private $prenompass;

    /**
     * @var string
     *
     * @ORM\Column(name="telpass", type="string", length=255)
     */
    private $telpass;

	/**
	 * @ORM\OneToMany(targetEntity="ReservTrajet", mappedBy="passager")
	 */
	private $reservTrajets;


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
     * Set nompass
     *
     * @param string $nompass
     *
     * @return Passager
     */
    public function setNompass($nompass)
    {
        $this->nompass = $nompass;

        return $this;
    }

    /**
     * Get nompass
     *
     * @return string
     */
    public function getNompass()
    {
        return $this->nompass;
    }

    /**
     * Set prenompass
     *
     * @param string $prenompass
     *
     * @return Passager
     */
    public function setPrenompass($prenompass)
    {
        $this->prenompass = $prenompass;

        return $this;
    }

    /**
     * Get prenompass
     *
     * @return string
     */
    public function getPrenompass()
    {
        return $this->prenompass;
    }

    /**
     * Set telpass
     *
     * @param string $telpass
     *
     * @return Passager
     */
    public function setTelpass($telpass)
    {
        $this->telpass = $telpass;

        return $this;
    }

    /**
     * Get telpass
     *
     * @return string
     */
    public function getTelpass()
    {
        return $this->telpass;
    }
    /**
     * Constructor
     */
    public function __construct()
    {
        $this->reservTrajets = new \Doctrine\Common\Collections\ArrayCollection();
    }

    /**
     * Add reservTrajet
     *
     * @param \CovoiturageBundle\Entity\ReservTrajet $reservTrajet
     *
     * @return Passager
     */
    public function addReservTrajet(ReservTrajet $reservTrajet)
    {
        $this->reservTrajets[] = $reservTrajet;

        return $this;
    }

    /**
     * Remove reservTrajet
     *
     * @param \CovoiturageBundle\Entity\ReservTrajet $reservTrajet
     */
    public function removeReservTrajet(ReservTrajet $reservTrajet)
    {
        $this->reservTrajets->removeElement($reservTrajet);
    }

    /**
     * Get reservTrajets
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getReservTrajets()
    {
        return $this->reservTrajets;
    }
}

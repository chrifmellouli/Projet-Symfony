<?php

namespace CovoiturageBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Trajet
 *
 * @ORM\Table(name="trajet")
 * @ORM\Entity(repositoryClass="CovoiturageBundle\Repository\TrajetRepository")
 */
class Trajet
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
     * @ORM\Column(name="depart", type="string", length=255)
     */
    private $depart;

    /**
     * @var string
     *
     * @ORM\Column(name="arrivee", type="string", length=255)
     */
    private $arrivee;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="datedep", type="date")
     */
    private $datedep;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="heuredep", type="time")
     */
    private $heuredep;

    /**
     * @var int
     *
     * @ORM\Column(name="nbplacelibre", type="integer")
     */
    private $nbplacelibre;

	/**
	 * @ORM\ManyToOne(targetEntity="Voiture", inversedBy="trajets", cascade={"remove"})
	 */
	 private $voiture;

	/**
	 * @ORM\OneToMany(targetEntity="ReservTrajet", mappedBy="trajet")
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
     * Set depart
     *
     * @param string $depart
     *
     * @return Trajet
     */
    public function setDepart($depart)
    {
        $this->depart = $depart;

        return $this;
    }

    /**
     * Get depart
     *
     * @return string
     */
    public function getDepart()
    {
        return $this->depart;
    }

    /**
     * Set arrivee
     *
     * @param string $arrivee
     *
     * @return Trajet
     */
    public function setArrivee($arrivee)
    {
        $this->arrivee = $arrivee;

        return $this;
    }

    /**
     * Get arrivee
     *
     * @return string
     */
    public function getArrivee()
    {
        return $this->arrivee;
    }

    /**
     * Set datedep
     *
     * @param \DateTime $datedep
     *
     * @return Trajet
     */
    public function setDatedep($datedep)
    {
        $this->datedep = $datedep;

        return $this;
    }

    /**
     * Get datedep
     *
     * @return \DateTime
     */
    public function getDatedep()
    {
        return $this->datedep;
    }

    /**
     * Set heuredep
     *
     * @param \DateTime $heuredep
     *
     * @return Trajet
     */
    public function setHeuredep($heuredep)
    {
        $this->heuredep = $heuredep;

        return $this;
    }

    /**
     * Get heuredep
     *
     * @return \DateTime
     */
    public function getHeuredep()
    {
        return $this->heuredep;
    }

    /**
     * Set nbplacelibre
     *
     * @param integer $nbplacelibre
     *
     * @return Trajet
     */
    public function setNbplacelibre($nbplacelibre)
    {
        $this->nbplacelibre = $nbplacelibre;

        return $this;
    }

    /**
     * Get nbplacelibre
     *
     * @return int
     */
    public function getNbplacelibre()
    {
        return $this->nbplacelibre;
    }
    /**
     * Constructor
     */
    public function __construct()
    {
        $this->reservTrajets = new \Doctrine\Common\Collections\ArrayCollection();
    }

    /**
     * Set voiture
     *
     * @param \CovoiturageBundle\Entity\Voiture $voiture
     *
     * @return Trajet
     */
    public function setVoiture(Voiture $voiture = null)
    {
        $this->voiture = $voiture;

        return $this;
    }

    /**
     * Get voiture
     *
     * @return \CovoiturageBundle\Entity\Voiture
     */
    public function getVoiture()
    {
        return $this->voiture;
    }

    /**
     * Add reservTrajet
     *
     * @param \CovoiturageBundle\Entity\ReservTrajet $reservTrajet
     *
     * @return Trajet
     */
    public function addReservTrajet(ReservTrajet$reservTrajet)
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

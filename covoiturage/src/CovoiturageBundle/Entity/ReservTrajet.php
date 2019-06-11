<?php

namespace CovoiturageBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * ReservTrajet
 *
 * @ORM\Table(name="reserv_trajet")
 * @ORM\Entity(repositoryClass="CovoiturageBundle\Repository\ReservTrajetRepository")
 */
class ReservTrajet
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
     * @var \DateTime
     *
     * @ORM\Column(name="dateres", type="datetime")
     */
    private $dateres;
	
	
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
     * Set dateres
     *
     * @param \DateTime $dateres
     *
     * @return ReservTrajet
     */
    public function setDateres($dateres)
    {
        $this->dateres = $dateres;

        return $this;
    }

	/**
	 * @ORM\ManyToOne(targetEntity="Trajet", inversedBy="reservTrajets", cascade={"remove"})
	 */
	private $trajet;

	/**
	 * @ORM\ManyToOne(targetEntity="Passager", inversedBy="reservTrajets", cascade={"remove"})
	 */
	private $passager;
	
    /**
     * Get dateres
     *
     * @return \DateTime
     */
    public function getDateres()
    {
        return $this->dateres;
    }

    /**
     * Set trajet
     *
     * @param \CovoiturageBundle\Entity\Trajet $trajet
     *
     * @return ReservTrajet
     */
    public function setTrajet(Trajet $trajet = null)
    {
        $this->trajet = $trajet;

        return $this;
    }

    /**
     * Get trajet
     *
     * @return \CovoiturageBundle\Entity\Trajet
     */
    public function getTrajet()
    {
        return $this->trajet;
    }

    /**
     * Set passager
     *
     * @param \CovoiturageBundle\Entity\Passager $passager
     *
     * @return ReservTrajet
     */
    public function setPassager(Passager $passager = null)
    {
        $this->passager = $passager;

        return $this;
    }

    /**
     * Get passager
     *
     * @return \CovoiturageBundle\Entity\Passager
     */
    public function getPassager()
    {
        return $this->passager;
    }
    

}

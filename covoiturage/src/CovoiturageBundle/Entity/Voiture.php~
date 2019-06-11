<?php

namespace CovoiturageBundle\Entity;
use Doctrine\ORM\Mapping as ORM;

/**
 * Voiture
 *
 * @ORM\Table(name="voiture")
 * @ORM\Entity(repositoryClass="CovoiturageBundle\Repository\VoitureRepository")
 */
class Voiture
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
     * @ORM\Column(name="modelevoit", type="string", length=255)
     */
    private $modelevoit;

    /**
     * @var bool
     *
     * @ORM\Column(name="clim", type="boolean")
     */
    private $clim;

    /**
     * @var bool
     *
     * @ORM\Column(name="fumeur", type="boolean")
     */
    private $fumeur;

    /**
     * @var bool
     *
     * @ORM\Column(name="bagage", type="boolean")
     */
    private $bagage;

    /**
     * @var string
     *
     * @ORM\Column(name="photovoit", type="string", length=255)
     */
    private $photovoit;

	/**
	 * @ORM\ManyToOne(targetEntity="Chauffeur", inversedBy="voitures", cascade={"remove"})
	 */
	private $chauffeur;

	/**
	 * @ORM\OneToMany(targetEntity="Trajet", mappedBy="voiture")
	 */
	private $trajets;

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
     * Set modelevoit
     *
     * @param string $modelevoit
     *
     * @return Voiture
     */
    public function setModelevoit($modelevoit)
    {
        $this->modelevoit = $modelevoit;

        return $this;
    }

    /**
     * Get modelevoit
     *
     * @return string
     */
    public function getModelevoit()
    {
        return $this->modelevoit;
    }

    /**
     * Set clim
     *
     * @param boolean $clim
     *
     * @return Voiture
     */
    public function setClim($clim)
    {
        $this->clim = $clim;

        return $this;
    }

    /**
     * Get clim
     *
     * @return bool
     */
    public function getClim()
    {
        return $this->clim;
    }

    /**
     * Set fumeur
     *
     * @param boolean $fumeur
     *
     * @return Voiture
     */
    public function setFumeur($fumeur)
    {
        $this->fumeur = $fumeur;

        return $this;
    }

    /**
     * Get fumeur
     *
     * @return bool
     */
    public function getFumeur()
    {
        return $this->fumeur;
    }

    /**
     * Set bagage
     *
     * @param boolean $bagage
     *
     * @return Voiture
     */
    public function setBagage($bagage)
    {
        $this->bagage = $bagage;

        return $this;
    }

    /**
     * Get bagage
     *
     * @return bool
     */
    public function getBagage()
    {
        return $this->bagage;
    }

    /**
     * Set photovoit
     *
     * @param string $photovoit
     *
     *
     * @return Voiture
     */
    public function setPhotovoit($photovoit)
    {
        $this->photovoit = $photovoit;

        return $this;
    }

    /**
     * Get photovoit
     *
     * @return string
     */
    public function getPhotovoit()
    {
        return $this->photovoit;
    }
    /**
     * Constructor
     */
    public function __construct()
    {
        $this->trajets = new \Doctrine\Common\Collections\ArrayCollection();
    }

    /**
     * Set chauffeur
     *
     * @param \CovoiturageBundle\Entity\Chauffeur $chauffeur
     *
     * @return Voiture
     */
    public function setChauffeur(Chauffeur $chauffeur = null)
    {
        $this->chauffeur = $chauffeur;

        return $this;
    }

    /**
     * Get chauffeur
     *
     * @return \CovoiturageBundle\Entity\Chauffeur
     */
    public function getChauffeur()
    {
        return $this->chauffeur;
    }

    /**
     * Add trajet
     *
     * @param \CovoiturageBundle\Entity\Trajet $trajet
     *
     * @return Voiture
     */
    public function addTrajet(Trajet $trajet)
    {
        $this->trajets[] = $trajet;

        return $this;
    }

    /**
     * Remove trajet
     *
     * @param \CovoiturageBundle\Entity\Trajet $trajet
     */
    public function removeTrajet(Trajet $trajet)
    {
        $this->trajets->removeElement($trajet);
    }

    /**
     * Get trajets
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getTrajets()
    {
        return $this->trajets;
    }
}

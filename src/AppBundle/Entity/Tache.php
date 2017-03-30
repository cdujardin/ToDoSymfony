<?php

namespace AppBundle\Entity;

use AppBundle\Entity\Importance;
use Symfony\Component\Validator\Constraints as Assert;
use Doctrine\ORM\Mapping as ORM;
use Doctrine\Common\Collections\ArrayCollection;




/**
 * Tache
 *
 * @ORM\Table(name="tache")
 * @ORM\Entity(repositoryClass="AppBundle\Repository\TacheRepository")
 */
class Tache
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
     * @ORM\Column(name="Nom", type="string", length=255)
     */
    private $nom;

    /**
     * @var string
     *
     * @ORM\Column(name="Details", type="text", nullable=true)
     */
    private $details;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="Date", type="datetime")
     */
    private $date;


    /**
    * @var Importance
    * @Assert\NotBlank()
    * @ORM\ManyToOne(targetEntity="Importance", inversedBy="taches")
    * @ORM\JoinColumn(name="name_id", referencedColumnName="id")
    */
    private $importance;

    /**
    * @var boolean
    *
    * @ORM\Column(name="Effectuee", type="boolean")
    *
    */
    private $effectuee;


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
     * Set nom
     *
     * @param string $nom
     *
     * @return Tache
     */
    public function setNom($nom)
    {
        $this->nom = $nom;

        return $this;
    }

    /**
     * Get nom
     *
     * @return string
     */
    public function getNom()
    {
        return $this->nom;
    }

    /**
     * Set details
     *
     * @param string $details
     *
     * @return Tache
     */
    public function setDetails($details)
    {
        $this->details = $details;

        return $this;
    }

    /**
     * Get details
     *
     * @return string
     */
    public function getDetails()
    {
        return $this->details;
    }

    /**
     * Set date
     *
     * @param \DateTime $date
     *
     * @return Tache
     */
    public function setDate($date)
    {

        $this->date = new \DateTime('now');

        return $this;
    }

    /**
     * Get date
     *
     * @return \DateTime
     */
    public function getDate()
    {
        return $this->date;
    }

    /**
    * Set importance
    *
    * @param Importance $importance cette variable contient une importance
    *
    * @return Tache
    */
    public function setImportance(Importance $importance)
    {
      $this->importance=$importance;
    }

    /**
    * Get importance
    *
    * @return Importance
    */
    public function getImportance()
    {
      return $this->importance;
    }


    /**
    * Set effectuee
    *
    * @param Effectuee $effectuee
    *
    * @return Tache
    */
    public function setEffectuee( $effectuee)
    {
      $this->effectuee=$effectuee;
    }

    /**
    * Get effectuee
    *
    * @return Effectuee
    */
    public function getEffectuee()
    {
      return $this->effectuee;
    }

}

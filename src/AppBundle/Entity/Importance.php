<?php

namespace AppBundle\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\ORM\Mapping as ORM;
use AppBundle\Entity\Tache;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * Importance
 *
 * @ORM\Table(name="importance")
 * @ORM\Entity(repositoryClass="AppBundle\Repository\ImportanceRepository")
 */
class Importance
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
     * @var int
     *
     * @ORM\Column(name="Poids", type="integer")
     */
    private $poids;


    /**
    * @var ArrayCollection
    *
    * @ORM\OneToMany(targetEntity="Tache", mappedBy="importance")
    */
    private $taches;

    public function __construc(){
      $this->$taches= new ArrayCollection;
    }

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
     * @return Importance
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
     * Set poids
     *
     * @param integer $poids
     *
     * @return Importance
     */
    public function setPoids($poids)
    {
        $this->poids = $poids;

        return $this;
    }

    /**
     * Get poids
     *
     * @return int
     */
    public function getPoids()
    {
        return $this->poids;
    }

    /**
    * Add Tache
    *
    * @param Tache $tache
    *
    * @return Importance
    */
    public function addTache(Tache $tache)
    {
      $this->taches[]=$tache;
      return $this;
    }

    /**
    * Remove Tache
    *
    * @param Tache $tache
    *
    * @return Importance
    */
    public function removeTache(Tache $tache)
    {
      $this->taches->removeElement($tache);
      return $this;
    }

    /**
    * Get taches
    *
    * @return ArrayCollection
    */
    public function getTaches()
    {
      return $this->taches;
    }

    /**
    * Set taches
    *
    * @param ArrayCollection $taches cette liste contient des objets de type Tache
    *
    * @return Importance
    */
    public function setTaches(ArrayCollection $taches)
    {
      $this->taches=$taches;
    }
}

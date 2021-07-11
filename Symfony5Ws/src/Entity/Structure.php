<?php

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;
use ApiPlatform\Core\Annotation\ApiResource;
use Symfony\Component\Serializer\Annotation\Groups;
use Symfony\Component\Validator\Constraints\NotNull;
use ApiPlatform\Core\Annotation\ApiFilter;
use ApiPlatform\Core\Bridge\Doctrine\Orm\Filter\BooleanFilter;
use ApiPlatform\Core\Bridge\Doctrine\Orm\Filter\SearchFilter;
use ApiPlatform\Core\Bridge\Doctrine\Orm\Filter\NumericFilter;

/**
 * Structure
 *
 * @ORM\Table(name="structure")
 * @ORM\Entity
 * @ApiResource(normalizationContext={"groups"={"structure"},"enable_max_depth"=true})
 * @ApiFilter(BooleanFilter::class, properties={"estasso"})
 * @ApiFilter(NumericFilter::class, properties={"id"})
 * @ApiFilter(SearchFilter::class, properties={"nom": "partial", "ville": "exact"})
 */
class Structure
{
    /**
     * @var int
     *
     * @ORM\Column(name="ID", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     * @Groups({"secteur","structure","secteurstructure"})
     */
    private $id;

    /**
     * @var string
     *  @NotNull(message="Le nom ne peut être null")
     * @ORM\Column(name="NOM", type="string", length=100, nullable=false)
     * @Groups({"secteur","structure","secteurstructure"})
     */
    private $nom;

    /**
     * @var string
     *
     * @ORM\Column(name="RUE", type="string", length=200, nullable=false)
     * @Groups({"structure","secteurstructure"})
     */
    private $rue;

    /**
     * @var string
     *
     * @ORM\Column(name="CP", type="string", length=5, nullable=false)
     * @Groups({"structure","secteurstructure"})
     */
    private $cp;

    /**
     * @var string
     *
     * @ORM\Column(name="VILLE", type="string", length=100, nullable=false)
     * @Groups({"structure","secteurstructure"})
     */
    private $ville;

    /**
     * @var bool
     *
     * @ORM\Column(name="ESTASSO", type="boolean", nullable=false)
     * @Groups({"structure","secteurstructure"})
     */
    private $estasso;

    /**
     * @var int|null
     *
     * @ORM\Column(name="NB_DONATEURS", type="integer", nullable=true)
     * @Groups({"structure","secteurstructure"})
     */
    private $nbDonateurs;

    /**
     * @var int|null
     *
     * @ORM\Column(name="NB_ACTIONNAIRES", type="integer", nullable=true)
     * @Groups({"structure","secteurstructure"})
     */
    private $nbActionnaires;

    /**
     * @var Collection
     *
     * @ORM\OneToMany(targetEntity="SecteursStructures", mappedBy="idStructure")
     * @Groups({"structure"})
     */
    private $secteursStructures;

    public function __construct() {
        $this->secteursStructures = new \Doctrine\Common\Collections\ArrayCollection();
    }

    /**
     * @return int
     */
    public function getId(): int
    {
        return $this->id;
    }

    /**
     * @param int $id
     */
    public function setId(int $id): void
    {
        $this->id = $id;
    }

    /**
     * @return string
     */
    public function getNom(): string
    {
        return $this->nom;
    }

    /**
     * @param string $nom
     */
    public function setNom(string $nom): void
    {
        $this->nom = $nom;
    }

    /**
     * @return string
     */
    public function getRue(): string
    {
        return $this->rue;
    }

    /**
     * @param string $rue
     */
    public function setRue(string $rue): void
    {
        $this->rue = $rue;
    }

    /**
     * @return string
     */
    public function getCp(): string
    {
        return $this->cp;
    }

    /**
     * @param string $cp
     */
    public function setCp(string $cp): void
    {
        $this->cp = $cp;
    }

    /**
     * @return string
     */
    public function getVille(): string
    {
        return $this->ville;
    }

    /**
     * @param string $ville
     */
    public function setVille(string $ville): void
    {
        $this->ville = $ville;
    }

    /**
     * @return bool
     */
    public function isEstasso(): bool
    {
        return $this->estasso;
    }

    /**
     * @param bool $estasso
     */
    public function setEstasso(bool $estasso): void
    {
        $this->estasso = $estasso;
    }

    /**
     * @return int|null
     */
    public function getNbDonateurs(): ?int
    {
        return $this->nbDonateurs;
    }

    /**
     * @param int|null $nbDonateurs
     */
    public function setNbDonateurs(?int $nbDonateurs): void
    {
        $this->nbDonateurs = $nbDonateurs;
    }

    /**
     * @return int|null
     */
    public function getNbActionnaires(): ?int
    {
        return $this->nbActionnaires;
    }

    /**
     * @param int|null $nbActionnaires
     */
    public function setNbActionnaires(?int $nbActionnaires): void
    {
        $this->nbActionnaires = $nbActionnaires;
    }

    /**
     * @return array
     */
    public function getSecteursStructures(): array
    {
        return array_values($this->secteursStructures->getValues());
    }

    /**
     * @param array $secteursStructures
     */
    public function setSecteursStructures($secteursStructures): void
    {

        $this->secteursStructures = new ArrayCollection($secteursStructures);
    }

    public function __toString()
    {
        return $this->id." : ".$this->nom;
    }

}

<?php

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;
use ApiPlatform\Core\Annotation\ApiResource;
use Symfony\Component\Serializer\Annotation\Groups;
use Symfony\Component\Serializer\Annotation\MaxDepth;
use Symfony\Component\Validator\Constraints\NotBlank;
use ApiPlatform\Core\Annotation\ApiFilter;
use ApiPlatform\Core\Bridge\Doctrine\Orm\Filter\RangeFilter;
use ApiPlatform\Core\Bridge\Doctrine\Orm\Filter\SearchFilter;

/**
 * Secteur
 *
 * @ORM\Table(name="secteur", uniqueConstraints={@ORM\UniqueConstraint(name="LIBELLE", columns={"LIBELLE"})})
 * @ORM\Entity
 * @ApiResource(normalizationContext={"groups"={"secteur"},"enable_max_depth"=true})
 * @ApiFilter(RangeFilter::class, properties={"id"})
 * @ApiFilter(SearchFilter::class, properties={"libelle": "partial"})
 */
class Secteur
{
    /**
     * @var int
     *
     * @ORM\Column(name="ID", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     *
     * @Groups({"secteur","structure","secteurstructure"})
     */
    private $id;

    /**
     * @var string
     *
     * @ORM\Column(name="LIBELLE", type="string", length=100, nullable=false)
     * @NotBlank(message="Libellé non renseigné")
     * @Groups({"secteur","structure","secteurstructure"})
     */
    private $libelle;

    /**
     * @var Collection
     *
     * @ORM\OneToMany(targetEntity="SecteursStructures", mappedBy="idSecteur")
     *
     * @Groups({"secteur"})
     *
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
    public function getLibelle(): string
    {
        return $this->libelle;
    }

    /**
     * @param string $libelle
     */
    public function setLibelle(string $libelle): void
    {
        $this->libelle = $libelle;
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
        return $this->id . " : " . $this->libelle;
    }
}

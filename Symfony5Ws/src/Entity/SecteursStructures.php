<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;
use ApiPlatform\Core\Annotation\ApiResource;
use ApiPlatform\Core\Annotation\ApiSubresource;
use Symfony\Component\Serializer\Annotation\Groups;
use Symfony\Component\Serializer\Annotation\MaxDepth;
use ApiPlatform\Core\Annotation\ApiFilter;
use ApiPlatform\Core\Bridge\Doctrine\Orm\Filter\NumericFilter;

/**
 * SecteursStructures
 *
 * @ORM\Table(name="secteurs_structures", indexes={@ORM\Index(name="ID_SECTEUR", columns={"ID_SECTEUR"}), @ORM\Index(name="ID_STRUCTURE", columns={"ID_STRUCTURE"})})
 * @ORM\Entity
 * @ApiResource(normalizationContext={"groups"={"secteurstructure"},"enable_max_depth"=true})
 * @ApiFilter(NumericFilter::class, properties={"id"})
 */
class SecteursStructures
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
     * @ApiSubresource
     *
     * @var Secteur
     *
     * @ORM\ManyToOne(targetEntity="Secteur", inversedBy="secteursStructures")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="ID_SECTEUR", referencedColumnName="ID")
     * })
     *
     * @Groups({"structure","secteurstructure"})
     * @MaxDepth(1)
     *
     */
    private $idSecteur;

    /**
     * @ApiSubresource
     *
     * @var Structure
     *
     * @ORM\ManyToOne(targetEntity="Structure", inversedBy="secteursStructures")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="ID_STRUCTURE", referencedColumnName="ID")
     * })
     *
     * @Groups({"secteur","secteurstructure"})
     * @MaxDepth(1)
     */
    private $idStructure;

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
     * @return Secteur
     *
     */
    public function getIdSecteur(): Secteur
    {
        return $this->idSecteur;
    }

    /**
     * @param Secteur $idSecteur
     */
    public function setIdSecteur(Secteur $idSecteur): void
    {
        $this->idSecteur = $idSecteur;
    }

    /**
     * @return Structure
     *
     */
    public function getIdStructure(): Structure
    {
        return $this->idStructure;
    }

    /**
     * @param Structure $idStructure
     */
    public function setIdStructure(Structure $idStructure): void
    {
        $this->idStructure = $idStructure;
    }


}

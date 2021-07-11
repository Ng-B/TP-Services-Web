<?php

namespace App\Soap;

/**
 * Class StructureSoap
 * @package App\Soap
 */
class StructureSoap
{
    /**
     * @var int $id
     */
    public $id;

    /**
     * @var string $nom
     */
    public $nom;

    /**
     * @var string $rue
     */
    public $rue;

    /**
     * @var string $cp
     */
    public $cp;

    /**
     * @var string $ville
     */
    public $ville;

    /**
     * @var bool $estasso
     */
    public $estasso;

    /**
     * @var int $nbDonateurs
     */
    public $nbDonateurs;

    /**
     * @var int $nbActionnaires
     */
    public $nbActionnaires;

    /**
     * StructureSoap constructor.
     * @param int $id
     * @param string $nom
     * @param string $rue
     * @param string $cp
     * @param string $ville
     * @param bool $estasso
     * @param int $nbDonateurs
     * @param int $nbActionnaires
     */
    public function __construct(int $id, string $nom, string $rue, string $cp, string $ville,
                                bool $estasso, ?int $nbDonateurs, ?int $nbActionnaires)
    {
        $this->id = $id;
        $this->nom = $nom;
        $this->rue = $rue;
        $this->cp = $cp;
        $this->ville = $ville;
        $this->estasso = $estasso;
        $this->nbDonateurs = $nbDonateurs;
        $this->nbActionnaires = $nbActionnaires;
    }


    /**
     * @return int
     */
    public function getId(): ?int
    {
        return $this->id;
    }

    /**
     * @return string
     */
    public function getNom(): ?string
    {
        return $this->nom;
    }

    /**
     * @param string $nom
     */
    public function setNom(string $nom) : void
    {
        $this->nom = $nom;
    }

    /**
     * @return string
     */
    public function getRue(): ?string
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
    public function getCp(): ?string
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
    public function getVille(): ?string
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
    public function getEstasso(): ?bool
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
     * @return int
     */
    public function getNbDonateurs(): ?int
    {
        return $this->nbDonateurs;
    }

    /**
     * @param int $nbDonateurs
     */
    public function setNbDonateurs(?int $nbDonateurs): void
    {
        $this->nbDonateurs = $nbDonateurs;
    }

    /**
     * @return int
     */
    public function getNbActionnaires(): ?int
    {
        return $this->nbActionnaires;
    }

    /**
     * @param int $nbActionnaires
     */
    public function setNbActionnaires(?int $nbActionnaires): void
    {
        $this->nbActionnaires = $nbActionnaires;
    }

}

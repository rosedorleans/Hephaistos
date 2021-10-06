<?php

namespace App\Entity;

use App\Repository\HandicapUserRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=HandicapUserRepository::class)
 */
class HandicapUser
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="text", nullable=true)
     */
    private $infos;

    /**
     * @ORM\Column(type="integer", nullable=true)
     */
    private $TIP;

    /**
     * @ORM\Column(type="integer", nullable=true)
     */
    private $numAggir;

    /**
     * @ORM\ManyToOne(targetEntity=Handicap::class, inversedBy="handicapUsers")
     */
    private $type_handicap;

    /**
     * @ORM\Column(type="integer", nullable=true)
     */
    private $numCategoryCPAM;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getInfos(): ?string
    {
        return $this->infos;
    }

    public function setInfos(?string $infos): self
    {
        $this->infos = $infos;

        return $this;
    }


    public function getTIP(): ?int
    {
        return $this->TIP;
    }

    public function setTIP(?int $TIP): self
    {
        $this->TIP = $TIP;

        return $this;
    }

    public function getNumAggir(): ?int
    {
        return $this->numAggir;
    }

    public function setNumAggir(?int $numAggir): self
    {
        $this->numAggir = $numAggir;

        return $this;
    }

    public function getTypeHandicap(): ?Handicap
    {
        return $this->type_handicap;
    }

    public function setTypeHandicap(?Handicap $type_handicap): self
    {
        $this->type_handicap = $type_handicap;

        return $this;
    }

    public function getNumCategoryCPAM(): ?int
    {
        return $this->numCategoryCPAM;
    }

    public function setNumCategoryCPAM(?int $numCategoryCPAM): self
    {
        $this->numCategoryCPAM = $numCategoryCPAM;

        return $this;
    }
}

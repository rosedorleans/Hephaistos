<?php

namespace App\Entity;

use App\Repository\CategoryRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=CategoryRepository::class)
 */
class Category
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $name;

    /**
     * @ORM\OneToMany(targetEntity=Handicap::class, mappedBy="category")
     */
    private $handicaps;

    public function __construct()
    {
        $this->handicaps = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getName(): ?string
    {
        return $this->name;
    }

    public function setName(string $name): self
    {
        $this->name = $name;

        return $this;
    }

    /**
     * @return Collection|Handicap[]
     */
    public function getHandicaps(): Collection
    {
        return $this->handicaps;
    }

    public function addHandicap(Handicap $handicap): self
    {
        if (!$this->handicaps->contains($handicap)) {
            $this->handicaps[] = $handicap;
            $handicap->setCategory($this);
        }

        return $this;
    }

    public function removeHandicap(Handicap $handicap): self
    {
        if ($this->handicaps->removeElement($handicap)) {
            // set the owning side to null (unless already changed)
            if ($handicap->getCategory() === $this) {
                $handicap->setCategory(null);
            }
        }

        return $this;
    }
}

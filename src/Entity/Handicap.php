<?php

namespace App\Entity;

use App\Repository\HandicapRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=HandicapRepository::class)
 */
class Handicap
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
     * @ORM\ManyToOne(targetEntity=Category::class, inversedBy="handicaps")
     * @ORM\JoinColumn(nullable=false)
     */
    private $category;

    /**
     * @ORM\OneToMany(targetEntity=HandicapUser::class, mappedBy="type_handicap")
     */
    private $handicapUsers;

    public function __construct()
    {
        $this->handicapUsers = new ArrayCollection();
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

    public function getCategory(): ?Category
    {
        return $this->category;
    }

    public function setCategory(?Category $category): self
    {
        $this->category = $category;

        return $this;
    }

    /**
     * @return Collection|HandicapUser[]
     */
    public function getHandicapUsers(): Collection
    {
        return $this->handicapUsers;
    }

    public function addHandicapUser(HandicapUser $handicapUser): self
    {
        if (!$this->handicapUsers->contains($handicapUser)) {
            $this->handicapUsers[] = $handicapUser;
            $handicapUser->setTypeHandicap($this);
        }

        return $this;
    }

    public function removeHandicapUser(HandicapUser $handicapUser): self
    {
        if ($this->handicapUsers->removeElement($handicapUser)) {
            // set the owning side to null (unless already changed)
            if ($handicapUser->getTypeHandicap() === $this) {
                $handicapUser->setTypeHandicap(null);
            }
        }

        return $this;
    }
}

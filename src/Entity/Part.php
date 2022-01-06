<?php

namespace App\Entity;

use App\Repository\PartRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;
use JMS\Serializer\Annotation as Serializer;

/**
 * @Serializer\ExclusionPolicy(Serializer\ExclusionPolicy::ALL)
 *
 * @ORM\Entity(repositoryClass=PartRepository::class)
 */
class Part
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     *
     * @Serializer\Expose
     * @Serializer\Groups({"id", "name"})
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=100)
     *
     * @Serializer\Expose
     * @Serializer\Groups({"name"})
     */
    private $name;

    /**
     * @ORM\OneToMany(targetEntity=TechSet::class, mappedBy="part", cascade={"persist"}, orphanRemoval=true)
     */
    private $techSets;

    public function __construct()
    {
        $this->techSets = new ArrayCollection();
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
     * @return Collection|TechSet[]
     */
    public function getTechSets(): Collection
    {
        return $this->techSets;
    }

    public function addTechSet(TechSet $techSet): self
    {
        if (!$this->techSets->contains($techSet)) {
            $this->techSets[] = $techSet;
            $techSet->setPart($this);
        }

        return $this;
    }

    public function removeTechSet(TechSet $techSet): self
    {
        if ($this->techSets->removeElement($techSet)) {
            // set the owning side to null (unless already changed)
            if ($techSet->getPart() === $this) {
                $techSet->setPart(null);
            }
        }

        return $this;
    }

    public function getPart()
    {
        return $this;
    }

    public function __toString()
    {
        return $this->name;
        // TODO: Implement __toString() method.
    }
}

<?php

namespace App\Entity;

use App\Repository\TechSetRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=TechSetRepository::class)
 */
class TechSet
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=100)
     */
    private $name;

    /**
     * @ORM\OneToMany(targetEntity=Operation::class, mappedBy="techSet", cascade={"persist"}, orphanRemoval=true)
     */
    private $operations;

    /**
     * @ORM\ManyToOne(targetEntity=Part::class, inversedBy="techSet")
     * @ORM\JoinColumn(nullable=false)
     */
    private $part;

    public function __construct()
    {
        $this->operations = new ArrayCollection();
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
     * @return Collection|Operation[]
     */
    public function getOperations(): Collection
    {
        return $this->operations;
    }

    public function addOperation(Operation $operation): self
    {
        if (!$this->operations->contains($operation)) {
            $this->operations[] = $operation;
        }

        return $this;
    }

    public function removeOperation(Operation $operation): self
    {
        $this->operations->removeElement($operation);

        return $this;
    }

    public function getPart(): ?Part
    {
//        dd(1); die();
        return $this->part;
    }

    public function setPart(?Part $part): self
    {
        $this->part = $part;

        return $this;
    }

    public function __toString()
    {
        return $this->name;
        // TODO: Implement __toString() method.
    }
}

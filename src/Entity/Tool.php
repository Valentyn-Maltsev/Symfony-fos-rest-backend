<?php

namespace App\Entity;

use App\Repository\ToolRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=ToolRepository::class)
 */
class Tool
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\ManyToOne(targetEntity=ToolType::class, inversedBy="tools")
     * @ORM\JoinColumn(nullable=false)
     */
    private $toolType;

    /**
     * @ORM\ManyToOne(targetEntity=Material::class, inversedBy="tools")
     * @ORM\JoinColumn(nullable=false)
     */
    private $material;

    /**
     * @ORM\Column(type="string", length=100)
     */
    private $name;

    /**
     * @ORM\OneToMany(targetEntity=Operation::class, mappedBy="tool", orphanRemoval=true)
     */
    private $operations;

    public function __construct()
    {
        $this->operations = new ArrayCollection();
    }


    public function getId(): ?int
    {
        return $this->id;
    }

    public function getToolType(): ?ToolType
    {
        return $this->toolType;
    }

    public function setToolType(?ToolType $toolType): self
    {
        $this->toolType = $toolType;

        return $this;
    }

    public function getMaterial(): ?Material
    {
        return $this->material;
    }

    public function setMaterial(?Material $material): self
    {
        $this->material = $material;

        return $this;
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

    public function __toString()
    {
        return $this->name;
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
            $operation->setTool($this);
        }

        return $this;
    }

    public function removeOperation(Operation $operation): self
    {
        if ($this->operations->removeElement($operation)) {
            // set the owning side to null (unless already changed)
            if ($operation->getTool() === $this) {
                $operation->setTool(null);
            }
        }

        return $this;
    }
}

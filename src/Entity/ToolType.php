<?php

namespace App\Entity;

use App\Repository\ToolTypeRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=ToolTypeRepository::class)
 */
class ToolType
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
     * @ORM\ManyToOne(targetEntity=OperationType::class, inversedBy="toolTypes")
     * @ORM\JoinColumn(nullable=false)
     */
    private $operationType;

    /**
     * @ORM\OneToMany(targetEntity=Tool::class, mappedBy="toolType", orphanRemoval=true)
     */
    private $tools;

    public function __construct()
    {
        $this->tools = new ArrayCollection();
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

    public function getOperationType(): ?OperationType
    {
        return $this->operationType;
    }

    public function setOperationType(?OperationType $operationType): self
    {
        $this->operationType = $operationType;

        return $this;
    }

    /**
     * @return Collection|Tool[]
     */
    public function getTools(): Collection
    {
        return $this->tools;
    }

    public function addTool(Tool $tool): self
    {
        if (!$this->tools->contains($tool)) {
            $this->tools[] = $tool;
            $tool->setToolType($this);
        }

        return $this;
    }

    public function removeTool(Tool $tool): self
    {
        if ($this->tools->removeElement($tool)) {
            // set the owning side to null (unless already changed)
            if ($tool->getToolType() === $this) {
                $tool->setToolType(null);
            }
        }

        return $this;
    }

    public function __toString()
    {
        return $this->name;
    }
}

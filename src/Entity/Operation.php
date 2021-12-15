<?php

namespace App\Entity;

use App\Repository\OperationRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=OperationRepository::class)
 */
class Operation
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
     * @ORM\OneToMany(targetEntity=ToolType::class, mappedBy="operation_id", orphanRemoval=true)
     */
    private $toolTypes;

    public function __construct()
    {
        $this->toolTypes = new ArrayCollection();
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
     * @return Collection|ToolType[]
     */
    public function getToolTypes(): Collection
    {
        return $this->toolTypes;
    }

    public function addToolType(ToolType $toolType): self
    {
        if (!$this->toolTypes->contains($toolType)) {
            $this->toolTypes[] = $toolType;
            $toolType->setOperationId($this);
        }

        return $this;
    }

    public function removeToolType(ToolType $toolType): self
    {
        if ($this->toolTypes->removeElement($toolType)) {
            // set the owning side to null (unless already changed)
            if ($toolType->getOperationId() === $this) {
                $toolType->setOperationId(null);
            }
        }

        return $this;
    }
}

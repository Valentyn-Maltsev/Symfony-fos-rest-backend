<?php

namespace App\Entity;

use App\Repository\ToolRepository;
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
     * @ORM\Column(type="string", length=255)
     */
    private $material;

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

    public function getMaterial(): ?string
    {
        return $this->material;
    }

    public function setMaterial(string $material): self
    {
        $this->material = $material;

        return $this;
    }
}

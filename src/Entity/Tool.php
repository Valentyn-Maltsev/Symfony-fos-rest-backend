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
}

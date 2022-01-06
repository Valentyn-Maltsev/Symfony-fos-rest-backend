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
     * @ORM\ManyToOne(targetEntity=Tool::class, inversedBy="operations")
     * @ORM\JoinColumn(nullable=false)
     */
    private $tool;

    /**
     * @ORM\Column(type="decimal", precision=10, scale=1)
     */
    private $rotationalSpeed;

    /**
     * @ORM\Column(type="decimal", precision=10, scale=1)
     */
    private $Feed;

    /**
     * @ORM\Column(type="integer")
     */
    private $lead_time;

    /**
     * @ORM\ManyToOne (targetEntity=TechSet::class, inversedBy="operations")
     */
    private $techSet;


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

    public function getTool(): ?Tool
    {
        return $this->tool;
    }

    public function setTool(?Tool $tool): self
    {
        $this->tool = $tool;

        return $this;
    }

    public function getRotationalSpeed(): ?string
    {
        return $this->rotationalSpeed;
    }

    public function setRotationalSpeed(string $rotationalSpeed): self
    {
        $this->rotationalSpeed = $rotationalSpeed;

        return $this;
    }

    public function getFeed(): ?string
    {
        return $this->Feed;
    }

    public function setFeed(string $Feed): self
    {
        $this->Feed = $Feed;

        return $this;
    }

    public function getleadTime(): ?int
    {
        return $this->lead_time;
    }

    public function setleadTime(int $lead_time): self
    {
        $this->lead_time = $lead_time;

        return $this;
    }

    /**
     * @return Collection|TechSet[]
     */
    public function getTechSet(): Collection
    {
        return $this->techSet;
    }

    public function addTechSet(TechSet $techSet): self
    {
        if (!$this->techSet->contains($techSet)) {
            $this->techSet[] = $techSet;
            $techSet->addOperation($this);
        }

        return $this;
    }

    public function removeTechSet(TechSet $techSet): self
    {
        if ($this->techSet->removeElement($techSet)) {
            $techSet->removeOperation($this);
        }

        return $this;
    }
}

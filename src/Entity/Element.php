<?php

namespace App\Entity;

use App\Repository\ElementRepository;
use Doctrine\ORM\Mapping as ORM;
use JMS\Serializer\Annotation as Serializer;

/**
 * @Serializer\ExclusionPolicy(Serializer\ExclusionPolicy::ALL)
 *
 * @ORM\Entity(repositoryClass=ElementRepository::class)
 */
class Element
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="integer")
     */
    private $atomicNumber;

    /**
     * @ORM\Column(type="string", length=100)
     *
     * @Serializer\Expose
     * @Serializer\Groups({"name"})
     */
    private $name;

    /**
     * @ORM\Column(type="string", length=10)
     *
     * @Serializer\Expose
     * @Serializer\Groups({"alias"})
     */
    private $alias;


    public function getId(): ?int
    {
        return $this->id;
    }

    public function getAtomicNumber(): ?int
    {
        return $this->atomicNumber;
    }

    public function setAtomicNumber(int $atomicNumber): self
    {
        $this->atomicNumber = $atomicNumber;

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

    public function getAlias(): ?string
    {
        return $this->alias;
    }

    public function setAlias(string $alias): self
    {
        $this->alias = $alias;

        return $this;
    }
}

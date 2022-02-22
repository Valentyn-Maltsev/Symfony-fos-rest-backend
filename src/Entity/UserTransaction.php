<?php

namespace App\Entity;

use App\Repository\UserTransactionRepository;
use Doctrine\ORM\Mapping as ORM;
use JMS\Serializer\Annotation as Serializer;

/**
 * @Serializer\ExclusionPolicy(Serializer\ExclusionPolicy::ALL)
 *
 * @ORM\Entity(repositoryClass=UserTransactionRepository::class)
 */
class UserTransaction
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     *
     * @Serializer\Expose
     */
    private $id;

    /**
     * @ORM\ManyToOne(targetEntity=User::class, inversedBy="userTransactions")
     * @ORM\JoinColumn(nullable=false)
     *
     * @Serializer\Expose
     */
    private $user;

    /**
     * @ORM\Column(type="decimal", precision=10, scale=2)
     *
     * @Serializer\Expose
     */
    private $amount;

    /**
     * @ORM\Column(type="string", length=255)
     *
     * @Serializer\Expose
     */
    private $status;

    /**
     * @ORM\Column(type="datetime")
     *
     * @Serializer\Expose
     */
    private $dateCreated;

    /**
     * @ORM\Column(type="string", length=255)
     *
     * @Serializer\Expose
     */
    private $type;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getUser(): ?User
    {
        return $this->user;
    }

    public function setUser(?User $user): self
    {
        $this->user = $user;

        return $this;
    }

    public function getAmount(): ?string
    {
        return $this->amount;
    }

    public function setAmount(string $amount): self
    {
        $this->amount = $amount;

        return $this;
    }

    public function getStatus(): ?string
    {
        return $this->status;
    }

    public function setStatus(string $status): self
    {
        $this->status = $status;

        return $this;
    }

    public function getDateCreated(): ?\DateTimeInterface
    {
        return $this->dateCreated;
    }

    public function setDateCreated(\DateTimeInterface $dateCreated): self
    {
        $this->dateCreated = $dateCreated;

        return $this;
    }

    public function getType(): ?string
    {
        return $this->type;
    }

    public function setType(string $type): self
    {
        $this->type = $type;

        return $this;
    }
}

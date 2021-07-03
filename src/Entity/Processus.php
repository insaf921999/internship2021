<?php

namespace App\Entity;

use App\Repository\ProcessusRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=ProcessusRepository::class)
 */
class Processus
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\ManyToOne(targetEntity=Macroprocessus::class, inversedBy="processus")
     * @ORM\JoinColumn(nullable=false)
     */
    private $macroprocessus;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $lib_p;
    public function __toString() {
        return $this->getLibP();
    }

    /**
     * @ORM\OneToMany(targetEntity=Risque::class, mappedBy="processus")
     */
    private $risques;

    public function __construct()
    {
        $this->risques = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getMacroprocessus(): ?Macroprocessus
    {
        return $this->macroprocessus;
    }

    public function setMacroprocessus(?Macroprocessus $macroprocessus): self
    {
        $this->macroprocessus = $macroprocessus;

        return $this;
    }

    public function getLibP(): ?string
    {
        return $this->lib_p;
    }

    public function setLibP(string $lib_p): self
    {
        $this->lib_p = $lib_p;

        return $this;
    }

    /**
     * @return Collection|Risque[]
     */
    public function getRisques(): Collection
    {
        return $this->risques;
    }

    public function addRisque(Risque $risque): self
    {
        if (!$this->risques->contains($risque)) {
            $this->risques[] = $risque;
            $risque->setProcessus($this);
        }

        return $this;
    }

    public function removeRisque(Risque $risque): self
    {
        if ($this->risques->removeElement($risque)) {
            // set the owning side to null (unless already changed)
            if ($risque->getProcessus() === $this) {
                $risque->setProcessus(null);
            }
        }

        return $this;
    }
}

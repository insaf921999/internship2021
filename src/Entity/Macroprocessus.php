<?php

namespace App\Entity;

use App\Repository\MacroprocessusRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=MacroprocessusRepository::class)
 */
class Macroprocessus
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
    private $lib_mp;

    /**
     * @ORM\OneToMany(targetEntity=Processus::class, mappedBy="macroprocessus")
     */
    private $processus;

    /**
     * @ORM\OneToMany(targetEntity=Risque::class, mappedBy="macroprocessus")
     */
    private $risques;

    public function __construct()
    {
        $this->processus = new ArrayCollection();
        $this->risques = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }
    public function __toString() {
        return $this->getLibMp();
    }

    public function getLibMp(): ?string
    {
        return $this->lib_mp;
    }

    public function setLibMp(string $lib_mp): self
    {
        $this->lib_mp = $lib_mp;

        return $this;
    }

    /**
     * @return Collection|Processus[]
     */
    public function getProcessus(): Collection
    {
        return $this->processus;
    }

    public function addProcessu(Processus $processu): self
    {
        if (!$this->processus->contains($processu)) {
            $this->processus[] = $processu;
            $processu->setMacroprocessus($this);
        }

        return $this;
    }

    public function removeProcessu(Processus $processu): self
    {
        if ($this->processus->removeElement($processu)) {
            // set the owning side to null (unless already changed)
            if ($processu->getMacroprocessus() === $this) {
                $processu->setMacroprocessus(null);
            }
        }

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
            $risque->setMacroprocessus($this);
        }

        return $this;
    }

    public function removeRisque(Risque $risque): self
    {
        if ($this->risques->removeElement($risque)) {
            // set the owning side to null (unless already changed)
            if ($risque->getMacroprocessus() === $this) {
                $risque->setMacroprocessus(null);
            }
        }

        return $this;
    }
}

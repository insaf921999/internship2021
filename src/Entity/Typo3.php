<?php

namespace App\Entity;

use App\Repository\Typo3Repository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=Typo3Repository::class)
 */
class Typo3
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\ManyToOne(targetEntity=Typo2::class, inversedBy="typo3s")
     * @ORM\JoinColumn(nullable=false)
     */
    private $typo2;

    /**
     * @ORM\OneToMany(targetEntity=Risque::class, mappedBy="niveau3")
     */
    private $risques;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $lib_typo3;

    public function __toString() {
        return $this->getLibTypo3();
    }

    public function __construct()
    {
        $this->risques = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getTypo2(): ?Typo2
    {
        return $this->typo2;
    }

    public function setTypo2(?Typo2 $typo2): self
    {
        $this->typo2 = $typo2;

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
            $risque->setNiveau3($this);
        }

        return $this;
    }

    public function removeRisque(Risque $risque): self
    {
        if ($this->risques->removeElement($risque)) {
            // set the owning side to null (unless already changed)
            if ($risque->getNiveau3() === $this) {
                $risque->setNiveau3(null);
            }
        }

        return $this;
    }

    public function getLibTypo3(): ?string
    {
        return $this->lib_typo3;
    }

    public function setLibTypo3(string $lib_typo3): self
    {
        $this->lib_typo3 = $lib_typo3;

        return $this;
    }
}

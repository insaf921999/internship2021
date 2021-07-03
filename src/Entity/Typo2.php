<?php

namespace App\Entity;

use App\Repository\Typo2Repository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=Typo2Repository::class)
 */
class Typo2
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\ManyToOne(targetEntity=Typo1::class, inversedBy="typo2s")
     * @ORM\JoinColumn(nullable=false)
     */
    private $typo1;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $lib_typo2;

    public function __toString() {
        return $this->getLibTypo2();
    }

    /**
     * @ORM\OneToMany(targetEntity=Typo3::class, mappedBy="typo2")
     */
    private $typo3s;

    /**
     * @ORM\OneToMany(targetEntity=Risque::class, mappedBy="niveau2")
     */
    private $risques;

    public function __construct()
    {
        $this->typo3s = new ArrayCollection();
        $this->risques = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getTypo1(): ?Typo1
    {
        return $this->typo1;
    }

    public function setTypo1(?Typo1 $typo1): self
    {
        $this->typo1 = $typo1;

        return $this;
    }

    public function getLibTypo2(): ?string
    {
        return $this->lib_typo2;
    }

    public function setLibTypo2(string $lib_typo2): self
    {
        $this->lib_typo2 = $lib_typo2;

        return $this;
    }

    /**
     * @return Collection|Typo3[]
     */
    public function getTypo3s(): Collection
    {
        return $this->typo3s;
    }

    public function addTypo3(Typo3 $typo3): self
    {
        if (!$this->typo3s->contains($typo3)) {
            $this->typo3s[] = $typo3;
            $typo3->setTypo2($this);
        }

        return $this;
    }

    public function removeTypo3(Typo3 $typo3): self
    {
        if ($this->typo3s->removeElement($typo3)) {
            // set the owning side to null (unless already changed)
            if ($typo3->getTypo2() === $this) {
                $typo3->setTypo2(null);
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
            $risque->setNiveau2($this);
        }

        return $this;
    }

    public function removeRisque(Risque $risque): self
    {
        if ($this->risques->removeElement($risque)) {
            // set the owning side to null (unless already changed)
            if ($risque->getNiveau2() === $this) {
                $risque->setNiveau2(null);
            }
        }

        return $this;
    }
}

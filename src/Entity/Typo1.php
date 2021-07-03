<?php

namespace App\Entity;

use App\Repository\Typo1Repository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=Typo1Repository::class)
 */
class Typo1
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
    private $lib_typo1;

    public function __toString() {
        return $this->getLibTypo1();
    }


    /**
     * @ORM\OneToMany(targetEntity=Typo2::class, mappedBy="typo1")
     */
    private $typo2s;

    /**
     * @ORM\OneToMany(targetEntity=Risque::class, mappedBy="niveau1")
     */
    private $risques;

    public function __construct()
    {
        $this->typo2s = new ArrayCollection();
        $this->risques = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getLibTypo1(): ?string
    {
        return $this->lib_typo1;
    }

    public function setLibTypo1(string $lib_typo1): self
    {
        $this->lib_typo1 = $lib_typo1;

        return $this;
    }

    /**
     * @return Collection|Typo2[]
     */
    public function getTypo2s(): Collection
    {
        return $this->typo2s;
    }

    public function addTypo2(Typo2 $typo2): self
    {
        if (!$this->typo2s->contains($typo2)) {
            $this->typo2s[] = $typo2;
            $typo2->setTypo1($this);
        }

        return $this;
    }

    public function removeTypo2(Typo2 $typo2): self
    {
        if ($this->typo2s->removeElement($typo2)) {
            // set the owning side to null (unless already changed)
            if ($typo2->getTypo1() === $this) {
                $typo2->setTypo1(null);
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
            $risque->setNiveau1($this);
        }

        return $this;
    }

    public function removeRisque(Risque $risque): self
    {
        if ($this->risques->removeElement($risque)) {
            // set the owning side to null (unless already changed)
            if ($risque->getNiveau1() === $this) {
                $risque->setNiveau1(null);
            }
        }

        return $this;
    }
}

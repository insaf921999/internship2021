<?php

namespace App\Entity;

use App\Repository\RisqueRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=RisqueRepository::class)
 */
class Risque
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\ManyToOne(targetEntity=Macroprocessus::class, inversedBy="risques")
     * @ORM\JoinColumn(nullable=false)
     */
    private $macroprocessus;

    /**
     * @ORM\ManyToOne(targetEntity=Processus::class, inversedBy="risques")
     */
    private $processus;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $designation;

    /**
     * @ORM\ManyToOne(targetEntity=Typo1::class, inversedBy="risques")
     * @ORM\JoinColumn(nullable=false)
     */
    private $niveau1;

    /**
     * @ORM\ManyToOne(targetEntity=Typo2::class, inversedBy="risques")
     * @ORM\JoinColumn(nullable=false)
     */
    private $niveau2;

    /**
     * @ORM\ManyToOne(targetEntity=Typo3::class, inversedBy="risques")
     * @ORM\JoinColumn(nullable=false)
     */
    private $niveau3;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $Description;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $Impact;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $frequence;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $Risque_intrinseque;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $DMR;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $EvaluationDMR;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $RisqueResiduel;

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

    public function getProcessus(): ?Processus
    {
        return $this->processus;
    }

    public function setProcessus(?Processus $processus): self
    {
        $this->processus = $processus;

        return $this;
    }

    public function getDesignation(): ?string
    {
        return $this->designation;
    }

    public function setDesignation(string $designation): self
    {
        $this->designation = $designation;

        return $this;
    }

    public function getNiveau1(): ?Typo1
    {
        return $this->niveau1;
    }

    public function setNiveau1(?Typo1 $niveau1): self
    {
        $this->niveau1 = $niveau1;

        return $this;
    }

    public function getNiveau2(): ?Typo2
    {
        return $this->niveau2;
    }

    public function setNiveau2(?Typo2 $niveau2): self
    {
        $this->niveau2 = $niveau2;

        return $this;
    }

    public function getNiveau3(): ?Typo3
    {
        return $this->niveau3;
    }

    public function setNiveau3(?Typo3 $niveau3): self
    {
        $this->niveau3 = $niveau3;

        return $this;
    }

    public function getDescription(): ?string
    {
        return $this->Description;
    }

    public function setDescription(string $Description): self
    {
        $this->Description = $Description;

        return $this;
    }

    public function getImpact(): ?string
    {
        return $this->Impact;
    }

    public function setImpact(string $Impact): self
    {
        $this->Impact = $Impact;

        return $this;
    }

    public function getFrequence(): ?string
    {
        return $this->frequence;
    }

    public function setFrequence(string $frequence): self
    {
        $this->frequence = $frequence;

        return $this;
    }

    public function getRisqueIntrinseque(): ?string
    {
        return $this->Risque_intrinseque;
    }

    public function setRisqueIntrinseque(string $Risque_intrinseque): self
    {
        $this->Risque_intrinseque = $Risque_intrinseque;

        return $this;
    }

    public function getDMR(): ?string
    {
        return $this->DMR;
    }

    public function setDMR(string $DMR): self
    {
        $this->DMR = $DMR;

        return $this;
    }

    public function getEvaluationDMR(): ?string
    {
        return $this->EvaluationDMR;
    }

    public function setEvaluationDMR(string $EvaluationDMR): self
    {
        $this->EvaluationDMR = $EvaluationDMR;

        return $this;
    }

    public function getRisqueResiduel(): ?string
    {
        return $this->RisqueResiduel;
    }

    public function setRisqueResiduel(string $RisqueResiduel): self
    {
        $this->RisqueResiduel = $RisqueResiduel;

        return $this;
    }
}

<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\LeagueRepository")
 */
class League
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;


	/**
	 * @var string
	 *
	 * @ORM\Column(name="name", type="string", length=255, unique=true)
	 */
	private $name;

	/**
	 * @ORM\OneToMany(targetEntity="App\Entity\Team", mappedBy="league")
	 */
	private $teams;

	public function __construct()
	{
		$this->teams = new ArrayCollection();
	}

	/**
	 * @return Collection|Product[]
	 */
	public function getProducts(): Collection
	{
		return $this->products;
	}

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getName(): ?string
    {
        return $this->name;
    }}

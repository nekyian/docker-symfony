<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\TeamRepository")
 */
class Team
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
	 * @var string
	 *
	 * @ORM\Column(name="strip", type="string", length=255, unique=true)
	 */
	private $strip;

	/**
	 * @var string
	 *
	 * @ORM\Column(name="firm", type="string", length=255)
	 */
	private $firm;

	public function getId(): ?int
	{
		return $this->id;
	}

	public function getName(): ?string
	{
		return $this->name;
	}

	public function getStrip(): ?string
	{
		return $this->strip;
	}

	public function getFirm(): ?string
	{
		return $this->firm;
	}

	public function __toArray()
	{
		return [
			'id' => $this->getId(),
			'name' => $this->getName(),
			'strip' => $this->getStrip(),
			'firm' => $this->getFirm()
		];
	}

	public function setName($name)
	{
		$this->name = $name;
	}

	public function setStrip($strip)
	{
		$this->strip = $strip;
	}

	public function setFirm($firm)
	{
		$this->firm = $firm;
	}
}

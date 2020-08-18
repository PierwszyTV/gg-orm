<?php

namespace App\Entity;

use App\Repository\LotteryTicketRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=LotteryTicketRepository::class)
 */
class LotteryTicket
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

	/**
	 * @ORM\ManyToOne(targetEntity="Lottery", inversedBy="lottery_tickets")
	 */
    private $lottery;

    /**
     * @ORM\Column(type="datetime")
     */
    private $created_at;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getCreatedAt(): ?\DateTimeInterface
    {
        return $this->created_at;
    }

    public function setCreatedAt(\DateTimeInterface $created_at): self
    {
        $this->created_at = $created_at;

        return $this;
    }

	/**
	 * @return mixed
	 */
	public function getLottery()
	{
		return $this->lottery;
	}

	/**
	 * @param mixed $lottery
	 * @return LotteryTicket
	 */
	public function setLottery($lottery): self
	{
		$this->lottery = $lottery;

		return $this;
	}
}

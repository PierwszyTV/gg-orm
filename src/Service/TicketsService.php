<?php


namespace App\Service;


use App\Entity\Lottery;
use App\Entity\LotteryTicket;
use App\Repository\LotteryRepository;
use DateTime;

class TicketsService
{
	/**
	 * @var LotteryRepository
	 */
	private $lotteryRepository;

	public function __construct(LotteryRepository $lotteryRepository)
	{
		$this->lotteryRepository = $lotteryRepository;
	}

	/**
	 * @param string $slug
	 * @return mixed
	 */
	public function getLotteryTickets(string $slug)
	{
		/** @var Lottery $lottery */
		$lottery = $this->lotteryRepository->findOneBy(['slug' => $slug]);

		$closure = function($maxTimeAgo = "1 month") use ($lottery) {
			$tickets = $lottery->getLotteryTickets();
			$response = [];

			/** @var LotteryTicket $ticket */
			foreach ($tickets as $ticket)
			{
				$createdAt = $ticket->getCreatedAt()->getTimestamp();
				$maxDateAgo = (new DateTime("-" . $maxTimeAgo))->getTimestamp();

				if ($createdAt >= $maxDateAgo) $response[] = $ticket;
			}

			return $response;
		};

		return $closure;
	}

}
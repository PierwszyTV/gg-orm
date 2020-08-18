<?php


namespace App\Controller;


use App\Entity\LotteryTicket;
use App\Service\TicketsService;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\Routing\Annotation\Route;

class TicketsController
{

	/**
	 * @var TicketsService
	 */
	private $service;

	public function __construct(TicketsService $service)
	{
		$this->service = $service;
	}

	/**
	 * @Route("/tickets", name="get_tickets_from_lottery_action")
	 * @return JsonResponse
	 */
	public function getTicketsFromLotteryAction()
	{
		$lotterySlug = 'lottery_slug';

		//Create closure for specific slug
		$ticketsClosure = $this->service->getLotteryTickets($lotterySlug);

		$response = [];

		//Get tickets everywhere in your code, as parameters you can add maxTimeDate in string e.g. 2 days
		$tickets = $ticketsClosure();

		/** @var LotteryTicket $ticket */
		foreach ($tickets as $ticket) $response[] = $ticket->getId();

		return new JsonResponse($response);
	}
}
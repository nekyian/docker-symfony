<?php

namespace App\Controller;

use App\Entity\Team;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Response;

class TeamsController extends AbstractController
{
    /**
     * @Route("/teams", name="teams")
     */
    public function index()
    {
		$teams = $this->getDoctrine()->getRepository(Team::class)->findAllTeams();

	    $response = new Response();
	    $response->setContent($teams);
	    $response->headers->set('Content-Type', 'application/json');

	    return $response;
    }

	/**
	 * @Route("/teams/{league}", name="teams_by_league_list", requirements={"league"="\d+"})
	 */
	public function getTeamsByLeague($league)
	{
		$teams = $this->getDoctrine()->getRepository(Team::class)->findAllTeamsByLeague($league);

		$response = new Response();
		$response->setContent($teams);
		$response->headers->set('Content-Type', 'application/json');

		return $response;
	}
}

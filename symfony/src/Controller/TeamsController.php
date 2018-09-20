<?php

namespace App\Controller;

use App\Entity\League;
use App\Entity\Team;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Request;

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

	/**
	 * @Route("/team", name="post_team", methods={"POST"})
	 * @param Request $request
	 *
	 * @return Response
	 */
	public function createTeam(Request $request)
	{
		$data = json_decode(
			$request->getContent(),
			true
		);

		$team = new Team();
		$team->setName($data['name']);
		$team->setStrip($data['strip']);
		$team->setFirm($data['firm']);
		$league = $this->getDoctrine()->getRepository(League::class)->find($data['league']);
		$team->setLeague($league);
		$em = $this->getDoctrine()->getManager();
		$em->persist($team);
		$em->flush();

		$response = new Response();
		$response->setStatusCode(Response::HTTP_CREATED);
		$response->headers->set('Location', $request->getSchemeAndHttpHost() . '/' . $team->getId());
		$response->setContent(json_encode([
			'status' => 'OK'
		]));
		$response->headers->set('Content-Type', 'application/json');

		return $response;
	}
}

<?php
/**
 * Created by PhpStorm.
 * User: nekyian
 * Date: 18/09/2018
 * Time: 10:03
 */

use App\Tests\TestCase;

class ListTeamsTest extends TestCase
{
	/**
	 *
	 */
	public function testListTeamsResponse()
	{
		$this->client->request('GET', '/teams');

		$response = $this->client->getResponse();

		$this->assertSame(200, $response->getStatusCode());
		$this->assertResponse($response, 'teams/list_response');
	}

	/**
	 *
	 */
	public function testListTeamsByLeagueResponse()
	{
		$this->client->request('GET', '/teams/1');

		$response = $this->client->getResponse();

		$this->assertSame(200, $response->getStatusCode());
		$this->assertResponse($response, 'teams/list_by_league_response');
	}

	/**
	 *
	 */
	public function testListTeamsByLeagueEmptyResponse()
	{
		$this->client->request('GET', '/teams/2');

		$response = $this->client->getResponse();

		$this->assertSame(200, $response->getStatusCode());
		$this->assertResponse($response, 'teams/list_by_league_empty_response');
	}

	/**
	 *
	 */
	public function testCreateTeamResponse()
	{
		$this->client->request('POST', '/team', [
			'name' => 'Arsenal',
			'strip' => 'red-white',
			'firm' => 'very strong',
			'league' => 2,
		]);

		$response = $this->client->getResponse();

		$this->assertSame(201, $response->getStatusCode());
		$this->assertTrue($response->hasHeader('Location'));
		$this->assertResponse($response, 'teams/create_team_response');
	}
}
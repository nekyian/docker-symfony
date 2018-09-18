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
	public function testListTeamsResponse()
	{
		$this->client->request('GET', '/teams');

		$response = $this->client->getResponse();

		$this->assertResponse($response, 'teams/list_response');
	}

	public function tearDown()
	{
		\Mockery::close();
		$this->client = null;

		static::ensureKernelShutdown();
	}
}
<?php
/**
 * Created by PhpStorm.
 * User: nekyian
 * Date: 18/09/2018
 * Time: 10:03
 */

use Lakion\ApiTestCase\JsonApiTestCase;

class ListTeamsTest extends JsonApiTestCase
{
	public function testListTeamsResponse()
	{
		$this->client->request('GET', '/teams');

		$response = $this->client->getResponse();

		$this->assertResponse($response, 'teams/list_response');
	}
}
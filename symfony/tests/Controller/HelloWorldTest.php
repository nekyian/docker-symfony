<?php
/**
 * Created by PhpStorm.
 * User: nekyian
 * Date: 18/09/2018
 * Time: 10:03
 */

use Lakion\ApiTestCase\JsonApiTestCase;

class HelloWorldTest extends JsonApiTestCase
{
	public function testGetHelloWorldResponse()
	{
		$this->client->request('GET', '/');

		$response = $this->client->getResponse();

		$this->assertResponse($response, 'hello_world');
	}
}
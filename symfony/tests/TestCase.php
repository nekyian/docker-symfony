<?php
/**
 * Created by PhpStorm.
 * User: nekyian
 * Date: 18/09/2018
 * Time: 11:53
 */

namespace App\Tests;

use Lakion\ApiTestCase\JsonApiTestCase;

/**
 * TestCase wrapper.
 */
class TestCase extends JsonApiTestCase
{
	public function tearDown()
	{
		\Mockery::close();
		$this->client = null;

		static::ensureKernelShutdown();
	}
}
<?php
/**
 * Created by PhpStorm.
 * User: nekyian
 * Date: 18/09/2018
 * Time: 13:06
 */

namespace App\DataFixtures;

use App\Entity\League;
use App\Entity\Team;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\Persistence\ObjectManager;

class AppFixtures extends Fixture
{
	public function load(ObjectManager $manager)
	{
		$teams = [
			[
				'name' => 'Manchester United',
				'strip' => 'red',
				'firm' => 'weak'
			],
			[
				'name' => 'Liverpool',
				'strip' => 'black',
				'firm' => 'strong'
			],
			[
				'name' => 'Chelsea',
				'strip' => 'green',
				'firm' => 'weak'
			]
		];

		foreach ( $teams as $team ) {
			$teamEntity = new Team();
			$teamEntity->setName($team['name']);
			$teamEntity->setStrip($team['strip']);
			$teamEntity->setFirm($team['firm']);
			$manager->persist($teamEntity);

		}

		$manager->flush();
	}
}

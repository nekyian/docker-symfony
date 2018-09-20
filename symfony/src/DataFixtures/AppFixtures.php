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
		$leagues = [
			[
				'name' => 'Premier League',
			],
			[
				'name' => 'Second Division',
			],
			[
				'name' => 'Third Division',
			]
		];

		$i = 0;
		foreach ( $leagues as $league ) {
			$leagueEntity = new League();
			$leagueEntity->setName($league['name']);
			$manager->persist($leagueEntity);
			if ($i === 0)
				$premierLeagueEntity = $leagueEntity;
			$i++;
		}

		$teams = [
			[
				'name' => 'Manchester United',
				'strip' => 'red',
				'firm' => 'weak',
				'league' => $premierLeagueEntity
			],
			[
				'name' => 'Liverpool',
				'strip' => 'black',
				'firm' => 'strong',
				'league' => $premierLeagueEntity
			],
			[
				'name' => 'Chelsea',
				'strip' => 'green',
				'firm' => 'weak',
				'league' => $premierLeagueEntity
			]
		];

		foreach ( $teams as $team ) {
			$teamEntity = new Team();
			$teamEntity->setName($team['name']);
			$teamEntity->setStrip($team['strip']);
			$teamEntity->setFirm($team['firm']);
			$teamEntity->setLeague($team['league']);
			$manager->persist($teamEntity);

		}

		$manager->flush();
	}
}

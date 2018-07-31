<?php
namespace App\Repositories;
use App\Contracts\TeamInterface;
use App\Team;

class TeamRepository implements TeamInterface
{
	protected $team;
	public function __construct(Team $team)
	{
		$this->team = $team;
	}

	public function getTeamData()
	{
		try
		{
			return $this->team->all();
		}
		catch(\Exception $e)
		{
			return $e->getMessage();
		}
	}
}
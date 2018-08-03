<?php
namespace App\Repositories;
use App\Contracts\TeamInterface;
use App\Team;
use App\User;
use DB;
class TeamRepository implements TeamInterface
{
	protected $team;
	protected $user;
	public function __construct(Team $team, User $user)
	{
		$this->team = $team;
		$this->user = $user;
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

	public function getTeamDataById($id)
	{
		try
		{
			return $this->team->with('user')->find($id);
		}
		catch(\Exception $e)
		{
			return $e->getMessage();
		}
	}

	public function updateTeamDataById($id, $request)
	{
		DB::beginTransaction();
		try
		{
			$updateTeamData = $this->team->find($id)->update($request);
			DB::commit();
			return $updateTeamData;
		}
		catch(\Exception $e)
		{
			DB::rollback();
			return $e->getMessage();
		}
	}

	public function deleteTeamDataById($id)
	{
		try
		{
			$deleteTeamData = $this->team->find($id)->update([
				'status' => 0
			]);
			return $deleteTeamData;
		}
		catch(\Exception $e)
		{
			return $e->getMessage();
		}
	}

	public function recoverTeamDataById($id)
	{
		try
		{
			$recoverData = $this->team->find($id)->update([
				'status' => 1
			]);
			return $recoverData;
		}
		catch(\Exception $e)
		{
			return $e->getMessage();
		}
	}

	public function createTeamData($request)
	{
		DB::beginTransaction();
		try
		{
			$createTeamData = $this->team->create($request);
			DB::commit();
			return $createTeamData;
		}
		catch(\Exception $e)
		{
			DB::rollback();
			return $e->getMessage();
		}
	}

	public function searchTeamUserData($id, $request)
	{
		DB::beginTransaction();
		try
		{
			$getTeam = $this->team->with('user')->find($id);
			foreach($getTeam->user as $user)
			{
			  $searchUser = $this->user->where('name','LIKE',"%{$request}%")->get();
			}
			return $searchUser;
		}
		catch(\Exception $e)
		{
			DB::rollback();
			return $re->getMessage();
		}
	}
}
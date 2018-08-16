<?php

namespace App\Repositories;
use App\Contracts\UserInterface;
use App\User;
use App\Team;
use App\Role;
use Auth;
use DB;

class UserRepository implements UserInterface
{
	protected $user;
	protected $team;
	protected $role;
	public function __construct(User $user, Team $team, Role $role)
	{
		$this->user = $user;
		$this->team = $team;
		$this->role = $role;
	}
	public function insertUserData($request)
	{
		DB::beginTransaction();
		try
		{
			$createUser = $this->user->create($request);
			if(($createUser->role_id==1 )||($createUser->role_id==2)||($createUser->role_id==3))
			{
				$this->user->where([
				'role_id'=>4
			])->update(['parent_id'=>$createUser->id]);	
			}
			elseif($createUser->role_id==4)
			{
			        $this->user->where([
					'team_id'=>$createUser->team_id,
					'role_id'=>5])->update(['parent_id'=>$createUser->id]);

					$this->user->where([
					'team_id'=>$createUser->team_id,
					'role_id'=>$createUser->role_id])->update(['parent_id'=>1]);
			}
			else
			{
				$teamLeader = $this->user->where([
					'team_id'=>$createUser->team_id,
					'role_id'=>4
				])->first();
			    $this->user->where(['team_id'=>$createUser->team_id,
									'role_id'=>$createUser->role_id])->update(['parent_id'=>$teamLeader->id]);
			}
			DB::commit();
			return $createUser;	
		}	
		catch(\Exception $e)
		{
			DB::rollback();
			return $e->getMessage();
		}
	}

	public function getUserData()
	{
		try
		{
			return $this->user->with('team','role')->latest()->paginate(5);
		}
		catch(\Exception $e)
		{
			return $e->getMessage();
		}
	}

	public function getUserDataById($id)
	{
		try
		{
			return $this->user->with('team','role')->find($id);
		}
		catch(\Exception $e)
		{
			return $e->getMessage();
		}
	}

	public function updateUserDataById($id, $request)
	{
		DB::beginTransaction();
		try
		{
			// dd($request);
			$updateUserData = $this->user->find($id)->update($request);
			$getUserData = $this->user->find($id);
			// dd($getUserData);
			DB::commit();
			return $updateUserData;
		}
		catch(\Exception $e)
		{
			DB::rollback();
			return $e->getMessage();
		}
	}

	public function deleteUserDataById($id)
	{
		try
		{
			return $this->user->find($id)->update([
				'status' => 0
			]);
		}
		catch(\Exception $e)
		{
			return $e->getMessage();
		}
	}

	public function recoverUserDataById($id)
	{
		try
		{
			return $this->user->find($id)->update([
				'status' => 1
			]);
		}
		catch(\Exception $e)
		{
			return $e->getMessage();
		}
	}

	public function searchUserData($request)
	{
		try
		{
			$getSearchData = $this->user->where('name','LIKE',"%{$request}%")->orWhere('email','LIKE',"%{$request}%")->orWhere('phone','LIKE',"%{$request}%")->orWhere('address','LIKE',"%{$request}%")->with('team','role')->get();
			return $getSearchData;
		}
		catch(\Exception $e)
		{
			return $e->getMessage();
		}
	}

	public function getProfileData()
	{
		try
		{
		  return Auth::user()->with('team','role')->get();
		}
		catch(\Exception $e)
		{
			return $e->getMessage();
		}
	}

	public function uploadUserImage($id, $image)
	{
		DB::beginTransaction();
		try
		{
			$uploadImage = $this->user->find($id)->update([
				'image' => $image
			]);
			DB::commit();
			return $uploadImage;
		}
		catch(\Exception $e)
		{
			DB::rollback();
			return $e->getMessage();
		}
	}

	public function recoveryPassword($email, $request)
	{
		try
		{
			$userdata = $this->user->where('email',$email)->update($request);
			if($userdata==1)
			{
				return $this->user->where('email',$email)->first();
			}
		}
		catch(\Exception $e)
		{
			return $e->getMessage();
		}
	}

	public function findEmail()
	{
		try
		{
			$userdata = $this->user->select('email')->where('team_id',1)->get();
			return $userdata;
		}
		catch(\Exception $e)
		{
			return $e->getMessage();
		}
	}

	public function getTeamLeaderEmail($team_id)
	{
		try
		{
			if(Auth::user()->role_id==4)
			{
				$email = $this->user->where('role_id',2)->get();
				return $email;
			}
			else
			{
				$email = $this->user->where([
					'team_id'=>$team_id,
					'role_id'=>4
				])->first();
				return $email;
			}
		}
		catch(\Exception $e)
		{
			return $e->getMessage();
		}
	}

	public function getHierarchyData()
	{
		try
		{
			if(Auth::user()->role_id==5)
			{
				$getHierarchyData = $this->user->where('role_id',2)->first();
				return $getHierarchyData;
			}
		}
		catch(\Exception $e)
		{
			return $e->getMessage();
		}
		
	}
} 
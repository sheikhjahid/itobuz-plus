<?php

namespace App\Repositories;
use App\Contracts\RoleInterface;
use App\Role;
use App\User;
use DB;
class RoleRepository implements RoleInterface
{
	protected $role;
	protected $user;
	public function __construct(Role $role,User $user)
	{
		$this->role = $role;
		$this->user = $user;
	}

	public function getRoleData()
	{
		try
		{
			return $this->role->all();
		}
		catch(\Exception $e)
		{
			return $e->getMessage();
		}
	}

	public function getRoleDataById($id)
	{
		try
		{
			return $this->role->with('user')->find($id);
		}
		catch(\Exception $e)
		{
			return $e->getMessage();
		}
	}

	public function getRoleUser($id, $request)
	{
		try
		{
			$roledata = $this->role->with('user')->find($id);
			foreach($roledata->user as $user)
			{
				$searchUser = $this->user->where('name','LIKE',"%{$request}%")->get();
			}
			return $searchUser;
		}
		catch(\Exception $e)
		{
			return $e->getMessage();
		}
	}

	public function createRoleData($request)
	{
		DB::beginTransaction();
		try
		{
			$createRoleData = $this->role->create($request);
			DB::commit();
			return $createRoleData;
		}
		catch(\Exception $e)
		{
			DB::rollback();
			return $e->getMessage();
		}
	}
}
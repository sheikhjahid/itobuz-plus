<?php

namespace App\Repositories;
use App\Contracts\RoleInterface;
use App\Role;

class RoleRepository implements RoleInterface
{
	protected $role;
	public function __construct(Role $role)
	{
		$this->role = $role;
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
}
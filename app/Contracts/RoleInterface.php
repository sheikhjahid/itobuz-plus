<?php

namespace App\Contracts;

interface RoleInterface
{
	public function getRoleData();
	public function getRoleDataById($id);
	public function getRoleUser($id, $request);
}
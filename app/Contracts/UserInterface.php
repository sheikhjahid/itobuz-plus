<?php

namespace App\Contracts;

interface UserInterface
{
	public function getUserData();
	public function getUserDataById($id);
	public function updateUserDataById($id, $request);
	public function deleteUserDataBYId($id);
	public function recoverUserDataById($id);
}
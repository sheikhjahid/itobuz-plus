<?php

namespace App\Contracts;

interface TeamInterface
{
	public function getTeamData();
	public function getTeamDataById($id);
	public function updateTeamDataById($id, $request);
	public function deleteTeamDataById($id);
	public function recoverTeamDataById($id);
	public function createTeamData($request);
}
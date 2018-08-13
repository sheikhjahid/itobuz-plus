<?php

namespace App\Contracts;

interface UserInterface
{
	public function insertUserData($request,$team_id);
	public function getUserData();
	public function getUserDataById($id);
	public function updateUserDataById($id, $request);
	public function deleteUserDataBYId($id);
	public function recoverUserDataById($id);
	public function searchUserData($request);
	public function getProfileData();
	public function uploadUserImage($id, $image);
	public function recoveryPassword($email, $request);
	public function getTeamLeaderEmail($user_id);



	public function findEmail();
}
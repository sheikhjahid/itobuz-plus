<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\UserRequest;
use App\Contracts\UserInterface;
use App\Contracts\TeamInterface;
use App\Contracts\RoleInterface;

class UserController extends Controller
{
    protected $userInterface;
    protected $teamInterface;
    protected $roleInterface;

    public function __construct(UserInterface $userInterface, TeamInterface $teamInterface, RoleInterface $roleInterface)
    {
    	$this->userInterface = $userInterface;
    	$this->teamInterface = $teamInterface;
    	$this->roleInterface = $roleInterface;
    }

    public function getAllUsers()
    {
    	$userData = $this->userInterface->getUserData();
    	return view('User.allUser')->with('userdata',$userData);
    }

    public function getUserById($id)
    {
    	$userData = $this->userInterface->getUserDataById($id);
    	return view('User.singleUser')->with('userdata',$userData);
    }

    public function editUserById($id)
    {
    	$teamData = $this->teamInterface->getTeamData();
    	$roleData = $this->roleInterface->getRoleData();
    	$userData = $this->userInterface->getUserDataById($id);
    	return view('User.editUser')->with(['userdata'=>$userData,
    										'teamData'=>$teamData,
    									    'roleData'=>$roleData]);
    }

    public function updataUserById($id, UserRequest $request)
    {
      $requestData = $request->all();
      $checkUpdatedData = $this->userInterface->updateUserDataById($id, $requestData);
      if($checkUpdatedData==1)
      {
      	return redirect('users')->with('update_success','Userdata updated successfully!!');
      }
      else
      {
      	return redirect('users')->with('update_failure', 'Unable to update userdata!!');
      }
    }

    public function deleteUserById($id)
    {
    	$checkDeletedData = $this->userInterface->deleteUserDataById($id);
    	if($checkDeletedData==1)
    	{
    		return redirect('users')->with('delete_success','Userdata deleted successfully!!');
    	}
    	else
    	{
    		return redirect('users')->with('delete_failure','Unable to delete userdata!!');
    	}
    }

    public function recoverUserById($id)
    {
    	$checkRecoveryData = $this->userInterface->recoverUserDataById($id);
    	if($checkRecoveryData==1)
    	{
    		return redirect('users')->with('recovery_success','Userdata recovered successfully!!');
    	}
    	else
    	{
    		return redirect('users')->with('recovery_failure','Unable to recover userdata!!');
    	}
    }

    public function searchUser(Request $request)
    {
        $key = $request->key;
    	$checkSearchData = $this->userInterface->searchUserData($key);

    	if($checkSearchData==false)
    	{
    		return redirect('users')->with('search_failure','Unable to find any data for this key value!!');
    	}
    	else
    	{
    		return view('User.searchUser')->with('userdata',$checkSearchData);
    	}
    }
}

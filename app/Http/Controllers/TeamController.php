<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\TeamRequest;
use App\Contracts\TeamInterface;

class TeamController extends Controller
{
    protected $teamInterface;
    public function __construct(TeamInterface $teamInterface)
    {
    	$this->teamInterface = $teamInterface;
    }
    public function getAllTeams()
    {
    	$teamData = $this->teamInterface->getTeamData();
    	return view('Team.allTeam')->with('teamdata',$teamData);
    }

    public function getTeamById($id)
    {
    	$teamData = $this->teamInterface->getTeamDataById($id);
    	return view('Team.singleTeam')->with('teamdata',$teamData);
    }

    public function editTeamById($id)
    {
    	$teamData = $this->teamInterface->getTeamDataById($id);
    	return view('Team.editTeam')->with('teamdata',$teamData);
    }

    public function updateTeamById($id, TeamRequest $request)
    {
    	$requestData = $request->all();
    	$requestData['name'] = $request->name;
    	$checkUpdatedData = $this->teamInterface->updateTeamDataById($id, $requestData);
    	if($checkUpdatedData==1)
    	{
    		return redirect('teams')->with('update_success','Team data updated successfully!!');
    	}
    	else
    	{
    		return redirect('teams')->with('update_failure','Unable to update team data!!');
    	}
    }

    public function deleteTeamById($id)
    {
    	$checkDeletedData = $this->teamInterface->deleteTeamDataById($id);
    	if($checkDeletedData==1)
    	{
    		return redirect('teams')->with('delete_success','Team data deleted successfully!!');
    	}
    	else
    	{
    		return redirect('teams')->with('delete_failure','Unable to delete team data!!');
    	}
    }

    public function recoverTeamById($id)
    {
    	$checkRecoverData = $this->teamInterface->recoverTeamDataById($id);
    	if($checkRecoverData==1)
    	{
    		return redirect('teams')->with('recover_success','Team data recovered successfully!!');
    	}
    	else
    	{
    		return redirect('teams')->with('recover_failure','Unable to recover team data!!');
    	}
    }

    public function createForm()
    {
    	return view('Team.createTeam');
    }

    public function createTeam(TeamRequest $request)
    {
    	$requestData = $request->all();
    	$checkCreatedData = $this->teamInterface->createTeamData($requestData);
    	if($checkCreatedData)
    	{
    		return redirect('teams')->with('create_success','Team data created successfully!!');
    	}
    	else
    	{
    		return redirect('teams')->with('create_failure','Unable to create team data!!');
    	}
    }
}

<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\RoleRequest;
use App\Contracts\RoleInterface;

class RoleController extends Controller
{
	protected $roleInterface;
    public function __construct(RoleInterface $roleInterface)
    {
    	$this->roleInterface = $roleInterface;
    }

    public function getAllRoles()
    {
    	$roleData = $this->roleInterface->getRoleData();
    	return view('Role.allRole')->with('roledata',$roleData);
    }

    public function getRoleById($id)
    {
    	$roleData = $this->roleInterface->getRoleDataById($id);
    	return view('Role.singleRole')->with('roledata',$roleData);
    }

    public function createRole(RoleRequest $request)
    {
        $requestData = $request->all();
        $checkCreatedData = $this->roleInterface->createRoleData($requestData);
        if($checkCreatedData)
        {
            return redirect('roles')->with('create_success','Role data created successfully!!');
        }
        else
        {
            return redirect('roles')->with('create_failure','Unbale to create role data!!');
        }
    }

    public function searchRoleUser(Request $request)
    {
    	try
    	{
    		if($request->ajax())
            {
                $id = $request->get('id');
                $name = $request->get('name');
                $userdata = $this->roleInterface->getRoleUser($id,$name);
                if(count($userdata) >= 1)
                {
                  return $userdata;  
                }
                else
                {
                    return "No data found!!";
                }
    	    }
        }
        catch(\Exception $e)
        {
            return $e->getMessage();
        }	
    }
}

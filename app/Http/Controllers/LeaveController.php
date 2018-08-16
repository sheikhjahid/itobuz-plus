<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\LeaveTypeRequest;
use App\Http\Requests\LeaveRequest;
use App\Contracts\LeaveInterface;
use App\Contracts\UserInterface;
use Auth,Carbon,Mail;
use App\Mail\SendLeaveRequest;
class LeaveController extends Controller
{
    protected $leaveInterface;
    protected $userInterface;
    public function __construct(LeaveInterface $leaveInterface, UserInterface $userInterface)
    {
    	$this->leaveInterface = $leaveInterface;
        $this->userInterface = $userInterface;
    }

    public function getAllTypes()
    {
    	$leaveData = $this->leaveInterface->getTypeDataPagination();
    	return view('Leave.allTypes')->with('leavedata',$leaveData);
    }

    public function getLeaveById($id)
    {
        $leaveData = $this->leaveInterface->getPolicyById($id);
        return view('Leave.singleLeave')->with('leavedata',$leaveData);
    }

    public function searchLeaveUser(Request $request)
    {
        try
        {
            if($request->ajax())
            {
                $id = $request->get('id');
                $name = $request->get('name');
                $searchUser = $this->leaveInterface->searchUserData($id,$name);
                if(count($searchUser)!=0)
                {    
                  return $searchUser;
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

    public function editPolicy($id)
    {
        $leaveData = $this->leaveInterface->getPolicyById($id);
        return view('Leave.editLeaveType')->with('leavedata',$leaveData);
    }

    public function updatePolicy($id, LeaveTypeRequest $request)
    {
        $requestData['name'] = $request->name;
        $checkUpdatedData = $this->leaveInterface->updatePolicyData($id, $requestData);
        if($checkUpdatedData==1)
        {
            return redirect('policies')->with('update_success','Policy data updated successfully!!');
        }
        else
        {
            return redirect('policies')->with('update_failure','Unable to update policy data');
        }
    }

    public function createPolicy(LeaveTypeRequest $request)
    {
        $requestData = $request->all();
        $checkCreatedData = $this->leaveInterface->createPolicyData($requestData);
        if($checkCreatedData)
        {
            return redirect('policies')->with('create_success','Policy data created!!');
        }
        else
        {
            return redirect('policies')->with('create_failure','Unable to create policy data!!');
        }
    }

    public function deletePolicy($id)
    {
        $checkDeletedData = $this->leaveInterface->deletePolicyData($id);
        if($checkDeletedData==1)
        {
            return redirect('policies')->with('delete_success','Policy data deleted successfully!!');
        }
        else
        {
            return redirect('policies')->with('delete_failure','Unable to delete policy data!!');
        }
    }

    public function recoverPolicy($id)
    {
        $checkRecoveredData = $this->leaveInterface->recoverPolicyData($id);
        if($checkRecoveredData==1)
        {
            return redirect('policies')->with('recover_success','Policy data recovered successfully!!');
        }
        else
        {
            return redirect('policies')->with('recover_failure','Unable to recover policy data');
        }
    }

    public function getPendingLeaves()
    {
        $policyData = $this->leaveInterface->getTypeData();
        $getHierarchyData = $this->userInterface->getHierarchyData();
        $pendingData = $this->leaveInterface->getPendingLeaveData();
        $approvedData = $this->leaveInterface->getApprovedLeaveData();
        $rejectedData = $this->leaveInterface->getRejectedLeaveData();
        return view('Leave.allLeaves')->with([
            'pendingdata' => $pendingData,
            'approveddata' => $approvedData,
            'rejecteddata' => $rejectedData,
            'policydata' => $policyData,
            'hierarchy' => $getHierarchyData
        ]);
    }

    public function createLeave(LeaveRequest $request)
    {
        $requestData = [
            'user_id' => Auth::user()->id,
            'policy_id' => $request->policy_id,
            'start_date' => date('Y-m-d h:i',strtotime($request->start_date)),
            'end_date' => date('Y-m-d h:i', strtotime($request->end_date)),
            'apply_date' => Carbon\Carbon::now(),
            'comments' => $request->comments,
            'status' => 1
        ];
        $team_id = Auth::user()->team_id;
        $manager = $this->userInterface->getTeamLeaderEmail($team_id);
        $hierarchyEmail = $request->email;
        $checkCreatedData = $this->leaveInterface->createLeaveData($requestData);
        if($checkCreatedData)
        {
            if(Auth::user()->role_id==5 && $hierarchyEmail==null)
            {
              Mail::to($manager)->send(new SendLeaveRequest(Auth::user()->name,Auth::user()->email,$requestData['comments']));
            }
            else
            {
                $emailData = [$manager,$hierarchyEmail];
                $i=0;
                foreach($emailData as $data)
                {
                   $email[$i] = $data;
                   Mail::to($email[$i])->send(new SendLeaveRequest(Auth::user()->name,Auth::user()->email,$requestData['comments']));
                   $i++;
                }
                
            }
            return redirect('leaves')->with('create_success','Leave applied successfully!!');
        }
        else
        {
            return redirect('leaves')->with('create_failure','Unable to apply the leave!!');
        }
    }

    public function showLeaveById(Request $request)
    {
        $leave_id = $request->get('leave_id');
        $leaveData = $this->leaveInterface->getLeaveDataById($leave_id);
        echo json_encode($leave_details);
        die();
    }

}

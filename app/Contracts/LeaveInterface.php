<?php

namespace App\Contracts;

interface LeaveInterface
{
	public function getTypeData();
	public function getTypeDataPagination();
	public function getLeaveDataById($id);
	public function searchUserData($id, $request);
    public function updatePolicyData($id, $request); 
    public function createPolicyData($request);
    public function deletePolicyData($id);
    public function recoverPolicyData($id);
    public function getAppliedLeaveData();
    public function createLeaveData($request);
}
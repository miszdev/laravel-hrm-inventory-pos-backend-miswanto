<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\LeaveType;

class LeaveTypeController extends Controller
{
    // index
    public function index()
    {
        $leaveTypes = LeaveType::all();

        return response([
            'message' => 'Successfully retrieved leave types',
            'data' => $leaveTypes,
        ], 200);
    }

    //store
    public function store(Request $request)
    {
        $request->validate([
            'name' =>'required',
            'is_paid' =>'required',
            'total_leaves' =>'required',
            'max_leave_per_month' =>'nullable',
        ]);

        $leaveTypes = new LeaveType();
        $leaveTypes->company_id = 1;
        $leaveTypes->name = $request->name;
        $leaveTypes->is_paid = $request->is_paid;
        $leaveTypes->total_leaves = $request->total_leaves;
        $leaveTypes->max_leave_per_month = $request->max_leave_per_month;
        $leaveTypes->created_by = $request->user()->id;
        $leaveTypes->save();

        return response([
            'message' => 'Successfully created leave type',
            'data' => $leaveTypes,
        ], 201);
    }

    //show
    public function show($id)
    {
        $leaveType = LeaveType::find($id);

        if (!$leaveType) {
            return response([
                'message' => 'Leave type not found',
            ], 404);
        }

        return response([
            'message' => 'Successfully retrieved leave type',
            'data' => $leaveType,
        ], 200);
    }

    //update
    public function update(Request $request, $id)
    {
        $leaveType = LeaveType::find($id);

        //validate data
        $request->validate([
            'name' =>'required',
            'is_paid' =>'required',
            'total_leaves' =>'required',
            'max_leave_per_month' =>'nullable',
        ]);

        $leaveType = leaveType::find($id);
        if (!$leaveType) {
            return response([
                'message' => 'Leave type not found',
            ], 404);

        $leaveType->name = $request->name;
        $leaveType->is_paid = $request->is_paid;
        $leaveType->total_leaves = $request->total_leaves;
        $leaveType->max_leave_per_month = $request->max_leave_per_month;
        $leaveType->updated_by = $request->user()->id;
        $leaveType->save();

        return response([
            'message' => 'Successfully updated leave type',
            'data' => $leaveType,
        ], 200);
        }
    }

    //destroy
    public function destroy($id)
    {
        $leaveType = LeaveType::find($id);

        if (!$leaveType) {
            return response([
                'message' => 'Leave type not found',
            ], 404);
        }

        $leaveType->delete();

        return response([
            'message' => 'Successfully deleted leave type',
        ], 200);
    }
}

<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Leave;

class LeaveController extends Controller
{
    //index
    public function index()
    {
        $leaves = Leave::all();
        return response([
            'message' => 'List of leaves',
            'data' => $leaves
        ]);
    }

    //store
    public function store(Request $request)
    {
        //validation
        $request->validate([
            'user_id' =>'required',
            'leave_type_id' =>'required',
            'start_date' =>'required',
            'end_date' =>'required',
            'reason' =>'required',
            'is_half_day' =>'required',
            'total_days' =>'required',
            'is_paid' =>'required',
            'reason' =>'required',
        ]);

        $leave = new Leave();
        $leave->user_id = $request->user_id;
        $leave->leave_type_id = $request->leave_type_id;
        $leave->start_date = $request->start_date;
        $leave->end_date = $request->end_date;
        $leave->is_half_day = $request->is_half_day;
        $leave->total_days = $request->total_days;
        $leave->is_paid = $request->is_paid;
        $leave->reason = $request->reason;
        $leave->status = 'pending';
        $leave->save();

        return response([
            'message' => 'Leave has been added successfully',
            'data' => $leave,
        ], 201);
    }

    //show
    public function show($id)
    {
        $leave = Leave::find($id);
        if (!$leave) {
            return response([
                'message' => 'Leave not found',
            ], 404);
        }

        return response([
            'message' => 'Leave details',
            'data' => $leave,
        ]);
    }

    //update
    public function update(Request $request, $id)
    {
        //validation
        $request->validate([
            'user_id' =>'required',
            'leave_type_id' =>'required',
            'start_date' =>'required',
            'end_date' =>'required',
            'reason' =>'required',
            'is_half_day' =>'required',
            'total_days' =>'required',
            'is_paid' =>'required',
            'reason' =>'required',
            'status' =>'required',
        ]);

        $leave = Leave::find($id);
        if (!$leave) {
            return response([
                'message' => 'Leave not found',
            ], 404);
        }

        $leave->user_id = $request->user_id;
        $leave->leave_type_id = $request->leave_type_id;
        $leave->start_date = $request->start_date;
        $leave->end_date = $request->end_date;
        $leave->is_half_day = $request->is_half_day;
        $leave->total_days = $request->total_days;
        $leave->is_paid = $request->is_paid;
        $leave->reason = $request->reason;
        $leave->status = $request->status;
        $leave->save();

        return response([
            'message' => 'Leave has been updated successfully',
            'data' => $leave,
        ], 200);
    }

    //destroy
    public function destroy($id)
    {
        $leave = Leave::find($id);
        if (!$leave) {
            return response([
                'message' => 'Leave not found',
            ], 404);
        }

        $leave->delete();

        return response([
            'message' => 'Leave has been deleted successfully',
        ], 200);
    }
}

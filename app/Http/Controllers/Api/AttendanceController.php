<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Attendance;

class AttendanceController extends Controller
{
    //index
    public function index()
    {
        $attendance = Attendance::all();
        return response([
            'message' => 'List of attendance',
            'data' => $attendance
        ], 200);
    }

    //store
    public function store(Request $request)
    {
        //validate data
        $request->validate([
            'date' =>'required',
            'user_id' =>'required',
            'is_holiday' =>'nullable',
            'is_leave' =>'nullable',
            'leave_id' =>'nullable',
            'holiday_id' =>'nullable',
            'check_in_date_time' =>'required',
            'check_out_date_time' =>'nullable',
            'is_late' =>'nullable',
            'is_half_day' =>'nullable',
            'is_paid' =>'nullable',
            'status' =>'nullable',
            'reason' =>'nullable',
        ]);

        $attendance = new Attendance();
        $attendance->company_id = 1;
        $attendance->user_id = $request->user_id;
        $attendance->date = $request->date;
        $attendance->is_holiday = $request->is_holiday;
        $attendance->is_leave = $request->is_leave;
        $attendance->leave_id = $request->leave_id;
        $attendance->holiday_id = $request->holiday_id;
        $attendance->check_in_date_time = $request->check_in_date_time;
        $attendance->check_out_date_time = $request->check_out_date_time;
        $attendance->total_duration = $request->total_duration;
        $attendance->is_late = $request->is_late;
        $attendance->is_half_day = $request->is_half_day;
        $attendance->is_paid = $request->is_paid;
        $attendance->status = $request->status;
        $attendance->reason = $request->reason;
        $attendance->save();

        return response([
            'message' => 'Attendance created successfully',
            'data' => $attendance
        ], 201);
    }


    //show
    public function show($id)
    {
        $attendance = Attendance::find($id);
        if (!$attendance) {
            return response([
                'message' => 'Attendance not found',
            ], 404);
        }

        return response([
            'message' => 'Attendance retrieved successfully',
            'data' => $attendance
        ], 200);
    }


    //update
    public function update(Request $request, $id)
    {
        //validate data
        $request->validate([
            'user_id' =>'required',
            'is_holiday' =>'nullable',
            'is_leave' =>'nullable',
            'leave_id' =>'nullable',
            'holiday_id' =>'nullable',
            'check_in_date_time' =>'required',
            'check_out_date_time' =>'nullable',
            'is_late' =>'nullable',
            'is_half_day' =>'nullable',
            'is_paid' =>'nullable',
            'status' =>'nullable',
            'reason' =>'nullable',
        ]);

        $attendance = Attendance::find($id);
        if (!$attendance) {
            return response([
                'message' => 'Attendance not found',
            ], 404);
        }

        $attendance->user_id = $request->user_id;
        $attendance->is_holiday = $request->is_holiday;
        $attendance->is_leave = $request->is_leave;
        $attendance->leave_id = $request->leave_id;
        $attendance->holiday_id = $request->holiday_id;
        $attendance->check_in_date_time = $request->check_in_date_time;
        $attendance->check_out_date_time = $request->check_out_date_time;
        $attendance->total_duration = $request->total_duration;
        $attendance->is_late = $request->is_late;
        $attendance->is_half_day = $request->is_half_day;
        $attendance->is_paid = $request->is_paid;
        $attendance->status = $request->status;
        $attendance->reason = $request->reason;
        $attendance->save();

        return response([
            'message' => 'Attendance updated successfully',
            'data' => $attendance
        ], 200);
    }

    //destroy
    public function destroy($id)
    {
        $attendance = Attendance::find($id);
        if (!$attendance) {
            return response([
                'message' => 'Attendance not found',
            ], 404);
        }

        $attendance->delete();
        return response([
            'message' => 'Attendance deleted successfully',
        ], 200);
    }

}

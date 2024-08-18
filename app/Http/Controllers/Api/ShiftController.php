<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Model\Shift;

class ShiftController extends Controller
{
    //index

    public function index()
    {
        //
        $shifts = Shift::all();
        return response([
            'message' => 'List of shifts',
            'data' => $shifts
        ],200);
    }

    //store
    public function store(Request $request)
    {
        //validate
        $request->validate([
            'name' =>'required',
            'clock_in_time' =>'required',
            'clock_out_time' =>'required',
        ]);

        $user = $request->user();

        $shift = new Shift();
        $shift->company_id = 1;
        $shift->created_by = $user->id;
        $shift->name = $request->name;
        $shift->clock_in_time = $request->clock_in_time;
        $shift->clock_out_time = $request->clock_out_time;
        $shift->late_mark_after = $request->late_mark_after;

        $shift->early_clock_in_time = $request->early_clock_in_time;
        $shift->allow_clock_out_till = $request->allow_clock_out_till;
        $shift->save();

        return response([
            'message' => 'Shift created successfully',
            'data' => $shift
        ],201);
    }

    //show

    public function show($id)
    {
        //
        $shift = Shift::find($id);
        if(!$shift) {
            return response([
                'message' => 'Shift not found'
            ],404);
        }

        return response([
            'message' => 'Detail of shift',
            'data' => $shift
        ],200);
    }

    //update
    public function update(Request $request, $id)
    {
        //validate request
        $request->validate([
            'name' =>'required',
            'clock_in_time' =>'required',
            'clock_out_time' =>'required',
        ]);

        $shift = Shift::find($id);
        if(!$shift) {
            return response([
                'message' => 'Shift not found'
            ],404);
        }

        $shift->name = $request->name;
        $shift->clock_in_time = $request->clock_in_time;
        $shift->clock_out_time = $request->clock_out_time;
        $shift->late_mark_after = $request->late_mark_after;
        $shift->early_clock_in_time = $request->early_clock_in_time;
        $shift->allow_clock_out_till = $request->allow_clock_out_till;
        $shift->save();

        return response([
            'message' => 'Shift updated successfully',
            'data' => $shift
        ],200);
    }

    //destroy
    public function destroy($id)
    {
        //
        $shift = Shift::find($id);
        if(!$shift) {
            return response([
                'message' => 'Shift not found'
            ],404);
        }

        $shift->delete();
        return response([
            'message' => 'Shift deleted successfully'
        ],200);
    }


}

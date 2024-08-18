<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Holiday;

class HolidayController extends Controller
{
    //index
    public function index()
    {
        //get all holidays
        $holidays = Holiday::all();
        return response()->json([
            'holidays' => $holidays
        ], 200);
    }

    //store
    public function store(Request $request)
    {
        //validate request
        $request->validate([
            'name' =>'required',
            'month' =>'required',
            'year' =>'required',
            'date' =>'required',
            'is_weekend'
        ]);

        $holiday = new Holiday();
        $holiday->company_id = 1;
        $holiday->name = $request->name;
        $holiday->month = $request->month;
        $holiday->year = $request->year;
        $holiday->date = $request->date;
        $holiday->is_weekend = $request->is_weekend;
        $holiday->save();

        return response([
            'message' => 'Holiday created successfully',
            'data' => $holiday
        ], 201);
    }

    //show
    public function show($id)
    {
        //get holiday by id
        $holiday = Holiday::find($id);
        if (!$holiday) {
            return response([
                'message' => 'Holiday not found'
            ], 404);
        }
        return response([
            'message' => 'Holiday found',
            'data' => $holiday
        ], 200);
    }

    //update
    public function update(Request $request, $id)
    {
        //validate request
        $request->validate([
            'name' =>'required',
           'month' =>'required',
            'year' =>'required',
            'date' =>'required',
            'is_weekend'
        ]);

        //get holiday by id
        $holiday = Holiday::find($id);
        if (!$holiday) {
            return response([
                'message' => 'Holiday not found'
            ], 404);
        }

        //update holiday
        $holiday->name = $request->name;
        $holiday->month = $request->month;
        $holiday->year = $request->year;
        $holiday->date = $request->date;
        $holiday->is_weekend = $request->is_weekend;
        $holiday->save();

        return response([
            'message' => 'Holiday updated successfully',
            'data' => $holiday
        ], 200);
    }

    //destroy
    public function destroy($id)
    {
        //get holiday by id
        $holiday = Holiday::find($id);
        if (!$holiday) {
            return response([
                'message' => 'Holiday not found'
            ], 404);
        }

        //delete holiday
        $holiday->delete();

        return response([
            'message' => 'Holiday deleted successfully'
        ], 200);
    }

}

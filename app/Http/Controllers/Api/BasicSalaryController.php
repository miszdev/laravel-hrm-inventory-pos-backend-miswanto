<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\BasicSalary;

class BasicSalaryController extends Controller
{
    //index

    public function index()
    {
        $basicSalaries = BasicSalary::all();
        return response([
            'message' => 'Basic salaries retrieved successfully',
            'data' => $basicSalaries
        ]);
    }

    //store
    public function store(Request $request)
    {
        //validate request
        $request->validate([
            'basic_salary' =>'required',
            'user_id' =>'required',
        ]);

        $user = $request->user();

        $basicSalary = new BasicSalary();
        $basicSalary->company_id = 1;
        $basicSalary->user_id = $request->user_id;
        $basicSalary->basic_salary = $request->basic_salary;
        $basicSalary->save();

        return response([
            'message' => 'Basic salary created successfully',
            'data' => $basicSalary
        ], 201);
    }

    //show

    public function show($id)
    {
        $basicSalary = BasicSalary::find($id);
        if (!$basicSalary) {
            return response([
                'message' => 'Basic salary not found'
            ], 404);
        }
        return response([
            'message' => 'Basic salary retrieved successfully',
            'data' => $basicSalary
        ]);
    }

    //update

    public function update(Request $request, $id)
    {
        //validate request
        $request->validate([
            'basic_salary' =>'required',
            'user_id' =>'required',
        ]);

        $basicSalary = BasicSalary::find($id);
        if (!$basicSalary) {
            return response([
                'message' => 'Basic salary not found'
            ], 404);
        }

        $basicSalary->basic_salary = $request->basic_salary;
        $basicSalary->user_id = $request->user_id;
        $basicSalary->save();

        return response([
            'message' => 'Basic salary updated successfully',
            'data' => $basicSalary
        ]);
    }

    //destroy

    public function destroy($id)
    {
        $basicSalary = BasicSalary::find($id);
        if (!$basicSalary) {
            return response([
                'message' => 'Basic salary not found'
            ], 404);
        }

        $basicSalary->delete();
 
        return response([
            'message' => 'Basic salary deleted successfully'
        ], 204);
    }
}

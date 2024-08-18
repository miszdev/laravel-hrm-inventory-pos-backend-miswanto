<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class DepartmentController extends Controller
{
    //index

    public function index()
    {
        $departments = Department::all();
        return response([
            'message' => 'Departments retrieved successfully.',
            'data' => $departments
        ],200);
    }

    //store

    public function store(Request $request)
    {
        //validate request data
        $request->validate([
            'name' =>'required',
        ]);

        $user = $request->user();

        $departments = new Department();
        $departments->company_id = 1;
        $departments->created_by = $user->id;
        $departments->name = $request->name;
        $departments->description = $request->description;
        $departments->save();

        return response([
            'message' => 'Department created successfully.',
            'data' => $departments
        ],201);
    }

    //update

    public function update(Request $request, $id)
    {
        //validate request data
        $request->validate([
            'name' =>'required',
        ]);

        $department = Department::find($id);
        if (!$department) {
            return response([
                'message' => 'Department not found.'
            ],404);
        }

        $department->name = $request->name;
        $department->description = $request->description;
        $department->save();

        return response([
            'message' => 'Department updated successfully.',
            'data' => $department
        ],200);
    }

    //destroy

    public function destroy($id)
    {
        $department = Department::find($id);
        if (!$department) {
            return response([
                'message' => 'Department not found.'
            ],404);
        }

        $department->delete();

        return response([
            'message' => 'Department deleted successfully.'
        ],200);
    }
}

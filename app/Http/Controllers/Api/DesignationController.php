<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Designation;

class DesignationController extends Controller
{
    //index
    public function index()
    {
        //
        $designations = Designation::all();
        return response([
            'message' => 'List of designations',
            'data' => $designations
        ], 200);
    }

    //store
    public function store(Request $request)
    {
        //validation
        $request->validate([
            'name' =>'required',
        ]);

        $user = $request->user();

        $designation = new Designation();
        $designation->company_id = 1;
        $designation->created_by = $user->id;
        $designation->name = $request->name;
        $designation->description = $request->description;
        $designation->save();

        return response([
           'message' => 'Designation created successfully',
            'data' => $designation
        ], 201);
    }

    //show

    public function show(Designation $designation)
    {
        $designation = Designation::find($id);
        if(!$designation) {
            return response([
               'message' => 'Designation not found'
            ], 404);
        }

        return response([
            'message' => 'Designation details',
            'data' => $designation
        ], 200);
    }

    //update
    public function update(Request $request, $id)
    {
        //validation
        $request->validate([
            'name' =>'required',
        ]);

        $user = $request->user();

        $designation = Designation::find($id);
        if(!$designation) {
            return response([
               'message' => 'Designation not found'
            ], 404);
        }

        $designation->name = $request->name;
        $designation->description = $request->description;
        $designation->save();

        return response([
           'message' => 'Designation updated successfully',
            'data' => $designation
        ], 200);
    }

    //destroy
    public function destroy($id)
    {
        $designation = Designation::find($id);
        if(!$designation) {
            return response([
               'message' => 'Designation not found'
            ], 404);
        }

        $designation->delete();

        return response([
           'message' => 'Designation deleted successfully'
        ], 200);
    }
}

<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Payroll;

class PayrollController extends Controller
{
    //index

    public function index()
    {
        $payroll = Payroll::all();
        return response([
            'message' => 'List of all payrolls',
            'data' => $payroll
        ], 200);
    }


    //store
    public function store(Request $request)
    {
        //validation
        $request->validate([
            'user_id' =>'required',
            'salary' =>'required',
            'month' =>'required',
            'year' =>'required',
            'status' =>'required',
        ]);

        $payroll = new Payroll();
        $payroll->company_id = 1;
        $payroll->user_id = $request->user_id;
        $payroll->salary = $request->salary;
        $payroll->month = $request->month;
        $payroll->year = $request->year;
        $payroll->status = $request->status;
        $payroll->save();

        return response([
           'message' => 'Payroll created',
            'data' => $payroll
        ], 201);
    }

    //show
    public function show($id)
    {
        $payroll = Payroll::find($id);
        if (!$payroll) {
            return response([
               'message' => 'Payroll not found'
            ], 404);
        }
        return response([
           'message' => 'Payroll details',
            'data' => $payroll
        ], 200);
    }


    //update

    public function update(Request $request, $id)
    {
        $payroll = Payroll::find($id);
        if (is_null($payroll)) {
            return response([
               'message' => 'Payroll not found'
            ], 404);
        }

        //validation
        $request->validate([
            'user_id' =>'required',
            'salary' =>'required',
            'month' =>'required',
            'year' =>'required',
            'status' =>'required',
        ]);

        $payroll->user_id = $request->user_id;
        $payroll->salary = $request->salary;
        $payroll->month = $request->month;
        $payroll->year = $request->year;
        $payroll->status = $request->status;
        $payroll->save();


        $payroll->update($request->all());
        return response([
            'message' => 'Payroll updated',
            'data' => $payroll
        ], 200);
    }


    //destroy
    public function destroy($id)
    {
        $payroll = Payroll::find($id);
        if (is_null($payroll)) {
            return response([
               'message' => 'Payroll not found'
            ], 404);
        }
        $payroll->delete();
        return response([
           'message' => 'Payroll deleted'
        ], 200);
    }
}

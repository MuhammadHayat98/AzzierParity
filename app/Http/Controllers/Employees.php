<?php

namespace App\Http\Controllers;
use App\Employee as Employee;
use Illuminate\Http\Response;
use Illuminate\Http\Request;
use Carbon\Carbon;
class Employees extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }
    public function create(Request $request) {
        // $response = [
        //     'message' => 'yeet',
        //     'Status' => 201
        // ];
        $newEmployee = new Employee();
        $NewEmployeeObj = $request->get('responseObj');
        //create employee function with employee object
        $newEmployee::create([
            'Empid' => (String)$newEmployeeObj->{'Empid'},
            'FirstName'=>(String)$newEmployeeObj->{'FirstName'},
            'LastName'=>(String)$newEmployeeObj->{'Lastname'},
            'Craft' => (string)$newEmployeeObj->{'Craft'},
            'HireDate'=>(String)$newEmployeeObj->{'HireDate'},
            'Location'=>(String)$newEmployeeObj->{'Location'},
        ]);
        $newEmployee->save();
    }
   
}
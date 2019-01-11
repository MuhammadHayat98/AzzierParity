<?php

namespace App\Http\Controllers;
use App\Employee as Employee;
use Illuminate\Http\Response;
use Illuminate\Http\Request;
use Carbon\Carbon;
use Illuminate\Support\Facades\Log;
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
        $newEmployee = new Employee;
        $newEmployeeObj = $request->get('responseObj');
        //cast objects into array in order to index object like an array
        $ar = (array)$newEmployeeObj;
        //assigns number index to array keys
        $keys = array_keys($ar);
        //cast simplexml into json to allow use of eloquent create function
        $newEmpJson = (array)$ar[$keys[0]];
        $newEmployee::create($newEmpJson);
        return response()->json("Created :)", 201);
    }
    public function update(Request $request){
        $newEmployee = new Employee;
        $newEmployeeObj = $request->get('responseObj');
        //created update employee function by accessing employee array
        $ar = (array)$newEmployeeObj;
        $keys = array_keys($ar);
        $newEmpJson = (array)$ar[$keys[0]];
        $newEmployee::create($newEmpJson);
        return response()->json("Updated", 200);
    }
}
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
        if(Employee::where('Empid', $newEmpJson['Empid'])->first() != null) {
            Log::debug("Empid : " . $newEmpJson['Empid'] . " already exists homie " . Carbon::now());
            abort(400, "Employee already exists");
        }
        else {
        //parse HireDate to be converted into a carbon date object
        $tmp = (String)$ar[$keys[0]]['HireDate'];
        $newEmpJson['HireDate'] = (strlen($tmp) == 0) ? Carbon::now() : Carbon::createFromTimeString(substr($tmp,0,19));
        $newEmployee::create($newEmpJson);
        return response()->json("Created :)", 201);
        }
    }
    public function update(Request $request){
        $newEmployeeObj = $request->get('responseObj');
        //created update employee function by accessing employee array
        $ar = (array)$newEmployeeObj;
        $keys = array_keys($ar);
        $newEmployee = Employee::where('Empid', (String)$ar[$keys[0]]->{'Empid'})->first();
        $newEmployee->FirstName = (String)$ar[$keys[0]]->{'FirstName'};
        $newEmployee->LastName = (String)$ar[$keys[0]]->{'LastName'};
        $newEmployee->Craft = (String)$ar[$keys[0]]->{'Craft'};
        $newEmployee->Rate = (string)$ar[$keys[0]]->{'Rate'};
        $newEmployee->HireDate = (String)$ar[$keys[0]]->{'HireDate'};
        $newEmployee->Location = (String)$ar[$keys[0]]->{'Location'};
        $newEmployee->save();
        Log::debug($ar);
        return response()->json("Updated", 200);
    }
}
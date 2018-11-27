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
        $newEmployee = new Employee;
        $newEmployeeObj = $request->get('responseObj');
        //cast objects into array in order to index object like an array
        $ar = (array)$newEmployeeObj;
        //assigns number index to array keys
        $keys = array_keys($ar);
        //create employee function with employee array
        $newEmployee::create([
            'Empid' => (String)$ar[$keys[0]]->{'Empid'},
            'FirstName'=>(String)$ar[$keys[0]]->{'FirstName'},
            'LastName'=>(String)$ar[$keys[0]]->{'LastName'},
            'Craft' => (string)$ar[$keys[0]]->{'Craft'},
            'Rate' => (string)$ar[$keys[0]]->{'Rate'},
            'HireDate'=> Carbon::now(),
            //'HireDate'=>(String)$ar[$keys[0]]->{'HireDate'},
            'Location'=>(String)$ar[$keys[0]]->{'Location'},
        ]);
        $newEmployee->save();
        $fp = fopen('res.json', 'w');
        fwrite($fp, $ar);
        fclose($fp);
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
    }
   
}
<?php

namespace App\Http\Controllers;
use App\WorkRequest as WorkRequest;
use Illuminate\Http\Request;
use Carbon\Carbon;
use Illuminate\Support\Facades\Log;
use PHPUnit\Framework\Constraint\Exception;

class WorkRequests extends Controller
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
        $newWr = new WorkRequest;
        $WrObj = $request->get('responseObj');
        $ar = (array)$WrObj;
        $keys = array_keys($ar);
        $newWrJson = (array)$ar[$keys[0]];
        if(WorkRequest::where('WrNum' , $newWrJson['WrNum'])->first() != null){
            Log::debug("WrNum : " . $newWrJson["WrNum"] . "already exist " . Carbon::now());
            abort(400, "WrNum already exists");
        }
        else {
            $newWr::create($newWrJson);
            return response()->json("created " . $newWrJson['WrNum'], 201);
        }
    }

    public function update(Request $request) {
        $WrObj = $request->get('responseObj');
        $ar = (array)$WrObj;
        $keys = array_keys($ar);
        $WrJson = (array)$ar[$keys[0]];
        if(WorkRequest::where('WrNum', (string)$ar[$keys[0]]->{'WrNum'})->first() == null) {
            Log::debug("Wr did not exist");
            WorkRequest::create($WrJson);
        }
        else {
            $Wr = WorkRequest::where('WrNum', (string)$ar[$keys[0]]->{'WrNum'})->first();
            $Wr->update($WrJson);
            return response()->json("Update successful ", 201);
        }
        
        
        //$Wr = WorkRequest::where('WrNum', (string)$ar[$keys[0]]->{'WrNum'})->first();
        
        
    }
}
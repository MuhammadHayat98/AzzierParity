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
        $newWr::create($newWrJson);
    }

    public function update(Request $request) {
        $newWr = new WorkRequest;
        $WrObj = $request->get('responseObj');
        $ar = (array)$WrObj;
        $keys = array_keys($ar);
        $WrJson = (array)$ar[$keys[0]];
        WorkRequest::create($WrJson);
        
    }
    public function show(){
        return WorkOrder::getAll();
    }
}
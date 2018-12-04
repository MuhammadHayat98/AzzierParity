<?php

namespace App\Http\Controllers;
use App\WorkRequest as WorkRequest;
use Illuminate\Http\Request;
use Carbon\Carbon;
use Illuminate\Support\Facades\Log;

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
            // $newWrJson[''] = (strlen($newWrJson) == 0) ? Carbon::now() : Carbon::createFromTimeString(substr($createDateStr,0,19), 'PST')->addHours(-1);
            // $dateStr = (string)$ar[$keys[0]]->{'Date'};
            // $newWrJson = (strlen($dateStr) == 0) ? Carbon::now() : Carbon::createFromTimeString(substr($dateStr,0,19), 'PST')->addHours(-1);
            $newWr::create($newWrJson);
            return response()->json("created " . $newWrJson['WrNum'], 201);
        }
        
        // $newWr::create([
        //     'Contact' => (string)$ar[$keys[0]]->{'Contact'},
        //     'Phone' => (string)$ar[$keys[0]]->{'Phone'},
        //     'CreatedBy' => (string)$ar[$keys[0]]->{'CreatedBy'},
        //     'CreateDate' => $createDateCarbon,
        //     'Location' => (string)$ar[$keys[0]]->{'Location'},
        //     'Date' => $dateCarbon,
        //     'Description' => (string)$ar[$keys[0]]->{'Description'},
        //     'Status' => (string)$ar[$keys[0]]->{'Status'},
        //     'WrNum' => (string)$ar[$keys[0]]->{'WrNum'}
        // ]);
        // $newWr->save();
    }

    public function update(Request $request) {
        $WrObj = $request->get('responseObj');
        $ar = (array)$WrObj;
        $keys = array_keys($ar);
        $modifyDateStr = (string)$ar[$keys[0]]->{'ModifyDate'};
        $modifyDateCarbon = (strlen($modifyDateStr) == 0) ? Carbon::now() : Carbon::createFromTimeString(substr($modifyDateStr,0,19), 'PST')->addHours(-1);
        $Wr = WorkRequest::where('WrNum', (string)$ar[$keys[0]]->{'WrNum'})->first();
        $Wr->Contact = (string)$ar[$keys[0]]->{'Contact'};
        $Wr->Phone = (string)$ar[$keys[0]]->{'Phone'};
        $Wr->Location = (string)$ar[$keys[0]]->{'Location'};
        $Wr->Description = (string)$ar[$keys[0]]->{'Description'};
        $Wr->Status = (string)$ar[$keys[0]]->{'Status'};
        $Wr->ModifyBy = (string)$ar[$keys[0]]->{'ModifyBy'};
        $Wr->ModifyDate = $modifyDateCarbon;
        $Wr->save();
    }


}
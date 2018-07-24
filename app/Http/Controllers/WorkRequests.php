<?php

namespace App\Http\Controllers;
use App\WorkRequest as WorkRequest;
use Illuminate\Http\Request;
use Carbon\Carbon;

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
        $createDateStr = (string)$WrObj->{'CreateDate'};
        $createDateCarbon = (strlen($createDateStr) == 0) ? Carbon::now() : Carbon::createFromTimeString(substr($createDateStr,0,19), 'PST')->addHours(-1);
        $dateStr = (string)$WrObj->{'Date'};
        $dateCarbon = (strlen($dateStr) == 0) ? Carbon::now() : Carbon::createFromTimeString(substr($dateStr,0,19), 'PST')->addHours(-1);
        $newWr::create([
            'Contact' => (string)$WrObj->{'Contact'},
            'Phone' => (string)$WrObj->{'Phone'},
            'CreatedBy' => (string)$WrObj->{'CreatedBy'},
            'CreateDate' => $createDateCarbon,
            'Location' => (string)$WrObj->{'Location'},
            'Date' => $dateCarbon,
            'Description' => (string)$WrObj->{'Description'},
            'Status' => (string)$WrObj->{'Status'},
            'WrNum' => (string)$WrObj->{'WrNum'}
        ]);
        $newWr->save();
    }

    public function update(Request $request) {
        $WrObj = $request->get('responseObj');
        $modifyDateStr = (string)$WrObj->{'ModifyDate'};
        $modifyDateCarbon = (strlen($modifyDateStr) == 0) ? Carbon::now() : Carbon::createFromTimeString(substr($modifyDateStr,0,19), 'PST')->addHours(-1);
        $Wr = WorkRequest::where('WrNum', (string)$WrObj->{'WrNum'})->first();
        $Wr->Contact = (string)$WrObj->{'Contact'};
        $Wr->Phone = (string)$WrObj->{'Phone'};
        $Wr->Location = (string)$WrObj->{'Location'};
        $Wr->Description = (string)$WrObj->{'Description'};
        $Wr->Status = (string)$WrObj->{'Status'};
        $Wr->ModifyBy = (string)$WrObj->{'ModifyBy'};
        $Wr->ModifyDate = $modifyDateCarbon;
        $Wr->save();
    }


}
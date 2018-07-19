<?php

namespace App\Http\Controllers;

namespace App\Http\Controllers;
use App\WorkOrder as WorkOrder;
use Illuminate\Http\Request;

class WorkOrders extends Controller
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
        $newWo = new WorkOrder;
        $WoRequestObj = $request->get('WorkOrder');
        $newWo::create([
           'WoNum' => (int)$WoRequestObj->{'WoNum'},
           'WoNumStr' => (string)$WoRequestObj->{'WoNum'},
           'Priority' => (int)$WoRequestObj->{'Priority'},
           'OpenDate' => $WoRequestObj->{'OpenDate'},
           'ContactPhone' => (string)$WoRequestObj->{'ContactPhone'},
           'Craft' => $WoRequestObj->{'Craft'},
           'CreateDate' => $WoRequestObj->{'CreateDate'},
           'Crew' => $WoRequestObj->{'Crew'},
           'Location' => $WoRequestObj->{'Location'},
           'LocationDesc' => $WoRequestObj->{'LocationDesc'},
           'Note2' => $WoRequestObj->{'Note2'},
           'Request' => $WoRequestObj->{'Request'},
           'Status' => $WoRequestObj->{'Status'},
           'Room' => $WoRequestObj->{'Room'},
           'WoType' => $WoRequestObj->{'WoType'}, 
        ]);
        $newWo->save();
    }
}
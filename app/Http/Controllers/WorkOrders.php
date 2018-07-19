<?php

namespace App\Http\Controllers;

use Laravel\Lumen\Routing\Controller as BaseController;
use App\WorkOrder as WorkOrder;
use Illuminate\Http\Request;

class WorkOrder extends BaseController
{
    public function create(Request $request) {
        $newWo = new WorkOrder();
        $WoRequestObj = $request->get('WorkOrder');
        $newWo::create([
           'WoNum' => $WoRequestObj->{'WoNum'},
           'WoNumStr' => $WoRequestObj->{'WoNumStr'},
           'Priority' => $WoRequestObj->{'Priority'},
           'OpenDate' => $WoRequestObj->{'OpenDate'},
           'ContactPhone' => $WoRequestObj->{'ContactPhone'},
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
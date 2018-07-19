<?php


namespace App\Http\Controllers;
use App\WorkOrder as WorkOrder;
use Illuminate\Http\Request;
use Carbon\Carbon;
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
        $openDate = (string)$WoRequestObj->{'OpenDate'};
        $newWo::create([
           'WoNum' => (int)$WoRequestObj->{'WoNum'},
           'WoNumStr' => (string)(int)$WoRequestObj->{'WoNum'},
           'Priority' => (int)$WoRequestObj->{'Priority'},
           'OpenDate' => Carbon::createFromTimeString(substr($openDate,0,19)),
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
<?php


namespace App\Http\Controllers;
use App\WorkOrder as WorkOrder;
use Illuminate\Http\Request;
use Carbon\Carbon;
use Symfony\Component\HttpFoundation\Response;
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
        $response = [
            'message' => 'yeet',
            'Status' => 201
        ];
        $newWo = new WorkOrder;
        $WoRequestObj = $request->get('WorkOrder');
        $openDate = (string)$WoRequestObj->{'OpenDate'};
        $newWo::create([
           'WoNum' => (int)$WoRequestObj->{'WoNum'},
           'WoNumStr' => (string)(int)$WoRequestObj->{'WoNum'},
           'Priority' => (string)$WoRequestObj->{'Priority'},
           'OpenDate' => Carbon::createFromTimeString(substr($openDate,0,19), 'PST')->addHours(-1),
           'ContactPhone' => (string)$WoRequestObj->{'ContactPhone'},
           'Craft' => (string)$WoRequestObj->{'Craft'},
           'CreateDate' => (string)$WoRequestObj->{'CreateDate'},
           'Crew' => (string)$WoRequestObj->{'Crew'},
           'Location' => (string)$WoRequestObj->{'Location'},
           'LocationDesc' => (string)$WoRequestObj->{'LocationDesc'},
           'Note2' => (string)$WoRequestObj->{'Note2'},
           'Request' => (string)$WoRequestObj->{'Request'},
           'Status' => (string)$WoRequestObj->{'Status'},
           'Room' => (string)$WoRequestObj->{'Room'},
           'WoType' => (string)$WoRequestObj->{'WoType'}, 
        ]);
        $newWo->save();
        return response()->json($response);
    }
}
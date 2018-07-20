<?php
/*todo
*change workorder request variable names to the same in both functions
*
*/
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
        // $response = [
        //     'message' => 'yeet',
        //     'Status' => 201
        // ];
        $newWo = new WorkOrder;
        $WoRequestObj = $request->get('WorkOrder');
        $openDateStr = (string)$WoRequestObj->{'OpenDate'};
        $openDateCarbon = (strlen($openDateStr) == 0) ? Carbon::now() : Carbon::createFromTimeString(substr($openDateStr,0,19), 'PST')->addHours(-1);
        $newWo::create([
           'WoNum' => (int)$WoRequestObj->{'WoNum'},
           'WoNumStr' => (string)(int)$WoRequestObj->{'WoNum'},
           'Priority' => (string)$WoRequestObj->{'Priority'},
           'OpenDate' => $openDateCarbon,
           'ContactPhone' => (string)$WoRequestObj->{'ContactPhone'},
           'Craft' => (string)$WoRequestObj->{'Craft'},
           'Crew' => (string)$WoRequestObj->{'Crew'},
           'Location' => (string)$WoRequestObj->{'Location'},
           'LocationDesc' => (string)$WoRequestObj->{'LocationDesc'},
           'Note2' => (string)$WoRequestObj->{'Note2'},
           'Request' => (string)$WoRequestObj->{'Request'},
           'Status' => (string)$WoRequestObj->{'Status'},
           'Room' => (string)$WoRequestObj->{'Room'},
           'WoType' => (string)$WoRequestObj->{'WoType'} 
        ]);
        $newWo->save();

    }

    public function update(Request $request) {
        $WoObj = $request->get('WorkOrder');
        $modifyDateStr = (string)$WoObj->{'ModifyDate'};
        $modifyDateCarbon = (strlen($modifyDateStr) == 0) ? Carbon::now() : Carbon::createFromTimeString(substr($modifyDateStr,0,19), 'PST')->addHours(-1); 
        $wo = WorkOrder::find((int)$WoObj->{'WoNum'});
        //update function has this many lines because azzier does not let us know what fiels specifically have been updated
        $wo->ModifyDate = $modifyDateCarbon;
        $wo->ModifyBy = (string)$WoObj->{'ModifyBy'};
        $wo->Priority = (string)$WoObj->{'Priority'};
        $wo->ContactPhone = (string)$WoObj->{'ContactPhone'};
        $wo->Craft = (string)$WoObj->{'Craft'};
        $wo->Crew = (string)$WoObj->{'Crew'};
        $wo->Location = (string)$WoObj->{'Location'};
        $wo->LocationDesc = (string)$WoObj->{'LocationDesc'};
        $wo->Note2 = (string)$WoObj->{'Note2'};
        $wo->Request = (string)$WoObj->{'Request'};
        $wo->Status = (string)$WoObj->{'Status'};
        $wo->Room = (string)$WoObj->{'Room'};
        $wo->WoType = (string)$WoObj->{'WoType'};
        $wo->save();
        
    }
}
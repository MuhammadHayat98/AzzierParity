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
        $newWo = new WorkOrder;
        $WoRequestObj = $request->get('responseObj');
        $ar = (array)$WoRequestObj;
        $keys = array_keys($ar);
        $openDateStr = (string)$ar[$keys[0]]->{'OpenDate'};
        $openDateCarbon = (strlen($openDateStr) == 0) ? Carbon::now() : Carbon::createFromTimeString(substr($openDateStr,0,19), 'PST')->addHours(-1);
        $newWo::create([
           'WoNum' => (int)$ar[$keys[0]]->{'WoNum'},
           //trunkated zeroes by casting strings as ints
           'WoNumStr' => (string)(int)$ar[$keys[0]]->{'WoNum'},
           'Priority' => (string)$ar[$keys[0]]->{'Priority'},
           'OpenDate' => $openDateCarbon,
           'ContactPhone' => (string)$ar[$keys[0]]->{'ContactPhone'},
           'Craft' => (string)$ar[$keys[0]]->{'Craft'},
           'Crew' => (string)$ar[$keys[0]]->{'Crew'},
           'Location' => (string)$ar[$keys[0]]->{'Location'},
           'LocationDesc' => (string)$ar[$keys[0]]->{'LocationDesc'},
           'Note2' => (string)$ar[$keys[0]]->{'Note2'},
           'Request' => (string)$ar[$keys[0]]->{'Request'},
           'Status' => (string)$ar[$keys[0]]->{'Status'},
           'Room' => (string)$ar[$keys[0]]->{'Room'},
           'WoType' => (string)$ar[$keys[0]]->{'WoType'} 
        ]);
        $newWo->save();

    }

    public function update(Request $request) {
        $WoObj = $request->get('responseObj');
        $ar = (array)$WoObj;
        $keys = array_keys($ar);
        $modifyDateStr = (string)$ar[$keys[0]]->{'ModifyDate'};
        $modifyDateCarbon = (strlen($modifyDateStr) == 0) ? Carbon::now() : Carbon::createFromTimeString(substr($modifyDateStr,0,19), 'PST')->addHours(-1); 
        $wo = WorkOrder::find((int)$ar[$keys[0]]->{'WoNum'});
        //update function has this many lines because azzier does not let us know what fields specifically have been updated
        $wo->ModifyDate = $modifyDateCarbon;
        $wo->ModifyBy = (string)$ar[$keys[0]]->{'ModifyBy'};
        $wo->Priority = (string)$ar[$keys[0]]->{'Priority'};
        $wo->ContactPhone = (string)$ar[$keys[0]]->{'ContactPhone'};
        $wo->Craft = (string)$ar[$keys[0]]->{'Craft'};
        $wo->Crew = (string)$ar[$keys[0]]->{'Crew'};
        $wo->Location = (string)$ar[$keys[0]]->{'Location'};
        $wo->LocationDesc = (string)$ar[$keys[0]]->{'LocationDesc'};
        $wo->Note2 = (string)$ar[$keys[0]]->{'Note2'};
        $wo->Request = (string)$ar[$keys[0]]->{'Request'};
        $wo->Status = (string)$ar[$keys[0]]->{'Status'};
        $wo->Room = (string)$ar[$keys[0]]->{'Room'};
        $wo->WoType = (string)$ar[$keys[0]]->{'WoType'};
        $wo->save();
        
    }
}
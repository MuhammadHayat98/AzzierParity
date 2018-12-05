<?php
/*todo
*change workorder request variable names to the same in both functions
*
*/
namespace App\Http\Controllers;
use App\WorkOrder as WorkOrder;
use Illuminate\Http\Request;
use Carbon\Carbon;
use Illuminate\Support\Facades\Log;
use PHPUnit\Framework\Constraint\Exception;

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
        $newWoJson = (array)$ar[$keys[0]];
        if(WorkOrder::find((int)$newWoJson["WoNum"]) != null){
            Log::debug("WoNum : " . (int)$newWoJson["WoNum"] . "already exist " . Carbon::now());
            abort(400, "WoNum already exists");
        }
        else {
            $openDateStr = (string)$ar[$keys[0]]["OpenDate"];
            //commented out open date because the open date can be accessed by created at from azzier
            //$newWoJson['OpenDate'] = (strlen($openDateStr) == 0) ? Carbon::now() : Carbon::createFromTimeString(substr($openDateStr,0,19), 'PST')->addHours(-1);
            $newWoJson['WoNum'] = (int)$newWoJson['WoNum'];
            $newWoJson['WoNumStr'] = (string)$newWoJson['WoNum'];
            $newWo::create($newWoJson);
            return response()->json("created ", 201);
        }
    }
    public function update(Request $request) {
        $WoObj = $request->get('responseObj');
        $ar = (array)$WoObj;
        $keys = array_keys($ar);
        $WoJson = (array)$ar[$keys[0]];
        if(WorkOrder::findOrFail((int)$ar[$keys[0]]->{'WoNum'})!=null){
            $wo = WorkOrder::findOrFail((int)$ar[$keys[0]]->{'WoNum'});
            $wo->update($WoJson);
        }
        else {
            WorkOrder::create($WoJson);
            Log::debug("Wo did not exist");
        }
            

        
    }
    
}
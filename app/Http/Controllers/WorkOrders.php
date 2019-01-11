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
        $newWo::create($newWoJson);
       
    }
    public function update(Request $request) {
        $newWo = new WorkOrder;
        $WoObj = $request->get('responseObj');
        $ar = (array)$WoObj;
        $keys = array_keys($ar);
        $WoJson = (array)$ar[$keys[0]];
        //$WoJson['WoNumStr'] = (int)$WoJson['WoNumStr'];
        //$WoJson['WoNumStr'] = (string)$WoJson['WoNum'];
        $newWo::create($WoJson);
    }

    public function show() {
        return WorkOrder::getAll();

    }
    
}